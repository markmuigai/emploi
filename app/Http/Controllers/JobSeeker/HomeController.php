<?php

namespace App\Http\Controllers\JobSeeker;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Auth;
use Storage;
use Image;

use App\Blog;
use App\Company;
use App\Country;
use App\Course;
use App\EducationLevel;
use App\Employer;
use App\Industry;
use App\IndustrySkill;
use App\Like;
use App\Location;
use App\Parser;
use App\Referee;
use App\Seeker;
use App\SeekerJob;
use App\SeekerSkill;
use App\Skill;
use App\User;
use App\UserPermission;

use App\Jobs\EmailJob;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $user = Auth::user();
        if ($request->session()->has('redirectToUrl')) {
            $url = session('redirectToUrl');
            if($user->role == 'seeker' && !$user->seeker->hasCompletedProfile())
            {
                if($request->session()->has('redirectToUrlRetries'))
                {
                    $tries = session('redirectToUrlRetries');
                    $tries++;
                    $request->session()->put('redirectToUrlRetries', $tries);
                    if(session('redirectToUrlRetries') > 3)
                    {
                        $request->session()->forget('redirectToUrlRetries');
                        $request->session()->forget('redirectToUrl');
                        //return redirect('/job-seekers/dashboard');
                    }
                }
                else
                {
                    $request->session()->put('redirectToUrlRetries', 1);
                }

                //return redirect('/vacancies/'.$post_slug);
            }
            $request->session()->forget('redirectToUrl');
            return redirect($url);
            
        }
        switch ($user->role) {
            case 'employer':
                return redirect('/v2/employers/dashboard');
                break;

            case 'admin':
                return redirect('/v2/admin/panel');
                break;

            case 'super-admin':
                return redirect('/v2/desk/admins');
                break;

            case 'seeker':
                return redirect('/v2/job-seekers/dashboard');
                break;
            case 'guest':
                if($user->canUseBloggingPanel())
                    return redirect('/v2/my-blogs');
                return view('guests.choose');
            default:
                return redirect('/v2/');
        }

    }

    public function toggleLike($target_class, $slug)
    {
        $user = Auth::user();
        $item = $target_class == 'blog' ? Blog::where('slug',$slug)->firstOrFail() : false;
        if(!$item)
        {
            return redirect()->back();
        }
        $like = $user->toggleLike($target_class,$item->id);
        return redirect()->back();
    }

    public function getCourse($id)
    {
        return Course::findOrFail($id);
    }

    public function makeSeeker()
    {
        return view('guests.seeker')
                ->with('locations',Location::orderBy('name')->get())
                ->with('countries',Country::orderBy('name')->get())
                ->with('industries',Industry::orderBy('name')->get());
    }

    public function saveSeeker(Request $request)
    {
        $request->validate([
            'resume'  =>  ['mimes:doc,pdf,docx','max:51200']
        ]);

        $user = Auth::user();
        $location = Location::findOrFail($request->location);

        $phonePrefix = Country::findOrFail($request->prefix);

        $storage_path = '/public/resumes';
        $resume_url = basename(Storage::put($storage_path, $request->resume));

        $parser = new Parser($resume_url);

        $seeker = Seeker::create([
            'user_id' => $user->id,
            'public_name' => $user->username,
            'gender' => $request->gender,
            'phone_number' => $phonePrefix->prefix.$request->phone_number,
            'country_id' => $location->country_id,
            'location_id' => $location->id,
            'industry_id' => $request->industry,
            'resume' => $resume_url,
            'resume_contents' => $parser->convertToText()
        ]);

        $perm = UserPermission::create([
            'user_id' => $user->id, 
            'permission_id' => 4
        ]);

        $user->seeker->sendWelcomeEmail();

        Auth::logout();

        return view('guests.updated');
    }

    public function saveEmployer(Request $request)
    {
        $user = Auth::user();

        $countryPhone = Country::findOrFail($request->phone_prefix);
        $country2 = Country::findOrFail($request->company_prefix);

        $emp = Employer::create([
            'user_id' => $user->id,
            'name' => $user->name,
            'industry_id' => $request->industry,
            'company_name' => $request->co_name,
            'contact_phone' => $countryPhone->prefix.$request->phone_number,
            'company_phone' => $country2->prefix.$request->co_phone_number,
            'company_email' => $request->co_email,
            'country_id' => $request->country,
            'address' => $request->address
        ]);

        $perm = UserPermission::create([
            'user_id' => $user->id,
            'permission_id' => 3
        ]);

        $ec = Company::where('name',$request->co_name)->first();
        $co_name = isset($ec->id) ? $request->co_name.'-'.User::generateRandomString(4) : $request->co_name;

        $c = Company::create([
            'name' => $co_name,
            'user_id' => $user->id,
            'about' => "$co_name on Emploi",
            'website' => "http://emploi.co/companies/".$co_name,
            'industry_id' => $request->industry,
            'location_id' => 1,
            'company_size_id' => 1
        ]);

        $emp->sendWelcomeEmail();

        Auth::logout();

        return view('guests.updated');
    }

    public function makeEmployer()
    {
        return view('guests.employer')
                ->with('countries',Country::orderBy('name')->get())
                ->with('industries',Industry::orderBy('name')->get());
    }

    // public function test(Request $request){
    //     $ret = EmailJob::dispatch($request->name, $request->email, $request->subject, $request->caption, $request->contents);
    //     print_r($ret);
    // }

    public function profile(Request $request)
    {
        return view('pages.profile1')
                ->with('user',Auth::user());
    }

        public function editBio(){
        $user = Auth::user();
        return view('v2.seekers.edit-personal-details')
                ->with('educationLevels',EducationLevel::all())
                ->with('user',$user)
                ->with('locations',Location::active())
                ->with('industries',Industry::active())
                ->with('countries',Country::active());
    }

    public function updateBio(Request $request)
    {
        // return $request->all();
        $user = Auth::user();

        {
            $request->validate([
                'avatar'    =>  ['mimes:png,jpg,jpeg','max:51200']
            ]);

            $user->name = $request->name;
            $user->username = $request->username;

            if(isset($request->avatar))
            {
                if(isset($user->avatar) && file_exists(storage_path()."/app/public/avatars/".$user->avatar))
                {
                    unlink(storage_path().'/app/public/avatars/'.$user->avatar);
                }

                $avatar = $request->file('avatar');
                $avatar_url = time() . '.' . $avatar->getClientOriginalExtension();
                $storage_path = storage_path().'/app/public/avatars/'.$avatar_url;

                Image::make($avatar)->resize(300, 300)->save($storage_path);

                // $storage_path = '/public/avatars';
                // $user->avatar = basename(Storage::put($storage_path, $request->avatar));

                $user->avatar = $avatar_url;
            }

            $user->updated_at = now();

            if($user->save())
            {
                $seeker = $user->seeker;

                $seeker->public_name = $request->public_name;                
                $seeker->gender = $request->gender;
                $seeker->date_of_birth = $request->date_of_birth;
                $seeker->phone_number = $request->phone_number;
                $seeker->post_address = $request->post_address;
                $seeker->country_id = $request->country;
                $seeker->location_id = $request->location;
                $seeker->objective = $request->objective;

                     
                }
            
                          
                }

                if($seeker->save())
                {
                    return view('pages.profile-updated')
                            ->with('title','Profile Updated')
                            ->with('message','Your profile has been updated successfully');
                }

        }
    public function editEdu(){
        $user = Auth::user();
        return view('v2.seekers.edit-education')
                ->with('user',$user);
    }
        
    public function editExp(){
        $user = Auth::user();
        return view('v2.seekers.edit-experience')
                ->with('user',$user);
    }

    public function editSkills(){
        $user = Auth::user();
        $skills =  IndustrySkill::all();
        return view('v2.seekers.edit-skills')
                ->with('user',$user)
                ->with('skills',$skills);
    }


    public function updateProfile(){
        $user = Auth::user();
        if($user->role == 'seeker')
        {
            //$skills = isset($user->seeker->industry_id) ? IndustrySkill::where('industry_id',$user->seeker->industry_id)->orderBy('name')->get() : IndustrySkill::all();
            $skills =  IndustrySkill::all();
            return view('seekers.edit')
                    ->with('educationLevels',EducationLevel::all())
                    ->with('user',$user)
                    ->with('skills',$skills)
                    ->with('locations',Location::active())
                    ->with('industries',Industry::active())
                    ->with('countries',Country::active());
        }
        if($user->role == 'employer')
        {
            return view('employers.edit')
                    ->with('user',$user);
        }
        return 'Edit profile not available';
    }

    public function saveProfile(Request $request)
    {
        //return $request->all();
        $user = Auth::user();

        if($user->role == 'seeker')
        {
            $request->validate([
                'resume'  =>  ['mimes:doc,pdf,docx','max:51200'],
                'avatar'    =>  ['mimes:png,jpg,jpeg','max:51200']
            ]);

            $user->name = $request->name;
            $user->username = $request->username;

            if(isset($request->avatar))
            {
                if(isset($user->avatar) && file_exists(storage_path()."/app/public/avatars/".$user->avatar))
                {
                    unlink(storage_path().'/app/public/avatars/'.$user->avatar);
                }

                $avatar = $request->file('avatar');
                $avatar_url = time() . '.' . $avatar->getClientOriginalExtension();
                $storage_path = storage_path().'/app/public/avatars/'.$avatar_url;

                Image::make($avatar)->resize(300, 300)->save($storage_path);

                // $storage_path = '/public/avatars';
                // $user->avatar = basename(Storage::put($storage_path, $request->avatar));

                $user->avatar = $avatar_url;
            }

            $user->updated_at = now();

            if($user->save())
            {
                $seeker = $user->seeker;
                $seeker->public_name = $request->public_name;
                
                $seeker->gender = $request->gender;
                $seeker->date_of_birth = $request->date_of_birth;
                $seeker->phone_number = $request->phone_number;
                $seeker->current_position = $request->current_position;
                $seeker->post_address = $request->post_address;
                $seeker->years_experience = $request->years_experience ? $request->years_experience : 0;
                $seeker->industry_id = $request->industry;
                $seeker->country_id = $request->country;
                $seeker->location_id = $request->location;
                $seeker->education_level_id = $request->education_level_id;
                $seeker->objective = $request->objective;
                $seeker->searching = $request->searching == 'true' ? true : false;

                $education = array();
                if (isset($request->institution_name)) {
                    foreach ($request->institution_name as $key => $value) {
                        array_push($education, array($value, $request->course_name[$key], $request->course_duration[$key]));
                    }
                }
                $seeker->education  = json_encode($education);

                //return $request->all();

                $experience = array();
                if (isset($request->organization_name)) {
                    foreach ($request->organization_name as $key => $value) {
                        $arr = [];
                        $arr[] = $value;
                        $arr[] = $request->job_title[$key];
                        $arr[] = $request->job_start[$key];
                        $arr[] = $request->job_end[$key];
                        $arr[] = $request->responsibilities[$key];

                        if(isset($request->is_current[$key]))
                            $arr[] = $request->is_current[$key];

                        array_push($experience, $arr);
                    }
                }
                $seeker->experience  = json_encode($experience);



                if(isset($request->resume))
                {
                    if(isset($seeker->resume) && file_exists(storage_path()."/app/public/resumes/".$seeker->resume) && $seeker->resume != null)
                    {
                        unlink(storage_path().'/app/public/resumes/'.$seeker->resume);
                    }
                    $storage_path = '/public/resumes';
                    $resume_url = basename(Storage::put($storage_path, $request->resume));
                    $seeker->resume = $resume_url;
                    $parser = new Parser($resume_url);
                    $seeker->resume_contents = $parser->convertToText();
                    $seeker->updated_at = now();
                }


                if(count($seeker->skills) > 0)
                {
                    foreach ($seeker->skills as $k)
                        $k->delete();
                }

                if(isset($request->skills)){

                    if(count($request->skills) > 0)
                    {
                        for($i=0; $i<count($request->skills); $i++)
                        {
                            SeekerSkill::create([
                                'seeker_id' => $seeker->id,
                                'skill_id' => (int) $request->skills[$i]
                            ]);
                        }
                    }
                }

                if($seeker->save())
                {
                    return view('pages.profile-updated')
                            ->with('title','Profile Updated')
                            ->with('message','Your profile has been updated successfully');
                }

            }
            return view('pages.profile-updated')
                            ->with('title','Profile Update Failed')
                            ->with('message','Profile update failed. Please try again later.');
        }

        if($user->role == 'employer')
        {

            $request->validate([
                'name'      =>  ['required', 'max:50', 'string'],
                'username'  =>  ['required', 'max:20' ,'string'],
                'avatar'    =>  ['mimes:png,jpg,jpeg','max:51200']
            ]);

            $user->name = $request->name;
            $user->username = $request->username;

            if(isset($request->avatar))
            {
                if(isset($user->avatar) && file_exists(storage_path()."/app/public/avatars/".$user->avatar))
                {
                    unlink(storage_path().'/app/public/avatars/'.$user->avatar);
                }

                $avatar = $request->file('avatar');
                $avatar_url = time() . '.' . $avatar->getClientOriginalExtension();
                $storage_path = storage_path().'/app/public/avatars/'.$avatar_url;

                Image::make($avatar)->resize(300, 300)->save($storage_path);

                // $storage_path = '/public/avatars';
                // $user->avatar = basename(Storage::put($storage_path, $request->avatar));

                $user->avatar = $avatar_url;
                // $storage_path = '/public/avatars';
                // $user->avatar = basename(Storage::put($storage_path, $request->avatar));
            }
            if( $user->save() )
            {
                return view('employers.dashboard.message')
                        ->with('title','Profile Updated')
                        ->with('message','Your profile has been updated successfully.');
            }
            return view('employers.dashboard.message')
                        ->with('title','Profile Update Failed')
                        ->with('message','An Error occurred while updating your profile. Please try again later or contact us for assistance.');
        }
        return 'user role not allowed';

    }

    public function addReferee(){
        $user = Auth::user();
        if($user->role != 'seeker')
            abort(403);
        // if(!$user->seeker->hasCompletedProfile())
        //     return view('seekers.update-profile');
        return view('seekers.addReferee')
                ->with('seeker',$user->seeker);
    }

    public function saveReferee(Request $request){
        $user = Auth::user();
        if($user->role != 'seeker')
            abort(403);
        $referee = Referee::where('email',$request->email)->where('seeker_id',$user->seeker->id)->first();
        if(isset($referee->id))
        {
            return view('referees.already-added')
                    ->with('name',$request->name)
                    ->with('email',$request->email);
            //die('Referee has already been added. <a href="/profile/add-referee">Add Referee</a>');
        }
        //return $request->all();
        $r = Referee::create([
            'seeker_id' => $user->seeker->id,
            'name' => $request->name,
            'email'  => $request->email,
            'phone_number'  => $request->phone_number,
            'organization'  => $request->organization,
            'position_held'  => $request->position_held,
            'relationship'  => $request->relationship,
            'slug'  => User::generateRandomString(20)
        ]);

        for($i=0; $i<count($request->job_title); $i++)
        {
            SeekerJob::create([
                'seeker_id' => $user->seeker->id,
                'referee_id' => $r->id,
                'job_title' => $request->job_title[$i],
                'start_date' => $request->start_date[$i],
                'end_date' => $request->end_date[$i]
            ]);
        }

        $caption = $user->name." has listed you as a referee. Provide your assessment.";
        $contents = "Emploi is a sourcing platform linking employers and job seekers. <strong>".$user->name."</strong> has included you as one of their professional referee. <br>
        As such, your assessment on their professional skills and abilities will be higly valued.
        <br>

        Provide assessment of ".$user->seeker->public_name." by following the link below <br>
        <a href='".url('/referees/'.$r->slug)."'>Provide Assessment (2 minutes)</a> <br><br>

        Thank you for your cooperation towards growing ".$user->seeker->public_name."'s career.
                ";
        EmailJob::dispatch($r->name, $r->email, 'Provide Referee Assessment for '.$user->name, $caption, $contents);

        return view('referees.added')
                ->with('referee',$r);
        return 'Referee added successfully';

        return $request->all();
    }
}

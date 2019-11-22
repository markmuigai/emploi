<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Storage;

use App\Country;
use App\Course;
use App\EducationLevel;
use App\Industry;
use App\Location;
use App\Parser;
use App\Referee;
use App\SeekerJob;
use App\SeekerSkill;
use App\Skill;
use App\User;

use App\Jobs\EmailJob;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        switch (Auth::user()->role) {
            case 'employer':
                return redirect('/employers/dashboard');
                break;

            case 'admin':
                return redirect('/admin/panel');
                break;

            case 'super-admin':
                return redirect('/desk/admins');
                break;

            default:
                if ($request->session()->has('redirectToPost')) {
                    $post_slug = session('redirectToPost');
                    $request->session()->forget('redirectToPost');
                    return redirect('/vacancies/'.$post_slug);
                    
                }
                return redirect('/job-seekers/dashboard');
                break;
        }

    }

    public function getCourse($id)
    {
        return Course::findOrFail($id);
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

    public function updateProfile(){
        $user = Auth::user();
        if($user->role == 'seeker')
        {
            return view('seekers.edit')
                    ->with('educationLevels',EducationLevel::all())
                    ->with('user',Auth::user())
                    ->with('skills',Skill::all())
                    ->with('locations',Location::active())
                    ->with('industries',Industry::active())
                    ->with('countries',Country::active());
        }
        if($user->role == 'employer')
        {
            return view('employers.edit')
                    ->with('user',$user);
        }
    }

    public function saveProfile(Request $request)
    {
        //return $request->skills[1];
        $user = Auth::user();
        if($user->role == 'seeker')
        {
            $user->name = $request->name;
            $user->username = $request->username;

            if(isset($request->avatar))
            {
                $storage_path = '/public/avatars';
                $user->avatar = basename(Storage::put($storage_path, $request->avatar));
            }

            if($user->save())
            {
                $seeker = $user->seeker;
                $seeker->public_name = $request->public_name;
                $seeker->gender = $request->gender;
                $seeker->date_of_birth = $request->date_of_birth;
                $seeker->phone_number = $request->phone_number;
                $seeker->current_position = $request->current_position;
                $seeker->post_address = $request->post_address;
                $seeker->years_experience = $request->years_experience;
                $seeker->industry_id = $request->industry;
                $seeker->country_id = $request->country;
                $seeker->location_id = $request->location;
                $seeker->education_level_id = $request->education_level_id;
                $seeker->objective = $request->objective;

                $education = array();
                if (isset($request->institution_name)) {
                    foreach ($request->institution_name as $key => $value) {
                        array_push($education, array($value, $request->course_name[$key], $request->course_duration[$key]));
                    }
                }
                $seeker->education  = json_encode($education);

                $experience = array();
                if (isset($request->organization_name)) {
                    foreach ($request->organization_name as $key => $value) {
                        array_push($experience, array($value, $request->job_title[$key], $request->job_start[$key], $request->job_end[$key], $request->responsibilities[$key]));
                    }
                }
                $seeker->experience  = json_encode($experience);



                if(isset($request->resume))
                {
                    $storage_path = '/public/resumes';
                    $resume_url = basename(Storage::put($storage_path, $request->resume));
                    $seeker->resume = $resume_url;
                    $parser = new Parser($resume_url);
                    $seeker->resume_contents = $parser->convertToText();
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
                            ->with('message','Your profile has been updated succesfully');
                }

            }
            return view('pages.profile-updated')
                            ->with('title','Profile Update Failed')
                            ->with('message','Profile update failed. Please try again later.');
        }
        if($user->role == 'employer')
        {
            $user->name = $request->name;
            $user->username = $request->username;
            if(isset($request->avatar))
            {
                $storage_path = '/public/avatars';
                $user->avatar = basename(Storage::put($storage_path, $request->avatar));
            }
            if( $user->save() )
            {
                return view('employers.dashboard.message')
                        ->with('title','Profile Updated')
                        ->with('message','Your profile has been updated succesfully.');
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
        if(!$user->seeker->hasCompletedProfile())
            return view('seekers.update-profile');
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
        return 'Referee added succesfully';

        return $request->all();
    }
}

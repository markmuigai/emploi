<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Storage;

use App\Country;
use App\EducationLevel;
use App\Industry;
use App\Location;
use App\SeekerSkill;
use App\Skill;

use App\Jobs\EmailJob;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
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
                return redirect('/profile');
                return view('home');
                break;
        }
        
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
                    $seeker->resume = basename(Storage::put($storage_path, $request->resume));
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
}

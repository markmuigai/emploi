<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;
use Auth;

use App\Candidate;
use App\Company;
use App\CompanySize;
use App\Country;
use App\EducationLevel;
use App\Employer;
use App\IqTest;
use App\Industry;
use App\IndustrySkill;
use App\InterviewResult;
use App\JobApplication;
use App\Location;
use App\ModelSeeker;
use App\ModelSeekerSkill;
use App\ModelSeekerPersonalityTrait;
use App\Personality;
use App\PersonalityTrait;
use App\Post;
use App\PsychometricTest;
use App\Referee;
use App\Referral;
use App\RsiWeight;
use App\Seeker;
use App\SeekerPreviousCompanySize;
use App\SeekerPersonality;
use App\Skill;
use App\User;
use App\UserPermission;

use App\Jobs\EmailJob;

class EmployerController extends Controller
{
    public function register(){
    	return view('employers.register')
    			->with('industries', Industry::all())
    			->with('countries',Country::active());
    }

    public function create(Request $request)
    {
    	//return $request->all();
    	$user = User::where('email',$request->email)
    				->first();
    	if(isset($user->id))
    	{
    		return 'Email has been registered';
    	}



    	$username = explode(" ", $request->name);
        $username = strtolower(implode("", $username).rand(1000,30000));
        $username = explode(".", $username);
        $username = implode('',$username);

        $password = User::generateRandomString(10);

    	$user = User::create([
    		'name' => $request->name,
            'email' => $request->email,
            'username' => $username,
            'email_verification' => User::generateRandomString(10),
            'password' => Hash::make($request->password),
    	]);

        Referral::creditFor($request->email);

    	$country = Country::findOrFail($request->country);

    	$country2 = Country::findOrFail($request->coPrefix);

        //return $request->co_name;

    	$emp = Employer::create([
    		'user_id' => $user->id, 
    		'name' => $request->name, 
    		'industry_id' => $request->industry, 
            'company_name' => $request->co_name,
    		'contact_phone' => $country->prefix.$request->phone_number,
    		'company_phone' => $country2->prefix.$request->co_phone_number,
    		'company_email' => $request->co_email,
    		'country_id' => $request->country,
    		'address' => $request->address
    	]);

        //return $emp;

    	$perm = UserPermission::create([
            'user_id' => $user->id, 
            'permission_id' => 3
        ]);

        //$c = Company::where('name',$request->name)->first();
        $co_name = $request->co_name.User::generateRandomString(4);

        $c = Company::create([
            'name' => $co_name, 
            'user_id' => $user->id,
            'about' => "Insert company brief",
            'website' => "http://emploi.co", 
            'industry_id' => $request->industry,
            'location_id' => 1,
            'company_size_id' => 1
        ]);

        $caption = "Thank you for registering your profile on Emploi as an Employer";
        $contents = "Your account has been created succesfully. Log in with username: <b>$username</b> <br>
        <br>

        Verify your account <a href='".url('/verify-account/'.$user->email_verification)."'>here</a> and finish setting up your account for employers to easily find and shortlist you.
                ";
        EmailJob::dispatch($user->name, $user->email, 'Verify Emploi Account', $caption, $contents);

        //send welcome email to company
        //send credentials to employer
        return view('employers.registered')
                ->with('username',$user->username);
    }

    public function browse(Request $request)
    {
        //errors exist
        $seekers = Seeker::orderBy('featured')->paginate(10);
        $title = "All Job Seekers";
        $location = false;
        $industry = false;
        $q = "";

        if(isset($request->q) && isset($request->industry) && isset($request->location))
        {
            $i = Industry::where('slug',$request->industry)->firstOrFail();
            $location = Location::findOrFail($request->location);
            $q = $request->q;

            $seekers = Seeker::where('industry_id',$i->id)
                    ->where('location_id',$location->id)
                    ->where('experience','like',"%$q%")
                    ->orderBy('featured')->paginate(10);



            $title = 'Search results';
            $industry = $i;

        }
        elseif(isset($request->q) && isset($request->industry))
        {
            $i = Industry::where('slug',$request->industry)->firstOrFail();
            $q = $request->q;

            $seekers = Seeker::where('industry_id',$i->id)
                    ->where('experience','like',"%$q%")
                    ->orderBy('featured')->paginate(10);

            $title = 'Search results';
            $industry = $i;
        }
        elseif(isset($request->q) && isset($request->location))
        {
            $location = Location::findOrFail($request->location);
            $q = $request->q;

            $seekers = Seeker::where('location_id',$location->id)
                    ->where('experience','like',"%$q%")
                    ->orderBy('featured')->paginate(10);

            $title = 'Search results';
        }
        elseif(isset($request->industry) && isset($request->location) )
        {
            $i = Industry::where('slug',$request->industry)->firstOrFail();
            $location = Location::findOrFail($request->location);


            $seekers = Seeker::where('industry_id',$i->id)
                    ->where('location_id',$location->id)
                    ->orderBy('featured')->paginate(10);
            $title = $i->name;
            //dd($location);
            //$location = $l;
            $industry = $i;
        }
        elseif(isset($request->industry))
        {
            $i = Industry::where('slug',$request->industry)->firstOrFail();
            $seekers = Seeker::where('industry_id',$i->id)->orderBy('featured')->paginate(10);
            $title = $i->name;
            $industry = $i;
        }
        elseif(isset($request->location))
        {
            $i = Location::findOrFail($request->location);

            $seekers = Seeker::where('location_id',$i->id)->orderBy('featured')->paginate(10);
            $title = 'Job Seekers in '.$i->name;
            $location = $i;
        }
        elseif(isset($reqeust->q))
        {
            $q = $request->q;

            $seekers = Seeker::where('experience','like',"%$q%")
                    ->orderBy('featured')->paginate(10);

            $title = 'Search results';

        }



        
        return view('employers.browse')
                ->with('seekers',$seekers)
                ->with('industries',Industry::active())
                ->with('locations',Location::active())
                ->with('location',$location)
                ->with('industry',$industry)
                ->with('query',$request->q)
                ->with('title',$title);
    }

    public function applyForUser(Request $request){
        $seeker = Seeker::findOrFail($request->seeker_id);
        $post = Post::findOrFail($request->post_id);
        if($seeker->hasApplied($post))
        {
            return view('employers.dashboard.message')
                    ->with('title','Already Applied')
                    ->with('message',$seeker->public_name.' has already applied for the '.$post->title.' position');
        }

        $j = JobApplication::create([
            'user_id' => $seeker->user->id,
            'post_id' => $post->id,
            'cover' => 'Shortlisted from the dashboard'
        ]);
        if(isset($j->id))
        {
            return view('employers.dashboard.message')
                    ->with('title','Shortlist Success')
                    ->with('message',$seeker->public_name.' has been shortlisted for the '.$post->title.' position.');
        }
        return view('employers.dashboard.message')
                ->with('title','Shortlist Failed')
                ->with('message','An Error occured while shortlisting '.$seeker->public_name.'. Please try again later.');
    }

    public function viewSeeker(Request $request,$username)
    {
        $user = User::where('username',$username)->firstOrFail();
        return view('employers.seeker')
                ->with('user',$user);
    }

    public function dashboard(Request $request)
    {
        return view('employers.dashboard.index')
                ->with('industries',Industry::active());
    }

    public function applications(Request $request, $slug){
        $post = Post::where('slug',$slug)->firstOrFail();
        $shortlist = isset($request->shortlist) ? true : false;

        if($post->company->user_id == Auth::user()->id)
        {
            return view('employers.applications')
                ->with('shortlist',$shortlist)
                ->with('post',$post);
        }
        return redirect()->back();
    }

    public function invite(Request $request, $slug){
        $post = Post::where('slug',$slug)->firstOrFail();
        return view('employers.dashboard.invite')
                ->with('post',$post);
    }

    public function rsi(Request $request, $slug){
        $post = Post::where('slug',$slug)->firstOrFail();
        return view('employers.dashboard.rsi')
                    ->with('educationLevels',EducationLevel::all())
                    ->with('companySizes',CompanySize::all())
                    ->with('personalities',Personality::orderBy('name')->get())
                    ->with('skills',Skill::all())
                    ->with('personalityTraits',PersonalityTrait::orderBy('name')->get())
                    ->with('industrySkills',IndustrySkill::where('industry_id',$post->industry_id)->orderBy('name')->get())
                    ->with('weights',RsiWeight::all())
                    ->with('post',$post);
        //return $request->all();
    }

    public function saveRsi(Request $request, $slug){
        $post = Post::where('slug',$slug)->firstOrFail();
        //return $request->all();
        if(isset($post->modelSeeker->id))
        {
            $m = $post->modelSeeker;
            $m->education_level_id = $request->education_level_id;
            $m->education_level_importance = $request->education_level_importance;
            $m->personality_test_id = $request->personality_test_id;
            $m->experience_duration = $request->experience_duration;
            $m->experience_level_importance = $request->experience_level_importance;
            $m->iq_test = $request->iq_test == 'on' ? true : false;
            $m->iq_score = $request->iq_score;
            $m->interview = $request->interview == 'on' ? true : false;
            $m->psychometric = $request->psychometric == 'on' ? true : false;
            $m->interview_result_score = $request->interview_result_score;
            $m->psychometric_test_score = $request->psychometric_test_score;
            $m->company_size_id = $request->company_size_id;

            $m->education_importance = $request->education_importance;
            $m->experience_importance = $request->experience_importance;
            $m->interview_importance = $request->interview_importance;
            $m->skills_importance = $request->skills_importance;
            $m->iq_importance = $request->iq_importance;
            $m->psychometric_importance = $request->psychometric_importance;
            $m->personality_importance = $request->personality_importance;
            $m->company_size_importance = $request->company_size_importance;
            $m->feedback_importance = $request->feedback_importance;

            $m->other_skills = '[]';
            $m->other_skills_weight = '[]';

            if(isset($request->other_skill_name))
            {
                $m->other_skills = $request->other_skill_name;
                $m->other_skills_weight = $request->other_skill_weight;
            }

            $m->save();

            if(count($m->modelSeekerSkills) > 0)
            {
                foreach($m->modelSeekerSkills as $s)
                    $s->delete();
            }

            if(count($m->modelSeekerPersonalityTraits) > 0)
            {
                foreach($m->modelSeekerPersonalityTraits as $t)
                    $t->delete();
            }

            
        }
        else
        {
            //return $request->all();
            $m = ModelSeeker::create([
                'post_id' => $post->id,
                'education_level_id' => $request->education_level_id,
                'education_level_importance' => $request->education_level_importance,
                'personality_test_id' => $request->personality_test_id,
                'experience_duration' => $request->experience_duration,
                'experience_level_importance' => $request->experience_level_importance,
                'iq_test' => $request->iq_test == 'on' ? true : false,
                'iq_score' => $request->iq_score,
                'interview' => $request->interview == 'on' ? true : false,
                'interview_result_score' => $request->interview_result_score,
                'psychometric' => $request->psychometric == 'on' ? true : false,
                'psychometric_test_score' => $request->psychometric_test_score,
                'company_size_id' => $request->company_size_id

            ]);
        }

        $m->other_skills = '[]';
        $m->other_skills_weight = '[]';

        if(isset($request->other_skill_name))
        {
            $m->other_skills = $request->other_skill_name;
            $m->other_skills_weight = $request->other_skill_weight;
        }
        
        if(isset($request->skill_id) && count($request->skill_id) > 0 )
        {
            $counter = 0;
            foreach ($request->skill_id as $e) {
                ModelSeekerSkill::create([
                    'model_seeker_id' => $m->id,
                    'industrySkill_id' => $e,
                    'weight' => $request->skill_weight[$counter]
                ]);
                $counter ++;
            }
        }

        if(isset($request->trait_id) && count($request->trait_id) > 0 )
        {
            $counter = 0;
            foreach ($request->trait_id as $e) {
                ModelSeekerPersonalityTrait::create([
                    'model_seeker_id' => $m->id,
                    'personality_trait_id' => $e,
                    'weight' => $request->trait_weight[$counter]
                ]);
                $counter ++;
            }
        }
        

        return redirect('/employers/applications/'.$post->slug.'/rsi');
    }

    public function toggleShortlist(Request $request, $slug, $username){
        $user = User::where('username',$username)->firstOrFail();
        $post = Post::where('slug',$slug)->firstOrFail();
        if($user->seeker->hasApplied($post))
        {
            $j = JobApplication::where('user_id',$user->id)->where('post_id',$post->id)->firstOrFail();
            if($j->status == 'active')
            {
                $j->status = 'shortlisted';
                $j->save();
                // return view('employers.dashboard.message')
                //     ->with('title','Added to Shortlist')
                //     ->with('message',$user->seeker->public_name.' has been added to '.$post->title.' shortlist');
            }
            elseif($j->status == 'shortlisted')
            {
                $j->status = 'active';
                $j->save();
                // return view('employers.dashboard.message')
                //     ->with('title','Removed from Shortlist')
                //     ->with('message',$user->seeker->public_name.' has been removed from '.$post->title.' shortlist');
            }
            
            
        }
        return redirect('/employers/applications/'.$post->slug);
        return view('employers.dashboard.message')
            ->with('title','An Error Occurred')
            ->with('message','An error occurred while processing your request. Please try again later');
    }

    public function viewCover(Request $request, $slug, $applicationId){
        $app = JobApplication::findOrFail($applicationId);
        return view('employers.cover')
                        ->with('application',$app);
    }

    public function candidateRsi(Request $request, $slug, $applicationId){
        $app = JobApplication::findOrFail($applicationId);
        return view('employers.dashboard.seeker-rsi')
                        ->with('application',$app);
    }

    public function closeJob(Request $request, $slug){
        $post = Post::where('slug',$slug)->firstOrFail();
        return view('employers.close-job')
                ->with('post',$post);
    }

    public function saveCandidate(Request $request, $slug){
        $post = Post::where('slug',$slug)->firstOrFail();
        $c = Candidate::create([
            'seeker_id' => $request->seeker_id, 
            'post_id' => $post->id, 
            'monthly_salary' => $request->monthly_salary
        ]);

        $caption = "Candidate Selected ".$post->title;
        $contents = "You have selected ".$c->seeker->user->name." for the position of ".$post->title." with a monthly salary of ".$post->location->country->currency.$c->monthly_salary.". <br>
        <b>Candidate Details</b> <br>
        Name: ".$c->seeker->user->name." <br>
        Email: ".$c->seeker->user->email." <br>
        Phone: ".$c->seeker->phone_number." <br>.
        <br>
        Thank you for choosing Emploi.
        <br><br>

        <a href='".url('/vacancies/create')."'>Advertise Vacancy</a>
        ";

        EmailJob::dispatch($post->company->user->name, $post->company->user->email, $c->seeker->public_name." for ".$post->title, $caption, $contents);

        $caption = "Application for the ".$post->title." position was succesfull";
        $contents = "You have been selected for <b>".$post->title."</b> position at <b>".$post->company->name."</b>. You have been offered a <b>monthly salary of ".$post->location->country->currency.$c->monthly_salary."</b>. <br>
        <b>Employer Details</b> <br>
        Name: ".$post->company->user->name." <br>
        Email: ".$post->company->user->email." <br>
        <br>
        One of <a href='".url('/companies/'.$post->company->id)."'>".$post->company->name."</a>'s representative will get in touch with you for additional details on this position.
        <br>
        Thank you for choosing Emploi.
        <br>
        ";
        EmailJob::dispatch($c->seeker->user->name, $c->seeker->user->email, "Application for ".$post->title." Succesfull", $caption, $contents);
        
        $caption = "The position ".$post->title." has been closed, ".$c->seeker->user->name." selected";
        $contents = $c->seeker->user->name." has been selected by <a href='".url('/companies/'.$post->company->id)."'> for the <b>".$post->title."</b> position, and has been offered a  <b>monthly salary of ".$post->location->country->currency.$c->monthly_salary."</b>. <br>
        <b>Employer Details</b> <br>
        Name: ".$post->company->user->name." <br>
        Email: ".$post->company->user->email." <br>
        <br>
        <b>Job Seeker Details</b> <br>
        Name: ".$c->seeker->user->name." <br>
        Email: ".$c->seeker->user->email." <br>
        Phone: ".$c->seeker->phone_number." <br>.
        <br>
        ";
        EmailJob::dispatch('Emploi Admin', 'info@emploi.co', "Candidate Selected for ".$post->title." Succesfull", $caption, $contents);
        if($post->positions == count($post->candidates))
        {
            $post->status = 'closed';
            $post->save();
        }
        return redirect('/employers/applications/'.$post->slug.'/close');
        return $request->all();
    }

    public function inputInterview(Request $request, $slug, $applicationId){
        $post = Post::where('slug',$slug)->firstOrFail();
        $app = JobApplication::findOrFail($applicationId);
        return view('employers.rsi.interview')
                ->with('application',$app);
    }

    public function saveInterview(Request $request, $slug, $applicationId){
        $app = JobApplication::findOrFail($applicationId);
        $post = Post::where('slug',$slug)->firstOrFail();
        if(count($app->interviewResults) > 0)
        {
            foreach($app->interviewResults as $i)
                $i->delete();
        }
        if(isset($request->score))
        {
            for($i=0; $i<count($request->score); $i++)
            {
                InterviewResult::create([
                    'job_application_id' => $app->id,
                    'score' => $request->score[$i]
                ]);
            }
        }
        return redirect('/employers/applications/'.$post->slug.'/'.$app->id.'/rsi');
    }

    public function inputIq(Request $request, $slug, $applicationId){
        $post = Post::where('slug',$slug)->firstOrFail();
        $app = JobApplication::findOrFail($applicationId);
        return view('employers.rsi.iq')
                ->with('application',$app);
    }

    public function saveIq(Request $request, $slug, $applicationId){
        $app = JobApplication::findOrFail($applicationId);
        $post = Post::where('slug',$slug)->firstOrFail();
        if(count($app->iqTests) > 0)
        {
            foreach($app->iqTests as $i)
                $i->delete();
        }
        if(isset($request->score))
        {
            for($i=0; $i<count($request->score); $i++)
            {
                IqTest::create([
                    'job_application_id' => $app->id,
                    'score' => $request->score[$i]
                ]);
            }
        }
        return redirect('/employers/applications/'.$post->slug.'/'.$app->id.'/rsi');
    }

    public function inputPsy(Request $request, $slug, $applicationId){
        $post = Post::where('slug',$slug)->firstOrFail();
        $app = JobApplication::findOrFail($applicationId);
        return view('employers.rsi.psychometric')
                ->with('application',$app);
    }

    public function savePsy(Request $request, $slug, $applicationId){
        $app = JobApplication::findOrFail($applicationId);
        $post = Post::where('slug',$slug)->firstOrFail();
        if(count($app->psychometricTests) > 0)
        {
            foreach($app->psychometricTests as $i)
                $i->delete();
        }
        if(isset($request->score))
        {
            for($i=0; $i<count($request->score); $i++)
            {
                PsychometricTest::create([
                    'job_application_id' => $app->id,
                    'score' => $request->score[$i]
                ]);
            }
        }
        return redirect('/employers/applications/'.$post->slug.'/'.$app->id.'/rsi');
    }

    public function inputPers(Request $request, $slug, $applicationId){
        $post = Post::where('slug',$slug)->firstOrFail();
        $app = JobApplication::findOrFail($applicationId);
        return view('employers.rsi.personality')
                ->with('personalities',Personality::all())
                ->with('application',$app);
    }

    public function savePers(Request $request, $slug, $applicationId){
        $post = Post::where('slug',$slug)->firstOrFail();
        $app = JobApplication::findOrFail($applicationId);
        if(isset($app->seekerPersonality->id))
        {
            $app->seekerPersonality->personality_id = $request->personality;
            $app->seekerPersonality->save();
        }
        else
        {
            SeekerPersonality::create([
                'personality_id' => $request->personality,
                'job_application_id' => $app->id
            ]);
        }
        return redirect('/employers/applications/'.$post->slug.'/'.$app->id.'/rsi');
        return $request->all();
    }

    public function referees(Request $request, $slug, $applicationId){
        $app = JobApplication::findOrFail($applicationId);
        if(isset($request->toggle))
        {

            $app->toggleUseReferee($request->toggle);
        }
        
        return view('employers.rsi.referees')
                    ->with('app',$app);
        return $request->all();
    }

    public function addReferee(Request $request, $slug, $applicationId){
        $app = JobApplication::findOrFail($applicationId);
        return view('employers.rsi.addReferee')
                    ->with('app',$app);
    }

    public function requestReferee(Request $request, $slug, $applicationId){
        //send e-mail instructions
        $app = JobApplication::findOrFail($applicationId);
        $user =  $app->user;
        $caption = $app->post->company->name." is interested in getting feedback from your referees";
        $contents = "Your application has been moved up and ". $app->post->company->name." is requesting for your referees in order to make a hiring decision.<br>
        <br>

        Kindly but urgently provide your referee details by following the link below <br>
        <a href='".url('/profile/add-referee')."'>".url('/profile/add-referee')."</a> <br>

        Thank you for your commitment, we wish you the best.
                ";
        EmailJob::dispatch($user->name, $user->email, 'Request for Referees', $caption, $contents);

        
        return view('employers.rsi.refereeRequested')
                    ->with('app',$app);
    }

    public function toggleReferees(Request $request, $slug, $applicationId){
        $app = JobApplication::findOrFail($applicationId);
        if(isset($request->referee_id))
        {
            
            $app->toggleUseReferee($request->referee_id);
        }
        
        return redirect('/employers/applications/'.$app->post->slug.'/'.$app->id.'/rsi/referees');
    }

    public function cosizes(Request $request, $slug, $applicationId){
        $post = Post::where('slug',$slug)->firstOrFail();
        $app = JobApplication::findOrFail($applicationId);
        //return $app;
        return view('employers.rsi.cosizes')
                ->with('personalities',Personality::all())
                ->with('sizes',CompanySize::all())
                ->with('application',$app);
    }

    public function saveCosizes(Request $request, $slug, $applicationId){
        $post = Post::where('slug',$slug)->firstOrFail();
        $app = JobApplication::findOrFail($applicationId);
        if(count($app->seekerPreviousCompanySizes) > 0)
        {
            foreach($app->seekerPreviousCompanySizes as $c)
                $c->delete();
        }
        $i = 0;
        foreach($request->company_name as $cname)
        {
            SeekerPreviousCompanySize::create([
                'job_application_id' => $app->id,
                'name' => $cname, 
                'company_size_id' => $request->company_size[$i]
            ]);
            $i++;
        }
        //return $app;
        //return $request->all();
        return redirect('/employers/applications/'.$app->post->slug.'/'.$app->id.'/rsi/company-sizes');
        return view('employers.rsi.cosizes')
                ->with('personalities',Personality::all())
                ->with('application',$app);
    }

}

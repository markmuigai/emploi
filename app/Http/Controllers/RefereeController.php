<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\IndustrySkill;
use App\JobApplicationReferee;
use App\OtherSeekerSkill;
use App\PersonalityTrait;
use App\Referee;
use App\SeekerIndustrySkill;
use App\SeekerJob;
use App\SeekerPersonalityTrait;

use Auth;
use App\Jobs\EmailJob;

class RefereeController extends Controller
{
    public function assess($slug){
    	$r = Referee::where('slug',$slug)->firstOrFail();
    	$user = Auth::user();

    	if($r->status != 'pending-details')
    	{
    		if(isset(Auth::user()->id) && Auth::user()->role == 'admin')
    		{
    			//do not exit
    		}
    		else
    		{
                return view('referees.already-assessed');
    			die('Assessment already submitted. <a href="/join">Register on Emploi</a>');
    		}
    		
    	}
        //dd($r->seeker->industry->industrySkills);
    	return view('referees.assess')
                ->with('skills',$r->seeker->industry->industrySkills)
                ->with('personalities',PersonalityTrait::orderBy('name')->get())
    			->with('referee',$r);
    	return $slug;
    }

    public function saveAssessment(Request $request, $slug){

    	$r = Referee::where('slug',$slug)->firstOrFail();
    	$user = Auth::user();
    	if($r->status != 'pending-details')
    	{
    		if(isset(Auth::user()->id) && Auth::user()->role == 'admin')
    		{
    			//do not exit
    		}
    		else
    		{
                return view('referees.already-assessed');
    			die('Assessment already submitted. <a href="/join">Register on Emploi</a>');
    		}
    	}
        //return $request->all();
    	if($r->ready)
    	{
    		$j = $r->jobApplicationReferee;
    		//  $j->start_date = $request->start_date;
    		// $j->relationship = $request->relationship;
    		// $j->reason_for_leaving = $request->reason_for_leaving;
    		// $j->performance = $request->performance;
    		// $j->strengths = $request->strengths;
    		// $j->weaknesses = $request->weaknesses;
    		// $j->discplinary_cases = $request->discplinary_cases;
    		// $j->professionalism = $request->professionalism;
    		// $j->would_you_rehire = $request->would_you_rehire;
    		// $j->comments = $request->comments;
    		$j->save();
    	}
    	else
    	{
    		$j = JobApplicationReferee::create([
	    		'seeker_id' => $r->seeker_id,
	    		'referee_id' => $r->id,
	    		'reason_for_leaving' => $request->reason_for_leaving,
	    		'performance' => $request->performance,
	    		'strengths' => $request->strengths,
	    		'weaknesses' => $request->weaknesses,
	    		'discplinary_cases' => $request->discplinary_cases,
	    		'professionalism' => $request->professionalism,
	    		'would_you_rehire' => $request->rehire,
	    		'comments' => $request->comments
	    	]);

            $r->position_held = $request->position;
            $r->relationship = $request->relationship;

            for($i=0; $i<count($r->seekerJobs); $i++)
            {
                $r->seekerJobs[$i]->delete();
            }

            for($i=0; $i<count($request->job_title); $i++)
            {
                SeekerJob::create([
                    'seeker_id' => $r->seeker->id, 
                    'referee_id' => $r->id, 
                    'job_title' => $request->job_title[$i], 
                    'start_date' => $request->start_date[$i],
                    'end_date' => $request->end_date[$i],
                    'work_performance' => $request->performance[$i],
                    'work_quality' => $request->work_quality[$i],

                ]);
            }

            if(isset($request->industry_skill_id))
            {
                for($i=0; $i<count($request->industry_skill_id); $i++)
                {
                    SeekerIndustrySkill::create([
                        'industry_skill_id' => $request->industry_skill_id[$i],
                         'seeker_id' => $r->seeker->id,
                         'referee_id' => $r->id,
                         'weight' => $request->industry_skill_weight[$i]
                    ]);
                }
            }

            
            if(isset($request->skillName))
            {
                for($i=0; $i<count($request->skillName); $i++)
                {
                    OtherSeekerSkill::create([
                        'seeker_id' => $r->seeker->id, 
                        'referee_id' => $r->id, 
                        'name' => $request->skillName[$i]
                    ]);
                }
            }
            
            if(isset($request->personality_id))
            {
                for($i=0; $i<count($request->personality_id); $i++)
                {
                    SeekerPersonalityTrait::create([
                        'seeker_id' => $r->seeker->id, 
                        'referee_id' => $r->id, 
                        'personality_trait_id' => $request->personality_id[$i],
                        'weight' => $request->personality_weight[$i]
                    ]);
                }
            }

            

            


	    	$r->status = 'ready';
	    	$r->save();

	    	$user = $r->seeker->user;

	    	$caption = "Thank you for submitting your assessment as a referee for ".$user->name;
	        $contents = "Emploi Team would like to thank you for submitting your assessment on ".$user->seeker->public_name.". Information provided would be used by other employers when analyzing their suitability when recruiting.
	        <br><br>

	        Have a good day.
	                ";
	        EmailJob::dispatch($r->name, $r->email, 'Referee Assessment for '.$user->name.' Received', $caption, $contents);

	        $caption = $r->name." has submitted referee feedback.";
	        $contents = $r->name." has provided feedback as you had listed them as your referee. This information will be used by current and future employers looking to hire you. <br>
	        Ensure your profile is up to date to increase your hireablity.
	        <br><br>

	       Thank you for choosing Emploi.
	                ";
	        EmailJob::dispatch($user->name, $user->email, 'Referee Assessment from '.$r->name.' Received', $caption, $contents);
    	}
    	
        return view('referees.assessment-saved')
                ->with('j',$j);
    	return $j;
    	return $request->all();
    }

    public function view(Request $request, $id=null)
    {
        $user = Auth::user();
        if(!isset(Auth::user()->id) || Auth::user()->role != 'seeker')
            abort(403);
        if(is_null($id))
        {
            return view('referees.all')
                    ->with('referees',$user->seeker->referees);
        }
        else
            return view('referees.view');
    }
         
}

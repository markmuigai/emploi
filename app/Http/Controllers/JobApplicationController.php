<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

use App\CvRequest;
use App\JobApplication;
use App\Post;

use App\Jobs\EmailJob;

class JobApplicationController extends Controller
{
	public function __construct()
    {
        $this->middleware('seeker');
    }

    public function accept(Request $request, $slug){
    	$post = Post::where('slug',$slug)->firstOrFail();
    	$user = Auth::user();
    	if(!$user->seeker->hasApplied($post))
    	{
    		$j = JobApplication::create([
	    		'user_id' => $user->id,
	    		'post_id' => $post->id,
	    		'cover' => $request->cover
	    	]);

            $r = CvRequest::where('employer',$post->company->user->employer->id)
                    ->where('seeker_id',$user->seeker->id)
                    ->first();

            if(isset($r->id))
            {
                $r->status = 'accepted';
                $r->save();
            }
            else
            {
                CvRequest::create([
                    'employer_id' => $post->company->user->employer->id, 
                    'seeker_id' => $user->seeker->id, 
                    'status' => 'accepted'
                ]);
            }

            

	    	if(isset($j->id))
	    	{

                $caption = "You have applied for ".$post->title;
                $contents = "Your application for the ".$post->title." has been submitted succesfully. Your Job Application Id is ".$j->id.". <br>
                The application has been sent to <strong>".$post->company->name."</strong> for consideration.<br><br>
                In the meantime, update your profile with your updated CV to rank better against other applicants.
                <br>
                All the best.
                <br><br>

                <a href='".url('/vacancies')."'>Browse Other Vacancies</a>
                ";
                EmailJob::dispatch($user->name, $user->email, 'Applied for '.$post->title, $caption, $contents);

                $caption = "Application Received for ".$post->title;
                $contents = $user->seeker->public_name." has submitted an application for the ".$post->title." position.
                <a href='".url('/home')."'>Log in</a> to your account to review the application and compare ".$user->seeker->public_name."'s application to your Role Suitability Index.
                <br>
                Thank you for choosing Emploi
                <br><br>

                <a href='".url('/home')."'>My Account</a>
                ";
                EmailJob::dispatch($post->company->user->name, $post->company->user->email, 'Application for '.$post->title." Received", $caption, $contents);
	    		return view('seekers.applied')
	    				->with('post',$post);
	    	}
    	}


    	return view('seekers.apply-failed')
    			->with('post',$post);
    }
}

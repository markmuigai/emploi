<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

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

	    	if(isset($j->id))
	    	{

                $caption = "You have applied for ".$post->title;
                $contents = "Your application for the ".$post->title." has been submitted succesfully. Your Job Application Id is ".$j->id.". 
The application has been sent to ".$post->company->name." for consideration.
In the meantime, update your profile with your updated CV to rank better against other applicants.

All the best.
                ";
                EmailJob::dispatch($user->name, $user->email, 'Applied for '.$post->title, $caption, $contents);
	    		return view('seekers.applied')
	    				->with('post',$post);
	    	}
    	}
    	
    	
    	return view('seekers.apply-failed')
    			->with('post',$post);
    }
}

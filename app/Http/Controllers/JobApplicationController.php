<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

use App\JobApplication;
use App\Post;

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
	    		return view('seekers.applied')
	    				->with('post',$post);
	    	}
    	}
    	
    	
    	return view('seekers.apply-failed')
    			->with('post',$post);
    }
}

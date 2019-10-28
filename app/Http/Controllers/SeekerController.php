<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

use App\JobApplication;

class SeekerController extends Controller
{
    public function dashboard(Request $request)
    {
    	return view('seekers.dashboard');
    }

    public function applications(Request $request, $id = null)
    {
    	$user = Auth::user();
    	if(!$id)
    	{
    		return view('seekers.applications')
    				->with('user',$user);
    	}
    	else
    	{
    		$app = JobApplication::findOrFail($id);

    		if($app->user_id != $user->id)
    			abort(403);
    		return view('seekers.application')
    				->with('app',$app)
    				->with('user',$user);
    	}
    	return 'application';
    }
}

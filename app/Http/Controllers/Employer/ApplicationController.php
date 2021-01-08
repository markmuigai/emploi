<?php

namespace App\Http\Controllers\Employer;

use App\Post;
use App\JobApplication;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ApplicationController extends Controller
{
    /**
     * Display all applicants for a job.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $post = Post::where('slug',request()->slug)->firstOrFail();

        if($post->company->user_id != auth()->user()->id)
            return abort(403);

        $applications = JobApplication::where('post_id',$post->id)->orderBy('created_at','DESC')->get();

        return view('v2.employers.applications.index',[
            'post' => $post,
            'pool' => JobApplication::where('post_id',$post->id)->orderBy('id','DESC')->paginate(12)
        ]);
    }
}

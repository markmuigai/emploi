<?php

namespace App\Http\Controllers\Employer;

use App\Post;
use App\User;
use Carbon\Carbon;
use App\Interview;
use App\JobApplication;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class InterviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $post = Post::where('slug',request()->slug)->firstOrFail();

        if($post->company->user_id != auth()->user()->id)
            return abort(403);

        return view('v2.employers.interview.index')
        ->with('pool',$post->ToInterview)
        ->with('post',$post);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('v2.employers.interview.create',[
            'application' =>  JobApplication::findOrFail(request()->application),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $appl = JobApplication::findOrFail(request()->application);

        // Store an interview record associated with an application
        $appl->interview()->create([
            'date' => $request->date,
            'description' => $request->description,
            'type' => $request->type,
            'interview_mode' => $request->modeOfInterview,
            'location' => $request->location,
        ]);

        return redirect()->route('v2.shortlisted.index', ['slug' => $appl->post->slug]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $application = JobApplication::findOrFail($id);

        return view('v2.employers.interview.edit',[
            'application' =>  $application,
            'interview' => $application->interview
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $application = JobApplication::findOrFail($id);

        $application->interview()->update([
            'date' => $request->date,
            'description' => $request->description,
            'type' => $request->type,
            'interview_mode' => $request->modeOfInterview,
            'location' => $request->location,
        ]);

        return redirect()->route('v2.interviews.index', ['slug' => $application->post->slug]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Interview $interview)
    {
        $interview->delete();

        return redirect()->route('v2.interviews.index', ['slug' => $interview->jobApplication->post->slug]);
    }
}

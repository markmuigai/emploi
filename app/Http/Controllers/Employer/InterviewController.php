<?php

namespace App\Http\Controllers\Employer;

use App\Post;
use App\User;
use DateTime;
use Carbon\Carbon;
use App\Jobs\EmailJob;
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

        if(isset($appl->interview->id)){
        $date =  Carbon::parse($request->date)->toDayDateTimeString();
        $caption = "Interview Invite for ".$appl->post->title." position";
        $contents = "Following your application for the <b>".$appl->post->title."</b> position at <b>".$appl->post->company->name."</b>, you have been invited for an interview on ".$date.".</b>. Kindly take note of the following.<br><br>
        Time: ".$date." <br>
        Location: ".$appl->interview->location." <br>
        Interview Mode: ".$appl->interview->interview_mode." <br>
        Additional details: ".$appl->interview->description." <br>
        <br>
        In case you have any questions, feel free to reply to this email..
        <br>
        Thank you for choosing Emploi.
        <br>
        ";
        EmailJob::dispatch($appl->user->name, $appl->user->email, "Interview Invite for ".$appl->post->title." position", $caption, $contents);
        }

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

        if(isset($application->interview->id)){
        $date =  Carbon::parse($request->date)->toDayDateTimeString();
        $caption = "Updated Interview Invite for ".$application->post->title." position";
        $contents = "Your interview invitation for the <b>".$application->post->title."</b> position at <b>".$application->post->company->name."</b> has been updated.</b>. Kindly take note of the new details.<br><br>
        Time: ".$date." <br>
        Location: ".$application->interview->location." <br>
        Interview Mode: ".$application->interview->interview_mode." <br>
        Additional details: ".$application->interview->description." <br>
        <br>
        In case you have any questions, feel free to reply to this email..
        <br>
        Thank you for choosing Emploi.
        <br>
        ";
        EmailJob::dispatch($application->user->name, $application->user->email, "Updated Interview Invite for ".$application->post->title." position", $caption, $contents);
        }

        return redirect()->route('v2.interviews.index', ['slug' => $application->post->slug]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

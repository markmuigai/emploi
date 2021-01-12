<?php

namespace App\Http\Controllers\Employer;

use App\Post;
use Response;
use Carbon\Carbon;
use App\Jobs\EmailJob;
use App\JobApplication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class BulkActionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $post = Post::findOrFail(request()->post);

        $applications = JobApplication::where('post_id',$post->id)->orderBy('id','DESC')->get();    

        if($post->company->user_id != auth()->user()->id)
            return abort(403);

        if($post->company->user_id == auth()->user()->id)
        {
            return view('v2.employers.applications.bulk-actions',[
                'post' => $post,
                'pool' => $applications
            ]);
        }
        return redirect()->back();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // foreach($request->applications as $app){
            switch($request->action){
                case 'shortlist' : 
                  foreach($request->applications as $app){
                    // shortlist the selected candidates
                        DB::table("job_applications")->whereIn('id',explode(",",$app))->update(['status' => 'shortlisted']);
                    }
                    // when done commit
                    DB::commit();
                    return redirect()->back();
                    break;
                case 'downloadCV' : 
                    foreach($request->applications as $app){
                        $url = JobApplication::findOrFail($app)->user->seeker->resume;                          
                            $path =url('/storage/resumes/'.$url);
                            response()->download($path);
                    }
                    return redirect()->back();
                    break;

                case 'sendAssessment' : 
                 foreach($request->applications as $app){
                    $email = JobApplication::findOrFail($app)->user->email;
                    $name = JobApplication::findOrFail($app)->user->name;
                    $job = JobApplication::findOrFail($app)->post->title;                    
                            
                        $caption = "Increase your chances of landing ".$job." job you applied";
                        $contents = "Increase your chances of landing the job you applied for by showcasing your skills through our self assessment tool. Click <a href='".url('/' )."'>here</a> to take assessment.<br><br><br><br>               

                            Thank you for choosing Emploi.
                                ";
                        EmailJob::dispatch($name, $email, $job.' job application', $caption, $contents);

                    }
                    return redirect()->back();
                    break;

                case 'interviewInvite' : 
                    foreach($request->applications as $application){
                        $appl = JobApplication::findOrFail($application);

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
                    }

                    return redirect()->route('v2.interviews.index', ['slug' => $appl->post->slug]);
                    break;
                case 'sendEmail' :
                    return redirect()->back();
      
        }
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
        //
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
        //
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

<?php

namespace App\Http\Controllers\Employer;

use App\Post;
use Response;
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
                    return redirect()->back();
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

<?php

namespace App\Http\Controllers\Employer;

use App\Post;
use Response;
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
                    $user=DB::table("job_applications")->whereIn('id',explode(",",$app))->get();
                    // $name=$user->id;
                    foreach ($user as $n) {
                        $seeker=DB::table("seekers")->whereIn('id',explode(",",$n->user_id))->pluck('resume');

                        for($i =0; $i<count($seeker); $i++)
                        {
                            $path =url('/storage/resumes/'.$seeker[$i]);
                        }
                                            
                        // $path =url('/storage/resumes/xfj7nQypt4KFHNx8UMeiwPASZaPis8zOEpY9yvJk.pdf');
                        response()->download($path);
                    }
                }
                return redirect()->back();
            case 'sendAssessment' : 
                // For each applicant
                foreach($request->application->user as $user){
                    // Send email
                    EmailJob::dispatch('Emploi Recruitement', $user->email, 'Company '.$c->name.' Created', $caption, $contents);
                }
                return redirect()->back();
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

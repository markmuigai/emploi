<?php

namespace App\Http\Controllers\Employer;

use App\Post;
use App\User;
use App\Industry;
use Notification;
use App\Employer;
use App\PostQuestion;
use App\Jobs\EmailJob;
use App\JobApplication;
use Illuminate\Http\Request;
use App\Notifications\AssessmentSent;
use App\Http\Controllers\Controller;

class AssessmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();

        // Show assessment
        return view('v2.employers.assessment.index',[
            'post' => $post,
            'seekers' => $post->seekers()
        ]);
    }

    /**
     * Show questions generated for a candidate
     *
     * @return \Illuminate\Http\Response
     */
    public function create($slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();

        // Check if questions have been generated for the post
        if($post->questions->isEmpty()){
            $questions = Industry::findOrFail($post->industry->id)
                ->getAssessmentQuestions(($post->experience_requirements)*12); 


            // Store questions and post pivot table
            foreach($questions as $question){
                PostQuestion::create([
                    'post_id' => $post->id,
                    'question_id' => $question->id
                ]);
            }

            // Send all applicants for the post with link with post slug parameter
        }else{
            // Get the questions which have already been assigned to the job/
            $questions = $post->questions;
        }
        
        // Show assessment
        return view('v2.employers.assessment.create',[
            'post' => $post,
            'questions' => $questions
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
        //
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

    public function sendEmail($id){
        $app = JobApplication::where('post_id', $id)->get();
        $post=Post::Where('id', $id)->first();

        foreach ($app as $a){
            $user = User::Where('id', $a->user_id)->first();

        $caption = "Assessment invitation for ".$post->title;
        $contents = "Your application for the ".$post->title." was successfully received and we are now at the assessment stage.<br>

                <strong>".$post->company->name."</strong> has invited you to take ".$post->title." assessment.<br><br>
                Please use the following link below to access your test. After clicking the link you will be able to go through instructions then proceed start the test.<br>
                  <a href='".url('/v2/self-assessment/create?slug='.$post->slug)."'>".$post->title." assessment link</a>.
                <br>
                All the best.
                <br><br>
                ";

                EmailJob::dispatch($user->name, $user->email, 'Assessment invitation for '.$post->title, $caption, $contents);
        }
        if (app()->environment() === 'production')
            Notification::send(Employer::first(),new AssessmentSent('ASSESSMENT SENT: company: '.$post->company->name. ', position: ' .$post->title.' position'));
        
            return redirect()->back()->with("message", "Assessment has been sent to ".$app->count()." candidates");    
    }


}

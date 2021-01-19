<?php

namespace App\Http\Controllers\Employer;

use App\Post;
use App\Industry;
use App\PostQuestion;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AssessmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
}

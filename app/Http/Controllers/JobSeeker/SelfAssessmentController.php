<?php

namespace App\Http\Controllers\JobSeeker;

use App\Industry;
use App\Question;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SelfAssessmentController extends Controller
{
    /**
     * Display a listing of the self assessment.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new self assessment.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        // Get industry and fetch questions based on user profile
        $questions = Industry::findOrFail($request->payload[0])->getAssessmentQuestions($request->payload[1]);

        // TODO: Remove array padding
        // Return view
        return view('v2.seekers.self-assessment.create',[
            'questions' => $questions->shuffle()
        ]);
    }

    /**
     * Store a newly created self assessment in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $v = $request->choices;
         return $v;
    }

    /**
     * Display the specified self assessment.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified self assessment.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified self assessment in storage.
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
     * Remove the specified self assessment from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Show questions based on parameters
     */
    public function filterAssessments(Request $request)
    {
        return redirect()->route('v2.self-assessment.create',[
            'payload' => [$request->experience, $request->industry]
        ]);
    }
}

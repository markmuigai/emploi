<?php

namespace App\Http\Controllers\Employer;

use App\Interview;
use App\EvaluationResult;
use App\EvaluationCriteria;
use Illuminate\Http\Request;
use App\EvaluationCriteriaResult;
use App\InterviewEvaluationResult;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class InterviewEvaluationController extends Controller
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Interview $interview)
    {
        return view('v2.employers.interview-evaluation.create',[
            'evaluationCriteria' => EvaluationCriteria::all(),
            'interview' => $interview
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Interview $interview)
    {
        DB::transaction(function () use($request, $interview){
            // create evaluation result
            $result = EvaluationResult::create([
                'user_id' => auth()->user()->id,
                'application_id' => $interview->jobApplication->id,
                'interview_id' => $interview->id,
                'rating' => 0
            ]);

            // create criteria results for each evaluation 
            foreach($request->ratings as $criteria_id => $rating){
                EvaluationCriteriaResult::create([
                    'evaluation_result_id' => $result->id,
                    'evaluation_criteria_id' => $criteria_id,
                    'rating' => (int)$rating
                ]);
            }
        });

        return redirect()->route('v2.interviews.index', ['post' => $interview->jobApplication->post]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Interview $interview, $evaluationResult)
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

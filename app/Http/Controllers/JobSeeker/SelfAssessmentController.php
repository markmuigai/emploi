<?php

namespace App\Http\Controllers\JobSeeker;

use App\User;
use App\Choice;
use App\Industry;
use App\Performance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
        // Show assessment
        return view('v2.seekers.self-assessment.index',[
            'score' => Performance::recentScore(request()->email),
            'performances' => Performance::LatestAssessment(request()->email)
        ]);
    }

    /**
     * Show the form for creating a new self assessment.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if(auth()->user() && auth()->user()->role == 'seeker'){
            $questions = Industry::findOrFail(auth()->user()->seeker->industry_id)
                                    ->getAssessmentQuestions((auth()->user()->seeker->years_experience)*12);   
        }else{
            // Get industry and fetch questions based on user profile
            $questions = Industry::findOrFail($request->payload['industry'])->getAssessmentQuestions($request->payload['experience']);   
        }

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
        // dd($request->questions);
        if(auth()->user() && auth()->user()->role == 'seeker'){
            $email = auth()->user()->email;

        }else{
            $email = $request->email;
        }

        DB::transaction(function () use($request, $email) {
            // Fetch previous assessments for an email
            $perfs = Performance::where('email', $email)->get();

            // If they have never been assessed
            if($perfs->isEmpty()){
                $assessment_count = 1;            
            }else{
                // Get their most recent assessment_count + 1
                $assessment_count = Collect($perfs)->last()->assessment_count + 1;
            }

            // If they have attempted any question
            if(isset($request->choices)){
                // questions done
                $questionsDone = array_keys($request->choices);

                foreach($request->choices as $question_id => $choice_id)
                {
                    // Create performance record
                    $performance = Performance::create([
                        'user_id' => null,
                        'assessment_count' => $assessment_count,
                        'email' => $email,           
                        'question_id' => $question_id,
                        'choice_id' => (int)$choice_id[0],
                        'correct' => Choice::find((int)$choice_id[0])->correct_value,
                        'optional_message' => $request->optional_message
                    ]);
                }
            }else{
                $questionsDone = [];
            }

            // questions assigned
            $questionsAssigned = $request->questions;

            // unattemped questions
            $blank = array_diff($questionsAssigned, $questionsDone);

            // dd(
            //     $questionsAssigned, $questionsDone,
            //     array_diff($questionsAssigned, $questionsDone)
            // );

            // Null scores for questions that have not been attempted
            if(isset($blank)){
                foreach($blank as $blank){
                    $performance = Performance::create([
                        'user_id' => null,
                        'assessment_count' => $assessment_count,
                        'email' => $email,           
                        'question_id' => $blank,
                        'choice_id' => 0,
                        'correct' => 0,
                        'optional_message' => $request->optional_message
                    ]);
                };
            }
        });

        return redirect()->route('v2.self-assessment.index', [
            'email' => $email
        ]);
    }

    /**
     * Display the specified self assessment.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {

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
        if(auth()->user() && auth()->user()->role == 'seeker'){
            $email = auth()->user()->email;
        }else{
            $email = $request->email;
        }
        return redirect()->route('v2.self-assessment.create',[
            'payload' => [
                'experience' => $request->experience,
                'industry' => $request->industry
            ],
            'email' => $email
        ]);
    }
}

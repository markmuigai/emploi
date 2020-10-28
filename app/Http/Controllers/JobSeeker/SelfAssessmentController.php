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
        return view('v2.seekers.self-assessment.index');
    }

    /**
     * Show the form for creating a new self assessment.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        // Get industry and fetch questions based on user profile
        $questions = Industry::findOrFail($request->payload['industry'])->getAssessmentQuestions($request->payload['experience']);
        $email =$request->email;

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
        $request->validate([
            'email'  =>  ['required', 'string', 'email','max:50'],
        ]);
        
        DB::transaction(function () use($request) {
            $user = User::where('email',$request->email)->first();
        
            // dd($request->choices);
            foreach($request->choices as $question_id => $choice_id)
            {
                // dd(Choice::find((int)$choice_id[0])->correct_value);
                // Check if user has been assessed before 
                // Fetch choice
                $performance = Performance::create([
                    'user_id' => $user ? $user->id : null,
                    'assessment_count' => Performance::assessmentCountForUser($request->email),
                    'email' => $request->email,           
                    'question_id' => $question_id,
                    'choice_id' => (int)$choice_id[0],
                    'correct' => Choice::find((int)$choice_id[0])->correct_value,
                    'optional_message' => $request->optional_message
                ]);

                // dd($performance->toArray());

            }
        });

        return redirect()->route('v2.self-assessment.index', [
            'email' => $request->email
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
        return redirect()->route('v2.self-assessment.create',[
            'payload' => [
                'experience' => $request->experience,
                'industry' => $request->industry
            ],
            'email' => $request->email
        ]);
    }
}

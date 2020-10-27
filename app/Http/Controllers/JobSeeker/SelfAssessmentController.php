<?php

namespace App\Http\Controllers\JobSeeker;

use App\User;
use App\Industry;
use App\Performance;
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
        
        $collection = collect($request->choices);
        $results = $count->flatten();
   
  }
     

        $user = User::where('email',$request->email)->first();
       
        Performance::Create([
            'user_id' => $user->id,
            'email' => $request->email,
            'name' => $user->name,               
            'question' => $request->questions,
            'choice' =>$choice,
            'difficulty_level' => $request->difficulty_level,
            'optional_message' => $request->optional_message

        ]);


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
            'payload' => [$request->experience, $request->industry],
            'email' => $request->email
        ]);
    }
}

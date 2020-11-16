<?php

namespace App\Http\Controllers\Admin;

use App\Choice;
use App\Question;
use App\Performance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;


class AssessmentController extends Controller
{
    /**
     * Display a listing of the assessment.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('v2.admin.assessments.index',[
            'questions' => Question::orderBy('created_at', 'desc')->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new assessment.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('v2.admin.assessments.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::transaction(function () use($request){
            foreach($request->questions as $questionData){
                $question = Question::create([
                    'title' => $questionData['title'],
                    'difficulty_level' => $questionData['level']
                ]);

                // Get key of the correct choice
                foreach($questionData['choices'] as $key => $choice){
                    if(isset($choice)){
                        // Check if choice is the correct value
                        $correctKey = (int)$questionData['correct'];

                        if($key == $correctKey){
                            $value = 1;
                        }else{
                            $value = 0;
                        }

                        $question->choices()->create([
                            'value' => $choice,
                            'correct_value' => $value
                        ]);
                    }
                }   
            }
        });

        return redirect()->route('assessments.index');
    }

    /**
     * Display the specified assessment.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified assessment.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('v2.admin.assessments.edit',[
            'question' => Question::findOrFail($id)
        ]);
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
        // dd($request->all());
        DB::transaction(function () use($request, $id){
            $question = Question::findOrFail($id);

            $question->update([
                'title' => $request->title,
                'difficulty_level' => $request->level
            ]);

            foreach($request->choices as $id => $choice_value){
                $choice = Choice::findOrFail($id);

                // Check if choice is the correct value
                $correctKey = (int)$request->correct;

                if($id == $correctKey){
                    $value = 1;
                }else{
                    $value = 0;
                }
                
                $choice->update([
                    'value' => $choice_value,
                    'correct_value' => $value
                ]);
            }
        });

        return redirect()->route('assessments.index');
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

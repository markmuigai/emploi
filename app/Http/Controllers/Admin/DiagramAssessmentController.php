<?php

namespace App\Http\Controllers\Admin;

use App\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class DiagramAssessmentController extends Controller
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
    public function create()
    {
        return view('v2.admin.assessments.images.create');
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
            // dd($request->all()); 
            // Create question
            $question = Question::create([
                'title' => $request->title,
                'difficulty_level' => $request->level
            ]);

            $path = $request->file('image')->storeAs(
                'public/assessments/', $question->id
            );

            // Create question image record
            $question->image()->create([
                'path' => $path,
                'correct_value' => $request->correct
            ]);

        });

        return redirect()->route('assessments.index');
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
        return view('v2.admin.assessments.images.edit', [
            'question' => Question::findorFail($id)
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
        DB::transaction(function () use($request, $id){
            $question = Question::findOrFail($id);

            // Update question record
            $question->update([
                'title' => $request->title,
                'difficulty_level' => $request->level
            ]);

            // Update image record
            $question->image()->update([
                'correct_value' => $request->correct
            ]);
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
        DB::transaction(function () use($id){
            // Fetch question 
            $question = Question::findOrFail($id);

            // Fetch image record
            $questionImage = $question->image;

            // Delete image
            File::delete(public_path().'/storage/'.$questionImage->path);

            // Delete image record
            $questionImage->delete();

            // Delete question record
            $question->delete();
        });

        return redirect()->route('assessments.index');
    }
}

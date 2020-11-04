<?php

namespace App\Http\Controllers\Admin;

use App\Question;
use App\Performance;
use Illuminate\Http\Request;
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
            'questions' => Question::all()
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
        dd($request->all());
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

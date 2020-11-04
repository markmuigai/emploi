<?php

namespace App\Http\Controllers\Admin;

use App\Performance;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AssessmentResultController extends Controller
{
    /**
     * Display a listing of the assessment result
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('v2.admin.assessmentResults.index',[
            'emailsAssessed' => Performance::emailsAssessed()
        ]);
    }

    /**
     * Show the form for creating a new assessment result
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created assessment resultin storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified assessment result
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified assessment result
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified assessment resultin storage.
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
     * Remove the specified assessment resultfrom storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

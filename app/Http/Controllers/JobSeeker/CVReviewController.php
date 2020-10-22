<?php

namespace App\Http\Controllers\JobSeeker;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class CVReviewController extends Controller
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
     * Show the form for uploading the CV
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        dd(parseCV('/home/markmuigai/Desktop/emploi/public/storage/cv-reviews/Kirarit_David_CV.pdf'));
        return view('v2.seekers.cv-review.create');
    }

    /**
     * Reivew uploaded CV
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Get file name
        $name = $request->file('cv')->getClientOriginalName();

        // Store CV
        $path = public_path()."/storage/".$request->file('cv')->storeAs('cv-reviews', $name);

        dd($path);

        // Parse CV
        $text = parseCV($path);


        // Parse CV
        // return $request->file('cv');
        // dd($request->file('cv')->path());
        //

        return redirect()->back();
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

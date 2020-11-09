<?php

namespace App\Http\Controllers\Employer;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Auth;

use App\Employer;
use App\SavedProfile;
use App\Seeker;

class SavedProfileController extends Controller
{

    public function __construct()
    {
        $this->middleware('employer');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('employers.savedProfiles')
                ->with('profiles',Auth::user()->employer->savedProfiles);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $employer = Auth::user()->employer;
        $employer->saveProfile(Seeker::findOrFail($request->seeker_id));
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
    public function destroy($id, Request $request)
    {
        $sp = SavedProfile::findOrFail($request->id);
        if($sp->employer_id == Auth::user()->employer->id)
            $sp->delete();
        return redirect()->back();
    }
}

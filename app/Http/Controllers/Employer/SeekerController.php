<?php

namespace App\Http\Controllers\Employer;

use App\Seeker;
use App\Industry;
use App\Location;
use App\EducationLevel;
use Illuminate\Http\Request;
use App\Utils\CollectionHelper;
use App\Http\Controllers\Controller;

class SeekerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Check for filters
        if(isset(request()->industry) || isset(request()->location ) || isset(request()->educationLevel) || isset(request()->sort)){
            $seekers = CollectionHelper::paginate(Seeker::filteredSeekers(request()->all()), 10);
        }else{
            $seekers = Seeker::orderBy('featured')->paginate(10);
        }

        return view('v2.employers.seekers.index', [
            'seekers' => $seekers,
            'industries' => Industry::all(),
            'locations' => Location::all(),
            'educationLevels' => EducationLevel::all()
        ]);
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
        //
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

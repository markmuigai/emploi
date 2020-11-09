<?php

namespace App\Http\Controllers\Admin;

use App\Referee;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RefereeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function search()
    {
        // Search for job seeker
        $referees = Referee::where('name', 'like', $request->name)->get();

        return view('admins.referees')
                    ->with('referees',$referees);
    }
}

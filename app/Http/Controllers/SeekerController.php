<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SeekerController extends Controller
{
    public function dashboard(Request $request)
    {
    	return view('seekers.dashboard');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Covid19Controller extends Controller
{
    public function index(){
    	return view('pages.covid19');
    }
}

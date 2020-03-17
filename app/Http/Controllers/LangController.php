<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Config;
use Session;

class LangController extends Controller
{
    public function index(Request $request){
		if(isset($request->language) && array_key_exists($request->language, Config::get('languages')))
    		Session::put('applocale', $request->language);
    	return redirect('/');
	}
}

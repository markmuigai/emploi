<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function browserSessions(Request $request, $endpoint){
    	switch ($endpoint) {
    		case 'disable-seeker-register-popup':
    			$request->session()->put('disable-seeker-register-popup', true);
    			break;
    		
    		default:
    			# code...
    			break;
    	}
    }
}

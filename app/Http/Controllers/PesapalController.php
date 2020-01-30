<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PesapalController extends Controller
{
    public function makePayment(Request $request)
    {
    	return view('pesapal.index');
    }
}

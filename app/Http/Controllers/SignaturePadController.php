<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class SignaturePadController extends Controller
{
    public function index()
    {
    	return view('signaturePad');
    }

    public function upload(Request $request)
    {
	    $user= Auth::user();

	    $folderPath = public_path('storage/signatures/');
	  
	    $image_parts = explode(";base64,", $request->signed);
	        
	    $image_type_aux = explode("image/", $image_parts[0]);
	      
	    $image_type = $image_type_aux[1];
	      
	    $image_base64 = base64_decode($image_parts[1]);
	      
	    $file = $folderPath . uniqid() .'[' .$user->email. '].'.$image_type;
	    file_put_contents($file, $image_base64); 
	    return response()->download($file,$user->email."_signature.png");
    }
}
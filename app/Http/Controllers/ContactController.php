<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Contact;
use App\Location;
use App\Post;
use App\User;

class ContactController extends Controller
{
    public function save(Request $request)
    {
    	//return $request->all();
    	$code = strtoupper(User::generateRandomString(10));
    	$c = Contact::create([
    		'code' => $code,
    		'name' => $request->name, 
    		'email' => $request->email, 
    		'phone_number' => $request->phone, 
    		'message' => $request->message
    	]);

    	if(isset($c->id))
    	{
    		//send emails
    		return view('contacts.success')
    				->with('code',$code);
    	}

    	return view('contacts.failed');
    }

    public function index(Request $request)
    {
        return view('welcome')
                ->with('posts',Post::recent(5))
                ->with('locations',Location::top());
    }
}

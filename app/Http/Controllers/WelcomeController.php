<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Location;
use App\Post;

class WelcomeController extends Controller
{
    public function index(Request $request)
    {
        return view('v2/welcome')
                ->with('posts',Post::featured(20))
                ->with('locations',Location::top());
    }
}

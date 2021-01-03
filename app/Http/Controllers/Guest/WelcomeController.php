<?php

namespace App\Http\Controllers\Guest;

use App\Post;
use App\Location;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WelcomeController extends Controller
{
    /**
     * Display the home page
     */
    public function index(Request $request)
    {
        return view('v2.welcome')
                ->with('posts',Post::featured(20))
                ->with('locations',Location::top());
    }
}

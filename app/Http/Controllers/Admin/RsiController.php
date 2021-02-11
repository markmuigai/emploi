<?php

namespace App\Http\Controllers\Admin;

use App\JobApplication;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RsiController extends Controller
{
    /**
     * Show all applications with their equivalent scoring metrics
     */
    public function index()
    {
        $applications = JobApplication::with('user', 'post');
        
        return view('v2.admin.rsi.index', [
            'applications' => $applications->orderBy('created_at', 'desc')->get()
        ]);
    }
}

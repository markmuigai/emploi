<?php

namespace App\Http\Controllers\Employer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    // Employer Landing Page after login
    public function index(){
        return view('v2.employers.dashboard.index');
    }
}

<?php

namespace App\Http\Controllers\Employer;

use App\Seeker;
use App\Industry;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    // Employer Landing Page after login
    public function index(){
        return view('v2.employers.dashboard.index',[
            'recentApplications' => auth()->user()->employer->recentApplications(),
            'featuredSeekers' => Seeker::getFeaturedSeekers(),
            'industries' => Industry::active(),
            'industry' => ''
        ]);
    }
}

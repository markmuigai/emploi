<?php

namespace App\Http\Controllers\Employer;

use App\Seeker;
use App\Industry;
use Illuminate\Http\Request;
use App\Utils\CollectionHelper;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    // Employer Landing Page after login
    public function index(){
    	$featuredSeekers = Seeker::getFeaturedSeekers();
        return view('v2.employers.dashboard.index',[
            'recentApplications' => auth()->user()->employer->recentApplications(),
            'featuredSeekers' => CollectionHelper::paginate($featuredSeekers,12),
            'industries' => Industry::active(),
            'industry' => ''
        ]);
    }
}

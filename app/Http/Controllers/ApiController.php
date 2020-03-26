<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Company;
use App\Post;
use App\Seeker;

class ApiController extends Controller
{
    public function getTotalJobs(Request $request)
    {
    	return count(Post::all());

    }

    public function getTotalCandidates(Request $request)
    {
    	return count(Seeker::all()) * 2;
    	
    }

    public function getTotalCompanies(Request $request)
    {
    	return count(Company::all()) * 3;
    }

    public function getTotalHiringCompanies(Request $request)
    {
    	return count(Company::getHiringCompanies2(0)) * 3;
    }
    
}

<?php

namespace App\Http\Controllers\Admin;

use App\JobApplication;
use Illuminate\Http\Request;
use App\Utils\CollectionHelper;
use App\Http\Controllers\Controller;

class RsiController extends Controller
{
    /**
     * Show all applications with their equivalent scoring metrics
     */
    public function index()
    {
        $applications =  JobApplication::with('user', 'post')->take(20)->get();


        return view('v2.admin.rsi.index', [
            'applications' => CollectionHelper::paginate($applications->sortByDesc('rsiScore'), 10),
            'applications_count' => $applications->count(),
            'avg' => round(JobApplication::averageRsiScore())
        ]);
    }
}

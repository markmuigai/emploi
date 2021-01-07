<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MetricsController extends Controller
{
    /**
     * Metrics landing page
     */
    public function index()
    {
        return view('v2.admin.metrics.index');
    }
}

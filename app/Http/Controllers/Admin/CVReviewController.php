<?php

namespace App\Http\Controllers\Admin;

use App\CVReviewResult;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CVReviewController extends Controller
{
    /**
     * View all results
     */
    public function index(){
        return view('v2.admin.cvReview.index',[
            'cvReviews' => CVReviewResult::with('recommendations')->get(),
            'count' => CVReviewResult::all()->count(),
            'avg' => ceil(CVReviewResult::all()->pluck('score')->avg()),
            'missingKeyword' => CVReviewResult::missingKeyword()
        ]);
    }

     /**
      * Show a single result
      */
      public function show($id){
        return view('v2.admin.cvReview.show',[
            'review' => CVReviewResult::findOrFail($id)
        ]);
      }
}

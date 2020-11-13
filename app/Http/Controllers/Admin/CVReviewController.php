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
            'cvReviews' => CVReviewResult::with('recommendations')->get()
        ]);
    }

     /**
      * Show a single result
      */
      public function show(CVReviewResult $review){
        return view('v2.admin.cvReview.show',[
            'cvReview' => $review
        ]);
      }
}

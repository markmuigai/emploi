<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\CVReviewResult;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CVReviewController extends Controller
{
    /**
     * View all results
     */
    public function index(Request $request)  

    { 
        //sort cv review results by date 
        if(isset($request->sortbydate)){
                $cvReview = CVReviewResult::filterByDate($request->sortbydate);
            }else{
               $cvReview = CVReviewResult::with('recommendations')->orderBy('id','DESC');
            }       
        return view('v2.admin.cvReview.index',[
            'cvReviews' => $cvReview->paginate(15),
            'count' => $cvReview->count(),
            'avg' => ceil($cvReview->pluck('score')->avg()),
            'missingKeyword' => CVReviewResult::missingKeyword(),
            'convertedEmails' => CVReviewResult::convertedEmails()
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


      /**
       * Download CV
       */
      public function downloadCV($id){
        $review = CVReviewResult::findOrFail($id);
        
        return response()->download($review->path);
      }
}

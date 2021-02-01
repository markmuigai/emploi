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
        if(isset($request->sortbydate))
            switch ($request->sortbydate) {
                case 'today':
                $cvReview =CVReviewResult::where('created_at', '>', Carbon::now()->subDays(1))->with('recommendations')->orderBy('id','DESC');
                    break;

                case 'last7':
                    $cvReview =CVReviewResult::where('created_at', '>', Carbon::now()->subDays(7))->with('recommendations')->orderBy('id','DESC');
                    break;
                case 'thisMonth':
                    $cvReview =CVReviewResult::where('created_at', '>', Carbon::now()->subDays(30))->with('recommendations')->orderBy('id','DESC');
                    break;
                
                default:
                    break;

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

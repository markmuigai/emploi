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
                    $sort_by_date =CVReviewResult::where('created_at', '=', Carbon::today())->pluck('user_id')->toArray();
                    // return $sort_by_date;
                    break;

                case 'last7':
                    $sort_by_date =CVReviewResult::where('created_at', '>', Carbon::now()->subDays(7))->pluck('user_id')->toArray();
                    // return $sort_by_date;
                    break;
                case 'thisMonth':
                    $sort_by_date =CVReviewResult::where('created_at', '>', Carbon::now()->subDays(30))->pluck('user_id')->toArray();
                    // return $sort_by_date;
                    break;
                
                default:
                    break;

      } 

      if(isset($request->sortbydate)){
          return view('v2.admin.cvReview.index',[
                'cvReviews' => CVReviewResult::with('recommendations')->whereIn('user_id',$sort_by_date)->orderBy('id','DESC')->paginate(15),
                'count' => CVReviewResult::all()->count(),
                'avg' => ceil(CVReviewResult::all()->pluck('score')->avg()),
                'missingKeyword' => CVReviewResult::missingKeyword()
            ]);
          }

          //all cv review results
        return view('v2.admin.cvReview.index',[
            'cvReviews' => CVReviewResult::with('recommendations')->orderBy('id','DESC')->paginate(15),
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

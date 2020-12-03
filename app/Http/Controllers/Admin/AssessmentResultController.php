<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Carbon\Carbon;
use App\Performance;
use Illuminate\Http\Request;
use App\Utils\CollectionHelper;
use App\Http\Controllers\Controller;

class AssessmentResultController extends Controller
{
    /**
     * Display a listing of the assessment result
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
      //   //sort cv review results by date 
      //   if(isset($request->sortbydate))
      //       switch ($request->sortbydate) {
      //           case 'today':
      //               $sort_by_date =Performance::where('created_at', '=', Carbon::today())->pluck('email')->toArray();
      //               // return $sort_by_date;
      //               break;

      //           case 'last7':
      //               $sort_by_date =Performance::where('created_at', '>', Carbon::now()->subDays(7))->pluck('email')->toArray();
      //               // return $sort_by_date;
      //               break;
      //           case 'thisMonth':
      //               $sort_by_date =Performance::where('created_at', '>', Carbon::now()->subDays(30))->pluck('email')->toArray();
      //               // return $sort_by_date;
      //               break;
                
      //           default:
      //               break;

      // } 

      // if(isset($request->sortbydate)){
      //       return view('v2.admin.assessmentResults.index',[
      //       'emailsAssessed' => CollectionHelper::paginate(Performance::emailsAssessed()->whereIn('email',$sort_by_date),10),
      //       'avg' => Performance::recentScoresAvg(),
      //   ]);
      //   }
        return view('v2.admin.assessmentResults.index',[
            'emailsAssessed' => CollectionHelper::paginate(Performance::emailsAssessed(),10),
            'avg' => Performance::recentScoresAvg(),
        ]);
    }

    /**
     * Show the form for creating a new assessment result
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created assessment resultin storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified assessment result
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        // Show assessment
        return view('v2.admin.assessmentResults.show',[
            'score' => Performance::recentScore(request()->email),
            'performances' => Performance::LatestAssessment(request()->email),
            'user' => User::where('email', request()->email)->get()
        ]);
    }

    /**
     * Show the form for editing the specified assessment result
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified assessment resultin storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified assessment resultfrom storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

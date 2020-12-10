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
        if(isset($request->sortbydate)){
            return view('v2.admin.assessmentResults.index',[
                'emailsAssessed' => CollectionHelper::paginate(Performance::getByDate($request->sortbydate),10),
                'assessments_count' => Performance::emailsAssessed()->count(),
                'avg' => Performance::recentScoresAvg(),
            ]);
        }

        return view('v2.admin.assessmentResults.index',[
            'emailsAssessed' => CollectionHelper::paginate(Performance::emailsAssessed(),10),
            'assessments_count' => Performance::emailsAssessed()->count(),
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

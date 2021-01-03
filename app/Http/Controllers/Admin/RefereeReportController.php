<?php

namespace App\Http\Controllers\Admin;

use PDF;
use App\Referee;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RefereeReportController extends Controller
{
    /**
    * Download the specified report.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function download(Request $request)
    {
        // Get referee
        $referee = Referee::getBySlug($request->slug);

        // Load pdf
        $pdf = PDF::loadView('v2.admin.reports.referee', [
            'referee' => $referee
        ]);

        return $pdf->download($referee->name.'-referee-report.pdf');
    }

    /**
     * Test pdf layout
     */
    public function show()
    {
        return view('v2.admin.reports.test',[
            'referee' => Referee::first()
        ]);
    }
}

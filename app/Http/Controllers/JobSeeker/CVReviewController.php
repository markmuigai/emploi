<?php

namespace App\Http\Controllers\JobSeeker;

use Validator;
use Spatie\PdfToText\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class CVReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('v2.seekers.cv-review.index',[
            'result' => collect(request()->result)
        ]);
    }

    /**
     * Show the form for uploading the CV
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('v2.seekers.cv-review.create');
    }

    /**
     * Reivew uploaded CV
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        // Custom validator
        $validator = Validator::make($request->all(), [
            'cv'  =>  ['mimes:doc,pdf,docx'] 
        ]);

        // Get file prefix dynamically
        $prefix = Storage::disk('local')->getDriver()->getAdapter()->getPathPrefix();

        // Store CV
        $path = $prefix.$request->file('cv')->store('cv-reviews');

        // Get cv text
        $rawCV = parseCV($path); 

        // Append to custom validation 
        if($rawCV == 'incorrect password'){
            // After validation hook
            $validator->after(function ($validator) {
                $validator->errors()->add('cv', 'Upload an unlocked pdf');
            });
        }

        // Exit if validation fails
        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }


        // Get Formatted cv
        $cleanCV = cleanCV($rawCV);

        // Get score
        $result = reviewCV($cleanCV);

        //delete CV after parsing
        File::delete($path);
        
        // dd($result->toArray());
        return redirect()->route('v2.cv-review.index',[
            'result'=> $result->toArray()
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
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
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

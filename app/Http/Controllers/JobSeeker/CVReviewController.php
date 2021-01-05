<?php

namespace App\Http\Controllers\JobSeeker;

use Validator;
use App\User;
use App\Seeker;
use App\CVReviewResult;
use Spatie\PdfToText\Pdf;
use App\CVImprovementArea;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

use App\Notifications\EditingRequest;

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
            'result' => auth()->user()->cvReviewResults->last()
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
        $user=Auth()->user();
        if($request->cv->getType() == false){
            return redirect()->back()->withErrors(['Your file exceeds 4mb max size']);
        }

        if(CVReviewResult::canDoReview() == false){
            return view('v2.seekers.cv-review.cannot')->withErrors(['Please note that you can only do another free CV review after 3 days']);
        }
        
        // Custom validator
        $validator = Validator::make($request->all(), [
            'cv'  =>  ['mimes:doc,pdf,docx'] 
        ]);

        // Exit if validation fails
        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }

        // Get cv file name
        $name = $request->file('cv')->getClientOriginalName();

        // Get file prefix dynamically
        $prefix = Storage::disk('local')->getDriver()->getAdapter()->getPathPrefix();

        // Store CV
        $path = $prefix.$request->file('cv')->storeAs('cv-reviews', str_replace(' ', '_', $name));

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

        DB::transaction(function () use($name, $cleanCV, &$result, $path){
            // Store score
            $reviewResult = CVReviewResult::create([
                'name' => $name,
                'user_id' => auth()->user()->id,
                'email' => auth()->user()->email,
                'output' => 'CV Parsed Successfully',
                'cvText' => $cleanCV,
                'score' => $result->get('score'),
                'path' => $path
            ]);

            // Get recommendations
            $recommendations = CVImprovementArea::recommend($result->get('score'));
    
            if($result->get('recommendations')->isNotEmpty()){
                // Initialize Missing keywords recommendation
                $missingKeywords = '';

                foreach($result->get('recommendations') as $keyword){
                    // Concatenate all missing keywords
                    $missingKeywords = $missingKeywords.', '.$keyword;
                }

                // Store missing keywords string as a recommendation
                $reviewResult->recommendations()->create([
                    'name' => 'Ensure that your cv has the following sections'.$missingKeywords,
                ]);
            }

            // Store recommendations
            foreach($recommendations as $rec){
                // Store recommendations
                $reviewResult->recommendations()->create([
                    'name' => $rec->name,
                ]);
            }
        });

         //send slack notification
          if (app()->environment() === 'production') {        
            Seeker::first()->notify(new EditingRequest($user->name.' reviewed CV using auto review'));
        }  
        
        // dd($result->toArray());
        return redirect()->route('v2.cv-review.index');
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

<?php

namespace App\Http\Controllers\Admin;

use Validator;
use App\CVTest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class cvTestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('v2.admin.cvTest.index',[
            'cvTests' => CVTest::orderBy('created_at', 'desc')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('v2.admin.cvTest.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        foreach($request->all()['files'] as $cv){
            $name = $cv->getClientOriginalName();

            if($cv->getType() == false){
                CVTest::create([
                    'name' => $name,
                    'output' => 'Your file exceeds 4mb max size',
                    'cvText' => '',
                    'score' => 0
                ]);

                continue;
            }
            
            $allowedExtensions = collect(['doc', 'pdf', 'docx']);

            // Exit if validation fails
            if ($allowedExtensions->search($cv->extension()) == false) {
                CVTest::create([
                    'name' => $name,
                    'output' => 'The cv must be a file of type: doc, pdf, docx',
                    'cvText' => '',
                    'score' => 0
                ]);

                continue;
            }
    
            // Get file prefix dynamically
            $prefix = Storage::disk('local')->getDriver()->getAdapter()->getPathPrefix();
    
            // Store CV
            $path = $prefix.$cv->store('cv-reviews');
    
            // Get cv text
            $rawCV = parseCV($path); 
    
            // Append to custom validation 
            if($rawCV == 'incorrect password'){
                // After validation hook
                CVTest::create([
                    'name' => $name,
                    'output' => 'Upload an unlocked pdf',
                    'cvText' => '',
                    'score' => 0
                ]);
                
                continue;
            }

            // Get Formatted cv
            $cleanCV = cleanCV($rawCV);
    
            // Get score
            $result = reviewCV($cleanCV);
    
            CVTest::create([
                'name' => $name,
                'output' => 'CV Parsed Successfully',
                'cvText' => $cleanCV,
                'score' => $result->get('score')
            ]);

            //delete CV after parsing
            File::delete($path);
        }

        return redirect()->route('cvTests.index');
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

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Storage;

use App\Parser;

class CvParserController extends Controller
{
    public function uploadCv()
    {
    	return view('read_cv.upload');
    }

    public function parseCv(Request $request)
    {
        if(isset($request->url))
        {
            $request->validate([
                'url'  =>  ['url']
            ]);

            $parser = new Parser($request->url);
            $final = $parser->readContents();

            return view('read_cv.parsed')
                ->with('resume',$final);
        }
        else
        {
            $request->validate([
                'resume'  =>  ['mimes:pdf,docx','max:51200']
            ]);

            $storage_path = '/public/parser';
            $resume_url = Storage::put($storage_path, $request->resume);

            $path = Storage::path($resume_url);

            $parser = new Parser($path);

            $final = $parser->readContents();

            if(file_exists($path))
                unlink($path);

            

            return view('read_cv.parsed')
                    ->with('resume',$final);
        }

    	

    }
}

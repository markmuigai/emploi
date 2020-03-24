<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Storage;

class CvParserController extends Controller
{
    public function uploadCv()
    {
    	return view('read_cv.upload');
    }

    public function parseCv(Request $request)
    {
    	$request->validate([
            'resume'  =>  ['mimes:pdf,docx','max:51200']
        ]);

        $storage_path = '/public/parser';
        $resume_url = Storage::put($storage_path, $request->resume);

        $path = Storage::path($resume_url);

        $script = "pyresparser -f $path";

        $ret = shell_exec($script);

        $ret = explode("[{", $ret);

        if(count($ret) == 0)
            die("Parse Failed");



        $ret = "[{".$ret[1];

        //$ret = json_encode($ret);

        //$ret = json_encode($ret, JSON_PRETTY_PRINT);

        $ret = str_replace("\\n", '', $ret);

        $keys = [];
        $values = [];

        
        $ret = explode("':", $ret);

        

        $key = explode("[{'", $ret[0]);
        $keys[] = $key[1];

        for($g=1; $g<count($ret)-1; $g++)
        {
            $pair = $ret[$g];
            $pair = explode("\n", $pair);



            $key = explode("'", $pair[count($pair)-1]);

            for($h=0; $h<count($pair)-1; $h++)
            {
                $contents = implode("\n", $pair[$h]);
            }

            

            $keys[] = $key[1];
        }

        //dd($keys);

        dd(array($keys,$ret));

        //json_encode($ret);
        foreach (json_decode($ret, true) as $item) {
            dd($item);
        }
        json_decode($ret);

        dd($ret["college_name"]);

        dd($ret);

        dd($ret);

        dd($ret->total_experience);

        dd(isset($ret->total_experience));

        dd(array_key_exists('total_experience', $ret));

        return view('read_cv.parsed')
                ->with('resume',$ret);

    }
}

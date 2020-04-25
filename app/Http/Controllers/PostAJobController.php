<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostAJobController extends Controller
{
    public function postJob(){
    	return view('employers.postJob.index');
    }

    public function advertise(Request $request, $industry_name = false){
        if($industry_name)
        {
            $industry = Industry::where('slug',$industry_name)
                        ->orWhere('name',$industry_name)
                        ->orWhere('name','like',"%$industry_name%")
                        ->first();
            if(isset($industry->id))
            {
                if($industry->slug !== $industry_name)
                    return redirect('/employers/advertise/'.$industry->slug);
                return view('employers.advertiseIndustry')
                        ->with('industry',$industry); 
            }
        }
        return view('employers.advertise'); 
    }
}

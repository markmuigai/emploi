<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CvEditRequest extends Model
{
    protected $fillable = [
        'email','industry_id', 'name','message','slug','original_url','submitted_url','status','submitted_on','cv_editor_id','assigned_on','phone_number'
    ];

    public function industry(){
    	return $this->belongsTo(Industry::class);
    }

    public function cvEditor(){
    	return $this->belongsTo(CvEditor::class);
    }

    // public static function getAvailableCvEditRequests()
    // {
    // 	return CvEditRequest::where('assigned_on',null)->orderBy('id','DESC')->get();
    // }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CvEditor extends Model
{
    protected $fillable = [
        'user_id', 'industry_id','status'
    ];

    public function user(){
    	return $this->belongsTo(User::class);
    }

    public function industry(){
    	return $this->belongsTo(Industry::class);
    }

    public function cvEditRequests(){
        return $this->hasMany(CvEditRequest::class);
    }

    public function pendingCvEditRequests(){
    	// $arr = [];
    	// $all = $this->cvEditRequests;
    	// for($i=0; $i<count($all); $i++)
    	// {

    	// }
    }


}

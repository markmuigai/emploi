<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SeekerApplication extends Model
{
    protected $fillable = [
        'job_application_id','job_application_referee_id'
    ];

    public function jobApplication(){
    	return $this->belongsTo(JobApplication::class);
    }

    public function jobApplicationReferee(){
    	return $this->belongsTo(JobApplicationReferee::class,'job_application_referee_id');
    }
}

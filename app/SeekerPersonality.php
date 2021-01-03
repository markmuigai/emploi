<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SeekerPersonality extends Model
{
    protected $fillable = [
        'job_application_id','personality_id'
    ];

    public function application(){
    	return $this->belongsTo(JobApplication::class,'job_application_id');
    }

    public function personality(){
    	return $this->belongsTo(Personality::class,'personality_id');
    }
}

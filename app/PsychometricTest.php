<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PsychometricTest extends Model
{
    protected $fillable = [
        'job_application_id','score'
    ];

    public function application(){
    	return $this->belongsTo(JobApplication::class,'job_application_id');
    }
}

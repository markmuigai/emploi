<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModelSeekerCourse extends Model
{
    protected $fillable = [
        'model_seeker_id','course_id'
    ];

    public function course(){
    	return $this->belongsTo(Course::class);
    }

    public function modelSeeker(){
    	return $this->belongsTo(ModelSeeker::class);
    }
}

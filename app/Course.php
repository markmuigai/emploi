<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = [
        'name', 'education_level_id'
    ];

    public function educationLevel(){
    	return $this->belongsTo(EducationLevel::class);
    }

    public function modelSeekerCourses(){
    	return $this->hasMany(ModelSeekerCourse::class);
    }
}

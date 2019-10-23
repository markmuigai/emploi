<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModelSeekerSkill extends Model
{
    protected $fillable = [
        'model_seeker_id','skill_id'
    ];

    public function skill(){
    	return $this->belongsTo(Skill::class);
    }

    public function modelSeeker(){
    	return $this->belongsTo(ModelSeeker::class,'model_seeker_id');
    }
}

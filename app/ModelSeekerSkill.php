<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModelSeekerSkill extends Model
{
    protected $fillable = [
        'model_seeker_id','skill_id','weight'
    ];

    public function skill(){
    	return $this->belongsTo(Skill::class);
    }

    public function modelSeeker(){
    	return $this->belongsTo(ModelSeeker::class,'model_seeker_id');
    }

    public function getWeightNameAttribute(){
    	if($this->weight == 3)
    		return 'Necessary';
    	if($this->weight == 2)
    		return 'Desired';
    	if($this->weight == 1)
    		return 'Bonus';
    }
}

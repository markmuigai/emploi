<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModelSeekerSkill extends Model
{
    protected $fillable = [
        'model_seeker_id','industrySkill_id','weight'
    ];

    public function industrySkill(){
    	return $this->belongsTo(IndustrySkill::class,'industrySkill_id');
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

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModelSeekerPersonalityTrait extends Model
{
    protected $fillable = [
        'model_seeker_id', 'personality_trait_id', 'weight'
    ];

    public function modelSeeker(){
    	return $this->belongsTo(ModelSeeker::class,'model_seeker_id');
    }

    public function personalityTrait(){
    	return $this->belongsTo(PersonalityTrait::class);
    }

    public function getWeightNameAttribute(){
    	if($this->weight == 3)
    		return 'Very Important';
    	if($this->weight == 2)
    		return 'Important';
    	if($this->weight == 1)
    		return 'Bonus';
    }
}

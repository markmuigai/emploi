<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SeekerPersonalityTrait extends Model
{
    protected $fillable = [
        'seeker_id', 'referee_id', 'personality_trait_id','weight'
    ];

    public function seeker(){
    	return $this->belongsTo(Seeker::class);
    }

    public function referee(){
    	return $this->belongsTo(Referee::class);
    }

    public function personalityTrait(){
    	return $this->belongsTo(PersonalityTrait::class);
    }
}

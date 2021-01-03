<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Personality extends Model
{
    protected $fillable = [
        'name'
    ];

    public function seekerPersonalities(){
    	return $this->hasMany(SeekerPersonality::class);
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    protected $fillable = [
        'name', 'keywords'
    ];

    public function modelSeekerSkills(){
    	return $this->hasMany(ModelSeekerSkill::class);
    }

    public function seekerSkills(){
    	return $this->hasMany(SeekerSkill::class);
    }
}

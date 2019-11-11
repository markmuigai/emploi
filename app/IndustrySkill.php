<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IndustrySkill extends Model
{
    protected $fillable = [
        'name','industry_id'
    ];

    public function industry(){
    	return $this->belongsTo(Industry::class);
    }

    public function seekerIndustrySkills(){
        return $this->hasMany(SeekerIndustrySkill::class);
    }

    public function modelSeekerIndustrySkills(){
        return $this->hasMany(ModelSeekerSkill::class);
    }
}

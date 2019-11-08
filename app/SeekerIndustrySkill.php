<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SeekerIndustrySkill extends Model
{
    protected $fillable = [
        'industry_skill_id', 'seeker_id', 'referee_id', 'weight'
    ];

    public function industrySkill(){
    	return $this->belongsTo(IndustrySkill::class);
    }

    public function seeker(){
    	return $this->belongsTo(Seeker::class);
    }

    public function referee(){
    	return $this->belongsTo(Referee::class);
    }
}

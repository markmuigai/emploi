<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SeekerSkill extends Model
{
    protected $fillable = [
        'seeker_id','skill_id'
    ];

    public function skill(){
    	return $this->belongsTo(IndustrySkill::class,'skill_id');
    }

    public function seeker(){
    	return $this->belongsTo(Seeker::class, 'seeker_id');
    }
}

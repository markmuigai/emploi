<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OtherSeekerSkill extends Model
{
    protected $fillable = [
        'seeker_id', 'referee_id', 'name'
    ];

    public function seeker(){
    	return $this->belongsTo(Seeker::class);
    }

    public function referee(){
    	return $this->belongsTo(Referee::class);
    }
}

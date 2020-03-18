<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobApplicationReferee extends Model
{
    protected $fillable = [
        'seeker_id','referee_id','reason_for_leaving','strengths','weaknesses','discplinary_cases','professionalism','would_you_rehire','comments','status'
    ];

    public function seeker(){
    	return $this->belongsTo(Seeker::class);
    }

    public function referee(){
    	return $this->belongsTo(Referee::class);
    }

    public function seekerApplications(){
    	return $this->hasMany(SeekerApplication::class);
    }
     
}

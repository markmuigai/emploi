<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Referee extends Model
{
    protected $fillable = [
        'seeker_id','name', 'email', 'phone_number','organization','position_held','relationship','slug','seeker_job_title','responsibilities','status'
    ];

    public function seeker(){
    	return $this->belongsTo(Seeker::class);
    }

    public function jobApplicationReferee(){
        return $this->hasOne(JobApplicationReferee::class);
    }

    public function getReadyAttribute(){
    	if(isset($this->jobApplicationReferee->id))
    		return true;
    	return false;
    }
}

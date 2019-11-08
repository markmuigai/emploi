<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Referee extends Model
{
    protected $fillable = [
        'seeker_id','name', 'email', 'phone_number','organization','position_held','relationship','slug','status'
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

    public function seekerJobs(){
        return $this->hasMany(SeekerJob::class);
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SeekerJob extends Model
{
    protected $fillable = [
        'seeker_id', 'referee_id', 'job_title', 'start_date','end_date', 'meeting_targets','work_performance','work_quality'
    ];

    public function seeker(){
    	return $this->belongsTo(Seeker::class);
    }

    public function referee(){
    	return $this->belongsTo(Referee::class);
    }
}

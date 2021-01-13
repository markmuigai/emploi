<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Interview extends Model
{
    protected $fillable = [
        'date','description','type', 'interview_mode', 'location', 'job_application_id'
    ];

    public function formattedDate(){
        return Carbon::parse($this->date)->toDateString().'T'.Carbon::parse($this->date)->toTimeString();
    }

    /**
     * Get the associated job application
     */
    public function jobApplication(){
        return $this->belongsTo('App\JobApplication', 'job_application_id');
    }

    /**
     * Get the associated user
     */
    public function user()
    {
        return $this->jobApplication->user;
    }

    /**
     * Get the interview date string format
     */
    public function getDateAttribute($value)
    {
        return Carbon::parse($value)->toDayDateTimeString();
    }

    /**
     * Get the associated interview evaluation
     */
    public function evaluation()
    {
        return $this->hasOne('App\EvaluationResult', 'interview_id');
    }
}

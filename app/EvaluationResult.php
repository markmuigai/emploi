<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EvaluationResult extends Model
{
    protected $fillable = [
        'application_id',
        'interview_id',
        'rating',
        'user_id'
    ];

    /**
     * Get the associated interviewer
     */
    public function interviewer()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    /**
     * Get the associated evaluation criteria results
     */
    public function criteriaResults()
    {
        return $this->hasMany('App\EvaluationCriteriaResult', 'evaluation_result_id');
    }

    /**
     * Get the associated interview
     */
    public function interview()
    {
        return $this->belongsTo('App\Interview');
    }
}

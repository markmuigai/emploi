<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Performance extends Model
{
       protected $fillable = [
        'user_id', 'choice_id', 'question_id', 'email', 'correct', 'optional message', 'assessment_count'
    ];

    /**
     * Get the associated question
     */
    public function question()
    {
        return $this->belongsTo('App\Question');
    }

    /**
     * Get the associated users performance
     */
    public static function performanceFor($email)
    {
        return User::where('email', $email)->first();
    }

    /**
     * Get the selected choice
     */
    public function selectedChoice()
    {
        return $this->belongsTo('App\Choice','choice_id');
    }

    /**
     * Get performance scores associated with an email
     */
    public function scopeAssessmentsForUser($query, $email)
    {
        return $query->where('email', $email)->get();
    }

    /**
     * Get assessments for a certain count
     */
    public static function scopeLatestAssessment($query, $email)
    {
        // All performance records for a user
        $allAssessments = Performance::assessmentsForUser($email);

        // Get the latest assessment
        $latest = $allAssessments->pluck('assessment_count')->max();

        return $query->where('email', $email)->where('assessment_count', $latest)->get();
    }

    /**
     * Get most recent score
     */
    public static function recentScore($email)
    {
        return Performance::latestAssessment($email)->where('correct',1)->count();
    }

    /**
     * Get all emails that have done an assessment
     */
    public static function emailsAssessed()
    {
        return Performance::all()->unique('email')->pluck('email');
    }
}

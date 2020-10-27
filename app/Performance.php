<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Performance extends Model
{
       protected $fillable = [
        'user_id', 'choice_id', 'question_id', 'email', 'correct', 'optional message', 'assessment_count'
    ];

    
    public function scopeGetAssessmentCountForUser($query, $email)
    {
        // Get assessment results for the associated email
        $results = $query->where('email', $email)->get();

        if($results->isEmpty()){
            return 1;            
        }else{
            return $results->pluck('assessment_count')->max()+1;
        }
    }
}

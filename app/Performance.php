<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Performance extends Model
{
       protected $fillable = [
        'user_id', 'choice_id', 'question_id', 'email', 'correct', 'optional message', 'assessment_count'
    ];

    /**
     * Get the n.o of times a user will have done an assessment after completing one
     */
    public function scopeAssessmentCountForUser($query, $email)
    {
        // Get assessment results for the associated email
        $results = $query->where('email', $email)->get();

        // If they have never been assessed
        if($results->isEmpty()){
            return 1;            
        }else{
            return $results->pluck('assessment_count')->max()+1;
        }
    }
}

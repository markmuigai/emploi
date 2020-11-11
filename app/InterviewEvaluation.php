<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InterviewEvaluation extends Model
{
    protected $fillable = [
        'candidate_id','interview_id','metric_id','rating_id'
    ];
}

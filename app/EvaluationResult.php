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
}

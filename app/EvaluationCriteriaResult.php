<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EvaluationCriteriaResult extends Model
{
    protected $fillable = [
        'evaluation_result_id',
        'evaluation_criteria_id',
        'rating',
        'comment'
    ];
}

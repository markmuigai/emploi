<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EvaluationCriteriaResult extends Model
{
    protected $fillable = [
        'evaluation_id',
        'evaulation_criteria_id',
        'rating',
        'comment'
    ];
}

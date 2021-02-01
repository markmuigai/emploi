<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ApplicationAssessment extends Model
{
    protected $table = 'application_assessment';

    protected $fillable = [
        'application_id',
        'test_result_id'
    ];
}

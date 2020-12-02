<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Interview extends Model
{
    protected $fillable = [
        'date','description','type', 'modeOfInterview', 'location', 'job_application_id'
    ];
}

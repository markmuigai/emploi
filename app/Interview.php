<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Interview extends Model
{
    protected $fillable = [
        'date','description','type', 'interview_mode', 'location', 'job_application_id'
    ];
}

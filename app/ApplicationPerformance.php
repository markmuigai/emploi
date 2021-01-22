<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ApplicationPerformance extends Model
{
    protected $table = 'application_performance';

    protected $fillable = [
        'application_id',
        'performance_id'
    ];
}

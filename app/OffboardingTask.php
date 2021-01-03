<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OffboardingTask extends Model
{
    protected $fillable = [
        'user_id','title', 'status','part_timer','assigned_to','date','category','description'
    ];
}

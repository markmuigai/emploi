<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Performance extends Model
{
        protected $fillable = [
        'user_id', 'question_id', 'email', 'name', 'result', 'difficulty_level', 'optional message'
    ];
}

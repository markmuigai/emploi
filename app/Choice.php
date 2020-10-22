<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Choice extends Model
{
        protected $fillable = [
        'question_id', 'values', 'correct value'
    ];

    public function questions()
    {
        return $this->belongsTo('App\Question');
    }
}

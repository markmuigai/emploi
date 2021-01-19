<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuestionImage extends Model
{
    protected $fillable =[
        'path',
        'question_id',
        'correct_value'
    ];

    /**
     * Get the associated question
     */
    public function question()
    {
        return $this->belongsTo('App\Question');
    }

    /**
     * Get all possible choices
     */
    public function choices()
    {
        return collect(['a','b','c','d']);
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuestionImage extends Model
{
    protected $fillable =[
        'path',
        'question_id',
        'type'
    ];

    /**
     * Get the associated question
     */
    public function question()
    {
        return $this->belongsTo('App\Question');
    }
}

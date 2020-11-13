<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Choice extends Model
{
        protected $fillable = [
        'question_id', 'value', 'correct_value'
    ];

    public function question()
    {
        return $this->belongsTo('App\Question');
    }

    /**
     * Check if choice is the correct value
     */
    public function isCorrect()
    {
        if($this->correct_value == 0){
            return false;
        }else{
            return true;
        }
    }
}

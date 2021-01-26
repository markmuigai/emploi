<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Question extends Model
{   
	    protected $fillable = [
        'title', 'difficulty_level', 'type'
    ];

    public function choices()
    {
        return $this->hasMany('App\Choice');
    }

    /**
     * Get question based on difficulty
     */
    public static function GetByDifficulty($level)
    {
        return Question::whereDoesntHave('image', function (Builder $query) use($level) {
            $query->where('difficulty_level', $level);
        });
    }

    /**
     * Get the correct choice for a question
     */
    public function correctChoice()
    {
        return $this->choices->where('correct_value', 1)->first();
    }

    /**
     * Get the associated image
     */
    public function image()
    {
        return $this->hasOne('App\QuestionImage', 'question_id');
    }

    /**
     * Fetch aptitude test
     */
    public function scopeAptitude($query)
    {
        return $query->where('type', 'aptitude');
    }

    /**
     * Fetch aptitude test
     */
    public function scopePersonality($query)
    {
        return $query->where('type','personality');
    }
}

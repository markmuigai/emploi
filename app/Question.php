<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{   
	    protected $fillable = [
        'title', 'difficulty_level'
    ];

    public function choices()
    {
        return $this->hasMany('App\Choice');
    }

    /**
     * Get question based on difficulty
     */
    public function scopeGetByDifficulty($query, $level)
    {
        return $query->where('difficulty_level', $level);
    }
}

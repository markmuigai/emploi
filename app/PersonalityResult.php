<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PersonalityResult extends Model
{
    protected $fillable = [
        'personality',
        'score',
        'test_result_id'
    ];

    /**
     * Get the associated test result
     */
    public function testResult()
    {
        return $this->belongsTo('App\TestResult', 'test_result_id');
    }

    /**
    * Get percentage
    */
    public function getScoreAttribute($value)
    {
        return round(($value/40)*100);
    }
}

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

    /**
     * Personality Test algorithm
     */
    public function getRemark()
    {
        switch ($this->personality) {
            case 'extroversion' : 
                return 'Extroversion is the personality trait of seeking fulfillment from sources outside the self or in community. High scorers tend to be very social
                while low scorers prefer to work on their projects alone.';
            case 'agreeableness' : 
                return "Agreeableness reflects how much individuals adjust their behavior to suit others. High scorers are typically polite and like people. Low scorers
                tend to 'tell it like it is'.";
            case 'conscientiousness' : 
                return 'Conscientiousness is the personality trait of being honest and hardworking. High scorers tend to follow rules and prefer clean homes. Low
                scorers may be messy and cheat others.';
            case 'neuroticism' : 
                return 'Neuroticism is the personality trait of being emotional. High scorers tend to have high emotional reactions to stress. They may perceive
                situations as threatening and be more likely to feel moody, depressed, angry, anxious, and experience mood swing. Low scorers tend to be more
                emotionally stable and less reactive to stress';
            case 'openness to experience' : 
                return 'Openness to Experience is the personality trait of seeking new experiences and intellectual pursuits. High scores may day dream a lot (enjoy
                thinking about new and different things). Low scorers tend to be very down to earth (more of a ‘hear and now’ thinker). Consequently, it is
                thought that people with higher scores might be more creative, flexible, curious, and adventurous, whereas people with lower score might tend to
                enjoy routines, predictability, and structure.';
        }
    }
}

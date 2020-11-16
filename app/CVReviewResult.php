<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class CVReviewResult extends Model
{
    protected $fillable = [
        'name', 'output', 'cvText', 'score'
    ];

    /**
     * Get the recommendations of a cv review
     */
    public function recommendations(){
        return $this->hasMany('App\CVRecommendation', 'cvReviewResult_id');
    }

    /**
     * Get the cv review date
     */
    public function createdAt(){
        return Carbon::parse($this->created_at)->toDayDateTimeString();
    }

    /**
     * Get the most popular missing keyword
     */
    public static function missingKeyword(){

        return CVRecommendation::pluck('name')->mode()[0];
    }
}

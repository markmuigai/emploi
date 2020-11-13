<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CVReviewResult extends Model
{
    protected $fillable = [
        'name', 'output', 'cvText', 'score'
    ];

    // Get the recommendations of a cv review
    public function recommendations(){
        return $this->hasMany('App\CVRecommendation', 'cvReviewResult_id');
    }
}

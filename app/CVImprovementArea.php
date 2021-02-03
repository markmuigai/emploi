<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CVImprovementArea extends Model
{
    protected $fillable = [
        'name', 'description'
    ];

    // Generate improvements based on score
    public static function recommend($score)
    {
        // poor, fair, good, excellent
        if($score < 40){
            return CVImprovementArea::all();
        }elseif($score <= 60){
            return CVImprovementArea::findMany([1, 2, 3, 5, 6]);
        }elseif($score <= 80){
            return CVImprovementArea::findMany([1, 6, 3]);
        }else{
            return CVImprovementArea::findMany([1, 6]);
        }
    }

    /**
     * CV Review classifications
     */
}

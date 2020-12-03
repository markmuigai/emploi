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
        if($score < 40){
            $count = 6;
        }elseif($score <= 60){
            $count = 5;
        }elseif($score == 100){
            $count = 2;
        }else{
            $count = 4;
        }

        return CVImprovementArea::get()->random($count);
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CVRecommendation extends Model
{
    protected $table = '_c_v_recommendations';

    protected $fillable = [
        'name', 'cvReviewResult_id',
    ];
}

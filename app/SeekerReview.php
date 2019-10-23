<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SeekerReview extends Model
{
    protected $fillable = [
        'post_id', 'seeker_id','score','notes'
    ];
}

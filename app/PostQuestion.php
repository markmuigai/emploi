<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostQuestion extends Model
{
    protected $table = 'post_question';

    protected $fillable = [
        'post_id',
        'question_id'
    ];
}

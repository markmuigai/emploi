<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NewsLetter extends Model
{
        
        protected $fillable = [
        'name', 'email', 'status'
    ];
}

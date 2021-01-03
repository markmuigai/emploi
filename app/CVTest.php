<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CVTest extends Model
{
    //
    protected $fillable = [
        'name', 'output', 'cvText', 'score'
    ];
}

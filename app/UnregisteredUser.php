<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UnregisteredUser extends Model
{
    protected $fillable = [
        'name', 'email'
    ];
}

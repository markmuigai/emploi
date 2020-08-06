<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmployerSubscription extends Model
{
    protected $fillable = [
        'user_id','name','email','phone_number','status'
    ];
}

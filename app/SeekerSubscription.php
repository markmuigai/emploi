<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SeekerSubscription extends Model
{
     protected $fillable = [
        'user_id','name','email','phone_number', 'industry_id','status'
    ];
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExclusivePlacement extends Model
{
     protected $fillable = [
        'email','industry_id', 'name','message','status','phone_number'
    ];
}

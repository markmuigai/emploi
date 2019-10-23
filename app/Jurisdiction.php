<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jurisdiction extends Model
{
    protected $fillable = [
        'user_permission_id', 'country_id'
    ];

    public function userPermission(){
    	return $this->belongsTo(UserPermission::class,'user_permission_id');
    }

    public function country(){
    	return $this->belongsTo(Country::class,'country_id');
    }
}

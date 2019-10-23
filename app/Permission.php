<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $fillable = [
        'role', 'home'
    ];

    public function userPermissions(){
    	return $this->hasMany(UserPermissions::class);
    }
}

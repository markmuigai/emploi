<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserPermission extends Model
{
    protected $fillable = [
        'user_id', 'permission_id','status'
    ];

    public function user(){
    	return $this->belongsTo(User::class, 'user_id');
    }

    public function permission(){
    	return $this->belongsTo(Permission::class, 'permission_id');
    }
}

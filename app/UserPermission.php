<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Watson\Rememberable\Rememberable;

class UserPermission extends Model
{
	use Rememberable;
    public $rememberFor = 30;

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

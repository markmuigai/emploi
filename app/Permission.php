<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Watson\Rememberable\Rememberable;

class Permission extends Model
{
	use Rememberable;
	public $rememberFor = 30;

    protected $fillable = [
        'role', 'home'
    ];

    public function userPermissions(){
    	return $this->hasMany(UserPermissions::class);
    }

    public function faqs(){
    	return $this->hasMany(Faq::class);
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\User;

class Contact extends Model
{
    protected $fillable = [
        'code', 'name', 'email', 'phone_number', 'message','resolved_by','resolved_on','resolve_notes'
    ];

    public function getResolverAttribute(){
    	if(isset($this->resolved_by))
    		return User::findOrFail($this->resolved_by);
    	return false;
    }
}

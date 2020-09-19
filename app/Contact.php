<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\User;
use Illuminate\Notifications\Notifiable;

class Contact extends Model
{
	use Notifiable;
	
    protected $fillable = [
        'code', 'name', 'email', 'phone_number', 'message','resolved_by','resolved_on','resolve_notes'
    ];

 
    public function getResolverAttribute(){
    	if(isset($this->resolved_by))
    		return User::findOrFail($this->resolved_by);
    	return false;
    }

    public function routeNotificationForSlack($notification)
    {
        return 'https://hooks.slack.com/services/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';
    }
}

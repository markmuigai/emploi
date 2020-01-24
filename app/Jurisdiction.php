<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Jurisdiction extends Model
{
	use Notifiable;
	
    protected $fillable = [
        'user_permission_id', 'country_id'
    ];

    public function userPermission(){
    	return $this->belongsTo(UserPermission::class,'user_permission_id');
    }

    public function country(){
    	return $this->belongsTo(Country::class,'country_id');
    }

    public function routeNotificationForSlack($notification)
    {
        return 'https://hooks.slack.com/services/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';
    }
}

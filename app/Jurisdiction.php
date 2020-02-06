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

    public static function getVerificationsGraph(){
        $weekMap = [
            0 => 'Sun',
            1 => 'Mon',
            2 => 'Tue',
            3 => 'Wed',
            4 => 'Thu',
            5 => 'Fri',
            6 => 'Sat',
        ];

        
        $weekelyCount = array();
        for($i=6; $i>=0; $i--)
        {
            $day = \Carbon\Carbon::now()->subDays($i);
            $day_reg = explode(" ", $day);
            $day_reg = $day_reg[0];
            $users = \App\User::where('email_verified_at','like',"$day_reg%")->get();
            $counter = count($users);


            array_push($weekelyCount, array($counter,$weekMap[$day->dayOfWeek]));
        }
        return $weekelyCount;
    }
}

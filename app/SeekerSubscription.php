<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SeekerSubscription extends Model
{
     protected $fillable = [
        'user_id','name','email','phone_number', 'industry_id','ending','status'
    ];
      public static function activateSeekerPaas($email)
    {
       
        $user = SeekerSubscription::where('email',$email)->where('status','inactive')->first();

        if(isset($user))
        {
           $user->status = 'active';
           $user->ending = now()->addYear();
           return $user->save();
        }     
        return false;
    }
}

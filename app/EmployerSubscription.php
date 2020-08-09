<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmployerSubscription extends Model
{
    protected $fillable = [
        'user_id','name','email','phone_number','ending','status'
    ];

    public static function activateEmployerPaas($email)
    {
       
        $user = EmployerSubscription::where('email',$email)->where('status','inactive')->first();

        if(isset($user))
        {
           $user->status = 'active';
           $user->ending = now()->addYear();
           return $user->save();
        }     
        return false;
    }
}

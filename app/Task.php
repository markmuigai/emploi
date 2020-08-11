<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
        'name','email', 'phone_number','company','title','description','industry','salary','status','assigne','assigned_on'
    ];

        public static function activateTask($email)
    {
       
        $user = Task::where('email',$email)->where('status','pending')->first();

        if(isset($user))
        {
           $user->status = 'active';
           return $user->save();
        }     
        return false;
    }

}

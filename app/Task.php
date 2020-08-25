<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
        'slug','employer_id','name','email', 'phone_number','company','title','description','industry','salary','status','assigne','assigned_on'
    ];

    //    public function industry(){
    //     return $this->belongsTo(Industry::class);
    // }

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

    public static function generateUniqueSlug($length = 11) {
        $length = $length > 41 ? 41 : $length;
        $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return 'TASK_'.$randomString;
    }

    public function show($id){
        
        return view();
    }
}

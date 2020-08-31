<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\PartTimer;

class Task extends Model
{
    protected $fillable = [
        'slug','employer_id','name','email', 'phone_number','company','title','positions','description','industry','salary','status','assignee','sub_task','assigned_on','started_at','end_at','ended_at'
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

    public function isShortlisted($seeker){
        if(!$seeker->hasApplied($this))
            return false;
        $t = PartTimer::where('user_id',$seeker->user->id)->where('task_slug',$this->slug)->first();
        //dd( $j->status );
        if(isset($t->id) && $t->status == 'shortlisted')
        {
            //dd('gere');
            return true;
        }
        return false;
    }


    public function getPreviewAttribute(){
        $max_length = strlen($this->description);
        if($max_length > 250)
            return strip_tags(substr($this->description, 0,160).'...');
        return strip_tags($this->description);
        return $this->description;
    } 
}

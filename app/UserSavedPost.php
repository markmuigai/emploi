<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserSavedPost extends Model
{
        protected $fillable = [
        'user_id','post_id','status'
    ];


    public function post(){
        return $this->belongsTo(Post::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function toggleMarkSave(){
    
        {   $this->user_id = $this->user->id;
            $this->post_id = 4;
            $this->status = 'true';
            return $this->save();
        }
        if($this->status == 'true')
        {
            $this->status = 'false';
            return $this->save();
        }
        return false;
    }

}

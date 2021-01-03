<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Watson\Rememberable\Rememberable;

class Like extends Model
{
    //use Rememberable;

    protected $fillable = [
        'target_class', 'target_id','user_id','status'
    ];

    public function user(){
    	return $this->belongsTo(User::class);
    }

    public static function getCount($target_class,$target_id){
        return Like::where('target_class',$target_class)
                ->where('target_id',$target_id)
                ->where('status','active')
                ->count();
    }
}

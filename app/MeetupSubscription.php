<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MeetupSubscription extends Model
{
    protected $fillable = [
        'user_id','meetup_id'
    ];

    public function user(){
    	return $this->belongsTo(User::class);
    }

    public function meetup(){
    	return $this->belongsTo(Meetup::class);
    }
}

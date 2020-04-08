<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Meetup extends Model
{
    protected $fillable = [
        'slug','name', 'user_id','location_id','industry_id', 'phone_number','email','address','caption','description','price','capacity','start_time','end_time','image','registration_deadline','target_category','public','cancelled_at', 'started_at', 'ended_at'
    ];

    public function user(){
    	return $this->belongsTo(User::class);
    }

    public function location(){
    	return $this->belongsTo(Location::class);
    }
}

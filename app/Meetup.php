<?php

namespace App;

use Carbon\Carbon;
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

    public function startsAt(){
    	if(!$this->start_time)
    		return false;
    	$date = Carbon::CreateFromDate($this->start_time);
    	return $date->format('g:i a l jS F Y');
    }

    public function getImageUrlAttribute(){
        if(!isset($this->image))
            return '/images/a1.jpg';
        else
        	return url('/storage/images/events/'.$this->image);
            //return '/storage/images/events/'.$this->image;
    }

    public function getLocationNameAttribute(){
        return $this->location_id == -1 ? 'Online' : $this->location->name;
    }

    public function getPrice(){
    	return $this->price == 0 ? 'Free' : 'Ksh '.round($this->price);
    }
}

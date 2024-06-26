<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Watson\Rememberable\Rememberable;

class Location extends Model
{
    use Rememberable;
    public $rememberFor = 90;
    protected $fillable = [
        'name', 'country_id', 'status',
    ];

    public function country(){
    	return $this->belongsTo(Country::class,'country_id');
    }

    public function seekers(){
    	return $this->hasMany(Seeker::class);
    }

    public function meetups(){
        return $this->hasMany(Meetup::class);
    }

    public function companies(){
        return $this->hasMany(Company::class);
    }

    public function posts(){
        return $this->hasMany(Post::class);
    }

    public static function active($country_id = null){
    	if($country_id != null)
    	{
    		return Location::where('status','active')
    				->where('country_id',$country_id)
    				->get();
    	}
    	return Location::where('status','active')->get();
    	
    }

    public static function top($counter = 10){
        return Location::where('status','active')->limit($counter)->get();
    }

    public function getSlugAttribute(){
        return strtolower($this->name);
    }
}

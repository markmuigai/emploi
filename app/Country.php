<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Location;

class Country extends Model
{
    protected $fillable = [
        'name', 'code', 'prefix','status','currency'
    ];

    public function jurisdictions(){
    	return $this->hasMany(Jurisdiction::class);
    }

    public function employers(){
        return $this->hasMany(Country::class);
    }

    public static function active(){
    	return Country::where('status','active')->get();
    }

    public function seekers(){
    	return $this->hasMany(Seeker::class);
    }

    public function locations(){
        return $this->hasMany(Location::class);
    }

    public static function getActiveLocations($country_id){
        return Location::where('country_id',$country_id)
                    ->where('status','active')
                    ->get();
    }
}

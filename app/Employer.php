<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\CvRequest;

class Employer extends Model
{
    protected $fillable = [
        'user_id', 'name', 'industry_id','company_name', 'contact_phone','company_phone','company_email','country_id','address','credits'
    ];

    public function industry(){
    	return $this->belongsTo(Industry::class,'industry_id');
    }

    public function country(){
    	return $this->belongsTo(Country::class,'country_id');
    }

    public function user(){
    	return $this->belongsTo(User::class,'user_id');
    }

    public function hasRequestedCV($seeker)
    {
        $r = CvRequest::where('employer_id',$this->id)->where('seeker_id',$seeker->id)->first();
        if(isset($r->id))
            return true;
        return false;
    }

    public function savedProfiles(){
        return $this->hasMany(SavedProfile::class);
    }
}

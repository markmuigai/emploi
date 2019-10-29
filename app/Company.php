<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

use App\Post;

class Company extends Model
{
    protected $fillable = [
        'name', 'user_id', 'logo', 'cover','tagline', 'about','website', 'industry_id','company_size_id','location_id','status'
    ];

    public function user(){
    	return $this->belongsTo(User::class,'user_id');
    }

    public function industry(){
    	return $this->belongsTo(Industry::class,'industry_id');
    }

    public function location(){
    	return $this->belongsTo(Location::class,'location_id');
    }

    public function companySize(){
    	return $this->belongsTo(CompanySize::class,'company_size_id');
    }

    public function posts(){
    	return $this->hasMany(Post::class);
    }

    public function getActivePostsAttribute(){
        return Post::where('status','active')
                ->where('deadline','>',Carbon::now()->format('Y-m-d'))
                ->get();
    }

    public function getStaffAttribute(){
        return $this->companySize->lower_limit.' - '.$this->companySize->upper_limit.' people';
    }

    public function getLogoUrlAttribute(){
        if($this->logo == null)
            return '/images/500g.png';
        return '/storage/companies/'.$this->logo;
    }

    public function getCoverUrlAttribute(){
        if($this->cover == null)
            return '/images/email-banner.jpg';
        return '/storage/companies/'.$this->cover;
    }
}

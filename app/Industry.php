<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Industry extends Model
{
    protected $fillable = [
        'name','slug', 'status','keywords'
    ];

    public static function active(){
    	return Industry::where('status','active')->orderBy('name')->get();
    }

    public function seekers(){
    	return $this->hasMany(Seeker::class);
    }

    public function employers(){
    	return $this->hasMany(Employer::class);
    }

    public function companies(){
        return $this->hasMany(Company::class);
    }

    public function posts(){
        return $this->hasMany(Post::class);
    }

    public static function top($counter = 10){
        return Industry::where('status','active')->limit($counter)->get();
    }

    public function industrySkills(){
        return $this->hasMany(IndustrySkill::class);
    }
}

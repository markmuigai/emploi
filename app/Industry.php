<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Watson\Rememberable\Rememberable;
use Carbon\Carbon;
use App\Post;

class Industry extends Model
{
    use Rememberable;
    public $rememberFor = 300;

    protected $fillable = [
        'name','slug', 'status','keywords'
    ];

    public static function active(){
    	return Industry::where('status','active')->orderBy('name')->get();
    }

    public function seekers(){
    	return $this->hasMany(Seeker::class);
    }

    public function cvEditors(){
        return $this->hasMany(CvEditor::class);
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

    public function oldPostIndustries(){
        return $this->hasMany(OldPostIndustry::class);
    }

    public static function top($counter = 10){
        return Industry::where('status','active')->limit($counter)->get();
    }

    public function industrySkills(){
        return $this->hasMany(IndustrySkill::class);
    }

    public function cvEditRequests(){
        return $this->hasMany(CvEditRequest::class);
    }

    public function activePosts($counter = 10){
        return Post::where('status','active')
                    ->where('industry_id',$this->id)
                    ->where('deadline','>',Carbon::now()->format('Y-m-d'))
                    ->limit($counter)
                    ->get();    
    }
}

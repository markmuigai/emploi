<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Carbon\Carbon;

use App\JobApplication;

class Post extends Model
{
    protected $fillable = [
        'slug', 'company_id', 'title', 'industry_id','education_requirements', 'experience_requirements','responsibilities','deadline','cover_required','portfolio_required','status','location_id','vacancy_type_id','image','how_to_apply','monthly_salary','verified_by','featured','positions'
    ];

    public static function active($counter = 200)
    {
        return Post::where('status','active')->where('deadline','>',Carbon::now()->format('Y-m-d'))
                    ->limit($counter)
                    ->get();
    }

    

    public function modelSeeker(){
        return $this->hasOne(ModelSeeker::class);
    }

    public function educationLevel(){
        return $this->belongsTo(EducationLevel::class,'education_requirements');
    }

    public function hasModelSeeker(){
        if(isset($this->modelSeeker->id))
            return true;
        return false;
    }

    public function otherApplicants(){
        $ret = [];
        foreach ($this->applications as $k) {
            if(!$this->isSelected($k->user->seeker))
                array_push($ret, $k);
        }
        return $ret;
    }

    public function isSelected($seeker){

        foreach ($this->candidates as $k) {
            if($k->seeker_id == $seeker->id)
                return true;
        }
        return false;
    }

    public function monthlySalary(){
        if(!isset($this->monthly_salary) || $this->monthly_salary == 0)
            return 'not disclosed';
        else
            return $this->location->country->currency.' '.$this->monthly_salary;
    }

    public function getImageUrlAttribute(){
        if($this->image == null)
            return 'images/500g.png';
        return '/storage/images/logos/'.$this->image;
    }

    public function company(){
    	return $this->belongsTo(Company::class);
    }

    public function candidates(){
        return $this->hasMany(Candidate::class);
    }

    public function industry(){
    	return $this->belongsTo(Industry::class);
    }

    public function location(){
    	return $this->belongsTo(Location::class);
    }

    public function applications(){
        return $this->hasMany(JobApplication::class);
    }

    public function getShortlistedAttribute(){
        return JobApplication::where('post_id',$this->id)
                    ->where('status','shortlisted')
                    ->get();
    }

    public function isShortlisted($seeker){
        if(!$seeker->hasApplied($this))
            return false;
        $j = JobApplication::where('user_id',$seeker->user->id)->where('post_id',$this->id)->first();
        //dd( $j->status );
        if(isset($j->id) && $j->status == 'shortlisted')
        {
            //dd('gere');
            return true;
        }
        return false;
    }


    public function getCountryAttribute(){
        return $this->location->country;
    }

    public function vacancyType(){
    	return $this->belongsTo(VacancyType::class);
    }

    public function getDaysSinceAttribute(){
        $date = Carbon::parse($this->created_at);
        $now = Carbon::now();

        return $date->diffInDays($now);
    }


    public function getSinceAttribute(){
        return $this->created_at->diffForHumans();
        $date = Carbon::parse($this->created_at);
        $now = Carbon::now();

        return $date->diffInDays($now);
    }

    public function getBriefAttribute(){
        $peo = $this->position == 1 ? 'person' : 'people';
        return 'This position requires '.$this->positions." $peo with ".$this->experience_requirements." experience. Ideal candidate should be located in ".$this->location->name." with a ".$this->education_requirements." qualification in ".$this->industry->name.". Applications to be submitted before ".$this->deadline;
    }

    public static function featured($counter = 10){
        return Post::where('status','active')
                    ->where('featured','true')
                    ->where('deadline','>',Carbon::now()->format('Y-m-d'))
                    ->limit($counter)
                    ->get();
    }

    public static function recent($counter = 10){
        return Post::where('status','active')
                    ->where('deadline','>',Carbon::now()->format('Y-m-d'))
                    ->limit($counter)
                    ->get();
    }
    

    
}

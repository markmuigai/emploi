<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Carbon\Carbon;

use App\JobApplication;
use App\User;

use Watson\Rememberable\Rememberable;

class Post extends Model
{
    use Rememberable;
    public $rememberFor = 10;
    protected $fillable = [
        'slug', 'company_id', 'title', 'industry_id','education_requirements', 'experience_requirements','responsibilities','deadline','cover_required','portfolio_required','status','location_id','vacancy_type_id','image','how_to_apply','monthly_salary','verified_by','featured','positions','max_salary'
    ];

    public static function active($counter = 200)
    {
        return Post::where('status','active')->where('deadline','>',Carbon::now()->format('Y-m-d'))
                    ->limit($counter)
                    ->get();
    }

    public function getShareTextAttribute(){
        $tit = explode(" ", $this->title);
        return implode("+", $tit).' '.$this->location->country->currency.' '.$this->monthly_salary;
    }

    public function getShareFacebookLinkAttribute(){
        return 'https://www.facebook.com/sharer.php?u='.url('/vacancies/'.$this->slug);
    }

    public function getShareTwitterLinkAttribute(){
        return 'https://twitter.com/share?url='.url('/vacancies/'.$this->slug).'&text='.$this->shareText.'&hashtags=Emploi'.$this->location->country->code;
    }

    public function getShareLinkedinLinkAttribute(){
        return 'http://www.linkedin.com/shareArticle?mini=true&url='.url('/vacancies/'.$this->slug);
    }

    public function getIsActiveAttribute(){
        $deadline = Carbon::parse($this->deadline);
        $today = Carbon::now();

        if($this->status == 'active' && $deadline > $today)
            return true;
        return false;
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
            return 'Salary is not disclosed';
        else
        {
            if(isset($this->max_salary))
            {
                $min = round($this->monthly_salary / 1000);
                $max = round($this->max_salary / 1000);

                return $this->location->country->currency.' '.$min.'k - '.$max.'k';
            }
            return $this->location->country->currency.' '.round($this->monthly_salary/1000).'k';
        }
    }

    public function getImageUrlAttribute(){
        if($this->image == null)
            return 'images/500g.png';
        return '/storage/images/logos/'.$this->image;
    }

    public function company(){
    	return $this->belongsTo(Company::class);
    }

    public function getUserAttribute(){
        return $this->company->user;
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

    public function getSelectedAttribute(){
        return JobApplication::where('post_id',$this->id)
                    ->where('status','selected')
                    ->get();
    }

    public function getRejectedAttribute(){
        return JobApplication::where('post_id',$this->id)
                    ->where('status','rejected')
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
        $peo = $this->positions == 1 ? 'person' : 'people';
        //$exp = /24;
        $exp = $this->experience_requirements > 12 ? round($this->experience_requirements/12).' years' : $this->experience_requirements.' months';
        return 'This position requires '.$this->positions." $peo with $exp experience. Ideal candidate should be located in ".$this->location->name." with a ".$this->education_requirements." qualification in ".$this->industry->name.". Applications to be submitted here ".url('/vacancies/'.$this->slug);
    }

    public function getReadableDeadlineAttribute(){
        $date = Carbon::parse($this->deadline);
        return $date->isoFormat('MMM Do YYYY');
    }

    public static function featured($counter = 10){
        $posts = Post::where('featured','true')
                    //->where('status','active')
                    ->where('status','!=','inactive')
                    //->where('deadline','>',Carbon::now()->format('Y-m-d'))
                    ->orderBy('id','DESC')
                    ->limit($counter)
                    ->get();
                    

        return $posts;
    }

    public static function recent($counter = 10){
        return Post:://where('status','active')
                    //->where('deadline','>',Carbon::now()->format('Y-m-d'))
                    where('status','!=','inactive')
                    ->limit($counter)
                    ->get();
    }



}

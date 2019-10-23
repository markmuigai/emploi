<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

use App\Company;
use App\JobApplication;
use App\Post;
use App\SeekerSkill;

class Seeker extends Model
{
    protected $fillable = [
        'user_id','public_name', 'gender', 'date_of_birth', 'phone_number','current_position','post_address','years_experience','industry_id','country_id','location_id','education_level_id','objective','resume','featured','education','experience'
    ];

    public function user(){
    	return $this->belongsTo(User::class,'user_id');
    }

    public function industry(){
    	return $this->belongsTo(Industry::class,'industry_id');
    }

    public function educationLevel(){
        return $this->belongsTo(EducationLevel::class,'education_level_id');
    }

    public function country(){
    	return $this->belongsTo(Country::class,'country_id');
    }

    public function location(){
    	return $this->belongsTo(Location::class,'location_id');
    }

    public function getSexAttribute(){
        if($this->gender == 'M')
            return 'Male';
        if($this->gender == 'F')
            return 'Female';
        return 'Other';
    }

    public function experience(){
        return $this->experience == null ? [] : json_decode($this->experience);
    }

    public function education(){
        return $this->education == null ? [] : json_decode($this->education);
    }

    public function hasApplied($post){
        $j = JobApplication::where('user_id',$this->user->id)
                ->where('post_id',$post->id)->first();
        if(isset($j->id))
            return true;
        return false;
    }

    public function candidates(){
        return $this->hasMany(Candidate::class);
    }

    public function matchSeeker($user){
        //return 'asa';
        if($user->role == 'employer' || $user->role == 'admin')
        {
            $c = Company::where('user_id',$user->id)->first();
            if(isset($c->id))
            {
                $posts = Post::where('company_id',$c->id)->orderBy('title')->get();
                $ret = [];
                foreach($posts as $p)
                {
                    if(!$this->hasApplied($p))
                        array_push($ret, $p);
                }
                return $ret;
            }
        }
        return [];

    }

    public function getAgeAttribute(){
        if($this->date_of_birth != null)
            return Carbon::parse($this->attributes['date_of_birth'])->age;
        return false;
    }

    public function getRsi($post){
        $perc = 0;

        //Edu 25%, Exp 35%, Interview 20%, iq 10%, psy 5%, personality 5%
        if(!$this->hasCompletedProfile() || !$post->hasModelSeeker())
            return $perc;
        $model = $post->modelSeeker;
        $edu = 25;
        $exp = 25;
        $skil = 5;
        $reference = 10;
        $interview = 20;
        $iq = 10;
        $psy = 5;
        $pers = 5;

        //education
        if($this->education_level_id == $model->education_level_id)
            $perc += $edu * 0.8;
        elseif($this->education_level_id > $model->education_level_id)
            $perc += $edu;
        else
            $perc = $edu * 0.4;

        
        //experience
        if($this->years_experience == $model->experience_duration)
            $perc += $exp * 0.8;
        elseif($this->years_experience < $model->experience_duration)
        {
            if($model->experience_duration/2 >= $this->years_experience)
                $perc += $exp * 0.2;
            else
                $perc += $exp * 0.4;
        }
        else
            $perc += $exp;

        //skills
        //interview
        //reference
        //personality

        return $perc;
    }

    public function hasCompletedProfile(){
        if( is_null($this->date_of_birth) )
            return false;
        if( is_null($this->years_experience) )
            return false;
        if( is_null($this->location_id) )
            return false;
        if( is_null($this->education_level_id) )
            return false;
        // if( is_null($this->education) )
        //     return false;
        // if( is_null($this->experience) )
        //     return false;
        return true;
    }

    public function skills(){
        return $this->hasMany(SeekerSkill::class);
    }

    // public function getSkills(){
    //     $sql = "SELECT * FROM seeker_skills WHERE seeker_id=".$this->id;
    //     return $sql;
    //     dd(DB::select($sql));
    //     return SeekerSkill::where('seeker_id',$this->id)->get();
    //     return 0;
    // }
}

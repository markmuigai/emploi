<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

use App\Company;
use App\EducationLevel;
use App\JobApplication;
use App\Post;
use App\SeekerSkill;

class Seeker extends Model
{
    protected $fillable = [
        'user_id','public_name', 'gender', 'date_of_birth', 'phone_number','current_position','post_address','years_experience','industry_id','country_id','location_id','education_level_id','objective','resume','featured','education','experience','resume_contents'
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

    public function seekerPersonalityTraits(){
        return $this->hasMany(SeekerPersonalityTrait::class);
    }

    public function seekerIndustrySkills(){
        return $this->hasMany(SeekerIndustrySkill::class);
    }

    public function otherSeekerSkills(){
        return $this->hasMany(OtherSeekerSkill::class);
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

        if(!$this->hasCompletedProfile() || !$post->hasModelSeeker())
            return $perc;
        $model = $post->modelSeeker;

        //dd($model);

        $total = 
            $model->education_level_importance + 
            $model->experience_importance + 
            $model->skills_importance + 
            $model->personality_importance + 
            $model->interview_importance + 
            $model->iq_importance + 
            $model->psychometric_importance +  
            $model->company_size_importance +
            $model->feedback_importance;



        $application = JobApplication::where('user_id',$this->user->id)
                    ->where('post_id',$post->id)
                    ->first();

        if($model->iq_test)
        {
            
            $iq = $model->iq_importance == 0 ? 0 : $model->iq_importance / $total * 100;
        }
        else
        {
            $total -= $model->iq_importance;
            $iq = 0;
        }

        if($model->interview)
        {
            
            $interview = $model->interview_importance == 0 ? 0 : $model->interview_importance / $total * 100;
        }
        else
        {
            $total -= $model->interview_importance;
            $interview = 0;
        }
            
        if($model->psychometric)
        {
            
            $psy = $model->psychometric_importance == 0 ? 0 : $model->psychometric_importance / $total * 100;
        }
        else
        {
            $total -= $model->psychometric_importance;
            $psy = 0;
        }
            

        

        $edu = $model->education_level_importance == 0 ? 0 : $model->education_level_importance / $total * 100;
        $exp = $model->experience_importance == 0 ? 0 : $model->experience_importance / $total * 100;
        $skil = $model->skills_importance == 0 ? 0 : $model->skills_importance / $total * 100;
        $pers = $model->personality_importance == 0 ? 0 : $model->personality_importance / $total * 100;
        $cosize = $model->company_size_importance == 0 ? 0 : $model->company_size_importance  / $total * 100;
        $ref = $model->feedback_importance == 0 ? 0 : $model->feedback_importance / $total * 100;

        //return $iq + $interview + $psy + $edu + $exp + $skil + $pers + $cosize + $ref;
        
        //return round($cosize,2);

        
        if($this->industry_id != $model->industry_id)//education should match job industry
            $perc += 0;
        elseif($this->education_level_id == $model->education_level_id)
            $perc += $edu * 0.8;
        elseif($this->educationLevel->isSuperiorTo($model->educationLevel) )
            $perc += $edu;

        
        
        if($this->industry_id == $model->post->industry_id)//experience
        {
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
        }
        
        if(isset($application->id))//interview
        {
            if(count($application->interviewResults) > 0)
            {
                if($application->interviewScore > $model->interview_result_score)
                    $perc += $interview;
                elseif($application->interviewScore == $model->interview_result_score)
                    $perc += $interview * 0.8;
                else
                    $perc += $interview * 0.4;
            }
            else
            {
                $perc += $interview;
            }
        }



        if(count($model->modelSeekerSkills) > 0) //skills
        {

            $skills_count = $model->skillsWeight;
            $exist_skills = 0;

            for($i=0; $i<count($model->modelSeekerSkills); $i++)
            {
                //dd($model->modelSeekerSkills);
                if($this->hasSkill($model->modelSeekerSkills[$i]->industrySkill->id))
                    $exist_skills += $model->modelSeekerSkills[$i]->weight;
            }

            $perc+= $skil * $exist_skills / $skills_count;
            
        }
        else
        {
            $perc += $skil;
        }
        
        if(isset($application->id))//iq
        {
            if(count($application->iqTests) > 0)
            {
                if($application->iqScore > $model->iq_score)
                    $perc += $iq;
                elseif($application->iqScore == $model->iq_score)
                    $perc += $iq * 0.8;
                else
                    $perc += $iq * 0.4;
            }
            else
            {
                $perc += $iq;
            }
        }
        
        if(isset($application->id)) //psy
        {
            if(count($application->psychometricTests) > 0)
            {
                if($application->psychometricScore > $model->psychometric_test_score)
                    $perc += $psy;
                elseif($application->psychometricScore == $model->psychometric_test_score)
                    $perc += $psy * 0.8;
                else
                    $perc += $psy * 0.4;
            }
            else
            {
                $perc += $psy;
            }
        }
        
        if(isset($application->id)) //personality
        {
            if(isset($application->seekerPersonality->id))
            {
                if($application->seekerPersonality->personality->id == $model->personality_test_id)
                    $perc += $pers;
            }
            else
                $perc += $pers;
        }
        

        //cosize
        //ref

        return round($perc,2);
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
        if( is_null($this->education) )
            return false;
        if( is_null($this->experience) )
            return false;
        return true;
    }

    public function skills(){
        return $this->hasMany(SeekerSkill::class);
    }

    public function hasSkill($skill_id){
        for($i=0; $i<count($this->skills); $i++)
        {
            if($this->skills[$i]->skill->id == $skill_id)
                return true;
        }
        return false;
    }

    public function featuredPosts(){
        //where('industry_id',$this->industry_id)
                   // ->
        return Post::where('deadline','>',Carbon::now()->format('Y-m-d'))
                    ->where('industry_id',$this->industry_id)
                    ->where('status','active')
                    ->get();
    }

    public function referees(){
        return $this->hasMany(Referee::class);
    }

    public function jobApplicationReferees(){
        return $this->hasMany(JobApplicationReferee::class);
    }

    public function savedProfiles(){
        return $this->hasMany(SavedProfile::class);
    }

    public function seekerJobs(){
        return $this->hasMany(SeekerJob::class);
    }

}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

use App\Company;
use App\EducationLevel;
use App\JobApplication;
use App\JobApplicationReferee;
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

    public function getResumeUrlAttribute(){
        if(isset($this->resume))
            return url('/storage/resumes/'.$this->resume);
        return '#';
        
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

    public function cvrequests(){
        return $this->hasMany(CvRequest::class);
    }

    public function getSexAttribute(){
        if($this->gender == 'M')
            return 'Male';
        if($this->gender == 'F')
            return 'Female';
        return 'Other';
    }

    public static function isJson($string){
        json_decode($string);
        return (json_last_error() == JSON_ERROR_NONE);
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

        $total = 
            $model->education_level_importance + 
            $model->experience_importance + 
            $model->skills_importance + 
            $model->personality_importance + 
            $model->interview_importance + 
            $model->psychometric_importance +  
            $model->company_size_importance +
            $model->feedback_importance;



        $application = JobApplication::where('user_id',$this->user->id)
                    ->where('post_id',$post->id)
                    ->first();

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


        if(isset($application->id)) //psychometric
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
                //$perc += $psy;
            }
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
                //$perc += $interview;
            }
        }

        //education
        if(isset($this->industry_id) && $this->industry_id == $model->post->industry_id) 
        {
            //accepted courses
            if(count($model->modelSeekerCourses) > 0)
            {
                $found = false;
                for($i=0; $i< count($model->modelSeekerCourses); $i++)
                {
                    $courseName = $model->modelSeekerCourses[$i]->course->name;
                    if(!is_null($this->education) )
                    {
                        if( strpos($this->education, "%$courseName%") )
                            $found = true;                        
                    }

                    if(!is_null($this->resume_contents) )
                    {
                        if( strpos($this->resume_contents, "%$courseName%") )
                            $found = true;                        
                    }
                    if($found)
                        break;
                }

                if($found)
                {
                    $perc += $edu;
                }
                elseif($this->educationLevel->isSuperiorTo($model->educationLevel) )
                {
                    $perc += $edu * 0.5;
                }
                elseif($this->education_level_id == $model->education_level_id)
                {
                    $perc += $edu * 0.25;
                }
                
            }

        }

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
            // else
            //     $perc += $exp;
        }

        if(count($model->modelSeekerSkills) > 0 || count(json_decode($model->other_skills)) > 0) //skills
        {

            $skills_count = $model->skillsWeight;
            $exist_skills = 0;

            if(count($model->modelSeekerSkills) > 0)
            {
                for($i=0; $i<count($model->modelSeekerSkills); $i++)
                {
                    if($this->hasSkill($model->modelSeekerSkills[$i]->industrySkill->id))
                        $exist_skills += $model->modelSeekerSkills[$i]->weight;
                }
            }

            if(isset($model->other_skills) && count(json_decode($model->other_skills)) > 0)
            {
                if( !is_null($this->resume_contents) )
                {
                    $other_skills = json_decode($model->other_skills);
                    $other_skills_weights = json_decode($model->other_skills_weight);

                    for($i=0; $i<count($other_skills); $i++)
                    {
                        if(strpos($this->resume_contents, "%".$other_skills[$i]."%"))
                        {
                            $exist_skills += $other_skills_weights[$i];
                        }
                    }
                }
            }
            $perc+= $skil * $exist_skills / $skills_count;
            
        }
        else
        {
            //$perc += $skil;
        }

        if( $model->traitsWeight != 0 ) //personality
        {

            $total_traits = 0;

            if(count($this->referees) != 0) //personality traits
            {
                $assessed = array();
                for($i=0; $i<count($this->referees); $i++)
                {
                    if($this->referees[$i]->status != 'pending-details')
                        array_push($assessed, $this->referees[$i]);
                }


                if(count($assessed) > 0)
                {
                    for($i=0; $i<count($model->modelSeekerPersonalityTraits); $i++)
                    {
                        $total_traits += $this->getPersonalityTraitWeight($model->modelSeekerPersonalityTraits[$i]->personality_trait_id);
                        
                    }

                    $perc += $total_traits/$model->traitsWeight * $pers;
                }
                else
                {

                    //$perc += $pers;
                }

            }
            else
            {
                //$perc += $pers;
            }

        }
        else
        {
            //$perc += $pers;
        }

        //previous company size
        $user_id = $this->user->id;
        $post_id = $post->id;
        $model_co_size = $model->company_size_id;

        $sql = "SELECT id FROM job_applications WHERE user_id=$user_id AND post_id=$post_id LIMIT 1";
        $results = DB::select($sql);
        if(count($results) == 1)
        {
            $application_id = $results[0]->id;
            $sql = "SELECT company_size_id FROM seeker_previous_company_sizes WHERE job_application_id = $application_id AND company_size_id = $model_co_size LIMIT 1";

            $results = DB::select($sql);
            if(count($results) > 0)
                $perc += $cosize;
        }

        
        
        
        //referee feedback 
        if(count($this->jobApplicationReferees) > 0)
        {
            $performance = array();
            $workQuality = array();
            $targets = array();
            $rehire = array();
            $discplinary = array();
            for($i=0; $i<count($this->jobApplicationReferees); $i++)
            {
                $rf = $this->jobApplicationReferees[$i];
                
                    array_push($discplinary, $rf->discplinary_cases);
                    array_push($rehire, $rf->would_you_rehire);
            }

            for($i=0; $i<count($this->seekerJobs); $i++)
            {
                if($this->seekerJobs[$i]->referee->status != 'ready')
                    continue;
                $sj = $this->seekerJobs[$i];
                array_push($performance, $sj->work_performance);                
                array_push($workQuality, $sj->work_quality);
                array_push($targets, $sj->meeting_targets);
            }
            $performance = array_sum($performance ) / count($performance);
            $workQuality = array_sum($workQuality ) / count($workQuality);
            $targets = array_sum($targets ) / count($targets);

            $perc += $ref;

            //would you rehire
            $hire = false;
            $nohire = false;
            for($i=0; $i<count($rehire);$i++)
            {
                if($discplinary[$i] == 'no')
                    $hire = true;
                if($discplinary[$i] == 'maybe')
                    $nohire = true;
            }
            if($hire)
                $perc = $perc * 0.7;
            elseif($nohire)
                $perc = $perc * 0.85;

            //performance
            if($performance<10)
                $perc = $perc * 0.25;
            elseif($performance<25)
                $perc = $perc * 0.5;
            elseif($performance<50)
                $perc = $perc * 0.75;
            elseif($performance<75)
                $perc = $perc * 1.0;
            else
                $perc = $perc * 1.25;

            //work quality
            if($workQuality<10)
                $perc = $perc * 0.25;
            elseif($workQuality<25)
                $perc = $perc * 0.5;
            elseif($workQuality<50)
                $perc = $perc * 0.75;
            elseif($workQuality<75)
                $perc = $perc * 1.0;
            else
                $perc = $perc * 1.25;

            //ability to meet targets
            if($targets<10)
                $perc = $perc * 0.25;
            elseif($targets<25)
                $perc = $perc * 0.5;
            elseif($targets<50)
                $perc = $perc * 0.75;
            elseif($targets<75)
                $perc = $perc * 1.0;
            else
                $perc = $perc * 1.25;

            //discplinary cases
            $gross = false;
            $mod = false;
            $minor = false;
            for($i=0; $i<count($discplinary);$i++)
            {
                if($discplinary[$i] == 'some')
                    $mod = true;
                if($discplinary[$i] == 'many')
                    $gross = true;
                if($discplinary[$i] == 'minor')
                    $minor = true;
            }
            if($gross)
                $perc = $perc * 0.5;
            elseif($mod)
                $perc = $perc * 0.85;
            elseif($minor)
                $perc = $perc * 0.95;

            
        }

        

        

        return round($perc,2);
    }

    public function hasPersonalityTrait($trait_id){
        $sql = "SELECT id FROM seeker_personality_traits WHERE seeker_id = ".$this->id." LIMIT 1";
        $result = DB::select($sql);
        if(count($result) == 0)
            return false;
        return true;
    }

    public function getPersonalityTraitWeight($trait_id){
        if(!$this->hasPersonalityTrait($trait_id))
            return 0;
        $sql = "SELECT weight FROM seeker_personality_traits WHERE seeker_id = ".$this->id. " AND personality_trait_id = $trait_id";
        $traitstotal = 0;
        $counter = 0;
        $results = DB::select($sql);

        for($i=0; $i<count($results); $i++ )
        {
            $counter ++;

            $traitstotal += $results[$i]->weight;
        }
        if($traitstotal == 0)
            return $traitstotal;
        return $traitstotal/$counter;
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

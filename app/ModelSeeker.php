<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\ModelSeekerSkill;

class ModelSeeker extends Model
{
    protected $fillable = [
        'post_id','education_level_id', 'education_level_importance', 'personality_test_id','experience_duration', 'experience_level_importance','iq_test','iq_score','interview_result_score','psychometric_test_score', 'company_size_id', 'interview','psychometric','education_importance','experience_importance','interview_importance','skills_importance','iq_importance','psychometric_importance','personality_importance','company_size_importance','feedback_importance','other_skills','other_skills_weight'
    ];

    public function post(){
    	return $this->belongsTo(Post::class);
    }

    public function modelSeekerSkills(){

    	return $this->hasMany(ModelSeekerSkill::class);
    }

    public function modelSeekerCourses(){

        return $this->hasMany(ModelSeekerCourse::class);
    }

    public function modelSeekerPersonalityTraits(){

        return $this->hasMany(ModelSeekerPersonalityTrait::class);
    }

    public function educationLevel(){
        return $this->belongsTo(EducationLevel::class,'education_level_id');
    }

    public function getSkillsWeightAttribute(){
        $total = 0;
        if(count($this->modelSeekerSkills) == 0)
            return $total;
        foreach($this->modelSeekerSkills as $m)
            $total += $m->weight;

        if(!is_null($this->other_skills))
        {
            $other_skills_weight = json_decode($this->other_skills_weight);
            for($i=0; $i<count($other_skills_weight); $i++)
                $total += $other_skills_weight[$i];
        }
        return $total;
    }

    public function getTraitsWeightAttribute(){
        $total = 0;
        if(count($this->modelSeekerPersonalityTraits) > 0)
        {
            for($i=0; $i<count($this->modelSeekerPersonalityTraits); $i++)
                $total += $this->modelSeekerPersonalityTraits[$i]->weight;
        }

        return $total;
    }
    
}

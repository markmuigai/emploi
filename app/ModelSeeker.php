<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\ModelSeekerSkill;

class ModelSeeker extends Model
{
    protected $fillable = [
        'post_id','education_level_id', 'education_level_importance', 'personality_test_id','experience_duration', 'experience_level_importance','iq_test','iq_score','interview_result_score','psychometric_test_score', 'company_size_id', 'interview','psychometric'
    ];

    public function post(){
    	return $this->belongsTo(Post::class);
    }

    public function modelSeekerSkills(){

    	return $this->hasMany(ModelSeekerSkill::class);
    }
}

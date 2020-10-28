<?php

namespace App;

use App\Post;
use Carbon\Carbon;
use Watson\Rememberable\Rememberable;
use Illuminate\Database\Eloquent\Model;

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

        public function tasks(){
        return $this->hasMany(Task::class);
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
       public function seekerSubscription(){
        return $this->hasMany(SeekerSubscription::class);
    }

    public function cvBuilders(){
        return $this->hasMany(CvBuilder::class);
    }

    public function activePosts($counter = 10){
        return Post::where('status','active')
                    ->where('industry_id',$this->id)
                    ->where('deadline','>',Carbon::now()->format('Y-m-d'))
                    ->limit($counter)
                    ->get();    
    }

    /**
     * Industry and difficulty level one to one relationship 
     */
    public function difficultyLevel()
    {
        return $this->hasOne('App\DifficultyRating');
    }

    /**
     * Return questions based on industry and yrs of exp
     */
    public function getAssessmentQuestions($exp)
    {
        // TODO: Update difficulty ratios to 6:4 
        $allLvls = collect(['easy','medium', 'hard']);

        // Get industry difficulty rating
        $lvl = $this->difficultyLevel->difficulty_level;

        // Add questions that are more difficult by one level
        $rank = $allLvls->search($lvl);

        // Get higher level
        $newLvl = $allLvls->get($rank+1);

        // Get questions based on months of experience
        if($exp <= 6){
            // Return all questions on the same level
            return Question::getByDifficulty($lvl)->get()->random(10);
            
        }elseif($exp >6 && $exp <=36){
            // Get all the hard questions since there is no higher level
            if($lvl = 'hard'){
                return $base_questions = Question::getByDifficulty($lvl)->get()->random(10);
            }else{
                // Get 6 questions in the industry level
                $base_questions = Question::getByDifficulty($lvl)->get()->random(6);
                
                // Add 4 questions that are more difficult by one level
                return $base_questions->push(Question::getByDifficulty($newLvl)->get()->random(4))->flatten();
            }
        }else{
            // More than 3 years experience
            // Get 4 questions in the industry level
            $base_questions = Question::getByDifficulty($lvl)->get()->random(4);

            // Add 6 questions that are more difficult by one level
            return $base_questions->push(Question::getByDifficulty($newLvl)->get()->random(6))->flatten();
        }

    }
}

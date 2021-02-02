<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

use Auth;

class Performance extends Model
{
       protected $fillable = [
        'user_id', 'choice_id', 'question_id', 'email', 'correct', 'optional message', 'assessment_count', 'test_result_id'
    ];

    /**
     * Get the associated question
     */
    public function question()
    {
        return $this->belongsTo('App\Question');
    }

    /**
     * Get the associated users performance
     */
    public static function performanceFor($email)
    {
        return User::where('email', $email)->first();
    }

    /**
     * Get the selected choice
     */
    public function selectedChoice()
    {
        return $this->belongsTo('App\Choice','choice_id');
    }

    /**
     * Get all performance scores associated with an email
     */
    public function scopeAssessmentsForUser($query, $email)
    {
        return $query->where('email', $email)->get();
    }

    /**
     * Aptitude assessments for a user
     */
    public static function aptitudeTestsForUser($email)
    {
        return Performance::assessmentsForUser($email)->filter(function($perf){  
            if(isset($perf->question))
                return $perf->question->type == 'aptitude';
        });
    }

    /**
     * Get assessments for a certain count
     */
    public static function scopeLatestAssessment($query, $email)
    {
        // All performance records for a user
        $allAssessments = Performance::aptitudeTestsForUser($email);

        // Get the latest assessment
        $latest = $allAssessments->pluck('assessment_count')->max();

        return $query->where('email', $email)->where('assessment_count', $latest)->get();
    }

    /**
     * Get most recent score
     */
    public static function recentScore($email)
    {   
        //First element in the collection with email , $email
        $user=Performance::Where('email',$email)->first();
        
        //check if email is there
        if(isset($user->id))        
            return Performance::latestAssessment($email)->where('correct',1)->count();
        else
            return NULL;
    }

    /**
     * Get all emails that have done an assessment
     */
    public static function emailsAssessed()
    {
        return Performance::all()->sortByDesc('id')->unique('email')->pluck('email');
    }

    /**
     * Get recent scores for all emails which have been assessed 
     */
    public static function recentScoresAvg(){
        // return Performance::emailsAssessed();
        return ceil(Performance::emailsAssessed()->map(function($email){
            return Performance::recentScore($email);
        })->avg());
    }

    /**
     * Get those eligible to do assessment
     */
    public static function canDoAssessment($email)
    {   
        // All performance records for a user
        $assessments = Performance::getAssessmentsByType('aptitude practice' , $email);

        //if never done before return true(can do asssessment)     
        if($assessments->isEmpty()){
            return true;
        }

       
        //get logged in user  
        $user=Auth::user();

         //if on pro or spotlight plan return true(can do asssessment)    
        if(isset($user->seeker->id)){

            if($user->seeker->featured == -1 || $user->seeker->featured >= 1)
                return true;
        }

        // Get the latest assessment
        if($assessments->isNotEmpty()){
            $time = $assessments->last()->created_at;

            // Get the current date
           $now=Carbon::now();

           // Find the difference between today and the last assessment done
           $difference = $time->diffInDays($now);
           
          if ($difference > 1825) {
              return true;
          }else{
            return false;       
          }
        }
    }

    /**
     * Created at mutator 
     */
    public static function daysSince($email){
        // All performance records for a user
        $latest = Performance::AssessmentsForUser($email)->last();

        $date = Carbon::parse($latest->created_at);
        $now = Carbon::now();

        return $date->diffForHumans();
    }

    /**
     * Get performance records for date range 
     */
    public static function getByDate($dateRange){
        // Get the latest assessment record for each assessed email
        return Performance::emailsAssessed()->filter(function($email) use($dateRange){
            switch ($dateRange) {
                case 'today':
                    return Carbon::parse(Performance::latestAssessment($email)->last()->created_at)->toDateString() 
                    == Carbon::today()->toDateString();
                case 'last7':
                    return Performance::latestAssessment($email)->last()->created_at > Carbon::now()->subDays(7);
                case 'thisMonth':
                    return Performance::latestAssessment($email)->last()->created_at > Carbon::now()->subDays(30);
                default:
                    break;
            }
        });
    }

    /**
     * Get the associated application
     */
    public function applications()
    {
        return $this->belongsToMany('App\JobApplication', 'application_performance', 'performance_id', 'application_id');
    }

    /**
     * Get the type of assessment of a performance record
     */
    public function getType()
    {
        if($this->applications->isEmpty()){
            return 'Aptitude Practice';
        }elseif($this->applications->first()->personalityTestResults() != null){
            return 'Personality';
        }elseif($this->applications->first()->aptitudeTestResults() != null){
            return 'Aptitude';
        }
    }

    /**
     * Get performance records by type
     */
    public static function getAssessmentsByType($type, $email)
    {
        // Get user by email
        $user = User::where('email', $email)->first();

        // Get the users assessment
        return $user->testResults->filter(function($result) use($type){
            return $result->type == $type;
        });
    }

    /**
     * Populate Test results 
     */
    public static function testResults(){
        // All assessed emails
        return Performance::emailsAssessed()->map(function($email){
            return [
                "type" => Performance::latestAssessment($email)->first()->getType(),
                "assessment_count" => Performance::latestAssessment($email)->first()->assessment_count,
                "email" => Performance::latestAssessment($email)->first()->email,
                "score" => round(Performance::latestAssessment($email)->pluck('correct')->avg()*100)
            ];
        });
    }

    /**
     * Personality Test algorithm
     */
    public function getRemark()
    {

    }

    /**
     * Get points scored
     */
    public static function personalityScores($scores)
    {
        // Rating represent points 1-5
        $ratings = collect([
            'Disagree', 'Slightly Disagree', 'Neutral', 'Slightly Agree', 'Agree'
        ]);

        // Get the points of the choices the candidate selected for each score
        return $points = $scores->map(function($score) use($ratings){
            return $ratings->search(Choice::find($score->choice_id)->value)+1;
        });
    }

    /**
     * Get question keys to assess a given personality
     */
    public static function keysByPersonality($personality)
    {
        switch ($personality) {
            case 'extroversion' : 
                return collect([
                    0,5,10,15,20,25,30,35,40,45
                ]);
            case 'agreeableness' : 
                return collect([
                    1,6,11,16,21,26,31,36,41,46
                ]);
            case 'conscientiousness' : 
                return collect([
                   2,7,12,17,22,27,32,37,42,47
                ]);
            case 'neuroticism' : 
                return collect([
                    3,8,13,18,23,28,33,38,43,48
                ]);
            case 'openness to experience' : 
                return collect([
                    4,9,14,19,24,29,34,39,44,49
                ]);
        }
    }

    /**
     * Get the points that should be added for a given personality 
     */
    public static function scoreToAdd($personality)
    {
        switch ($personality) {
            case 'extroversion' : 
                return collect([
                    0,10,20,30,40
                ]);
            case 'agreeableness' : 
                return collect([
                    6,16,26,36,41,46
                ]);
            case 'conscientiousness' : 
                return collect([
                   2,12,22,32,42,47
                ]);
            case 'neuroticism' : 
                return collect([
                    8,18
                ]);
            case 'openness to experience' : 
                return collect([
                    4,14,24,34,39,44,49
                ]);
        }
    }

    /**
     * Personality score arithmetic
     */
    public static function personalityArithmetic($personality, $personalityPoints)
    {
        // Keys which values should be added
        $positives = Performance::scoreToAdd($personality);

        // Points to be added
        $toAdd = $personalityPoints->filter(function($point, $key) use ($positives){
            return $positives->contains($key);
        })->sum();

        $toSubtract = $personalityPoints->filter(function($point, $key) use ($positives){
            return !$positives->contains($key);
        })->sum();

        return Performance::baseScore($personality) - $toSubtract + $toAdd;
    }

    /**
     * Get base score to add or subtract from
     */
    public static function baseScore($personality)
    {
        switch ($personality) {
            case 'extroversion' : 
                return 20;
            case 'agreeableness' : 
                return 14;
            case 'conscientiousness' : 
                return 14;
            case 'neuroticism' : 
                return 38;
            case 'openness to experience' : 
                return 8;
        }
    }

    /**
     * Extroversion score
     */
    public static function personalityResult($personality, $scores)
    {
        // Get points for all personality questions
        $points = Performance::personalityScores($scores);

        // Get the question keys associated with a personality
        $personality_keys = Performance::keysByPersonality($personality);

        // Filter questions and points associated with a given personality
        $personalityPoints = $points->filter(function($point, $key) use($personality_keys){
            return $personality_keys->contains($key);
        });

        // Return the personality score
        return Performance::personalityArithmetic($personality, $personalityPoints);
    }
}

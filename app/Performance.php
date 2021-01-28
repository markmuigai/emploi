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
        //check if a user has ever done assessment before
        $created = Performance::aptitudeTestsForUser($email)->first();

        //get logged in user
        $user=Auth::user(); 

        //if never done before return true(can do asssessment)     
        if(!isset($created->id)){
            return true;
        }

            //if on pro plan return true(can do asssessment)     
        if(isset($user->seeker->id))
           if($user->seeker->featured == -1)
        {
            return true;
        }

            //if on spotlight plan return true(can do asssessment)     
        if(isset($user->seeker->id))
           if($user->seeker->featured >= 1)
        {
            return true;
        }

         // All performance records for a user
        $allAssessments = Performance::aptitudeTestsForUser($email);

        // Get the latest assessment
        $latest = $allAssessments->pluck('assessment_count')->max();

        // Get the latest date assessment was done
       $time=Performance::Where('assessment_count', $latest)->pluck('created_at')->max();

        // Get the current date
       $now=Carbon::now();

       // Find the difference between today and the last assessment done
       $difference = $time->diffInDays($now);
       
      if ($difference > 1825) {
          return true;
      }
      return false;       
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
        }elseif($this->applications->first()->personalityTestResults()->isNotEmpty()){
            return 'Personality';
        }elseif($this->applications->first()->aptitudeTestResults()->isNotEmpty()){
            return 'Aptitude';
        }
    }

    /**
     * Get performance records by type
     */
    public static function type()
    {
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
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

use Auth;

class Performance extends Model
{
       protected $fillable = [
        'user_id', 'choice_id', 'question_id', 'email', 'correct', 'optional message', 'assessment_count'
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
     * Get performance scores associated with an email
     */
    public function scopeAssessmentsForUser($query, $email)
    {
        return $query->where('email', $email)->get();
    }

    /**
     * Get assessments for a certain count
     */
    public static function scopeLatestAssessment($query, $email)
    {
        // All performance records for a user
        $allAssessments = Performance::assessmentsForUser($email);

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
        $created = Performance::where('email',$email)->first();

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
        $allAssessments = Performance::assessmentsForUser($email);

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
}

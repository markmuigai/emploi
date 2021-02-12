<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

use App\CvEditRequest;
use App\User;

use Auth;

class CVReviewResult extends Model
{
    protected $fillable = [
        'name', 'output', 'cvText', 'score', 'user_id', 'email' ,'path'
    ];

    /**
     * Get the recommendations of a cv review
     */
    public function recommendations(){
        return $this->hasMany('App\CVRecommendation', 'cvReviewResult_id');
    }

       // Get the associated user
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * Get the cv review date
     */
    public function createdAt(){
        return Carbon::parse($this->created_at)->toDayDateTimeString();
    }

    /**
     * Get the most popular missing keyword
     */
    public static function missingKeyword(){
        if(CVRecommendation::all()->isEmpty()){
            return 'none';
        }else{
            return CVRecommendation::pluck('name')->mode()[0];
        }
    }

    /**
     * Get the emails converted to CV Editing
     */
    public static function convertedEmails($cvReviewsResults){
        // removes any values from the original collection that are not present in the given collection and return count of the result
        $collection = $cvReviewsResults->pluck('email')->unique();
        $email= CvEditRequest::pluck('email')->unique();

        return $collection->intersect($email)->unique();
    }

    /**
     * Get those eligible to do automatic CV review
     */
    public static function canDoReview()
    {  
        //get current logged in user
        $user=Auth::user(); 
        
        //check if a user has ever done cv review before
        $created = CVReviewResult::where('user_id', $user->id)->first();       

        //if never done before return true(can review CV)     
        if(!isset($created->id)){
            return true;
        }   

        //if role is admin return true(can review CV)     
        if($user->role =='admin'){
            return true;
        }

        //get last CV review
        $last = CVReviewResult::where('user_id', $user->id)->latest('created_at')->first();

        $last_time = $last->created_at;

        // Get the current date
       $now=Carbon::now();

       // Find the difference between today and the last CV review done
       $difference = $last_time->diffInDays($now);
       
      if ($difference > 2) {
          return true;
      }
      return false;
    }

        // Filter by date
    public static function filterByDate($dateRange)
    {
        switch ($dateRange) {
            case 'today':
            return CVReviewResult::where('created_at', '>', Carbon::now()->subDays(1))->with('recommendations')->orderBy('id','DESC');
                break;

            case 'last7':
            return CVReviewResult::where('created_at', '>', Carbon::now()->subDays(7))->with('recommendations')->orderBy('id','DESC');
                break;
                
            case 'thisMonth':
               return CVReviewResult::where('created_at', '>', Carbon::now()->subDays(30))->with('recommendations')->orderBy('id','DESC');
                break;
            
            default:
                break;
        }
    }    

}

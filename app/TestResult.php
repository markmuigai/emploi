<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class TestResult extends Model
{
    protected $fillable = [
        'user_id','email','type','assessment_count','score'
    ];

    /**
     * Get the associated user
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * Get the associated performance records
     */
    public function performances()
    {
        return $this->hasMany('App\Performance', 'test_result_id');
    }

    /**
     * Get the associated personality test results
     */
    public function personalityResults()
    {
        return $this->hasMany('App\PersonalityResult', 'test_result_id');
    }

    // Filter by date
    public static function filterByDate($dateRange)
    {
        switch ($dateRange) {
            case 'today':
            return TestResult::where('created_at', '>', Carbon::now()->subDays(1))->orderBy('created_at', 'desc');
                // return $sort_by_date;
                break;

            case 'last7':
            return TestResult::where('created_at', '>', Carbon::now()->subDays(7))->orderBy('created_at', 'desc');
                // return $sort_by_date;
                break;
            case 'thisMonth':
               return TestResult::where('created_at', '>', Carbon::now()->subDays(30))->orderBy('created_at', 'desc');
                // return $sort_by_date;
                break;
            
            default:
                break;
        }
    }
}

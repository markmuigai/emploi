<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EvaluationCriteriaResult extends Model
{
    protected $fillable = [
        'evaluation_result_id',
        'evaluation_criteria_id',
        'rating',
        'comment'
    ];

    /**
     * Get the associated criteria
     */
    public function criteria()
    {
        return $this->belongsTo('App\EvaluationCriteria', 'evaluation_criteria_id');
    }

    /**
     * Get a results remark
     */
    public function remark()
    {
        switch($this->rating){
            case 1 :
                return 'Unsatisfactory';
                break;
            case 2 :
                return 'Satisfactory';
                break;
            case 3 :
                return 'Average';
                break;
            case 4 :
                return 'Above Average';
                break;
            case 5 :
                return 'Exceptional';
                break;
        }
    }
}

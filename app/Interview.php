<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Interview extends Model
{
    protected $fillable = [
        'date','description','type', 'interview_mode', 'location', 'job_application_id'
    ];

    public function formattedDate(){
        return Carbon::parse($this->date)->toDateString().'T'.Carbon::parse($this->date)->toTimeString();
    }
}

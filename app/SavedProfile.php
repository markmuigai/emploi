<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SavedProfile extends Model
{
    protected $fillable = [
        'employer_id', 'seeker_id'
    ];

    public function employer(){
    	return $this->belongsTo(Employer::class);
    }

    public function seeker(){
    	return $this->belongsTo(Seeker::class);
    }
}

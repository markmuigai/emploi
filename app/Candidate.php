<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    protected $fillable = [
        'seeker_id', 'post_id', 'monthly_salary', 'status'
    ];

    public function seeker(){
    	return $this->belongsTo(Seeker::class,'seeker_id');
    }

    public function post(){
    	return $this->belongsTo(Post::class);
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Employer;

class Message extends Model
{
    protected $fillable = [
        'title', 'task_slug', 'body','to_id','from_id','attachment','seen'
    ];

    public function employer(){
    	return $this->belongsTo(Employer::class);
    }
}

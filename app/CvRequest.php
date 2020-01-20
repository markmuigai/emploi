<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Notification;
use App\Notifications\CvRequested;

use App\Employer;

class CvRequest extends Model
{
    protected $fillable = [
        'employer_id', 'seeker_id', 'status','created_at'
    ];

    public function acceptRequest(){
    	if($this->status == 'pending' && $this->employer->credits > 100)
    	{
    		$this->employer->credits -= 100;
    		$this->employer->save();
    		$this->status = 'accepted';
    		return $this->save();
    	}
    	return false;
    }

    public function denyRequest(){
    	if($this->status == 'pending')
    	{
    		$this->status = 'denied';
    		return $this->save();
    	}
    	return false;
    }

    public function employer(){
    	return $this->belongsTo(Employer::class);
    }

    public function seeker(){
        return $this->belongsTo(Seeker::class);
    }

    public static function requestCV($employer, $seeker){
    	if($employer->canViewSeeker($seeker))
    		return false;
    	$r = CvRequest::create([
			'employer_id' => $employer->id, 
			'seeker_id' => $seeker->id
		]);
		if(isset($r->id))
		{
            Notification::send(Employer::first(),new CvRequested('CV REQUEST: '.$employer->user->name.' has requested for '.$seeker->user->name.'\'s CV'));
			return $r->acceptRequest();
		}

    	return false;

    }
}

<?php
namespace App\Traits;
use Carbon\Carbon;

use App\Jobs\EmailJob;

use App\Meetup;
use App\MeetupSubscription;

trait CanMeetup {

    public function subscrptions(){
        return $this->hasMany(MeetupSubscription::class);
    }

    public function enrollMeetup(Meetup $meetup){
        if($this->hasEnrolledMeetup($meetup))
            return false;
        $ms = MeetupSubscription::create([
            'user_id' => $this->id,
            'meetup_id' => $meetup->id
        ]);
        if(isset($ms->id))
        {
            $caption = "Emploi Event subscription was completed successfully";
            $contents = "You have subscribed to <b>".$meetup->name."</b>, an Emploi Event. <br>
            If you have questions regarding this Event or other Emploi Services kindly <a href='".url('/contact')."'>contact us</a><br.
            Further communication will be provided by your organizer, ".$meetup->user->name." [".$meetup->email."].
            <br><br>
            Thank you.
                    ";
            EmailJob::dispatch($this->name, $this->email, 'Event Subscribed', $caption, $contents);
            return true;
        }
        return false;

    }

    public function unenrollMeetup(Meetup $meetup){
        $ms = MeetupSubscription::where('user_id',$this->id)
                ->where('meetup_id',$meetup->id)
                ->first();
        if(isset($ms->id))
            return $ms->delete();
        return false;


    }

    public function toggleMeetup(Meetup $meetup){
        if($this->hasEnrolledMeetup($meetup))
            return $this->unenrollMeetup($meetup);
        return $this->enrollMeetup($meetup);
    }

    public function hasEnrolledMeetup(Meetup $meetup){

        $ms = MeetupSubscription::where('user_id',$this->id)
                ->where('meetup_id',$meetup->id)
                ->first();

        if(isset($ms->id))
            return true;
        return false;

    }
    
}
<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Jobs\EmailJob;
use Illuminate\Notifications\Notifiable;

class SeekerSubscription extends Model
{    
     use Notifiable; 
     protected $fillable = [
        'user_id','name','email','phone_number', 'industry_id','ending','status'
    ];

        public function routeNotificationForSlack($notification)
    {
        return 'https://hooks.slack.com/services/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';
    }

       public function User(){
        return $this->belongsTo(User::class,'user_id');
    }
    
       public function industry(){
        return $this->belongsTo(Industry::class,'industry_id');
    }
      public static function activateSeekerPaas($email)
    {
       
        $user = SeekerSubscription::where('email',$email)->where('status','inactive')->first();

        if(isset($user))
        {
           $user->status = 'active';
           $user->ending = now()->addYear();
           $user->save();

                    $caption = "Job Seeker Golden Club subscriptions activated on Emploi";
                    $contents = "You have successfully subscribed to the Golden Club which enables you to be placed for part time jobs from top employers, this will remain active for a period of one year. <br>
                      You will be eligible to the following benefits: <br>
                      <ul>
                          <li>Guaranteed placement on an on-demand basis to more than one company.</li>
                          <li>Access to profession-based training and development opportunities.</li>
                          <li>Increased chances for eventual permanent employment.</li>
                          <li>Guaranteed income after successful placement.</li>
                          <li>Great networking opportunities with top employers.</li>
                      </ul>

                    <p>If you require further information on your subscription, <a href='".url('/contact')."'>Contact Us</a>.</p>

                    We wish you the very best. 

                    <br>";
                    EmailJob::dispatch( $user->name, $user->email, 'Golden Club activated', $caption, $contents);
        }
            
    }     
     
}


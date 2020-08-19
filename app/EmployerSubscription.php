<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Jobs\EmailJob;
use Illuminate\Notifications\Notifiable;


class EmployerSubscription extends Model
{   
    use Notifiable; 
    protected $fillable = [
        'user_id','name','email','phone_number','ending','status'
    ];

       public function routeNotificationForSlack($notification)
    {
        return 'https://hooks.slack.com/services/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';
    }


    public static function activateEmployerPaas($email)
    {
       
        $user = EmployerSubscription::where('email',$email)->where('status','inactive')->first();

        if(isset($user))
        {
           $user->status = 'active';
           $user->ending = now()->addYear();
           $user->save();

              $caption = "  Employer E-Club subscriptions activated on Emploi";
              $contents = "You have successfully subscribed to the E-Club which offers a great variety of benefits to employers which include. <br>
                <ul>
                    <li>Sourcing, management and growth tools at one stop.</li>
                    <li>Get access to our Job Seeker database and get to hire top professionals.</li>
                    <li>Thorough professional vetting: Know The Professional Candidate Referencing.</li>
                    <li>Top quality performance: KPI & performance appraisal framework.</li>
                    <li>We will help you maintain a healthy pipeline of potential replacements at all times.</li>
                    <li>Speed: 48 hour turnaround time.</li>
                </ul>

              <p>If you require further information on your subscription, <a href='".url('/contact')."'>Contact Us</a>.</p>

              Thank you for choosing Emploi. 

              <br>";
              EmailJob::dispatch( $user->name, $user->email, 'E-Club Subscription activated', $caption, $contents);
        }     
    }
}

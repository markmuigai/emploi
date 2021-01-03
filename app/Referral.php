<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Credit;
use App\User;

use Auth;
use App\Jobs\EmailJob;

class Referral extends Model
{
    protected $fillable = [
        'user_id', 'name', 'email','status'
    ];

    public function user(){
    	return $this->belongsTo(User::class);
    }

    public static function creditFor($email, $points = 10)
    {
    	$r = Referral::where('email',$email)->first();
    	if(isset($r->id) && isset($r->user_id))
    	{
    		Credit::create([
    			'user_id' => $r->user_id,
    			'value' => $points
    		]);
    		$r->status = 'completed';
    		return $r->save();
    	}
        return false;

    }

    public static function inviteEmail($email, $name=false, $role='any',$message=false){
        if(!filter_var($email, FILTER_VALIDATE_EMAIL) || !preg_match('/@.+\./', $email))
        {
            return false;
        }
        $r = Referral::where('email',$email)->first();
        if(isset($r->id))
            return false;
        $u = User::where('email',$email)->first();
        if(isset($u->id))
            return false;

        $user = Auth::user();
        $name = $name ? $name : 'user';

        $ref = Referral::create([
            'user_id' => isset($user->id) ? $user->id : null,
            'name' => $name,
            'email' => $email
        ]);

        if(isset($ref->id))
        {

            if(isset($user->id))
            {
                $caption = $user->name." has invited you to Emploi, where deserving talent meets deserving opportunities";
                $title = $user->name.' Invited you to Emploi';

                //$line = "<b>".$user->name."</b> has invited you to create a free profile on our platform, so you too can have access to our superior services.";
            }
            else
            {
                $caption = "You have been invited to Emploi, where deserving talent meets deserving opportunities";
                $title = "Emploi Invite";
                //$line = "You have been invited to create a free profile on our platform, as an employer or job seeker ,so you too can have access to our superior recruitment services.";
            }

            
            if($role == 'employer')
            {
                $line = $message ? $message : "You have been invited to create a free profile on our platform, as an employer, so you too can have access to our superior recruitment services.";
                
                $contents = "Emploi is a sourcing platform linking employers and job seekers. $line<br>
                When you can register as an employer, you get access to our powerful advertising and shortlisting tools. <br>

                <br>

                ".$name." click the button below to get started.<br>
                <a href='".url('/employers/register')."'>Register on Emploi</a> <br><br>

                Thank you for your time. Looking forward to working with you.";

            }
            elseif(strpos($role, 'seeker'))
            {
                $line = $message ? $message : "You have been invited to create a free profile on our platform, as a job seeker, so you too can have access to our superior placement services.";
                
                $contents = "Emploi is a sourcing platform linking employers and job seekers. $line<br>
                When you can register as a job seeker, you get access to top trending vacancies from across Africa to advance your career. <br>

                <br>

                ".$name." click the button below to get started.<br>
                <a href='".url('/register')."'>Register on Emploi</a> <br><br>

                Thank you for your time. Looking forward to working with you.";
            }
            else
            {
                $line = $message ? $message : "You have been invited to create a free profile on our platform, as an employer or job seeker ,so you too can have access to our superior recruitment services.";

                $contents = "Emploi is a sourcing platform linking employers and job seekers. $line<br>
                You can register as an employer - where you have access to our powerful advertising and shortlisting tools, or as a job seeker - for quick and efficient placement services. <br>

                <br>

                ".$name." click the button below to get started.<br>
                <a href='".url('/join')."'>Register on Emploi</a> <br><br>

                Thank you for your time. Looking forward to working with you.";
            }

            
            EmailJob::dispatch($name, $email, $title, $caption, $contents);

            return true;
        }
        return false;
    }

    
}

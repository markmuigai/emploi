<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Referral;
use App\User;

use Auth;
use App\Jobs\EmailJob;

class ReferralController extends Controller
{
    public function index(Request $request)
    {
        return redirect('/');
    }

    public function processCSV(Request $request)
    {
        $file = $request->file('csv');
        $successful = [];
        $failed = [];
        if (($handle = fopen($file, "r")) !== FALSE) {
            while (($data = fgetcsv($handle, 0, ",")) !== FALSE) {
                if(count($data) == 1) //email column only
                {
                    $invite = Referral::inviteEmail($data[0]);
                    
                    if($invite)
                        $successful[] = $data[0];
                    else
                        $failed[] = $data[0];
                }
                if(count($data) == 2) //two columns [email,name] [name,email]
                {
                    if(!filter_var($data[0], FILTER_VALIDATE_EMAIL) || !preg_match('/@.+\./', $data[0]))
                    {
                        $invite = Referral::inviteEmail($data[1],$data[0]);
                        if($invite)
                            $successful[] = [$data[1],$data[0]];
                        else
                            $failed[] = [$data[1],$data[0]];
                    }
                    else
                    {
                        $invite = Referral::inviteEmail($data[0],$data[1]);

                        if($invite)
                            $successful[] = [$data[0],$data[1]];
                        else
                            $failed[] = [$data[0],$data[1]];
                    }

                    
                }

                if(count($data) == 3) //three columns [email,name,role] [name,email,role]
                {
                    if(!filter_var($data[0], FILTER_VALIDATE_EMAIL) || !preg_match('/@.+\./', $data[0]))
                    {
                        $invite = Referral::inviteEmail($data[1],$data[0], $data[2]);
                        if($invite)
                            $successful[] = [$data[1],$data[0], $data[2]];
                        else
                            $failed[] = [$data[0],$data[1], $data[2]];
                    }
                    else{
                        $invite = Referral::inviteEmail($data[0],$data[1], $data[2]);
            
                        if($invite)
                            $successful[] = [$data[0],$data[1], $data[2]];
                        else
                            $failed[] = [$data[0],$data[1], $data[2]];
                    
                    }
                }     


                if(count($data) == 4) //four columns [email,name,role, message] [name,email,role, message]
                {
                    if(!filter_var($data[0], FILTER_VALIDATE_EMAIL) || !preg_match('/@.+\./', $data[0]))
                    {
                        $invite = Referral::inviteEmail($data[1],$data[0], $data[2],$data[3]);
                        if($invite)
                            $successful[] = [$data[1],$data[0], $data[2], $data[3]];
                        else
                            $failed[] = [$data[0],$data[1], $data[2], $data[3]];
                    }
                    else
                    {
                        $invite = Referral::inviteEmail($data[0],$data[1], $data[2], $data[3]);
                                     
            
                        if($invite)
                            $successful[] = [$data[0],$data[1], $data[2], $data[3]];
                        else
                            $failed[] = [$data[0],$data[1], $data[2], $data[3]];
                    }
                    
                }
            }
        }
        return view('pages.csv-invites')
                ->with('successful',$successful)
                ->with('failed',$failed);
    }

    public function create()
    {
        return redirect('/');
    }

    public function store(Request $request)
    {

        if(!isset($request->email) || !isset($request->name))
        {
            return view('pages.referral')
                    ->with('title','Referral Failed')
                    ->with('message','You provided either an invalid e-mail or name when inviting them. Kindy try again making sure both are correct.');
            return 'invalid';
        }
        $r = Referral::where('email',$request->email)->first();
        if(isset($r->id))
        {
            return view('pages.referral')
                    ->with('title','Referral Failed')
                    ->with('message','The e-mail you provided is linked to an already referred user. Thank you.');
            return 'referred';
        }
        $u = User::where('email',$request->email)->first();

        if(isset($u->id))
        {
            return view('pages.referral')
                    ->with('title','Referral Failed')
                    ->with('message','The e-mail you provided is linked to an already registered user. Thank you.');
            return 'registered';
        }


        if(isset(Auth::user()->id))
        {
            $user = Auth::user();
            $caption = Auth::user()->name." has invited you to Emploi, a Job seeker - Employer matching Platform";
            $title = $user->name.' Invited you to Emploi';

            $line = "<b>".$user->name."</b> has invited you to create a free profile on our platform, so you too can have access to our superior services.";
        }
        else
        {
            $caption = "You have been invited to Emploi, where deserving talent meets deserving opportunities";
            $title = "You've been invited to Emploi";
            $line = "You have been invited to create a free profile on our platform, as an employer or job seeker ,so you too can have access to our superior recruitment services.";
        }

        Referral::create([
            'user_id' => isset($user->id) ? $user->id : null,
            'name' => $request->name,
            'email' => $request->email
        ]);


        $contents = "Emploi is a sourcing platform linking employers and job seekers. $line<br>
        You can register as an employer - where you have access to our powerful advertising and shortlisting tools, or as a job seeker - for quick and efficient placement services. <br>

        <br>

        ".$request->name." click the button below to get started.<br>
        <a href='".url('/join')."'>Register on Emploi</a> <br><br>

        Thank you for your time. Looking forward to working with you.";
        EmailJob::dispatch($request->name, $request->email, $title, $caption, $contents);

        return view('pages.referral')
                    ->with('title','Referral Success')
                    ->with('message','An invitation to register has been sent to '.$request->name.'. Thank you for your referral.');
        return 'success';

    }

    public function show($id)
    {
        return redirect('/');
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}

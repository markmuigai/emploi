<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\CvReferral;
use App\User;

use Auth;
use App\Jobs\EmailJob;

class cvreferralcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return redirect('/');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    
    {
        if(!isset($request->email) || !isset($request->name))
        {
            return view('pages.referral')
                    ->with('title','Referral Failed')
                    ->with('message','You provided either an invalid e-mail or name when inviting them. Kindy try again making sure both are correct.');
            return 'invalid';
        }
        $user = Auth::user();
        if($request->email === $user->email) 
        {
            return view('pages.referral')
                    ->with('title','Referral Failed')
                    ->with('message','You cannot invite yourself. Kindy invite your friend.');
            return 'invalid';
        }
         
        $r = CvReferral::where('email',$request->email)->first();
        if(isset($r->id))
        {
            return view('pages.referral')
                    ->with('title','Referral Failed')
                    ->with('message','The e-mail you provided is linked to an already referred user. Thank you.');
            return 'referred';
        }

        if(isset(Auth::user()->id))
        {
            $user = Auth::user();
            $caption = Auth::user()->name." has invited you to request CV Editing services on Emploi, a Job seeker - Employer matching Platform";
            $title = $user->name.' Invited you For CV Editing on Emploi';

        }
        else
        {
            $caption = "You have been invited to request CV Editing on Emploi, where deserving talent meets deserving opportunities";
            $title = "You've been invited to request CV Editing on Emploi";
        }

        CvReferral::create([
            'user_id' => isset($user->id) ? $user->id : null,
            'name' => $request->name,
            'email' => $request->email
        ]);


        $contents = "You have been invited to request CV Editing services we offer on Emploi at a 50% discount,so you too can have access to our professional services to equip you with a good CV so that you stand out from the rest.<br>Click <a href='".url('/job-seekers/cv-editing')."'>here</a> to request.<br>
         <br><br>

        Thank you for your time. Looking forward to serving you.";
        EmailJob::dispatch($request->name, $request->email, $title, $caption, $contents);

        return view('pages.cv-referral')
                    ->with('title','Referral Success')
                    ->with('message','An invitation to request CV Editing has been sent to '.$request->name.'. Thank you for your referral.');
  

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

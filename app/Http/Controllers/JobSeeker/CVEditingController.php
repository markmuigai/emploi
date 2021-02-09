<?php

namespace App\Http\Controllers\JobSeeker;

use Auth;
use Storage;
use App\Faq;
use App\User;
use App\Seeker;
use App\Referral;
use App\CvEditRequest;
use App\Jobs\EmailJob;
use App\UserPermission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;

class CVEditingController extends Controller
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
        // if(isset(request()->years_experience)){
        //     Seeker::getCvEditingPackage($years);
        // }
        // request()->years_experience ? Seeker::getCvEditingPackage($years)
        return view('v2.seekers.cv-editing.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:50'],
            'email'  =>  ['required', 'string', 'email','max:50'],
            'resume' => ['required','mimes:pdf,docx,doc','max:51200'],
            'phone_number' => ['required', 'string', 'max:20'],
            'industry'    =>  ['integer'],
            'experience'  =>  ['integer'],
            'amount'    =>  ['integer'],
            'message' => ['max:500']
        ]);

        $free_review = isset($request->free_review) ? true : false;

        $storage_path = '/public/resume-edits';
        $resume_url = basename(Storage::put($storage_path, $request->resume));

        $review_message = $request->message ? $request->message : 'No custom message';

         if($free_review)
        {
            $review_message = '[FREE CV REVIEW]: '.$review_message;
        }

            $r = CvEditRequest::create([
            'email' => $request->email,
            'industry_id' => $request->industry, 
            'name' => $request->name,
            'phone_number' => $request->phone_number,
            'experience' => $request->experience,
            'amount' => $request->amount,
            'message' => $review_message,
            'slug' => strtolower(User::generateRandomString(30)),
            'original_url' => $resume_url
        ]);
        $user = User::where('email',$request->email)->first();
        $created = false;
        if(!isset($user->id))
        {
            $username = explode(" ", strtolower($request->name));
            $username = implode("-", $username).rand(1000,30000);
            $password = User::generateRandomString(10);
            $created = true;

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'username' => $username,
                'email_verification' => User::generateRandomString(10),
                'password' => Hash::make($password),
            ]);

            Referral::creditFor($request->email);         

            $seeker = Seeker::create([
                'user_id' => $user->id,
                'public_name' => $username,
                'country_id' => 1,
                'industry_id' => $request->industry
            ]);

                $perm = UserPermission::create([
                'user_id' => $user->id, 
                'permission_id' => 4
            ]);        
                


            $caption = "Thank you for registering your profile on Emploi as a Job Seeker.";
            $contents = "Here are your login credentials for Emploi: <br>
            username: $username <br>
            Password: $password <br>
            <br>

            Verify your account <a href='".url('/verify-account/'.$user->email_verification)."'>here</a> and finish setting up your account for employers to easily find and shortlist you.
            <br>

            <br>
                    ";
            EmailJob::dispatch($user->name, $user->email, 'Verify Emploi Account', $caption, $contents);

            }

        if(isset($r->id))
        {

            $message = "Your request has been received for professional CV editing. One of our CV consultants will get in touch shortly. Thank you for choosing Emploi";

            $caption = "CV Editing request has been received on Emploi";
            $contents = $message."

            <br><br>
            Your final CV would be sent to your e-mail address. <br>
            <a href='".url('/cv-editing/'.$r->slug)."'>View Updates</a> <br><br>

            Thank you for choosing Emploi.";

            EmailJob::dispatch($r->name, $r->email, 'Professional CV Editing Requested', $caption, $contents);

            if (app()->environment() === 'production') {
                $sm = $free_review ?  $r->name.' requested for Free CV Review; CV Editing Before? '.$request->check.', Can Pay? '.$request->amount.'' : $r->name.' requested for CV Editing';
                Seeker::first()->notify(new EditingRequest($sm));
            }            
        }
        else
            $message = "An error occurred while processing your request. Kindly try again after a while or contact us if the error persists";
        

        
        return view('cvediting.created')
                ->with('name',$request->name)
                ->with('message',$message);
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

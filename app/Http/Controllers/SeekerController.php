<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Auth;
use Notification;
use Illuminate\Support\Facades\DB;

use App\Jobs\EmailJob;

use App\Blog;
use App\Country;
use App\EducationLevel;
use App\Industry;
use App\JobApplication;
use App\Location;
use App\Post;
use App\VacancyType;
use App\User;
use App\Seeker;
use App\Referral;
use App\UserPermission;
use App\SeekerSubscription;
use App\Invoice;
use App\Notifications\PaasSubscribed;
use App\Notifications\InvoiceCreated;
use App\Notifications\ContactReceived;

class SeekerController extends Controller
{
    public function dashboard(Request $request)
    {
        return view('seekers.dashboard')
            ->with('posts',Auth::user()->seeker->featuredPosts())
            ->with('blogs',Blog::recent(20));
    }

    public function toProfile(){
        return redirect('/profile');
    }

    public function applications(Request $request, $id = null)
    {
    	$user = Auth::user();
    	if(!$id)
    	{
    		return view('seekers.applications')
    				->with('user',$user);
    	}
    	else
    	{
    		$app = JobApplication::findOrFail($id);

    		if($app->user_id != $user->id)
    			abort(403);
    		return view('seekers.application')
    				->with('app',$app)
    				->with('user',$user);
    	}
    	return 'application';
    }

    public function feed(Request $request){
        $ret = array();
        if(isset($request->initial)){

            $jobs = Post::recent(5);
            for($i=0; $i<count($jobs); $i++)
            {
                $j = $jobs[$i];
                $el = ['job', $j, $j->company, $j->industry, $j->location, $j->location->country, $j->vacancyType, $j->educationLevel];
                array_push($ret, $el);
            }

            $blogs = Blog::recent(3);
            for($i=0; $i<count($blogs); $i++)
            {
                $b = $blogs[$i];
                $el = ['blog',$b,$b->user,$b->category];
                array_push($ret, $el);
            }
        }
        else
        {
            $str = "WHERE id NOT IN 4";

            // for($i=0; $i<count($request->blogs); $i++)
            // {
            //     $b = $request->blogs[$i];
            //     if($i==0)
            //         $str .= " WHERE id != $b";
            //     else
            //         $str .= ", WHERE id != $b";
            // }
            $sql = "SELECT id FROM posts $str ORDER BY id DESC LIMIT 5";
            return DB::select($sql);
            return $sql;
            //return blogs [3] and jobs [5] not received
            //sort by date

            return $request->all();
        }
        return $ret;
    }

    public function paas(){
      return view('seekers.paas')
                ->with('industries',Industry::orderBy('name')->get());
    }

    public function rpaas(){
        return view('seekers.request-paas')
             ->with('industries',Industry::orderBy('name')->get());
    }

     public function getPaas(Request $request)
    {   

         $request->validate([
            'firstname'   =>  ['required','max:50','string'],
            'lastname'    =>  ['required','max:50','string'],
            'email'         =>  ['required','string', 'email', 'max:50'],
            'phone_number' => ['required', 'string', 'max:15'],
            'industry'    =>  ['integer']
        ]);
        
        $user = User::where('email',$request->email)->first();
        $created = false;

        if(isset($user->id) && $user->userpermission->permission_id == 3){
           return \Redirect::route('eclub')->with('fail','We noted you are registered as an employer. Kindly join E-Club for Employers or register with a different email as a Jobseeker !');
        }
        if(isset($user->id) && $user->userpermission->permission_id == 2){
            die("Product is only for Employers and Jobseekers");
        }
                if(!isset($user->id))
        {
            $username = explode(" ", strtolower($request->name));
            $username = implode("-", $username).rand(1000,30000);
            $password = User::generateRandomString(10);
            $created = true;

            $user = User::create([
                'name' => $request->firstname. ' ' .$request->lastname,
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
                'phone_number' => $request->phone_number,
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
             $js = SeekerSubscription::create([
                'user_id' => $user->id,
                'name' => $request->firstname. ' ' .$request->lastname,
                'phone_number' => $request->phone_number,
                'email' => $user->email,
                'industry_id' => $request->industry
            ]);

            //     $invoice = Invoice::create([
            //     'slug' => Invoice::generateUniqueSlug(11),
            //     'first_name' => $request->firstname,
            //     'last_name' => $request->lastname,
            //     'phone_number' => isset($request->phone_number) ? $request->phone_number : null,
            //     'email' => $user->email,
            //     'description' => 'Payment for Golden Club Membership',
            //     'sub_total' => 2750.00
            // ]);
            //     if(isset($invoice->id))
            // {
            //     $message = 'Invoice '.$invoice->slug.' totalling to  Ksh '.$invoice->sub_total.' created on Emploi. Customer: '.$invoice->first_name.', email: '.$invoice->email;
            //     $invoice->remind('email');
            // }

           
        if (isset($js->id))
        {    
            if (app()->environment() === 'production')
             Notification::send(SeekerSubscription::first(),new PaasSubscribed('GOLDEN CLUB SUBSCRIPTION: '.$js->name.' with contact details  '.$js->email.' and  '.$js->phone_number.'  has submitted subscription for Golden Club Membership.'));
        }


        if (Auth::guest()) {
        return \Redirect::to("/login?redirectToUrl=/checkout?product=golden_club");
        }
        return redirect('/checkout?product=golden_club');
    }

    public function leaveContact(Request $request)
    { 
        // return $request->all();
        if (isset($request->phone))
        {    if (app()->environment() === 'production')
             Notification::send(SeekerSubscription::first(),new PaasSubscribed($request->phone.' is interested on PaaS for JOB SEEKERS'));
        }

        return Redirect::back()->with('success','Contact Received, We will get back to you shortly !');
    }
}

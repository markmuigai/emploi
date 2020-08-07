<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Auth;
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

     public function getPaas(Request $request)
    {   

         $request->validate([
            'name'          =>  ['required','max:50','string'],
            'email'         =>  ['required','string', 'email', 'max:50'],
            'phone_number' => ['required', 'string', 'max:15'],
            'industry'    =>  ['integer']
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
                'name' => $user->name,
                'phone_number' => $request->phone_number,
                'email' => $user->email,
                'industry_id' => $request->industry
            ]);

            if(isset($js->id))
            {

                $caption = "Subscription Received";
                $contents = "We have received your subscription on Emploi Professional As A Service (PAAS).<br>
                One of our administrators will get back to you shortly.
                <br><br>
                If you have questions regarding your subscription or other Emploi Services kindly <a href='".url('/contact')."'>contact us</a><br.
                Thank you for choosing Emploi.
                <br><br>
                ";
                EmailJob::dispatch($user->name, $user->email, 'Subscription Received', $caption, $contents);

            }

            return redirect()->back()->with('success', 'Your subscription has been sent successfully, Check your email for instructions on how to complete the payment!');
    }
}

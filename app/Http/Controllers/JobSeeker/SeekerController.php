<?php

namespace App\Http\Controllers\JobSeeker;

use App\Http\Controllers\Controller;

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
use App\PartTimer;
use App\Task;
use App\Message;
use App\Issue;
use App\LeaveRequest;
use App\Notifications\PaasSubscribed;
use App\Notifications\InvoiceCreated;
use App\Notifications\ContactReceived;

class SeekerController extends Controller
{
    public function dashboard(Request $request)
    {
        return view('v2.seekers.dashboard')
            ->with('posts',Auth::user()->seeker->featuredPosts())
            ->with('blogs',Blog::recent(20));
    }

    public function coaching(Request $request)
    {
        return view('v2.seekers.coaching');
    }

    public function placement(Request $request)
    {
        return view('v2.seekers.placement');
    }

    public function toProfile(){
        return redirect('/profile');
    }

    public function applications(Request $request, $id = null)
    {
    	$user = Auth::user();
    	if(!$id)
    	{
    		return view('v2.seekers.applications')
    				->with('user',$user);
    	}
    	else
    	{
    		$app = JobApplication::findOrFail($id);

    		if($app->user_id != $user->id)
    			abort(403);
    		return view('v2.seekers.application')
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
      return view('v2.seekers.paas')
                ->with('industries',Industry::orderBy('name')->get());
    }

    public function rpaas(){
        return view('v2.seekers.request-paas')
             ->with('industries',Industry::orderBy('name')->get());
    }

     public function getPaas(Request $request)
    {   

        $user=Auth::user();

         $request->validate([
            'firstname'   =>  ['required','max:50','string'],
            'lastname'    =>  ['required','max:50','string'],
            'email'         =>  ['required','string', 'email', 'max:50'],
            'phone_number' => ['required', 'string', 'max:15'],
            'industry'    =>  ['integer']
        ]);

         $e = SeekerSubscription::where('email',$request->email)->first();
         if(isset($e))
         {
                $js = SeekerSubscription::create([
                'user_id' => $user->id,
                'name' => $request->firstname. ' ' .$request->lastname,
                'phone_number' => $request->phone_number,
                'email' => $user->email,
                'industry_id' => $request->industry
            ]);
            if(isset($js->id)){
                if (app()->environment() === 'production'){
                 Notification::send(SeekerSubscription::first(),new PaasSubscribed('GOLDEN CLUB: '.$js->name.' with contact details  '.$js->email.' and  '.$js->phone_number.'  has submitted subscription for Golden Club Membership.'));
                }         
            return redirect('/checkout?product=golden_club');  
            }         
         }     

         else

         {
                $js = SeekerSubscription::create([
                'user_id' => $user->id,
                'name' => $request->firstname. ' ' .$request->lastname,
                'phone_number' => $request->phone_number,
                'email' => $user->email,
                'industry_id' => $request->industry
            ]);
           if(isset($js->id)){
            $user->seeker->activateFreeGoldenClub();

            if (app()->environment() === 'production'){
             Notification::send(SeekerSubscription::first(),new PaasSubscribed('GOLDEN CLUB SUBSCRIPTION: '.$js->name.' with contact details  '.$js->email.' and  '.$js->phone_number.'  has submitted subscription for Golden Club Membership.'));
                }
            }
              return redirect('/job-seekers/dashboard');
         }
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

    public function applyTask($slug)
    { 
         $user = Auth::user();
         $t =   PartTimer::create([
                'user_id' => $user->id,
                'task_slug' => $slug 
            ]);

        return Redirect::back()->with('applied','Application success!');
    }

    public function show($id, $email=false)
    {
        if(!$email)
        {     $task= Task:: Where('id',$id)->firstOrFail();
                return view('pages.task-content')
                ->with('task',$task);
        }

       $user = User::where('email',$email)->firstOrFail();
        Auth::login($user);

        $task= Task:: Where('id',$id)->firstOrFail();
        return view('pages.task-content')
          ->with('task',$task);
    }

    public function compose(Request $request, $id)
    {
        $message = Message::where('id', $id)->firstOrFail();
        return view('v2.seekers.messages.compose')
            ->with('message', $message);
    }

    public function message($id)
    {

        $user = Auth::user();
        $message = Message::where('to_id', $user->id)->where('id', $id)->firstOrFail();
        $message->update(['seen' =>1]);
        $message->save();

        return view('v2.seekers.messages.view')
                ->with('message',$message);

    }

    public function send(Request $request)
    {
        $t = Task::where('slug', $request->slug)->first();
        // return $request->all();
        $user = Auth::user();
        $m = Message::create([
            'title'=>$request->title,
            'task_slug' =>$t->slug,
            'body' => $request->body,           
            'to_id' => $request->to_id,
            'from_id'=>$user->id
        ]);
        return redirect('/sent');
        return $request->all();
    }

    public function inbox(Request $request)
    {
        $user = Auth::user();

        $messages = Message::where('to_id', $user->id)->get();
        return view('v2.seekers.messages.inbox')
            ->with('messages', $messages);
    }

    public function sent(Request $request)
    {
        $user = Auth::user();

        $messages = Message::where('from_id', $user->id)->get();
        return view('v2.seekers.messages.sent')
            ->with('messages', $messages);
    }

    public function leave($slug)
    {
        $user = Auth::user();

        $task = Task::where('slug', $slug)->first();
        $issue = Issue::where('task_slug', $slug)->first();

        return view('v2.seekers.messages.leave')
            ->with('task', $task)
            ->with('issue', $issue);
    }

    public function storeLeave(Request $request)
    {
        //$t = Task::where('slug', $request->slug)->first();
        // return $request->all();
        $user = Auth::user();
        $m = LeaveRequest::create([
            'user_id'=>$user->id,
            'task_slug' =>$request->task_slug,
            'reason' => $request->reason,           
            'start_time' => $request->start_time,
            'end_time'=>$request->end_time
        ]);
        return redirect('/leave-requests');
        return 'Leave Request Sent';
        return $request->all();
    }

    public function leaveRequests(Request $request)
    {
        $user = Auth::user();
        $leaves = LeaveRequest::where('user_id', $user->id)->get();

        return view('v2.seekers.messages.leaves')
            ->with('leaves', $leaves);

    }

}
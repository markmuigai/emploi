<?php

namespace App\Http\Controllers\Employer;

use App\Utils\CollectionHelper;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Auth;
use DB;
use Session;
use Notification;

use App\Candidate;
use App\Company;
use App\CompanySize;
use App\Country;
use App\Course;
use App\CvRequest;
use App\EducationLevel;
use App\Employer;
use App\IqTest;
use App\Industry;
use App\IndustrySkill;
use App\InterviewResult;
use App\InviteLink;
use App\JobApplication;
use App\Location;
use App\ModelSeeker;
use App\ModelSeekerCourse;
use App\ModelSeekerSkill;
use App\ModelSeekerPersonalityTrait;
use App\Personality;
use App\PersonalityTrait;
use App\Post;
use App\PsychometricTest;
use App\Referee;
use App\Referral;
use App\JobApplicationReferee;
use App\RsiWeight;
use App\Seeker;
use App\SeekerPreviousCompanySize;
use App\SeekerPersonality;
use App\Skill;
use App\User;
use App\UserPermission;
use App\EmployerSubscription;
use App\Invoice;
use App\Task;
use App\PartTimer;
use App\LeaveRequest;
use App\Performance;

use App\Jobs\EmailJob;
use App\Notifications\VerifyAccount;
use App\Notifications\EmployerRegistered;
use App\Notifications\PaasSubscribed;
use App\Notifications\InvoiceCreated;

class EmployerController extends Controller
{
    public function viewReport($slug, Request $request){

        $user = Auth::user();

        if($user->employer->isOnStawiPackage())
        {
            $referee=Referee::where('slug',$slug)->firstOrFail();
            return view('referees.report')->with('referee',$referee);
        }
        else
            return redirect('/checkout?product=stawi');


    }

    public function register(Request $request){
        $email= $request->email ? $request->email : '';
        $name=$request->name ? $request->name : '';
    	return view('employers.register')
                ->with('name',$name)
                ->with('email',$email)
    			->with('industries', Industry::all())
    			->with('countries',Country::active());
    }

    public function shareJob(Request $request, $slug){
        $user = Auth::user();

        if($user->email == 'jobs@emploi.co' || $user->email == 'info@emploi.co')
        {
            $post = Post::where('slug',$slug)->firstOrFail();
            return view('jobs.share')
                    ->with('post',$post);
            dd($post);
        }
        abort(403);

    }

    public function shareJobNow(Request $request, $slug){
        $user = Auth::user();

        if($user->email == 'jobs@emploi.co' || $user->email == 'info@emploi.co')
        {
            $post = Post::where('slug',$slug)->firstOrFail();
            return $request->all();
        }
        abort(403);

    }

    public function create(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:50'],
            'contact_prefix' => ['required','integer'],
            'phone_number' => ['required', 'string', 'max:15'],
            'email' => ['required', 'string', 'email', 'max:50', 'unique:users'],
            'password' => ['required', 'string', 'min:5', 'confirmed','max:50'],
            'co_name' => ['required', 'string', 'max:50'],
            'co_email' => ['required', 'string', 'email', 'max:50'],
            'co_phone_number' => ['required', 'string', 'max:15'],
            'country' => ['required','integer'],
            'industry' => ['required','integer'],
            'address' => ['required', 'string']
        ]);

        //name, email, password, contact_prefix, company_prefix, industry, co_name, phone_number, co_phone_number, co_email, country


        $checkForSpam = [$request->co_name,$request->name];
        $spam = false;

        for($k=0; $k<count($checkForSpam); $k++)
        {
            $item = strtolower($checkForSpam[$k]);
            if(strpos($item, 'sex') !== false)
                $spam = true;
            if( strpos($item, 'fuck') !==false)
                $spam = true;
            if( strpos($item, 'http') !== false)
                $spam = true;
            if(strpos($item, 'adult') !== false)
                $spam = true;
            if(strpos($item, 'dating') !== false)
                $spam = true;
            if( strpos($item, 'free') !== false)
                $spam = true;
            if( strpos($item, 'crypto') !== false)
                $spam = true;
            if( strpos($item, '$') !== false)
                $spam = true;
            if($spam)
                die('Unauthorised words found in your submission. Kindly <a href="/employers/register">try again</a>!');
        }

    	$user = User::where('email',$request->email)
    				->first();
    	if(isset($user->id))
    	{
    		return 'Email has been registered. <a href="/login">Login here</a>';
    	}



    	$username = explode(" ", $request->name);
        $username = strtolower(implode("", $username).rand(1000,30000));
        $username = explode(".", $username);
        $username = implode('',$username);

        $password = User::generateRandomString(10);

    	$user = User::create([
    		'name' => $request->name,
            'email' => $request->email,
            'username' => $username,
            'email_verification' => User::generateRandomString(10),
            'password' => Hash::make($request->password),
    	]);



        //$credited = Referral::creditFor($request->email,20);

        //if(!$credited && Session::has('invite_id'))
        $r = Referral::where('email',$request->email)->first();

        if(!isset($r->id) && Session::has('invite_id'))
        {
            $invite_id = Session::get('invite_id');
            $link = InviteLink::find($invite_id);
            if(isset($link->id))
            {
                Referral::create([
                    'user_id' => $link->user_id,
                    'name' => $user->name,
                    'email' => $user->email
                ]);

                //Referral::creditFor($user->email,20);
            }

            //Session::forget('invite_id');
        }

        //return $request->all();

    	$country = Country::findOrFail($request->contact_prefix);

    	$country2 = Country::findOrFail($request->company_prefix);

       	$emp = Employer::create([
    		'user_id' => $user->id,
    		'name' => $request->name,
    		'industry_id' => $request->industry,
            'company_name' => $request->co_name,
    		'contact_phone' => $country->prefix.$request->phone_number,
    		'company_phone' => $country2->prefix.$request->co_phone_number,
    		'company_email' => $request->co_email,
    		'country_id' => $request->country,
    		'address' => $request->address
    	]);



        //return $emp;

    	$perm = UserPermission::create([
            'user_id' => $user->id,
            'permission_id' => 3
        ]);

        $ec = Company::where('name',$request->co_name)->first();
        $co_name = isset($ec->id) ? $request->co_name.'-'.User::generateRandomString(4) : $request->co_name;
        //$co_name = $request->co_name.User::generateRandomString(4);

        $c = Company::create([
            'name' => $co_name,
            'user_id' => $user->id,
            'about' => "Company on Emploi",
            'website' => "http://emploi.co/companies/".$co_name,
            'industry_id' => $request->industry,
            'location_id' => 1,
            'company_size_id' => 1
        ]);

        if(isset(Auth::user()->id) && Auth::user()->role == 'admin')
        {
            $user->verifyAccount();
        }
        else
        {
            $user->notify(new VerifyAccount($user->email,$user->email_verification,$user->name));
        }



        // $caption = "Thank you for registering your profile on Emploi as an Employer";
        // $contents = "Your account has been created successfully. Log in with username: <b>$username</b> <br>
        // <br>

        // Verify your account <a href='".url('/verify-account/'.$user->email_verification)."'>here</a> and finish setting up your account for employers to easily find and shortlist you.
        //         ";
        // EmailJob::dispatch($user->name, $user->email, 'Verify Emploi Account', $caption, $contents);

        if (app()->environment() === 'production')
        Notification::send(Employer::first(),new EmployerRegistered('NEW EMPLOYER: '.$c->user->name.' registered and created Company '.$c->name));

        $caption = "A new employer has registered on Emploi";
        $contents = $c->user->name." has created a company on Emploi using the name <b>".$c->name."<b>.<br>
        Log in to <a href='/admin/panel'>Admin panel</a> to manage companies.";
        EmailJob::dispatch('Emploi Team', 'jobapplication389@gmail.com', 'Company '.$c->name.' Created', $caption, $contents);

        //send welcome email to company
        //send credentials to employer
        return view('employers.registered')
                ->with('username',$user->username);
    }

    public function paasdash(Request $request)
    {
        return view('employers.paasdash');
    }

    public function browse(Request $request)
    {
        //errors exist
        $seekers = Seeker::orderBy('featured')->paginate(10);
        $title = "Browse Job Seekers";
        //$location = isset($request->location_id) ? " OR location_id = ".$request->location_id : '';
        $industry = isset($request->industry) ? Industry::where('slug',$request->industry)->firstOrFail() : '';
        $q = $request->q ? '"%'.$request->q.'%"' : '';
        $query = $q == '' ? '' : "WHERE experience like $q OR (education LIKE $q OR resume_contents LIKE $q)";
        //dd($query);
        if($query == '')
        {
            if(isset($request->location))
            {
                $query .= " WHERE location_id = ".$request->location;
            }
        }
        else
        {
            if(isset($request->location))
            {
                $query .= " AND location_id = ".$request->location;
            }
        }

        //dd($query);

        if($query == '')
        {
            if(isset($request->industry))
            {
                $query .= " WHERE industry_id = ".$industry->id;
            }
        }
        else
        {
            if(isset($request->industry))
            {
                $query .= " AND industry_id = ".$industry->id;
            }
        }

        //$query = $query == '' ? '' : "$query";




        $sql = "SELECT id FROM seekers $query ORDER BY featured DESC";
        //dd($sql);
        $results = DB::select($sql);

        //dd($sql);
        $arr = [];
        for($i=0;$i<count($results); $i++)
        {
            $arr[] = $results[$i]->id;
        }
        //$results = DB::select($arr);

        $seekers = Seeker::whereIn('id',$arr)->orderBy('featured','DESC')->paginate(10)->appends(request()->query());
        //dd($seekers);

        return view('employers.browse')
                ->with('seekers',$seekers)
                ->with('industries',Industry::active())
                ->with('locations',Location::active())
                ->with('location',$request->location )
                ->with('industry',$industry ? $industry : '')
                ->with('query',$request->q)
                ->with('title',$title);

    }

    public function jobs(Request $request)
    {
        $q = isset($request->q) ? $request->q : '';
        $employer = Auth::user()->employer;
        //return $employer->posts;
        $companies = $employer->user->companies;
        $company_ids = array();
        for($i=0; $i<count($companies); $i++)
        {
            array_push($company_ids, $companies[$i]->id);
        }
        if(isset($request->q))
        {
            $posts = Post::whereIn('company_id',$company_ids)->where('title','like','%'.$request->q.'%')->orderBy('id','DESC')->paginate(20);
        }
        else
        {
            $posts = Post::whereIn('company_id',$company_ids)->orderBy('id','DESC')->paginate(20);
        }


        return view('employers.dashboard.jobs')
                ->with('q',$q)
                ->with('posts',$posts);

    }

    public function paastask(Request $request)
    {
        $tasks = Task::where('employer_id', Auth::user()->employer->id)->where('status','!=', 'pending')->paginate(5);

        // return $task;
        return view('employers.dashpaas.task')
            ->with('tasks', $tasks);
    }

    public function adminpaas(Request $request)
    {
        $user = Auth::user();

        $tasks = Task::where('employer_id', Auth::user()->employer->id)->paginate(5);
        $shortlisted = PartTimer::where('status', 'shortlisted')->orwhere('status', 'selected')->paginate(5);
        $leaves = LeaveRequest::where('task_slug', $user->slug)->where('id', $user->id)->get();

        return view('employers.dashpaas.admin')
            ->with('tasks', $tasks)
            ->with('shortlisted', $shortlisted)
            ->with('leaves', $leaves);
    }

    public function paasinv(Request $request)
    {
        $invoices = Invoice::where('email', Auth::user()->email)
                    ->where('description','Payment for Part Timer')
                    ->Where('alternative_payment_slug', 'Free E-Club Package')->paginate(5);

        return view('employers.dashpaas.invoice')
            ->with('invoices', $invoices);
    }

    public function viewInvoice($slug){

        $invoice = Invoice::where('slug',$slug)->firstOrFail();
        
        return view('employers.dashpaas.invoice-view')
                ->with('invoice',$invoice);

    }

    public function viewTask($slug)
    {
        $task = Task::where('slug',$slug)->firstOrFail();
        $leaves = LeaveRequest::where('task_slug', $slug)->where('id', $user->id)->get();

     

        return view('employers.dashpaas.task-view')
            ->with('task', $task)
            ->with('leaves', $leaves);
    }

    public function leaves($slug)
    {
        $task = Task::where('slug',$slug)->firstOrFail();
        $leaves = LeaveRequest::where('task_slug', $slug)->get();

        return view('employers.dashpaas.leave')
            ->with('task', $task)
            ->with('leaves', $leaves);
    }

    public function acceptLeave($id)
    {        
        $candidate = LeaveRequest::find($id);
        $candidate->update(['status' =>'accepted']);
        $candidate->save();
                

        return Redirect::back()->with('accepted','Leave Accepted!');
    }

    public function rejectLeave($id)
    {        
        $candidate = LeaveRequest::find($id);
        $candidate->update(['status' =>'rejected']);
        $candidate->save();
        

        return Redirect::back()->with('rejected','Leave Rejected!');
    }

    public function prequest(Request $request)
    {
        $tasks = Task::where('employer_id', Auth::user()->employer->id)->orderBy('created_at','DESC')->paginate(5);
        $shortlisted = PartTimer::where('status', 'shortlisted')->orderBy('created_at','DESC')->paginate(5);


        return view('employers.dashpaas.request')
            ->with('tasks', $tasks)
            ->with('shortlisted', $shortlisted);
    }

    public function activeJobs(Request $request)
    {
        $q = isset($request->q) ? $request->q : '';
        $employer = Auth::user()->employer;
        $companies = $employer->user->companies;
        $company_ids = array();
        for($i=0; $i<count($companies); $i++)
        {
            array_push($company_ids, $companies[$i]->id);
        }
        if(isset($request->q))
        {
            $posts = Post::whereIn('company_id',$company_ids)->where('title','like','%'.$request->q.'%')->where('status','active')->orderBy('id','DESC')->paginate(20);
        }
        else
        {
            $posts = Post::whereIn('company_id',$company_ids)->where('status','active')->orderBy('id','DESC')->paginate(20);
        }


        return view('employers.dashboard.jobs-active')
                ->with('q',$q)
                ->with('activePosts',$posts);


    }

    public function otherJobs(Request $request)
    {
        $q = isset($request->q) ? $request->q : '';
        $employer = Auth::user()->employer;
        $companies = $employer->user->companies;
        $company_ids = array();
        for($i=0; $i<count($companies); $i++)
        {
            array_push($company_ids, $companies[$i]->id);
        }
        if(isset($request->q))
        {
            $posts = Post::whereIn('company_id',$company_ids)->where('title','like','%'.$request->q.'%')->where('status','!=','active')->orderBy('id','DESC')->paginate(20);
        }
        else
        {
            $posts = Post::whereIn('company_id',$company_ids)->where('status','!=','active')->orderBy('id','DESC')->paginate(20);
        }

        return view('employers.dashboard.jobs-other')
                ->with('q',$q)
                ->with('closedPosts',$posts);


    }

    public function shortlistingJobs(Request $request)
    {
        $q = isset($request->q) ? $request->q : '';
        $employer = Auth::user()->employer;
        $companies = $employer->user->companies;
        $company_ids = array();
        for($i=0; $i<count($companies); $i++)
        {
            array_push($company_ids, $companies[$i]->id);
        }

        if(isset($request->q))
        {
            $posts = Post::whereIn('company_id',$company_ids)->where('title','like','%'.$request->q.'%')->where('how_to_apply',null)->orderBy('id','DESC')->paginate(20);
        }
        else
        {
            $posts = Post::whereIn('company_id',$company_ids)->where('how_to_apply',null)->orderBy('id','DESC')->paginate(20);
        }


        return view('employers.dashboard.jobs-shortlisting')
                ->with('q',$q)
                ->with('posts',$posts);


    }

    public function applyForUser(Request $request){
        $seeker = Seeker::findOrFail($request->seeker_id);
        $post = Post::findOrFail($request->post_id);
        if($seeker->hasApplied($post))
        {
            return view('employers.dashboard.message')
                    ->with('title','Already Applied')
                    ->with('message',$seeker->public_name.' has already applied for the '.$post->title.' position');
        }

        $j = JobApplication::create([
            'user_id' => $seeker->user->id,
            'post_id' => $post->id,
            'cover' => 'Shortlisted by employer',
            'status' => 'shortlisted'
        ]);
        if(isset($j->id))
        {
            return view('employers.dashboard.message')
                    ->with('title','Shortlist Success')
                    ->with('message',$seeker->public_name.' has been shortlisted for the '.$post->title.' position.');
        }
        return view('employers.dashboard.message')
                ->with('title','Shortlist Failed')
                ->with('message','An Error occured while shortlisting '.$seeker->public_name.'. Please try again later.');
    }

    public function viewSeeker(Request $request,$username)
    {   
        $user = User::where('username',$username)->firstOrFail();

        //get jobseeker assessment score
        $assessment_result=Performance::where('email', $user->email)->first();
        $perf = Performance::recentScore($user->email);
      

        if($user->role == 'seeker')
        {
            if(!$request->session()->has('viewed-seeker-'.$user->seeker->id))
            {
                $request->session()->put('viewed-seeker-'.$user->seeker->id, now());
                $user->seeker->isBeingViewedBy(Auth::user());
            }

        }
        if(Auth::user()->role == 'admin')
            return redirect('/admin/seekers/'.$username);

        return view('employers.seeker')
                ->with('user',$user)
                ->with('perf', $perf);

    }

    public function dashboard(Request $request)
    {
        $recentApplications = Auth::user()->employer->recentApplications();

        $industry = isset($request->industry) ? Industry::where('slug',$request->industry)->firstOrFail() : '';
        $q = $request->q ? '"%'.$request->q.'%"' : '';
        $query = $q == '' ? '' : "WHERE experience like $q OR (education LIKE $q OR resume_contents LIKE $q)";

        if($query == '')
        {
            if(isset($request->industry))
            {
                $query .= " WHERE industry_id = ".$industry->id;
            }
        }
        else
        {
            if(isset($request->industry))
            {
                $query .= " AND industry_id = ".$industry->id;
            }
        }

        //$query = $query == '' ? '' : "$query";

        $sql = "SELECT id FROM seekers $query ORDER BY featured DESC";
        //dd($sql);
        $results = DB::select($sql);

        //dd($sql);
        $arr = [];
        for($i=0;$i<count($results); $i++)
        {
            $arr[] = $results[$i]->id;
        }
        //$results = DB::select($arr);

        $featuredSeekers = Seeker::whereIn('id',$arr)->where('featured','>',0)->orderBy('featured','DESC')->paginate(12)->appends(request()->query());

        return view('employers.dashboard.index')
                ->with('recentApplications',$recentApplications)
                ->with('featuredSeekers',$featuredSeekers)
                ->with('industries',Industry::active())
                ->with('industry',$industry ? $industry : '');
    }

    public function internalApp(Request $request)
    {
        $internalApplications = Auth::user()->employer->getApplications();
        return view('employers.dashboard.internal-applications')
                ->with('internalApplications',$internalApplications);
    }

    public function topCandidates(Request $request)
    {
        $topCandidates = Seeker::where('featured',2)->orderBy('id','DESC')->paginate(10);
        $title = "Top Candidates";
        //$location = isset($request->location_id) ? " OR location_id = ".$request->location_id : '';
        $industry = isset($request->industry) ? Industry::where('slug',$request->industry)->firstOrFail() : '';
        $q = $request->q ? '"%'.$request->q.'%"' : '';
        $query = $q == '' ? '' : "WHERE experience like $q OR (education LIKE $q OR resume_contents LIKE $q)";
        //dd($query);
        if($query == '')
        {
            if(isset($request->location))
            {
                $query .= " WHERE location_id = ".$request->location;
            }
        }
        else
        {
            if(isset($request->location))
            {
                $query .= " AND location_id = ".$request->location;
            }
        }

        //dd($query);

        if($query == '')
        {
            if(isset($request->industry))
            {
                $query .= " WHERE industry_id = ".$industry->id;
            }
        }
        else
        {
            if(isset($request->industry))
            {
                $query .= " AND industry_id = ".$industry->id;
            }
        }

        //$query = $query == '' ? '' : "$query";




        $sql = "SELECT id FROM seekers $query ORDER BY featured DESC";
        //dd($sql);
        $results = DB::select($sql);

        //dd($sql);
        $arr = [];
        for($i=0;$i<count($results); $i++)
        {
            $arr[] = $results[$i]->id;
        }
        //$results = DB::select($arr);

        $topCandidates = Seeker::whereIn('id',$arr)->where('featured',2)->orderBy('id','DESC')->paginate(10)->appends(request()->query());

        return view('employers.dashboard.top-candidates')
                ->with('topCandidates',$topCandidates)
                ->with('industries',Industry::active())
                ->with('locations',Location::active())
                ->with('location',$request->location )
                ->with('industry',$industry ? $industry : '')
                ->with('query',$request->q)
                ->with('title',$title);
    }

    public function dashboardData(){
        $counter = [];
        $labels = [];

        $weekApplicationsCounter = Auth::user()->employer->weekApplicationsCounter;

        for($i=0; $i<count($weekApplicationsCounter); $i++)
        {
            $counter[] = $weekApplicationsCounter[$i][0];
            $labels[] = $weekApplicationsCounter[$i][1];
        }

        return array($counter,$labels);
    }

    public function dashboardStats(){
        return '<h6>My Statistics</h6>';
        $user = Auth::user();

        return '<h6>My Statistics</h6>
            <a href="/employers/jobs">Jobs Posted: '.count($user->employer->posts)  .'</a><br>
            <a href="/employers/jobs/active">Active Jobs:'. count($user->employer->activePosts) .' </a><br>
            <a href="/employers/jobs/other">Closed Jobs: '. count($user->employer->closedPosts) .'</a><br>
            <a href="/employers/jobs/shortlisting">Shortlisting Jobs:
                '. count(Post::whereIn('company_id',$user->companies->pluck('id'))->where('how_to_apply',null)->orderBy('id','DESC')->get()) .'
            </a><br>
            <p>Applications Received: '. count($user->employer->jobApplications()) .' </p>
            <a href="/profile">Companies: '. count($user->companies) .'</a></a><br>
            <a href="/employers/saved">Saved Profiles: '. count($user->employer->savedProfiles) .'</a><br>
            <a href="/employers/cv-requests">CV Requests: '. count($user->employer->cvRequests->where('status','P')) .' Pending | '. count($user->employer->cvRequests->where('status','C')) .' Accepted </a>';

    }

    public function applications(Request $request, $slug, $endpoint = null){
        $post = Post::where('slug',$slug)->firstOrFail();
        if($post->company->user_id != Auth::user()->id)
            return abort(403);

        switch ($endpoint) {
            case 'shortlisted':
                return view('v2.employers.applications.shortlisted')
                    ->with('pool',$post->shortlisted)
                    ->with('post',$post);
                break;

            case 'selected':
                return view('v2.employers.applications.selected')
                    ->with('pool',$post->selected)
                    ->with('post',$post);
                break;

            case 'rejected':
                $rejects = JobApplication::where('post_id',$post->id)
                    ->distinct('user_id')
                    ->where('status','rejected')
                    ->orderBy('id','DESC')
                    ->paginate(10);
                return view('v2.employers.applications.rejected')
                    ->with('pool',$rejects)
                    ->with('post',$post);
                break;

            case 'unrejected':
                $unrejected = JobApplication::where('post_id',$post->id)
                    ->distinct('user_id')
                    ->where('status','active')
                    ->orderBy('id','DESC')
                    ->paginate(10);
                return view('v2.employers.applications.unrejected')
                    ->with('pool',$unrejected)
                    ->with('post',$post);
                break;

            default:
                $applications = JobApplication::where('post_id',$post->id)->orderBy('created_at','DESC')->get();

                // dd($applications);
                return view('v2.employers.applications.index')
                    ->with('pool',CollectionHelper::paginate($applications,2))
                    ->with('post',$post);
                break;
        }


        $shortlist = isset($request->shortlist) ? true : false;

        if($post->company->user_id == Auth::user()->id)
        {
            return view('v2.employers.applications')
                ->with('shortlist',$shortlist)
                ->with('post',$post);
        }
        return redirect()->back();
    }

    public function invite(Request $request, $slug){
        $post = Post::where('slug',$slug)->firstOrFail();
        return view('employers.dashboard.invite')
                ->with('post',$post);
    }

    public function rsi(Request $request, $slug){
        $post = Post::where('slug',$slug)->firstOrFail();
        $saved = false;
        if(isset($request->saved))
            $saved = true;
        return view('v2.employers.dashboard.rsi')
                    ->with('educationLevels',EducationLevel::all())
                    ->with('companySizes',CompanySize::all())
                    ->with('personalities',Personality::orderBy('name')->get())
                    ->with('skills',Skill::all())
                    ->with('courses',Course::all())
                    ->with('personalityTraits',PersonalityTrait::orderBy('name')->get())
                    ->with('industrySkills',IndustrySkill::where('industry_id',$post->industry_id)->orderBy('name')->get())
                    ->with('weights',RsiWeight::all())
                    ->with('post',$post)
                    ->with('saved',$saved);
        //return $request->all();
    }

    public function saveRsi(Request $request, $slug){
        $post = Post::where('slug',$slug)->firstOrFail();
        //return $request->all();
        if(isset($post->modelSeeker->id))
        {
            $m = $post->modelSeeker;
            $m->education_level_id = $request->education_level_id;
            $m->education_level_importance = $request->education_level_importance;
            $m->personality_test_id = $request->personality_test_id;
            $m->experience_duration = $request->experience_duration;
            $m->experience_level_importance = $request->experience_level_importance;
            $m->iq_test = $request->iq_test == 'on' ? true : false;
            $m->iq_score = $request->iq_score;
            $m->interview = $request->interview == 'on' ? true : false;
            $m->psychometric = $request->psychometric == 'on' ? true : false;
            $m->interview_result_score = $request->interview_result_score;
            $m->psychometric_test_score = $request->psychometric_test_score;
            $m->company_size_id = $request->company_size_id;

            $m->education_importance = $request->education_importance;
            $m->experience_importance = $request->experience_importance;
            $m->interview_importance = $request->interview_importance;
            $m->skills_importance = $request->skills_importance;
            $m->iq_importance = $request->iq_importance;
            $m->psychometric_importance = $request->psychometric_importance;
            $m->personality_importance = $request->personality_importance;
            $m->company_size_importance = $request->company_size_importance;
            $m->feedback_importance = $request->feedback_importance;

            $m->other_skills = '[]';
            $m->other_skills_weight = '[]';

            if(isset($request->other_skill_name))
            {
                $m->other_skills = $request->other_skill_name;
                $m->other_skills_weight = $request->other_skill_weight;
            }

            $m->save();

            if(count($m->modelSeekerSkills) > 0)
            {
                foreach($m->modelSeekerSkills as $s)
                    $s->delete();
            }

            if(count($m->modelSeekerPersonalityTraits) > 0)
            {
                foreach($m->modelSeekerPersonalityTraits as $t)
                    $t->delete();
            }

            if(count($m->modelSeekerCourses) > 0)
            {
                foreach($m->modelSeekerCourses as $s)
                    $s->delete();
            }


        }
        else
        {
            //return $request->all();
            $m = ModelSeeker::create([
                'post_id' => $post->id,
                'education_level_id' => $request->education_level_id,
                'education_level_importance' => $request->education_level_importance,
                'personality_test_id' => $request->personality_test_id,
                'experience_duration' => $request->experience_duration,
                'experience_level_importance' => $request->experience_level_importance,
                'iq_test' => $request->iq_test == 'on' ? true : false,
                'iq_score' => $request->iq_score,
                'interview' => $request->interview == 'on' ? true : false,
                'interview_result_score' => $request->interview_result_score,
                'psychometric' => $request->psychometric == 'on' ? true : false,
                'psychometric_test_score' => $request->psychometric_test_score,
                'company_size_id' => $request->company_size_id

            ]);
        }



        if(isset($request->skill_id) && count($request->skill_id) > 0 )
        {
            $counter = 0;
            foreach ($request->skill_id as $e) {
                ModelSeekerSkill::create([
                    'model_seeker_id' => $m->id,
                    'industrySkill_id' => $e,
                    'weight' => $request->skill_weight[$counter]
                ]);
                $counter ++;
            }
        }

        if(isset($request->trait_id) && count($request->trait_id) > 0 )
        {
            $counter = 0;
            //dd($request->trait_weight);
            foreach ($request->trait_id as $e) {
                ModelSeekerPersonalityTrait::create([
                    'model_seeker_id' => $m->id,
                    'personality_trait_id' => $e,
                    'weight' => (int) $request->trait_weight[$counter]
                ]);
                $counter ++;
            }
        }

        if(isset($request->modelSeekerCourses) && count($request->modelSeekerCourses) > 0 )
        {
            $counter = 0;
            foreach ($request->modelSeekerCourses as $e) {
                ModelSeekerCourse::create([
                    'model_seeker_id' => $m->id,
                    'course_id' => $e
                ]);
                $counter ++;
            }
        }


        return redirect('/employers/applications/'.$post->slug.'/rsi?saved=true');
    }

    public function shortlistSeekerToggle(Request $request, $slug, $username){
        $user = User::where('username',$username)->firstOrFail();
        $post = Post::where('slug',$slug)->firstOrFail();
        if($user->seeker->hasApplied($post))
        {
            $j = JobApplication::where('user_id',$user->id)->where('post_id',$post->id)->firstOrFail();
            if($j->status === 'active' && $j->shortlistToggle())
            {
                return 'shortlisted';
            }
            elseif($j->status === 'shortlisted' && $j->shortlistToggle())
            {
                return 'remove-from-shortlist';
            }
        }
    }


    public function toggleRejectById(Request $request, $slug, $user_id){
        $user = User::findOrFail($user_id);
        $post = Post::where('slug',$slug)->firstOrFail();
        $message = isset($request->message) ? $request->message : '';
        if($user->seeker->hasApplied($post))
        {
            $j = JobApplication::where('user_id',$user->id)->where('post_id',$post->id)->firstOrFail();
            if($j->status == 'rejected')
            {
                // $j->status = 'active';
                // $j->save();
            }
            else
            {
                if($j->status != 'selected')
                {
                    if($j->reject($message))
                    {
                        return 'rejected';
                    }
                }

            }


        }
        return 'error';
        return redirect('/employers/applications/'.$post->slug);
        return view('employers.dashboard.message')
            ->with('title','An Error Occurred')
            ->with('message','An error occurred while processing your request. Please try again later');
    }

    public function viewCover(Request $request, $slug, $applicationId){
        $app = JobApplication::findOrFail($applicationId);
        return view('employers.cover')
                        ->with('application',$app);
    }

    public function candidateRsi(Request $request, $slug, $applicationId){
        $app = JobApplication::findOrFail($applicationId);
        return view('employers.dashboard.seeker-rsi')
                        ->with('application',$app);
    }

    public function closeJob(Request $request, $slug){
        $post = Post::where('slug',$slug)->firstOrFail();
        return view('employers.close-job')
                ->with('post',$post);
    }

    public function saveCandidate(Request $request, $slug){
        $post = Post::where('slug',$slug)->firstOrFail();
        $c = Candidate::create([
            'seeker_id' => $request->seeker_id,
            'post_id' => $post->id,
            'monthly_salary' => $request->monthly_salary
        ]);

        $seeker = Seeker::findOrFail($request->seeker_id);

        $j = JobApplication::where('user_id',$seeker->user->id)
                ->where('post_id',$post->id)
                ->first();

        $j->status = 'selected';
        $j->save();

        $caption = "Candidate Selected ".$post->title;
        $contents = "You have selected ".$c->seeker->user->name." for the position of ".$post->title." with a monthly salary of ".$post->location->country->currency.$c->monthly_salary.". <br>
        <b>Candidate Details</b> <br>
        Name: ".$c->seeker->user->name." <br>
        Email: ".$c->seeker->user->email." <br>
        Phone: ".$c->seeker->phone_number." <br>.
        <br>
        Thank you for choosing Emploi.
        <br><br>

        <a href='".url('/vacancies/create')."'>Advertise Vacancy</a>
        ";

        EmailJob::dispatch($post->company->user->name, $post->company->user->email, $c->seeker->public_name." for ".$post->title, $caption, $contents);

        $caption = "Application for the ".$post->title." position was successful";
        $contents = "You have been selected for <b>".$post->title."</b> position at <b>".$post->company->name."</b>. You have been offered a <b>monthly salary of ".$post->location->country->currency.$c->monthly_salary."</b>. <br>
        <b>Employer Details</b> <br>
        Name: ".$post->company->user->name." <br>
        Email: ".$post->company->user->email." <br>
        <br>
        One of <a href='".url('/companies/'.$post->company->id)."'>".$post->company->name."</a>'s representative will get in touch with you for additional details on this position.
        <br>
        Thank you for choosing Emploi.
        <br>
        ";
        EmailJob::dispatch($c->seeker->user->name, $c->seeker->user->email, "Application for ".$post->title." Successful", $caption, $contents);

        $caption = "The position ".$post->title." has been closed, ".$c->seeker->user->name." selected";
        $contents = $c->seeker->user->name." has been selected by <a href='".url('/companies/'.$post->company->id)."'> for the <b>".$post->title."</b> position, and has been offered a  <b>monthly salary of ".$post->location->country->currency.$c->monthly_salary."</b>. <br>
        <b>Employer Details</b> <br>
        Name: ".$post->company->user->name." <br>
        Email: ".$post->company->user->email." <br>
        <br>
        <b>Job Seeker Details</b> <br>
        Name: ".$c->seeker->user->name." <br>
        Email: ".$c->seeker->user->email." <br>
        Phone: ".$c->seeker->phone_number." <br>.
        <br>
        ";
        EmailJob::dispatch('Emploi Admin', 'jobapplication389@gmail.com', "Candidate Selected for ".$post->title." Successful", $caption, $contents);
        if($post->positions == count($post->candidates))
        {
            $post->status = 'closed';
            $post->save();
        }
        return redirect('/employers/applications/'.$post->slug.'/close');
        return $request->all();
    }

    public function inputInterview(Request $request, $slug, $applicationId){
        $post = Post::where('slug',$slug)->firstOrFail();
        $app = JobApplication::findOrFail($applicationId);
        return view('employers.rsi.interview')
                ->with('application',$app);
    }

    public function saveInterview(Request $request, $slug, $applicationId){
        $app = JobApplication::findOrFail($applicationId);
        $post = Post::where('slug',$slug)->firstOrFail();
        if(count($app->interviewResults) > 0)
        {
            foreach($app->interviewResults as $i)
                $i->delete();
        }
        if(isset($request->score))
        {
            for($i=0; $i<count($request->score); $i++)
            {
                InterviewResult::create([
                    'job_application_id' => $app->id,
                    'score' => $request->score[$i]
                ]);
            }
        }
        return redirect('/employers/applications/'.$post->slug.'/'.$app->id.'/rsi');
    }

    public function inputIq(Request $request, $slug, $applicationId){
        $post = Post::where('slug',$slug)->firstOrFail();
        $app = JobApplication::findOrFail($applicationId);
        return view('employers.rsi.iq')
                ->with('application',$app);
    }

    public function saveIq(Request $request, $slug, $applicationId){
        $app = JobApplication::findOrFail($applicationId);
        $post = Post::where('slug',$slug)->firstOrFail();
        if(count($app->iqTests) > 0)
        {
            foreach($app->iqTests as $i)
                $i->delete();
        }
        if(isset($request->score))
        {
            for($i=0; $i<count($request->score); $i++)
            {
                IqTest::create([
                    'job_application_id' => $app->id,
                    'score' => $request->score[$i]
                ]);
            }
        }
        return redirect('/employers/applications/'.$post->slug.'/'.$app->id.'/rsi');
    }

    public function inputPsy(Request $request, $slug, $applicationId){
        $post = Post::where('slug',$slug)->firstOrFail();
        $app = JobApplication::findOrFail($applicationId);
        return view('employers.rsi.psychometric')
                ->with('application',$app);
    }

    public function savePsy(Request $request, $slug, $applicationId){
        $app = JobApplication::findOrFail($applicationId);
        $post = Post::where('slug',$slug)->firstOrFail();
        if(count($app->psychometricTests) > 0)
        {
            foreach($app->psychometricTests as $i)
                $i->delete();
        }
        if(isset($request->score))
        {
            for($i=0; $i<count($request->score); $i++)
            {
                PsychometricTest::create([
                    'job_application_id' => $app->id,
                    'score' => $request->score[$i]
                ]);
            }
        }
        return redirect('/employers/applications/'.$post->slug.'/'.$app->id.'/rsi');
    }

    public function inputPers(Request $request, $slug, $applicationId){
        $post = Post::where('slug',$slug)->firstOrFail();
        $app = JobApplication::findOrFail($applicationId);
        return view('employers.rsi.personality')
                ->with('personalities',Personality::all())
                ->with('application',$app);
    }

    public function savePers(Request $request, $slug, $applicationId){
        $post = Post::where('slug',$slug)->firstOrFail();
        $app = JobApplication::findOrFail($applicationId);
        if(isset($app->seekerPersonality->id))
        {
            $app->seekerPersonality->personality_id = $request->personality;
            $app->seekerPersonality->save();
        }
        else
        {
            SeekerPersonality::create([
                'personality_id' => $request->personality,
                'job_application_id' => $app->id
            ]);
        }
        return redirect('/employers/applications/'.$post->slug.'/'.$app->id.'/rsi');
        return $request->all();
    }

    public function referees(Request $request, $slug, $applicationId){
        $app = JobApplication::findOrFail($applicationId);
        if(isset($request->toggle))
        {

            $app->toggleUseReferee($request->toggle);
        }

        return view('employers.rsi.referees')
                    ->with('app',$app);
        return $request->all();
    }

    public function addReferee(Request $request, $slug, $applicationId){
        $app = JobApplication::findOrFail($applicationId);
        return view('employers.rsi.addReferee')
                    ->with('app',$app);
    }

    public function requestReferee(Request $request, $slug, $applicationId){
        //send e-mail instructions
        $app = JobApplication::findOrFail($applicationId);
        $user =  $app->user;
        $caption = $app->post->company->name." is interested in getting feedback from your referees";
        $contents = "Your application has been moved up and ". $app->post->company->name." is requesting for your referees in order to make a hiring decision.<br>
        <br>

        Kindly but urgently provide your referee details by following the link below <br>
        <a href='".url('/profile/add-referee')."'>".url('/profile/add-referee')."</a> <br>

        Thank you for your commitment, we wish you the best.
                ";
        EmailJob::dispatch($user->name, $user->email, 'Request for Referees', $caption, $contents);


        return view('employers.rsi.refereeRequested')
                    ->with('app',$app);
    }

    public function toggleReferees(Request $request, $slug, $applicationId){
        $app = JobApplication::findOrFail($applicationId);
        if(isset($request->referee_id))
        {

            $app->toggleUseReferee($request->referee_id);
        }

        return redirect('/employers/applications/'.$app->post->slug.'/'.$app->id.'/rsi/referees');
    }

    public function cosizes(Request $request, $slug, $applicationId){
        $post = Post::where('slug',$slug)->firstOrFail();
        $app = JobApplication::findOrFail($applicationId);
        //return $app;
        return view('employers.rsi.cosizes')
                ->with('personalities',Personality::all())
                ->with('sizes',CompanySize::all())
                ->with('application',$app);
    }

    public function saveCosizes(Request $request, $slug, $applicationId){
        $post = Post::where('slug',$slug)->firstOrFail();
        $app = JobApplication::findOrFail($applicationId);
        if(count($app->seekerPreviousCompanySizes) > 0)
        {
            foreach($app->seekerPreviousCompanySizes as $c)
                $c->delete();
        }
        $i = 0;
        foreach($request->company_name as $cname)
        {
            SeekerPreviousCompanySize::create([
                'job_application_id' => $app->id,
                'name' => $cname,
                'company_size_id' => $request->company_size[$i]
            ]);
            $i++;
        }
        //return $app;
        //return $request->all();
        return redirect('/employers/applications/'.$app->post->slug.'/'.$app->id.'/rsi/company-sizes');
        return view('employers.rsi.cosizes')
                ->with('personalities',Personality::all())
                ->with('application',$app);
    }
    
    // invite shortlisted candidate for an interview
    public function interviewCandidate(Request $request, $slug){
        return $request->all();
    }

    public function cvRequest(Request $request, $username){


        $user = User::where('username',$username)->firstOrFail();
        if($user->role != 'seeker')
            abort(403);
        $employer = Auth::user()->employer;
        //$admin = Auth::user();
        if($employer->user->email == 'jobs@emploi.co')
        {
            CvRequest::create([
                'employer_id' => $employer->id,
                'seeker_id' => $user->seeker->id,
                'status' => 'accepted'
            ]);
        }
        else
        {
            $r = CvRequest::requestCV($employer,$user->seeker);
        }


        //try accept cv
        return redirect()->back();

    }


    public function epaas()
    {
        return view('employers.epaas');
    }

    public function getPaas(Request $request)
    {   
         $request->validate([
            'firstname'   =>  ['required','max:50','string'],
            'lastname'    =>  ['required','max:50','string'],
            'email'       =>  ['required','string', 'email', 'max:50'],
            'phone_number'=> ['required', 'string', 'max:15'],
            'company'     =>  ['required','max:100','string'],
        ]);
        
        $user = User::where('email',$request->email)->first();
        $created = false;

        if(isset($user->id) && $user->userpermission->permission_id == 4){
           return \Redirect::route('golden')->with('industries',Industry::orderBy('name')->get())->with('fail','We noted you are registered as a Jobseeker. Kindly join Golden club for jobseekers');
        }
        if(isset($user->id) && $user->userpermission->permission_id == 2){
            die("This Product is only for Employers and Jobseekers");
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

            if(!isset($user->id))
            {
                abort(500);
            }


        // $r = Referral::where('email',$request->email)->first();

        // if(!isset($r->id) && Session::has('invite_id'))
        // {
        //     $invite_id = Session::get('invite_id');
        //     $link = InviteLink::find($invite_id);
        //     if(isset($link->id))
        //     {
        //         Referral::create([
        //             'user_id' => $link->user_id,
        //             'name' => $user->name,
        //             'email' => $user->email
        //         ]);
        //     }

        // }

           
        $emp = Employer::create([
            'user_id' => $user->id,
            'name' => $request->firstname. ' ' .$request->lastname,
            'industry_id' => 32,
            'company_name' => $request->company,
            'contact_phone' =>$request->phone_number,
            'company_phone' => $request->phone_number,
            'company_email' => $user->email,
            'country_id' => 1,
            'address' =>0        
        ]);



        //return $emp;

        $perm = UserPermission::create([
            'user_id' => $user->id,
            'permission_id' => 3
        ]);
        
        $caption = "Thank you for registering your profile on Emploi as an Employer";
        $contents = "Here are your login credentials for Emploi: <br>
            username: $username <br>
            Password: $password <br>
            <br><br>

        Verify your account <a href='".url('/verify-account/'.$user->email_verification)."'>here</a> and finish setting up your account. Thank you for choosing Emploi.
                ";
        EmailJob::dispatch($user->name, $user->email, 'Verify Emploi Account', $caption, $contents);

        if (app()->environment() === 'production')
        Notification::send(Employer::first(),new EmployerRegistered('NEW EMPLOYER: '.$emp->user->name.' registered an employer profile'));

        $caption = "A new employer has registered on Emploi";
        $contents = $emp->user->name." has created an employer profile on Emploi.<br>
        Log in to <a href='/admin/panel'>Admin panel</a> to manage employers.";
        EmailJob::dispatch('Emploi Team', 'jobapplication389@gmail.com', 'Company '.$emp->company_name.' Created', $caption, $contents);



        }
        // if($user->role != 'seeker')

         $e = EmployerSubscription::where('email',$request->email)->first();
         //check if joined eclub before
         if(isset($e))
         {
                $js = EmployerSubscription::create([
                'user_id' => $user->id,
                'name' => $request->firstname. ' ' .$request->lastname,
                'phone_number' => $request->phone_number,
                'email' => $user->email
            ]);

            if(isset($js->id)){
                  if (app()->environment() === 'production'){
                    Notification::send(EmployerSubscription::first(),new PaasSubscribed('E-CLUB SUBSCRIPTION: '.$js->name.' with contact details  '.$js->email.' and  '.$js->phone_number.'  has submitted subscription for E-Club Membership.'));
                }         
            return redirect('/checkout?product=e_club');  
            }         
         }
         else

        {   // free one month eclub for first time users
            $es = EmployerSubscription::create([
                'user_id' => $user->id,
                'name' => $request->firstname. ' ' .$request->lastname,
                'phone_number' => $request->phone_number,
                'email' => $user->email
            ]);

            if(isset($es->id)){
                  if (app()->environment() === 'production')
                    Notification::send(EmployerSubscription::first(),new PaasSubscribed('E-CLUB SUBSCRIPTION: '.$es->name.' with contact details  '.$es->email.' and  '.$es->phone_number.'  has submitted subscription for E-Club Membership.'));
    
            $user->employer->activateFreeEclub();

        }
            //     if (Auth::guest()) {
            //    return \Redirect::to("/login?redirectToUrl=/checkout?product=e_club");
            // }

            // return redirect('/checkout?product=e_club');
         if (Auth::guest())
            {
             return redirect('/employers/request-paas');
         }
         return \Redirect::to("/login?redirectToUrl=/employers/request-paas");
       }
    }

    public function rpaas() {
        return view('employers.request')
         ->with('industries',Industry::orderBy('name')->get());
    }

    public function eclub(){
        return view('employers.eclub');
    }

    public function getProfessional(Request $request)
    {   
         $request->validate([
            'firstname'   =>  ['required','max:50','string'],
            'lastname'    =>  ['required','max:50','string'],
            'email'       =>  ['required','string', 'email', 'max:50'],
            'phone_number'=>  ['required', 'string', 'max:15'],
            'company'     =>  ['max:100','string'],
            'task_title'  =>  ['max:100','string'],
        ]);


        $user = User::where('email',$request->email)->first();
        $created = false;

        if(isset($user->id) && $user->userpermission->permission_id == 4){
           return Redirect::back()->with('msg', 'You need to have an employer account to use this service. <a href="'. url('/employers/register') . '">Register</a> as an employer or   <a href="'. url('/login') . '">Login here</a>.');
        }
        if(isset($user->id) && $user->userpermission->permission_id == 2){
            die("This Product is only for Employers and Jobseekers");
        }
                if(!isset($user->id))
        {
            $username = explode(" ", $request->name);
            $username = strtolower(implode("", $username).rand(1000,30000));
            $username = explode(".", $username);
            $username = implode('',$username);

            $password = User::generateRandomString(10);
            $created = true;

            $user = User::create([
                'name' => $request->firstname. ' ' .$request->lastname,
                'email' => $request->email,
                'username' => $username,
                'email_verification' => User::generateRandomString(10),
                'password' => Hash::make($password),
            ]);

        // $r = Referral::where('email',$request->email)->first();

        // if(!isset($r->id) && Session::has('invite_id'))
        // {
        //     $invite_id = Session::get('invite_id');
        //     $link = InviteLink::find($invite_id);
        //     if(isset($link->id))
        //     {
        //         Referral::create([
        //             'user_id' => $link->user_id,
        //             'name' => $user->name,
        //             'email' => $user->email
        //         ]);
        //     }

        // }


        
        $emp = Employer::create([
            'user_id' => $user->id,
            'name' => $request->firstname. ' ' .$request->lastname,
            'industry_id' => 32,
            'company_name' => $request->company,
            'contact_phone' =>$request->phone_number,
            'company_phone' => $request->phone_number,
            'company_email' => $user->email,
            'country_id' => 1,
            'address' =>0        
        ]);


        $perm = UserPermission::create([
            'user_id' => $user->id,
            'permission_id' => 3
        ]);

        $caption = "Thank you for registering your profile on Emploi as an Employer";
        $contents = "Here are your login credentials for Emploi: <br>
            username: $username <br>
            Password: $password <br>
            <br><br>

        Verify your account <a href='".url('/verify-account/'.$user->email_verification)."'>here</a> and finish setting up your account. Thank you for choosing Emploi.
                ";
        EmailJob::dispatch($user->name, $user->email, 'Verify Emploi Account', $caption, $contents);

        

        if (app()->environment() === 'production')
        Notification::send(Employer::first(),new EmployerRegistered('NEW EMPLOYER: '.$emp->user->name.' registered an employer profile'));

        $caption = "A new employer has registered on Emploi";
        $contents = $emp->user->name." has created an employer profile on Emploi.<br>
        Log in to <a href='/admin/panel'>Admin panel</a> to manage employers.";
        EmailJob::dispatch('Emploi Team', 'jobapplication389@gmail.com', 'Company '.$emp->company_name.' Created', $caption, $contents);

        }
             $task = Task::create([
                'slug' => Task::generateUniqueSlug(11),
                'employer_id' => $user->employer->id,
                'name' => $request->firstname. ' ' .$request->lastname,               
                'email' => $request->email,
                'phone_number' => $request->phone_number,
                'company' => $request->company,
                'title' => $request->task_title,
                'positions' => $request->positions,
                'description' => $request->task_description,
                'industry' => $request->industry,
                'salary' => $request->salary,
                'status' => isset(Auth::user()->id) && Auth::user()->role == 'employer' && $user->employer->isOnPaas() ? 'active' :  'pending'
                ]);

            if(isset($task->id))
            {
                if (app()->environment() === 'production')
                Notification::send(EmployerSubscription::first(),new PaasSubscribed('PAAS TASK SUBMITTED: '.$task->name.' with contact details  '.$task->email.' and  '.$task->phone_number.'  has submitted a task.'));
            }

             return redirect('/employers/task/'.$task->slug);
    }
    
    public function task($slug)
    {
        return view('employers.task')
                ->with('task',Task::where('slug',$slug)->firstOrFail());
    }

    public function getInvoice(Request $request)
    {   
            $user= Auth::user();
            $invoice = Invoice::create([
            'slug' => Invoice::generateUniqueSlug(11),
            'first_name' => $request->firstname,
            'last_name' => $request->lastname,
            'phone_number' => isset($request->phone_number) ? $request->phone_number : null,
            'email' => $request->email,
            'description' => 'Payment for Part Timer ',
            'sub_total' => isset(Auth::user()->id) && Auth::user()->role == 'employer' && $user->employer->isOnPaas() ? 0 * $request->salary : $request->salary + 0.135 * $request->salary
        ]);

             if(isset($invoice->id))
            {
                $message = 'Invoice '.$invoice->slug.' totalling to  Ksh '.$invoice->sub_total.' created on Emploi. Customer: '.$invoice->first_name.', email: '.$invoice->email;
                $invoice->remind('email');
            }

            if(isset($invoice->id))
            {
                if (app()->environment() === 'production')
                $invoice->notify(new InvoiceCreated($message));

            }
    
          return \Redirect::route('invoice', [$invoice->slug])->with('message', 'Complete the payment for your task to be processed.');
    }


    public function leaveContact(Request $request)
    { 
        // return $request->all();
        if (isset($request->phone))
        {   
            if (app()->environment() === 'production')
            Notification::send(EmployerSubscription::first(),new PaasSubscribed($request->phone.' is interested on PaaS for EMPLOYERS'));
        }
        
        return Redirect::back()->with('success','Contact Received, We will get back to you shortly !');
    }

    
    public function hire($id)
    {        
        $candidate = PartTimer::find($id);
        $candidate->update(['status' =>'selected']);
        $candidate->save();
        
        $employer = Auth::user();
        
        if(app()->environment() === 'production')       
        {   
           Notification::send(EmployerSubscription::first(),new PaasSubscribed($candidate->user->name.' has been selected by employer '.$employer->name.' for PaaS Task '));
        }

        return redirect()->back()->with('hired','Hired Successfully!');
    }
        
    
}
    
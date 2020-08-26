<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use Carbon\Carbon;
use OneSignal;

use App\Advert;
use App\Blog;
use App\Company;
use App\Contact;
use App\CvEditor;
use App\CvEditRequest;
use App\CvRequest;
use App\Employer;
use App\Faq;
use App\Industry;
use App\InviteLink;
use App\JobApplication;
use App\Country;
use App\Location;
use App\ModelSeeker;
use App\Post;
use App\Referee;
use App\Referral;
use App\CvReferral;
use App\Seeker;
use App\UnregisteredUser;
use App\User;
use App\ProductOrder;
use App\Task;
use App\SeekerSubscription;
use App\ExclusivePlacement;
use App\Coaching;
use App\Jobs\VacancyEmail;

use App\Jobs\EmailJob;
use Mail;
use App\Mail\CustomVacancyEmail;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }
    
    public function referees(Request $request)
    {
              
        $referees = Referee::orderBy('created_at','DESC')->paginate(12);
        return view('admins.referees')
                    ->with('referees',$referees);
                   
    }

    public function referrals(Request $request){
        return view('admins.referrals.index')
            ->with('referrals',Referral::orderBy('status')->orderBy('id','DESC')->paginate(50));
    }

    public function inviteLinks(Request $request){
        return view('admins.inviteLinks.index')
            ->with('inviteLinks',InviteLink::orderBy('clicks_count','DESC')->paginate(30));
    }


    public function cvReferrals(Request $request){
        return view('admins.referrals.cvindex')
            ->with('cvreferrals',CvReferral::orderBy('status')->orderBy('id','DESC')->paginate(50));
    }

       
    public function viewReport(Request $request, $slug)
    {
       $referee=Referee::where('slug',$slug)->firstOrFail();
        return view('referees.report')->with('referee',$referee);
    }
   
    public function adminFaqs()
    {
        return view('employers.faqs')
                ->with('faqs',Faq::where('permission_id',2)->paginate(10));
    }

    public function loginWithUsername($username, Request $request){
        $user = User::where('username',$username)->firstOrFail();
        if($user->role == 'admin' || $user->role == 'super-admin')
            abort(403);
        $request->session()->put('last-admin-id', Auth::user()->id);
        Auth::loginUsingId($user->id, true);
        return redirect('/employers/jobs');
    }

    public function loginas(Request $request){
        $user = User::findOrFail($request->user_id);
        if($user->role == 'admin' || $user->role == 'super-admin')
            abort(403);
        $request->session()->put('last-admin-id', Auth::user()->id);
        Auth::loginUsingId($request->user_id, true);
        return redirect('/home');
    }

    public function panel($panel = false, Request $request){
        return view('admins.index')
                ->with('admin',Auth::user());
    }

    public function posts(Request $request){
        $query = isset($request->q) ? $request->q : "";
        //dd($request->q);
        $posts = Post::where('title','like',"%".$query."%")
                    ->orderBy('created_at','DESC')
                    ->paginate(5);
        return view('admins.posts.index')
                ->with('posts',$posts)
                ->with('admin',Auth::user());
    }

    public function viewPost($slug){
        $post = Post::where('slug',$slug)
                    ->firstOrFail();

        return view('seekers.vacancy')
                ->with('post',$post);
    }

    public function blog(Request $request){
        if(isset($request->q))
        {
            $blogs = Blog::where('title','like','%'.$request->q.'%')
                    ->orderBy('id','DESC')
                    ->paginate(10);
        }
        else
        {
            $blogs = Blog::orderBy('id','desc')->paginate(10);
        }
        return view('admins.blog.index')
                ->with('blogs',$blogs);
    }

    public function updatePost($slug, Request $request)
    {
        $post = Post::where('slug',$slug)->first();
        if(!isset($post->id))
            abort(404);

        if($post->company->user->employer->canPostJob())
        {
            if($post->status == 'inactive' && $request->status == 'active')
            {
                $approval = $post->company->user->employer->hasPostedAJob($post);
                if(!$approval)
                    die("Job Post Approval Failed. Employer hasn't purchased a package! <a href='/admin/posts'>Job Posts</a>");
            }

            $post->status = $request->status;
            $post->featured = $request->featured;
            $post->easy_apply = $request->easyapply;
            $post->save();

            if($request->notification == 'true')
            {
                OneSignal::sendNotificationToAll(
                    $post->title, 
                    $url = url('/vacancies/'.$post->slug)
                );
            }

        }
        
        
        return redirect()->back(); 
        return $request->all();
    }

    public function seekers($username=null, Request $request)
    {
        if($username)
        {
            $user = User::where('username',$username)->firstOrFail();
            
            if($user->role == 'seeker')
            {
                if(!$request->session()->has('viewed-seeker-'.$user->seeker->id))
                {
                    $request->session()->put('viewed-seeker-'.$user->seeker->id, now());
                    $user->seeker->isBeingViewedBy(Auth::user());
                }

                return view('admins.seekers.seeker')
                    ->with('seeker',$user->seeker);
                
            }
            else
                return redirect('employers/'.$user->username);

            
        }
        if(isset($request->search))
        {
            $first = true;
            $location ="";
            if(isset($request->location))
            {
                if($first)
                {
                    $location = " location_id=".$request->location;
                    $first = false;
                }
                else
                {
                    $location = "AND location_id=".$request->location;

                }
                
            }
            $industry ="";
            if(isset($request->industry))
            {
                if($first)
                {
                    $industry = "industry_id=".$request->industry;
                    $first = false;
                }
                else
                {
                    $industry = "AND industry_id=".$request->industry;
                }
                
            }
            $gender ="";
            if(isset($request->gender))
            {
                if($first)
                {
                    $gender = "gender='".$request->gender."'";
                    $first = false;
                }
                else
                {
                    $gender = "AND gender='".$request->gender."'";
                }
                
            }

            $phone_number ="";
            if(isset($request->phone_number))
            {
                if($first)
                {
                    $phone_number = "phone_number LIKE '%".$request->phone_number."%'";
                    $first = false;
                }
                else
                {
                    $phone_number = "AND phone_number LIKE '%".$request->phone_number."%'";
                }
                
            }

            $keywords ="";
            if(isset($request->keywords))
            {
                if($first)
                {
                    $keywords = "education LIKE '%".$request->keywords."%' OR experience LIKE '%".$request->keywords."%' OR resume_contents LIKE '%".$request->keywords."%'";
                    $first = false;
                }
                else
                {
                    $keywords = "AND ( education LIKE '%".$request->keywords."%' OR experience LIKE '%".$request->keywords."%' OR resume_contents LIKE '%".$request->keywords."%')";
                }
                
            }

            $experience ="";
            if(isset($request->experience))
            {
                if($first)
                {
                    $experience = "years_experience>=".$request->experience;
                    $first = false;
                }
                else
                {
                    $experience = "AND years_experience>=".$request->experience;
                }
                
            }

            $featured ="";
            if(isset($request->featured) && $request->featured != 'all')
            {
                $f = $request->featured == 'yes' ? true : false;
                if($first)
                {
                    if($f)
                        $featured = "featured > 0";
                    else
                        $featured = "featured <= 0";
                    $first = false;
                }
                else
                {
                    if($f)
                        $featured = "AND featured > 0";
                    else
                        $featured = "AND featured <= 0";
                }
                
            }

            if(!$first)
                $where = " WHERE ";
            else
                $where = "";
            $sql = "SELECT * FROM seekers $where $location $industry $gender $phone_number $keywords $experience $featured ORDER BY id DESC";
            $results = DB::select($sql);
            $seekers = [];



            $newseekers = [];
            for($i=0; $i<count($results); $i++)
            {
                //$s = Seeker::find($results[$i]->id);
                array_push($newseekers,$results[$i]->user_id);
            }

            $seekers = Seeker::whereIn('user_id',$newseekers)
                    ->orderBy('id','DESC')
                    ->paginate(20)
                    ->appends(request()->query());

            return view('admins.seekers.index')
                    ->with('industries',Industry::orderBy('name')->get())
                    ->with('locations',Location::orderBy('name')->get())
                    ->with('search',true)
                    ->with('location',$request->location)
                    ->with('industry',$request->industry)
                    ->with('featured',$request->featured)
                    ->with('gender',$request->gender)
                    ->with('phone_number',$request->phone_number)
                    ->with('keywords',$request->keywords)
                    ->with('experience',$request->experience)
                    ->with('seekers',$seekers);
        }
        return view('admins.seekers.index')
                    ->with('industries',Industry::orderBy('name')->get())
                    ->with('locations',Location::orderBy('name')->get())
                    ->with('seekers',Seeker::orderBy('featured','DESC')->orderBy('id','DESC')->paginate(30));
        //show all seekers
    }
    

      public function PaasSeekers($username=null, Request $request)
    {
        // if($username)
        // {
        //     $seeker = SeekerSubscription::where('status','active')->firstOrFail();
            
            
        //         if(!$request->session()->has('viewed-seeker-'.$user->seeker->id))
        //         {
        //             $request->session()->put('viewed-seeker-'.$user->seeker->id, now());
        //             $user->seeker->isBeingViewedBy(Auth::user());
        //         }
                $seekers = SeekerSubscription::where('status','active')->paginate(15);

                return view('admins.paas.seekers')
                    ->with('seekers',$seekers);

            
        
       
    }    


    public function cvRequests(Request $request, $id=false){
        if($id == false)
        {
            return view('admins.employers.cvrequests')
                ->with('cvRequests',CvRequest::orderBy('id','DESC')->paginate(30));
        }
        else
        {
            $r = CvRequest::findOrFail($id);
            if(!isset($request->status))
                return redirect('/admin/cv-requests');
            $r->status = $request->status;
            $r->updated_at = now();
            $r->save();
            return redirect()->back();
        }
        
    }

    public function employers(Request $request){
        
        if(isset($request->q))
        {
            $employers = Employer::where('name','like','%'.$request->q.'%')
                    ->where('name','not like','%sex%')->where('name','not like','%fuck%')->where('name','not like','%http%')->where('name','not like','%adult%')->where('name','not like','%crypto%')->where('name','not like','%free%')->where('name','not like','%$%')->where('name','not like','%dating%')
                    ->orderBy('created_at','DESC')
                    ->paginate(20);
        }
        else
        {
            $employers = Employer::where('name','not like','%sex%')->where('name','not like','%fuck%')->where('name','not like','%http%')->where('name','not like','%adult%')->where('name','not like','%crypto%')->where('name','not like','%free%')->where('name','not like','%$%')->where('name','not like','%dating%')->orderBy('created_at','DESC')->paginate(20);
        }
        return view('admins.employers.index')
                ->with('employers',$employers);
    }

    public function companies(Request $request){
        
        if(isset($request->q))
        {
            $companies = Company::where('name','like','%'.$request->q.'%')
                    ->where('name','not like','%sex%')->where('name','not like','%fuck%')->where('name','not like','%http%')->where('name','not like','%adult%')->where('name','not like','%crypto%')->where('name','not like','%free%')->where('name','not like','%$%')->where('name','not like','%dating%')
                    ->orderBy('created_at','desc')
                    ->paginate(20);
        }
        else
        {
            $companies = Company::where('name','not like','%sex%')->where('name','not like','%fuck%')->where('name','not like','%http%')->where('name','not like','%adult%')->where('name','not like','%crypto%')->where('name','not like','%free%')->where('name','not like','%$%')->where('name','not like','%dating%')->orderBy('created_at','desc')->paginate(20);
        }
        return view('admins.companies.index')
                ->with('companies',$companies);
    }

    public function emails(){
        return view('admins.emails.compose')
                ->with('industries',Industry::orderBy('name')->get());
    }


    public function vacancyEmails(Request $request){
        

        //return $posts;

        $message = Post::composeVacancyEmail();

        // $subject = 'Sample subject';
        // $caption = 'THis sid sTHis sid sTHis sid s';
        // $contents = $message;

        // $attachment1 = false;
        // $attachment2 = false;
        // $attachment3 = false;

        // $banner = '/images/email-banner.jpg';

        // $template = 'custom';


        // return new CustomVacancyEmail(
        //     'Recepient Name',
        //     $subject,
        //     $caption,
        //     $contents,
        //     'recepient@gmail.com',
        //     $banner,
        //     $template,
        //     $attachment1,
        //     $attachment2,
        //     $attachment3,
        //     'info@emploi.co'
        // );

        return view('admins.emails.compose')
                ->with('message',$message)
                ->with('industries',Industry::orderBy('name')->get());

        //latest blogs
        //featured jobs
        //industry jobs
        //promotions
    }



    public function contacts(){
        return view('admins.contacts.index')
                ->with('contacts',Contact::orderBy('id','DESC')->paginate(20));
    }

    public function saveResolution(Request $request){
        $c = Contact::findOrFail($request->contact_id);
        $c->resolved_by = Auth::user()->id;
        $c->resolved_on = now();
        $c->resolve_notes = $request->resolve_notes;
        $c->save();
        
        $caption = "Contact Resolved";
        $contents = "The message you sent to Emploi Team via the website has been received and processed by ".$c->resolver->name.". Your Tracking code is <strong>".$c->code."</strong><br><br>
        Resolution Message: <br>
        <i>".$c->resolve_notes."</i> <br>
        Contact us directly by calling us: <a href='tel:+254702068282'>+254 702 068 282</a> or by sending us an e-mail to <a href='mailto:info@emploi.co'>info@emploi.co</a><br>
        Thank you for choosing Emploi.";
        EmailJob::dispatch($c->name, $c->email, 'Contact Resolved', $caption, $contents);

        return redirect()->back();
    }

    public function previewEmail(Request $request){
        $contents=$request->contents;
        $subject=$request->subject;
        $caption = $request->caption;
        $url = $request->featured_url;
        $banner = '/images/email-banner.jpg';
        $template = isset($request->template) ? $request->template : 'custom';

        $attachment1 = false;
        $attachment2 = false;
        $attachment3 = false;

        return new CustomVacancyEmail(
            'Recipient Name',
            $subject,
            $caption,
            $contents,
            'recipient@gmail.com',
            $banner,
            $template,
            $attachment1,
            $attachment2,
            $attachment3,
            'info@emploi.co',
            $url
        );


    }

    public function sendEmails(Request $request){
        $contents=$request->contents;
        $subject=$request->subject;
        $industry = $request->category;
        $caption = $request->caption;
        $url = $request->featured_url;
        $banner = '/images/email-banner.jpg';

        $template = $request->template;
        $template = isset($request->template) ? $request->template : 'custom';

        if ($request->hasFile('featured_image')) {
            $image = $request->file('featured_image');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/images/e-mail');
            $image->move($destinationPath, $name);
            //$this->save();
            $banner = "/images/e-mail/".$name;
        }

        $attachment1 = false;
        $attachment2 = false;
        $attachment3 = false;

        if ($request->hasFile('attachment1')) {
            $file = $request->file('attachment1');
            $pre_name = explode(" ",$file->getClientOriginalName());
            $pre_name = implode("-", $pre_name );
            $name = $pre_name.time().'.'.$file->getClientOriginalExtension();
            $destinationPath = public_path('/attachments');
            $file->move($destinationPath, $name);
            //$this->save();
            $attachment1 = public_path() . "/attachments/".$name;
        }

        if ($request->hasFile('attachment2')) {
            $file = $request->file('attachment2');
            $pre_name = explode(" ",$file->getClientOriginalName());
            $pre_name = implode("-", $pre_name );
            $name = $pre_name.time().'.'.$file->getClientOriginalExtension();
            $destinationPath = public_path('/attachments');
            $file->move($destinationPath, $name);
            //$this->save();
            $attachment2 = public_path() . "/attachments/".$name;
        }

        if ($request->hasFile('attachment3')) {
            $file = $request->file('attachment3');
            $pre_name = explode(" ",$file->getClientOriginalName());
            $pre_name = implode("-", $pre_name );
            $name = $pre_name.time().'.'.$file->getClientOriginalExtension();
            $destinationPath = public_path('/attachments');
            $file->move($destinationPath, $name);
            //$this->save();
            $attachment3 = public_path() . "/attachments/".$name;
        }

        switch($request->target){
            
            case 'jobseekers':
                $filter = '';
                if($industry == 'all')
                {
                    $filter = "";
                }
                elseif($industry == 'incomplete')
                {
                    $filter = " WHERE LENGTH(education) < 10 OR LENGTH(experience) < 10 OR resume IS NULL";
                }
                elseif($industry == 'incomplete-edu')
                {
                    $filter = " WHERE LENGTH(education) < 10";
                }
                elseif($industry == 'incomplete-exp')
                {
                    $filter = " WHERE LENGTH(experience) < 10";
                }
                elseif($industry == 'corrupt')
                {
                    $filter = " WHERE resume not like \"%.%\"";
                }
                elseif($industry == 'test-users')
                {
                    $filter = " WHERE email = 'brian@jobsikaz.com' OR email = 'sophy@jobsikaz.com' ";
                }
                else
                {
                    $filter = " WHERE industry = $industry";
                }
                $sql = "SELECT user_id FROM seekers $filter";

                //die($sql);
                
                $result = DB::select($sql);
                
                foreach($result as $seeker)
                {
                    $user = User::find($seeker->user_id);
                    if(!isset($user->id))
                        continue;
                    if(User::subscriptionStatus($user->email))
                    {
                        VacancyEmail::dispatch($user->email,$user->name, $subject, $caption, $contents,$banner,$template,$attachment1, $attachment2, $attachment3,'Emploi_Weekly_Digest@emploi.co',$url);
                    }
                }
                break;
                
            case 'employers':
                $filter = '';
                if($industry != 'all' && $industry != 'incomplete' && $industry != 'corrupt' && $industry != 'incomplete-edu' && $industry != 'incomplete-exp')
                {
                    $filter = " WHERE industry = $industry";
                }
                elseif ($industry == 'test-users') {
                    $filter = " WHERE email = 'brian@jobsikaz.com' OR email = 'sophy@jobsikaz.com' ";
                }
                $sql = "SELECT * FROM employers $filter";

                $result = DB::select($sql);
                foreach($result as $employer)
                {
                    $user = User::find($employer->user_id);
                    if(!isset($user->id))
                        continue;
                    if(User::subscriptionStatus($user->email))
                        VacancyEmail::dispatch($user->email,$user->name, $subject, $caption, $contents,$banner,$template,$attachment1, $attachment2, $attachment3,'info@emploi.co',$url);
                }
                
                
                break;

            case 'unregistered-employers':
                $storage_path = storage_path();
                $file = $storage_path.'/app/unregistered-employers.csv';
                if(file_exists($file)){
                    
                    $handle = fopen($file, "r");
                    for ($i = 0; $row = fgetcsv($handle ); ++$i) {

                        $email = User::cleanEmail($row[0]);
                        
                        if(User::subscriptionStatus($email) && filter_var($email, FILTER_VALIDATE_EMAIL) && preg_match('/@.+\./', $email))
                        {
                            VacancyEmail::dispatch($email,'there', $subject, $caption, $contents,$banner,$template,$attachment1, $attachment2, $attachment3,'info@emploi.co',$url);
                            //print "<br> ".$row[0];
                        }
                        
                    }
                    fclose($handle);
                    
                }
                else
                {
                    die("File $file not found");
                }
                break;

            case 'all-employers':
                $storage_path = storage_path();
                $file = $storage_path.'/app/unregistered-employers.csv';
                if(file_exists($file)){
                    
                    $handle = fopen($file, "r");
                    for ($i = 0; $row = fgetcsv($handle ); ++$i) {

                        $email = User::cleanEmail($row[0]);
                        
                        if(User::subscriptionStatus($email) && filter_var($email, FILTER_VALIDATE_EMAIL) && preg_match('/@.+\./', $email))
                        {
                            VacancyEmail::dispatch($email,'there', $subject, $caption, $contents,$banner,$template,$attachment1, $attachment2, $attachment3,'info@emploi.co',$url);
                            //print "<br> ".$row[0];
                        }
                        
                    }
                    fclose($handle);
                    
                }
                else
                {
                    die("File $file not found");
                }  

                $filter = '';
                if($industry != 'all' && $industry != 'incomplete' && $industry != 'corrupt' && $industry != 'incomplete-edu' && $industry != 'incomplete-exp')
                {
                    $filter = " WHERE industry = $industry";
                }
                elseif ($industry == 'test-users') {
                    $filter = " WHERE email = 'brian@jobsikaz.com' OR email = 'sophy@jobsikaz.com' ";
                }
                $sql = "SELECT * FROM employers $filter";

                $result = DB::select($sql);
                foreach($result as $employer)
                {
                    $user = User::find($employer->user_id);
                    if(!isset($user->id))
                        continue;
                    if(User::subscriptionStatus($user->email))
                        VacancyEmail::dispatch($user->email,$user->name, $subject, $caption, $contents,$banner,$template,$attachment1, $attachment2, $attachment3,'info@emploi.co',$url);
                }

                break;

            case 'companies':
                $filter = '';
                if($industry != 'all' && $industry != 'incomplete' && $industry != 'corrupt' && $industry != 'incomplete-edu' && $industry != 'incomplete-exp')
                {
                    $filter = " WHERE industry = $industry";
                }
                elseif ($industry == 'test-users') {
                    $filter = " WHERE email = 'brian@jobsikaz.com' OR email = 'david@emploi.co' ";
                }
                $sql = "SELECT * FROM companies $filter";

                $result = DB::select($sql);
                foreach($result as $company)
                {
                    $user = User::find($company->user_id);
                    if(isset($company->email) && $company->user_id == 3)
                    VacancyEmail::dispatch($company->email,$company->name, $subject, $caption, $contents,$banner,$template,$attachment1, $attachment2, $attachment3,'info@emploi.co',$url);
                }
                
                
                break;
            case 'unregistered':
                $users = UnregisteredUser::all();
                for($i=0; $i<count($users); $i++)
                {
                    $user = User::where('email',$users[$i]->email)->first();
                    if(!isset($user->id) && User::subscriptionStatus($users[$i]->email))
                    {
                        $email = $users[$i]->email;
                        $name = $users[$i]->name ? $users[$i]->name : 'job seeker';
                        VacancyEmail::dispatch($email,$name, $subject, $caption, $contents,$banner,$template,$attachment1, $attachment2, $attachment3,'Emploi_Weekly_Digest@emploi.co',$url);
                    }
                }
                break;

            case 'all-seekers':

                $users = UnregisteredUser::all();
                for($i=0; $i<count($users); $i++)
                {
                    $user = User::where('email',$users[$i]->email)->first();
                    if(!isset($user->id) && User::subscriptionStatus($users[$i]->email))
                    {
                        $email = $users[$i]->email;
                        $name = $users[$i]->name ? $users[$i]->name : 'job seeker';
                        VacancyEmail::dispatch($email,$name, $subject, $caption, $contents,$banner,$template,$attachment1, $attachment2, $attachment3,'Emploi_Weekly_Digest@emploi.co',$url);
                    }
                }

                $filter = '';
                if($industry == 'all')
                {
                    $filter = "";
                }
                elseif($industry == 'incomplete')
                {
                    $filter = " WHERE LENGTH(education) < 10 OR LENGTH(experience) < 10";
                }
                elseif($industry == 'incomplete-edu')
                {
                    $filter = " WHERE LENGTH(education) < 10";
                }
                elseif($industry == 'incomplete-exp')
                {
                    $filter = " WHERE LENGTH(experience) < 10";
                }
                elseif($industry == 'corrupt')
                {
                    $filter = " WHERE resume not like \"%.%\"";
                }
                elseif($industry == 'test-users')
                {
                    $filter = " WHERE email = 'brian@emploi.co' OR email = 'sophy@emploi.co' OR email = 'earnest@emploi.co' OR email='david@emploi.co'";
                }
                else
                {
                    $filter = " WHERE industry = $industry";
                }
                $sql = "SELECT user_id FROM seekers $filter";

                //die($sql);
                
                $result = DB::select($sql);
                
                foreach($result as $seeker)
                {
                    $user = User::find($seeker->user_id);
                    if(!isset($user->id))
                        continue;
                    if(User::subscriptionStatus($user->email))
                    {
                        VacancyEmail::dispatch($user->email,$user->name, $subject, $caption, $contents,$banner,$template,$attachment1, $attachment2, $attachment3,'Emploi_Weekly_Digest@emploi.co',$url);
                    }
                }

                break;
                
            case 'test-users':

                Mail::to('sophy@emploi.co')
                ->send(
                    new CustomVacancyEmail(
                        'Sophy Mwale',
                        $subject,
                        $caption,
                        $contents,
                        'sophy@emploi.co',
                        $banner,
                        $template,
                        $attachment1,
                        $attachment2,
                        $attachment3,
                        'emailer-test@emploi.co',
                        $url
                    )
                );

                Mail::to('earnest@emploi.co')
                ->send(
                    new CustomVacancyEmail(
                        'Earnest Wanyonyi',
                        $subject,
                        $caption,
                        $contents,
                        'earnest@emploi.co',
                        $banner,
                        $template,
                        $attachment1,
                        $attachment2,
                        $attachment3,
                        'emailer-test@emploi.co',
                        $url
                    )
                );

                Mail::to('david@emploi.co')
                ->send(
                    new CustomVacancyEmail(
                        'David Kirarit',
                        $subject,
                        $caption,
                        $contents,
                        'david@emploi.co',
                        $banner,
                        $template,
                        $attachment1,
                        $attachment2,
                        $attachment3,
                        'emailer-test@emploi.co',
                        $url
                    )
                );

                Mail::to('derrick@emploi.co')
                ->send(
                    new CustomVacancyEmail(
                        'Derrick Omollo',
                        $subject,
                        $caption,
                        $contents,
                        'derrick@emploi.co',
                        $banner,
                        $template,
                        $attachment1,
                        $attachment2,
                        $attachment3,
                        'emailer-test@emploi.co',
                        $url
                    )
                );
                
                // Mail::to('sophy@emploi.co')
                // ->send(
                //     new CustomVacancyEmail(
                //         'Sophy Mwale',
                //         $subject,
                //         $caption,
                //         $contents,
                //         'sophy@emploi.co',
                //         $banner,
                //         $template,
                //         $attachment1,
                //         $attachment2,
                //         $attachment3,
                //         'info@emploi.co',
                //         $url
                //     )
                // );
                //VacancyEmail::dispatch('brian@jobsikaz.com','Brian Obare', $subject, $caption, $contents,$banner,$template,$attachment1, $attachment2, $attachment3);
                //VacancyEmail::dispatch('sophy@jobsikaz.com','Brian Obare', $subject, $caption, $contents,$banner,$template,$attachment1, $attachment2, $attachment3);
                // $sql = "SELECT name, email FROM users WHERE email = 'brian@jobsikaz.com' OR email = 'sophy@jobsikaz.com' ";
                // //die($sql);
                // $result = DB::select($sql);
                // foreach($result as $user)
                // {
                //     if(User::subscriptionStatus($user->email))
                //         VacancyEmail::dispatch($user->email,$user->name, $subject, $caption, $contents,$banner,$template,$attachment1, $attachment2, $attachment3);
                // }
                
                break;

            case 'team':

                $team = [
                    ['brian@emploi.co','Obare C. Brian'],
                    ['sophy@emploi.co','Sophy Mwale'],
                    ['derrick@emploi.co','Derrick Brian'],
                    ['simon@emploi.co','Simon'],
                    ['silvia@emploi.co','Silvia Kamau'],
                    ['david@emploi.co','David'],
                    ['ernest@emploi.co','Ernest Wanyonyi'],
                    ['margaret@emploi.co','Margaret Ongachi']
                ];

                for($i=0; $i<count($team); $i++)
                {
                    VacancyEmail::dispatch($team[$i][0],$team[$i][1], $subject, $caption, $contents,$banner,$template,$attachment1, $attachment2, $attachment3,'info@emploi.co',$url);
                }

                // $sql = "SELECT name, email FROM users WHERE email like \"%@emploi.co\"";
                // $result = DB::select($sql);
                // foreach($result as $user)
                // {
                //     if(User::subscriptionStatus($user->email))
                //         VacancyEmail::dispatch($user->email,$user->name, $subject, $caption, $contents,$banner,$template,$attachment1, $attachment2, $attachment3,'info@emploi.co');
                // }
                
                break;

            case 'employers-list':
                $storage_path = storage_path();
                $file = $storage_path.'/app/employers-list.csv';
                //$file = $storage_path.'/app/emails.csv';
                if(file_exists($file)){
                    
                    $handle = fopen($file, "r");
                    for ($i = 0; $row = fgetcsv($handle ); ++$i) {

                        $email = User::cleanEmail($row[0]);
                        
                        if(User::subscriptionStatus($email) && filter_var($email, FILTER_VALIDATE_EMAIL) && preg_match('/@.+\./', $email))
                        {
                            VacancyEmail::dispatch($email,'there', $subject, $caption, $contents,$banner,$template,$attachment1, $attachment2, $attachment3,'info@emploi.co',$url);
                            //print "<br> ".$row[0];
                        }
                        
                    }
                    fclose($handle);
                    
                }
                else
                {
                    die("File $file not found");
                }
                break;

            case 'contact-list':

                $contacts = Contact::all();
                for($i=0; $i<count($contacts); $i++)
                {
                    $contact = $contacts[$i];
                    VacancyEmail::dispatch($contact->email,$contact->name, $subject, $caption, $contents,$banner,$template,$attachment1, $attachment2, $attachment3,'info@emploi.co',$url);
                }
                break;

            case 'cv-edit-request-list':

                $contacts = CvEditRequest::all();
                for($i=0; $i<count($contacts); $i++)
                {
                    $contact = $contacts[$i];
                    VacancyEmail::dispatch($contact->email,$contact->name, $subject, $caption, $contents,$banner,$template,$attachment1, $attachment2, $attachment3,'info@emploi.co',$url);
                }
                break;

            case 'employers-advertise':

                $contacts = Advert::all();
                for($i=0; $i<count($contacts); $i++)
                {
                    $contact = $contacts[$i];
                    VacancyEmail::dispatch($contact->email,$contact->name, $subject, $caption, $contents,$banner,$template,$attachment1, $attachment2, $attachment3,'info@emploi.co',$url);
                }
                break;

            case 'referees':

                $contacts = Referee::all();
                for($i=0; $i<count($contacts); $i++)
                {
                    $contact = $contacts[$i];
                    VacancyEmail::dispatch($contact->email,$contact->name, $subject, $caption, $contents,$banner,$template,$attachment1, $attachment2, $attachment3,'info@emploi.co',$url);
                }
                break;

            case 'hot_leads_emails':
                $storage_path = storage_path();
                $file = $storage_path.'/app/hot_leads_emails.csv';
                //$file = $storage_path.'/app/emails.csv';
                if(file_exists($file)){
                    
                    $handle = fopen($file, "r");
                    for ($i = 0; $row = fgetcsv($handle ); ++$i) {

                        $email = User::cleanEmail($row[0]);
                        $name = $row[1];
                        
                        if(User::subscriptionStatus($email) && filter_var($email, FILTER_VALIDATE_EMAIL) && preg_match('/@.+\./', $email))
                        {
                            VacancyEmail::dispatch($email,$name, $subject, $caption, $contents,$banner,$template,$attachment1, $attachment2, $attachment3,'info@emploi.co',$url);
                            //print "<br> ".$row[0];
                        }
                        
                    }
                    fclose($handle);
                    
                }
                else
                {
                    die("File $file not found");
                }
                break;
            case 'referred_but_pending':
                $users = Referral::where('status','pending')->get();
                for($i=0; $i<count($users); $i++)
                {
                    $user = User::where('email',$users[$i]->email)->first();
                    if(!isset($user->id) && User::subscriptionStatus($users[$i]->email))
                    {
                        $email = $users[$i]->email;
                        $name = $users[$i]->name ? $users[$i]->name : 'there';
                        VacancyEmail::dispatch($email,$name, $subject, $caption, $contents,$banner,$template,$attachment1, $attachment2, $attachment3,'team@emploi.co',$url);
                    }
                }
                break;

                break;

                
            default:
                die("No category has been selected. Invalid Parameters");
                
                          
        }

        // return new CustomVacancyEmail(
        //     'Recepient Name',
        //     $subject,
        //     $caption,
        //     $contents,
        //     'recepient@gmail.com',
        //     $banner,
        //     $template,
        //     $attachment1,
        //     $attachment2,
        //     $attachment3,
        //     'info@emploi.co',
        //     $url
        // );

        return view('admins.emails.queued');

        return $request->all();
    }

    public function seekerMetrics(Request $request){

        $countries = Country::Where('status','active')->get();
       
          
        if(isset($request->month) && isset($request->year))
        {                       
                 
            $period = Carbon::createFromFormat('Y-m', $request->year.'-'.$request->month);
            $focus_month = $request->month;
            $focus_year = $request->year;
            
        }
        else
        {
            $period = now();
            $focus_month = $period->month;
            $focus_year = $period->year;
        }
         
        $country = $request->country;     
        $focus_country = $country; 
        
        if(isset($request->country)){
        
        $seekers_count = 0;
        $employers_count = 0;

        $contacts_count = 0;
        $adverts_count = 0;
        $blogs_count = 0;
        $companies_count = 0;
        $cv_requests_count = 0;
        $job_applications_count = 0;
        $model_seekers_count = 0;
        $posts_count = 0;
        $referees_count = 0;
        $cv_editors = 0;
        $cv_edit_requests = 0;
            

        $seekers_count = Seeker::where('country_id',$focus_country)->whereMonth('created_at',$period->format('m'))->whereYear('created_at',$period->format('Y'))->count();

        $employers_count = Employer::where('country_id',$focus_country)->whereMonth('created_at',$period->format('m'))->whereYear('created_at',$period->format('Y'))->count();

        $contacts_count = Contact::whereMonth('created_at',$period->format('m'))->whereYear('created_at',$period->format('Y'))->count();
        $adverts_count = Advert::whereMonth('created_at',$period->format('m'))->whereYear('created_at',$period->format('Y'))->count();
        $blogs_count = Blog::whereMonth('created_at',$period->format('m'))->whereYear('created_at',$period->format('Y'))->count();
        $companies_count = Company::whereMonth('created_at',$period->format('m'))->whereYear('created_at',$period->format('Y'))->count();
        $cv_requests_count = CvRequest::whereMonth('created_at',$period->format('m'))->whereYear('created_at',$period->format('Y'))->count();
        $job_applications_count = JobApplication::whereMonth('created_at',$period->format('m'))->whereYear('created_at',$period->format('Y'))->count();
        $model_seekers_count = ModelSeeker::whereMonth('created_at',$period->format('m'))->whereYear('created_at',$period->format('Y'))->count();
        $posts_count = Post::whereMonth('created_at',$period->format('m'))->whereYear('created_at',$period->format('Y'))->count();
        $referees_count = Referee::whereMonth('created_at',$period->format('m'))->whereYear('created_at',$period->format('Y'))->count();

        $cv_editors = CvEditor::whereMonth('created_at',$period->format('m'))->whereYear('created_at',$period->format('Y'))->count();
        $cv_edit_requests = CvEditRequest::whereMonth('created_at',$period->format('m'))->whereYear('created_at',$period->format('Y'))->count();
        $faqs = Faq::whereMonth('created_at',$period->format('m'))->whereYear('created_at',$period->format('Y'))->count();
        $featured_seeker = ProductOrder::where('product_id',1)->whereMonth('created_at',$period->format('m'))->whereYear('created_at',$period->format('Y'))->count();
        $seeker_basic = ProductOrder::where('product_id',7)->whereMonth('created_at',$period->format('m'))->whereYear('created_at',$period->format('Y'))->count();

        $months = [
            'Jan',
            'Feb',
            'Mar',
            'Apr',
            'May',
            'Jun',
            'Jul',
            'Aug',
            'Sep',
            'Oct',
            'Nov',
            'Dec',
        ];
    }
        
        if(!isset($request->country)){
        $seekers_count = 0;
        $employers_count = 0;

        $contacts_count = 0;
        $adverts_count = 0;
        $blogs_count = 0;
        $companies_count = 0;
        $cv_requests_count = 0;
        $job_applications_count = 0;
        $model_seekers_count = 0;
        $posts_count = 0;
        $referees_count = 0;
        $cv_editors = 0;
        $cv_edit_requests = 0;
            

        $seekers_count = Seeker::whereMonth('created_at',$period->format('m'))->whereYear('created_at',$period->format('Y'))->count();

        $employers_count = Employer::whereMonth('created_at',$period->format('m'))->whereYear('created_at',$period->format('Y'))->count();

        $contacts_count = Contact::whereMonth('created_at',$period->format('m'))->whereYear('created_at',$period->format('Y'))->count();
        $adverts_count = Advert::whereMonth('created_at',$period->format('m'))->whereYear('created_at',$period->format('Y'))->count();
        $blogs_count = Blog::whereMonth('created_at',$period->format('m'))->whereYear('created_at',$period->format('Y'))->count();
        $companies_count = Company::whereMonth('created_at',$period->format('m'))->whereYear('created_at',$period->format('Y'))->count();
        $cv_requests_count = CvRequest::whereMonth('created_at',$period->format('m'))->whereYear('created_at',$period->format('Y'))->count();
        $job_applications_count = JobApplication::whereMonth('created_at',$period->format('m'))->whereYear('created_at',$period->format('Y'))->count();
        $model_seekers_count = ModelSeeker::whereMonth('created_at',$period->format('m'))->whereYear('created_at',$period->format('Y'))->count();
        $posts_count = Post::whereMonth('created_at',$period->format('m'))->whereYear('created_at',$period->format('Y'))->count();
        $referees_count = Referee::whereMonth('created_at',$period->format('m'))->whereYear('created_at',$period->format('Y'))->count();

        $cv_editors = CvEditor::whereMonth('created_at',$period->format('m'))->whereYear('created_at',$period->format('Y'))->count();
        $cv_edit_requests = CvEditRequest::whereMonth('created_at',$period->format('m'))->whereYear('created_at',$period->format('Y'))->count();
        $faqs = Faq::whereMonth('created_at',$period->format('m'))->whereYear('created_at',$period->format('Y'))->count();
        $featured_seeker = ProductOrder::where('product_id',1)->whereMonth('created_at',$period->format('m'))->whereYear('created_at',$period->format('Y'))->count();
        $seeker_basic = ProductOrder::where('product_id',7)->whereMonth('created_at',$period->format('m'))->whereYear('created_at',$period->format('Y'))->count();


        $months = [
            'Jan',
            'Feb',
            'Mar',
            'Apr',
            'May',
            'Jun',
            'Jul',
            'Aug',
            'Sep',
            'Oct',
            'Nov',
            'Dec',
        ];
    }


        return view('admins.metrics.index')
            ->with('seekers_count',$seekers_count)
            ->with('employers_count',$employers_count)
            ->with('contacts_count',$contacts_count)
            ->with('adverts_count',$adverts_count)
            ->with('blogs_count',$blogs_count)
            ->with('companies_count',$companies_count)
            ->with('cv_requests_count',$cv_requests_count)
            ->with('job_applications_count',$job_applications_count)
            ->with('model_seekers_count',$model_seekers_count)
            ->with('posts_count',$posts_count)
            ->with('referees_count',$referees_count)
            ->with('months',$months)
            ->with('faqs',$faqs)
            ->with('cv_editors',$cv_editors)
            ->with('cv_edit_requests',$cv_edit_requests)
            ->with('countries',$countries)
            ->with('focus_country',$focus_country)
            ->with('focus_year',$focus_year)
            ->with('focus_month',$focus_month)
            ->with('featured_seeker',$featured_seeker)
            ->with('seeker_basic',$seeker_basic)
            ;
    }

    public function toggleSeekerFeatured(Request $request){

        die("This feature has been disabled by admin");
        $seeker = Seeker::findOrFail($request->seeker_id);
        $seeker->featured = $seeker->featured == 1 ? 0 : 1;
        $seeker->save();
        //dd($seeker->id);
        return redirect()->back();
        //$seeker = $user->seeker;
    }

    public function editingRequests(Request $request, $id = false){
        if(!$id)
        {
            return view('admins.cvediting.index')
                ->with('edits',CvEditRequest::Where('name','like','%'.$request->q.'%')
                                            ->orWhere('email','like','%'.$request->q.'%')     
                                            ->orderBy('created_at','DESC')->paginate(10));
        }
        $e = CvEditRequest::findOrFail($id);
        $editors = CvEditor::where('industry_id',$e->industry_id)
                    ->orWhere('industry_id',null)->get();
        return view('admins.cvediting.show')
                ->with('edit',$e)
                ->with('editors',$editors);

    }

    public function assignEditingRequests(Request $request, $id)
    {
        $e = CvEditRequest::findOrFail($id);
        $e->cv_editor_id = $request->editor_id;
        $e->assigned_on = now();
        $e->status = 'assigned';
        $e->save();

        $caption = "Cv Edit Request on Emploi";
        $contents = "A CV Editing request has been assigned to you. Log in and process this request. <b> Consider this an urgent call. If you require additional information, kindly contact us.<br><br>
        <a href='".url('/cv-editing/'.$e->slug)."'>View CV Editing Request</a>
         <br>
        Contact us directly by calling us: <a href='tel:+254702068282'>+254 702 068 282</a> or by sending us an e-mail to <a href='mailto:info@emploi.co'>info@emploi.co</a><br>
        Thank you for your cooperation.";
        EmailJob::dispatch($e->cvEditor->user->name, $e->cvEditor->user->email, 'Emploi Cv Edit Request', $caption, $contents);

        return redirect()->back();
        return $request->all();
    }

    public function taskRequests(Request $request, $id = false){
            if(!$id)
            return view('admins.paas.index')
                ->with('tasks',Task::Where('name','like','%'.$request->q.'%')
                                            ->orWhere('email','like','%'.$request->q.'%')     
                                            ->orderBy('created_at','DESC')->paginate(10));
        
        $t = Task::findOrFail($id);
        $professionals = SeekerSubscription::where('status','active')
                        ->where('industry_id', $t->industry)
                        ->get();
        $allprofessionals = SeekerSubscription::where('status','active')
                        ->get();
        return view('admins.paas.show')
                ->with('task',$t)
                ->with('professionals',$professionals)
                ->with('allprofessionals',$allprofessionals);

    }

    public function selectProfessionals(Request $request, $id)
    {
        $e = Task::findOrFail($id);
        $e->cv_editor_id = $request->editor_id;
        $e->assigned_on = now();
        $e->status = 'assigned';
        $e->save();

        // $caption = "Cv Edit Request on Emploi";
        // $contents = "A CV Editing request has been assigned to you. Log in and process this request. <b> Consider this an urgent call. If you require additional information, kindly contact us.<br><br>
        // <a href='".url('/cv-editing/'.$e->slug)."'>View CV Editing Request</a>
        //  <br>
        // Contact us directly by calling us: <a href='tel:+254702068282'>+254 702 068 282</a> or by sending us an e-mail to <a href='mailto:info@emploi.co'>info@emploi.co</a><br>
        // Thank you for your cooperation.";
        // EmailJob::dispatch($e->cvEditor->user->name, $e->cvEditor->user->email, 'Emploi Cv Edit Request', $caption, $contents);

        return redirect()->back();
        return $request->all();
    }

    public function eplacement()
    {
        $exclusive = ExclusivePlacement::orderBy('created_at','DESC')->paginate(12);

        return view('admins.eplacement')
                  ->with('exclusive',$exclusive);
    }

 public function coaching()
    {
        $coaching = Coaching::orderBy('created_at','DESC')->paginate(12);
        return view('admins.coaching')
                ->with('coaching',$coaching);
    }

}

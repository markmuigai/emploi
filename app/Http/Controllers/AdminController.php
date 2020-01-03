<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;

use App\Blog;
use App\Company;
use App\Contact;
use App\CvRequest;
use App\Employer;
use App\Industry;
use App\Location;
use App\Post;
use App\Seeker;
use App\User;
use App\Jobs\VacancyEmail;

use App\Jobs\EmailJob;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function loginas(Request $request){
        $user = User::findOrFail($request->user_id);
        if($user->role == 'admin' || $user->role == 'super-admin')
            abort(403);
        Auth::loginUsingId($request->user_id, true);
        return redirect('/home');
    }

    public function panel(Request $request){
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

    public function blog(Request $request){
        return view('admins.blog.index')
                ->with('blogs',Blog::orderBy('id','desc')->paginate(10));
    }

    public function updatePost($slug, Request $request)
    {
    	$post = Post::where('slug',$slug)->first();
    	if(!isset($post->id))
    		abort(404);
    	$post->status = $request->status;
        $post->featured = $request->featured;
    	$post->save();
    	return redirect()->back(); ;
    	return $request->all();
    }

    public function seekers($username=null, Request $request)
    {
        if($username)
        {
            $user = User::where('username',$username)->firstOrFail();
            if($user->role != 'seeker')
                return redirect('employers/'.$user->username);
            return view('admins.seekers.seeker')
                    ->with('seeker',$user->seeker);
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
                    $industry = "OR industry_id=".$request->industry;
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
                    $gender = "OR gender='".$request->gender."'";
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
                    $phone_number = "OR phone_number LIKE '%".$request->phone_number."%'";
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
                    $keywords = "OR education LIKE '%".$request->keywords."%' OR experience LIKE '%".$request->keywords."%' OR resume_contents LIKE '%".$request->keywords."%'";
                }
                
            }

            if(!$first)
                $where = " WHERE ";
            else
                $where = "";
            $sql = "SELECT * FROM seekers $where $location $industry $gender $phone_number $keywords ORDER BY id DESC";
            $results = DB::select($sql);
            $seekers = [];



            $newseekers = [];
            for($i=0; $i<count($results); $i++)
            {
                $s = Seeker::find($results[$i]->id);
                array_push($newseekers, $s->user_id);
            }

            $seekers = Seeker::whereIn('user_id',$newseekers)
                    ->paginate(20);


            // for($i=0; $i<count($results); $i++)
            // {
            //     array_push($seekers, Seeker::find($results[$i]->id));
            // }

            // if(isset($request->email))
            // {
            //     $user = User::where('email',$request->email)->first();
            //     if(isset($user->id))
            //     {
            //         $placed = false;
            //         for($i=0; $i<count($seekers);$i++)
            //         {
            //             if($seekers[$i]->id == $user->seeker->id)
            //             {
            //                 $placed = true;
            //                 break;
            //             }
            //         }
            //         if(!$placed && $user->role == 'seeker')
            //             array_push($seekers,$user->seeker);
            //     }
            // }

            return view('admins.seekers.index')
                    ->with('industries',Industry::orderBy('name')->get())
                    ->with('locations',Location::orderBy('name')->get())
                    ->with('search',true)
                    ->with('location',$request->location)
                    ->with('industry',$request->industry)
                    ->with('gender',$request->gender)
                    ->with('phone_number',$request->phone_number)
                    ->with('keywords',$request->keywords)
                    ->with('seekers',$seekers);
        }
        return view('admins.seekers.index')
                    ->with('industries',Industry::orderBy('name')->get())
                    ->with('locations',Location::orderBy('name')->get())
                    ->with('seekers',Seeker::orderBy('id','DESC')->paginate(10));
        //show all seekers
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

    public function employers(){
        return view('admins.employers.index')
                ->with('employers',Employer::orderBy('name')->paginate(20));
    }

    public function emails(){
        return view('admins.emails.compose')
                ->with('industries',Industry::orderBy('name')->get());
    }

    public function contacts(){
        return view('admins.contacts.index')
                ->with('contacts',Contact::orderBy('resolved_on','DESC')->orderBy('id','DESC')->paginate(20));
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

    public function sendEmails(Request $request){
        $contents=$request->contents;
        $subject=$request->subject;
        $industry = $request->category;
        $caption = $request->caption;

        $banner = '/images/email-banner.jpg';

        $template = $request->template;
        $template = 'custom';

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
                        VacancyEmail::dispatch($user->email,$user->name, $subject, $caption, $contents,$banner,$template,$attachment1, $attachment2, $attachment3);
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
                        VacancyEmail::dispatch($user->email,$user->name, $subject, $caption, $contents,$banner,$template,$attachment1, $attachment2, $attachment3,'info@emploi.co');
                }
                
                
                break;
                
            case 'unregistered':
                $storage_path = storage_path();
                $file = $storage_path.'/app/unique-emails.csv';
                //$file = $storage_path.'/app/emails.csv';
                if(file_exists($file)){
                    
                    $handle = fopen($file, "r");
                    for ($i = 0; $row = fgetcsv($handle ); ++$i) {

                        $email = User::cleanEmail($row[0]);
                        
                        if(User::subscriptionStatus($email))
                        {
                            VacancyEmail::dispatch($email,'there', $subject, $caption, $contents,$banner,$template,$attachment1, $attachment2, $attachment3);
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
                
            case 'test-users':
                VacancyEmail::dispatch('brian@jobsikaz.com','Brian Obare', $subject, $caption, $contents,$banner,$template,$attachment1, $attachment2, $attachment3);
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
                    ['liza@emploi.co','Liza Adhiambo'],
                    ['sally@emploi.co','Sally Muya'],
                    ['adam@emploi.co','Adam'],
                    ['margaret@emploi.co','Margaret Ongachi']
                ];

                for($i=0; $i<count($team); $i++)
                {
                    VacancyEmail::dispatch($team[$i][0],$team[$i][1], $subject, $caption, $contents,$banner,$template,$attachment1, $attachment2, $attachment3,'info@emploi.co');
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
                            VacancyEmail::dispatch($email,'there', $subject, $caption, $contents,$banner,$template,$attachment1, $attachment2, $attachment3,'info@emploi.co');
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
                
            default:
                die("No category has been selected. Invalid Parameters");
                
                          
        }

        return view('admins.emails.queued');

        return $request->all();
    }

}

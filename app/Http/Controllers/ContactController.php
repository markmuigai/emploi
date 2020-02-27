<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Blog;
use App\Contact;
use App\Country;
use App\CvRequest;
use App\Faq;
use App\InviteLink;
use App\JobApplication;
use App\Location;
use App\Referral;
use App\Parser;
use App\Post;
use App\Seeker;
use App\User;
use App\UserPermission;

use App\Jobs\EmailJob;
use App\Jobs\VacancyEmail;

use Auth;
use Storage;
use Notification;
use App\Notifications\VerifyAccount;
use App\Notifications\ContactReceived;
use App\Notifications\JobApplied;

class ContactController extends Controller
{
    public function cvBuilder(Request $request){
        return view('seekers.cv-builder.index');
    }

    public function referralCredits(){
        return view('pages.referralCredits');
    }

    public function cvBuilderDownload(Request $request)
    {
        $education = array();
        if (isset($request->institution_name)) {
            foreach ($request->institution_name as $key => $value) {
                array_push($education, array($value, $request->course_name[$key], $request->course_duration[$key]));
            }
        }
        $education  = json_encode($education);

        $experience = array();
        if (isset($request->organization_name)) {
            foreach ($request->organization_name as $key => $value) {
                array_push($experience, array($value, $request->job_title[$key], $request->job_start[$key], $request->job_end[$key], $request->responsibilities[$key]));
            }
        }
        $experience  = json_encode($experience);

        $skills = [];
        if(isset($request->skills))
        {
            for ($i=0; $i < count($request->skills); $i++) { 
                $skill_id = $request->skills[$i];
                array_push($skills, \App\IndustrySkill::findOrFail($skill_id));
            }           
        }

        return view('seekers.cv-builder.template')
                ->with('name',$request->name)
                ->with('email',$request->email)
                ->with('phone',$request->phone)
                ->with('education',$education)
                ->with('experience',$experience)
                ->with('skills',$skills)
                ->with('summary',$request->summary);
        return $request->all();
    }
    // public function testSlack(){
    //     Notification::send(User::first(),new TestNotification('Emploi System notification'));
    // }

    // public function testEmail(Request $request){
    //     $email = isset($request->email) ? $request->email : 'brian@jobsikaz.com';
    //     $name = isset($request->name) ? $request->name : 'Brian Obare';
    //     $res = Notification::route('mail', $email)->notify(new VerifyAccount($email,'TEST-VERIFY',$name));
    //     dd($res);
    // }

    public function jobSeekerFaqs(Request $request)
    {
        return view('seekers.faqs')
                ->with('faqs',Faq::where('permission_id',4)->paginate(10));
    }

    public function employerFaqs(Request $request)
    {
        return view('employers.faqs')
                ->with('faqs',Faq::where('permission_id',3)->paginate(10));
    }

    public function invited($slug, Request $request){

        $invite = InviteLink::where('slug',$slug)->first();

        if(!isset($invite->id))
        {            
            return redirect('/join');
        }
        else
        {

            if(!isset(Auth::user()->id))
            {
                if(!$request->session()->has('invite_id'))
                {
                    $request->session()->put('invite_id', $invite->id);
                    $invite->clicks_count++;
                    $invite->save();
                }          
                
            }

            //create session
            

            return view('invites.invited')
                ->with('invite',$invite);
            
            return redirect('/join');
        }
            
    }

    public function indexRedirect(){
        return redirect('/');
    }

    public function robotsFile(Request $request){
        $robots = "# Group 1
User-agent: Googlebot
Disallow: /nogooglebot/

Sitemap: https://".$request->getHttpHost()."/sitemap.xml";
        return response($robots)
            ->header('Content-Type', 'text/plain');
    }

    public function googleAdsFile(){
        $ads = 'google.com, pub-9948474979900683, DIRECT, f08c47fec0942fa0';
        return response($ads)
            ->header('Content-Type', 'text/plain');
    }

    public function easyApply($slug, Request $request)
    {
        $request->validate([
            'name'          =>  ['required','max:50','string'],
            'email'         =>  ['required', 'string', 'email', 'max:50'],
            'phone_number' => ['required', 'string', 'max:15'],
            'gender' => ['required', 'string', 'max:1'],
            'prefix' => ['required','integer'],
            'resume' => ['required','mimes:pdf,docx,doc','max:51200']
        ]);

        $user = User::where('email',$request->email)->first();
        $post = Post::where('slug',$slug)->firstOrFail();
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

            if(!isset($user->id))
            {
                abort(500);
            }

            $perm = UserPermission::create([
                'user_id' => $user->id, 
                'permission_id' => 4
            ]);

            $storage_path = '/public/resumes';
            $resume_url = basename(Storage::put($storage_path, $request->file('resume')));

            $parser = new Parser($resume_url);

            Referral::creditFor($request->email);

            $country = Country::findOrFail($request->prefix);

            $seeker = Seeker::create([
                'user_id' => $user->id,
                'public_name' => $username,
                'gender' => $request->gender,
                'phone_number' => $country->prefix.$request->phone_number,
                'country_id' => $post->location->country->id,
                'industry_id' => $post->industry_id,
                'resume' => $resume_url,
                'resume_contents' => $parser->convertToText()
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
        if($user->role != 'seeker')
            die('Only job seekers can apply. <a href="/login">Login</a>');
        if(!$user->seeker->hasApplied($post))
        {
            $j = JobApplication::create([
                'user_id' => $user->id,
                'post_id' => $post->id,
                'cover' => 'Job seeker did not attach a cover letter'
            ]);

            $r = CvRequest::where('employer_id',$post->company->user->employer->id)
                    ->where('seeker_id',$user->seeker->id)
                    ->first();

            if(isset($r->id))
            {
                $r->status = 'accepted';
                $r->save();
            }
            else
            {
                CvRequest::create([
                    'employer_id' => $post->company->user->employer->id, 
                    'seeker_id' => $user->seeker->id, 
                    'status' => 'accepted'
                ]);
            }

            if(isset($j->id))
            {

                $caption = "You have applied for ".$post->title;
                $contents = "Your application for the ".$post->title." has been submitted succesfully. Your Job Application Id is ".$j->id.". <br>
                The application has been sent to <strong>".$post->company->name."</strong> for consideration.<br><br>
                In the meantime, update your profile with your updated CV to rank better against other applicants.
                <br>
                All the best.
                <br><br>

                <a href='".url('/vacancies')."'>Browse Other Vacancies</a>
                ";
                EmailJob::dispatch($user->name, $user->email, 'Applied for '.$post->title, $caption, $contents);



                $caption = "Application Received for ".$post->title;
                $contents = $user->seeker->public_name." has submitted an application for the ".$post->title." position.
                <a href='".url('/home')."'>Log in</a> to your account to review the application and compare ".$user->seeker->public_name."'s application to your Role Suitability Index.
                <br>
                Thank you for choosing Emploi
                <br><br>

                <a href='".url('/home')."'>My Account</a>
                ";
                $email = $post->company->user->email == 'jobs@emploi.co' ? 'jobapplication389@gmail.com' : $post->company->email;

                $email = $email == null ? $post->company->user->email : $email;

                $email = isset($request->external_apply) ? $request->external_apply : $email;
                $name = isset($request->external_apply) ? 'Employer' : $post->company->user->name;

                //Seeker::first()->notify(new JobApplied('Application for '.$post->title." from ".$user->name." received"));

                VacancyEmail::dispatch($email, $name, 'Application for '.$post->title." Received", $caption, $contents,'/images/email-banner-1.jpg','custom',storage_path().'/app/public/resumes/'.$user->seeker->resume,false,false);

                

                //EmailJob::dispatch($name, $email, 'Application for '.$post->title." Received", $caption, $contents);
                return view('seekers.easy-applied')
                        ->with('created',$created)
                        ->with('post',$post);
            }
        }
        return view('seekers.apply-failed')
                ->with('post',$post);
    }

    public function save(Request $request)
    {
    	//return $request->all();
    	$code = strtoupper(User::generateRandomString(10));
    	$c = Contact::create([
    		'code' => $code,
    		'name' => $request->name,
    		'email' => $request->email,
    		'phone_number' => $request->phone,
    		'message' => $request->message
    	]);

    	if(isset($c->id))
    	{
    		$caption = "We have received your message";
            $contents = "Your message has been received and one of our administrators will get back to you shortly. Your Tracking code is <strong>".$c->code."</strong><br><br>
            Here are your submissions: <br>
            Name: <strong>".$c->name."</strong> <br>
            Email: <strong>".$c->email."</strong> <br>
            Phone Number: <strong>".$c->phone_number."</strong> <br>
            Message: <br><i>".$c->message."</i> <br><br>
            Contact us directly by calling us: <a href='tel:+254702068282'>+254 702 068 282</a> or by sending us an e-mail to <a href='mailto:info@emploi.co'>info@emploi.co</a><br>
            Thank you for choosing Emploi.";
            EmailJob::dispatch($c->name, $c->email, 'Contact Received', $caption, $contents);

            Notification::send(User::first(),new ContactReceived($c->name.' contacted us through the contact form. Message: '.$c->message));

            // $caption = $c->name." contacted us";
            // $contents = "We have received a new message on Emploi, with a Tracking code of <strong>".$c->code."</strong><br><br>
            // Here are the Details: <br>
            // Name: <strong>".$c->name."</strong> <br>
            // Email: <strong>".$c->email."</strong> <br>
            // Phone Number: <strong>".$c->phone_number."</strong> <br>
            // Message: <br><i>".$c->message."</i> <br><br>

            // <a href='".url('/admin/contacts/'.$c->id)."'>Click here</a> to respond to ".$c->name;

            // EmailJob::dispatch('Emploi Team', 'jobapplication389@gmail.com', 'New Contact Received', $caption, $contents);

    		return view('contacts.success')
    				->with('code',$code);
    	}

    	return view('contacts.failed');
    }

    public function webmail()
    {
        return redirect('https://mail.emploi.co:2096/');
    }

    public function getFeatured()
    {
        return redirect(url('/checkout?product=featured_seeker'));
    }

    public function getAlerts()
    {
        return redirect(url('/checkout?product=seeker_basic'));
    }

    public function cpanel()
    {
        return redirect('http://54.36.168.64:2082/');
    }

    public function index(Request $request)
    {
        return view('welcome')
                ->with('posts',Post::featured(20))
                ->with('blogs',Blog::recent(5))
                ->with('locations',Location::top());
    }

    public function join(Request $request){
        if(isset($request->redirectToUrl))
            $request->session()->put('redirectToUrl', $request->redirectToUrl);
        return view('pages.join');
    }

    public function careers(){
         return view('pages.careers');
    }
    public function contact(){
         return view('pages.contact');
    }
    public function about(){
         return view('pages.about');
    }
    public function team(){
         return view('pages.team');
    }
    public function clients(){
         return view('pages.clients');
    }
    public function terms(){
         return view('pages.terms');
    }
    public function policy(){
         return view('pages.privacy-policy');
    }
    public function mass_recruitment(){
         return view('pages.mass-recruitment');
    }
    public function rsi(){
         return view('pages.rsi');
    }
    public function registered(){
         return view('seekers.registered');
    }
    public function createAcc(){
        return redirect('/join');
    }
    public function rateCard(){
        return view('employers.rate-card');
    }
    public function applicants(){
        return view('employers.rate-card');
    }

    public function precruit(){
        return view('employers.p-recruitment');
    }
    public function cvetting(){
        return view('employers.c-vetting');
    }
    public function hrservices(){
        return view('employers.hr-services');
    }
    public function employersIndex(){
        return redirect('/employers/publish');
    }
    
    public function bkgtests(){
        return view('employers.background-checks');
    }
    public function iqtests(){
        return view('employers.iq-tests');
    }
    public function proficiency(){
        return view('employers.proficiency-tests');
    }
    public function psychometric(){
        return view('employers.psychometric-tests');
    }
    public function retrain(){
        return view('employers.train-employees');
    }
    public function eservices(){
        return view('employers.services');
    }

    public function cvediting(){
        return view('seekers.cv-editing');
    }
    public function cvtemplates(){
        return view('seekers.cv-templates'); 
    }
    public function pplacement(){
        return view('seekers.premium-placement');
    }
    public function jservices(){
        return view('seekers.services');
    }
    public function epublish(){
        return view('employers.publish1'); 
    }


}

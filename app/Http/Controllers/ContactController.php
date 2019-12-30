<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Blog;
use App\Contact;
use App\Location;
use App\Post;
use App\User;

use App\Jobs\EmailJob;

class ContactController extends Controller
{
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

            $caption = $c->name." contacted us";
            $contents = "We have received a new message on Emploi, with a Tracking code of <strong>".$c->code."</strong><br><br>
            Here are the Details: <br>
            Name: <strong>".$c->name."</strong> <br>
            Email: <strong>".$c->email."</strong> <br>
            Phone Number: <strong>".$c->phone_number."</strong> <br>
            Message: <br><i>".$c->message."</i> <br><br>

            <a href='".url('/admin/contacts/'.$c->id)."'>Click here</a> to respond to ".$c->name;

            EmailJob::dispatch('Emploi Team', 'jobapplication389@gmail.com', 'New Contact Received', $caption, $contents);

    		return view('contacts.success')
    				->with('code',$code);
    	}

    	return view('contacts.failed');
    }

    public function index(Request $request)
    {
        return view('welcome')
                ->with('posts',Post::featured(5))
                ->with('blogs',Blog::recent(5))
                ->with('locations',Location::top());
    }

    public function join(){
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

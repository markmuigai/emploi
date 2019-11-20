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

            EmailJob::dispatch('Emploi Admin', 'brian@jobsikaz.com', 'New Contact Received', $caption, $contents);

    		return view('contacts.success')
    				->with('code',$code);
    	}

    	return view('contacts.failed');
    }

    public function index(Request $request)
    {
        return view('welcome')
                ->with('posts',Post::recent(5))
                ->with('blogs',Blog::recent(5))
                ->with('locations',Location::top());
    }
}

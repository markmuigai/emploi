<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Auth;
use App\Jobs\EmailJob;
use App\Notifications\AdvertRequest;
use Notification;
use Illuminate\Support\Facades\Hash;
use Session;

use App\Advert;
use App\Company;
use App\Country;
use App\Employer;
use App\InviteLink;
use App\Referral;
use App\User;
use App\UserPermission;

class AdvertController extends Controller
{
    public function __construct() {
        $this->middleware('admin', ['except' => [
            'store','isCovid19'
        ]]);
    }

    public function isCovid19(Request $request)
    {
        $advert = Advert::find($request->advert_id);
        if($advert->notes == NULL)
        {
            $advert->title = '[Cv19] '.$advert->title;
            $advert->notes = 'covid19';
            $advert->save();
            return view('adverts.covid19');
        }
        return redirect('/employers');
    }

    public function index(Request $request, $id = false){
        if($id)
        {
            $ad = Advert::findOrFail($id);
            return view('adverts.show')
                ->with('advert',$ad);
        }
        $ads = Advert::Where('name','like','%'.$request->q.'%')
                        ->orWhere('email','like','%'.$request->q.'%') 
                        ->orWhere('title','like','%'.$request->q.'%') 
                        ->orderBy('status','DESC')
                        ->orderBy('id','DESC')->paginate(10);
        return view('adverts.index')
                ->with('adverts',$ads);
    }

    public function store(Request $request)
    {

        if($request->input('name') =='Abermotvaw'){
        die('Unauthorised submission. Kindly <a href="/employers/register">try again</a>!');
        
        }
        if(!empty($request->input('check'))){
        die('Unauthorised submission. Kindly <a href="/employers/register">try again</a>!');
        }
        
        else
        {
        $request->validate([
            'name' => ['required', 'string', 'max:50'],
            'email'  =>  ['required', 'string', 'email','max:50'],
            'phone_number' => [ 'string', 'max:50'],
            'title'    =>  ['string'],
            'description' => ['string']
        ]);
       }

        $a = Advert::create([
            'name' => $request->name,
            'phone_number' => $request->phone_number,
            'email' => $request->email,
            'title'    =>  ['required','string'],
            'description' => ['required','string']
        ]);
        $user = User::where('email',$request->email)->first();
        if(!isset($user->id))
        {
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
                'password' => Hash::make($password),
            ]);

            $caption = "An Emploi profile as an Employer was created";
            $contents = "Your account on Emploi as an Employer has been created. Your vacancy advertisement is being processed and you will be able to receive applications and shortlist them from anywhere on your dashboard.<br><br>

            <b>Username:</b> ".$user->name." <br>
            <b>Password:</b> $password
            
            <br><br>
            <a href='".url('/verify-account/'.$user->email_verification)."'>Verify your Profile here</a> and log in to continue. <br><br>
            Emploi - Your Trusted HR Firm";
            EmailJob::dispatch($user->name, $user->email, 'Verify Emploi Account', $caption, $contents);

            $r = Referral::where('email',$user->email)->first();

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
                }
            }

            $emp = Employer::create([
                'user_id' => $user->id,
                'name' => $request->name,
                'industry_id' => 32,//uncategorized
                'company_name' => 'N.A.',
                'contact_phone' => $request->phone_number ? $request->phone_number : 'N.A.',
                'company_phone' => $request->phone_number ? $request->phone_number : 'N.A.',
                'company_email' => $request->email,
                'country_id' => 1,
                'address' => 'N.A.'
            ]);



            //return $emp;

            $perm = UserPermission::create([
                'user_id' => $user->id,
                'permission_id' => 3
            ]);

            

            if(isset(Auth::user()->id) && Auth::user()->role == 'admin')
            {
                $user->verifyAccount();
            }
            
        }

        $caption = "Advertisement request on Emploi has been submitted.";
        $contents = "We have received your Advertisement Request on Emploi and will get in touch with you shortly. Emploi's philosophy is to create a single sourcing point for players, with enough tools to help them find each other.<br>
        <a href='".url('/employers/create')."'>Create an account as an employer</a> and get access to recruitment with our Role Suitability Index and much more.<br><br>

        If you have any questions, feel free to call us on +(254) 702 068 282 or write to us info@emploi.co.


        Thank you for choosing Emploi";
        EmailJob::dispatch($a->name, $a->email, 'Emploi Advertisement Request Created', $caption, $contents);

        $title = ' - '.$a->title ? $a->title : '';
        //$phone_number = ' - '.$a->phone_number ? $a->phone_number : '';

        if (app()->environment() === 'production')
            Notification::send(Employer::first(),new AdvertRequest('NEW ADVERT REQUEST: '.$a->name.' has requested for an advertisement '.$title.'. Email: '.$request->email));

        // $caption = "Advertisement request received on Emploi";
        // $contents = "We have received an Advertisement Request from <b>".$a->name."</b>.
        // Log into <a href='/admin/received-requests/".$a->id."'>Admin panel</a> to view more details.";
        // EmailJob::dispatch('Emploi Team', 'jobapplication389@gmail.com', 'Emploi Advertisement Request Created', $caption, $contents);

        return view('adverts.created')
                ->with('advert',$a);
        return $request->all();
    }

    public function saveNotes(Request $request, $id){
        $ad = Advert::findOrFail($id);
        $ad->notes = $request->notes;
        $ad->status = $request->status;
        $ad->updated_at = now();
        $ad->save();
        return redirect('/admin/received-requests/'.$ad->id.'?saved=true');
    }

}

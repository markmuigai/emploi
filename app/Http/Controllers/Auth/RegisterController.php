<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;

use App\Country;
use App\Industry;
use App\InviteLink;
use App\Parser;
use App\Seeker;
use App\Referral;
use App\User;
use App\UserPermission;

use Storage;
use Session;
//use Notification;

use App\Notifications\VerifyAccount;

use App\Jobs\EmailJob;



class RegisterController extends Controller
{
    use RegistersUsers;

    protected $redirectTo = '/registered';

    public function __construct()
    {
        $this->middleware('guest');
    }

    public function showRegistrationForm(Request $request)
    {
        if(isset($request->redirectToUrl))
            $request->session()->put('redirectToUrl', $request->redirectToUrl);
        $email= $request->email ? $request->email : '';
        $name=$request->name ? $request->name : '';
        return view('auth.register')
                ->with('countries',Country::all())
                ->with('name',$name)
                ->with('email',$email)
                ->with('industries',Industry::all());
    }

    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        //$this->guard()->login($user);

        return $this->registered($request, $user)
                        ?: redirect($this->redirectPath());
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:50'],
            'phone_number' => ['required', 'string', 'max:15'],
            'email' => ['required', 'string', 'email', 'max:50', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'resume' => ['required','mimes:pdf,docx,doc','max:51200'],
            'country' => ['required','integer'],
            'industry' => ['required','integer'],
            'prefix' => ['required','integer'],
        ]);
    }

    protected function create(array $data)
    {
        //dd($data);
        $username = explode(" ", $data['name']);
        $username = strtolower(implode("", $username).rand(1000,30000));
        $username = explode(".", $username);
        $username = implode('',$username);

        //$password = User::generateRandomString(10);
        $storage_path = '/public/resumes';
        $resume_url = basename(Storage::put($storage_path, $data['resume']));

        $parser = new Parser($resume_url);
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'username' => $username,
            'email_verification' => User::generateRandomString(10),
            'password' => Hash::make($data['password']),
        ]);

        //$credited = Referral::creditFor($data['email']);

        $r = Referral::where('email',$data['email'])->first();

        if(!isset($r->id) && Session::has('invite_id'))

        //if(!$credited && Session::has('invite_id'))
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

                //Referral::creditFor($user->email,10);
            }

            //Session::forget('invite_id');
        }

        //$resume_url = Storage::putFile('avatars', $request->file('avatar'));


        $country = Country::findOrFail($data['prefix']);

        $seeker = Seeker::create([
            'user_id' => $user->id,
            'public_name' => $username,
            'gender' => $data['gender'],
            'phone_number' => $country->prefix.$data['phone_number'],
            'country_id' => $data['country'],
            'industry_id' => $data['industry'],
            'resume' => $resume_url,
            'resume_contents' => $parser->convertToText()
        ]);

        $perm = UserPermission::create([
            'user_id' => $user->id, 
            'permission_id' => 4
        ]);
        // $caption = "Thank you for registering your profile on Emploi as a Job Seeker.";
        // $contents = "Here are your login credentials for Emploi: <br>
        //     username: $username <br>
        //     <br>

        //     Verify your account <a href='".url('/verify-account/'.$user->email_verification)."'>here</a> and finish setting up your account for employers to easily find and shortlist you.
        //     ";
        // EmailJob::dispatch($user->name, $user->email, 'Verify Emploi Account', $caption, $contents);

        $user->notify(new VerifyAccount($user->email,$user->email_verification,$user->name));
        //Notification::route('mail', $user->name)->notify(new VerifyAccount($email,'TEST-VERIFY',$name));

        return $user;
    }
}

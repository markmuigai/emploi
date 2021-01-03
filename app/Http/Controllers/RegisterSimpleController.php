<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Auth;

use App\Jobs\EmailJob;

use App\Country;
use App\Industry;
use App\Referral;
use App\Seeker;
use App\User;
use App\UserPermission;

class RegisterSimpleController extends Controller
{
    public function create(Request $request){
        $request->validate([
            'name' => ['required', 'string', 'max:50'],
            'email'  =>  ['required', 'string', 'email','max:50','unique:users'],
            'phone_number' => [ 'string', 'max:20'],
            'industry'    =>  ['integer'],
            'contact_prefix' => ['integer']
        ]);

    	if(isset(Auth::user()->id))
    		return redirect('/home');

    	$user = User::where('email',$request->email)->first();

    	if(isset($user->id))
    	{
    		return view('seekers.register.already-registered')->with('email',$request->email);
    	}


    	$username = explode(" ", $request->name);
        $username = strtolower(implode("", $username).rand(1000,30000));
        $username = explode(".", $username);
        $username = implode('',$username);

        $password = User::generateRandomString(10);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'email_verification' => User::generateRandomString(10),
            'username' => $username,
            'password' => Hash::make($password),
        ]);

        if(!isset($user->id))
        {
        	return view('seekers.register.failed');
        }

        Referral::creditFor($request->email);

        $seeker = Seeker::create([
            'user_id' => $user->id,
            'public_name' => $username,
            'phone_number' => isset($request->phone_number) ? Country::findOrFail($request->contact_prefix)->prefix.$request->phone_number : null,
            'industry_id' => isset($request->industry) ? $request->industry : 32,
            'country_id' => 1,
            'featured' => 0
        ]);

        if(!isset($seeker->id))
        {
        	return view('seekers.register.failed');
        }

        $perm = UserPermission::create([
            'user_id' => $user->id, 
            'permission_id' => 4
        ]);
        $caption = "Thank you for registering your profile on Emploi as a Job Seeker.";
        $contents = "Here are your login credentials for Emploi: <br>
        username: $username <br>
        password: $password

        <br><br>
        Log in to finish setting up your account for employers to easily find and shortlist you.
        ";
        EmailJob::dispatch($user->name, $user->email, 'Emploi Login Credentials', $caption, $contents);
        return view('seekers.register.success');
    	return 'registered';
    	return $request->all();
    }

    public function verify($code){
        $user = User::where('email_verification',$code)->firstOrFail();
        if(!$user->email_verified_at)
        {
            $user->verifyAccount();
            return view('pages.verified')
                    ->with('user',$user);
            return 'Account verified successfully. <a href="/login">Login</a>';
        }
        return view('pages.already-verified')
                    ->with('user',$user);
        return 'Account has already been verified.  <a href="/login">Login</a>';
        
        
    }

    public function checkEmail(Request $request)
    {
        $user = User::where('email',$request->email)->first();
        if(isset($user->id))
            return 'true';
        return 'false';
    }

    public function seeker(){
        return view('seekers.register.index')
                ->with('industries',Industry::orderBy('name')->get())
                ->with('countries',Country::orderBy('created_at')->orderBy('name')->get());
    }
}

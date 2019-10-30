<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Auth;

use App\Jobs\EmailJob;

use App\Seeker;
use App\User;
use App\UserPermission;

class RegisterSimpleController extends Controller
{
    public function create(Request $request){
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
            'username' => $username,
            'password' => Hash::make($password),
        ]);

        if(!isset($user->id))
        {
        	return view('seekers.register.failed');
        }

        $seeker = Seeker::create([
            'user_id' => $user->id,
            'public_name' => $username,
            'industry_id' => 1,
            'country_id' => 1
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
}

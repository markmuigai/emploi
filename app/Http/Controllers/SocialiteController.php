<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Socialite;
use Auth;

use App\Country;
use App\Industry;
use App\User;

class SocialiteController extends Controller
{
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function handleProviderCallback($provider, Request $request)
    {
        $user = Socialite::driver($provider)->user();
        $matchedUser = User::where('email',$user->getEmail())->first();
        if(isset($matchedUser->id))
        {
        	//returning user
        	Auth::loginUsingId($matchedUser->id, true);
        	return redirect('/home');
        }
        //new user
        return view('auth.social-register')
            ->with('industries',Industry::active())
            ->with('countries',Country::active())
            ->with('name',$user->getName())
            ->with('email',$user->getEmail());
    }
}

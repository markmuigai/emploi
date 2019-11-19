<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Socialite;
use Auth;

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
        else
        {
        	//new user
        }
        dd($user);
        // $user->token;
    }
}

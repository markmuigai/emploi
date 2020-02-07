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
        try {
            $user = Socialite::driver($provider)->user();
            
        } catch (Exception $e) {
            return view('pages.auth-error')
                    ->with('provider',$provider);
        }

        $fullName = $user->getName();
        if($user->getEmail() !== null)
        {
            $matchedUser = User::where('email',$user->getEmail())->first();
            if(isset($matchedUser->id))
            {
                //returning user
                if(!isset(Auth::user()->id))
                    Auth::loginUsingId($matchedUser->id, true);
                return redirect('/home');
            }
            $email = $user->getEmail();
        }
        else
        {
            $email = '';
        }
        
        //new user
        return view('pages.join')
                ->with('email',$email)
                ->with('name',$fullName);
        
                
        return view('auth.social-register')
            ->with('industries',Industry::active())
            ->with('countries',Country::active())
            ->with('name',$user->getName())
            ->with('email',$user->getEmail());
    }
}

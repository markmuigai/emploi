<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Socialite;

class SocialiteController extends Controller
{
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function handleProviderCallback($provider, Request $request)
    {
        $user = Socialite::driver($provider)->user();
        dd($user);
        // $user->token;
    }
}

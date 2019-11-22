<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

use Auth;
use App\User;

use App\Jobs\EmailJob;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/home';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm(Request $request)
    {
        if(isset($request->redirectToPost))
            $request->session()->put('redirectToPost', $request->redirectToPost);
        return view('auth.login');
    }

    public function username()
    {
        return 'username';
    }

    protected function authenticated(Request $request, $user)
    {
        //verify users who registered with name and e-mail only
        if($user->role == 'seeker' && !isset($user->seeker->phone_number))
        {
            $user->verifyAccount();
        }

        if(!$user->email_verified_at)
        {
            $user->email_verification = User::generateRandomString();
            $user->save();

            $caption = "Verification code for your Emploi Account";
        $contents = "
Verify your account <a href='".url('/verify-account/'.$user->email_verification)."'>here</a> and finish setting up your account
        ";
        EmailJob::dispatch($user->name, $user->email, 'Verify Emploi Account', $caption, $contents);

            Auth::logout();
            return view('pages.not-verified');
            die('Account not verified. <a href="/login">Login</a>');
        }
    }
}

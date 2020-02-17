<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

use Auth;
use Notification;

use App\Employer;
use App\User;

use App\Notifications\VerifyAccount;
use App\Jobs\EmailJob;
use App\Notifications\EmployerLoggedIn;

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
        if(isset($request->redirectToUrl))
            $request->session()->put('redirectToUrl', $request->redirectToUrl);
        return view('auth.login');
    }

    // protected function validateLogin(Request $request)
    // {
    //     $request->validate([
    //         'identity' => 'required|string',
    //         'password' => 'required|string',
    //     ]);
    // }

    public function username()
    {
         $login = request()->input('username');

         $field = filter_var($login, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
         request()->merge([$field => $login]);

         return $field;
    }

    protected function authenticated(Request $request, $user)
    {
        //verify users who registered with name and e-mail only
        if($user->role == 'seeker' && $user->seeker->featured == -1)
        {
            $user->verifyAccount();
            $seeker = $user->seeker;

            $seeker->featured = 0;
            $seeker->save();
        }

        if(!$user->email_verified_at)
        {
            // $user->email_verification = User::generateRandomString();
            // $user->save();

        //     $caption = "Verification code for your Emploi Account";
        // $contents = "
        // Verify your account <a href='".url('/verify-account/'.$user->email_verification)."'>here</a> and finish setting up your account
        // ";
        // EmailJob::dispatch($user->name, $user->email, 'Verify Emploi Account', $caption, $contents);

            $user->notify(new VerifyAccount($user->email,$user->email_verification,$user->name));

            Auth::logout();
            return view('pages.not-verified');
            die('Account not verified. <a href="/login">Login</a>');
        }
        if($user->role == 'employer')
        {
            Notification::send(Employer::first(),new EmployerLoggedIn('EMPLOYER LOGIN: '.$user->name.' logged in. Company name: '.$user->companies[0]->name));
        }
    }
}

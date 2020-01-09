<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class AdminMiddleware
{
    public function handle($request, Closure $next)
    {
        $user = \Auth::user();
        if(isset($user->role) && $user->role == 'admin') {
            return $next($request);
        }
        if($request->session()->has('last-admin-id'))
        {
        	Auth::loginUsingId(session('last-admin-id'), true);
        	$request->session()->forget('last-admin-id');
        	return $next($request);
        }
        return redirect('/home');
        return redirect()->back();
    }
}

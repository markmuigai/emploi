<?php

namespace App\Http\Middleware;

use Closure;

class SeekerMiddleware
{
    public function handle($request, Closure $next)
    {
        $user = \Auth::user();
        if($user->role == 'seeker') {
            return $next($request);
        }
        return redirect('/home');
        return redirect()->back();
    }
}

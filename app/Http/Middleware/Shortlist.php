<?php

namespace App\Http\Middleware;

use Closure;

class Shortlist
{
    public function handle($request, Closure $next)
    {
        $user = \Auth::user();
        if(isset($user->role) && $user->role == 'admin') {
            return $next($request);
        }

        if(isset($user->role) && $user->role == 'employer') {
            return $next($request);
        }

        return redirect()->back();
    }
}

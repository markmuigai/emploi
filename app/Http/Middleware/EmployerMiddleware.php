<?php

namespace App\Http\Middleware;

use Closure;

class EmployerMiddleware
{
    public function handle($request, Closure $next)
    {
        $user = \Auth::user();
        if(isset($user->role) && $user->role == 'employer') {
            return $next($request);
        }
        return redirect('/login');
        return redirect()->back();
    }
}

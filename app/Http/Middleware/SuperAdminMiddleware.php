<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class SuperAdminMiddleware
{
    public function handle($request, Closure $next)
    {
        $user = \Auth::user();
        if(isset($user->role) && $user->role == 'super-admin') {
            return $next($request);
        }

        return redirect('/login');
    }
}

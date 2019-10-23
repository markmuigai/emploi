<?php

namespace App\Http\Middleware;

use Closure;

class AdminMiddleware
{
    public function handle($request, Closure $next)
    {
        $user = \Auth::user();
        if(isset($user->role) && $user->role == 'admin') {
            return $next($request);
        }
        return redirect('/login');
        return redirect()->back();
    }
}

<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class BloggerMiddleware
{
    public function handle($request, Closure $next)
    {
        $user = \Auth::user();
        if(isset($user->id) && $user->canWriteBlogs()) {
            return $next($request);
        }
        return abort(403);
        return $next($request);
    }
}

<?php

namespace App\Http\Middleware;

use Closure;

class CvEditMiddleware
{
    public function handle($request, Closure $next)
    {
        $user = \Auth::user();
        if(isset($user->id) && $user->canHandleCvEdits()) {
            return $next($request);
        }
        //return abort(403);
        return redirect('/home');
        return redirect()->back();
    }
}

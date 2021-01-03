<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class PaasClubMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user = \Auth::user();
        
        if(isset(Auth::user()->id) && Auth::user()->role == 'admin'){
           return $next($request);
         }
        if(isset(Auth::user()->id) && Auth::user()->role == 'seeker' && $user->seeker->isOnPaas()){
            return $next($request);
        }
        if(isset(Auth::user()->id) && Auth::user()->role == 'employer' && $user->employer->isOnPaas()) {
            return $next($request);
        }
        //return abort(403);
        if(Auth::user()->role == 'employer'){
        return redirect('/checkout?product=e_club');
        return redirect()->back();
        }else{
        return redirect('/checkout?product=golden_club');
        return redirect()->back();
    }
    }
}

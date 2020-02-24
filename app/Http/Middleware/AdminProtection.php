<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class AdminProtection
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
        if(Auth::check())
        {
            if(!Auth::user()->rights == 1){
                return redirect('/');
            }else{
                return $next($request);
            }
        }else{
            return redirect('/');
        }
    }
}

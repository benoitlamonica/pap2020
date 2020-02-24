<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Cours;
use View;

class MenuShare
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
        $menu = Cours::select('*')
                ->get();
        \View::share('menu', $menu);

        return $next($request);
    }
}

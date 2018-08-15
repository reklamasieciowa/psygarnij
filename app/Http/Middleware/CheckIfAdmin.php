<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class CheckIfAdmin
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

        if(Auth::check() && Auth::user()->hasRole(1)) {
             return $next($request);
        }

        // The user is logged in but not an admin
        if(Auth::check()) {
            $request->session()->flash('Nie masz wystarczających uprawnień.');
        }
        
        return redirect()->route('home');
    }
}

<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
<<<<<<< HEAD
    {   

        if(Auth::user()->is_admin){
            return $next($request);
        }
        return redirect('/');
=======
    {
        
    
        if(Auth::user()->is_admin){
            return $next($request); 
        }
        
        return redirect('/');
       
>>>>>>> develop
    }
}

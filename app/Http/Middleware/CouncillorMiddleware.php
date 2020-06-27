<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class CouncillorMiddleware
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
        if(Auth::guest()){
            return redirect('/')->with('message', 'Guests do not have access to dashboard');
        }  
        if (auth()->user()->userrole== 'councillor') {
                return $next($request);
            }

        return redirect('/')->with('message', 'Do not have previlage to access to Councillor Dashboard');
    }
}

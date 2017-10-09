<?php

namespace LEOCORP\Http\Middleware;

use Closure;

class AdminPages
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
	    $user = $request->user();
	    if ($user && $user->is_admin)
	    {
		    return $next($request);
	    }
	    
	    return redirect('/');
    }
}

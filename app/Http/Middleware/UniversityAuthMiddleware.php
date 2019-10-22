<?php

namespace App\Http\Middleware;

use Closure;

class UniversityAuthMiddleware
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
        if(!auth('university')->check()){
            return redirect(route('university.signin.show'));
        }
        return $next($request);
    }
}

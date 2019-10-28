<?php

namespace App\Http\Middleware;

use Closure;

class StudentAuthMiddleware
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
        if(!auth('student')->check()){
            return redirect(route('student.signin.show'));
        }
//        else{
//            if(!auth('student')->user->email_verified){
//                dd("Verification Needed");
//            }
//        }
        return $next($request);
    }
}

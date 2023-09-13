<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // $email = Frontenduser::where('email',$request->email)->first();
        // if(!$email && !Hash::check($request->password, $email->password)) {
        //     return 'not akib';
        // }else {
        //     return 'akib';
        // }
         return $next($request);
    }
}

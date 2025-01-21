<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class TeacherAuthenticationMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->session()->get('teacher') == null) {

            return redirect(to: '/teachers/login');

            
        }

        if($request->session()->get('teacher')->status==2){

            
            return redirect(to: '/teachers/login');


        }

        return $next($request);
    }
}

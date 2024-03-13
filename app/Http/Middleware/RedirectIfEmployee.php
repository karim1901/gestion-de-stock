<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfEmployee
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {


        // if($request->expectsJson()){

        //     if (Auth::user()->role === 'employee') {
        //         return redirect()->route('/');
        //     }else{
        //         return null ;
        //     }
        // }else{
        //     return redirect()->route('/');
        // }


        if (Auth::check() && Auth::user()->role === 'employee') {
            return redirect()->route('vente.index');
        }

        return $next($request);

            
    }
}

<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class ModeratorMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        

        if(!empty(Auth::check()))
        {
            return $next($request);
        }

        else
        {
            session()->flash('error', 'No Tienes permisos de administrador');

        return redirect()->route('dashboard');
        }
        
    }
}

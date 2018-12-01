<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class LogRouteMiddleware
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
        if(Auth::guest())
        {
            Log::stack(['visitantes'])->info('IP: ' . $request->ip() . ', Acessou: ' . $request->fullUrl());
        }else{
            Log::stack(['usuarios'])->info('IP: ' . $request->ip() . ', ID: ' . Auth::user()->id . ', Acessou: ' . $request->fullUrl());
        }
        return $next($request);
    }
}

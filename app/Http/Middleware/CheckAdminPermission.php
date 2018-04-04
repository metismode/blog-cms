<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Response;

class CheckAdminPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */

    public function handle($request, Closure $next,$roles)
    {
        if (!$request->user()->hasRole(explode('|', $roles)))
        {
            return new Response(view('unauthorized')->with('roles', $request->user()->hasRole(explode('|', $roles))));
        }
        return $next($request);

    }
}

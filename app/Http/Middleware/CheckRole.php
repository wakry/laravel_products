<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, string $role)
    {

        // If the user is not an Admin then show forbidden message (This would be more detailed in a real life scenario)
        if($role == 'admin' && auth()->user()->role_as != 1){
            abort(403);
        }

        return $next($request);
    }
}

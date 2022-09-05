<?php

namespace App\Http\Middleware\Role;

use Closure;
use Illuminate\Http\Request;

class UserBlocked
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        return  auth()->user()->blocked ? redirect(route('user.blocked')) : $next($request);
    }
}

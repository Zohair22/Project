<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param Request $request
     * @param mixed ...$guards
     * @return string|null
     */
    protected function redirectTo($request, ...$guards): ?string
    {
        $guards = empty($guards) ? [null] : $guards;

        if (! $request->expectsJson()) {
            return route('login');
        }

        foreach ($guards as $guard) {
            if ($guard == "admin" && Auth::guard($guard)->check()) {
                if (! $request->expectsJson()) {
                    return route('adminLogin');
                }
            }
            elseif (Auth::guard($guard)->check()) {
                if (! $request->expectsJson()) {
                    return route('login');
                }
            }
        }

    }
}

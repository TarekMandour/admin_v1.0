<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;
use Route;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        if (! $request->expectsJson()) {

            if(Route::is('admin.*')) {
                return route('admin.login');
            }
            elseif(Route::is('supervisor.*')) {
                return route('supervisor.login');
            }
            elseif(Route::is('user.*')) {
                return route('user.login');
            }
            else
            return route('index');
        }
        else
            return route('index');
    }
}

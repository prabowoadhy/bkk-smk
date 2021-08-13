<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class AlumniMiddleware extends Middleware
{
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            // return var_dump($request->expectsJson());
            return route('alumni-login');
        }
    }
}

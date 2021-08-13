<?php

namespace App\Http\Middleware;


use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class AdminMiddelware extends Middleware
{
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            // return var_dump($request->expectsJson());
            return route('admin-login');
        }
    }
}

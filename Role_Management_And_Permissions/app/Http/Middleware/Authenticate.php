<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Authenticate extends Middleware{
   
    protected function redirectTo(Request $request): ?string{
       // return $request->expectsJson() ? null : route('login');

       if (Auth::guard('admin')) {
            if (!$request->expectsJson()) {
                return route('admin.login');
            }
        } else {
            if (!$request->expectsJson()) {
                return route('login');
            }
        }
    }

  
}
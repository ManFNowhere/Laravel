<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Authenticate
{
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::check()) {
            // Menyimpan URL yang diminta sebelum mengarahkan ke login
            $request->session()->put('url.intended', $request->fullUrl());
            // dd($request->session()->pull('url.intended'));
            return redirect('/login');
        }
        return $next($request);
    }
}

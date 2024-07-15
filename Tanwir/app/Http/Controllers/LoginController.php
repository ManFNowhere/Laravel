<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class LoginController extends Controller
{
    public function index(){
        return view("users.login");
    }

    public function login(Request $request){
        $data = $request->validate([
            "email"=> "email",
            "password"=> "required"
        ]);

        if (Auth::attempt($data)) {
            $request->session()->regenerate();
            return redirect()->intended("/dashboard");
        } else {
            return back()->with('loginError', 'Login failed!');
        }
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
    
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect('/');
    }

}

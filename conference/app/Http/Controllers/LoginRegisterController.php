<?php

namespace App\Http\Controllers;

use App\Mail\UserValidationEmail;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Models\User;

class LoginRegisterController extends Controller
{
    public function indexLogin(){
        return view("login.index",["title"=>'Login']);
    }

    public function login(Request $request)
    {
        $data = $request->validate([
            'email' => ['required', 'email:dns'],
            'password' => ['required'],
        ]);
    
        if (Auth::attempt($data)) {
            $request->session()->regenerate();
            $intendedUrl = session()->pull('url.intended', '/');
    
            // Debugging: Periksa URL yang dimaksud
            // dd($intendedUrl);
    
            // Mengarahkan pengguna ke URL yang dimaksud atau ke halaman utama
            return redirect()->intended($intendedUrl);
        } else {
            return back()->with('loginError', 'Login failed!');
        }
    }
    

    public function indexRegister(){
        return view('register.index',['title'=> 'Register']);
    }

    public function validate(Request $request){
        $data = $request->validate([
            'firstName'=>['required','max:255'],
            'lastName'=>['required','max:255'],
            'email'=>['required','email:dns','unique:users'],
            'password'=>['required','min:3','confirmed']
        ]);
        $name = $data['firstName'].' '.$data['lastName'];
        $data['name'] = $name;
        $code = random_int(100000,999999);
        session()->put('dataAccount', $data);
        session()->put('codeAccount', $code);
        // delete validateError if exists
        if(session('validateError')){
            session()->forget('validateError');
        }
        Mail::to($data['email'])->send(new UserValidationEmail($name, $data['email'], $code));
        // dd($code);
        return view('register.validation',['title'=>'Validation']);
    }

    public function register(Request $request){
        $data = session('dataAccount');
        $validatedData = $request->validate([
            'code' => ['required'],
        ]);
        $code = intval( $validatedData['code']);
    
        if($code === session('codeAccount')){
            $data['password'] = bcrypt($data['password']);
            User::create($data);
            session()->forget('dataAccount');
            session()->forget('codeAccount');
            return redirect('/login')->with('success', 'Registration successful! Please login!');
        } else {
            session()->put('validateError', 'Your input key not match, see your email!');
            return view('register.validation',['title'=>'Validation'])->with('validateError','Your input key not match, see your email!');
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

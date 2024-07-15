<?php

namespace App\Http\Controllers;

use App\Mail\ActivationMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

use App\Models\User;
class RegisterController extends Controller
{
    public function index(){
        return view('register.index',['title'=>'Register']);
    }

    public function validate(Request $request){
        $data = $request->validate([
            'name'=>['required','max:255'],
            'email'=>['required','email:dns','unique:users'],
            'password'=>['required','min:3','confirmed']
        ]);
        $code = random_int(100000,999999);
        session()->put('dataAccount', $data);
        session()->put('codeAccount', $code);
        // delete validateError if exists
        if(session('validateError')){
            session()->forget('validateError');
        }
        Mail::to($data['email'])->send(new ActivationMail($data['name'], $data['email'], $code));
        // dd($code);
        return view('register.validate',['title'=>'Validation']);
    }

    public function store(Request $request){
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
            return view('register.validate',['title'=>'Validation'])->with('validateError','Your input key not match, see your email!');
        }
    }
    

}

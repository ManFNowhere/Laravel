<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Profile;

class ProfileController extends Controller  
{
    public function index(){
        return view('profile',['title'=>'Profile']);
    }

    public function update(Request $request){
        $data = $request->validate([
            'name'=>['required','max:255'],
            'email'=>['required']
        ]);
        Profile::updateName($data);

        return redirect('/profile')->with('updateSaved','Youre name updated!');
        
    }
}

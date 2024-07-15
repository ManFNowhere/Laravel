<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Code;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index(){
        return view("user.setting",['title'=>'Setting']);
    }

    public function update(Request $request){
        $data = $request->all();
        // dd($data);

        if(DB::update('update users set name = ? where email = ?', [$data['name'], $data['email']])){
            return redirect('/setting')->with('updateUserSuccess','Youre name updated!');
        }else{
            return back()->with('updateUserFailed','Updating your name error!');
        }
    }
    public function updateRoleIndex(){
        return view('user.role',['title'=> 'Become Speaker']);
    }
    public function updateRole(Request $request){
        $inputCode = intval($request->code);
        $code = Code::find(1)->code;
        // dd($code);
        if($inputCode === $code){
            DB::update('update users set role = ? where email = ?', [2,auth()->user()->email]);
            return redirect('/dashboard')->with('updateRoleSuccess','Now youre listed as speker!');
        }else{
            return back()->with('updateRoleError','Wrong speaker code!');
        }

    }
}

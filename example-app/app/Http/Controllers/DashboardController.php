<?php

namespace App\Http\Controllers;

use App\Models\Weather;
use Illuminate\Http\Request;
use \App\Models\Post;

class DashboardController extends Controller
{
    public function index(){
        $table = Weather::where("user_id", auth()->user()->id)->get();
        $posts = Post::where('user_id', auth()->user()->id)->latest()->get();  
        // dd($table);
        return view('dashboard',['title'=> 'Dashboard', 'posts'=> $posts,'tables'=>$table]);
    }
}

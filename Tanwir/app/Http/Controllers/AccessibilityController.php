<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AccessibilityController extends Controller
{
    public function index(){
        return view('accessibility.index');
    }

    public function navbar(){
        return view('accessibility.navbar');
    }
    public function form(){
        return view('accessibility.form');
    }
}

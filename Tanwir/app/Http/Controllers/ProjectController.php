<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index(){
        $data = Project::latest()->get();
        return view("projects.index", ['data'=>$data]);
    }
}

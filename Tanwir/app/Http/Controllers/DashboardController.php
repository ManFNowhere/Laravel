<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Tutorial;
use Illuminate\Http\Request;


use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(){
        Auth::attempt(['email' => 'tanwirkhalid.m@gmail.com', 'password' => 'test']);

        $project = Project::all();
        $tutorial = Tutorial::all();
        return view("users.dashboard", ['project'=>$project, 'tutorial'=>$tutorial]);
    }


    public function addProject(){
        $data = [];
        return view("users.add",['data'=>$data]);
    }

    public function storeProject(Request $request){
        $data = $request->validate(
            [
                'title' => ['required','unique:projects,title'],
                'url' => ['required'],
                'type' =>[ 'required']
            ]
        );
        $data['slug'] = str_replace(' ','_',$data['title']);
        Project::create($data);
        return redirect("dashboard");
    }

    public function editProject($slug){
        $data = Project::where('slug',$slug)->get();

        return view('users.add',['data'=>$data]);
    }

    public function updateProject(Request $request){
        $data = $request->validate(
            [
                'title' => ['required'],
                'url' => ['required'],
                'type' =>[ 'required']
            ]
        );
        $data['slug'] = str_replace(' ','_',$data['title']);
        if($data['slug']== $request->oldSlug){
            Project::where("slug",$data['slug'])->update(['url'=>$request->url,"type"=>$request->type]);
            return redirect("dashboard");
        }else{
            Project::where('slug',$request->oldSlug)->delete();
            Project::create($data);
            return redirect("dashboard");
        }
        
    }

    public function deleteProject($slug){
        Project::where('slug', $slug)->delete();
        return redirect("dashboard");
    }
}

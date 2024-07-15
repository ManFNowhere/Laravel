<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Tutorial;
use Illuminate\Http\Request;

class TutorialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        $category = Category::all();
        $tutorial = Tutorial::all();
        return view('tutorial.index', ['categories'=>$category, 'tutorials'=>$tutorial]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tutorial.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required',
            'category' => 'required',
            'body' => 'required',
        ]);
   
        $category = Category::where('Category', $data['category'])->first();
        if(!$category){
            Category::create(['Category'=>$data['category']]);
            $category = Category::where('Category', $data['category'])->first();
        }
        $data['slug'] = str_replace(' ','_',strtolower($data['title']));
        $data['category_id'] = $category->id;
        Tutorial::create($data);
        // redirect to Dashboard
        return redirect('/dashboard');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Tutorial::find($id);
        return view('tutorial.show',['data'=>$data]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Tutorial::find($id);
        return view('tutorial.edit', ['data'=>$data]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validate incoming request data
        $data = $request->validate([
            'title' => 'required',
            'category' => 'required',
            'body' => 'required',
        ]);
        $tutorial = Tutorial::find($id);
        $category = Category::where('Category', $data['category'])->first();
        if(!$category){
            Category::create(['Category'=>$data['category']]);
            $category = Category::where('Category', $data['category'])->first();
        }
        $data['slug'] = str_replace(' ', '_', strtolower($data['title']));
        $data['category_id'] = $category->id;
        $tutorial->update($data);
        return redirect('/dashboard');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $tutorial = Tutorial::find($id);
        $tutorial->delete();
        return redirect('/dashboard');
    }

    public function colorContrast(){
        return view('tutorial.colorContrast', ['data'=>'Color Contrast']);
    }

    public function test(){
        return view('tutorial.test', ['data'=>'Test']);
    }
}

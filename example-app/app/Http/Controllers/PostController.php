<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Post;

class PostController extends Controller
{
    public function index(){
        return view('posts.index',['title'=>'Articles','posts'=>Post::latest()->get()]);
    }

    public function post(Post $post){
        return view('posts.post', ['title' => 'Single', 'post' => $post]);
    }
    
    
    public function create(){
        return view('posts.create',['title'=>'Create Post']);
    }

    public function upload(Request $request){
        $data = $request->validate([
            'title'=> 'required|max:255',
            'body' => 'required',
            'image' => 'image|file|max:2048',
        ]);
        
        $slug = str_replace(' ', '-', strtolower($request->title));
        $author = auth()->user()->id;
        $words = str_word_count($request->body, 1);
        $shortTextArray = array_slice($words, 0, 50);
        $shortText = implode(' ', $shortTextArray);
        
        if($request->file('image') != null){
            $image = $request->file('image')->store('post-image');
        }

        $dataStore = [
                'title'=> $request->title,
                'slug'=> $slug,
                'short_text'=> $shortText,
                'body'=> $request->body,
                'image'=> $image,
                'user_id'=> $author,
        ];
        Post::create($dataStore);
        
        return redirect('/posts')->with('articleUploaded','Your article successfully uploaded!');
    }
    

    public function delete($slug){
        $post = Post::where('slug', $slug)->first();
        $title = $post->title;
        $post->delete();
        return redirect('/dashboard')->with('postDeleted','Post '.$title.' deleted!');
    }

    public function update($slug){
        $data = Post::where('slug', $slug)->first();
        dd($data);
    }
}

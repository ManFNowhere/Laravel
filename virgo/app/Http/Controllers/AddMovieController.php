<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use App\Models\Movie;

class AddMovieController extends Controller
{   
    public function index(){
        return view("movie.add");
    }

    public function get(Request $request){
        $api = 'https://api.themoviedb.org/3/search/movie?query=';
        $key='api_key=420d15c62b17c7d234324e44cc5b0000';
        $title = str_replace(' ','+',$request->title);
    
        $get = Http::get($api.$title."&".$key)->json();
        $data = $get['results'];
        
        $request->session()->put('movie_data', $data);
        if ($request->ajax()) {
            return response()->json($data);
        }
    
    }

    public function store(Request $request){
        $id = $request->movieId;
        $type = $request->type;
        $data = $request->session()->get('movie_data');
        if($request->file('trailer') != null){
            $trailer = $request->file('trailer')->store('trailer','public');
        }
        if($request->file('movie') != null){
            $video = $request->file('movie')->store('movie','public');
            
        }
        // dd($file);
        foreach ($data as $d) {
            if($d['id']== $id){
                dump($id);
                dump($d);
                dump($d);
                $movie['movie_id'] = $d['id'];
                $movie['title'] = $d['title'];
                $movie['slug'] = str_replace(' ','-',$d['title']);
                $movie['overview'] = $d['overview'];
                $movie['cover'] = $d['poster_path'];
                $movie['release_date'] = $d['release_date'];
                $movie['genre'] = implode(',', $d['genre_ids']); 
                $movie['vote'] = $d['vote_average'];
                $movie['movie'] = "/storage/".$video;
                $movie['trailer'] = "/storage/".$trailer;
                $movie['type'] = $type;
            }
        }
        Movie::create($movie);
        // return redirect()->route('add.movie')->with('successAddMovie','Movie '.$id.' succesfully added!');
    }
    
}

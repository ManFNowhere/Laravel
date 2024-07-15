<?php

namespace App\Http\Controllers;
use App\Models\Watched;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

use App\Models\Movie;
use App\Models\Genre;

class MovieController extends Controller
{
    public function index($slug){
        $movie = Movie::where("slug", $slug)->first();
        $genreIds = explode(',', $movie['genre']);
        $genre = [];
        foreach($genreIds as $genreId) {
            $get=Genre::where('id_genre', $genreId)->first();
            $genre[$genreId] = $get['genre'] ;
        }


         // get credit
         $url = "https://api.themoviedb.org/3/movie/".$movie['movie_id']."/credits?language=en-US";

         $options = [
             'http' => [
                 'header' => "Authorization: Bearer eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiI0MjBkMTVjNjJiMTdjN2QyMzQzMjRlNDRjYzViMDAwMCIsInN1YiI6IjY2NTcyNDRhMDZiZjY4N2E2N2E4YjNiYyIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.zJR-YkkdzbcISwR07-v88I50cSLkAlbNawSm4mmH53Q\r\n",
                 'method' => 'GET',
             ],
         ];
         
         $context = stream_context_create($options);
         $response = file_get_contents($url, false, $context);
         
         if ($response === false) {
             echo "Failed to fetch data from the API.";
         } else {
             $credit = json_decode($response, true);
         
             $cast = [];
             $count = 0;
             foreach ($credit["cast"] as $cr) {
                 $cast[] = [
                     'id' => $cr['id'],
                     'name' => $cr['name'],
                     'character' => $cr['character'],
                     'profile_path' => $cr['profile_path'],
                 ];
                 $count++;
                 if ($count >= 6) {
                     break;
                 }
             }
         
             $crew = [];
             foreach ($credit["crew"] as $cr) {
                 $crew[] = [
                     'id' => $cr['id'],
                     'name' => $cr['name'],
                     'job' => $cr['job'],
                 ];
             }
        
         }
         
        return view("movie.movie", ['data'=>$movie, 'genre'=>$genre, 'cast'=> $cast,'crew'=>$crew]);

    }

    public function show($slug){
        if($slug=='new-release'){
            $lable = 'New Relase';
            $data = Movie::latest()->get();
        }else if($slug=='free'){
            $lable = 'Top free movie';
            $data = Movie::where("type",1)->orderBy('watched')->get();
        }else if($slug=='watched'){
            $lable = 'Top watch';
            $data = Movie::orderBy('watched')->get();
        }
        return view('movie.short',['lable'=>$lable,'data'=>$data ]);
    }

    public function watch($slug)
    {
        $movie = Movie::where('slug', $slug)->firstOrFail();
        $userRole = auth()->user()->role;
    
        if ($movie->type == 2 && $userRole != 1) {
            return view('subscription');
        }
       
        // check watch
        $watch = Watched::where('user_id',auth()->user()->id)->where('movie_id', $movie->id)->get();
        if(count($watch) == 0){
            Movie::where('id', $movie->id)->update(array('watched'=>$movie->watched+1));
            Watched::create(['user_id'=>auth()->user()->id,'movie_id'=>$movie->id]);
        }
        return view('movie.watch', ['url' => $movie->movie]);
    }
    
    public function search(Request $request){
        $search = $request->search;
        $data = Movie::where('title','like',"%$search%")->get();

        return view('movie.search',['search'=> $request->search,'movies'=> $data ]);
    }
}

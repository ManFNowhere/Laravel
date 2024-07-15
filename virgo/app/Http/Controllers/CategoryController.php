<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Models\Movie;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
   
    public function index() {
        $movies = Movie::latest()->get();
        $genre = [];
    
        foreach ($movies as $movie) {
            $id_genre = explode(',', $movie['genre']);
            foreach ($id_genre as $mgenre) {
                $genre[] = $mgenre;
            }
        }
        $uniqueGenres = array_unique($genre);
        foreach ($uniqueGenres as $g) {
            $dataGenre[] = Genre::where('id_genre', $g)->first();
        }
        return view("movie.category",['genre'=> $dataGenre,'movies'=>$movies]);
    }
}

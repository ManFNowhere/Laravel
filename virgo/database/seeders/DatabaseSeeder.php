<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\Http;
use App\Models\Movie;
use App\Models\Genre;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        for( $i = 0; $i < 10; $i++ ) {
            User::factory()->create([
                'name' => 'Test User '.$i,
                'email' => 'test'.$i.'@example.com',
                'email_verified_at' => null,
                'password' => bcrypt('test'),
            ]);
        }
        User::create([
            'name' => 'Tannwir Khalid',
            'email' => 'tma@webmen.de',
            'email_verified_at' =>  Carbon::now()->timestamp,
            'password' => bcrypt('123123123'),
        ]);
        User::create([
            'name' => 'Test Vrlix',
            'email' => 'vrlix@webmen.de',
            'email_verified_at' =>  Carbon::now()->timestamp,
            'password' => bcrypt('123123123'),
        ]);

        // generate genre movie
        $url = 'https://api.themoviedb.org/3/genre/movie/list?language=en';
        
        $options = [
            'http' => [
                'header' => "Authorization: Bearer eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiI0MjBkMTVjNjJiMTdjN2QyMzQzMjRlNDRjYzViMDAwMCIsInN1YiI6IjY2NTcyNDRhMDZiZjY4N2E2N2E4YjNiYyIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.zJR-YkkdzbcISwR07-v88I50cSLkAlbNawSm4mmH53Q\r\n",
                'method' => 'GET',
            ],
        ];
        
        $context = stream_context_create($options);
        $response = file_get_contents($url, false, $context);
        
        if ($response === false) {
            // Handle error
            echo "Failed to fetch data from the API.";
        } else {
            $genresData = json_decode($response, true)['genres'];
            
            // Loop through each genre data and create a genre record
            foreach ($genresData as $genreData) {
                // Create a new Genre model instance
                $genre = new Genre();
                
                // Map the data from the API to the Genre model attributes
                $genre->id_genre = $genreData['id'];
                $genre->genre = $genreData['name'];
                
                // Save the genre record to the database
                $genre->save();
            }
        }
        
        

        for($i=1;$i<=5;$i++){
            Movie::create(
                [
                    "movie_id" => 142061,
                    "title" => "Batman: The Dark Knight Returns, Part ".$i,
                    "slug" => "batman:-the-dark-knight-returns,-part-".$i,
                    "overview" => "Batman has stopped the reign of terror that The Mutants had cast upon his city.  Now an old foe wants a reunion and the government wants The Man of Steel to put a stop Batman.",
                    "cover" => "/arEZYd6uMOFTILne9Ux0A8qctMe.jpg",
                    "release_date" => "2013-01-03",
                    "genre" => "27,36",
                    "vote" => "7.911",
                    "movie" => "/storage/movie/film.mp4",
                    "trailer" => "/storage/trailer/trailer.mp4",
                    "type" => 1,
                    "watched" => 0,
                ]
            );
        }
    }
}

@extends('layouts.app')

@section('container')

<section>
@include('modals.play')
    <div id="body-section" class="flex">
        <div class="flex flex-col lg:items-start lg:flex-row p-2 lg:p-10 lg:m-20 mb-20 bg-gray-800 m-10 rounded">
        <img src="{{ 'https://image.tmdb.org/t/p/w500/'.$data['cover'] }}" alt="{{ $data['title'] }}">    
            <div class="lg:mx-5 lg:w-2/3 md:5/6">
                <h1 class="text-white text-2xl font-bold">{{ $data['title'] }}</h1>
                <div class="flex flex-row w-fit">
                    <a href="/watch/{{$data['slug']}}" class="mx-auto bg-blue-700 text-white p-2 rounded">Watch</a>
                    <button id="play" class="bg-yellow-400 text-white p-2 rounded mx-4">Trailer</button>
                </div>
                <div class="flex justify-between lg:my-5"> 
                    <p class="text-white">Release : {{ $data['release_date'] }}</p>
                    <p class="text-white">Rating : {{ $data['vote'] }}</p>
                </div>
                <hr class="md:hidden">
                <p class="text-white text-sm">{{ $data['overview'] }}</p>
                <hr class="md:hidden">
                <p class="text-white lg:my-5">Genres:
                    @foreach ($genre as $g)
                        <a href="" class="font-bold">{{ $loop->first ? $g : ', '.$g }}</a>
                    @endforeach
                </p>
                <div class="flex flex-col mt-10 bg-gray-900 p-5 rounded">
                    <h1 class="text-white font-bold text-2xl mb-5">Cast</h1>
                    <div class="flex flex-col md:flex-row md:flex-wrap md:justify-center ">
                    @foreach ($cast as $c)
                        <div class="w-full flex items-center my-2 p-4 rounded bg-gray-800 md:w-2/3 md:max-w-xs md:mx-2">
                            <img src="https://image.tmdb.org/t/p/w92/{{ $c['profile_path'] }}" class="w-1/4 rounded-full" alt="{{ $c['name'] }}">
                            <div class="flex flex-col mx-4 w-3/4">
                                <h1 class="text-white font-bold text-lg">{{ $c['name'] }}</h1>
                                <p class="text-gray-300">{{ $c['character'] }}</p>
                            </div>
                        </div>
                    @endforeach
                    </div>
                </div>

                <div class="hidden md:flex flex-col mt-10">
                    <h1 class="text-white font-bold">Crew</h1>
                    <hr>
                    <div class="flex flex-row flex-wrap">
                    @foreach ($crew as $c)
                       
                            <div class="flex flex-row my-2">
                                <h1 class="text-white font-bold">{{ $c['name'] }}</h1>
                                <p class="text-white mx-4" >{{ $c['job'] }}</p>
                            </div>
                      
                    @endforeach
                    </div>
                </div>  


            </div>
        </div>
    </div>


    <script>
        document.addEventListener("DOMContentLoaded", function(){
            const playButton = document.getElementById('play');
            const playModal = document.getElementById('play-modal');
            const exitButton=document.getElementById('exit-button');
            const movieBody =document.getElementById('body-section');
            const navbar =document.getElementById('navbar');
            const navbarms =document.getElementById('navbar-ms');
            playButton.addEventListener('click', function(event){
                playModal.classList.toggle('hidden');
                movieBody.classList.add('hidden');
                navbar.classList.add('lg:hidden');
                navbarms.classList.add('hidden');
            });
            exitButton.addEventListener('click', function(event){
                playModal.classList.toggle('hidden');
                movieBody.classList.toggle('hidden');
                navbar.classList.toggle('lg:hidden');
                navbarms.classList.toggle('hidden');
            });


           
        });

    </script>
</section>

@endsection

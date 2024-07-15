@extends('layouts.app')

@section('container')

<section id="body-section" class="block w-full mb-20">
    <!-- banner -->
    <div class="w-full max-h-10 lg:max-h-60">
        <video id="banner" class="w-full content-cover z-0" autoplay loop muted>
            <source src="{{$data[0]->trailer}}" type="video/mp4">
            Your browser does not support the video tag.
        </video>
    </div>
    <!-- credit banner -->
    <div class="xl:w-1/2 mb-10 lg:mb-20 relative z-20 mx-10 h-full">
        <h1 class="text-white text-2xl font-bold lg:text-8xl mb-8 md:mb-0">{{$data[0]->title}}</h1>
        <h1 class="text-white hidden md:block text-lg lg:text-xl mb-8">{{$data[0]->overview}}</h1>
        <a href="/watch/{{ $data[0]->slug }}" class="text-white text-2xl mx-auto border p-2 rounded">Watch</a>
    </div>
    
    <!-- new lerease -->
    <div class="bottom-0 left-0 w-full bg-black bg-opacity-50 p-4 justify-center flex flex-col">
        <h1 class="text-white text-4xl mb-4">New release</h1>
        <div style=" 
-webkit-scrollbar {
  display: none;
}
  -ms-overflow-style: none; 
  scrollbar-width: none; 
        " class="flex lg:flex-nowrap flex-row items-center text-center justify-between overflow-x-auto lg:space-x-4 lg:pb-4 lg:my-4 mx-2 lg:mx-8">
            @foreach ($data->skip(1) as $movie)
            @include('components.card')
            @endforeach
            <a href="/show/new-release" class="text-white text-2xl mx-auto border p-2 rounded">See more</a>
        </div>  
    </div>

    <!-- top free movie -->
    <div class="bottom-0 left-0 w-full bg-black bg-opacity-50 p-4 justify-center flex flex-col">
        <h1 class="text-white text-4xl mb-4">Top free movie</h1>
        <div style=" 
-webkit-scrollbar {
  display: none;
}
  -ms-overflow-style: none; 
  scrollbar-width: none; 
        " class="flex lg:flex-nowrap flex-row items-center text-center justify-between overflow-x-auto lg:space-x-4 lg:pb-4 lg:my-4 mx-2 lg:mx-8">
           @foreach ($free as $movie)
            @include('components.card')
            @endforeach
            <a href="/show/free" class="text-white text-2xl mx-auto border p-2 rounded">See more</a>
        </div>  
    </div>


    <!-- top watch -->
    <div class="bottom-0 left-0 w-full bg-black bg-opacity-50 p-4 justify-center flex flex-col">
        <h1 class="text-white text-4xl mb-4">Top watch</h1>
        <div style=" 
-webkit-scrollbar {
  display: none;
}
  -ms-overflow-style: none; 
  scrollbar-width: none; 
        " class="flex lg:flex-nowrap flex-row items-center text-center justify-between overflow-x-auto lg:space-x-4 lg:pb-4 lg:my-4 mx-2 lg:mx-8">
            @foreach ($watch as $movie)
            @include('components.card')
            @endforeach
            <a href="/show/watched" class="text-white text-2xl mx-auto border p-2 rounded">See more</a>
        </div>  
    </div>

</section>

<script>
    const video = document.getElementById('banner');

    // Set clip start and end times in seconds
    const clipStartTime = 50;
    const clipEndTime = 100;

    // Function to play the clip
    function playClip() {
        video.currentTime = clipStartTime;
        video.play();
    }

    playClip();

    // Automatically pause at end time using an event listener
    video.addEventListener('timeupdate', function () {
        if (video.currentTime >= clipEndTime) {
            video.pause();
        }
    });

</script>


@endsection
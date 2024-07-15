@extends('layouts.app')

@section('container')

<div id="body-section" class="bg-gray-900 z-100 fixed">
    <video id="movie-watch" class="lg:w-3/4 lg:mt-24 p-2 mx-auto my-20" controls autoplay>
            <source src="{{$url}}" type="video/mp4">
            Your browser does not support HTML5 video.
        </video>
</div>




@endsection
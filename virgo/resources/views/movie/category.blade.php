@extends('layouts.app')


@section('container')
<div class="pt-16" id="body-section">
    @foreach ($genre as $g )
    <div class="bottom-0 left-0 w-full bg-gray-900 bg-opacity-50 p-4 justify-center flex flex-col">
        <h1 class="text-white text-xl mb-4 border-b-2 border-gray-700">{{ $g->genre }}</h1>
        <div style=" 
-webkit-scrollbar {
  display: none;
}
  -ms-overflow-style: none; 
  scrollbar-width: none; 
        " class="flex lg:flex-nowrap flex-row items-center text-center justify-between overflow-x-auto lg:space-x-4 lg:pb-4 lg:my-4 mx-2 lg:mx-8">
    
            @foreach ($movies as $movie)
                @php
                    $movieGenres = explode(',', $movie['genre']);
                @endphp
                @foreach ($movieGenres as $mg )
                    @if ($g->id_genre==$mg)
                        @include('components.card')
                    @endif
                @endforeach
            @endforeach     

        </div>  
    </div>
    @endforeach
</div>

@endsection
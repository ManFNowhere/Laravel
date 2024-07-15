@extends('layouts.app')

@section('container')

<div id="body-section" class="p-10 text-center bg-gray-800 w-5/6 mx-auto my-20 rounded-lg">
    <h1 class="text-white text-2xl font-bold">Result for : {{$search}}</h1>
    <hr >
    <div class="flex flex-row flex-wrap justify-center">
        @if (count($movies) >0)
            <div class="mt-5">
                @foreach ($movies as $movie )
                    @include('components.card')
                @endforeach
            </div>
        @else  
            <h1 class="text-white text-xl font-bold my-20">Movie not found</h1>
        @endif
    
    </div>
</div>


<script>
    navbar =document.getElementById('navbar');
    navbar.classList.remove('fixed');
</script>
@endsection
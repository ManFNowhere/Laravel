@extends('layouts.app')


@section('container')
<div class="pt-16">
    <div class="bottom-0 left-0 w-full bg-black bg-opacity-50 p-4 justify-center text-center flex flex-col">
        <h1 class="text-white text-4xl mb-4 border-b-2 border-gray-700">{{ $lable }}</h1>
        <div class="flex  items-center text-center  lg:space-x-4 lg:pb-4 lg:my-4 mx-2 lg:mx-8">        
            <div class="flex flex-row flex-wrap justify-evenly ">
                @foreach ($data as $movie)
                    @include('components.card')
                @endforeach
            </div>
        </div>  
    </div>
</div>

@endsection
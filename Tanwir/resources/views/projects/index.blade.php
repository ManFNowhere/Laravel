@extends('layouts.app')


@section('container')
<div class="flex flex-col items-center">
    <h1 class="text-2xl text-gray-300 font-bold font-pop">Projects</h1>
    <hr class="w-48 font-bold bg-yellow-500 h-1 border-0 rounded">
    <div class="flex flex-row flex-wrap justify-evenly w-full my-10">
       @foreach ($data as $d)
        @include('partials.card')
       @endforeach
    </div>
</div>
@endsection
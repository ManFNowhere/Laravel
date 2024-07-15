@extends('layouts.app')

@section('container')

<section class="flex flex-col-reverse justify-between md:flex-row w-full min-h-svh">
    <aside class="md:w-1/6 p-4 pt-10 bg-gray-800 rounded text-center">
        <x-link-button link="{{route('tutorial.index')}}" text="Back to tutorial" ></x-link-button>
    </aside>

    <div class="md:w-5/6 min-h-svh bg-gray-900 p-4">
        <x-text-h1 text="{{$data->title}}"/>
        {!! $data->body !!}
    </div>
</section>
@endsection
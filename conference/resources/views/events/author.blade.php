@extends('layouts.main')

@section('container')

<section class="bg-gray-50 dark:bg-gray-900">
    <div class="flex flex-col items-center bg-gray-800 mx-4 md:mx-28 mt-12 px-8 py-8 rounded-lg">
        <h5 class="my-3 text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">    
            
        </h5>
        @if($data && $data->count() > 0)
            <div class="flex flex-row justify-evenly flex-wrap">
                @foreach ($data as $d)
                    @include('partials.card')
                @endforeach
            </div>
        @else
            <h1 class="my-3 text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                No events
            </h1>
        @endif
        <hr class="w-full h-1 mx-auto my-4 bg-gray-100 border-0 rounded md:my-10 dark:bg-gray-700">
    </div>
</section>

@endsection

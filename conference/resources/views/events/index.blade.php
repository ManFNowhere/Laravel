@extends('layouts.main')

@section('container')

<section class="bg-gray-50 dark:bg-gray-900">
    <div class="flex flex-col items-center bg-gray-800 mx-4 md:mx-28 mt-12 px-8 py-8 rounded-lg">
        <form action="events" class="w-full mx-auto">   
            <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
            <div class="relative">
                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                    </svg>
                </div>
                <input type="search" name="search" id="default-search" class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search Event or Speaker" value="{{request('search')}}" required/>
                <button type="submit" class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
            </div>
        </form>

        @if($data && $data->count() > 0)
            <div class="flex flex-col w-full items-center ">
                <a href="/event/{{$data[0]->slug}}" class="my-4 mx-4 block w-full h-80 p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700" style="background-image: url({{ ($data[0]->cover) ? '/storage/'.$data[0]->cover : 'https://source.unsplash.com/1900x900/?random' }}); background-size: cover;">
                    <div class="text-center pt-40">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $data[0]->title }}</h5>
                        <h4 class="mb-2 text-l font-bold tracking-tight text-gray-900 dark:text-white">Speaker: {{ $data[0]->user->name }}</h4>
                    </div>
                </a>
            </div>
            <div class="w-full flex flex-col md:flex-row justify-center lg:justify-between text-center flex-wrap">
                @foreach ($data->skip(1) as $d)
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

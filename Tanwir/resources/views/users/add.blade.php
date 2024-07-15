@extends('layouts.app')


@section('container')

<div class="flex flex-col items-center bg-gray-900 p-2 rounded min-h-svh">
    @error('title')
        @include('partials.error')
    @enderror
    @error('url')
        @include('partials.error')
    @enderror
    @error('type')
        @include('partials.error')
    @enderror
    <h1 class="text-xl text-white font-bold font-pop">Add project</h1>
    @if (count($data)>0)
    <form action="/update-project" method="post" class="w-full flex flex-col items-center">
        @csrf
        @foreach ($data as $d )

            <div class="w-1/2 my-2">
                <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Project title</label>
                <input value="{{$d->title}}" type="text" id="title" name="title" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-yellow-500 focus:border-yellow-500 block w-full p-2.5" placeholder="Title project" required />
            </div>
            <div class="w-1/2 my-2">
                <label for="url" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Project url</label>
                <input value="{{$d->url}}" type="text" id="url" name="url" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-yellow-500 focus:border-yellow-500 block w-full p-2.5" placeholder="Title url" required />
            </div>
            <div class="w-1/2 my-2">
                <label for="type" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Project type</label>
                <input value="{{$d->type}}" type="text" id="type" name="type" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-yellow-500 focus:border-yellow-500 block w-full p-2.5" placeholder="Title type" required />
            </div>
            <div class="w-1/2 my-2 hidden">
                <label for="oldSlug" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Project type</label>
                <input value="{{$d->slug}}" type="text" id="oldSlug" name="oldSlug" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-yellow-500 focus:border-yellow-500 block w-full p-2.5" placeholder="Title type" required />
            </div>
            
        @endforeach
        <button type="sumbit" class="text-lg text-white font-pop bg-yellow-500 p-2 rounded hover:bg-yellow-400">Update</button>
    </form>     
    @else
    <form action="/store-project" method="post" class="w-full flex flex-col items-center">
    @csrf
            <div class="w-1/2 my-2">
                <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Project title</label>
                <input value="{{old('title')}}" type="text" id="title" name="title" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-yellow-500 focus:border-yellow-500 block w-full p-2.5" placeholder="Title project" required />
            </div>
            <div class="w-1/2 my-2">
                <label for="url" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Project url</label>
                <input value="{{old('url')}}" type="text" id="url" name="url" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-yellow-500 focus:border-yellow-500 block w-full p-2.5" placeholder="Title url" required />
            </div>
            <div class="w-1/2 my-2">
                <label for="type" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Project type</label>
                <input value="{{old('type')}}" type="text" id="type" name="type" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-yellow-500 focus:border-yellow-500 block w-full p-2.5" placeholder="Title type" required />
            </div>
        <button type="sumbit" class="text-lg text-white font-pop bg-yellow-500 p-2 rounded hover:bg-yellow-400">Store</button>
    </form>           
    @endif
</div>

@endsection
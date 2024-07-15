@extends('layouts.app')


@section('container')

<div class="flex flex-col items-center bg-gray-900 p-2 rounded">
    @error('title')
      @include('partials.error')
    @enderror
    @error('category')
      @include('partials.error')
    @enderror
    @error('body')
      @include('partials.error')
    @enderror
    <h1 class="text-xl text-white font-bold font-pop">Edit Tutorial</h1>
    <form action="{{route('tutorial.update', ['tutorial'=>$data->id])}}" method="POST" class="w-full flex flex-col items-center">
        @csrf
        @method('PUT')
            <div class="w-full my-2">
                <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tutorial title</label>
                <input value="{{old('title', $data->title)}}" type="text" id="title" name="title" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-yellow-500 focus:border-yellow-500 block w-full p-2.5"  required />
            </div>
            <div class="w-full my-2">
                <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category</label>
                <input value="{{old('category', $data->category->Category)}}" type="text" id="category" name="category" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-yellow-500 focus:border-yellow-500 block w-full p-2.5" required />
            </div>
            <div class="w-full my-2">
                <label for="body" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Project type</label>
                <textarea id="body" name="body" class="bg-gray-50 border min-h-svh border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-yellow-500 focus:border-yellow-500 block w-full p-2.5" required>
{{old('body', $data->body)}}
                </textarea>
            </div>
        <x-primary-button text="Store" />
    </form>     

@endsection
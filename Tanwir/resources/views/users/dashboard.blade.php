@extends('layouts.app')

@section('container')
<div class="min-h-svh">

    <div class="bg-gray-900 text-center p-2 mx-4 rounded ">
        <x-text-h1 text="Projects" />
        <div class="flex flex-col mt-4">
        @if (count($project) > 0)
            @foreach ($project as $d )
                <div class="flex flex-row justify-between bordered border-2 border-yellow-500 p-2 rounded my-2">
                    <x-text-h2 text="{{ $d->title }}" />
                    <div>
                        <a href="/edit-project/{{ $d->slug }}" class="bg-green-500 text-white text-xl p-1 rounded hover:bg-green-400"><i class="fa-solid fa-pen-to-square"></i></a>
                        <a href="/delete-project/{{ $d->slug }}" class="bg-red-500 text-white text-xl p-1 rounded hover:bg-red-400"><i class="fa-solid fa-trash"></i></a>
                    </div>
                </div>
            @endforeach
        @else
            <x-text-h1 text="No project yet!" />
        @endif
        <x-link-button link="/add-project" text="Add Project" />
        </div>
    </div>
    <div class="bg-gray-900 text-center p-2 mx-4 my-10 rounded">
        <x-text-h1 text="Tutorial" />
        <div class="flex flex-col mt-4">
        @if (count($tutorial) > 0)
            @foreach ($tutorial as $t )
                <div class="flex flex-row items-center justify-between bordered border-2 border-yellow-500 p-2 rounded my-2">
                    <div class="w-1/2 text-left"><x-text-h2 text="{{ $t->title }}" /></div>
                    <div class="w-2/6 text-left"><x-text-h2 text="{{ $t->category->Category }}" /></div>
                    <div class="flex flex-row w-1/6 justify-end">
                        <a href="{{ route('tutorial.edit', ['tutorial'=>$t->id]) }}" class="bg-green-500 text-white text-xl mx-2 p-1 rounded hover:bg-green-400"><i class="fa-solid fa-pen-to-square"></i></a>
                        <form action="{{ route('tutorial.destroy', ['tutorial' => $t->id]) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this tutorial?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white text-xl p-1 rounded hover:bg-red-400"><i class="fa-solid fa-trash"></i></button>
                        </form>    
                    </div>
                </div>
            @endforeach
        @else
            <x-text-h1 text="No Tutorial yet!" />
        @endif
        <x-link-button link="{{route('tutorial.create')}}" text="Add Tutorial" />
        </div>
    </div>

</div>
@endsection
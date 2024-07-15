@extends('layouts.app')

@section('container')

<section class="flex flex-col-reverse justify-between md:flex-row w-full min-h-svh">
    <aside class="md:w-1/6 p-4 bg-gray-800 rounded">
        <x-text-h2 text="Category" />
        <ul class="text-white">
            @foreach ($categories as $category)
                <li id="{{ $category->Category }}" class="category-item hover:bg-gray-700 p-2">
                    <a href="#{{ $category->Category }}">{{ $category->Category }}</a>
                </li>
            @endforeach
        </ul>
    </aside>

    <div id="tutorial-sections" class="md:w-5/6 p-2">
        @foreach ($categories as $index => $category)
            <div id="{{ $category->Category }}-body" class="category-body w-full my-2 {{ $index == 0 ? '' : 'hidden' }} flex flex-col items-center">
                <x-text-h1 text="Tutorial {{ $category->Category }}"></x-text-h1>
                <div class="flex flex-col md:flex-row justify-center">
                    @foreach ($tutorials as $tutorial)
                        @if ($tutorial->category->Category == $category->Category)
                            <div class="mx-4 md:m-4">
                                <a href="{{ route('tutorial.show', ['tutorial'=>$tutorial->id]) }}">
                                    <div class="p-1 rounded md:m-2 hover:bg-gradient-to-b from-yellow-500 to-black">
                                        <div class="bg-gray-700 p-5 rounded w-60 text-center h-fit">
                                            <x-text-h2 text="{{ $tutorial->title }}" />
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>

    <script>
        // JavaScript to handle category toggle
        document.addEventListener('DOMContentLoaded', function () {
            const categoryItems = document.querySelectorAll('.category-item');
            const categoryBodies = document.querySelectorAll('.category-body');

            categoryItems.forEach((item, index) => {
                item.addEventListener('click', () => {
                    // Hide all category bodies
                    categoryBodies.forEach(body => {
                        body.classList.add('hidden');
                    });

                    // Show the selected category body
                    categoryBodies[index].classList.remove('hidden');
                });
            });
        });
    </script>

</section>
@endsection

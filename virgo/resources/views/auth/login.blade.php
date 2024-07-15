@extends('layouts.app')

@section('container')

<div id="login-body" class="flex mx-auto text-center justify-center my-20 lg:m-0 lg:p-40">
    <form action="/login" method="post" class="w-5/6 md:w-2/3 flex flex-col justify-center border border-gray-700 rounded bg-gray-800 mx-4 p-10">
        @if (session()->has('login-success'))
            <div id="alert" class="flex items-center p-4 mb-4 text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
            <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
            </svg>
            <span class="sr-only">Info</span>
            <div class="ms-3 text-sm font-medium">
                {{ session('login-success') }} 
            </div>
            <button type="button" id="close" class="ms-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-green-400 dark:hover:bg-gray-700" data-dismiss-target="#alert-3" aria-label="Close">
                <span class="sr-only">Close</span>
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                </svg>
            </button>
            </div>
        @endif
        @csrf
       @include('components.logo')
        <div class="mb-5">
            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your email</label>
            <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-500 focus:border-gray-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-gray-500 dark:focus:border-gray-500" placeholder="john@example.com" required />
        </div>
        <div class="mb-5">
            <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your password</label>
            <input type="password" name="password" id="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-500 focus:border-gray-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-gray-500 dark:focus:border-gray-500" placeholder="******" required />
        </div>
        <button type="submit" class="text-white text-xl"> 
            <i class="fa-solid fa-right-to-bracket"></i>
            Login
        </button>
        <p class="text-white">Don't have account yet? <a href="/register" class="text-blue-700">Register here</a></p>
    </form>
</div>




   <script>
        document.addEventListener("DOMContentLoaded", function () {
        // Toggle user dropdown menu
        const searchButton = document.getElementById('search-button');
        const searchModal = document.getElementById('search-modal');
        const bodySection = document.getElementById('login-body');

        searchButton.addEventListener('click', function (event) {
            searchModal.classList.toggle('hidden'); 

            if (searchModal.classList.contains('hidden')) {
                bodySection.classList.remove('hidden'); 
            } else {
                bodySection.classList.add('hidden');
            }
        });
       
    });
   </script>
@endsection
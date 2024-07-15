@extends('layouts.app')

@section('container')
@include('modals.term')
<div id="register-body" class="flex mx-auto text-center justify-center my-20 lg:m-0 lg:p-40">
    <form action="/register" method="post" class="w-5/6 md:w-1/2 flex flex-col justify-center border border-gray-700 rounded bg-gray-800 mx-4 p-10">
        @csrf
        @include("components.logo")
        <div class="mb-5">
            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your name</label>
            <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-500 focus:border-gray-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-gray-500 dark:focus:border-gray-500" value="{{ old('name') }}" placeholder="john titor" required />
            @error('name')
            <div class="invalid:border-red-500 text-red-600">
            {{ $message }}
            </div>
            @enderror
        </div>
        <div class="mb-5">
            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your email</label>
            <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-500 focus:border-gray-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-gray-500 dark:focus:border-gray-500" value="{{ old('email') }}" placeholder="john@example.com" required />
            @error('email')
            <div class="invalid:border-red-500 text-red-600">
            {{ $message }}
            </div>
            @enderror
        </div>
        <div class="mb-5">
            <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your password</label>
            <input type="password" name="password" id="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-500 focus:border-gray-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-gray-500 dark:focus:border-gray-500" placeholder="******" required />
            @error('password')
            <div class="invalid:border-red-500 text-red-600">
            {{ $message }}
            </div>
            @enderror
        </div>
        <div class="mb-5">
            <label for="password_confirmation" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Confirm your password</label>
            <input type="password" name="password_confirmation" id="password_confirmation" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-500 focus:border-gray-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-gray-500 dark:focus:border-gray-500" placeholder="******" required />
            @error('password_confirmation')
            <div class="invalid:border-red-500">
            {{ $message }}
            </div>
            @enderror
        </div>
        <div class="flex items-center mb-4">
            <input id="term-checkbox" name="term" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" required>
            <label for="term-checkbox" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">read our <a id="term-button" class="text-blue-600">Term & condition</a></label>
        </div>
        <div class="flex items-center mb-4 text-start">
            <input id="sub-checkbox" value="1" name="sub" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
            <label for="sub-checkbox" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Subscribe to our newsletter and get updates on new movies.</label>
        </div>
        <button type="submit" class="text-white text-xl"> 
            <i class="fa-solid fa-right-to-bracket"></i>
            Register
        </button>
        <p class="text-white mt-10">Already have an account? <a href="/register" class="text-blue-700">Login here</a></p>
    </form>
</div>




   <script>
        document.addEventListener("DOMContentLoaded", function () {
        const searchButton = document.getElementById('search-button');
        const searchModal = document.getElementById('search-modal');
        const bodySection = document.getElementById('register-body');
        
        const termButton =document.getElementById('term-button');
        const termBody = document.getElementById('term-body');
        const close =document.getElementById('close');
        const navbar = document.getElementById('navbar');

        searchButton.addEventListener('click', function (event) {
            searchModal.classList.toggle('hidden'); 

            if (searchModal.classList.contains('hidden')) {
                bodySection.classList.remove('hidden'); 
            } else {
                bodySection.classList.add('hidden');
            }
        });


        termButton.addEventListener('click', function(event){
            bodySection.classList.add('hidden');
            navbar.classList.remove('lg:block');
            termBody.classList.toggle('hidden');
        });

        close.addEventListener('click', function(event){
            bodySection.classList.remove('hidden');
            navbar.classList.add('lg:block');
            termBody.classList.add('hidden');
        });
        
        
       
    });
   </script>
@endsection
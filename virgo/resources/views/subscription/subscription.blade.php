@extends('layouts.app')

@section('container')
<div class="p-10">
    <div class="bg-gray-900 min-h-96 text-center p-10 rounded ">
        <h1 class="text-white text-4xl font-bold">Subscription plan</h1>
        <p class="text-white">Choose the subscription plan that suit you.</p>
        <div class="flex flex-col lg:flex-row lg:justify-evenly mt-10">

            <div id="free" class="{{(auth()->user()->role == 0)?'border-4 scale-105 border-purple-500':''}} flex flex-col p-10 rounded-xl transform bg-white lg:w-60 xl:w-80 transition duration-500 hover:scale-105 justify-center items-center">
                <h1 class="text-gray-800 font-bold text-2xl">Free</h1>
                <hr class="w-3/4 font-bold mt-5">
                <div class="flex flex-row items-end">
                    <h1 class="text-gray-800 my-10 font-bold text-6xl xl:text-8xl">0</h1>
                    <h1 class="text-gray-800 my-10 font-bold text-xl">€/mtl</h1>
                </div>
                <p class="text-gray-800 mb-10">Watch free movie</p>              
            </div>


            <div id="premium" class="{{(auth()->user()->role == 1)?'border-4 scale-105 border-purple-500':''}} flex flex-col mt-10 lg:mt-0 p-10 rounded-xl transform bg-white lg:w-60 xl:w-80 transition duration-500 hover:scale-105 justify-center items-center">
                <h1 class="text-gray-800 font-bold text-2xl">Premium</h1>
                <hr class="w-3/4 font-bold mt-5">
                <div class="flex flex-row items-end">
                    <h1 class="text-gray-800 my-10 font-bold text-6xl xl:text-8xl">4,99</h1>
                    <h1 class="text-gray-800 my-10 font-bold text-xl">€/mtl</h1>
                </div>
                <p class="text-gray-800 mb-10">Watch all movie</p>
            </div>

            <div id="premium-yearly" class="{{(auth()->user()->role == 2)?'border-4 scale-105 border-purple-500':''}} flex flex-col mt-10 lg:mt-0 p-10 rounded-xl transform bg-white lg:w-60 xl:w-80 transition duration-500 hover:scale-105 justify-center items-center">
                <h1 class="text-gray-800 font-bold text-2xl">Premium Yearly</h1>
                <hr class="w-3/4 font-bold mt-5">
                <div class="flex flex-row items-end">
                    <h1 class="text-gray-800 my-10 font-bold text-6xl xl:text-8xl">49,99</h1>
                    <h1 class="text-gray-800 my-10 font-bold text-xl">€/mtl</h1>
                </div>
                <p class="text-gray-800 mb-10">Watch all movie</p>
            </div>

        </div>

        <form action="{{route('post.subscription')}}" method="post" class="flex flex-col w-32 mx-auto my-10">
            @csrf
            <input id="subType" type="number" class="hidden" name="type" value="{{ auth()->user()->role }}" required>
            <button type="submit" class="bg-purple-500 text-white p-2 rounded hover:bg-purple-400">Select</button>
        </form>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function(){
        const freeBody =document.getElementById('free');
        const premiumBody =document.getElementById('premium');
        const premiumBodyYearly =document.getElementById('premium-yearly');
        const value =document.getElementById('subType');
        const attribut = ['border-4','scale-105', 'border-purple-500'];
        freeBody.addEventListener('click', function(){
            console.log('free');
            premiumBody.classList.remove(...attribut);
            premiumBodyYearly.classList.remove(...attribut);
            freeBody.classList.add(...attribut);
            value.value= "0";
           
        });
        premiumBody.addEventListener('click', function(){
            console.log('premium');
            freeBody.classList.remove(...attribut);
            premiumBodyYearly.classList.remove(...attribut);
            premiumBody.classList.add(...attribut);
            value.value= "1";
        });
        premiumBodyYearly.addEventListener('click', function(){
            console.log('premium-yearly');
            freeBody.classList.remove(...attribut);
            premiumBody.classList.remove(...attribut);
            premiumBodyYearly.classList.add(...attribut);
            value.value= "2";
        });
    });
</script>


@endsection
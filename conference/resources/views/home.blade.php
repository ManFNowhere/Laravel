@extends('layouts.main')

@section('container')
<section class="bg-gray-50 dark:bg-gray-900">
  <!-- banner -->
  <div class="flex flex-col w-full items-center ">
      <div class=" text-center md:px-28 md:text-start w-full tracking-wide bg-cover h-max py-40"  style="background-image: url('/img/banner.jpg');">
            <h5 class="mb-4 text-5xl font-khand text-white dark:gray-900">Welcome to</h5>
            <h5 class="mb-4 text-8xl font-khand font-bold text-white dark:gray-900">Conference</h5>
            <h5 class=" md:w-80 mb-4 text-l font-pop text-white dark:gray-900">Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum voluptatibus, hic commodi sapiente eligendi inventore amet odit esse impedit explicabo quae temporibus laudantium harum tempora, voluptates tenetur, quidem est eveniet.</h5>
            <a href="/events" class="bg-gray-700 font-pop rounded text-white font-bold text-2xl p-2 my-8  hover:border hover:border-blue-600">See our event</a>
      </div>
  </div>

  <!-- Popular event card -->
  <div class="flex flow-col items-center justify-center">
    <div class="w-full text-center bg-gray-800 max-sm:mx-8 md:mx-32 my-8 p-8 rounded-lg border border-blue-700">
      <h5 class="mb-4 font-pop text-2xl text-white dark:gray-900">Popular Event</h5>
      @if($data && count($data) > 0)
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
    </div>
  </div>

 
  <!-- fact about this app -->
  <div class="w-full text-center bg-white ">
    <h5 class="text-4xl text-gray-900 font-pop font-bold py-8">Fun fact</h5>
    <div class="flex flex-col md:flex-row justify-evenly">
      <div class="md:w-40">
        <h5 class="text-8xl text-gray-900 font-pop font-bold">{{$events->count()}}</h5>
        <h5 class="text-2xl text-gray-900 font-pop font-bold">Event</h5>
      </div>
      <div class="mt-8 md:mt-0 md:w-40">   
        <h5 class="text-8xl text-gray-900 font-pop font-bold">{{$speaker->count()}}</h5>
        <h5 class="text-2xl text-gray-900 font-pop font-bold">Speaker</h5>
      </div> 
      <div class="my-8 md:mt-0 md:w-40">
        <h5 class="text-8xl text-gray-900 font-pop font-bold">{{$users->count()}}</h5>
        <h5 class="text-2xl text-gray-900 font-pop font-bold">Participant</h5>
      </div> 
    </div>
  </div>

</section>

<!-- footer -->
<footer class="bg-white dark:bg-gray-900">
    <div class="mx-auto w-full max-w-screen-xl p-4 py-6 lg:py-8">
      <div class="md:flex flex-col md:justify-between">
        <div class="flex flex-col-reverse md:flex-row">
          <!-- about -->
          <div class="mb-6 md:mb-0 md:items-start md:text-start flex flex-col text-center items-center md:w-3/5">
              <a href="/" class="flex flex-row items-center my-4">
                  <img src="https://flowbite.com/docs/images/logo.svg" class="h-8 me-3" alt="Logo" />
                  <span class="text-2xl font-semibold dark:text-white">Conference</span>
              </a>
              <p class="font-pop text-white">"Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestiae, aliquid? Vel libero eos nemo nulla optio aliquid voluptas sunt consequatur."</p>
          </div>

          <!-- newslatter -->
          <div class="my-4 flex flex-col">
            <h5 class="text-xl text-white font-pop font-semibold">Get more updates</h5>
            <h5 class="text-l text-white" >Do you want to get notified when a new event is added to the conference? Subscribe, and you will be the first to know.</h5>
            <div class="flex items-center w-full max-w-md mb-3 ">
                <div class="relative w-full mr-3 ">
                  <div class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none">
                    <svg class="w-3.5 h-3.5 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 16">
                      <path d="m10.036 8.278 9.258-7.79A1.979 1.979 0 0 0 18 0H2A1.987 1.987 0 0 0 .641.541l9.395 7.737Z"></path>
                      <path d="M11.241 9.817c-.36.275-.801.425-1.255.427-.428 0-.845-.138-1.187-.395L0 2.6V14a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V2.5l-8.759 7.317Z"></path>
                    </svg>
                  </div>
                  <form action="/subscribe" method="post">
                    @csrf
                    <input id="subscribe" name="subscribe" class=" bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="email_address" aria-label="Email Address" placeholder="Your email address..." required="" type="email">
                  </div>
                  <button type="submit" class="px-5 py-3 text-sm font-medium text-center text-white bg-blue-700 rounded-lg cursor-pointer hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Subscribe</button>
                  </form>                  
            </div>
          </div>
        </div>


        <!-- sosial media -->
        <div class="flex flex-col md:flex-row text-center w-full justify-center items-center">
          <h5 class="text-m text-white font-pop text-sm">Follow us on </h5>
          <div class="flex flex-row mx-4 justify-evenly w-80">
            <a href="https://twitter.com" target="_blank" class="text-white text-xl hover:text-blue-600">
              <i class="fa-brands fa-x-twitter"></i>
            </a>
            <a href="https://facebook.com" target="_blank" class="text-white text-xl hover:text-blue-600">
              <i class="fa-brands fa-facebook"></i>
            </a>
            <a href="https://instagram.com" target="_blank" class="text-white text-xl hover:text-blue-600">
              <i class="fa-brands fa-instagram"></i>
            </a>
            <a href="https://linkedin.com" target="_blank" class="text-white text-xl hover:text-blue-600">
              <i class="fa-brands fa-linkedin"></i>
            </a>
            
          </div>
        </div>

        <!-- right -->
        <hr class="w-full h-1 mx-auto my-4 bg-gray-100 border-0 rounded md:my-10 dark:bg-gray-700">
        <div class="flex items-center justify-center">
            <span class="text-sm text-gray-500 sm:text-center dark:text-gray-400">© 2024 <a href="/" class="hover:underline">Conference</a>. All Rights Reserved.
            </span>
        </div>

      </div>

    </div>
</footer>


@endsection


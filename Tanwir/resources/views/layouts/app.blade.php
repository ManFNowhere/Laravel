<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Tanwir K Mahdi</title>
    <!-- <link rel="icon" href="storage/logo.png"> -->
  @vite(['resources/css/app.css','resources/js/app.js'])
  @include('partials.font')
</head>
<body >
@include('partials.navbar')

<main class="bg-black w-full">
@yield('container')
</main>



<script>
    const menuButton =document.getElementById('open-menu');
    const mobileMenu =document.getElementById('mobile-menu');

    menuButton.addEventListener('click', function(event){
        console.log('click');
        mobileMenu.classList.toggle('hidden');
    });


</script>

</body>
</html>

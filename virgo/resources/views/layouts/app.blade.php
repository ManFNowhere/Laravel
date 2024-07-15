<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="icon" href="storage/logo.png">
  @vite(['resources/css/app.css','resources/js/app.js'])
  @include('components.font')
</head>
<body class="bg-slate-900">
    @include('modals.search')
    @auth
    @include('modals.profile')
    @endauth
    @include('components.navbar')
   @yield('container')


   @auth
    <script>
        document.addEventListener("DOMContentLoaded", function () {
        // Toggle user dropdown menu
        const userMenuButton = document.getElementById('user-menu-button');
        const userDropdown = document.getElementById('user-dropdown');
        const searchButton = document.getElementById('search-button');
        const profileButton = document.getElementById('profile-button');
        const searchModal = document.getElementById('search-modal');
        const profileModal = document.getElementById('profile-modal');
        const bodySection = document.getElementById('body-section');

        searchButton.addEventListener('click', function (event) {
                searchModal.classList.toggle('hidden'); 
                profileModal.classList.add('hidden');  

                if (searchModal.classList.contains('hidden') && profileModal.classList.contains('hidden')) {
                    bodySection.classList.remove('hidden'); 
                } else {
                    bodySection.classList.add('hidden'); 
                }
            });
            
            profileButton.addEventListener('click', function(event){
                profileModal.classList.toggle('hidden'); 
                searchModal.classList.add('hidden');     

                if (searchModal.classList.contains('hidden') && profileModal.classList.contains('hidden')) {
                    bodySection.classList.remove('hidden'); 
                } else {
                    bodySection.classList.add('hidden'); 
                }
            });
            userMenuButton.addEventListener('click', function (event) {
                userDropdown.classList.toggle('hidden');
                event.stopPropagation();
            });

            document.addEventListener('click', function (event) {
                if (!userDropdown.contains(event.target) && !userMenuButton.contains(event.target)) {
                    userDropdown.classList.add('hidden');
                }
            });
        });
    </script>
   @else

   <script>
        document.addEventListener("DOMContentLoaded", function () {
            const searchButton = document.getElementById('search-button');
            const searchModal = document.getElementById('search-modal');
            const bodySection = document.getElementById('body-section');
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
   @endauth

   <script>
    const navbar = document.getElementById('navbar');
    window.onscroll=function(){
        
        if(document.body.scrollTop>200|| document.documentElement.scrollTop >200){
            navbar.classList.remove('bg-gray-900/0');
            navbar.classList.add('bg-gray-800');
        }else{
            navbar.classList.remove('bg-gray-800');
        }
    }

        function adjustNavbar() {
            console.log('Running');
            navbar.classList.remove('fixed');
        }

        if (window.location.pathname === '/subscription') { 
            document.addEventListener('DOMContentLoaded', function() {
                adjustNavbar();
            });
        }
   </script>

</body>
</html>

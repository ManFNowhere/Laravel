<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
        <title>Learn Accessibility</title>
        <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css','resources/js/app.js']); ?>
    </head>
    <body class="bg-gray-900">
        <div class="bg-gray-800 text-white p-2" role="banner">
            <h1 class="text-lg">Learn navigation component</h1>
        </div>
        <div class="flex flex-row mx-4 mt-4">
            <div>
                <button id="open-menu" type="button" class="bg-white sm:hidden" aria-expanded="false" aria-controls="mobile-menu" aria-label="Toggle menu">
                    <span class="sr-only">Open menu</span>
                    <svg id="open-menu-icon" class="block h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>
                    <svg id="close-menu-icon" class="hidden h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <nav class="bg-white sm:hidden">
                <ul id="mobile-menu" class="hidden flex-col justify-between" role="menu">
                    <li class="hover:bg-gray-300 p-2" role="none"><a href="#" role="menuitem">Home</a></li>
                    <li class="hover:bg-gray-300 p-2" role="none"><a href="#" role="menuitem">News</a></li>
                    <li class="hover:bg-gray-300 p-2" role="none"><a href="#" role="menuitem">Contact</a></li>
                    <li class="hover:bg-gray-300 p-2" role="none"><a href="#" role="menuitem">About</a></li>
                </ul>
            </nav>
        </div>

        <nav class="bg-white m-4 hidden sm:block">
            <ul class="flex flex-row w-1/3 justify-starts" role="menu">
                <li class="hover:bg-gray-300 p-2" role="none"><a href="#" role="menuitem">Home</a></li>
                <li class="hover:bg-gray-300 p-2" role="none"><a href="#" role="menuitem">News</a></li>
                <li class="hover:bg-gray-300 p-2" role="none"><a href="#" role="menuitem">Contact</a></li>
                <li class="hover:bg-gray-300 p-2" role="none"><a href="#" role="menuitem">About</a></li>
            </ul>
        </nav>
        <main role="main">

        </main>
        <script>
            const menuButton = document.getElementById('open-menu');
            const openMenuIcon = document.getElementById('open-menu-icon');
            const closeMenuIcon = document.getElementById('close-menu-icon');
            const mobileMenu = document.getElementById('mobile-menu');

            menuButton.addEventListener('click', function() {
                const isMenuOpen = openMenuIcon.classList.contains('hidden');
                menuButton.setAttribute('aria-expanded', !isMenuOpen);
                openMenuIcon.classList.toggle('hidden');
                closeMenuIcon.classList.toggle('hidden');
                mobileMenu.classList.toggle('hidden');
            });
        </script>
    </body>
</html>
<?php /**PATH /var/www/html/resources/views/accessibility/navbar.blade.php ENDPATH**/ ?>
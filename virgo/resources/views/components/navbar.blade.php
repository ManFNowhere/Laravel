

<nav id="navbar" class="border-gray-200 bg-gray-900/0 w-full hidden z-50 lg:block fixed transition-all duration-500 ease-in-out">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4 ">
        <a href="/" class="flex items-center rtl:space-x-reverse">
            <img src="/storage/logo.png" class="h-10" alt="Virgo Logo" />
            <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Virgo</span>
        </a>
         <a href="/category" class="text-gray-300 text-2xl sm:w-20 block text-center" >
                Category
        </a>
        <div class="flex md:order-2 items-center">
            <div class="relative hidden md:block">
                <form action="/search">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                        <span class="material-symbols-outlined text-gray-500">
                        search
                        </span>
                    </div>
                    <input type="text" id="search-navbar" name="search" class="block w-full p-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search...">
                </form>
            </div>

            <!-- menu button -->
            @auth
                <div class="flex items-center md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
                    <button type="button" class="flex text-xl  rounded-full mx-4" id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown" data-dropdown-placement="bottom">
                        <span class="material-symbols-outlined text-gray-500" style="font-size:40px">
                        account_circle
                        </span>
                    </button>
                    <!-- Dropdown menu -->
                    <div style="left:83%; top:5%" class="z-50 fixed hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700 dark:divide-gray-600" id="user-dropdown">
                        <div class="px-4 py-3">
                            <span class="block text-sm text-gray-900 dark:text-white">{{ auth()->user()->name }}</span>
                            <span class="block text-sm  text-gray-500 truncate dark:text-gray-400">{{ auth()->user()->email }}</span>
                        </div>
                        <ul class="py-2" aria-labelledby="user-menu-button">
                            <li>
                                <a href="/dashboard" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Dashboard</a>
                            </li>
                            <li>
                                <form action="/logout" method="post">
                                    @csrf
                                    <button type="submit" class="text-start w-full block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Sign out</button>
                                </form>
                            </li>
                        </ul>
                    </div>
                
                </div>
            @else
                <a href="/login" id="login-button" class="text-gray-300 text-xl mx-4">
                <i class="fa-solid fa-right-to-bracket"></i>
                Login
                </a>
            @endauth
        </div>
</nav>

<nav id="navbar-ms" class=" bg-gray-900/0 w-full block z-10 lg:hidden fixed bottom-0 p-2 ">
    <ul class="shadow border border-gray-700 bg-gray-800 flex flex-row rounded w-full sm:w-2/3 p-2 justify-evenly mx-auto">
        <li>
            <a href="/" class="text-gray-300 text-2xl sm:w-20 block text-center" >
                <i class="fa-solid fa-house"></i>
            </a>
        </li>
        <li>
            <a href="/category" class="text-gray-300 text-2xl sm:w-20 block text-center" >
                <i class="fa-solid fa-list"></i>
            </a>
        </li>
        <li>
            <button id="search-button" type="button" class="text-gray-300 text-2xl sm:w-20 block text-center">
                <i class="fa-solid fa-magnifying-glass"></i>
            </button>
        </li>
        <li>
            @auth
                <button id="profile-button" type="button" class="text-gray-300 text-2xl sm:w-20 block text-center" aria-controls="navbar-user" aria-expanded="false">
                    <i class="fa-solid fa-user"></i>
                </button>
            @else
                <a href="/login" class="text-gray-300 text-2xl sm:w-20 block text-center" aria-controls="navbar-user" aria-expanded="false">
                    <i class="fa-solid fa-right-to-bracket"></i>
                </a>
            @endauth
        </li>
    </ul>
</nav>
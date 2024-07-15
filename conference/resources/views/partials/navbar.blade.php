

<nav class="bg-white border-gray-200 dark:bg-gray-900 dark:border-gray-700">
  <div class="w-full flex flex-wrap items-center justify-between mx-auto p-4">
    <a href="/" class="flex items-center space-x-3 rtl:space-x-reverse">
        <img src="https://flowbite.com/docs/images/logo.svg" class="h-8" alt="Flowbite Logo" />
        <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Conference</span>
    </a>
    
    <button data-collapse-toggle="navbar-dropdown" type="button" class=" ms:order-2 inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-dropdown" aria-expanded="false">
        <span class="sr-only">Open main menu</span>
        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
        </svg>
    </button>
    <div class="hidden w-full md:block md:w-auto" id="navbar-dropdown">
      <ul class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
        <li>
          <a href="/" class="block py-2 px-3 text-white rounded md:bg-transparent {{{($title==='Home')?' bg-blue-700 md:text-blue-700 md:dark:text-blue-500 dark:bg-blue-600 ':''}}}md:dark:bg-transparent  md:p-0 " >Home</a>
        </li>
        <li>
        <a href="/events" class="block py-2 px-3 text-white rounded md:bg-transparent {{{($title==='Events')?' bg-blue-700 md:text-blue-700 md:dark:text-blue-500 dark:bg-blue-600 ':''}}}  md:dark:bg-transparent md:p-0 " >Events</a>
        </li>
        <hr>
        @auth
        <div>
          <li>
            <a href="/dashboard" class="block md:hidden py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent"> {{ auth()->user()->name }} </a>
          </li>
          <li>
            <a href="/setting" class="block md:hidden py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Settings</a>
          </li>
          <li>
            <form action="/logout" method="post">
              @csrf
            <button class="block md:hidden py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Sign out</button>
            </form>
          </li>
        </div>
        @else
        <div>
          <li>
            <a href="/login" class="block md:hidden py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Sign in</a>
          </li>
        </div>
        @endauth
      </ul>
    </div>
    
    @auth
    <button id="dropdownNavbarLink" data-dropdown-toggle="dropdownNavbar" class="hidden md:block items-center justify-between w-full py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 md:w-auto dark:text-white md:dark:hover:text-blue-500 dark:focus:text-white dark:border-gray-700 dark:hover:bg-gray-700 md:dark:hover:bg-transparent">
    <i class="fa-solid fa-user"></i>
    </button>
    <div id="dropdownNavbar" class="z-10 hidden font-normal bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
        <ul class="py-2 text-sm text-gray-700 dark:text-gray-400" aria-labelledby="dropdownLargeButton">
          <li>
            <a href="/dashboard" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"> {{ auth()->user()->name }} </a>
          </li>
          <li>
            <a href="/setting" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Settings</a>
          </li>
        </ul>
        <div class="py-1">
          <form action="/logout" method="post">
            @csrf
            <button type="submit" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Sign out</button>
          </form>
        </div>
    </div> 
    @else
    <div class="hidden md:block md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
      <a href="/login" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Sign in</a>
    </div>
    @endauth
  </div>
</nav>

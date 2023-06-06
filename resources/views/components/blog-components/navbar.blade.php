<nav id="header" class="fixed w-full z-10 top-0 bg-slate-100 dark:bg-slate-900">
    <div id="progress" class="h-1 z-20 top-0"
         style="background:linear-gradient(to right, #4dc0b5 var(--scroll), transparent 0);"></div>
    <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
        <div class="relative flex items-center justify-between h-16">
            <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
                <!-- Mobile menu button-->
                <button id="menu" type="button"
                        class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white"
                        aria-controls="mobile-menu" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <svg id="menuIcon1" class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                         viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                    <svg id="menuIcon2" class="hidden h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                         viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
            <div class="flex-1 flex items-center justify-center sm:items-stretch sm:justify-start">
                <div class="flex-shrink-0 flex items-center">
                    <a href="/">
                        <x-application-logo class="w-10 h-10 fill-current text-gray-500"/>
                    </a>
                </div>
                <!-- Search Input-->
                {{--<div class="hidden sm:block sm:ml-6">
                    <div class="flex space-x-4">
                        <div class="relative mx-auto text-gray-600">
                            <form method="GET" action="#">
                                <input
                                    class=" border-2 border-gray-300 bg-white h-10 px-2 pr-6 rounded-lg text-sm focus:outline-none"
                                    type="search" name="search" placeholder="Search" value="{{request('search')}}">
                                <button type="submit" class="absolute right-0 mt-3 mr-4">
                                    <svg class="text-gray-600 h-4 w-4 fill-current" xmlns="http://www.w3.org/2000/svg"
                                         version="1.1" id="Capa_1" x="0px" y="0px"
                                         viewBox="0 0 56.966 56.966" style="enable-background:new 0 0 56.966 56.966;"
                                         xml:space="preserve"
                                         width="512px" height="512px">
            <path
                d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23  s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92  c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17  s-17-7.626-17-17S14.61,6,23.984,6z"/>
          </svg>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>--}}

                @auth()
                <div class="ml-5">
                    <a href="{{ route('post.create') }}">
                        <button class="bg-green-500 dark:bg-gray-800 hover:bg-blue-600 dark:hover:bg-gray-700 text-white dark:text-gray-200 font-bold py-2 px-4 rounded-full flex items-center">
                            <svg class="w-4 h-4 mr-2 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                <path d="M12 4a1 1 0 0 1 1 1v6h6a1 1 0 0 1 0 2h-6v6a1 1 0 0 1-2 0v-6H5a1 1 0 0 1 0-2h6V5a1 1 0 0 1 1-1z"/>
                            </svg>
                            New Post
                        </button>
                    </a>
                </div>
                @endauth
            </div>
            <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
                <div class="hidden md:flex items-center justify-end md:flex-1 lg:w-0">
                    <div class="flex justify-end items-center space-x-5">
                        <span class="text-sm text-green-500 dark:text-gray-500">Light</span>
                        <label for="toggle"
                               class="w-9 h-5 flex items-center bg-gray-300 rounded-full p-1 cursor-pointer duration-300 ease-in-out dark:bg-gray-600">
                            <div
                                class="toggle-dot bg-white w-4 h-4 rounded-full shadow-md transform duration-300 ease-in-out dark:translate-x-3"></div>
                        </label>
                        <span class="text-sm text-gray-400 dark:text-green-500">Dark</span>
                        <input id="toggle" type="checkbox" class="hidden" :value="darkMode"
                               @click="darkMode = !darkMode"/>
                        <span class="text-sm text-gray-400">|</span>
                        @auth
                            <a href="{{ route('profile.edit') }}"
                               class="block py-2 text-sm text-green-500 whitespace-nowrap">
                                {{ auth()->user()->name }}
                            </a>
                        @else
                            <a href="{{ route('login') }}" class="block py-2 text-sm text-gray-500">
                                Login
                            </a>
                            <a href="{{ route('register') }}" class="block py-2 text-sm text-gray-500">
                                Register
                            </a>
                        @endauth
                    </div>
                </div>
                <!-- Profile dropdown -->
                <div class="ml-3 relative">
                    @auth
                        <div>
                            <button id="profile-button" type="button"
                                    class="bg-gray-800 flex text-sm rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white"
                                    aria-expanded="false" aria-haspopup="true">
                                <span class="sr-only">Open user menu</span>
                                <img class="w-10 h-10 rounded-full" src="https://i.pravatar.cc/300?u={{auth()->id()}}"
                                     alt="Avatar">
                            </button>
                        </div>
                    @endauth
                    <div id="profile-menu"
                         class="hidden origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white dark:bg-gray-300 ring-1 ring-black ring-opacity-5 focus:outline-none"
                         role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
                        <!-- Active: "bg-gray-100", Not Active: "" -->
                        @auth
                            <a href="{{ route('home') }}" class="block px-4 py-2 text-sm text-gray-700" role="menuitem"
                               tabindex="-1" id="user-menu-item-1">Home</a>
                            <a href="{{ route('dashboard') }}" class="block px-4 py-2 text-sm text-gray-700"
                               role="menuitem"
                               tabindex="-1" id="user-menu-item-1">Dashboard</a>
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1"
                                        id="user-menu-item-2" type="submit">Log out
                                </button>
                            </form>
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Mobile menu -->
    <div class="hidden block bg-gray-300" id="mobile-menu">
        <div class="px-2 pt-2 pb-3 space-y-1">
            @guest()
                <a class="border-2 border-gray-300 text-gray-500 bg-white rounded-lg h-10 text-sm block px-3 py-2 rounded-md text-base font-medium"
                   href="/login">Login</a>
                <a class="border-2 border-gray-300 text-gray-500 bg-white rounded-lg h-10 text-sm block px-3 py-2 rounded-md text-base font-medium"
                   href="/register">Register</a>
            @endguest
            <div class="relative mx-auto text-gray-600">
                <form method="GET" action="#">
                    <input
                        class=" border-2 border-gray-300 bg-white h-10 px-2 w-full rounded-lg text-sm focus:outline-none"
                        type="search" name="search" placeholder="Search" value="{{request('search')}}">
                    <button type="submit" class="absolute right-0 mt-3 mr-4">
                        <svg class="text-gray-600 h-4 w-4 fill-current" xmlns="http://www.w3.org/2000/svg"
                             version="1.1" id="Capa_1" x="0px" y="0px"
                             viewBox="0 0 56.966 56.966" style="enable-background:new 0 0 56.966 56.966;"
                             xml:space="preserve"
                             width="512px" height="512px">
            <path
                d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23  s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92  c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17  s-17-7.626-17-17S14.61,6,23.984,6z"/>
          </svg>
                    </button>
                </form>
            </div>
        </div>
    </div>
</nav>


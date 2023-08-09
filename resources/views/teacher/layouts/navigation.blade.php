@if (request()->routeIs('teacher.dashboard') || request()->routeIs('teacher.user.index'))
    {{-- search button --}}
    <script>
        function toggleSearchMenu() {
            var searchMenu = document.getElementById("search-menu");
            var searchBtn = document.getElementById("search-btn");

            if (searchMenu.style.maxHeight == "0px") {
                searchMenu.style.maxHeight = "200px";
                searchBtn.classList.add('bg-blue-500');
                searchBtn.classList.remove('bg-orange-500');
            } else {
                searchMenu.style.maxHeight = "0px";
                searchBtn.classList.add('bg-orange-500');
                searchBtn.classList.remove('bg-blue-500');
            }
        }
    </script>

    {{-- search --}}
    <div id="search-menu" class="justify-center items-center overflow-hidden transition-all duration-500"
        style="max-height: 0px;">
        <form action="{{ url()->current() }}" method="GET">
            <div class="flex justify-center items-center">
                <input type="search" name="search" id="search"
                    class="border border-gray-300 rounded-md p-2 m-2 w-full max-w-xl" placeholder="Search"
                    value="{{ request()->query('search') }}">
                <button type="submit" class="bg-orange-500 text-white rounded-md p-2 m-2">Search</button>
            </div>
        </form>
    </div>
@endif


<nav x-data="{ open: false }" class="sticky top-0 z-10 backdrop-blur bg-opacity-60 bg-white">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('teacher.dashboard') }}">
                        <x-application-logo class="block h-9 w-auto fill-current text-gray-800" />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    {{-- teacher Navlinks --}}
                    <x-nav-link :href="route('teacher.dashboard')" :active="request()->routeIs('teacher.dashboard')">
                        {{ __('Dashboard') }}
                    </x-nav-link>
                    <x-nav-link :href="route('teacher.user.index')" :active="request()->routeIs('teacher.user.index')">
                        {{ __('Users') }}
                    </x-nav-link>

                    <x-nav-link :href="route('teacher.user.create')" :active="request()->routeIs('teacher.user.create')">
                        {{ __('Add User') }}
                    </x-nav-link>
                </div>
            </div>

            <div class="flex items-center justify-center">
                @if (request()->routeIs('teacher.dashboard') || request()->routeIs('teacher.user.index'))
                    <!-- search -->
                    <button id="search-btn" type="button" class="bg-orange-500 rounded-full p-2 "
                        onclick="toggleSearchMenu()">
                        <svg class="fill-white" xmlns="http://www.w3.org/2000/svg" height="1em"
                            viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                            <path
                                d="M505 442.7L405.3 343c-4.5-4.5-10.6-7-17-7H372c27.6-35.3 44-79.7 44-128C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c48.3 0 92.7-16.4 128-44v16.3c0 6.4 2.5 12.5 7 17l99.7 99.7c9.4 9.4 24.6 9.4 33.9 0l28.3-28.3c9.4-9.4 9.4-24.6.1-34zM208 336c-70.7 0-128-57.2-128-128 0-70.7 57.2-128 128-128 70.7 0 128 57.2 128 128 0 70.7-57.2 128-128 128z" />
                        </svg>
                    </button>
                @endif
                <!-- Settings Dropdown -->
                <div class="hidden sm:flex sm:items-center sm:ml-6">
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button
                                class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                                <div>{{ Auth::guard('teacher')->user()->name }}</div>

                                <div class="ml-1">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>

                        <x-slot name="content">

                            <!-- Authentication -->
                            <form method="POST" action="{{ route('teacher.logout') }}">
                                @csrf

                                <x-dropdown-link :href="route('teacher.logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                </div>

                <!-- Hamburger -->
                <div class="-mr-2 flex items-center sm:hidden">
                    <button @click="open = ! open"
                        class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                        <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                                stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16" />
                            <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden"
                                stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">

            {{-- teacher Navlinks --}}
            <x-responsive-nav-link :href="route('teacher.dashboard')" :active="request()->routeIs('teacher.dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('teacher.user.index')" :active="request()->routeIs('teacher.user.index')">
                {{ __('Users') }}
            </x-responsive-nav-link>

            <x-responsive-nav-link :href="route('teacher.user.create')" :active="request()->routeIs('teacher.user.create')">
                {{ __('Add User') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800">{{ Auth::guard('teacher')->user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::guard('teacher')->user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">

                <!-- Authentication -->
                <form method="POST" action="{{ route('teacher.logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('teacher.logout')"
                        onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>

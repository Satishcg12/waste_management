<nav x-data="{ open: false }" class="sticky top-0 z-10 backdrop-blur bg-opacity-75 bg-white">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('welcome') }}">
                        <x-application-logo class="block h-12 w-auto" />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    {{-- home --}}
                    <x-nav-link :href="route('home')" :active="request()->routeIs('home')">
                        {{ __('Home') }}
                    </x-nav-link>
                    {{-- about --}}
                    <x-nav-link :href="route('welcome') . '#about-us'">
                        {{ __('About') }}
                    </x-nav-link>
                    {{-- contact --}}
                    <x-nav-link :href="route('welcome') . '#contact-us'">
                        {{ __('Contact') }}
                    </x-nav-link>
                    {{-- education --}}

                    <x-nav-link :href="'https://samriddhischool.edu.np'" target="_blank">
                        {{ __('Education') }}
                    </x-nav-link>


                </div>
            </div>

            <div class="hidden sm:flex sm:items-center sm:ml-6">
                @auth('admin')
                    <a href="{{ url('/admin/dashboard') }}"
                        class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400  focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Admin
                        Dashboard</a>
                @else
                    @auth('teacher')
                        <a href="{{ url('/teacher/dashboard') }}"
                            class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400  focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Teacher
                            Dashboard</a>
                    @else
                        @auth
                            <a href="{{ url('/dashboard') }}"
                                class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400  focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
                        @else
                            <a href="{{ route('login') }}"
                                class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400  focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log
                                in</a>

                        @endauth
                    @endauth
                @endauth
            </div>

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button title="Menu"
                 @click="open = ! open"
                    class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            {{-- home --}}
            <x-responsive-nav-link :href="route('home')" :active="request()->routeIs('home')">
                {{ __('Home') }}
            </x-responsive-nav-link>
            {{-- about --}}
            <x-responsive-nav-link :href="route('welcome') . '#about-us'">
                {{ __('About') }}
            </x-responsive-nav-link>
            {{-- contact --}}
            <x-responsive-nav-link :href="route('welcome') . '#contact-us'">
                {{ __('Contact') }}
            </x-responsive-nav-link>
            {{-- education --}}
            <x-responsive-nav-link :href="'https://samriddhischool.edu.np'" target="_blank">
                {{ __('Education') }}
            </x-responsive-nav-link>

        </div>

        <!-- Responsive Settings Options -->

        <div class=" sm:items-center sm:ml-6">
            @auth('admin')
                {{-- <a href="{{ url('/admin/dashboard') }}"
                    class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400  focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Admin
                    Dashboard</a> --}}
                <x-responsive-nav-link :href="route('admin.dashboard')">
                    {{ __('Admin Dashboard') }}
                </x-responsive-nav-link>
            @else
                @auth('teacher')
                    {{-- <a href="{{ url('/teacher/dashboard') }}"
                        class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400  focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Teacher
                        Dashboard</a> --}}
                    <x-responsive-nav-link :href="route('teacher.dashboard')">
                        {{ __('Teacher Dashboard') }}
                    </x-responsive-nav-link>
                @else
                    @auth
                        {{-- <a href="{{ url('/dashboard') }}"
                            class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400  focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a> --}}
                        <x-responsive-nav-link :href="route('dashboard')">
                            {{ __('Dashboard') }}
                        </x-responsive-nav-link>
                            @else
                        {{-- <a href="{{ route('login') }}"
                            class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400  focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log
                            in</a> --}}
                        <x-responsive-nav-link :href="route('login')">
                            {{ __('Log in') }}
                        </x-responsive-nav-link>
                    @endauth
                @endauth
            @endauth
        </div>

    </div>
</nav>

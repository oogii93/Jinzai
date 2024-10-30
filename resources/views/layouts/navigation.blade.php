<nav x-data="{ open: false }" class="bg-white shadow-lg">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-20">
            <div class="flex">
                <!-- Logo -->



              <!-- Logo -->
              <div class="flex items-center">
                <a href="/" class="flex items-center space-x-2">
                    <img src="{{ asset('images/1.png') }}" alt="" class="h-8">
                    <div class="hover:opacity-70">
                        <span class="text-3xl font-bold text-blue-800 px-2">
                            人材 <span class="text-orange-400">紹介</span>
                        </span>
                    </div>
                </a>
            </div>

            <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    @if(auth()->user()->role === 'jobseeker')
                        <x-nav-link :href="route('jobseeker.dashboard')" :active="request()->routeIs('jobseeker.dashboard')">
                            {{ __('Dashboard') }}
                        </x-nav-link>
                        {{-- Add more jobseeker specific navigation links here --}}
                    @endif
                </div>

            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">




                        <!-- Desktop Navigation Links -->
                <div class="hidden md:flex md:items-center md:space-x-1 py-12">
                    <a href="{{ route('main') }}" class="relative text-gray-800 font-medium hover:bg-blue-600 rounded-sm w-20 h-16 hover:text-white group flex items-center px-4">
                        {{ __('Main') }}

                    </a>
                    <a href="" class="relative text-gray-800 font-medium hover:bg-blue-600 rounded-sm w-20 h-16 hover:text-white group flex items-center px-4">
                        {{ __('Index') }}

                    </a>
                    <a href="" class="relative text-gray-800 font-medium hover:bg-blue-600 rounded-sm w-20 h-16 hover:text-white group flex items-center px-4">
                        {{ __('Another') }}

                    </a>


                @if (Auth::check() && Auth::user()->role===('admin'))

                        <a href="{{ route('categories.index') }}"
                        class="relative text-gray-800 font-medium hover:bg-blue-600 rounded-sm w-25 h-16 hover:text-white group flex items-center px-4">
                        {{ __('Category') }}
                        </a>


                @endif

                @if (Auth::check() && Auth::user()->role===('admin'))

                        <a href="{{ route('tags.index') }}"
                        class="relative text-gray-800 font-medium hover:bg-blue-600 rounded-sm w-20 h-16 hover:text-white group flex items-center px-4">
                        {{ __('Tag') }}
                        </a>


                @endif




                        <a href="{{ route('jobpost.index') }}"
                        class="relative text-gray-800 font-medium hover:bg-blue-600 rounded-sm w-20 h-16 hover:text-white group flex items-center px-4">
                        {{ __('jobpost') }}
                        </a>



                    <a href="" class="relative flex items-center">
                        <!-- Modified this line -->
                        <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                                d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9">
                            </path>
                        </svg>

                    </a>



                   <h1 class="font-medium text-xl px-5 ">{{ Auth::user()->name }}</h1>


              <li class="relative group">
    <a href="#" class="relative w-16 h-16 rounded-full flex items-center justify-center hover:bg-blue-600 hover:text-white">
        <img src="{{ asset('images/pro.jpg') }}" alt="Profile Image" class="w-full h-full rounded-full object-cover">
    </a>

    <!-- Dropdown menu -->
    <div class="absolute hidden bg-white divide-y divide-gray-200 rounded-lg shadow-lg group-hover:block
                right-0 mt-2 w-56 py-1 z-50 border border-gray-200 transform opacity-0 scale-95
                group-hover:opacity-100 group-hover:scale-100 transition-all duration-200 ease-out">
        <!-- Dropdown arrow -->
        <div class="absolute -top-2 right-6 w-4 h-4 bg-white transform rotate-45 border-l border-t border-gray-200"></div>

        <!-- User info section -->
        <div class="px-4 py-3 border-b border-gray-200">
            <p class="text-sm font-medium text-gray-900">{{ Auth::user()->name }}</p>
            <p class="text-sm text-gray-500 truncate">{{ Auth::user()->email }}</p>
        </div>

        <!-- Menu items -->
        <div class="py-1">
            <a href="{{ route('dashboard') }}"
               class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-pink-600 hover:text-white transition-colors duration-150">
                <svg class="mr-3 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                </svg>
                {{ __('Dashboard') }}
            </a>
            <a href="{{ route('profile.edit') }}"
               class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-pink-600 hover:text-white transition-colors duration-150">
                <svg class="mr-3 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                </svg>
                {{ __('MyPage') }}
            </a>
        </div>

        <!-- Logout section -->
        <div class="py-1">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <a href="{{ route('logout') }}"
                   onclick="event.preventDefault(); this.closest('form').submit();"
                   class="flex items-center px-4 py-2 text-sm text-red-600 hover:bg-red-600 hover:text-white transition-colors duration-150">
                    <svg class="mr-3 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                    </svg>
                    {{ __('Logout') }}
                </a>
            </form>
        </div>
    </div>
</li>




                </div>


{{--
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link> --}}



            </div>

        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>

<nav x-data="{ open: false }" class="bg-white shadow-lg">

    <style>
        .bell-icon {
            display: inline-block;
            transition: transform 0.3s ease-in-out;
        }

        .bell-icon:hover {
            animation: ring 0.5s ease-in-out;
        }

        @keyframes ring {
            0%, 100% { transform: rotate(0deg); }
            25% { transform: rotate(-15deg); }
            75% { transform: rotate(15deg); }
        }
        </style>



    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
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




                <div class="hidden md:flex md:items-center md:py-6">
                    <li class="relative group list-none">
                        <a href="{{ route('main') }}"
                           class="relative block transform transition-all duration-300 hover:-translate-y-1">
                            <div class="flex flex-col items-center justify-center w-24 h-16 cursor-pointer bg-white border border-gray-200 hover:bg-gray-100 transition-all duration-300">

                                {{-- Main Icon SVG with hover animation --}}
                              <svg
                                 class="w-16 h-16 mt-1"
                              viewBox="0 0 100 100" enable-background="new 0 0 100 100" id="Layer_1" version="1.1" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <g> <rect clip-rule="evenodd" fill="#F2F2F2" fill-rule="evenodd" height="83.437" width="67.025" x="9.012" y="7.604"></rect> <path d="M77.454,92.458H7.595V6.187h69.859V92.458z M10.429,89.624H74.62V9.021H10.429V89.624z"></path> </g> <g> <rect clip-rule="evenodd" fill="#7bc50d" fill-rule="evenodd" height="10.481" width="17.952" x="46.695" y="34.866"></rect> </g> <g> <rect height="2.834" width="19.463" x="20.504" y="35.575"></rect> </g> <g> <rect height="2.834" width="15.561" x="20.718" y="42.508"></rect> </g> <g> <rect height="2.833" width="15.562" x="20.813" y="49.514"></rect> </g> <g> <rect height="2.833" width="27.128" x="20.718" y="56.753"></rect> </g> <g> <rect height="2.833" width="23.51" x="20.718" y="63.688"></rect> </g> <g> <rect clip-rule="evenodd" fill="#39B6CC" fill-rule="evenodd" height="9.004" width="44.095" x="20.553" y="19.064"></rect> </g> <g> <rect height="2.833" width="26.272" x="20.718" y="70.32"></rect> </g> <g> <rect height="2.834" width="32.8" x="20.718" y="77.253"></rect> </g> <g> <rect height="2.834" width="3.235" x="38.304" y="42.508"></rect> </g> <g> <path clip-rule="evenodd" d="M77.931,71.902l4.287,4.427l-6.644,6.437l-4.309-4.457 C74.147,76.998,76.504,74.726,77.931,71.902L77.931,71.902z" fill="#F2F2F2" fill-rule="evenodd"></path> <path d="M75.542,84.77l-6.692-6.92l1.828-0.831c2.579-1.174,4.706-3.218,5.989-5.756l0.897-1.776l6.656,6.874L75.542,84.77z M73.584,78.669l2.023,2.091l4.605-4.463l-2.007-2.074C76.994,76.012,75.414,77.531,73.584,78.669z"></path> </g> <g> <polygon clip-rule="evenodd" fill="#39B6CC" fill-rule="evenodd" points="83.267,75.319 91.984,84.338 83.247,92.779 74.535,83.761 "></polygon> <path d="M83.213,94.783L72.531,83.726l10.771-10.41l10.687,11.056L83.213,94.783z M76.538,83.794l6.744,6.981l6.698-6.472 l-6.748-6.981L76.538,83.794z"></path> </g> <g> <path clip-rule="evenodd" d="M66.124,50.799c7.742,0,14.018,6.276,14.018,14.019 s-6.275,14.019-14.018,14.019c-7.743,0-14.019-6.276-14.019-14.019S58.381,50.799,66.124,50.799L66.124,50.799z" fill="#F2F2F2" fill-rule="evenodd"></path> <path d="M66.124,80.253c-8.511,0-15.435-6.924-15.435-15.435s6.924-15.435,15.435-15.435S81.56,56.307,81.56,64.818 S74.635,80.253,66.124,80.253z M66.124,52.216c-6.949,0-12.601,5.653-12.601,12.602s5.651,12.601,12.601,12.601 c6.948,0,12.602-5.652,12.602-12.601S73.072,52.216,66.124,52.216z"></path> </g> <g> <rect height="2.833" width="10.313" x="39.902" y="49.514"></rect> </g> <g> <path d="M76.404,65.586H73.57c0-0.636-0.068-1.255-0.205-1.84c-0.043-0.186-0.096-0.385-0.169-0.63l2.717-0.808 c0.091,0.304,0.158,0.559,0.215,0.801C76.31,63.901,76.404,64.735,76.404,65.586z M72.438,61.433 c-1.489-2.5-4.203-4.058-7.084-4.061l0.004-2.834c3.871,0.005,7.518,2.091,9.516,5.445L72.438,61.433z"></path> </g> </g> </g></svg>

                                {{-- Label with hover effect --}}
                                <span class="mr-2 mt-1 text-gray-800 text-[11px] font-semibold group-hover:text-blue-600 transition-colors duration-300">
                                   ホーム
                                </span>

                                {{-- Subtle hover indicator line --}}
                                <div class="absolute bottom-0 left-0 w-full h-[2px] bg-blue-500 transform scale-x-0 transition-transform duration-300 group-hover:scale-x-100"></div>
                            </div>
                        </a>
                    </li>

                    <li class="relative group list-none">
                        <a href="{{ route('jobFavorite') }}"
                           class="relative block transform transition-all duration-300 hover:-translate-y-1">
                            <div class="flex flex-col items-center justify-center w-24 h-16 cursor-pointer bg-white border border-gray-200 hover:bg-gray-100 transition-all duration-300">

                                {{-- Main Icon SVG with hover animation --}}
                                <svg
                                   class="w-16 h-16 mt-1"
                                viewBox="0 0 24 24" xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:cc="http://creativecommons.org/ns#" xmlns:dc="http://purl.org/dc/elements/1.1/" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g transform="translate(0 -1028.4)"> <path d="m9.533-0.63623 2.79 6.2779 5.581 0.6976-4.186 3.4877 1.395 6.278-5.58-3.488-5.5804 3.488 1.3951-6.278-4.1853-3.4877 5.5804-0.6976z" transform="matrix(1.4336 0 0 1.4336 -1.6665 1029.3)" fill="#f39c12"></path> <g fill="#f1c40f"> <g> <path d="m12 0v13l4-4z" transform="translate(0 1028.4)"></path> <path d="m12 13 12-3-6 5z" transform="translate(0 1028.4)"></path> <path d="m12 13 8 11-8-5z" transform="translate(0 1028.4)"></path> <path d="m12 13-8 11 2-9z" transform="translate(0 1028.4)"></path> </g> <path d="m12 13-12-3 8-1z" transform="translate(0 1028.4)"></path> </g> </g> </g></svg>

                                {{-- Label with hover effect --}}
                                <span class="mr-2 mt-1 text-gray-800 text-[11px] font-semibold group-hover:text-blue-600 transition-colors duration-300">
                                   お気に入り
                                </span>

                                {{-- Subtle hover indicator line --}}
                                <div class="absolute bottom-0 left-0 w-full h-[2px] bg-blue-500 transform scale-x-0 transition-transform duration-300 group-hover:scale-x-100"></div>
                            </div>
                        </a>
                    </li>


                @if (Auth::check() && Auth::user()->role===('admin'))


                <li class="relative group list-none">
                    <div
                        class="flex flex-col items-center justify-center w-24 h-16 cursor-pointer bg-white border border-gray-200 hover:bg-gray-100">



                        <svg
                         class="w-32 h-32 mt-1"

                        fill="#153c60" height="200px" width="200px" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 476.968 476.968" xml:space="preserve"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <polygon points="398.912,186.565 345.204,240.669 399.542,240.669 399.542,186.525 "></polygon> <path d="M94.963,240.669h26.059l-10.794-25.949c-0.256-0.622-0.364-1.258-0.566-1.88c-3.922-12.074,1.934-25.359,13.844-30.321 l0.054-0.024l-0.078-0.032c-6.063-2.516-10.793-7.235-13.331-13.331c-2.509-6.049-2.524-12.727-0.024-18.83l12.082-29.288 c3.836-9.233,12.773-15.196,22.773-15.196c3.23,0,6.39,0.63,9.387,1.864l0.062,0.024l-0.03-0.07 c-0.986-2.384-1.452-4.829-1.67-7.275c-5.451-2.959-11.601-4.799-18.24-4.799H38.443C17.214,95.561,0,112.775,0,134.005v19.202 v59.633v163.641l48.576-106.042C56.861,252.355,75.069,240.669,94.963,240.669z"></path> <path d="M148.307,122.38c-1.088-0.45-2.214-0.66-3.324-0.66c-3.432,0-6.693,2.034-8.091,5.397l-12.067,29.249 c-0.878,2.144-0.87,4.543,0.016,6.679c0.892,2.142,2.594,3.844,4.728,4.728l16.61,6.841c-0.49,5.187-0.512,10.435,0,15.692 l-16.562,6.895c-4.441,1.848-6.553,6.965-4.705,11.415l12.159,29.219c0.498,1.204,1.452,2.004,2.354,2.834h13.549l12.051-5.016 c1.538,1.84,3.378,3.324,5.055,5.016h45.641l3.13-3.152c-18.41-3.464-34.11-15.81-41.503-33.576 c-5.768-13.875-5.792-29.164-0.062-43.055c5.723-13.891,16.516-24.715,30.392-30.484c6.903-2.88,14.178-4.34,21.602-4.34 c22.797,0,43.187,13.611,51.946,34.668c1.452,3.479,2.532,7.051,3.26,10.669l39.151-39.452l-2.128-5.117 c-1.398-3.354-4.659-5.381-8.075-5.381c-1.12,0-2.245,0.218-3.339,0.668l-16.562,6.887c-3.378-4.068-7.127-7.757-11.143-11.065 l6.849-16.608c0.884-2.144,0.878-4.543-0.008-6.677c-0.894-2.136-2.586-3.836-4.745-4.729L255.25,77.873 c-1.088-0.45-2.221-0.66-3.331-0.66c-3.432,0-6.685,2.034-8.067,5.396l-6.857,16.626c-2.624-0.242-5.264-0.374-7.911-0.374 c-2.586,0-5.187,0.124-7.797,0.38l-6.887-16.562c-1.398-3.354-4.643-5.38-8.051-5.38c-1.118,0-2.252,0.216-3.347,0.674 L173.79,90.118c-4.441,1.856-6.553,6.965-4.705,11.415l6.895,16.562c-4.084,3.37-7.773,7.113-11.081,11.135L148.307,122.38z"></path> <path d="M229.277,141.964c-5.319,0-10.529,1.048-15.498,3.114c-9.947,4.138-17.688,11.911-21.796,21.873 c-4.107,9.961-4.093,20.934,0.046,30.887c6.895,16.578,24.675,26.199,42.077,24.305l35.12-35.376 c0.752-6.709-0.016-13.526-2.68-19.933C260.258,151.731,245.629,141.964,229.277,141.964z"></path> <path d="M459.26,95.227l-25.173,25.351c-4.427,4.457-11.609,4.473-16.066,0.048c-30.818-30.57-30.291-22.719,6.545-59.835 c9.459-9.521-18.426-26.261-38.256-12.113c-37.862,26.943-34.624,31.283-37.062,80.039L238.128,240.669h84.666l69.122-69.634 l30.344-1.74c15.934-0.908,30.592-9.061,39.763-22.145l9.651-13.758C485.544,113.591,468.858,85.569,459.26,95.227z"></path> <path d="M434.739,264.522H94.963c-10.631,0-20.274,6.195-24.699,15.856L10.257,411.361c-2.244,4.892-1.84,10.591,1.064,15.118 c2.912,4.526,7.921,7.267,13.309,7.267h364.764c6.189,0,11.803-3.603,14.372-9.225l55.673-121.518 c3.852-8.409,3.16-18.2-1.84-25.989C452.605,269.227,443.987,264.522,434.739,264.522z"></path> </g> </g>
                        </svg>

                        <a href="" class="relative block transform transition-all duration-300 hover:-translate-y-1">
                        <span class="mr-2 mt-1 text-gray-800 text-[11px] font-semibold group-hover:text-blue-600 transition-colors duration-300">
                       管理者設定
                        </span>
                        <div class="absolute bottom-0 left-0 w-full h-[2px] bg-blue-500 transform scale-x-0 transition-transform duration-300 group-hover:scale-x-100"></div>

                    </a>
                    </div>





                    <div class="absolute z-10 hidden bg-white divide-y divide-gray-100 shadow-lg group-hover:block top-full left-0">


                        <a href="{{ route('categories.index') }}"
                            class="block px-4 py-2 w-48 hover:bg-sky-500 hover:text-white transition duration-300 font-mono">カテゴリー</a>
                        <a href="{{ route('categories2.index') }}"
                            class="block px-4 py-2 w-48 hover:bg-sky-500 hover:text-white transition duration-300 font-mono">カテゴリー2</a>

                        <a href="{{ route('tags.index') }}"
                            class="block px-4 py-2 w-48 hover:bg-sky-500 hover:text-white transition duration-300 font-mono">タグ</a>

                        <a href="{{ route('admin.user.index') }}"
                            class="block px-4 py-2 w-48 hover:bg-sky-500 hover:text-white transition duration-300 font-mono">求職者管理</a>

                        <a href="{{ route('admin.company.index') }}"
                            class="block px-4 py-2 w-48 hover:bg-sky-500 hover:text-white transition duration-300 font-mono">企業管理</a>

                        <a href="{{ route('admin.applications.index') }}"
                            class="block px-4 py-2 w-48 hover:bg-sky-500 hover:text-white transition duration-300 font-mono">申請管理</a>


                    </div>
                </li>

                @endif












            @if (Auth::check() && Auth::user()->role===('admin'))
                <li class="relative group list-none">
                    <a href="{{ route('jobpost.index') }}"
                       class="relative block transform transition-all duration-300 hover:-translate-y-1">
                        <div class="flex flex-col items-center justify-center w-24 h-16 cursor-pointer bg-white border border-gray-200 hover:bg-gray-100 transition-all duration-300">

                            {{-- Main Icon SVG with hover animation --}}
                            <svg
                            class="w-32 h-32 mt-1"
                            fill="#153c60" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 910.812 910.812" xml:space="preserve" stroke="#153c60"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <g> <g> <path d="M679.137,855.812V727.309l-6.646,9.089c-24.698,33.77-60.519,58.477-100.857,69.567l-30.426,8.367l-35.989,10.135 H360.491v-30h143.098l-0.312-7.877l-1.247-31.529c-1.653-41.805,11.038-83.426,35.734-117.194l141.37-193.294V55 c0-30.375-24.624-55-55-55H245.482l0,0v172.185c0,33.084-26.916,60-60,60H13.299v623.627c0,30.375,24.624,55,55,55h555.838 C654.513,910.812,679.137,886.188,679.137,855.812z M395.512,124.09c0-14.862,10.475-27.661,25.044-30.592 c22.703-4.567,54.793-10.939,69.521-13.469c7.379-1.268,14.122,4.414,14.122,11.902v57.761c0,30.013-24.33,54.343-54.343,54.343 c-30.014,0-54.344-24.33-54.344-54.343V124.09L395.512,124.09z M360.491,251.514c0-16.569,13.431-30,30-30h118.727 c16.569,0,30,13.431,30,30v89.6c0,5.088-4.125,9.213-9.213,9.213H369.703c-5.088,0-9.213-4.125-9.213-9.213L360.491,251.514 L360.491,251.514z M153.218,436.436h386v50h-386V436.436L153.218,436.436z M153.218,547.436h386v30h-386V547.436L153.218,547.436 z"></path> <path d="M185.482,202.185c16.569,0,30-13.432,30-30V4.679V0.001L13.29,202.185h4.705H185.482z"></path> <path d="M894.308,344.713c6.141-10.87,3.313-24.854-7.012-32.404l-10.468-7.656c-10.32-7.547-24.496-6.008-32.995,3.126 c-0.668,0.718-1.305,1.477-1.899,2.288l-7.223,9.875l-9.083,12.418c-3.427-1.298-7.011-1.954-10.581-1.953 c-9.244,0.001-18.364,4.259-24.239,12.292L679.137,495.389L561.982,655.574c-20.804,28.442-31.367,63.09-29.977,98.301 l1.247,31.529l30.426-8.365c33.979-9.342,63.794-29.908,84.598-58.352l30.859-42.197l197.967-270.677 c8.146-11.137,7.48-26.012-0.69-36.327l9.073-12.404l7.225-9.878C893.301,346.395,893.829,345.562,894.308,344.713z"></path> </g> </g> </g> </g></svg>

                            {{-- Label with hover effect --}}
                            <span class="mr-2 mt-1 text-gray-800 text-[11px] font-medium group-hover:text-blue-600 transition-colors duration-300 font-semibold">
                             投稿管理
                            </span>

                            {{-- Subtle hover indicator line --}}
                            <div class="absolute bottom-0 left-0 w-full h-[2px] bg-blue-500 transform scale-x-0 transition-transform duration-300 group-hover:scale-x-100"></div>
                        </div>
                    </a>
                </li>

                <li class="relative group list-none">
                    <a href="{{ route('jobpost.pending') }}"
                       class="relative block transform transition-all duration-300 hover:-translate-y-1">
                        <div class="flex flex-col items-center justify-center w-24 h-16 cursor-pointer bg-white border border-gray-200 hover:bg-gray-100 transition-all duration-300">

                            {{-- Main Icon SVG with hover animation --}}
                            <svg
                            class="w-32 h-32 mt-1"
                            fill="#153c60" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 910.812 910.812" xml:space="preserve" stroke="#153c60"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <g> <g> <path d="M679.137,855.812V727.309l-6.646,9.089c-24.698,33.77-60.519,58.477-100.857,69.567l-30.426,8.367l-35.989,10.135 H360.491v-30h143.098l-0.312-7.877l-1.247-31.529c-1.653-41.805,11.038-83.426,35.734-117.194l141.37-193.294V55 c0-30.375-24.624-55-55-55H245.482l0,0v172.185c0,33.084-26.916,60-60,60H13.299v623.627c0,30.375,24.624,55,55,55h555.838 C654.513,910.812,679.137,886.188,679.137,855.812z M395.512,124.09c0-14.862,10.475-27.661,25.044-30.592 c22.703-4.567,54.793-10.939,69.521-13.469c7.379-1.268,14.122,4.414,14.122,11.902v57.761c0,30.013-24.33,54.343-54.343,54.343 c-30.014,0-54.344-24.33-54.344-54.343V124.09L395.512,124.09z M360.491,251.514c0-16.569,13.431-30,30-30h118.727 c16.569,0,30,13.431,30,30v89.6c0,5.088-4.125,9.213-9.213,9.213H369.703c-5.088,0-9.213-4.125-9.213-9.213L360.491,251.514 L360.491,251.514z M153.218,436.436h386v50h-386V436.436L153.218,436.436z M153.218,547.436h386v30h-386V547.436L153.218,547.436 z"></path> <path d="M185.482,202.185c16.569,0,30-13.432,30-30V4.679V0.001L13.29,202.185h4.705H185.482z"></path> <path d="M894.308,344.713c6.141-10.87,3.313-24.854-7.012-32.404l-10.468-7.656c-10.32-7.547-24.496-6.008-32.995,3.126 c-0.668,0.718-1.305,1.477-1.899,2.288l-7.223,9.875l-9.083,12.418c-3.427-1.298-7.011-1.954-10.581-1.953 c-9.244,0.001-18.364,4.259-24.239,12.292L679.137,495.389L561.982,655.574c-20.804,28.442-31.367,63.09-29.977,98.301 l1.247,31.529l30.426-8.365c33.979-9.342,63.794-29.908,84.598-58.352l30.859-42.197l197.967-270.677 c8.146-11.137,7.48-26.012-0.69-36.327l9.073-12.404l7.225-9.878C893.301,346.395,893.829,345.562,894.308,344.713z"></path> </g> </g> </g> </g></svg>

                            {{-- Label with hover effect --}}
                            <span class="mr-2 mt-1 text-gray-800 text-[11px] font-medium group-hover:text-blue-600 transition-colors duration-300 font-semibold">
                             投稿管理App
                            </span>

                            {{-- Subtle hover indicator line --}}
                            <div class="absolute bottom-0 left-0 w-full h-[2px] bg-blue-500 transform scale-x-0 transition-transform duration-300 group-hover:scale-x-100"></div>
                        </div>
                    </a>
                </li>
            @endif


            @if (Auth::check() && Auth::user()->role===('company'))
                <li class="relative group list-none">
                    <a href="{{ route('company.employer') }}"
                       class="relative block transform transition-all duration-300 hover:-translate-y-1">
                        <div class="flex flex-col items-center justify-center w-24 h-16 cursor-pointer bg-white border border-gray-200 hover:bg-gray-100 transition-all duration-300">

                            {{-- Main Icon SVG with hover animation --}}
                            <svg
                            class="w-32 h-32 mt-1"
                            fill="#153c60" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 910.812 910.812" xml:space="preserve" stroke="#153c60"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <g> <g> <path d="M679.137,855.812V727.309l-6.646,9.089c-24.698,33.77-60.519,58.477-100.857,69.567l-30.426,8.367l-35.989,10.135 H360.491v-30h143.098l-0.312-7.877l-1.247-31.529c-1.653-41.805,11.038-83.426,35.734-117.194l141.37-193.294V55 c0-30.375-24.624-55-55-55H245.482l0,0v172.185c0,33.084-26.916,60-60,60H13.299v623.627c0,30.375,24.624,55,55,55h555.838 C654.513,910.812,679.137,886.188,679.137,855.812z M395.512,124.09c0-14.862,10.475-27.661,25.044-30.592 c22.703-4.567,54.793-10.939,69.521-13.469c7.379-1.268,14.122,4.414,14.122,11.902v57.761c0,30.013-24.33,54.343-54.343,54.343 c-30.014,0-54.344-24.33-54.344-54.343V124.09L395.512,124.09z M360.491,251.514c0-16.569,13.431-30,30-30h118.727 c16.569,0,30,13.431,30,30v89.6c0,5.088-4.125,9.213-9.213,9.213H369.703c-5.088,0-9.213-4.125-9.213-9.213L360.491,251.514 L360.491,251.514z M153.218,436.436h386v50h-386V436.436L153.218,436.436z M153.218,547.436h386v30h-386V547.436L153.218,547.436 z"></path> <path d="M185.482,202.185c16.569,0,30-13.432,30-30V4.679V0.001L13.29,202.185h4.705H185.482z"></path> <path d="M894.308,344.713c6.141-10.87,3.313-24.854-7.012-32.404l-10.468-7.656c-10.32-7.547-24.496-6.008-32.995,3.126 c-0.668,0.718-1.305,1.477-1.899,2.288l-7.223,9.875l-9.083,12.418c-3.427-1.298-7.011-1.954-10.581-1.953 c-9.244,0.001-18.364,4.259-24.239,12.292L679.137,495.389L561.982,655.574c-20.804,28.442-31.367,63.09-29.977,98.301 l1.247,31.529l30.426-8.365c33.979-9.342,63.794-29.908,84.598-58.352l30.859-42.197l197.967-270.677 c8.146-11.137,7.48-26.012-0.69-36.327l9.073-12.404l7.225-9.878C893.301,346.395,893.829,345.562,894.308,344.713z"></path> </g> </g> </g> </g></svg>

                            {{-- Label with hover effect --}}
                            <span class="mr-2 mt-1 text-gray-800 text-[11px] font-medium group-hover:text-blue-600 transition-colors duration-300 font-semibold">
                            申請管理(企業)
                            </span>

                            {{-- Subtle hover indicator line --}}
                            <div class="absolute bottom-0 left-0 w-full h-[2px] bg-blue-500 transform scale-x-0 transition-transform duration-300 group-hover:scale-x-100"></div>
                        </div>
                    </a>
                </li>


                <li class="relative group list-none">
                    <a href="{{ route('jobpost.create') }}"
                       class="relative block transform transition-all duration-300 hover:-translate-y-1">
                        <div class="flex flex-col items-center justify-center w-24 h-16 cursor-pointer bg-white border border-gray-200 hover:bg-gray-100 transition-all duration-300">
                        <img width="32" height="32" src="https://img.icons8.com/external-flaticons-lineal-color-flat-icons/64/external-job-working-stress-flaticons-lineal-color-flat-icons.png" alt="external-job-working-stress-flaticons-lineal-color-flat-icons"/>
                            {{-- Main Icon SVG with hover animation --}}

                            {{-- Label with hover effect --}}
                            <span class="mr-2 mt-1 text-gray-800 text-[11px] font-medium group-hover:text-blue-600 transition-colors duration-300 font-semibold">
                            新規投稿作成
                            </span>

                            {{-- Subtle hover indicator line --}}
                            <div class="absolute bottom-0 left-0 w-full h-[2px] bg-blue-500 transform scale-x-0 transition-transform duration-300 group-hover:scale-x-100"></div>
                        </div>
                    </a>
                </li>
            @endif



                <li class="relative group list-none">
                    <div
                        class="flex flex-col items-center justify-center w-24 h-16 cursor-pointer bg-white border border-gray-200 hover:bg-gray-100">


                      <svg
                      class="mt-1 w-32 h-32"
                      height="200px" width="200px" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512" xml:space="preserve" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path style="fill:#1E0478;" d="M450.876,411.53v88.942c0,6.364-5.165,11.528-11.528,11.528H338.117H173.883H72.652 c-6.364,0-11.528-5.165-11.528-11.528V411.53c0-42.724,34.043-77.632,76.422-79.062c0.415-0.046,59.325,1.706,68.121-61.562 c-28.614-19.944-49.595-56.478-55.313-100.574c-1.13-1.084-2.075-2.398-2.698-3.931c-2.34-5.707-4.3-11.667-5.856-17.731 c-7.321-28.729-5.072-58.461,6.329-83.719c11.747-26.008,31.761-44.246,56.362-51.348c5.142-1.487,10.514-2.456,15.99-2.871 C234.834,3.608,250.028,0,265.684,0c59.89,0,108.621,52.547,108.621,117.14c0,16.82-3.24,33.075-9.626,48.281 c-0.68,1.614-1.683,2.974-2.894,4.07c-3.528,28.256-13.442,54.368-28.821,75.188c-7.908,10.71-16.878,19.529-26.619,26.319 c8.762,63.164,67.695,61.423,68.11,61.47C416.833,333.898,450.876,368.806,450.876,411.53z M427.82,488.943V411.53 c0-30.919-25.155-56.074-56.086-56.074c-0.415,0-16.878,0-33.594-7.102l-61.619,87.754c-2.34,3.332-5.43,5.995-8.946,7.828 c-3.528,1.821-7.47,2.824-11.551,2.824c-8.151,0-15.817-3.989-20.509-10.652l-61.619-87.766 c-14.664,6.663-33.213,7.113-33.628,7.113c-30.931,0-56.086,25.155-56.086,56.074v77.413h89.703h164.234L427.82,488.943 L427.82,488.943z M351.132,121.786c0.069-1.545,0.115-3.09,0.115-4.646c0-51.878-38.39-94.083-85.564-94.083 c-12.704,0-25.074,3.113-36.741,9.246c-1.499,0.784-3.159,1.234-4.842,1.303c-4.554,0.208-9.004,0.934-13.212,2.144 c-37.709,10.894-58.634,58.253-47.036,105.958c12.451-13.073,21.535-29.19,26.077-46.69c1.556-5.937,6.698-10.18,12.82-10.572 c6.099-0.38,11.701,3.159,13.972,8.808c1.464,3.666,3.92,6.848,7.102,9.223c3.724,2.778,8.162,4.242,12.831,4.242h78.578 C329.263,106.719,341.979,112.494,351.132,121.786z M340.192,146.226c0-0.081,0.012-0.161,0.012-0.242 c-4.277-9.546-13.857-16.209-24.971-16.209h-78.578c-9.684,0-18.884-3.055-26.619-8.819c-1.245-0.934-2.444-1.925-3.574-2.974 c-7.493,17.892-18.987,34.032-33.536,46.99c3.113,27.092,12.935,51.843,27.933,70.173c15.367,18.768,34.954,29.109,55.163,29.109 C302.436,264.254,340.192,211.304,340.192,146.226z M257.649,422.851l60.536-86.21c-17.074-13.189-29.305-32.36-33.525-54.345 c-9.2,3.297-18.803,5.015-28.637,5.015c-9.914,0-19.529-1.775-28.671-5.084c-4.208,22.008-16.428,41.191-33.513,54.403 l60.547,86.221c0.404,0.565,0.945,0.853,1.637,0.853C256.703,423.704,257.257,423.416,257.649,422.851z"></path> <path style="fill:#6F7CCD;" d="M427.82,411.53v77.413h-89.703H173.883H84.18V411.53c0-30.919,25.155-56.074,56.086-56.074 c0.415,0,18.964-0.45,33.628-7.113l61.619,87.766c4.692,6.663,12.358,10.652,20.509,10.652c4.081,0,8.024-1.003,11.551-2.824 c3.516-1.833,6.606-4.496,8.946-7.828l61.619-87.754c16.716,7.102,33.179,7.102,33.594,7.102 C402.664,355.456,427.82,380.611,427.82,411.53z"></path> <path style="fill:#9B8CCC;" d="M351.248,117.14c0,1.556-0.046,3.101-0.115,4.646c-9.154-9.292-21.869-15.068-35.899-15.068h-78.578 c-4.669,0-9.107-1.464-12.831-4.242c-3.182-2.375-5.637-5.557-7.102-9.223c-2.271-5.649-7.874-9.188-13.972-8.808 c-6.122,0.392-11.263,4.634-12.82,10.572c-4.542,17.5-13.627,33.617-26.077,46.69c-11.598-47.705,9.326-95.063,47.036-105.958 c4.208-1.21,8.658-1.937,13.212-2.144c1.683-0.069,3.343-0.519,4.842-1.303c11.667-6.133,24.037-9.246,36.741-9.246 C312.858,23.057,351.248,65.262,351.248,117.14z"></path> <g> <path style="fill:#FFFFFF;" d="M340.204,145.984c0,0.081-0.012,0.161-0.012,0.242c0,65.078-37.756,118.028-84.169,118.028 c-20.209,0-39.796-10.341-55.163-29.109c-14.998-18.33-24.821-43.082-27.933-70.173c14.549-12.958,26.043-29.098,33.536-46.99 c1.13,1.049,2.329,2.041,3.574,2.974c7.736,5.764,16.935,8.819,26.619,8.819h78.578 C326.346,129.775,335.927,136.439,340.204,145.984z"></path> <path style="fill:#FFFFFF;" d="M318.184,336.641l-60.536,86.21c-0.392,0.565-0.945,0.853-1.626,0.853 c-0.692,0-1.234-0.288-1.637-0.853l-60.547-86.221c17.085-13.212,29.305-32.395,33.513-54.403 c9.142,3.309,18.757,5.084,28.671,5.084c9.834,0,19.437-1.718,28.637-5.015C288.879,304.281,301.111,323.453,318.184,336.641z"></path> </g> </g></svg>

                        <div class="relative block">

                        <span class="mr-2 mt-1 text-gray-800 text-[11px]  group-hover:text-blue-600 transition-colors duration-300 font-semibold">
                            プロフィール
                        </span>
                        <div class="absolute bottom-0 left-0 w-full h-[2px] bg-blue-500 transform scale-x-0 transition-transform duration-300 group-hover:scale-x-100"></div>

                    </div>

                    <div class="absolute z-50 hidden bg-white divide-y divide-gray-100 shadow-lg group-hover:block top-full left-0 w-48 rounded-md border border-gray-200">
                        <!-- User Info -->

                        <p class="text-xs font-medium text-gray-900 mt-2 px-2">{{ Auth::user()->name }}</p>
                        <p class="text-xs text-gray-500 truncate mt-2 px-2 mb-2">{{ Auth::user()->email }}</p>
                        <a href="{{ route('dashboard') }}"
                            class="block px-4 py-2 w-48 hover:bg-sky-500 hover:text-white transition duration-300 font-mono">ダッシュボード</a>
                        <a href="{{ route('profile.edit') }}"
                            class="block px-4 py-2 w-48 hover:bg-sky-500 hover:text-white transition duration-300 font-mono">マイページ</a>

                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <a href="{{ route('logout') }}"
                                   onclick="event.preventDefault(); this.closest('form').submit();"
                                   class="flex items-center px-4 py-2 text-sm text-red-600 hover:bg-red-600 hover:text-white transition-colors duration-150 font-mono">
                                    <svg class="mr-3 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                                    </svg>
                                    ログアウト
                                </a>
                            </form>
                    </div>
                </li>

                <a href="{{ route('notifications.index') }}" class="relative flex items-center">
                    <svg
                        class="bell-icon w-10 h-10"
                 height="200px" width="200px" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512" xml:space="preserve" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path style="fill:#FFAA00;" d="M256,100.174c-27.619,0-50.087-22.468-50.087-50.087S228.381,0,256,0s50.087,22.468,50.087,50.087 S283.619,100.174,256,100.174z M256,33.391c-9.196,0-16.696,7.5-16.696,16.696s7.5,16.696,16.696,16.696 c9.196,0,16.696-7.5,16.696-16.696S265.196,33.391,256,33.391z"></path> <path style="fill:#F28D00;" d="M256.006,0v33.394c9.194,0.003,16.69,7.5,16.69,16.693s-7.496,16.69-16.69,16.693v33.394 c27.618-0.004,50.081-22.469,50.081-50.087S283.624,0.004,256.006,0z"></path> <path style="fill:#FFAA00;" d="M256,512c-46.043,0-83.478-37.435-83.478-83.478c0-9.228,7.467-16.696,16.696-16.696h133.565 c9.228,0,16.696,7.467,16.696,16.696C339.478,474.565,302.043,512,256,512z"></path> <path style="fill:#F28D00;" d="M322.783,411.826h-66.777V512c46.042-0.004,83.473-37.437,83.473-83.478 C339.478,419.293,332.011,411.826,322.783,411.826z"></path> <path style="fill:#FFDA44;" d="M439.652,348.113v-97.678C439.642,149,357.435,66.793,256,66.783 C154.565,66.793,72.358,149,72.348,250.435v97.678c-19.41,6.901-33.384,25.233-33.391,47.017 c0.01,27.668,22.419,50.075,50.087,50.085h333.913c27.668-0.01,50.077-22.417,50.087-50.085 C473.036,373.346,459.063,355.014,439.652,348.113z"></path> <path style="fill:#FFAA00;" d="M439.652,348.113v-97.678C439.642,149,357.435,66.793,256,66.783v378.432h166.957 c27.668-0.01,50.077-22.417,50.087-50.085C473.036,373.346,459.063,355.014,439.652,348.113z"></path> <path style="fill:#FFF3DB;" d="M155.826,267.13c-9.228,0-16.696-7.467-16.696-16.696c0-47.022,28.011-89.283,71.381-107.641 c8.446-3.587,18.294,0.326,21.88,8.836c3.62,8.51-0.358,18.294-8.836,21.88c-31.012,13.142-51.033,43.337-51.033,76.925 C172.522,259.663,165.054,267.13,155.826,267.13z"></path> </g></svg>


                 @php $unreadCount = auth()->user()->unreadNotifications()->count() @endphp
                 @if($unreadCount > 0)
                     <span class="badge text-red-400 text-md font-bold">{{ $unreadCount }}</span>
                 @endif
                </a>





                {{-- <div class="flex items-center space-x-3 text-sm px-5">
                    <a href="{{ route('language.switch', 'jp') }}"
                       class="text-gray-800 hover:text-red-400 font-medium {{ app()->getLocale() == 'jp' ? 'font-bold' : '' }}">
                        JP
                    </a>
                    <span class="text-gray-300">|</span>
                    <a href="{{ route('language.switch', 'en') }}"
                       class="text-gray-800 hover:text-blue-600 font-medium {{ app()->getLocale() == 'en' ? 'font-bold' : '' }}">
                        EN
                    </a>
                </div> --}}









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

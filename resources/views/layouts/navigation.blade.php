<nav x-data="{ open: false }" class="bg-white shadow-lg">
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
                                class="w-32 h-32 mt-1"
                                fill="#153c60" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 935.996 935.996" xml:space="preserve" stroke="#489da8"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <g> <g> <path d="M76.416,653.994c-0.738-0.698-1.469-1.405-2.191-2.129c-20.776-20.774-32.218-48.399-32.218-77.781V91.273 c0-10.925,2.949-21.168,8.072-30H30c-16.569,0-30,13.431-30,30v482.81C0,617.066,33.898,652.119,76.416,653.994z"></path> <path d="M466.439,167.209c-37.812,0-62.039,32.671-62.039,86.268c0,53.963,24.229,88.47,62.039,88.47 c37.809,0,62.04-34.507,62.04-88.47C528.479,199.88,504.25,167.209,466.439,167.209z"></path> <path d="M663.203,326.476c16.695,3.021,33.004,7.845,48.791,14.442c27.19-2.972,42.25-16.047,42.25-39.72 c0-24.962-19.09-36.71-55.064-36.71h-35.977V326.476L663.203,326.476z"></path> <path d="M741.396,198.779c0-22.026-15.785-31.203-46.988-31.203h-31.203v66.444h30.469 C727.078,234.02,741.396,221.172,741.396,198.779z"></path> <path d="M152.007,654.083h251.63c-0.354-0.809-0.718-1.612-1.063-2.43c-11.71-27.686-17.939-56.992-18.56-87.18H185.73 c-8.284,0-15-6.717-15-15c0-8.285,6.716-15,15-15h199.533c2.204-21.082,7.203-41.642,14.963-61.41H185.73 c-8.284,0-15-6.715-15-15s6.716-15,15-15H414.5c10.515-18.622,23.498-35.718,38.81-51.03c4.551-4.551,9.269-8.885,14.128-13.022 c-0.334,0.003-0.665,0.012-1,0.012c-62.406,0-105.725-47.724-105.725-125.547c0-77.458,43.317-123.344,105.725-123.344 c62.772,0,106.09,45.887,106.09,123.344c0,31.861-7.265,58.673-20.148,79.234c22.021-6.643,44.877-10.018,68.24-10.029V134.537 h76.723c49.56,0,85.9,15.051,85.9,59.102c0,22.76-13.215,44.786-41.115,52.128v1.468c34.506,5.874,53.596,24.596,53.596,56.899 c0,30.077-15.364,50.103-39.809,60.885c11.469,7.987,22.254,16.999,32.271,27.015c19.976,19.975,35.996,42.984,47.722,68.465 c1.033,2.248,2.047,4.508,3.014,6.793c12.355,29.213,18.621,60.227,18.621,92.182c0,31.953-6.266,62.967-18.621,92.18 c-0.25,0.588-0.514,1.168-0.768,1.754c39.344-5.031,69.76-38.612,69.76-79.324V91.273c0-16.569-13.43-30-30-30h-72.004H102.007 c-16.568,0-30,13.431-30,30v482.811C72.007,618.267,107.825,654.083,152.007,654.083z M199.561,316.617 c9.545,17.621,22.76,25.33,37.444,25.33c22.393,0,33.773-12.114,33.773-46.254V134.537h42.583v164.826 c0,43.685-21.292,79.66-71.583,79.66c-33.406,0-56.533-13.95-71.584-40.747L199.561,316.617z"></path> <path d="M788.188,726.914c-11.772,11.773-24.606,22.164-38.37,31.125l102.289,102.289c9.596,9.597,22.172,14.396,34.747,14.396 c12.578,0,25.152-4.799,34.75-14.396c19.189-19.188,19.189-50.305,0-69.496L819.312,688.541 C810.354,702.306,799.961,715.14,788.188,726.914z"></path> <path d="M432.832,473.064c-8.789,19.082-14.756,39.729-17.369,61.41c-0.987,8.195-1.509,16.535-1.509,25 c0,1.672,0.024,3.338,0.063,5c0.765,32.236,8.908,62.646,22.806,89.608c2.644,5.132,5.504,10.132,8.554,15 c3.23,5.156,6.677,10.162,10.335,15c37.751,49.923,97.623,82.187,165.037,82.187c39.293,0,76.025-10.961,107.311-29.988 c22.388-13.617,41.978-31.373,57.726-52.197c3.66-4.838,7.104-9.844,10.336-15c0.479-0.766,0.965-1.526,1.436-2.301 c2.519-4.139,4.892-8.377,7.117-12.699c4.596-8.911,8.559-18.2,11.836-27.807c7.15-20.957,11.035-43.426,11.035-66.803 c0-81.051-46.635-151.197-114.527-185.105c-27.776-13.873-59.106-21.69-92.268-21.69c-0.043,0-0.086,0.002-0.129,0.002 c-70.984,0.043-133.594,35.854-170.801,90.383C443.36,452.53,437.669,462.561,432.832,473.064z"></path> </g> </g> </g> </g></svg>

                                {{-- Label with hover effect --}}
                                <span class="mr-2 mt-1 text-gray-800 text-[11px] font-semibold group-hover:text-blue-600 transition-colors duration-300">
                                   ホーム
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












            @if (Auth::check() && Auth::user()->role===('admin')|| Auth::user()->role===('company'))
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
            @endif



                <li class="relative group list-none">
                    <div
                        class="flex flex-col items-center justify-center w-24 h-16 cursor-pointer bg-white border border-gray-200 hover:bg-gray-100">


                        <svg
                              class="w-32 h-32 mt-1"
                        fill="#153c60" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 866.477 866.477" xml:space="preserve"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <g> <path d="M256.274,227.431V126.358c0-38.084,26.84-70.887,64.172-78.419C394.391,33.022,512.36,9.486,564.216,0.578 c24.029-4.128,45.986,14.375,45.986,38.757v188.096c0,97.734-79.229,176.964-176.964,176.964 C335.503,404.395,256.274,325.165,256.274,227.431z M645.245,447.008h-70.188c-13.928,0-26.022,9.584-29.206,23.142 l-41.408,176.348c-3.917,16.678-13.453,30.846-26.311,40.713c3.661-19.416,3.647-39.363-0.082-58.801l-30.357-117.181 l20.709-45.702c3.933-8.679-2.413-18.519-11.939-18.519h-46.446c-9.527,0-15.872,9.84-11.94,18.519l20.709,45.702l-30.357,117.181 c-3.731,19.438-3.745,39.385-0.083,58.801c-12.857-9.867-22.394-24.033-26.311-40.713l-41.408-176.348 c-3.184-13.558-15.278-23.142-29.206-23.142h-70.189c-44.183,0-80,35.816-80,80v309.469c0,16.568,13.432,30,30,30h262.007h262.007 c16.568,0,30-13.432,30-30V527.008C725.245,482.824,689.429,447.008,645.245,447.008z"></path> </g> </g> </g></svg>
                       <a href="" class="relative block transform transition-all duration-300 hover:-translate-y-1">
                        <span class="mr-2 mt-1 text-gray-800 text-[11px]  group-hover:text-blue-600 transition-colors duration-300 font-semibold">
                            プロフィール
                        </span>
                        <div class="absolute bottom-0 left-0 w-full h-[2px] bg-blue-500 transform scale-x-0 transition-transform duration-300 group-hover:scale-x-100"></div>

                    </a>
                    </div>





                    <div class="absolute z-10 hidden bg-white divide-y divide-gray-100 shadow-lg group-hover:block top-full left-0">

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



                <a href="" class="relative flex items-center">
                    <!-- Modified this line -->
                    <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                            d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9">
                        </path>
                    </svg>

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

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

            0%,
            100% {
                transform: rotate(0deg);
            }

            25% {
                transform: rotate(-15deg);
            }

            75% {
                transform: rotate(15deg);
            }
        }
    </style>



    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->





                <div class="flex items-center">
                    <a href="" class="flex items-center space-x-2">

                        <div class="hover:opacity-80 ">
                            <img src="{{ asset('images/logo22.png') }}" alt="人材紹介" class="w-16 h-16">



                        </div>
                        <p class=" text-2xl font-bold text-sky-600"><span class="text-orange-500">人材</span>紹介</p>
                    </a>
                </div>

                <!-- Navigation Links -->


            </div>



            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">





                <div class="hidden md:flex md:items-center md:py-6">

                    @if ((Auth::check() && Auth::user()->role === 'admin') || Auth::user()->role === 'jobseeker')
                        <li class="relative group list-none">
                            <a href="{{ route('main') }}"
                                class="relative block transform transition-all duration-300 hover:-translate-y-1">
                                <div
                                    class="flex flex-col items-center justify-center w-24 h-16 cursor-pointer bg-white border border-gray-200 hover:bg-gray-100 transition-all duration-300">

                                    {{-- Main Icon SVG with hover animation --}}
                                    <svg class="w-16 h-16 mt-1" viewBox="0 0 100 100"
                                        enable-background="new 0 0 100 100" id="Layer_1" version="1.1"
                                        xml:space="preserve" xmlns="http://www.w3.org/2000/svg"
                                        xmlns:xlink="http://www.w3.org/1999/xlink" fill="#000000">
                                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round">
                                        </g>
                                        <g id="SVGRepo_iconCarrier">
                                            <g>
                                                <g>
                                                    <rect clip-rule="evenodd" fill="#F2F2F2" fill-rule="evenodd"
                                                        height="83.437" width="67.025" x="9.012" y="7.604"></rect>
                                                    <path
                                                        d="M77.454,92.458H7.595V6.187h69.859V92.458z M10.429,89.624H74.62V9.021H10.429V89.624z">
                                                    </path>
                                                </g>
                                                <g>
                                                    <rect clip-rule="evenodd" fill="#7bc50d" fill-rule="evenodd"
                                                        height="10.481" width="17.952" x="46.695" y="34.866"></rect>
                                                </g>
                                                <g>
                                                    <rect height="2.834" width="19.463" x="20.504" y="35.575"></rect>
                                                </g>
                                                <g>
                                                    <rect height="2.834" width="15.561" x="20.718" y="42.508"></rect>
                                                </g>
                                                <g>
                                                    <rect height="2.833" width="15.562" x="20.813" y="49.514"></rect>
                                                </g>
                                                <g>
                                                    <rect height="2.833" width="27.128" x="20.718" y="56.753"></rect>
                                                </g>
                                                <g>
                                                    <rect height="2.833" width="23.51" x="20.718" y="63.688"></rect>
                                                </g>
                                                <g>
                                                    <rect clip-rule="evenodd" fill="#39B6CC" fill-rule="evenodd"
                                                        height="9.004" width="44.095" x="20.553" y="19.064"></rect>
                                                </g>
                                                <g>
                                                    <rect height="2.833" width="26.272" x="20.718" y="70.32"></rect>
                                                </g>
                                                <g>
                                                    <rect height="2.834" width="32.8" x="20.718" y="77.253"></rect>
                                                </g>
                                                <g>
                                                    <rect height="2.834" width="3.235" x="38.304" y="42.508"></rect>
                                                </g>
                                                <g>
                                                    <path clip-rule="evenodd"
                                                        d="M77.931,71.902l4.287,4.427l-6.644,6.437l-4.309-4.457 C74.147,76.998,76.504,74.726,77.931,71.902L77.931,71.902z"
                                                        fill="#F2F2F2" fill-rule="evenodd"></path>
                                                    <path
                                                        d="M75.542,84.77l-6.692-6.92l1.828-0.831c2.579-1.174,4.706-3.218,5.989-5.756l0.897-1.776l6.656,6.874L75.542,84.77z M73.584,78.669l2.023,2.091l4.605-4.463l-2.007-2.074C76.994,76.012,75.414,77.531,73.584,78.669z">
                                                    </path>
                                                </g>
                                                <g>
                                                    <polygon clip-rule="evenodd" fill="#39B6CC" fill-rule="evenodd"
                                                        points="83.267,75.319 91.984,84.338 83.247,92.779 74.535,83.761 ">
                                                    </polygon>
                                                    <path
                                                        d="M83.213,94.783L72.531,83.726l10.771-10.41l10.687,11.056L83.213,94.783z M76.538,83.794l6.744,6.981l6.698-6.472 l-6.748-6.981L76.538,83.794z">
                                                    </path>
                                                </g>
                                                <g>
                                                    <path clip-rule="evenodd"
                                                        d="M66.124,50.799c7.742,0,14.018,6.276,14.018,14.019 s-6.275,14.019-14.018,14.019c-7.743,0-14.019-6.276-14.019-14.019S58.381,50.799,66.124,50.799L66.124,50.799z"
                                                        fill="#F2F2F2" fill-rule="evenodd"></path>
                                                    <path
                                                        d="M66.124,80.253c-8.511,0-15.435-6.924-15.435-15.435s6.924-15.435,15.435-15.435S81.56,56.307,81.56,64.818 S74.635,80.253,66.124,80.253z M66.124,52.216c-6.949,0-12.601,5.653-12.601,12.602s5.651,12.601,12.601,12.601 c6.948,0,12.602-5.652,12.602-12.601S73.072,52.216,66.124,52.216z">
                                                    </path>
                                                </g>
                                                <g>
                                                    <rect height="2.833" width="10.313" x="39.902" y="49.514"></rect>
                                                </g>
                                                <g>
                                                    <path
                                                        d="M76.404,65.586H73.57c0-0.636-0.068-1.255-0.205-1.84c-0.043-0.186-0.096-0.385-0.169-0.63l2.717-0.808 c0.091,0.304,0.158,0.559,0.215,0.801C76.31,63.901,76.404,64.735,76.404,65.586z M72.438,61.433 c-1.489-2.5-4.203-4.058-7.084-4.061l0.004-2.834c3.871,0.005,7.518,2.091,9.516,5.445L72.438,61.433z">
                                                    </path>
                                                </g>
                                            </g>
                                        </g>
                                    </svg>

                                    {{-- Label with hover effect --}}
                                    <span
                                        class="mr-2 mt-1 text-gray-800 text-[11px] font-semibold group-hover:text-blue-600 transition-colors duration-300">
                                        ホーム
                                    </span>

                                    {{-- Subtle hover indicator line --}}
                                    <div
                                        class="absolute bottom-0 left-0 w-full h-[2px] bg-blue-500 transform scale-x-0 transition-transform duration-300 group-hover:scale-x-100">
                                    </div>
                                </div>
                            </a>
                        </li>

                        <li class="relative group list-none">
                            <a href="{{ route('liked.index') }}"
                                class="relative block transform transition-all duration-300 hover:-translate-y-1">
                                <div
                                    class="flex flex-col items-center justify-center w-24 h-16 cursor-pointer bg-white border border-gray-200 hover:bg-gray-100 transition-all duration-300">

                                    {{-- Main Icon SVG with hover animation --}}
                                    <svg class="w-16 h-16 mt-1" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"
                                        fill="#000000">
                                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round">
                                        </g>
                                        <g id="SVGRepo_iconCarrier">
                                            <defs>
                                                <style>
                                                    .cls-1 {
                                                        fill: #ffce69;
                                                    }

                                                    .cls-2 {
                                                        fill: #f19b5f;
                                                    }

                                                    .cls-3 {
                                                        fill: #6c2e7c;
                                                    }
                                                </style>
                                            </defs>
                                            <g id="Icons">
                                                <path class="cls-1"
                                                    d="M12.992,20.912l3.5,1.838A2.131,2.131,0,0,0,19.58,20.5l-.667-3.893a2.129,2.129,0,0,1,.613-1.887l2.828-2.757a2.131,2.131,0,0,0-1.181-3.635l-3.909-.568a2.133,2.133,0,0,1-1.6-1.166L13.911,3.056a2.131,2.131,0,0,0-3.822,0L8.341,6.6a2.133,2.133,0,0,1-1.6,1.166l-3.909.568a2.131,2.131,0,0,0-1.181,3.635l2.828,2.757a2.129,2.129,0,0,1,.613,1.887L4.42,20.5A2.131,2.131,0,0,0,7.512,22.75l3.5-1.838A2.135,2.135,0,0,1,12.992,20.912Z">
                                                </path>
                                                <path class="cls-2"
                                                    d="M16.49,22.75l-3.5-1.84a2.162,2.162,0,0,0-1.98,0l-3.5,1.84A2.132,2.132,0,0,1,4.42,20.5l.55-3.18a2.114,2.114,0,0,0,2.54.43l3.5-1.84a2.162,2.162,0,0,1,1.98,0l3.5,1.84a2.114,2.114,0,0,0,2.54-.43l.55,3.18A2.132,2.132,0,0,1,16.49,22.75Z">
                                                </path>
                                            </g>
                                            <g data-name="Layer 4" id="Layer_4">
                                                <path class="cls-3"
                                                    d="M23.053,12.683a3.132,3.132,0,0,0-1.737-5.341l-3.909-.568a1.13,1.13,0,0,1-.851-.619L14.808,2.614a3.131,3.131,0,0,0-5.616,0L7.444,6.155a1.13,1.13,0,0,1-.851.619l-3.909.568A3.132,3.132,0,0,0,.947,12.684L3.776,15.44a1.131,1.131,0,0,1,.326,1l-.667,3.892a3.131,3.131,0,0,0,4.542,3.3l3.5-1.838a1.125,1.125,0,0,1,1.052,0h0l3.5,1.838a3.11,3.11,0,0,0,3.3-.239,3.109,3.109,0,0,0,1.245-3.063L19.9,16.441a1.13,1.13,0,0,1,.326-1Zm-4.226,1.325a3.131,3.131,0,0,0-.9,2.772l.667,3.892a1.131,1.131,0,0,1-1.642,1.193l-3.5-1.838a3.134,3.134,0,0,0-2.914,0l-3.5,1.838a1.131,1.131,0,0,1-1.642-1.193l.667-3.891a3.132,3.132,0,0,0-.9-2.773L2.344,11.251a1.132,1.132,0,0,1,.627-1.93L6.88,8.753A3.128,3.128,0,0,0,9.237,7.04L10.985,3.5a1.165,1.165,0,0,1,2.03,0L14.763,7.04A3.128,3.128,0,0,0,17.12,8.753l3.909.568a1.132,1.132,0,0,1,.627,1.93Z">
                                                </path>
                                            </g>
                                        </g>
                                    </svg>

                                    {{-- Label with hover effect --}}
                                    <span
                                        class="mr-2 mt-1 text-gray-800 text-[11px] font-semibold group-hover:text-blue-600 transition-colors duration-300">
                                        お気に入り
                                    </span>

                                    {{-- Subtle hover indicator line --}}
                                    <div
                                        class="absolute bottom-0 left-0 w-full h-[2px] bg-blue-500 transform scale-x-0 transition-transform duration-300 group-hover:scale-x-100">
                                    </div>
                                </div>
                            </a>
                        </li>
                    @endif

                    <!--end-->



                    @if (Auth::check() && Auth::user()->role === 'company')
                        <li class="relative group list-none">
                            <a href="{{ route('dashboard') }}"
                                class="relative block transform transition-all duration-300 hover:-translate-y-1">
                                <div
                                    class="flex flex-col items-center justify-center w-24 h-16 cursor-pointer bg-white border border-gray-200 hover:bg-gray-100 transition-all duration-300">

                                    {{-- Main Icon SVG with hover animation --}}
                                    <svg class="w-32 h-32 mt-1" viewBox="0 0 1024 1024" class="icon"
                                        version="1.1" xmlns="http://www.w3.org/2000/svg" fill="#000000">
                                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round">
                                        </g>
                                        <g id="SVGRepo_iconCarrier">
                                            <path
                                                d="M242.3 475.1v416.7h162.6V721.5c0-51.4 48.2-93.7 107.1-93.7 58.9 0 107.1 42.3 107.1 93.7v170.2h162.6V475.1H242.3zM683.8 324.4v-88.6c0-12.3 9.9-22.2 22.2-22.2h82.1c12.3 0 22.2 9.9 22.2 22.2v115.4c0 12.3-9.9 22.2-22.2 22.2h-48.8"
                                                fill="#00B36A"></path>
                                            <path
                                                d="M788.1 396.4h-48.8c-12.7 0-23-10.3-23-23s10.3-23 23-23h48.1V236.6h-80.6v87.8c0 12.7-10.3 23-23 23s-23-10.3-23-23v-88.6c0-24.9 20.3-45.2 45.2-45.2h82.1c24.9 0 45.2 20.3 45.2 45.2v115.4c0 24.9-20.3 45.2-45.2 45.2z"
                                                fill="#1A1A1A"></path>
                                            <path d="M404.9 883.5c-68.7-58-120.5-135-162.6-217.9v226.2h162.6v-8.3z"
                                                fill="#009957"></path>
                                            <path
                                                d="M781.7 914.7H619.1c-12.7 0-23-10.3-23-23V721.5c0-38.9-37.8-70.5-84.2-70.5s-84.2 31.6-84.2 70.5v170.2c0 12.7-10.3 23-23 23H242.3c-12.7 0-23-10.3-23-23V475.1c0-12.7 10.3-23 23-23h280.8c12.7 0 23 10.3 23 23s-10.3 23-23 23H265.3v370.8H382V721.5c0-64.2 58.3-116.4 130.1-116.4s130.1 52.2 130.1 116.4v147.3h116.7V673.1c0-12.7 10.3-23 23-23s23 10.3 23 23v218.7c-0.3 12.6-10.5 22.9-23.2 22.9z"
                                                fill="#1A1A1A"></path>
                                            <path
                                                d="M104 482l377.9-344.5c16.6-15.1 43.6-15.1 60.2 0L920 482c25.7 23.4 2.3 57.6-39.3 57.6H143.3c-41.6 0.1-64.9-34.2-39.3-57.6z"
                                                fill="#00B36A"></path>
                                            <path
                                                d="M880.7 562.6h-99.2c-12.7 0-23-10.3-23-23s10.3-23 23-23h99.2c15.3 0 24.9-6.8 26.7-11.6 0.3-0.8 1-2.5-3-6.1L535.8 162.8c-11.1-10.1-36.5-10.1-47.6 0L119.5 499c-3.9 3.6-3.3 5.3-3 6.1 1.9 4.8 11.4 11.6 26.8 11.6h99c12.7 0 23 10.3 23 23s-10.3 23-23 23h-99c-32.6 0-59.9-16.1-69.6-40.9-7.7-19.9-2.2-41.1 14.8-56.6L457.2 129c28.6-26.1 80.8-26.1 109.4 0l368.7 336.2c17 15.5 22.6 36.7 14.8 56.6-9.5 24.7-36.8 40.8-69.4 40.8z"
                                                fill="#1A1A1A"></path>
                                        </g>
                                    </svg>

                                    {{-- Label with hover effect --}}
                                    <span
                                        class="mr-2 mt-1 text-gray-800 text-[11px] font-medium group-hover:text-blue-600 transition-colors duration-300 font-semibold">
                                        ホーム
                                    </span>

                                    {{-- Subtle hover indicator line --}}
                                    <div
                                        class="absolute bottom-0 left-0 w-full h-[2px] bg-blue-500 transform scale-x-0 transition-transform duration-300 group-hover:scale-x-100">
                                    </div>
                                </div>
                            </a>
                        </li>
                    @endif















                    @if (Auth::check() && Auth::user()->role === 'admin')
                        <li class="relative group list-none">
                            <a href="{{ route('jobpost.index') }}"
                                class="relative block transform transition-all duration-300 hover:-translate-y-1">
                                <div
                                    class="flex flex-col items-center justify-center w-24 h-16 cursor-pointer bg-white border border-gray-200 hover:bg-gray-100 transition-all duration-300">

                                    {{-- Main Icon SVG with hover animation --}}
                                    <svg class="w-32 h-32 mt-1" version="1.1" id="Uploaded to svgrepo.com"
                                        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                        viewBox="0 0 32 32" xml:space="preserve" fill="#000000">
                                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round">
                                        </g>
                                        <g id="SVGRepo_iconCarrier">
                                            <style type="text/css">
                                                .avocado_acht {
                                                    fill: #A3AEB5;
                                                }

                                                .avocado_vijf {
                                                    fill: #DBD2C1;
                                                }

                                                .avocado_een {
                                                    fill: #231F20;
                                                }

                                                .avocado_zeven {
                                                    fill: #788287;
                                                }

                                                .avocado_zes {
                                                    fill: #FFFAEE;
                                                }

                                                .st0 {
                                                    fill: #AF9480;
                                                }

                                                .st1 {
                                                    fill: #CC4121;
                                                }

                                                .st2 {
                                                    fill: #EAD13F;
                                                }

                                                .st3 {
                                                    fill: #C3CC6A;
                                                }

                                                .st4 {
                                                    fill: #D1712A;
                                                }

                                                .st5 {
                                                    fill: #E0A838;
                                                }

                                                .st6 {
                                                    fill: #716558;
                                                }

                                                .st7 {
                                                    fill: #6F9B45;
                                                }

                                                .st8 {
                                                    fill: #0E608E;
                                                }

                                                .st9 {
                                                    fill: #E598A3;
                                                }

                                                .st10 {
                                                    fill: #FFFAEE;
                                                }

                                                .st11 {
                                                    fill: #3D3935;
                                                }

                                                .st12 {
                                                    fill: #248EBC;
                                                }

                                                .st13 {
                                                    fill: #BF63C1;
                                                }
                                            </style>
                                            <g>
                                                <rect x="0.5" y="4.5" class="avocado_zes" width="31"
                                                    height="21"></rect>
                                                <g>
                                                    <path class="avocado_acht"
                                                        d="M0.5,4.5v21h13v4h6v-4h12v-21H0.5z M30,24H2V6h28V24z"></path>
                                                </g>
                                                <rect x="13.5" y="25.5" class="avocado_zeven" width="6"
                                                    height="1.5"></rect>
                                                <path class="avocado_een"
                                                    d="M32,26V4H0v22h13v3h-1v1h9v-1h-1v-3H32z M1,25V5h30v20H1z M19,29h-5v-3h5V29z">
                                                </path>
                                                <g>
                                                    <g>
                                                        <path class="avocado_vijf"
                                                            d="M15,18h1v1H6v-1h1v-6h2v6h1v-5h2v5h1v-7h2V18z M20,12v1h6v-1H20z M20,15h6v-1h-6V15z M20,17 h6v-1h-6V17z M20,19h6v-1h-6V19z">
                                                        </path>
                                                    </g>
                                                </g>
                                            </g>
                                        </g>
                                    </svg>

                                    {{-- Label with hover effect --}}
                                    <span
                                        class="mr-2 mt-1 text-gray-800 text-[11px] font-medium group-hover:text-blue-600 transition-colors duration-300 font-semibold">
                                        投稿管理
                                    </span>

                                    {{-- Subtle hover indicator line --}}
                                    <div
                                        class="absolute bottom-0 left-0 w-full h-[2px] bg-blue-500 transform scale-x-0 transition-transform duration-300 group-hover:scale-x-100">
                                    </div>
                                </div>
                            </a>
                        </li>

                        {{-- <li class="relative group list-none">
                    <a href="{{ route('jobpost.pending') }}"
                       class="relative block transform transition-all duration-300 hover:-translate-y-1">
                        <div class="flex flex-col items-center justify-center w-24 h-16 cursor-pointer bg-white border border-gray-200 hover:bg-gray-100 transition-all duration-300">

                            <svg
                            class="w-32 h-32 mt-1"
                            fill="#153c60" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 910.812 910.812" xml:space="preserve" stroke="#153c60"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <g> <g> <path d="M679.137,855.812V727.309l-6.646,9.089c-24.698,33.77-60.519,58.477-100.857,69.567l-30.426,8.367l-35.989,10.135 H360.491v-30h143.098l-0.312-7.877l-1.247-31.529c-1.653-41.805,11.038-83.426,35.734-117.194l141.37-193.294V55 c0-30.375-24.624-55-55-55H245.482l0,0v172.185c0,33.084-26.916,60-60,60H13.299v623.627c0,30.375,24.624,55,55,55h555.838 C654.513,910.812,679.137,886.188,679.137,855.812z M395.512,124.09c0-14.862,10.475-27.661,25.044-30.592 c22.703-4.567,54.793-10.939,69.521-13.469c7.379-1.268,14.122,4.414,14.122,11.902v57.761c0,30.013-24.33,54.343-54.343,54.343 c-30.014,0-54.344-24.33-54.344-54.343V124.09L395.512,124.09z M360.491,251.514c0-16.569,13.431-30,30-30h118.727 c16.569,0,30,13.431,30,30v89.6c0,5.088-4.125,9.213-9.213,9.213H369.703c-5.088,0-9.213-4.125-9.213-9.213L360.491,251.514 L360.491,251.514z M153.218,436.436h386v50h-386V436.436L153.218,436.436z M153.218,547.436h386v30h-386V547.436L153.218,547.436 z"></path> <path d="M185.482,202.185c16.569,0,30-13.432,30-30V4.679V0.001L13.29,202.185h4.705H185.482z"></path> <path d="M894.308,344.713c6.141-10.87,3.313-24.854-7.012-32.404l-10.468-7.656c-10.32-7.547-24.496-6.008-32.995,3.126 c-0.668,0.718-1.305,1.477-1.899,2.288l-7.223,9.875l-9.083,12.418c-3.427-1.298-7.011-1.954-10.581-1.953 c-9.244,0.001-18.364,4.259-24.239,12.292L679.137,495.389L561.982,655.574c-20.804,28.442-31.367,63.09-29.977,98.301 l1.247,31.529l30.426-8.365c33.979-9.342,63.794-29.908,84.598-58.352l30.859-42.197l197.967-270.677 c8.146-11.137,7.48-26.012-0.69-36.327l9.073-12.404l7.225-9.878C893.301,346.395,893.829,345.562,894.308,344.713z"></path> </g> </g> </g> </g></svg>

                            <span class="mr-2 mt-1 text-gray-800 text-[11px] font-medium group-hover:text-blue-600 transition-colors duration-300 font-semibold">
                             投稿管理App
                            </span>

                            <div class="absolute bottom-0 left-0 w-full h-[2px] bg-blue-500 transform scale-x-0 transition-transform duration-300 group-hover:scale-x-100"></div>
                        </div>
                    </a>
                </li> --}}
                    @endif


                    @if (Auth::check() && Auth::user()->role === 'company')
                        <li class="relative group list-none">
                            <a href="{{ route('company.employer') }}"
                                class="relative block transform transition-all duration-300 hover:-translate-y-1">
                                <div
                                    class="flex flex-col items-center justify-center w-24 h-16 cursor-pointer bg-white border border-gray-200 hover:bg-gray-100 transition-all duration-300">

                                    {{-- Main Icon SVG with hover animation --}}
                                    <svg class="w-32 h-32 mt-1" height="200px" width="200px" version="1.1"
                                        id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                                        xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 309.267 309.267"
                                        xml:space="preserve" fill="#000000">
                                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round">
                                        </g>
                                        <g id="SVGRepo_iconCarrier">
                                            <g>
                                                <path style="fill:#D0994B;"
                                                    d="M280.273,120.972V62.82c0-10.67-8.659-19.329-19.329-19.329H125.64c0,0-18.324-28.994-28.994-28.994 H48.323c-10.67,0-19.329,8.65-19.329,19.329v87.146H280.273z">
                                                </path>
                                                <path style="fill:#E4E7E7;"
                                                    d="M28.994,72.484h251.279V149.8H28.994V72.484z"></path>
                                                <path style="fill:#3DB39E;"
                                                    d="M251.279,178.794c32.028,0,57.988,25.969,57.988,57.988c0,32.009-25.959,57.988-57.988,57.988 c-32.009,0-57.988-25.978-57.988-57.988C193.292,204.764,219.27,178.794,251.279,178.794z">
                                                </path>
                                                <path style="fill:#FFFFFF;"
                                                    d="M270.609,227.117h-9.665v-9.665c0-5.345-4.32-9.665-9.665-9.665s-9.665,4.32-9.665,9.665v9.665 h-9.665c-5.345,0-9.665,4.32-9.665,9.665c0,5.354,4.32,9.665,9.665,9.665h9.665v9.665c0,5.354,4.32,9.665,9.665,9.665 s9.665-4.31,9.665-9.665v-9.665h9.665c5.345,0,9.665-4.31,9.665-9.665C280.273,231.438,275.953,227.117,270.609,227.117z">
                                                </path>
                                                <path style="fill:#F4B459;"
                                                    d="M179.597,236.783c0-39.586,32.106-71.682,71.682-71.682c19.126,0,36.455,7.538,49.318,19.754 l8.669-73.712c0-10.679-8.659-19.329-19.329-19.329H19.329C8.659,91.814,0,100.463,0,111.143l19.329,164.298 c0,10.67,8.659,19.329,19.329,19.329h170.609C191.32,281.733,179.597,260.644,179.597,236.783z">
                                                </path>
                                            </g>
                                        </g>
                                    </svg>

                                    {{-- Label with hover effect --}}
                                    <span
                                        class="mr-2 mt-1 text-gray-800 text-[11px] font-medium group-hover:text-blue-600 transition-colors duration-300 font-semibold">
                                        申請管理(企業)
                                    </span>

                                    {{-- Subtle hover indicator line --}}
                                    <div
                                        class="absolute bottom-0 left-0 w-full h-[2px] bg-blue-500 transform scale-x-0 transition-transform duration-300 group-hover:scale-x-100">
                                    </div>
                                </div>
                            </a>
                        </li>


                        <li class="relative group list-none">
                            <a href="{{ route('jobpost.create') }}"
                                class="relative block transform transition-all duration-300 hover:-translate-y-1">
                                <div
                                    class="flex flex-col items-center justify-center w-24 h-16 cursor-pointer bg-white border border-gray-200 hover:bg-gray-100 transition-all duration-300">
                                    <img width="32" height="32"
                                        src="https://img.icons8.com/external-flaticons-lineal-color-flat-icons/64/external-job-working-stress-flaticons-lineal-color-flat-icons.png"
                                        alt="external-job-working-stress-flaticons-lineal-color-flat-icons" />
                                    {{-- Main Icon SVG with hover animation --}}

                                    {{-- Label with hover effect --}}
                                    <span
                                        class="mr-2 mt-1 text-gray-800 text-[11px] font-medium group-hover:text-blue-600 transition-colors duration-300 font-semibold">
                                        新規投稿作成
                                    </span>

                                    {{-- Subtle hover indicator line --}}
                                    <div
                                        class="absolute bottom-0 left-0 w-full h-[2px] bg-blue-500 transform scale-x-0 transition-transform duration-300 group-hover:scale-x-100">
                                    </div>
                                </div>
                            </a>
                        </li>
                    @endif



                    @if (Auth::check() && Auth::user()->role === 'admin')
                        <li class="relative group list-none">
                            <div
                                class="flex flex-col items-center justify-center w-24 h-16 cursor-pointer bg-white border border-gray-200 hover:bg-gray-100">

                                <svg class="mt-1 w-32 h-32" height="200px" width="200px" version="1.1"
                                    id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                                    xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512"
                                    xml:space="preserve" fill="#000000">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                    <g id="SVGRepo_iconCarrier">
                                        <polygon style="fill:#464655;"
                                            points="326.621,454.621 185.379,454.621 194.207,366.345 317.793,366.345 ">
                                        </polygon>
                                        <path style="fill:#5B5D6E;"
                                            d="M485.517,384H26.483C11.857,384,0,372.143,0,357.517V75.034c0-14.626,11.857-26.483,26.483-26.483 h459.034c14.626,0,26.483,11.857,26.483,26.483v282.483C512,372.143,500.143,384,485.517,384z">
                                        </path>
                                        <path style="fill:#FFFFFF;"
                                            d="M467.862,348.69H44.138c-4.875,0-8.828-3.953-8.828-8.828V92.69c0-4.875,3.953-8.828,8.828-8.828 h423.724c4.875,0,8.828,3.953,8.828,8.828v247.172C476.69,344.737,472.737,348.69,467.862,348.69z">
                                        </path>
                                        <path style="fill:#28AFF0;"
                                            d="M247.172,313.379H88.276c-9.751,0-17.655-7.904-17.655-17.655V136.828 c0-9.751,7.904-17.655,17.655-17.655h158.897c9.751,0,17.655,7.904,17.655,17.655v158.897 C264.828,305.474,256.924,313.379,247.172,313.379z">
                                        </path>
                                        <path style="fill:#5A4146;"
                                            d="M97.103,313.379h141.241c0-61.793,2.058-167.724-70.621-167.724 C94.605,145.655,97.103,251.586,97.103,313.379z">
                                        </path>
                                        <path style="fill:#EFF2FA;"
                                            d="M467.862,83.862H44.138c-4.875,0-8.828,3.953-8.828,8.828v17.655c0-4.875,3.953-8.828,8.828-8.828 h423.724c4.875,0,8.828,3.953,8.828,8.828V92.69C476.69,87.815,472.737,83.862,467.862,83.862z">
                                        </path>
                                        <path style="fill:#D29B6E;"
                                            d="M225.103,313.379l-22.001-12.573c-5.501-3.144-8.896-8.993-8.896-15.329v-16.236h-52.966v16.237 c0,6.336-3.395,12.185-8.896,15.329l-22.002,12.572H225.103z">
                                        </path>
                                        <path style="fill:#F0C087;"
                                            d="M211.862,207.448v46.798c0,9.302-4.881,17.922-12.857,22.709l-22.197,13.319 c-5.591,3.354-12.576,3.354-18.167,0l-22.197-13.319c-7.977-4.786-12.857-13.407-12.857-22.709v-46.798c0,0,52.966,0,70.621-17.655 L211.862,207.448z">
                                        </path>
                                        <path style="fill:#5B5D6E;"
                                            d="M220.69,225.103c-4.879,0-8.828,3.953-8.828,8.828c0,9.737-7.923,17.655-17.655,17.655h-26.483 v17.655h26.483c19.474,0,35.31-15.84,35.31-35.31C229.517,229.056,225.569,225.103,220.69,225.103z">
                                        </path>
                                        <circle style="fill:#707487;" cx="167.724" cy="260.414" r="8.828">
                                        </circle>
                                        <path style="fill:#5B5D6E;"
                                            d="M344.276,463.448H167.724c-4.875,0-8.828-3.953-8.828-8.828l0,0c0-4.875,3.953-8.828,8.828-8.828 h176.552c4.875,0,8.828,3.953,8.828,8.828l0,0C353.103,459.496,349.151,463.448,344.276,463.448z">
                                        </path>
                                        <path style="fill:#EFF2FA;"
                                            d="M432.552,233.931H308.966c-4.875,0-8.828,3.953-8.828,8.828v61.793c0,4.875,3.953,8.828,8.828,8.828 h123.586c4.875,0,8.828-3.953,8.828-8.828v-61.793C441.379,237.884,437.427,233.931,432.552,233.931z">
                                        </path>
                                        <g>
                                            <path style="fill:#C7CFE2;"
                                                d="M432.552,216.276h-70.621c-4.875,0-8.828-3.953-8.828-8.828l0,0c0-4.875,3.953-8.828,8.828-8.828 h70.621c4.875,0,8.828,3.953,8.828,8.828l0,0C441.379,212.323,437.427,216.276,432.552,216.276z">
                                            </path>
                                            <path style="fill:#C7CFE2;"
                                                d="M432.552,180.966h-70.621c-4.875,0-8.828-3.953-8.828-8.828l0,0c0-4.875,3.953-8.828,8.828-8.828 h70.621c4.875,0,8.828,3.953,8.828,8.828l0,0C441.379,177.013,437.427,180.966,432.552,180.966z">
                                            </path>
                                            <path style="fill:#C7CFE2;"
                                                d="M432.552,145.655h-70.621c-4.875,0-8.828-3.953-8.828-8.828l0,0c0-4.875,3.953-8.828,8.828-8.828 h70.621c4.875,0,8.828,3.953,8.828,8.828l0,0C441.379,141.703,437.427,145.655,432.552,145.655z">
                                            </path>
                                        </g>
                                        <g>
                                            <path style="fill:#D7DEED;"
                                                d="M326.621,216.276h-17.655c-4.875,0-8.828-3.953-8.828-8.828l0,0c0-4.875,3.953-8.828,8.828-8.828 h17.655c4.875,0,8.828,3.953,8.828,8.828l0,0C335.448,212.323,331.496,216.276,326.621,216.276z">
                                            </path>
                                            <path style="fill:#D7DEED;"
                                                d="M326.621,180.966h-17.655c-4.875,0-8.828-3.953-8.828-8.828l0,0c0-4.875,3.953-8.828,8.828-8.828 h17.655c4.875,0,8.828,3.953,8.828,8.828l0,0C335.448,177.013,331.496,180.966,326.621,180.966z">
                                            </path>
                                            <path style="fill:#D7DEED;"
                                                d="M326.621,145.655h-17.655c-4.875,0-8.828-3.953-8.828-8.828l0,0c0-4.875,3.953-8.828,8.828-8.828 h17.655c4.875,0,8.828,3.953,8.828,8.828l0,0C335.448,141.703,331.496,145.655,326.621,145.655z">
                                            </path>
                                        </g>
                                    </g>
                                </svg>


                                <div class="relative block">

                                    <span
                                        class="mr-2 mt-1 text-gray-800 text-[11px]  group-hover:text-blue-600 transition-colors duration-300 font-semibold">
                                        管理者設定
                                    </span>
                                    <div
                                        class="absolute bottom-0 left-0 w-full h-[2px] bg-blue-500 transform scale-x-0 transition-transform duration-300 group-hover:scale-x-100">
                                    </div>

                                </div>

                                <div
                                    class="absolute z-50 hidden bg-white divide-y divide-gray-100 shadow-lg group-hover:block top-full left-0 w-48 rounded-md border border-gray-200">
                                    <!-- User Info -->


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




                    <li class="relative group list-none">
                        <div
                            class="flex flex-col items-center justify-center w-24 h-16 cursor-pointer bg-white border border-gray-200 hover:bg-gray-100">


                            <svg class="mt-1 w-32 h-32" height="200px" width="200px" version="1.1" id="Layer_1"
                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                viewBox="0 0 512 512" xml:space="preserve" fill="#000000">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                <g id="SVGRepo_iconCarrier">
                                    <path style="fill:#1E0478;"
                                        d="M450.876,411.53v88.942c0,6.364-5.165,11.528-11.528,11.528H338.117H173.883H72.652 c-6.364,0-11.528-5.165-11.528-11.528V411.53c0-42.724,34.043-77.632,76.422-79.062c0.415-0.046,59.325,1.706,68.121-61.562 c-28.614-19.944-49.595-56.478-55.313-100.574c-1.13-1.084-2.075-2.398-2.698-3.931c-2.34-5.707-4.3-11.667-5.856-17.731 c-7.321-28.729-5.072-58.461,6.329-83.719c11.747-26.008,31.761-44.246,56.362-51.348c5.142-1.487,10.514-2.456,15.99-2.871 C234.834,3.608,250.028,0,265.684,0c59.89,0,108.621,52.547,108.621,117.14c0,16.82-3.24,33.075-9.626,48.281 c-0.68,1.614-1.683,2.974-2.894,4.07c-3.528,28.256-13.442,54.368-28.821,75.188c-7.908,10.71-16.878,19.529-26.619,26.319 c8.762,63.164,67.695,61.423,68.11,61.47C416.833,333.898,450.876,368.806,450.876,411.53z M427.82,488.943V411.53 c0-30.919-25.155-56.074-56.086-56.074c-0.415,0-16.878,0-33.594-7.102l-61.619,87.754c-2.34,3.332-5.43,5.995-8.946,7.828 c-3.528,1.821-7.47,2.824-11.551,2.824c-8.151,0-15.817-3.989-20.509-10.652l-61.619-87.766 c-14.664,6.663-33.213,7.113-33.628,7.113c-30.931,0-56.086,25.155-56.086,56.074v77.413h89.703h164.234L427.82,488.943 L427.82,488.943z M351.132,121.786c0.069-1.545,0.115-3.09,0.115-4.646c0-51.878-38.39-94.083-85.564-94.083 c-12.704,0-25.074,3.113-36.741,9.246c-1.499,0.784-3.159,1.234-4.842,1.303c-4.554,0.208-9.004,0.934-13.212,2.144 c-37.709,10.894-58.634,58.253-47.036,105.958c12.451-13.073,21.535-29.19,26.077-46.69c1.556-5.937,6.698-10.18,12.82-10.572 c6.099-0.38,11.701,3.159,13.972,8.808c1.464,3.666,3.92,6.848,7.102,9.223c3.724,2.778,8.162,4.242,12.831,4.242h78.578 C329.263,106.719,341.979,112.494,351.132,121.786z M340.192,146.226c0-0.081,0.012-0.161,0.012-0.242 c-4.277-9.546-13.857-16.209-24.971-16.209h-78.578c-9.684,0-18.884-3.055-26.619-8.819c-1.245-0.934-2.444-1.925-3.574-2.974 c-7.493,17.892-18.987,34.032-33.536,46.99c3.113,27.092,12.935,51.843,27.933,70.173c15.367,18.768,34.954,29.109,55.163,29.109 C302.436,264.254,340.192,211.304,340.192,146.226z M257.649,422.851l60.536-86.21c-17.074-13.189-29.305-32.36-33.525-54.345 c-9.2,3.297-18.803,5.015-28.637,5.015c-9.914,0-19.529-1.775-28.671-5.084c-4.208,22.008-16.428,41.191-33.513,54.403 l60.547,86.221c0.404,0.565,0.945,0.853,1.637,0.853C256.703,423.704,257.257,423.416,257.649,422.851z">
                                    </path>
                                    <path style="fill:#6F7CCD;"
                                        d="M427.82,411.53v77.413h-89.703H173.883H84.18V411.53c0-30.919,25.155-56.074,56.086-56.074 c0.415,0,18.964-0.45,33.628-7.113l61.619,87.766c4.692,6.663,12.358,10.652,20.509,10.652c4.081,0,8.024-1.003,11.551-2.824 c3.516-1.833,6.606-4.496,8.946-7.828l61.619-87.754c16.716,7.102,33.179,7.102,33.594,7.102 C402.664,355.456,427.82,380.611,427.82,411.53z">
                                    </path>
                                    <path style="fill:#9B8CCC;"
                                        d="M351.248,117.14c0,1.556-0.046,3.101-0.115,4.646c-9.154-9.292-21.869-15.068-35.899-15.068h-78.578 c-4.669,0-9.107-1.464-12.831-4.242c-3.182-2.375-5.637-5.557-7.102-9.223c-2.271-5.649-7.874-9.188-13.972-8.808 c-6.122,0.392-11.263,4.634-12.82,10.572c-4.542,17.5-13.627,33.617-26.077,46.69c-11.598-47.705,9.326-95.063,47.036-105.958 c4.208-1.21,8.658-1.937,13.212-2.144c1.683-0.069,3.343-0.519,4.842-1.303c11.667-6.133,24.037-9.246,36.741-9.246 C312.858,23.057,351.248,65.262,351.248,117.14z">
                                    </path>
                                    <g>
                                        <path style="fill:#FFFFFF;"
                                            d="M340.204,145.984c0,0.081-0.012,0.161-0.012,0.242c0,65.078-37.756,118.028-84.169,118.028 c-20.209,0-39.796-10.341-55.163-29.109c-14.998-18.33-24.821-43.082-27.933-70.173c14.549-12.958,26.043-29.098,33.536-46.99 c1.13,1.049,2.329,2.041,3.574,2.974c7.736,5.764,16.935,8.819,26.619,8.819h78.578 C326.346,129.775,335.927,136.439,340.204,145.984z">
                                        </path>
                                        <path style="fill:#FFFFFF;"
                                            d="M318.184,336.641l-60.536,86.21c-0.392,0.565-0.945,0.853-1.626,0.853 c-0.692,0-1.234-0.288-1.637-0.853l-60.547-86.221c17.085-13.212,29.305-32.395,33.513-54.403 c9.142,3.309,18.757,5.084,28.671,5.084c9.834,0,19.437-1.718,28.637-5.015C288.879,304.281,301.111,323.453,318.184,336.641z">
                                        </path>
                                    </g>
                                </g>
                            </svg>

                            <div class="relative block">

                                <span
                                    class="mr-2 mt-1 text-gray-800 text-[11px]  group-hover:text-blue-600 transition-colors duration-300 font-semibold">
                                    プロフィール
                                </span>
                                <div
                                    class="absolute bottom-0 left-0 w-full h-[2px] bg-blue-500 transform scale-x-0 transition-transform duration-300 group-hover:scale-x-100">
                                </div>

                            </div>

                            <div
                                class="absolute z-50 hidden bg-white divide-y divide-gray-100 shadow-lg group-hover:block top-full left-0 w-48 rounded-md border border-gray-200">
                                <!-- User Info -->

                                <p class="text-xs font-medium text-gray-900 mt-2 px-2">{{ Auth::user()->name }}</p>
                                <p class="text-xs text-gray-500 truncate mt-2 px-2 mb-2">{{ Auth::user()->email }}</p>

                                @if (auth()->user()->role !== 'company')
                                    <a href="{{ route('dashboard') }}"
                                        class="block px-4 py-2 w-48 hover:bg-sky-500 hover:text-white transition duration-300 font-mono">ダッシュボード</a>
                                @endif
                                <a href="{{ route('profile.edit') }}"
                                    class="block px-4 py-2 w-48 hover:bg-sky-500 hover:text-white transition duration-300 font-mono">マイページ</a>

                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <a href="{{ route('logout') }}"
                                        onclick="event.preventDefault(); this.closest('form').submit();"
                                        class="flex items-center px-4 py-2 text-sm text-red-600 hover:bg-red-600 hover:text-white transition-colors duration-150 font-mono">
                                        <svg class="mr-3 h-5 w-5" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
                                            </path>
                                        </svg>
                                        ログアウト
                                    </a>
                                </form>
                            </div>
                    </li>





                    <a href="{{ route('notifications.index') }}" class="relative flex items-center">
                        <svg class="bell-icon w-10 h-10" height="200px" width="200px" version="1.1"
                            id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                            xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512" xml:space="preserve"
                            fill="#000000">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <path style="fill:#FFAA00;"
                                    d="M256,100.174c-27.619,0-50.087-22.468-50.087-50.087S228.381,0,256,0s50.087,22.468,50.087,50.087 S283.619,100.174,256,100.174z M256,33.391c-9.196,0-16.696,7.5-16.696,16.696s7.5,16.696,16.696,16.696 c9.196,0,16.696-7.5,16.696-16.696S265.196,33.391,256,33.391z">
                                </path>
                                <path style="fill:#F28D00;"
                                    d="M256.006,0v33.394c9.194,0.003,16.69,7.5,16.69,16.693s-7.496,16.69-16.69,16.693v33.394 c27.618-0.004,50.081-22.469,50.081-50.087S283.624,0.004,256.006,0z">
                                </path>
                                <path style="fill:#FFAA00;"
                                    d="M256,512c-46.043,0-83.478-37.435-83.478-83.478c0-9.228,7.467-16.696,16.696-16.696h133.565 c9.228,0,16.696,7.467,16.696,16.696C339.478,474.565,302.043,512,256,512z">
                                </path>
                                <path style="fill:#F28D00;"
                                    d="M322.783,411.826h-66.777V512c46.042-0.004,83.473-37.437,83.473-83.478 C339.478,419.293,332.011,411.826,322.783,411.826z">
                                </path>
                                <path style="fill:#FFDA44;"
                                    d="M439.652,348.113v-97.678C439.642,149,357.435,66.793,256,66.783 C154.565,66.793,72.358,149,72.348,250.435v97.678c-19.41,6.901-33.384,25.233-33.391,47.017 c0.01,27.668,22.419,50.075,50.087,50.085h333.913c27.668-0.01,50.077-22.417,50.087-50.085 C473.036,373.346,459.063,355.014,439.652,348.113z">
                                </path>
                                <path style="fill:#FFAA00;"
                                    d="M439.652,348.113v-97.678C439.642,149,357.435,66.793,256,66.783v378.432h166.957 c27.668-0.01,50.077-22.417,50.087-50.085C473.036,373.346,459.063,355.014,439.652,348.113z">
                                </path>
                                <path style="fill:#FFF3DB;"
                                    d="M155.826,267.13c-9.228,0-16.696-7.467-16.696-16.696c0-47.022,28.011-89.283,71.381-107.641 c8.446-3.587,18.294,0.326,21.88,8.836c3.62,8.51-0.358,18.294-8.836,21.88c-31.012,13.142-51.033,43.337-51.033,76.925 C172.522,259.663,165.054,267.13,155.826,267.13z">
                                </path>
                            </g>
                        </svg>


                        @php $unreadCount = auth()->user()->unreadNotifications()->count() @endphp
                        @if ($unreadCount > 0)
                            <span class="badge text-red-400 text-md font-bold">{{ $unreadCount }}</span>
                        @endif
                    </a>















                </div>







            </div>
            <div class="flex justify-between">

                <div>
                    <button id="menu-toggle" class="text-2xl focus:outline-none right-3  text-blue-800 lg:hidden mt-3 sticky">
                        <svg id="menuIconOpen" class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>


                <div>

            <a href="{{ route('notifications.index') }}" class="relative flex items-center mt-2 px-2 lg:hidden md:hidden">
                <svg class="bell-icon w-10 h-10" height="200px" width="200px" version="1.1"
                    id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                    xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512" xml:space="preserve"
                    fill="#000000">
                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                    <g id="SVGRepo_iconCarrier">
                        <path style="fill:#FFAA00;"
                            d="M256,100.174c-27.619,0-50.087-22.468-50.087-50.087S228.381,0,256,0s50.087,22.468,50.087,50.087 S283.619,100.174,256,100.174z M256,33.391c-9.196,0-16.696,7.5-16.696,16.696s7.5,16.696,16.696,16.696 c9.196,0,16.696-7.5,16.696-16.696S265.196,33.391,256,33.391z">
                        </path>
                        <path style="fill:#F28D00;"
                            d="M256.006,0v33.394c9.194,0.003,16.69,7.5,16.69,16.693s-7.496,16.69-16.69,16.693v33.394 c27.618-0.004,50.081-22.469,50.081-50.087S283.624,0.004,256.006,0z">
                        </path>
                        <path style="fill:#FFAA00;"
                            d="M256,512c-46.043,0-83.478-37.435-83.478-83.478c0-9.228,7.467-16.696,16.696-16.696h133.565 c9.228,0,16.696,7.467,16.696,16.696C339.478,474.565,302.043,512,256,512z">
                        </path>
                        <path style="fill:#F28D00;"
                            d="M322.783,411.826h-66.777V512c46.042-0.004,83.473-37.437,83.473-83.478 C339.478,419.293,332.011,411.826,322.783,411.826z">
                        </path>
                        <path style="fill:#FFDA44;"
                            d="M439.652,348.113v-97.678C439.642,149,357.435,66.793,256,66.783 C154.565,66.793,72.358,149,72.348,250.435v97.678c-19.41,6.901-33.384,25.233-33.391,47.017 c0.01,27.668,22.419,50.075,50.087,50.085h333.913c27.668-0.01,50.077-22.417,50.087-50.085 C473.036,373.346,459.063,355.014,439.652,348.113z">
                        </path>
                        <path style="fill:#FFAA00;"
                            d="M439.652,348.113v-97.678C439.642,149,357.435,66.793,256,66.783v378.432h166.957 c27.668-0.01,50.077-22.417,50.087-50.085C473.036,373.346,459.063,355.014,439.652,348.113z">
                        </path>
                        <path style="fill:#FFF3DB;"
                            d="M155.826,267.13c-9.228,0-16.696-7.467-16.696-16.696c0-47.022,28.011-89.283,71.381-107.641 c8.446-3.587,18.294,0.326,21.88,8.836c3.62,8.51-0.358,18.294-8.836,21.88c-31.012,13.142-51.033,43.337-51.033,76.925 C172.522,259.663,165.054,267.13,155.826,267.13z">
                        </path>
                    </g>
                </svg>


                @php $unreadCount = auth()->user()->unreadNotifications()->count() @endphp
                @if ($unreadCount > 0)
                    <span class="badge text-red-400 text-md font-bold">{{ $unreadCount }}</span>
                @endif
            </a>

                </div>

            </div>




            <div id="nav-menu"
            class="fixed inset-0 z-50 bg-white bg-opacity-100 flex justify-center items-start overflow-y-auto transition-all duration-300 transform translate-x-full">
            <button id="close-menu"
                class="absolute top-4 right-4 text-4xl text-blue-700 hover:text-blue-800 focus:outline-none">&times;</button>
            <ul class="flex flex-col items-center space-y-4 w-full max-w-md py-8 px-4">



                @if ((Auth::check() && Auth::user()->role === 'admin') || Auth::user()->role === 'jobseeker')
                    <li class="w-full">
                        <button onclick="window.location.href='{{ route('main') }}'"
                            class="w-full text-sky-800 hover:text-gray-700 font-semibold text-2xl hover:bg-blue-200 rounded-lg px-2 py-2">
                         ホーム
                        </button>
                    </li>
                    <li class="w-full">
                        <button onclick="window.location.href='{{ route('liked.index') }}'"
                            class="w-full text-sky-800 hover:text-gray-700 font-semibold text-2xl hover:bg-blue-200 rounded-lg px-2 py-2">
                         お気に入り
                        </button>
                    </li>


                @endif

                @if (Auth::check() && Auth::user()->role === 'company')

                    <li class="w-full">
                        <button onclick="window.location.href='{{ route('dashboard') }}'"
                            class="w-full text-sky-800 hover:text-gray-700 font-semibold text-2xl hover:bg-blue-200 rounded-lg px-2 py-2">
                        ホーム
                        </button>
                    </li>

                    <li class="w-full">
                        <button onclick="window.location.href='{{ route('company.employer') }}'"
                            class="w-full text-sky-800 hover:text-gray-700 font-semibold text-2xl hover:bg-blue-200 rounded-lg px-2 py-2">
                            申請管理(企業)
                        </button>
                    </li>
                    <li class="w-full">
                        <button onclick="window.location.href='{{ route('jobpost.create') }}'"
                            class="w-full text-sky-800 hover:text-gray-700 font-semibold text-2xl hover:bg-blue-200 rounded-lg px-2 py-2">
                            新規投稿作成
                        </button>
                    </li>





                @endif

                @if (Auth::check() && Auth::user()->role === 'admin')


                <li class="w-full">
                    <button onclick="window.location.href='{{ route('jobpost.index') }}'"
                        class="w-full text-sky-800 hover:text-gray-700 font-semibold text-2xl hover:bg-blue-200 rounded-lg px-2 py-2">
                    投稿管理
                    </button>
                </li>

                <li class="w-full">
                    <button onclick="window.location.href='{{ route('categories.index') }}'"
                        class="w-full text-sky-800 hover:text-gray-700 font-semibold text-2xl hover:bg-blue-200 rounded-lg px-2 py-2">
                        カテゴリー
                    </button>
                </li>

                <li class="w-full">
                    <button onclick="window.location.href='{{ route('categories2.index') }}'"
                        class="w-full text-sky-800 hover:text-gray-700 font-semibold text-2xl hover:bg-blue-200 rounded-lg px-2 py-2">
                        カテゴリー2
                    </button>
                </li>
                <li class="w-full">
                    <button onclick="window.location.href='{{ route('tags.index') }}'"
                        class="w-full text-sky-800 hover:text-gray-700 font-semibold text-2xl hover:bg-blue-200 rounded-lg px-2 py-2">
                        タグ
                    </button>
                </li>
                <li class="w-full">
                    <button onclick="window.location.href='{{ route('admin.user.index') }}'"
                        class="w-full text-sky-800 hover:text-gray-700 font-semibold text-2xl hover:bg-blue-200 rounded-lg px-2 py-2">
                        求職者管理
                    </button>
                </li>
                <li class="w-full">
                    <button onclick="window.location.href='{{ route('admin.company.index') }}'"
                        class="w-full text-sky-800 hover:text-gray-700 font-semibold text-2xl hover:bg-blue-200 rounded-lg px-2 py-2">
                        企業管理
                    </button>
                </li>
                <li class="w-full">
                    <button onclick="window.location.href='{{ route('admin.applications.index') }}'"
                        class="w-full text-sky-800 hover:text-gray-700 font-semibold text-2xl hover:bg-blue-200 rounded-lg px-2 py-2">
                        申請管理
                    </button>
                </li>

                @endif

                @if (auth()->user()->role !== 'company')

                    <li class="w-full">
                        <button onclick="window.location.href='{{ route('dashboard') }}'"
                            class="w-full text-sky-800 hover:text-gray-700 font-semibold text-2xl hover:bg-blue-200 rounded-lg px-2 py-2">
                            ダッシュボード
                        </button>
                    </li>
                @endif

                <li class="w-full">
                    <button onclick="window.location.href='{{ route('profile.edit') }}'"
                        class="w-full text-sky-800 hover:text-gray-700 font-semibold text-2xl hover:bg-blue-200 rounded-lg px-2 py-2">
                        マイページ
                    </button>
                </li>



                <form method="POST" action="{{ route('logout') }}" class="">
                    @csrf
                    <a href="{{ route('logout') }}"
                        onclick="event.preventDefault(); this.closest('form').submit();"
                        class="w-full text-red-400 hover:text-gray-700 font-semibold text-2xl hover:bg-rose-200 rounded-lg px-2 py-2">
                        {{-- <svg class="mr-3 h-5 w-5" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
                            </path>
                        </svg> --}}
                        ログアウト
                    </a>
                </form>

















        </div>


        </div>
    </div>




    <!-- Responsive Navigation Menu -->

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const navMenu = document.getElementById('nav-menu');
            const closeMenu = document.getElementById('close-menu');
            const menuToggle = document.getElementById('menu-toggle');

            menuToggle.addEventListener('click', function() {
                navMenu.classList.remove('translate-x-full');
                document.body.style.overflow = 'hidden';
            });

            closeMenu.addEventListener('click', function() {
                navMenu.classList.add('translate-x-full');
                document.body.style.overflow = '';
            });
        });

    </script>

</nav>

<!-- resources/views/homePage.blade.php -->
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Serif+JP:wght@400;700&display=swap" rel="stylesheet">




    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/SplitText.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.4/TextPlugin.min.js"></script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>JP Jobs</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
      .japanese-text {
        font-size: 1.25rem; /* Adjust as needed */
        line-height: 2rem; /* Adjust as needed */
        word-spacing: 0.2em; /* Extra spacing */
    }
    </style>
</head>

@if (session('success') || session('error'))
<div id="statusToast" class="fixed top-16 left-1/2 transform -translate-x-1/2 z-50 w-full max-w-md">
    <div class="bg-gray-100 border-l-4 @if(session('success')) border-blue-500 @else border-red-500 @endif rounded-r-lg shadow-md overflow-hidden">
        <div class="p-4 flex items-center">
            <div class="flex-shrink-0">
                @if (session('success'))
                    <svg class="w-6 h-6 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                @else
                    <svg class="w-6 h-6 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                @endif
            </div>
            <div class="ml-3 w-0 flex-1">
                @if (session('success'))
                    <p class="text-lg font-semibold text-blue-900">
                        {!! session('success') !!}
                    </p>
                @endif
                @if (session('error'))
                    <p class="text-sm font-medium text-gray-900">
                        {{ session('error') }}
                    </p>
                @endif


            </div>
        </div>
        <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
            <button id="closeToast" type="button" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-blue-600 text-base font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:ml-3 sm:w-auto sm:text-sm">
                閉じる
            </button>
        </div>
    </div>
</div>
@endif

<style>
    @keyframes slideDown {
        from { transform: translate(-50%, -100%); }
        to { transform: translate(-50%, 0); }
    }
    #statusToast {
        animation: slideDown 0.5s ease-out;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var statusToast = document.getElementById('statusToast');
        var closeToast = document.getElementById('closeToast');

        var hideTimeout = setTimeout(function() {
            hideToast();
        }, 8000);

        closeToast.addEventListener('click', function() {
            clearTimeout(hideTimeout);
            hideToast();
        });

        function hideToast() {
            statusToast.style.transform = 'translate(-50%, -100%)';
            statusToast.style.transition = 'transform 0.5s ease-in-out';
            setTimeout(function() {
                statusToast.style.display = 'none';
            }, 500);
        }
    });
</script>

<body class="min-h-screen bg-white">

    <div class="fixed bottom-4 right-5 z-50 hidden md:flex">
        <a href="{{ route('register.jobseeker') }}">
        <button class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-5 px-8 rounded-full shadow-lg">
            <span>{{ __('Sign Up For Job Seeker') }}</span>
        </button>
        </a>
    </div>
    <!-- Navigation -->
    <nav class="bg-white shadow-md fixed w-full top-0 z-50 h-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <!-- Logo -->
                <div class="flex items-center">
                    <a href="" class="flex items-center space-x-2">

                        <div class="hover:opacity-80 mt-10 mb-2">
                            <img src="{{ asset('images/logo22.png') }}" alt="人材紹介" class="w-16 h-16">



                        </div>
                        <p class="mt-5 text-xl font-bold text-sky-600"><span class="text-orange-500">人材</span>紹介</p>
                    </a>
                </div>

                <!-- Desktop Navigation Links -->
                <div class="hidden md:flex md:items-center md:space-x-1 py-12">
                    <a href="" class="relative text-gray-800 font-medium hover:bg-blue-600 rounded-sm min-w-[80px] h-16 hover:text-white group flex items-center justify-center px-4">

                        {{ __('Home') }}

                    </a>



                    <a href="#service" class="relative text-gray-800 font-medium hover:bg-blue-600 rounded-sm min-w-[80px] h-16 hover:text-white group flex items-center justify-center px-4">{{ __('Service') }}</a>

                    <a href="#job facility" class="relative text-gray-800 font-medium hover:bg-blue-600 rounded-sm min-w-[80px] h-16 hover:text-white group flex items-center justify-center px-4">{{ __('Occupation') }}</a>

                    <a href="#job company" class="relative text-gray-800 font-medium hover:bg-blue-600 rounded-sm min-w-[80px] h-16 hover:text-white group flex items-center justify-center px-4">{{ __('Company Flow') }}</a>

                    <a href="#job seeker" class="relative text-gray-800 font-medium hover:bg-blue-600 rounded-sm min-w-[80px] h-16 hover:text-white group flex items-center justify-center px-4">{{ __('Job seeker Flow') }}</a>

                    <a href="{{ route('register.company') }}" class="relative text-gray-800 font-medium hover:bg-blue-600 rounded-sm min-w-[80px] h-16 hover:text-white group flex items-center justify-center px-4">{{ __('Sign Up Company') }}</a>



                    <a href="{{ route('login') }}" class="relative text-gray-800 font-medium hover:bg-blue-600 rounded-sm min-w-[80px] h-16 hover:text-white group flex items-center justify-center px-4">{{ __('Log In') }}</a>


                    <!-- Facebook Icon -->
                    {{-- <a href="#" class="text-blue-600 hover:text-blue-700 px-3">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                        </svg>
                    </a> --}}
               <!-- Language Switcher -->
            <!-- Language Switcher -->
            <div class="flex items-center space-x-3 text-sm ml-20">
                <a href="{{ route('language.switch', 'jp') }}"
                class="flex items-center space-x-2 text-gray-800 hover:text-blue-600 font-medium {{ app()->getLocale() == 'jp' ? 'font-bold' : '' }}">
                <span>JP</span>
                <img
                     src="{{ asset('images/jap.png') }}"
                     alt="Japanese"
                     class="w-12 h-10 rounded-lg bg-gray-100 hover:bg-gray-200 px-2 py-2 shadow-md">

             </a>


                <span class="text-gray-400">|</span>

                <a href="{{ route('language.switch', 'en') }}"
                class="flex items-center space-x-2 text-gray-800 hover:text-blue-600 font-medium {{ app()->getLocale() == 'en' ? 'font-bold' : '' }}">
                <img
                     src="{{ asset('images/eng.png') }}"
                     alt="English"
                     class="w-12 h-10 rounded-lg bg-gray-100 hover:bg-gray-200 px-2 py-2 shadow-md">
                <span>EN</span>


             </a>
                {{-- <img src="{{ asset('images/eng.png') }}" alt="" class="w-10 h-10 rounded-lg bg-gray-100 hover:bg-gray-200 px-2 py-2 shadow-md">


                <a href="{{ route('language.switch', 'en') }}"
                   class="text-gray-800 hover:text-blue-600 font-medium {{ app()->getLocale() == 'en' ? 'font-bold' : '' }}">
                    EN
                </a> --}}
            </div>


                </div>

            <!-- Mobile Menu Button -->
            <button id="menu-toggle" class="text-2xl focus:outline-none right-3 fixed text-black lg:hidden mt-3">
                <svg id="menuIconOpen" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>


            <div id="nav-menu"
            class="fixed inset-0 z-50 bg-sky-600 bg-opacity-100 flex justify-center items-start overflow-y-auto transition-all duration-300 transform translate-x-full">
            <button id="close-menu"
                class="absolute top-4 right-4 text-4xl text-white hover:text-gray-400 focus:outline-none">&times;</button>
            <ul class="flex flex-col items-center space-y-4 w-full max-w-md py-8 px-4">
                <li class="w-full">
                    <button onclick="window.location.href='#'"
                        class="w-full text-white hover:text-gray-700 font-semibold text-2xl hover:bg-yellow-300 rounded-lg px-2 py-2">
                        {{ __('Home') }}
                    </button>
                </li>
                <li class="w-full">
                    <button onclick="window.location.href='#service'"
                        class="w-full text-white hover:text-gray-700 font-semibold text-2xl hover:bg-yellow-300 rounded-lg px-2 py-2">
                        {{ __('Service') }}
                    </button>
                </li>
                <li class="w-full">
                    <button onclick="window.location.href='#job facility'"
                        class="w-full text-white hover:text-gray-700 font-semibold text-2xl hover:bg-yellow-300 rounded-lg px-2 py-2">
                        {{ __('Occupation') }}

                    </button>
                </li>
                <li class="w-full">
                    <button onclick="window.location.href='#job company'"
                        class="w-full text-white hover:text-gray-700 font-semibold text-2xl hover:bg-yellow-300 rounded-lg px-2 py-2">
                     {{ __('Company Flow') }}
                    </button>
                </li>
                <li class="w-full">
                    <button onclick="window.location.href='#job seeker'"
                        class="w-full text-white hover:text-gray-700 font-semibold text-2xl hover:bg-yellow-300 rounded-lg px-2 py-2">
                        {{ __('Job seeker Flow') }}
                    </button>
                </li>
                <li class="w-full">
                    <button onclick="window.location.href='{{ route('register.company') }}'"
                        class="w-full text-white hover:text-gray-700 font-semibold text-2xl hover:bg-yellow-300 rounded-lg px-2 py-2">
                        {{ __('Sign Up Company') }}
                    </button>
                </li>

                <li class="w-full">
                    <button onclick="window.location.href='{{ route('register.jobseeker') }}'"
                        class="w-full text-white hover:text-gray-700 font-semibold text-2xl hover:bg-yellow-300 rounded-lg px-2 py-2">
                        {{ __('Sign Up For Job Seeker') }}
                    </button>
                </li>



                <li class="w-full">
                    <button onclick="window.location.href='{{ route('login') }}'"
                        class="w-full text-white hover:text-gray-700 font-semibold text-2xl hover:bg-yellow-300 rounded-lg px-2 py-2">
                        {{ __('Log In') }}
                    </button>
                </li>
                  <!-- Language Switcher -->
                  <div class="flex items-center space-x-3 text-lg">
                    <a href="{{ route('language.switch', 'jp') }}" class="text-white bg-red-300 font-medium px-2 py-1 rounded-full">JP</a>
                    <span class="text-gray-300">|</span>
                    <a href="{{ route('language.switch', 'en') }}" class="text-white bg-blue-600 font-medium px-2 py-1 rounded-full">EN</a>
                </div>





        </div>
    </nav>

    <!-- Hero Section -->
    <div id="plan" class="relative bg-cover bg-center min-h-screen flex items-center" style="background-image: url('images/main.jpg');">
        <div class="absolute inset-0 bg-black bg-opacity-30">



        <div class="container mx-auto px-4 py-12 text-white stagger-text mt-2">

            <div class="relative py-20 flex items-end justify-center h-[500px] bg-cover bg-center" style="background-image: url('path/to/your/image.jpg');">
                <div class="absolute bottom-5 px-20 w-full md:w-2/3 text-center">
                    <h2 class="text-white text-3xl md:text-4xl font-semibold leading-relaxed">
                        {{ __('We are a partner that connects the region with human resources and creates the future together. We fully support companies and job seekers.') }}
                    </h2>
                </div>
            </div>


            </div>




    </div>
    </div>

    <!--Service-->




    <div id="service" class="flex items-center justify-center min-h-screen px-4 sm:px-6 lg:px-8 bg-gray-50">
        <div class="text-center max-w-full mx-auto py-20">
            <h1 class="mb-20 text-sky-800 text-4xl font-bold gsap-reveal">{{ __('Service') }}</h1>
            <div class="container mt-5">
                <div class="w-full grid grid-cols-1 sm:grid-cols-3 gap-8 p-2 rounded-lg mx-auto">
                    <!-- Content goes here -->

                <a href="#ourService"
                class="group relative overflow-hidden rounded-lg shadow-lg">
                    <!-- Black overlay with opacity -->
                    <div class="absolute inset-0 bg-black opacity-20 transition-opacity duration-300 ease-in-out group-hover:opacity-10"></div>

                    <img src="{{ asset('images/com.jpg') }}" alt="" class="w-full h-full object-cover">

                    <!-- Text always visible -->
                    <p class="absolute bottom-4 left-4 px-3 text-3xl font-bold text-white z-10">
                        {{ __('Business') }}
                    </p>
                </a>

                <a href="#job facility"
                class="group relative overflow-hidden rounded-lg shadow-lg">
                    <!-- Black overlay with opacity -->
                    <div class="absolute inset-0 bg-black opacity-20 transition-opacity duration-300 ease-in-out group-hover:opacity-10"></div>

                    <img src="{{ asset('images/shu.jpg') }}" alt="" class="w-full h-full object-cover">

                    <!-- Text always visible -->
                    <p class="absolute bottom-4 left-4 px-3 text-3xl font-bold text-white z-10">
                        {{ __('Job Categories') }}
                    </p>
                </a>
               <a href=""
                class="group relative overflow-hidden rounded-lg shadow-lg">
                    <!-- Black overlay with opacity -->
                    <div class="absolute inset-0 bg-black opacity-20 transition-opacity duration-300 ease-in-out group-hover:opacity-10"></div>

                    <img src="{{ asset('images/aba.jpg') }}" alt="" class="w-full h-full object-cover">

                    <!-- Text always visible -->
                    <p class="absolute bottom-4 left-4 px-3 text-3xl font-bold text-white z-10">
                        {{ __('Job Facility') }}
                    </p>
                </a>


        </div>

          </div>

    </div>


</div>










{{--
<div class="min-h-screen flex items-center justify-center bg-sky-400">
    <div id="job company" class="max-w-full mx-auto px-4 sm:px-6 lg:px-8 py-20">



        <h1 class="mt-50 mb-5 text-center text-white text-4xl font-bold gsap-reveal">
            {{ __('How to use') }}
        </h1>
        <h1 class="mt-50 mb-2 text-center text-white text-3xl font-bold gsap-reveal2">
          {{ __('Service flow (for businesses)') }}
        </h1> --}}




{{-- <div class="bg-sky-400 min-h-screen p-8"> --}}





    <div id="ourService" class="bg-sky-400 py-16 px-6 lg:px-20">
        <div class="max-w-5xl mx-auto text-center">
            <h1 class="text-white text-4xl lg:text-5xl font-bold mb-10 lg:mb-12 gsap-reveal" style="font-family: 'Noto Serif JP', serif;" >
                {{ __('Our Service') }}
            </h1>
            <div class="bg-white rounded-2xl px-8 lg:px-16 py-12 shadow-lg transform transition hover:scale-105 duration-300">
                <p class="text-gray-700 text-base lg:text-2xl leading-loose tracking-wide japanese-text" style="font-family: 'Noto Serif JP', serif; word-spacing: 0.3em;">
                    {{ __("We provide a specialized recruitment service connecting companies in Mie Prefecture with foreign nationals seeking employment in Japan. For local businesses, foreign talent represents a key to new development and growth. However, due to Mie Prefecture's regional location, companies face chronic labor shortages and limited opportunities to connect with foreign candidates. We aim to create an environment where local businesses and talented foreign professionals can come together and mutually foster growth. Our mission is to facilitate ideal matches that meet companies' needs while maximizing the excellent academic backgrounds, technical skills, and innovative ideas that foreign talent brings. We are committed to serving as a bridge that expands global possibilities from Mie Prefecture, providing full support to help both the region and its human resources enhance each other's potential.") }}
                </p>
            </div>
        </div>
    </div>





    <div id="job facility" class="flex items-center justify-center min-h-screen px-4 sm:px-6 lg:px-8 bg-gray-100 ">

        <div class="text-center max-w-full mx-auto py-20">
            <h1 class="mb-20 text-sky-800 text-3xl font-bold gsap-reveal">{{ __('Occupation') }}</h1>

            <div class="mb-10 text-sky-800 text-5xl font-bold gsap-reveal2">
               {{ __('Can introduce in a wide range of fields') }}
            </div>





            <div class="grid grid-cols-1 sm:grid-cols-5 gap-20 p-4 rounded-lg mx-auto w-4/5">
                <div class="w-50 flex flex-col items-center bg-white rounded-2xl py-3 transition-transform duration-300 hover:bg-yellow-200"
                     style="height: 150px; width: 200px; transition: transform 0.3s;"
                     onmouseover="this.style.transform='scale(1.2)'"
                     onmouseout="this.style.transform='scale(1)'">
                                        <svg class="mt-5" viewBox="-54.23 0 472.279 472.279" xmlns="http://www.w3.org/2000/svg" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><defs><style>.a{fill:#ffffff;}.b{fill:#7a7473;}.c{fill:#211715;}.d{fill:#3f88c9;}.e{fill:#b3b3b3;}.f{fill:#655e5d;}.g{fill:#c6c6c6;}.h{fill:#a095c1;}</style></defs><path class="a" d="M324.161,52.114a4.616,4.616,0,0,1,3.692-1.08,4.358,4.358,0,0,1,3.133,2.083,6.152,6.152,0,0,1,.645,2.478,18.453,18.453,0,0,1-1.882,9.785,11.726,11.726,0,0,1-3.034,3.982,7.769,7.769,0,0,1-3.618,1.631l-.617.095c-.3,1.112-.632,2.048-.8,2.545-1,2.709-6.343,11.735-13.213,15.744a48.927,48.927,0,0,0,.77,8.155c.437,2.491.3,4.718,3.764,5.969.229.082,2.153.842,2.672,1.07,0,0,1.919,17.065-22.715,17.065s-22.094-17.269-22.094-17.269c.425-.182,1.862-.784,2.091-.866,3.464-1.251,3.327-3.478,3.764-5.969a48.479,48.479,0,0,0,.768-8.474,28.638,28.638,0,0,1-7.031-6.205,31.4,31.4,0,0,1-5.983-11.68l-1.179-.18a7.77,7.77,0,0,1-3.617-1.631,11.726,11.726,0,0,1-3.034-3.982,18.463,18.463,0,0,1-1.883-9.785,6.169,6.169,0,0,1,.645-2.478,4.36,4.36,0,0,1,3.133-2.083,4.613,4.613,0,0,1,3.692,1.08s-7.495-28.256,30.283-28.256S324.161,52.114,324.161,52.114Z"></path><path class="b" d="M280.526,3.04a30.946,30.946,0,0,0-15.519,8.354l3.555,1.889c-5.075,2.729-9.087,8.7-10.876,13.957-2,5.867-2.591,14.222-.2,24.094a4.33,4.33,0,0,1,1.06-.3,4.562,4.562,0,0,1,3.954,1.34c8.926-8.54,16.7-13.608,24.551-19.772.045.522,1.717,4.7,2.108,4.861.523.213,6.157-3.316,10.218-5.821.374.066,6.642,1.545,6.642,1.545a23.92,23.92,0,0,1,7.518,4.4,42.95,42.95,0,0,1,10.481,14.684,4.526,4.526,0,0,1,4.644-1.042c2.294-5.891,2.63-14.429-.267-22.53-2.037-5.695-7.116-11.663-10.723-13.326l-5.208-3.745c-4.437-6.077-11.145-9.281-20.61-9.57A45.691,45.691,0,0,0,280.526,3.04Z"></path><path class="c" d="M321.05,67.558a17.462,17.462,0,0,1-1.016,4.71c-.091.278-.2.553-.279.833-.037.125-.2.479.023-.033-.142.33-.3.654-.459.975a39.591,39.591,0,0,1-3.41,5.483c-2.979,4.084-7.021,8.411-12.122,9.607-2.506.588-1.445,4.446,1.063,3.858,6.067-1.424,10.776-6.386,14.345-11.219,3.084-4.176,5.64-8.907,5.855-14.214.1-2.574-3.9-2.57-4,0Z"></path><path class="c" d="M261.555,67.277a35.849,35.849,0,0,0,7.631,17.156c4.293,5.083,9.976,8.76,16.67,9.483a2.012,2.012,0,0,0,2-2,2.045,2.045,0,0,0-2-2c-5.751-.621-10.556-4.3-14.124-8.65-3.517-4.29-5.376-9.651-6.32-15.052a2.015,2.015,0,0,0-2.46-1.4,2.046,2.046,0,0,0-1.4,2.46Z"></path><path class="c" d="M325.575,53.529a2.534,2.534,0,0,1,3.609.475,5.272,5.272,0,0,1,.508,2.666,15.709,15.709,0,0,1-.222,3.22c-.7,3.829-2.651,8.412-6.9,9.174a2.017,2.017,0,0,0-1.4,2.461,2.044,2.044,0,0,0,2.46,1.4c6.446-1.155,9.52-8.436,10-14.279.249-2.992.014-6.42-2.576-8.36a6.648,6.648,0,0,0-8.311.418,2.016,2.016,0,0,0,0,2.829,2.044,2.044,0,0,0,2.828,0Z"></path><path class="c" d="M263.649,50.7a6.652,6.652,0,0,0-8.312-.418c-2.591,1.935-2.824,5.372-2.576,8.36.485,5.842,3.56,13.124,10.006,14.279a2.056,2.056,0,0,0,2.46-1.4,2.018,2.018,0,0,0-1.4-2.461c-4.253-.762-6.206-5.345-6.9-9.174a15.557,15.557,0,0,1-.225-3.041,6.059,6.059,0,0,1,.435-2.723,2.52,2.52,0,0,1,3.684-.6,2.057,2.057,0,0,0,2.829,0,2.018,2.018,0,0,0,0-2.829Z"></path><path class="c" d="M316.658,17.1a17.364,17.364,0,0,1,5.669,4.99,25.777,25.777,0,0,1,4.442,8.036,31.8,31.8,0,0,1,.367,19.438c-.788,2.457,3.073,3.509,3.857,1.064a35.578,35.578,0,0,0-.517-22.013,30.775,30.775,0,0,0-5.2-9.2,20.218,20.218,0,0,0-6.6-5.768c-2.308-1.112-4.339,2.336-2.019,3.454Z"></path><path class="c" d="M299.388,29.284c-3.167,1.944-6.287,4.005-9.565,5.758-.247.132-.5.257-.746.383s-.07.093.042,0a1.426,1.426,0,0,1-.224.081c-.184-.281,2,1.506,1.785.717-.024-.093-.12-.176-.155-.268-.1-.254-.255-.5-.37-.748a12.674,12.674,0,0,1-1.18-3.131c-.261-1.662-2.31-1.692-3.343-.883-7.976,6.252-16.279,12.015-23.7,18.955-1.884,1.763.949,4.587,2.828,2.829,7.417-6.939,15.722-12.7,23.7-18.956l-3.343-.882a16.83,16.83,0,0,0,1.681,4.3c.71,1.481,1.814,2.448,3.516,1.792a32.268,32.268,0,0,0,4.887-2.672c2.079-1.253,4.136-2.541,6.2-3.811,2.19-1.344.183-4.806-2.019-3.454Z"></path><path class="c" d="M305.484,35.116c7.861,3.085,13.135,10.2,16.577,17.664a2.015,2.015,0,0,0,2.736.717,2.046,2.046,0,0,0,.718-2.736,47.06,47.06,0,0,0-7.472-11.519,31.533,31.533,0,0,0-5.387-4.857,28.5,28.5,0,0,0-6.109-3.127,2.015,2.015,0,0,0-2.46,1.4,2.047,2.047,0,0,0,1.4,2.461Z"></path><path class="c" d="M269.805,10.551c-7.114,2.715-12.091,9.815-14.285,16.89-2.434,7.85-1.849,16.455.016,24.352.591,2.505,4.449,1.445,3.857-1.063-1.66-7.029-2.207-14.6-.2-21.622,1.67-5.829,5.757-12.443,11.671-14.7a2.057,2.057,0,0,0,1.4-2.461,2.015,2.015,0,0,0-2.46-1.4Z"></path><path class="c" d="M314.187,10.622A25.671,25.671,0,0,0,296.949.529a43.856,43.856,0,0,0-21.943,2.087A33.028,33.028,0,0,0,263.593,9.98c-1.83,1.816,1,4.645,2.828,2.829a30.7,30.7,0,0,1,18.05-8.442c6.188-.769,13.154-.592,18.86,2.178a20.073,20.073,0,0,1,7.4,6.1,2.06,2.06,0,0,0,2.736.717,2.014,2.014,0,0,0,.718-2.736Z"></path><path class="a" d="M249,168.013c-5.929-.95-19.34-2.19-24.114-3.209.8-4.877,4.013-26.625,5.2-31.238.52-1.37,1.019-2.76,1.581-4.121l1.108-1.833c2.81-4.645,7.31-7.992,11.852-10.967,8.621-5.648,15.456-9.578,25.122-13.388a25.875,25.875,0,0,1,5.553-7.778,53.48,53.48,0,0,0,14.511,10.153c.3.145.832.4.93.717h5.015c.1-.319.437-.488.742-.626a50.911,50.911,0,0,0,14.7-10.244,25.742,25.742,0,0,1,5.5,7.666c9.822,3.843,16.707,7.8,25.415,13.5,4.541,2.975,9.042,6.322,11.851,10.967l1.109,1.833c.561,1.361,1.061,2.751,1.58,4.121,1.184,4.613,4.4,26.361,5.2,31.238-4.774,1.019-18.184,2.259-24.114,3.209Z"></path><path class="c" d="M363.774,164.273c-1.388-8.485-2.58-17-4.062-25.471-.29-1.658-.579-3.321-.944-4.965a24.384,24.384,0,0,0-3.3-7.589c-3.847-6.071-10.153-9.991-16.1-13.746a131.475,131.475,0,0,0-21.375-10.985,2.013,2.013,0,0,0-2.46,1.4,2.048,2.048,0,0,0,1.4,2.461,121.178,121.178,0,0,1,18.245,9.229c5.686,3.483,12.175,7.105,16.142,12.629a21.837,21.837,0,0,1,3.517,7.331c.366,1.466.606,2.972.871,4.459.824,4.619,1.551,9.255,2.276,13.89.648,4.141,1.259,8.288,1.935,12.424a2.016,2.016,0,0,0,2.461,1.4,2.046,2.046,0,0,0,1.4-2.46Z"></path><path class="c" d="M226.818,165.336c1.354-8.276,2.524-16.581,3.953-24.844.718-4.148,1.411-8.068,3.647-11.732,3.49-5.719,9.437-9.313,14.968-12.8a126,126,0,0,1,20.419-10.582,2.064,2.064,0,0,0,1.4-2.461,2.013,2.013,0,0,0-2.46-1.4,126.739,126.739,0,0,0-19.022,9.523c-5.948,3.632-12.438,7.4-16.821,12.94a28.228,28.228,0,0,0-4.656,8.826,32.955,32.955,0,0,0-.947,4.462c-.843,4.649-1.575,9.319-2.307,13.987-.68,4.338-1.319,8.684-2.028,13.018a2.061,2.061,0,0,0,1.4,2.46,2.016,2.016,0,0,0,2.46-1.4Z"></path><path class="a" d="M318.654,423.292a30.527,30.527,0,0,0,3.457,13.93l-22.178-.43.085-12.46"></path><path class="a" d="M269.874,423.292a30.54,30.54,0,0,1-3.457,13.93l22.177-.43-.085-12.46"></path><path class="c" d="M267.628,423.292a28.71,28.71,0,0,1-3.184,12.921,2.045,2.045,0,0,0,.718,2.736,2.02,2.02,0,0,0,2.736-.717,33.156,33.156,0,0,0,3.73-14.94,2,2,0,0,0-4,0Z"></path><path class="c" d="M286.263,424.332l.086,12.46a2,2,0,0,0,4,0l-.086-12.46a2,2,0,0,0-4,0Z"></path><path class="b" d="M247.024,465.813c-.116-.151-.226-.308-.329-.469a8.807,8.807,0,0,1-.583-7.38,24.183,24.183,0,0,1,3.787-6.608q5.483-7.486,11.588-14.49c1.587-1.82,3.38-3.716,5.753-4.164a3.567,3.567,0,0,0,1.773,3.742,8.365,8.365,0,0,0,4.278.966A23.741,23.741,0,0,0,289.91,430.8c-.027,5,.023,6.663,0,11.664a10.48,10.48,0,0,1-.438,3.607c-1.028,2.78-4.076,4.119-6.522,5.793-6.363,4.354-9.714,12.3-16.382,16.17a17.211,17.211,0,0,1-15.914.57A10.024,10.024,0,0,1,247.024,465.813Z"></path><path class="c" d="M316.654,423.292a33.156,33.156,0,0,0,3.73,14.94,2,2,0,0,0,3.454-2.019,28.684,28.684,0,0,1-3.184-12.921,2,2,0,1,0-4,0Z"></path><path class="c" d="M298.018,424.332l-.085,12.46a2,2,0,0,0,4,0l.085-12.46a2,2,0,0,0-4,0Z"></path><path class="b" d="M341.258,465.813c.116-.151.226-.308.329-.469a8.807,8.807,0,0,0,.583-7.38,24.16,24.16,0,0,0-3.788-6.608q-5.481-7.486-11.587-14.49c-1.587-1.82-3.38-3.716-5.753-4.164a3.567,3.567,0,0,1-1.773,3.742,8.367,8.367,0,0,1-4.278.966,23.746,23.746,0,0,1-16.62-6.614c.028,5-.022,6.663,0,11.664a10.48,10.48,0,0,0,.438,3.607c1.028,2.78,4.076,4.119,6.522,5.793,6.363,4.354,9.714,12.3,16.382,16.17a17.211,17.211,0,0,0,15.914.57A10.024,10.024,0,0,0,341.258,465.813Z"></path><path class="c" d="M248.751,464.8c-1.765-2.411-1.3-5.449-.01-7.976a55.661,55.661,0,0,1,5.738-8.271q3.174-4.14,6.56-8.112c1.828-2.153,3.806-5.162,6.732-5.814l-2.46-2.461a5.829,5.829,0,0,0,3.883,6.568c2.633,1.032,5.781.761,8.511.323a25.448,25.448,0,0,0,13.62-6.851L287.91,430.8c-.021,4.261.165,8.554-.02,12.81-.094,2.138-1.179,3.407-2.893,4.565a57.657,57.657,0,0,0-5.2,3.609c-6.048,5.129-9.634,13.857-17.855,16-4.468,1.166-10.438.41-13.5-3.383a2.012,2.012,0,0,0-2.828,0,2.048,2.048,0,0,0,0,2.829c3.109,3.849,8.921,5.341,13.677,5.006a20.357,20.357,0,0,0,12.979-6.144c3.2-3.157,5.678-6.96,8.877-10.119a31.092,31.092,0,0,1,5.264-3.947,11.806,11.806,0,0,0,4.659-4.621c1.259-2.721.855-6.042.848-8.965-.006-2.547-.017-5.094,0-7.642a2.022,2.022,0,0,0-3.414-1.414,21.425,21.425,0,0,1-9.4,5.292,20.461,20.461,0,0,1-6.214.725c-1.137-.045-4.06-.4-3.718-2.165a2.027,2.027,0,0,0-2.46-2.46c-3.578.8-5.931,3.833-8.189,6.48q-4.028,4.721-7.783,9.662c-4.039,5.3-10.389,13.142-5.439,19.907a2.059,2.059,0,0,0,2.736.717A2.015,2.015,0,0,0,248.751,464.8Z"></path><path class="c" d="M342.985,466.823c4.95-6.764-1.4-14.611-5.44-19.907q-3.764-4.932-7.782-9.662c-2.258-2.648-4.61-5.682-8.189-6.48a2.027,2.027,0,0,0-2.46,2.46c.342,1.766-2.586,2.12-3.718,2.165a20.461,20.461,0,0,1-6.214-.725,21.43,21.43,0,0,1-9.4-5.292,2.023,2.023,0,0,0-3.415,1.414c.012,2.269.006,4.537,0,6.805a48.066,48.066,0,0,0,.189,7.676c.812,5.082,5.968,6.587,9.377,9.571,3.39,2.967,5.9,6.763,8.938,10.057,3.234,3.5,7.2,6.272,11.985,7.07,5.371.894,12.207-.283,15.813-4.747a2.061,2.061,0,0,0,0-2.829,2.015,2.015,0,0,0-2.828,0c-2.682,3.32-7.738,4.32-11.788,3.739-4.286-.615-7.624-3.079-10.478-6.2-2.743-3-5.056-6.374-8-9.182a30.281,30.281,0,0,0-4.907-3.7c-1.436-.9-3.228-1.881-3.928-3.523a11.011,11.011,0,0,1-.371-4.221q-.006-1.775,0-3.548c.008-2.324.014-4.647,0-6.97l-3.414,1.414a25.448,25.448,0,0,0,13.62,6.851c2.665.427,5.737.7,8.324-.252a5.866,5.866,0,0,0,4.07-6.639l-2.46,2.461c2.862.638,4.785,3.526,6.578,5.632q3.458,4.064,6.714,8.294a57.644,57.644,0,0,1,5.642,8.083c1.343,2.571,1.9,5.682.086,8.164a2.014,2.014,0,0,0,.718,2.736A2.046,2.046,0,0,0,342.985,466.823Z"></path><path class="a" d="M249.322,236.257c1.651,17.269,3.488,51.4,5.175,79.424,1.986,33,2.8,106.105,3.245,113.47,4.933,1.645,24.116,1.761,35.557-.426,0,0,.308-.059.626-.116,9.392,1.953,31.385,2.187,36.318.542.445-7.365,1.259-80.473,3.245-113.47,1.687-28.02,3.012-61.687,4.662-78.956"></path><path class="c" d="M275.49,89.788a45.221,45.221,0,0,1-.432,5.562,41.926,41.926,0,0,1-.695,4.153c-.031.125-.064.25-.1.373-.017.056-.158.47-.054.193s-.061.124-.09.178c-.074.139-.159.265-.241.4.142-.229.109-.117-.039.035-.1.1-.2.2-.3.3-.333.316.25-.1-.187.129-.15.08-.292.176-.443.255-.337.175-.756.322-1.218.513q-.915.378-1.826.767a2.012,2.012,0,0,0-.718,2.736,2.054,2.054,0,0,0,2.737.718c.251-.107.161-.068-.039.016l.445-.187c.291-.121.581-.243.873-.361a14.993,14.993,0,0,0,2.038-.9,6.463,6.463,0,0,0,2.944-3.8,31.246,31.246,0,0,0,.756-4.314,53.587,53.587,0,0,0,.6-6.763,2,2,0,0,0-4,0Z"></path><path class="c" d="M306.474,89.788a53.841,53.841,0,0,0,.65,7.135,23.051,23.051,0,0,0,.82,4.307,6.49,6.49,0,0,0,3.392,3.728c.614.29,1.259.515,1.891.764q.483.191.965.385l.455.185c.487.194-.238-.105.02.006a2.066,2.066,0,0,0,2.737-.717,2.014,2.014,0,0,0-.718-2.736c-1.038-.45-2.091-.872-3.15-1.273a5.335,5.335,0,0,1-.834-.415c-.109-.064-.367-.246-.136-.066a3.619,3.619,0,0,1-.382-.35c-.04-.042-.319-.395-.157-.171s-.114-.206-.142-.255c-.062-.112-.118-.227-.17-.343.206.456.014-.012-.012-.1a28.051,28.051,0,0,1-.721-4.017,45.707,45.707,0,0,1-.508-6.071,2,2,0,0,0-4,0Z"></path><path class="c" d="M247.322,236.257c1.436,15.085,2.257,30.235,3.162,45.359.909,15.207,1.938,30.416,2.6,45.637.569,13.1.932,26.209,1.256,39.318q.476,19.254.83,38.512c.152,7.68.215,15.37.524,23.046.013.341.028.682.048,1.022a2.076,2.076,0,0,0,1.469,1.928,28.745,28.745,0,0,0,6.559,1.007c3.1.241,6.206.306,9.31.289a115.967,115.967,0,0,0,20.751-1.721c2.526-.476,1.457-4.332-1.064-3.857a110,110,0,0,1-19.687,1.578c-3.011.017-6.028-.045-9.032-.268a22.923,22.923,0,0,1-5.774-.885l1.468,1.929c-.4-6.678-.36-13.4-.493-20.086q-.374-18.783-.79-37.565c-.315-13.343-.669-26.688-1.2-40.025-.573-14.413-1.53-28.808-2.38-43.207-.942-15.95-1.824-31.914-3.181-47.836q-.179-2.088-.376-4.175a2.055,2.055,0,0,0-2-2,2.015,2.015,0,0,0-2,2Z"></path><path class="c" d="M336.15,236.725c-1.441,15.164-2.061,30.414-2.85,45.622-.784,15.106-1.765,30.207-2.416,45.319-.564,13.073-.925,26.154-1.247,39.234q-.473,19.157-.824,38.315c-.151,7.636-.214,15.282-.522,22.914-.013.341-.028.682-.048,1.022l1.468-1.929a12.808,12.808,0,0,1-1.908.429c-.631.1-1.357.179-2.306.261-2.358.2-4.726.282-7.091.316a164.86,164.86,0,0,1-16.543-.561,64.7,64.7,0,0,1-7.407-.986c-2.513-.514-3.587,3.341-1.063,3.857a96.472,96.472,0,0,0,15.388,1.557,138.3,138.3,0,0,0,16.109-.134,25.678,25.678,0,0,0,5.885-.882,2.073,2.073,0,0,0,1.468-1.928c.394-6.637.359-13.318.491-19.962q.369-18.6.78-37.2c.314-13.315.665-26.631,1.189-39.94.565-14.341,1.5-28.665,2.249-43,.834-16.034,1.518-32.092,2.826-48.1q.172-2.118.372-4.233a2.014,2.014,0,0,0-2-2,2.043,2.043,0,0,0-2,2Z"></path><path class="c" d="M292.141,279.371c0,13.184-.146,26.368-.216,39.551-.046,8.585-.043,17.171-.06,25.756q-.033,16.8-.064,33.607-.027,16.7-.02,33.4.007,5.727.037,11.454c.012,1.763-.058,3.559.085,5.319a2.3,2.3,0,0,0,1.012,1.877,2.012,2.012,0,0,0,2.737-.717,2.052,2.052,0,0,0-.718-2.737h0l.718.718c.128.237.251,1.372.241.641,0-.282-.018-.565-.024-.847-.022-1.012-.031-2.024-.039-3.036-.03-3.525-.037-7.05-.044-10.575q-.029-16.138.012-32.279.024-16.944.063-33.886c.017-8.135.01-16.27.045-24.405.058-13.467.188-26.933.231-40.4q0-1.721.006-3.441c0-2.574-4-2.578-4,0Z"></path><path class="c" d="M249.65,235.607h89.025c2.574,0,2.578-4,0-4H249.65c-2.573,0-2.578,4,0,4Z"></path><path class="d" d="M262.95,128.256c2.427.76,56.572.3,61.48-.507.589-3.478,1.726-17.885,2.593-21.274a34.173,34.173,0,0,1,11.324,5.966c.4,3.847-.687,21.909-.687,24.847,0,9.142-2.439,38.627-1.978,50.395.849,10.051,13.58,110.831,11.8,141.536a1.051,1.051,0,0,1-.95.931c-7.635,1.371-41.2,1.815-51.253,1.815,0,0-45.835-.74-51.208-1.851a1.087,1.087,0,0,1-.965-.995c-1.6-40.042,8.913-131.2,8.66-141.436-.313-12.656-2.713-40.66-2.713-49.8,0-2.939-.951-21.716-.449-25.482,2.25-2,9.261-5.873,11.542-6.4C260.668,108.118,262.207,124.135,262.95,128.256Z"></path><path class="a" d="M305.022,118.449c4.72-4.691,7.812-10.373,11.3-16.049a25.16,25.16,0,0,0-5.123-6.921,50.911,50.911,0,0,1-14.7,10.244c-.305.138-.644.307-.742.626a1.753,1.753,0,0,0,.318,1.074c.306.465,1.313,1.751,2.892,3.683C301.036,113.637,303.633,116.738,305.022,118.449Z"></path><path class="a" d="M281.477,118.449c-4.72-4.691-7.812-10.373-11.3-16.049a25.16,25.16,0,0,1,5.123-6.921,53.48,53.48,0,0,0,14.511,10.153c.3.145.832.4.93.717.085.277-.286.985-.446,1.226-.384.576-1.185,1.6-2.764,3.531C285.463,113.637,282.866,116.738,281.477,118.449Z"></path><path class="c" d="M306.436,119.863a65.381,65.381,0,0,0,9.2-12.469c.665-1.1,1.324-2.2,1.991-3.289a3.012,3.012,0,0,0,.662-1.971,5.608,5.608,0,0,0-.876-1.912,26.592,26.592,0,0,0-4.8-6.157,2.033,2.033,0,0,0-2.828,0,48.188,48.188,0,0,1-8.115,6.548,50.416,50.416,0,0,1-4.463,2.56c-1.369.692-3.119,1.17-3.413,2.911a4.123,4.123,0,0,0,1.135,3.14c.925,1.214,1.89,2.4,2.857,3.579,1.932,2.36,3.9,4.694,5.823,7.06a2.013,2.013,0,0,0,2.828,0,2.046,2.046,0,0,0,0-2.828c-1.647-2.025-3.325-4.025-4.984-6.039-.881-1.07-1.76-2.141-2.622-3.226-.2-.248-1.085-1.089-1.073-1.421l-.273,1.01q-.427.356.024.091l.342-.157c.345-.162.689-.325,1.031-.494q1.046-.519,2.067-1.089,2.1-1.173,4.09-2.541a52.988,52.988,0,0,0,7.574-6.276h-2.828a24.256,24.256,0,0,1,4.81,6.517v-2.019c-3.337,5.443-6.447,11.081-10.986,15.644C301.79,118.862,304.617,121.691,306.436,119.863Z"></path><path class="c" d="M282.891,117.035c-4.539-4.563-7.649-10.2-10.986-15.644v2.019a24.235,24.235,0,0,1,4.81-6.517h-2.828a51.97,51.97,0,0,0,7.7,6.311q1.96,1.328,4.028,2.489,1,.563,2.02,1.085c.333.17.668.333,1,.5.313.156.668.583.379.081l-.273-1.01c-.013-.3-.2.258-.327.439-.206.3-.4.542-.547.732-.841,1.075-1.711,2.127-2.578,3.181-1.739,2.114-3.5,4.21-5.227,6.334a2.058,2.058,0,0,0,0,2.828,2.014,2.014,0,0,0,2.828,0c2-2.461,4.048-4.886,6.055-7.343.888-1.087,1.782-2.174,2.621-3.3a4.688,4.688,0,0,0,1.175-2.872c-.069-1.794-1.916-2.42-3.257-3.111q-2.243-1.156-4.379-2.506a47.808,47.808,0,0,1-8.391-6.667,2.036,2.036,0,0,0-2.828,0,26.517,26.517,0,0,0-4.7,5.99,8.276,8.276,0,0,0-.936,1.814,2.764,2.764,0,0,0,.626,2.236c.667,1.094,1.326,2.193,1.991,3.289a65.381,65.381,0,0,0,9.2,12.469C281.881,121.69,284.71,118.862,282.891,117.035Z"></path><path class="c" d="M291.4,107.322c0,4.84-.337,9.706-.131,14.543a2.041,2.041,0,0,0,2,2,2.019,2.019,0,0,0,2-2c-.206-4.837.127-9.7.131-14.543a2,2,0,0,0-4,0Z"></path><path class="c" d="M262.419,130.185a11.319,11.319,0,0,0,2.55.256c1.5.071,2.991.1,4.487.126,4.627.079,9.254.083,13.881.074,10.626-.022,21.257-.12,31.879-.422a75.7,75.7,0,0,0,9.746-.542,1.925,1.925,0,0,0,1.4-1.4c.6-3.6.853-7.268,1.231-10.9a75.841,75.841,0,0,1,1.361-10.38l-2.46,1.4a28.366,28.366,0,0,1,10.442,5.452l-.586-1.414c.4,4.149-.016,8.465-.187,12.617-.166,4.029-.453,8.066-.5,12.1-.115,10.085-.966,20.165-1.477,30.235-.386,7.611-1.045,15.383-.233,22.984.623,5.829,1.31,11.652,1.971,17.477q1.548,13.624,3.019,27.259,1.7,15.9,3.206,31.812c.968,10.395,1.854,20.8,2.534,31.218.543,8.33,1.008,16.685.968,25.035-.008,1.573-.036,3.146-.1,4.717a3.253,3.253,0,0,0-.049,1.02c.068.16-.331.718.246-.27.648-1.109.326-.311.14-.4-.086-.043-.391.062-.5.08-.232.038-.349.048-.025.006-.177.023-.355.045-.533.066q-.594.07-1.188.128c-4.389.432-8.806.605-13.211.774-10.43.4-20.871.584-31.308.654-4.9.034-9.794-.088-14.692-.191-9.08-.192-18.161-.408-27.235-.767-3.444-.137-6.893-.271-10.328-.552-.543-.044-1.084-.1-1.625-.154-.114-.012-.227-.028-.34-.041.484.053.186.038.187.024,0,.031-.448-.111-.485-.083.222-.163.517,1.375.474.163q-.012-.334-.022-.669-.025-.8-.045-1.6-.039-1.6-.055-3.2c-.106-10.1.29-20.213.811-30.3.6-11.6,1.413-23.194,2.315-34.776.858-11.013,1.8-22.019,2.774-33.023.753-8.543,1.538-17.085,2.229-25.634a121.653,121.653,0,0,0,.558-15.039c-.495-11.664-1.451-23.3-2.129-34.958-.484-8.328-.667-16.683-.913-25.021-.114-3.849-.477-7.892,0-11.729l-.586,1.415a32.766,32.766,0,0,1,5.354-3.44,22.966,22.966,0,0,1,5.305-2.448l-2.46-1.4c.107.453.171.917.238,1.377.025.169.048.339.072.509-.059-.427.019.148.03.235.056.438.112.876.165,1.315.274,2.234.525,4.472.779,6.708.458,4.035.814,8.114,1.523,12.115a2.017,2.017,0,0,0,2.46,1.4,2.045,2.045,0,0,0,1.4-2.461c-.643-3.628-1-7.687-1.447-11.643a91.239,91.239,0,0,0-1.36-10.615,2.031,2.031,0,0,0-2.46-1.4,29.442,29.442,0,0,0-7.11,3.33c-1.219.7-2.425,1.432-3.575,2.242-1.213.854-2.208,1.5-2.362,3.089-.435,4.477-.045,9.117.1,13.6.294,8.969.531,17.932,1.09,26.889.4,6.418.846,12.833,1.245,19.251.321,5.146.733,10.321.766,15.48.035,5.372-.643,10.8-1.1,16.146-.84,9.852-1.739,19.7-2.592,29.549-1.039,12-2.03,24.01-2.886,36.028-.84,11.8-1.568,23.613-1.974,35.437-.177,5.178-.292,10.36-.279,15.542.006,2.268.037,4.537.107,6.8.045,1.464-.045,3,1.249,3.988a4.387,4.387,0,0,0,2.248.755c3.06.409,6.169.508,9.25.649,4.641.213,9.285.364,13.93.5q12.492.363,24.99.575c6.881.124,13.768-.028,20.648-.158,10.349-.2,20.844-.178,31.142-1.332.792-.089,1.6-.154,2.384-.322a3.244,3.244,0,0,0,2.618-3.348c.1-1.577.122-3.164.138-4.745.04-3.993-.063-7.988-.219-11.978-.395-10.144-1.139-20.274-1.978-30.39-.937-11.315-2.024-22.618-3.181-33.913q-1.594-15.557-3.351-31.1c-.836-7.456-1.7-14.909-2.534-22.364-.222-1.975-.449-3.949-.638-5.927a95.107,95.107,0,0,1,.06-12.371c.424-11.675,1.36-23.326,1.778-35,.311-8.723.907-17.488.855-26.216,0-.716-.008-1.437-.073-2.151-.155-1.712-1.817-2.641-3.141-3.523a36.61,36.61,0,0,0-9.667-4.54,2.023,2.023,0,0,0-2.46,1.4,80.162,80.162,0,0,0-1.44,10.828c-.221,2.111-.432,4.223-.657,6.333-.094.881-.189,1.761-.294,2.64-.038.321-.077.643-.12.965.063-.472-.059.372-.081.508l1.4-1.4c-.439.07.635-.053.012,0-.213.017-.427.041-.641.058-.562.045-1.125.077-1.689.107-1.668.089-3.338.147-5.008.2-4.808.15-9.618.236-14.428.3-10.353.149-20.711.241-31.065.107-1.813-.023-3.627-.052-5.439-.121-.585-.023-1.171-.046-1.755-.093-.188-.015-.38-.049-.568-.054.386.011.523.11.164,0C261.006,125.6,259.949,129.462,262.419,130.185Z"></path><path class="a" d="M242.712,167.17c-5.576-.677-12.357-1.412-16.288-2.078-.768,8.976-1.451,21.217-1.079,26.386A23.251,23.251,0,0,0,227,199.426c4.512,5.643,18.007,13.874,28.762,20.292l1.343.718c.95.508,4.2,1.814,4.964,2.538a47.409,47.409,0,0,0,10.1,7.5l1.3.721a5.7,5.7,0,0,1,.444-1.292c2.676-4,10.531-11.663,15.195-15.518a20.236,20.236,0,0,0-6.409-3.607c-4.625-1.6-8.7-1.4-12.985-3.137l-.763-.309c-5.32-3.022-11.834-8.525-16.23-12.095-2.966-2.079-4.182-4.584-4-11.339.067-2.41.726-9.6,1.108-15.739C248.156,167.853,245.6,167.519,242.712,167.17Z"></path><path class="c" d="M340.7,245.74c-7.549.017-15.144.16-22.685.489a3.49,3.49,0,0,0-3.079,1.61c-.608,1.055-.435,2.409-.442,3.582-.014,2.612-.02,5.227.136,7.835a24.888,24.888,0,0,0,1.211,7.376c.981,2.554,3.014,3.675,5.571,4.4a27.93,27.93,0,0,0,21.975-3.068c2.163-1.382.159-4.846-2.019-3.454a23.976,23.976,0,0,1-16.786,3.146,15.434,15.434,0,0,1-3.632-1,4.733,4.733,0,0,1-.94-.57c-.348-.318.169.322-.088-.122-.094-.162-.185-.324-.265-.5a19.851,19.851,0,0,1-1-5.74c-.164-2.419-.18-4.846-.171-7.269a14.47,14.47,0,0,0,.011-2.6v-.194q.06-.782-.739.571c.029.02.117-.012.151,0a2.027,2.027,0,0,0,.51-.009c3.541-.07,7.081-.167,10.621-.251,3.884-.092,7.771-.223,11.657-.231,2.573-.006,2.578-4.006,0-4Z"></path><path class="a" d="M291.063,226.178c-1.8,1.6-7.661,6.6-9.676,8.583-2.088,1.892-5.4,1.833-6.571.725a5.658,5.658,0,0,1-.9-6.343c2.846-4.251,11.553-12.655,16.048-16.208,7.18-3.433,22.144-4.371,28.214-3.89,5.746-5.129,11.351-8.629,15.881-14.071,5.022-6.035,3.854-8.132,3.369-15.495-.159-2.415-.4-6.781-.508-11.328,4.489-.8,15.234-1.841,21.627-2.781,0,.08.006.121.006.121,1.119,11.129,2.273,25.936,1.317,29.373-1.756,6.316-30.942,27.6-36.944,31.477-.366,2.184-6.149,3.458-8.526,4.254-2.254.754-4.751,1.308-7.083,1.913-2.872.746-4.2,2.136-6.086,4.5-1.543,1.941-4.027,5.1-6.314,6.029-3.3,1.335-3.953-.887-3.583-2.776a4.878,4.878,0,0,1-6.037-.629c-1.556-1.723-.222-6.167,1.389-9.223"></path><path class="a" d="M325.741,143.642c-1.592,0-15.55-.023-20.666-.023-.009,4.5-.018,7.589-.027,12.092,2.977,0,16.7-.045,20.693-.045Z"></path><path class="c" d="M325.741,141.642c-6.889,0-13.777-.022-20.666-.023a2.03,2.03,0,0,0-2,2q-.012,6.047-.027,12.092a2.029,2.029,0,0,0,2,2c6.9,0,13.8-.044,20.693-.045a2.029,2.029,0,0,0,2-2V143.642c0-2.574-4-2.578-4,0v12.024l2-2c-6.9,0-13.795.044-20.693.045l2,2q.012-6.047.027-12.092l-2,2c6.889,0,13.777.022,20.666.023C328.315,145.642,328.319,141.642,325.741,141.642Z"></path><path class="c" d="M356.551,165.491c.766,7.643,1.5,15.328,1.656,23.013.026,1.328.034,2.66-.038,3.988-.025.457-.054.917-.115,1.371.067-.494-.026.124-.054.224-.037.136-.09.283-.115.421-.068.379.051-.094.031-.057-.071.133-.133.27-.206.4a9.67,9.67,0,0,1-.517.826c-.111.161-.227.318-.343.476-.2.274.193-.229-.126.158-.3.362-.6.719-.908,1.069a96.7,96.7,0,0,1-10.826,9.95c-4.294,3.545-8.7,6.946-13.179,10.259-3.343,2.476-6.695,5-10.22,7.22-2.174,1.367-.169,4.83,2.018,3.454,3.065-1.926,5.985-4.106,8.9-6.246,4.709-3.456,9.352-7.007,13.884-10.691a114.685,114.685,0,0,0,11.6-10.41,20,20,0,0,0,3.25-4.2,12.477,12.477,0,0,0,.969-5.664c.139-8.515-.817-17.1-1.665-25.563a2.056,2.056,0,0,0-2-2,2.014,2.014,0,0,0-2,2Z"></path><path class="c" d="M334.919,168c.1,4.344.267,8.7.623,13.029.23,2.788.813,5.756-.2,8.347-1.357,3.471-4.529,6.4-7.241,8.83-3.553,3.182-7.428,5.982-11.016,9.124-1.94,1.7.9,4.519,2.828,2.829,5.705-5,12.138-9.2,16.77-15.3a14.526,14.526,0,0,0,3.124-7.133,40.866,40.866,0,0,0-.338-7.646c-.293-4.018-.455-8.049-.549-12.076-.061-2.57-4.061-2.579-4,0Z"></path><path class="c" d="M289.191,211.963c-4.233-3.1-9.026-3.947-14.067-4.9a18.917,18.917,0,0,1-6.728-2.4c-2.039-1.277-3.992-2.692-5.908-4.147-1.9-1.444-3.755-2.947-5.6-4.455a51,51,0,0,1-4.243-3.493,6.44,6.44,0,0,1-1.608-3.3,23.309,23.309,0,0,1-.284-5.935c.233-5.111.775-10.21,1.092-15.317.159-2.571-3.842-2.561-4,0-.3,4.88-.77,9.75-1.055,14.631-.214,3.669-.295,8.033,1.814,11.235a15.589,15.589,0,0,0,3.489,3.4c1.889,1.541,3.771,3.088,5.685,4.6,3.86,3.046,7.951,6.6,12.689,8.149,2.923.955,6.007,1.2,8.99,1.9a20.651,20.651,0,0,1,7.719,3.49,2.015,2.015,0,0,0,2.737-.718,2.046,2.046,0,0,0-.718-2.736Z"></path><path class="c" d="M273.177,228.742a45.388,45.388,0,0,1-7.83-5.478,24.489,24.489,0,0,0-2.711-2.342,23.835,23.835,0,0,0-3.073-1.53,65.291,65.291,0,0,1-6.622-3.7c-2.882-1.739-5.752-3.5-8.588-5.316-4.857-3.108-9.857-6.3-14.03-10.31-.386-.371-.763-.751-1.125-1.145a2.519,2.519,0,0,1-.671-.98,19.909,19.909,0,0,1-1.018-4.654,57.051,57.051,0,0,1-.254-7.349c.107-6.957.58-13.918,1.169-20.849.218-2.565-3.783-2.55-4,0-.551,6.478-.984,12.977-1.141,19.478a70.153,70.153,0,0,0,.1,7.366c.24,2.973.49,6.888,2.5,9.264,3.626,4.284,8.695,7.523,13.327,10.6,2.795,1.855,5.636,3.639,8.5,5.393,2.74,1.682,5.465,3.467,8.326,4.938,1.038.533,2.12.975,3.169,1.486a10.3,10.3,0,0,1,1.592.875c-.447-.327.3.309.305.313q.462.43.932.853a50.647,50.647,0,0,0,9.131,6.54c2.249,1.258,4.268-2.2,2.019-3.454Z"></path><path class="c" d="M289.649,224.764c-1.615,1.431-3.256,2.834-4.88,4.255s-3.144,2.965-4.8,4.328a4.111,4.111,0,0,1-3,.9c-.911-.1-1.25-.571-1.51-1.565-.59-2.263,1.115-3.871,2.476-5.427a114.717,114.717,0,0,1,11.154-11,14.1,14.1,0,0,1,2.116-1.7,17.229,17.229,0,0,1,3.184-1.125,57.418,57.418,0,0,1,7.77-1.61,75.578,75.578,0,0,1,15.76-.79c2.57.171,2.56-3.83,0-4a80.4,80.4,0,0,0-16.3.859,57.292,57.292,0,0,0-8.593,1.772,22.942,22.942,0,0,0-3.721,1.386,15.478,15.478,0,0,0-2.933,2.286,102.5,102.5,0,0,0-12.4,12.442,12.147,12.147,0,0,0-2.152,3.211,7.833,7.833,0,0,0-.116,5.1c1.062,3.222,3.814,4.57,7.072,4.039,3.073-.5,5.128-3.022,7.346-4.983,2.107-1.862,4.249-3.685,6.354-5.55,1.93-1.711-.907-4.531-2.829-2.828Z"></path><path class="c" d="M284.957,229.4c-1.506,2.919-3.293,7.117-1.883,10.385,1.532,3.548,6.269,3.879,9.267,2.2l-2.938-2.258c-.446,2.6.449,5.508,3.507,5.7,3.167.2,5.838-2.41,7.754-4.6,1.777-2.031,3.291-4.8,5.838-5.95a30.145,30.145,0,0,1,4.915-1.35c1.544-.4,3.055-.888,4.581-1.345,2.634-.788,6.179-1.491,8.016-3.724,1.623-1.972-1.191-4.818-2.828-2.828a6.712,6.712,0,0,1-3.08,1.706c-1.253.439-2.534.785-3.8,1.18-1.9.594-3.814,1.122-5.749,1.606a16.51,16.51,0,0,0-4.909,1.759c-2.693,1.689-4.326,4.541-6.45,6.825a9.247,9.247,0,0,1-3.586,2.659c.121-.044-.425.1-.418.095a1.2,1.2,0,0,1,.109.127q.122.229-.057-.087a2.6,2.6,0,0,1,.014-.712,2.028,2.028,0,0,0-2.938-2.259c-1.178.659-3.514.786-3.713-.839-.254-2.076.879-4.488,1.8-6.276,1.178-2.284-2.272-4.31-3.454-2.019Z"></path><path class="c" d="M338.264,169.942c8-1.267,16.183-1.548,24.114-3.209,2.518-.527,1.452-4.384-1.064-3.857-7.927,1.66-16.119,1.942-24.114,3.209a2.015,2.015,0,0,0-1.4,2.46,2.05,2.05,0,0,0,2.461,1.4Z"></path><path class="c" d="M249.535,166.085c-7.994-1.267-16.186-1.549-24.114-3.209-2.511-.526-3.585,3.329-1.063,3.857,7.93,1.661,16.118,1.942,24.114,3.209a2.063,2.063,0,0,0,2.46-1.4,2.016,2.016,0,0,0-1.4-2.46Z"></path><path class="c" d="M287.331,77.417a12.853,12.853,0,0,0,6.188,1.442,10.17,10.17,0,0,0,6.334-1.906,2,2,0,0,0,0-2.829,2.064,2.064,0,0,0-2.829,0c.685-.533-.073.019-.293.134-.17.09-.637.23-.027.033-.171.055-.337.129-.508.185-.217.069-.436.128-.658.18a4.538,4.538,0,0,0-.765.144c.028-.069.422-.047-.015,0-.14.014-.279.025-.419.034-.337.022-.674.031-1.011.029-.3,0-.6-.012-.906-.033-.138-.009-.276-.02-.414-.034l-.237-.026q-.233-.029.156.02a3.852,3.852,0,0,1-1.328-.3c-.187-.056-.368-.122-.552-.185-.464-.159.4.193-.022,0q-.34-.162-.675-.337a2,2,0,0,0-2.019,3.453Z"></path><path class="c" d="M292.3,63.108a27.907,27.907,0,0,1,.659,3.011l-.072-.532a1.755,1.755,0,0,1,.011.416l.072-.532a1,1,0,0,1-.046.187l.2-.478a.787.787,0,0,1-.066.121l.313-.405a.7.7,0,0,1-.1.1l.405-.313a1.875,1.875,0,0,1-.239.126l.478-.2a1.749,1.749,0,0,1-.4.117l.532-.071a1.585,1.585,0,0,1-.377,0l.531.071c-.142-.02-.282-.054-.424-.073a1.506,1.506,0,0,0-.8-.036,1.486,1.486,0,0,0-.743.237,2,2,0,0,0-.718,2.737,1.921,1.921,0,0,0,1.2.919c.364.049.717.14,1.088.157a3.559,3.559,0,0,0,1.656-.4,2.489,2.489,0,0,0,1.351-1.629,3.9,3.9,0,0,0-.015-1.7c-.164-.97-.388-1.931-.637-2.883a2,2,0,0,0-2.461-1.4,2.025,2.025,0,0,0-1.195.919,2.107,2.107,0,0,0-.2,1.542Z"></path><path class="c" d="M276.814,54.458c-.5,1.635-.175,5.394,2.921,5.714,4.091-.025,4.309-4.57,2.932-6.707C281.539,51.716,278.223,50.988,276.814,54.458Z"></path><path class="c" d="M309.582,54.459c.5,1.634.175,5.393-2.921,5.713-4.092-.025-4.31-4.57-2.932-6.707C304.856,51.716,308.173,50.988,309.582,54.459Z"></path><path class="e" d="M48.7,334.842c0,1.448,0,3.585,0,6.143l119.312-.629c0-2.632,0-4.829,0-6.311,0-9.42.3-31.917.3-40.423l-.16-11.63c.123-11.864-.2-34.711-.352-48.491-12.39,0-104.576-.046-118.967-.047-.082,13.707-.226,36.654-.1,48.612L48.4,294.807C48.4,303.231,48.7,325.512,48.7,334.842Z"></path><path class="e" d="M48.7,340.986c0,3.762,0,8.443,0,13.257l3.529-.041c38.469-.438,77.252-.457,115.789-1.149,0-4.6,0-9.058,0-12.682C127.684,340.748,88.86,340.773,48.7,340.986Z"></path><path class="e" d="M147.686,378.863q10.331-.086,20.346-.212a.779.779,0,0,0-.011.157c0,3.006-.015,15.489-.024,26.306-36.566.016-83.586.389-119.282.406-.009-10.78-.024-23.341-.024-26.344v-.248q10.588.05,21.04.083Z"></path><path class="a" d="M168.309,294.947c0-.406,0-.791,0-1.152,2.535.029,5.427.053,8.21.057v.2c0,9.2-.3,22.92-.3,33.12,0,8.98.01,41.95.01,48.47,0,4.619-.03,29.913-.03,41.375l-8.21,0c0-10.584.03-33.947.03-38.214,0-6.021-.01-36.47-.01-44.763C168.011,325.079,168.283,304.268,168.309,294.947Z"></path><path class="a" d="M167.707,226.1q0-.39-.006-.746l0-.4a3.464,3.464,0,0,0,2.593,1.133h3.314a4.883,4.883,0,0,0,2.884-.742c-.066,10.76.283,42.1.413,56.788-2.938,0-5.978.012-8.754.018l0-.156C168.3,267.592,167.79,237.01,167.707,226.1Z"></path><path class="a" d="M40.321,310.279c-.075-5.833-.15-11.541-.15-16.145,0,0,0-.1,0-.281,2.792,0,5.692-.025,8.232-.051,0,.638,0,1,0,1,0,8.424.3,30.7.3,40.035,0,8.214-.01,38.37-.01,44.334,0,4.225.03,27.366.03,37.851-2.834,0-5.642-.007-8.23-.008,0-11.462-.03-36.756-.03-41.375,0-6.52.01-39.49.01-48.47C40.471,322.073,40.4,316.114,40.321,310.279Z"></path><path class="a" d="M48.891,226.867c0-.451.006-.874.008-1.265a5.434,5.434,0,0,1-2.448.482H43.137a3.49,3.49,0,0,1-2.746-1.3c.065,10.782-.286,42.71-.414,57.341l8.753.024v-.084C48.583,267.871,48.813,238.2,48.891,226.867Z"></path><path class="a" d="M53.474,293.747c-4.771.051-15.319.2-21.134.025a2.04,2.04,0,0,1-1.984-2.068c.016-1.157.043-2.395.072-3.6a6.129,6.129,0,0,1,6.144-5.985c5.652.012,12.266.035,16.882.042a2.051,2.051,0,0,1,2.048,2.057v7.473A2.051,2.051,0,0,1,53.474,293.747Z"></path><path class="a" d="M163.218,293.747c4.77.051,15.318.2,21.133.025a2.04,2.04,0,0,0,1.984-2.068c-.012-.884-.031-1.815-.051-2.743a7,7,0,0,0-7.012-6.841c-5.455.012-11.647.034-16.034.04a2.052,2.052,0,0,0-2.049,2.057v7.473A2.051,2.051,0,0,0,163.218,293.747Z"></path><path class="a" d="M174.212,217.148a4.2,4.2,0,0,1,3.794,4.266c0,2.825-1.037,4.67-4.4,4.67h-3.314c-1.935,0-3.719-1.5-3.719-4.5,0-3.317,2.236-4.465,3.373-4.465C172.38,217.124,173.646,217.043,174.212,217.148Z"></path><path class="a" d="M47.057,217.148a4.2,4.2,0,0,1,3.795,4.266c0,2.825-1.038,4.67-4.4,4.67H43.137c-1.935,0-3.719-1.5-3.719-4.5,0-3.317,2.237-4.465,3.373-4.465C45.225,217.124,46.491,217.043,47.057,217.148Z"></path><path class="f" d="M112.5,431.77s21.245.1,33.42.1c6.457,0,26.657-.223,32.531-.223V417.019c-15.37,0-162.164.079-108.824.051-5.178-.014-20.267-.051-30.732-.051v14.629c5.874,0,26.074.223,32.531.223,12.175,0,41.715-.1,41.923-.1"></path><path class="f" d="M203.428,383.231c0-9.382-.181-56.714-.181-66.175,0-3.979-1.737-9.124-6.461-9.124-4.79,0-6.76,3.034-7.1,7.177-.65,7.9-.392,63.091-.392,68.437,0,8.854-.055,54.659-.055,64.182,0,3.623,1.026,9.187,7.034,9.187,5.742,0,7.168-5.654,7.168-9.7C203.44,441.543,203.428,384.327,203.428,383.231Z"></path><path class="f" d="M13.173,383.231c0-9.382.181-56.714.181-66.175,0-3.979,1.736-9.124,6.461-9.124,4.79,0,6.76,3.034,7.1,7.177.649,7.9.392,63.091.392,68.437,0,8.854.055,54.659.055,64.182,0,3.623-1.026,9.187-7.035,9.187-5.741,0-7.167-5.654-7.167-9.7C13.161,441.543,13.173,384.327,13.173,383.231Z"></path><path class="c" d="M38.171,294.134c0,11.131.3,22.261.3,33.392q0,10.551,0,21.1,0,19.56,0,39.119.014,14.639.021,29.278c0,2.574,4,2.578,4,0q0-21.805-.03-43.612,0-22.087.01-44.173c0-11.7-.295-23.4-.3-35.1,0-2.574-4-2.578-4,0Z"></path><path class="c" d="M48.837,235.459q8.08,0,16.16,0l26.9.01,30.611.011,27.191.01,17.027,0h1.054c2.574,0,2.578-4,0-4q-7.621,0-15.245,0l-26.427-.009-30.584-.012-27.605-.01-17.886,0H48.837c-2.574,0-2.578,4,0,4Z"></path><path class="c" d="M46.9,225.6c-.093,14.879-.215,29.757-.214,44.636,0,3.944.008,7.888.048,11.832.026,2.573,4.026,2.579,4,0-.158-15.661,0-31.328.1-46.99q.032-4.738.063-9.478c.017-2.574-3.983-2.577-4,0Z"></path><path class="c" d="M38.391,224.785c.088,15.145-.157,30.3-.3,45.44q-.056,5.883-.11,11.764c-.023,2.575,3.977,2.577,4,0,.14-15.823.328-31.646.4-47.47.015-3.244.029-6.489.01-9.734-.015-2.573-4.015-2.578-4,0Z"></path><path class="c" d="M178.2,417.024q0-21.805.03-43.612,0-22.176-.01-44.352c0-11.67.295-23.337.3-35.006,0-2.574-4-2.578-4,0,0,11.134-.3,22.266-.3,33.4q0,10.434,0,20.867,0,19.713,0,39.426-.014,14.639-.021,29.278c0,2.574,4,2.578,4,0Z"></path><path class="c" d="M48.872,343.008c30.818-.187,61.638-.232,92.456-.445q13.093-.091,26.185-.228c2.573-.027,2.579-4.027,0-4-30.846.329-61.7.409-92.543.541q-13.048.056-26.1.132c-2.573.016-2.579,4.016,0,4Z"></path><path class="c" d="M48.948,356.238c30.906-.369,61.815-.45,92.721-.8q13.137-.151,26.273-.38c2.571-.046,2.579-4.046,0-4-30.92.553-61.846.676-92.769.927q-13.113.107-26.225.257c-2.572.03-2.579,4.03,0,4Z"></path><path class="c" d="M147.686,380.863q10.128-.084,20.254-.211c2.572-.033,2.579-4.033,0-4q-10.127.129-20.254.211c-2.573.021-2.579,4.021,0,4Z"></path><path class="c" d="M48.762,380.927q10.485.051,20.969.084c2.574.007,2.578-3.992,0-4q-10.485-.033-20.969-.084c-2.574-.012-2.578,3.988,0,4Z"></path><path class="c" d="M49,407.52q22.633,0,45.265-.137,24.144-.114,48.287-.22,12.561-.043,25.123-.05c2.573,0,2.578-4,0-4q-22.965,0-45.929.137-24.05.112-48.1.22-12.322.043-24.646.05c-2.573,0-2.578,4,0,4Z"></path><path class="c" d="M46.4,294.807c0,16.329.3,32.656.3,48.986q-.006,21.355,0,42.711.015,15.265.024,30.53c0,2.574,4,2.578,4,0q0-22.192-.029-44.386c0-15.657.086-31.315-.039-46.971-.083-10.29-.249-20.58-.252-30.87,0-2.574-4-2.578-4,0Z"></path><path class="c" d="M169.991,417.024q0-22.355.029-44.709c0-15.814-.087-31.63.039-47.444.082-10.416.249-20.833.252-31.249,0-2.574-4-2.578-4,0,0,16.533-.3,33.066-.3,49.6q.006,21.551,0,43.1-.015,15.351-.024,30.7c0,2.574,4,2.578,4,0Z"></path><path class="c" d="M165.7,225.351c.1,14.955.393,29.908.463,44.864.018,3.925.026,7.852-.013,11.777-.026,2.575,3.974,2.577,4,0,.158-15.733-.16-31.474-.351-47.206-.038-3.145-.078-6.29-.1-9.435-.016-2.573-4.016-2.578-4,0Z"></path><path class="c" d="M174.49,225.351c-.088,15,.156,30.007.3,45.007q.057,5.882.111,11.762c.023,2.572,4.023,2.579,4,0-.138-15.681-.327-31.361-.4-47.042-.016-3.242-.029-6.485-.01-9.727.015-2.574-3.985-2.577-4,0Z"></path><path class="c" d="M53.474,291.747c-4.074.044-8.148.093-12.222.1-2.177,0-4.353,0-6.53-.029q-.767-.01-1.534-.028c-.205,0-.87-.077-.762,0-.249-.18.026.111-.059-.036a4.129,4.129,0,0,1,0-.936c.013-.756.027-1.511.047-2.267a4.3,4.3,0,0,1,2.713-4.19,8.264,8.264,0,0,1,2.946-.245l4.21.011q4.09.012,8.182.022l1.729,0c.243,0,1.219-.02,1.19-.041.18.133.04-.131.115.126a2.081,2.081,0,0,1,0,.46c.035,1.49,0,2.985,0,4.475,0,.675.011,1.351,0,2.026a1.875,1.875,0,0,1,0,.443c-.057.19-.06.1-.028.1a2.054,2.054,0,0,0-2,2,2.015,2.015,0,0,0,2,2c2.658-.242,4.028-2.143,4.028-4.681v-5.129c0-1.857.048-3.691-1.625-4.95-1.26-.948-2.748-.828-4.242-.831l-4.922-.011c-3.375-.01-6.767-.122-10.141-.027a8.3,8.3,0,0,0-7.01,3.987,8.587,8.587,0,0,0-1.134,4c-.087,1.592-.355,3.559.21,5.066,1.121,2.987,4.453,2.638,7.067,2.665,5.923.062,11.846-.023,17.769-.087C56.046,295.719,56.053,291.719,53.474,291.747Z"></path><path class="c" d="M163.218,295.747c5.231.056,10.463.124,15.694.1,1.23,0,2.459-.015,3.687-.037,1.459-.026,2.931.048,4.149-.89,1.358-1.044,1.6-2.5,1.573-4.115a14.277,14.277,0,0,0-.55-4.676,9.154,9.154,0,0,0-5.659-5.556,12.511,12.511,0,0,0-4.145-.452l-5.566.015c-3.124.009-6.385-.244-9.5.049-2.5.235-3.715,2.338-3.715,4.654v5.728a9.265,9.265,0,0,0,.1,1.984,4.156,4.156,0,0,0,3.931,3.194,2.015,2.015,0,0,0,2-2,2.043,2.043,0,0,0-2-2c.037,0,.015.074-.029-.068a1.432,1.432,0,0,1,0-.245c-.054-.549,0-1.13,0-1.681v-4.32a4.836,4.836,0,0,1,0-1.147c.028-.1.093-.192.013-.109.128-.133.113-.054.036-.017a3.341,3.341,0,0,1,1.071,0q3.934-.007,7.87-.019l4.019-.012a24.788,24.788,0,0,1,3.893.048,5.071,5.071,0,0,1,3.823,3.019,8.407,8.407,0,0,1,.4,3.155c.006.276.025,1.4.042,1.382-.02.023-.2.13,0,.041a3.47,3.47,0,0,1-.848.022c-2.133.049-4.266.058-6.4.059-4.629,0-9.258-.056-13.886-.106C160.643,291.719,160.641,295.719,163.218,295.747Z"></path><path class="c" d="M173.68,219.076a9.305,9.305,0,0,1,1,.269c.482.153-.323-.206.088.045.122.075.252.137.373.215l.115.076q.266.192-.086-.068c.022-.013.258.239.281.262.065.067.164.235.244.277-.188-.248-.223-.287-.1-.116.032.049.063.1.092.149.048.082.087.17.137.251.213.34-.129-.45-.024-.07.056.2.122.408.177.614.078.288-.093.248,0-.132a1.253,1.253,0,0,0,.026.289,6.946,6.946,0,0,1,0,.777c0,.115-.012.23-.022.344l-.013.134c-.026.224-.02.177.02-.14-.091.075-.125.594-.165.726a1.957,1.957,0,0,0-.116.335c.025-.389.155-.293.012-.064-.057.091-.125.191-.172.286-.12.169-.082.123.115-.141-.047.057-.1.111-.147.164a1.781,1.781,0,0,0-.159.153c-.246.3.39-.232.049-.038-.1.057-.2.117-.3.177-.358.22.443-.133.027,0-.261.081-.518.148-.785.208-.479.106.449-.01-.067,0-.221.007-.441.024-.663.026-.73.007-1.461,0-2.192,0H170.7c-.177,0-.355,0-.531,0-.349-.014-.188-.142.044.023a2.737,2.737,0,0,0-.7-.2c.273-.028.332.159.037-.01-.071-.041-.141-.084-.21-.13q-.258-.183.106.087c.023-.044-.471-.371-.452-.458l.151.193q-.078-.111-.15-.228c-.074-.121-.132-.248-.2-.372.242.436.022.046-.018-.076-.049-.15-.09-.3-.125-.458-.018-.079-.085-.613-.038-.135-.024-.244-.038-.488-.038-.733,0-.181.016-.361.021-.542,0-.106.074-.378-.011.029.063-.3.139-.59.224-.887.129-.451-.212.361.013-.03.064-.112.12-.228.189-.339.154-.248.263-.167-.031.007.11-.065.215-.248.309-.339.029-.028.206-.224.245-.218,0,0-.435.277-.069.071.084-.048.171-.1.254-.148.421-.255-.348.091-.059.017.081-.021.16-.054.241-.075.474-.125-.144-.022-.156,0,.05-.1.942-.013,1.062-.014.7,0,1.4-.02,2.1-.025.248,0,.5,0,.743,0,.081,0,.163.009.244.011.443.012-.487-.081-.213-.035a2.049,2.049,0,0,0,2.46-1.4,2.024,2.024,0,0,0-1.4-2.46,22.806,22.806,0,0,0-3.938-.1,5.825,5.825,0,0,0-3.816,1.1,6.265,6.265,0,0,0-2.323,4.222,7.331,7.331,0,0,0,1.1,5.276,5.632,5.632,0,0,0,4.4,2.364c.942.035,1.894,0,2.837,0a7.511,7.511,0,0,0,4.8-1.246,5.6,5.6,0,0,0,2.053-3.651,7.7,7.7,0,0,0-.6-4.821,6.411,6.411,0,0,0-4.508-3.147,2,2,0,0,0-1.063,3.857Z"></path><path class="c" d="M46.525,219.076a9.386,9.386,0,0,1,1,.269c.481.153-.323-.206.087.045.123.075.252.137.373.215l.115.076q.265.192-.085-.068c.021-.013.258.239.28.262.065.067.164.235.244.277-.188-.248-.223-.287-.1-.116.032.049.063.1.092.149.049.082.087.17.138.251.212.34-.13-.45-.025-.07.057.2.122.408.178.614.078.288-.094.248-.005-.132a1.375,1.375,0,0,0,.026.289,7.194,7.194,0,0,1,0,.777c-.006.115-.013.23-.023.344l-.013.134q-.039.336.02-.14c-.09.075-.125.594-.165.726a1.87,1.87,0,0,0-.115.335c.024-.389.154-.293.011-.064-.057.091-.125.191-.172.286-.12.169-.081.123.115-.141-.047.057-.1.111-.147.164a1.927,1.927,0,0,0-.159.153c-.246.3.391-.232.049-.038-.1.057-.2.117-.3.177-.358.22.444-.133.027,0-.261.081-.517.148-.784.208-.479.106.448-.01-.068,0-.221.007-.441.024-.663.026-.73.007-1.461,0-2.191,0h-.715c-.177,0-.354,0-.531,0-.349-.014-.188-.142.045.023a2.756,2.756,0,0,0-.7-.2c.274-.028.332.159.037-.01-.071-.041-.141-.084-.209-.13q-.258-.183.105.087c.023-.044-.471-.371-.451-.458l.151.193q-.079-.111-.15-.228c-.074-.121-.133-.248-.2-.372.243.436.022.046-.018-.076-.049-.15-.09-.3-.125-.458-.018-.079-.084-.613-.038-.135-.024-.244-.038-.488-.038-.733,0-.181.016-.361.021-.542,0-.106.074-.378-.011.029.063-.3.14-.59.224-.887.129-.451-.211.361.013-.03.065-.112.12-.228.189-.339.154-.248.264-.167-.031.007.11-.065.215-.248.31-.339.029-.028.2-.224.244-.218,0,0-.435.277-.069.071.085-.048.171-.1.255-.148.421-.255-.349.091-.06.017.081-.021.16-.054.242-.075.473-.125-.145-.022-.157,0,.051-.1.942-.013,1.062-.014.7,0,1.4-.02,2.1-.025.247,0,.495,0,.742,0,.082,0,.163.009.245.011.443.012-.488-.081-.214-.035a2.051,2.051,0,0,0,2.461-1.4,2.025,2.025,0,0,0-1.4-2.46,22.82,22.82,0,0,0-3.939-.1,5.825,5.825,0,0,0-3.816,1.1,6.269,6.269,0,0,0-2.323,4.222,7.331,7.331,0,0,0,1.1,5.276,5.632,5.632,0,0,0,4.4,2.364c.943.035,1.894,0,2.838,0a7.508,7.508,0,0,0,4.8-1.246,5.6,5.6,0,0,0,2.053-3.651,7.7,7.7,0,0,0-.6-4.821,6.411,6.411,0,0,0-4.507-3.147,2,2,0,1,0-1.064,3.857Z"></path><path class="c" d="M112.5,433.77c17.282.082,34.562.119,51.844-.027,4.7-.04,9.405-.094,14.107-.095a2.03,2.03,0,0,0,2-2V417.019a2.029,2.029,0,0,0-2-2q-8.48,0-16.96.006l-29.563.013-33,.017-27.564.014c-4.379,0-8.8-.173-13.175.007-.059,0-.118,0-.177,0-2.572.035-2.58,4,0,4,2.306,0,4.612,0,6.918,0l4.7,0c2.573,0,2.577-3.992,0-4q-15.366-.042-30.732-.051a2.028,2.028,0,0,0-2,2v14.629a2.03,2.03,0,0,0,2,2c10.556,0,21.113.2,31.67.222,10.945.025,21.89-.036,32.835-.069,3.316-.01,6.633-.026,9.949-.031,2.574,0,2.578-4,0-4-8.389.013-16.778.053-25.168.073q-15.81.039-31.619-.07c-5.889-.05-11.778-.124-17.667-.125l2,2V417.019l-2,2q15.366,0,30.732.051v-4l-11.087.006h-.529v4c3.586-.048,7.175,0,10.761-.006l26.375-.013,32.821-.017,30.376-.014q9.5,0,19-.007h1.1l-2-2v14.629l2-2c-18.864,0-37.723.236-56.589.162q-4.682-.018-9.362-.04c-2.575-.012-2.578,3.988,0,4Z"></path><path class="c" d="M106.351,426.955v3.491a2.064,2.064,0,0,0,.586,1.415,2,2,0,0,0,2.828,0,2.083,2.083,0,0,0,.586-1.415v-3.491a2.062,2.062,0,0,0-.586-1.414,2,2,0,0,0-2.828,0,2.078,2.078,0,0,0-.586,1.414Z"></path><path class="c" d="M212.051,329.243V366.43q0,21.765.227,43.53c.075,8.134.071,16.278.322,24.409.079,2.568,4.079,2.579,4,0-.525-17.023-.431-34.086-.517-51.115-.062-12.411-.032-24.822-.032-37.233V329.243c0-2.574-4-2.578-4,0Z"></path><path class="c" d="M205.428,383.231c0-10.869-.055-21.739-.089-32.608q-.054-16.627-.092-33.255c-.01-3.363-.82-7.248-3.482-9.559a8.7,8.7,0,0,0-11.033.179c-3.533,3.054-3.168,8.431-3.264,12.7-.262,11.666-.226,23.343-.226,35.012,0,9.17.041,18.341.051,27.511.011,10.426-.016,20.852-.027,31.278-.011,11.08-.113,22.163-.028,33.242.023,3.1.646,6.478,2.883,8.788a8.972,8.972,0,0,0,10.645,1.215c4.479-2.749,4.674-8.3,4.673-12.983q0-15.289,0-30.58l-.006-29.071v-1.866c0-2.573-4-2.578-4,0q0,10.482,0,20.962l.006,33.576c0,3.067.012,6.133,0,9.2-.008,2.318-.3,5.078-2.044,6.793a4.725,4.725,0,0,1-7.043-.872c-1.146-1.934-1.116-4.128-1.115-6.341q0-2.94,0-5.878.007-8.842.017-17.685.016-17.874.033-35.748c0-7.13-.028-14.26-.04-21.39-.019-12.1-.029-24.2.087-36.3.04-4.172.067-8.349.239-12.518.076-1.836.108-3.861,1.221-5.411a4.448,4.448,0,0,1,7.033.019c1.406,2.086,1.414,4.6,1.417,7.016q0,2.986.012,5.973.023,8.758.052,17.517.057,18.2.109,36.4.006,2.344.007,4.688C201.428,385.805,205.428,385.81,205.428,383.231Z"></path><path class="c" d="M.55,329.243V366.43q0,21.765-.227,43.53C.248,418.094.252,426.238,0,434.369c-.079,2.575,3.921,2.572,4,0,.525-17.023.43-34.086.516-51.115.063-12.411.033-24.822.033-37.233V329.243c0-2.574-4-2.578-4,0Z"></path><path class="c" d="M15.173,383.231c0-10.42.051-20.84.085-31.26q.053-16.726.1-33.452c0-2.441.033-5.077,1.579-7.121,1.726-2.283,5.682-1.842,7.088.57a10.951,10.951,0,0,1,1.008,5.182c.072,1.778.109,3.557.141,5.336.211,11.57.192,23.145.189,34.717,0,8.679-.041,17.357-.05,26.036-.01,9.967.015,19.933.025,29.9q.018,16.77.03,33.54c0,2.236.016,4.508-1.247,6.425a4.743,4.743,0,0,1-7.1.468c-2.392-2.62-1.858-6.877-1.857-10.185q0-15.336,0-30.672L15.173,385v-1.77c0-2.573-4-2.578-4,0q0,11.048,0,22.093,0,17.125-.007,34.251a89.492,89.492,0,0,0,.095,9.453c.366,3.409,1.627,7.087,4.815,8.841,3.282,1.806,8.031,1.326,10.579-1.538,3.386-3.806,2.713-9.414,2.71-14.141q-.007-8.8-.016-17.6-.019-18.636-.036-37.271c0-7.534.031-15.068.042-22.6.018-12.416.032-24.834-.11-37.249-.044-3.87-.047-7.753-.274-11.618-.174-2.964-.886-6.082-3.31-8.036-3.105-2.5-8.082-2.614-11.031.182-3.976,3.769-3.27,9.914-3.281,14.9q-.021,8.822-.051,17.643-.06,18.909-.114,37.817-.006,2.436-.007,4.871C11.173,385.805,15.173,385.81,15.173,383.231Z"></path><path class="a" d="M100.059,393.454c-.017-.27-.034-.5-.051-.659,0,0-.021-.212-.05-.533-5.329.2-13.208.163-18.277.1,0,1.05-.155,2.5-.216,3.072a24.343,24.343,0,0,1-.542,3.321,6.344,6.344,0,0,1-1.077,1.946l.025.408A9.19,9.19,0,0,1,81,400.369c2.931-1.64,8.832-1.4,12.249-1.4a11.327,11.327,0,0,1,5.943,1.644,9,9,0,0,1,1.1.787v-1.629C100.286,398.83,100.17,395.205,100.059,393.454Z"></path><path class="a" d="M118.518,394.535a7.44,7.44,0,0,1,.179-2c5.455.04,13.239-.193,18.249-.38,0,.093.008.145.008.145,0,1.055.154,2.551.217,3.131a24.355,24.355,0,0,0,.541,3.321,6.366,6.366,0,0,0,1.078,1.946l-.03.4a9.26,9.26,0,0,0-1.119-.737c-2.932-1.64-8.832-1.4-12.25-1.4a11.326,11.326,0,0,0-5.942,1.644,9.1,9.1,0,0,0-1.1.787v-1.629C118.349,399,118.428,396.4,118.518,394.535Z"></path><path class="a" d="M86.082,423.447a24.309,24.309,0,0,1-5.514-1.219c-6.055-2.162-9.29-6.553-8.235-10.609a14.569,14.569,0,0,1,2.454-4.566q1.29-1.8,2.736-3.56A12.012,12.012,0,0,1,81,400.369c2.931-1.64,8.832-1.4,12.249-1.4a11.327,11.327,0,0,1,5.943,1.644,13.31,13.31,0,0,1,3.182,2.92c2.913,3.37,5.909,7.077,4.521,10.755a10.4,10.4,0,0,1-1.788,2.817,16.322,16.322,0,0,1-4.761,4.077C96.63,423.235,91.131,424,86.082,423.447Z"></path><path class="a" d="M132.554,423.447a24.309,24.309,0,0,0,5.514-1.219c6.054-2.162,9.29-6.553,8.235-10.609a14.552,14.552,0,0,0-2.455-4.566q-1.288-1.8-2.736-3.56a12.008,12.008,0,0,0-3.471-3.124c-2.932-1.64-8.832-1.4-12.25-1.4a11.326,11.326,0,0,0-5.942,1.644,13.291,13.291,0,0,0-3.182,2.92c-2.913,3.37-5.909,7.077-4.521,10.755a10.4,10.4,0,0,0,1.788,2.817,16.322,16.322,0,0,0,4.761,4.077C122.005,423.235,127.505,424,132.554,423.447Z"></path><path class="a" d="M124.28,301.083c-3.562.265-9.439,1.426-11.936,5.857a23.407,23.407,0,0,0-2.685,10.863c.027,8.616,1.329,42.569,1.583,47.869.39,8.137.985,18.535,1.195,26.386,1.046,1.1,26.457.012,28.207-.108,2.368-.161,2.793-1.492,3.206-4.025.905-5.545,4.648-46.211,3.723-57.549-.623-7.635-.114-15.109-5.064-22.167C139.319,303.661,135.86,300.224,124.28,301.083Z"></path><path class="a" d="M91.718,300.985c3.5.176,9.306,1.191,11.869,5.559a23.754,23.754,0,0,1,2.909,10.794c.188,8.613-.242,42.588-.359,47.893-.179,8.144-.5,18.553-.513,26.407-1,1.121-25.913.716-27.635.64-2.33-.1-2.781-1.422-3.25-3.944-1.027-5.521-5.79-46.132-5.165-57.489.42-7.648-.266-15.108,4.419-22.286C77.013,303.934,80.324,300.412,91.718,300.985Z"></path><path class="c" d="M79.681,392.3c0,.708-.054,1.414-.116,2.118q-.039.435-.085.87-.024.23-.051.459c-.012.105-.024.21-.037.315-.008.061-.065.51-.025.2.036-.276-.01.068-.018.12-.015.1-.03.2-.046.3-.03.193-.062.386-.1.578a8.938,8.938,0,0,1-.237,1.049,1.076,1.076,0,0,0-.071.2c.006-.075.189-.407.061-.158-.076.147-.149.3-.231.439s-.184.311-.285.461c-.04.059-.088.117-.124.179-.119.2.325-.4.113-.151a2,2,0,1,0,2.829,2.829,8.883,8.883,0,0,0,1.451-2.431,10.094,10.094,0,0,0,.517-2.385,37.178,37.178,0,0,0,.453-5,2,2,0,0,0-4,0Z"></path><path class="c" d="M98.008,392.8c.115,1.175.141,2.363.185,3.542.043,1.145.092,2.292.093,3.438a2,2,0,0,0,4,0c0-1.146-.05-2.293-.093-3.438-.044-1.179-.07-2.367-.185-3.542a2.152,2.152,0,0,0-.586-1.414,2,2,0,0,0-3.414,1.414Z"></path><path class="c" d="M86.082,421.447a18.936,18.936,0,0,1-8.418-2.894,7.557,7.557,0,0,1-3.486-4.74c-.391-2.541,1.712-4.938,3.124-6.827,1.464-1.957,3.124-4.464,5.562-5.255a24.6,24.6,0,0,1,7.524-.771c2.457,0,4.946-.14,7.188,1.043,2.537,1.338,4.638,4.14,6.173,6.5a8.058,8.058,0,0,1,1.479,3.5,5.184,5.184,0,0,1-1.54,3.686c-4.315,5.307-11.1,6.409-17.606,5.752a2.013,2.013,0,0,0-2,2,2.044,2.044,0,0,0,2,2c7.1.718,14.9-.7,19.839-6.231,2.512-2.811,4.172-6.047,2.757-9.822a19.232,19.232,0,0,0-3.116-5.139,30.092,30.092,0,0,0-3.622-4.065,14.08,14.08,0,0,0-9.573-3.221,42.233,42.233,0,0,0-9.478.614c-3.428.766-5.676,3.06-7.773,5.733-2.188,2.79-4.868,5.939-4.978,9.664-.094,3.2,1.812,6.134,4.228,8.074a22.435,22.435,0,0,0,11.716,4.393,2.012,2.012,0,0,0,2-2A2.048,2.048,0,0,0,86.082,421.447Z"></path><path class="c" d="M134.954,392.3a37.179,37.179,0,0,0,.454,5,10.288,10.288,0,0,0,.5,2.332,8.753,8.753,0,0,0,1.472,2.484,2.009,2.009,0,0,0,2.828,0,2.053,2.053,0,0,0,0-2.829c-.161-.191.136.176.144.193a1.481,1.481,0,0,0-.123-.174q-.15-.222-.285-.455c-.083-.143-.162-.289-.235-.437-.03-.062-.147-.331-.022-.03s.021.049,0-.017c-.1-.339-.176-.681-.241-1.028q-.054-.286-.1-.573c-.016-.1-.031-.2-.046-.3-.009-.061-.071-.5-.029-.2.038.278-.009-.074-.015-.125-.013-.1-.026-.21-.038-.315-.02-.167-.038-.334-.056-.5-.03-.282-.058-.565-.084-.847-.065-.725-.118-1.451-.122-2.179a2,2,0,0,0-4,0Z"></path><path class="c" d="M116.628,392.8c-.115,1.175-.142,2.363-.186,3.542-.042,1.145-.091,2.292-.093,3.438a2,2,0,0,0,4,0c0-1.146.051-2.293.093-3.438.044-1.179.071-2.367.186-3.542a2.006,2.006,0,0,0-.586-1.414,2,2,0,0,0-2.829,0,2.271,2.271,0,0,0-.585,1.414Z"></path><path class="c" d="M132.554,425.447c6.115-.713,14.253-3.546,15.732-10.435.74-3.446-.875-6.425-2.84-9.148-2.091-2.9-4.35-6.263-7.774-7.673-2.816-1.16-6.07-1.213-9.073-1.23-3.382-.019-6.659,0-9.711,1.672a14.518,14.518,0,0,0-3.913,3.349,39.815,39.815,0,0,0-3.66,4.691c-2.095,3.3-2.649,7.083-.3,10.414a18.876,18.876,0,0,0,9.1,7.076,28.743,28.743,0,0,0,12.44,1.284,2.057,2.057,0,0,0,2-2,2.014,2.014,0,0,0-2-2c-5.531.559-11.929-.046-16.1-4.109-1.982-1.929-3.785-4.121-2.6-6.967a22.414,22.414,0,0,1,5.385-7.087c2.066-1.93,4.636-2.3,7.348-2.317a42.849,42.849,0,0,1,7.27.311c2.76.459,4.4,1.842,6.136,3.982.929,1.146,1.823,2.325,2.656,3.544a9.229,9.229,0,0,1,1.848,3.889c.243,2.127-1.226,4.036-2.776,5.31a17.662,17.662,0,0,1-9.16,3.444,2.062,2.062,0,0,0-2,2A2.012,2.012,0,0,0,132.554,425.447Z"></path><path class="c" d="M124.28,299.083c-4.757.375-9.913,1.757-12.921,5.742-3.061,4.055-3.754,9.657-3.685,14.585.107,7.658.4,15.315.67,22.969.254,7.227.516,14.455.826,21.68.2,4.681.464,9.358.694,14.037.158,3.213.309,6.427.431,9.642.052,1.376.052,2.759.137,4.132a2.287,2.287,0,0,0,1.706,2.235c2.286.7,5.1.437,7.454.438,3.743,0,7.486-.09,11.226-.2,2.93-.09,5.86-.193,8.788-.333a7.74,7.74,0,0,0,3.647-.753c1.806-1.061,2.285-3.173,2.572-5.093.9-6.007,1.147-12.151,1.553-18.2.592-8.81,1.091-17.63,1.411-26.454.13-3.586.236-7.174.234-10.763a129.649,129.649,0,0,0-.437-13.33c-.935-8.92-6.293-18.421-15.785-20.035a35.84,35.84,0,0,0-8.521-.29c-2.553.179-2.573,4.18,0,4,4.9-.343,10.5-.209,14.056,3.2,4.054,3.88,6.094,9.461,6.411,15.193a278.714,278.714,0,0,1-.209,28.1q-.678,14.815-1.831,29.607c-.137,1.726-.281,3.452-.447,5.175q-.089.938-.191,1.872c-.026.231-.054.462-.08.694-.079.678.056-.263-.027.212a7.21,7.21,0,0,1-.626,2.566c.044-.056-.251.2-.085.1a2.051,2.051,0,0,1-.56.147c-.129.019-.264.014-.4.024-1.166.087-2.342.109-3.51.156-4.242.17-8.487.305-12.732.376a93.2,93.2,0,0,1-10.545-.169c.6.058.1-.054-.113-.033-.07.007-.155-.072-.222-.062.154-.023.533.276.677.405l.586,1.414c-.357-13.04-1.214-26.066-1.707-39.1-.431-11.41-.948-22.833-1.065-34.252-.039-3.846.527-8.6,3.043-11.708,2.228-2.749,6.213-3.647,9.572-3.912C126.829,302.882,126.851,298.881,124.28,299.083Z"></path><path class="c" d="M91.718,302.985c2.977.164,6.322.8,8.646,2.8,2.943,2.537,3.966,7.463,4.119,11.165.2,4.76.063,9.552.036,14.315-.061,11-.161,21.992-.362,32.985-.168,9.13-.516,18.256-.533,27.388l.586-1.414s.521-.383.274-.226c.134-.085.531-.117.251-.122a2.918,2.918,0,0,0-.561.117c-.388.085.234-.025.077-.007-.131.016-.262.032-.393.045q-.494.05-.987.087c-1.765.133-3.537.182-5.306.221-4.229.094-8.462.086-12.692.049q-2.463-.021-4.927-.064a7.691,7.691,0,0,1-2.529-.159,1.1,1.1,0,0,1-.307-.5,10.238,10.238,0,0,1-.449-1.9c-.072-.395-.132-.793-.19-1.19-.037-.253-.071-.506-.106-.759.075.545-.056-.434-.084-.654q-.141-1.108-.27-2.22c-1.089-9.255-1.949-18.54-2.753-27.824-.8-9.247-1.829-18.584-1.543-27.87a53.5,53.5,0,0,1,.974-10.48,23.559,23.559,0,0,1,3.9-8.48,12.9,12.9,0,0,1,3.513-3.389,14.845,14.845,0,0,1,6.494-1.868,40.293,40.293,0,0,1,5.119-.046c2.573.118,2.567-3.882,0-4-4.712-.216-9.954.029-14.023,2.708-3.49,2.3-5.984,6.156-7.555,9.946-2.362,5.7-2.252,11.882-2.5,17.933a95.984,95.984,0,0,0,.439,10.488c.6,8.757,1.368,17.5,2.2,26.239.66,6.91,1.3,13.837,2.249,20.715a26.873,26.873,0,0,0,.564,3.162,5.043,5.043,0,0,0,4.9,4.1c2.057.132,4.141.084,6.2.1,3.669.036,7.34.046,11.009,0a86.178,86.178,0,0,0,8.99-.386,4.621,4.621,0,0,0,2.837-.931c.955-.953.6-2.879.612-4.131q.021-2.27.061-4.539c.106-6.259.29-12.515.43-18.773.136-6.111.187-12.224.253-18.336.089-8.15.172-16.3.16-24.452a48.03,48.03,0,0,0-.743-10.845,19.153,19.153,0,0,0-3.573-7.967,13.628,13.628,0,0,0-6.294-3.967,24.214,24.214,0,0,0-6.214-1.068C89.146,298.843,89.153,302.844,91.718,302.985Z"></path><path class="c" d="M152.241,311.863c1.616,4.918,3.095,9.942,3.188,15.156.078,4.4-2.6,7.356-5.915,9.85a2.063,2.063,0,0,0-.718,2.736,2.014,2.014,0,0,0,2.737.717c4.039-3.039,7.7-6.819,7.9-12.208.22-5.895-1.515-11.779-3.333-17.314-.8-2.435-4.663-1.392-3.857,1.063Z"></path><path class="c" d="M60.817,312.747c-1.727,4.977-3.188,10.167-3.043,15.5.143,5.3,3.944,9.113,7.887,12.079a2.012,2.012,0,0,0,2.736-.717,2.048,2.048,0,0,0-.718-2.736c-3.377-2.541-6.063-5.536-5.86-10.015a45.616,45.616,0,0,1,2.855-13.043c.845-2.437-3.017-3.485-3.857-1.064Z"></path><path class="a" d="M129.689,295.554a15.594,15.594,0,0,1-4.357,2.032c-2.474.628-5.036.756-7.489,1.414-2.866.765-4.78.716-7.146,3.042-2.5,2.464-3.5,5.467-1.963,8.628,1.345,2.768,3.985,8.8,6.92,7.626,4.024-1.256,8.176-3.092,10.463-3.229,4.632-.285,10.345.432,13.034-4.7a14.111,14.111,0,0,1,2.474-3.219Z"></path><path class="a" d="M85.371,295.481c.991.717,4.9,1.551,6.144,1.816,2.817.608,5.713.716,8.51,1.354,3.259.746,5.418.678,8.137,2.984,2.875,2.444,5.388,5.1,8.019,7.764,1.442,1.453,3.081,2.395,3.445,4.9.1.677-1.983,4.907-5.9,5.918-3.632.933-8.863-1.384-9.717-1.894,1.129,1.482-.1,2.925-1.7,2.895s-2.954-1.3-4.073-2.267c-1.983-1.727-4.751-4.044-7.332-4.162-5.251-.245-11.71.521-14.841-4.593a26.246,26.246,0,0,0-2.394-3.249Z"></path><path class="c" d="M111.391,311.919c-2.04-2.04-4.327-3.819-6.41-5.814a2,2,0,1,0-2.829,2.828c2.083,2,4.371,3.775,6.411,5.814a2,2,0,0,0,2.828-2.828Z"></path><path class="a" d="M92.134,219.886c-1-.366-1.96-.753-2.888-1.153.788,9.855,2.367,29.524,2.759,49.909.19,9.9-.07,19.835-.43,28.657,2.8.6,5.67.7,8.45,1.34,3.26.75,5.42.68,8.13,2.99q.827.7,1.614,1.428a11.566,11.566,0,0,1,.926-1.025c2.365-2.326,4.279-2.277,7.145-3.043,2.454-.657,5.016-.785,7.489-1.413a13.929,13.929,0,0,0,1.716-.612c-.127-2.47-.24-4.656-.24-4.656-.26-7.5-.41-15.591-.25-23.666.394-20.193,1.948-39.686,2.753-49.623a59.984,59.984,0,0,1-20.349,4.073A49.78,49.78,0,0,1,92.134,219.886Z"></path><path class="a" d="M137.491,171.57a4.225,4.225,0,0,1,3.381-.989,3.987,3.987,0,0,1,2.868,1.907,5.642,5.642,0,0,1,.591,2.269,16.9,16.9,0,0,1-1.724,8.959,10.73,10.73,0,0,1-2.778,3.646,7.111,7.111,0,0,1-3.312,1.493l-.561.086c-.277,1.019-.583,1.876-.733,2.331-.985,2.675-6.6,12.079-13.606,15.191.07.547.16,1.1.26,1.646.34,1.97.23,3.73,2.97,4.71.18.07,4.44,1.8,4.72,1.92,0,0,.283,19.341-21.05,19.341s-19.66-19.561-19.66-19.561c.53-.18,3.92-1.63,4.1-1.7,2.73-.98,2.63-2.74,2.97-4.71.11-.639.21-1.278.29-1.917a24.876,24.876,0,0,1-7.893-6.478,28.8,28.8,0,0,1-5.481-10.694l-1.077-.165a7.12,7.12,0,0,1-3.312-1.493,10.742,10.742,0,0,1-2.778-3.646,16.9,16.9,0,0,1-1.723-8.959,5.641,5.641,0,0,1,.59-2.269,3.989,3.989,0,0,1,2.869-1.907,4.223,4.223,0,0,1,3.38.989s-2.5-27.712,29.058-27.712S137.491,171.57,137.491,171.57Z"></path><path class="g" d="M102.746,125.235c4.081-1.518,10.391-.734,15.291,1.44a16.511,16.511,0,0,1,5.163,3.413l5.323,2.558a14.92,14.92,0,0,1,6.7,4.105c7.054,7.2,10.3,21.777,7.223,34.41a4.164,4.164,0,0,0-1.574-.58,4.225,4.225,0,0,0-3.381.989l-1.727-5.055a27.549,27.549,0,0,0-8.214-17.7l-5.575-2.579c-1.871,2.358-7.2,6.8-14.908,8.284a49.828,49.828,0,0,1-7.989-.155c-1.054.517-2.154.957-3.183,1.375a33.415,33.415,0,0,1-6.912,1.793,17.293,17.293,0,0,0-4.213,6.024c-.624,1.228-.926,2.259-1.329,3.25l-2.649,4.761a4.223,4.223,0,0,0-3.38-.989,4.059,4.059,0,0,0-1.488.533c-1.847-5.788-1.644-11.36-1.287-15.947.7-8.988,4.026-15.092,7.185-17.9,2.991-3.627,11.732-10.146,20.92-12.03Z"></path><path class="c" d="M77.851,170.591a39.492,39.492,0,0,1-.841-18.375,29.63,29.63,0,0,1,5.546-12.685,33.186,33.186,0,0,1,9.751-8.017c4.555-2.646,9.662-4.709,15-4.69,4.885.018,10.9,1.073,14.484,4.683,1.816,1.83,4.645-1,2.828-2.828-3.76-3.788-9.459-5.244-14.615-5.723-5.941-.551-11.551.971-16.866,3.579-4.61,2.263-9.4,5.337-12.727,9.314a33.208,33.208,0,0,0-6.733,12.928A46.111,46.111,0,0,0,72.4,159.5a38.526,38.526,0,0,0,1.591,12.156c.76,2.45,4.623,1.405,3.857-1.064Z"></path><path class="c" d="M127.991,134.575c6.28,1.441,10.011,8.63,11.76,14.237a41.594,41.594,0,0,1,.916,21.175c-.552,2.508,3.3,3.58,3.857,1.063a45.621,45.621,0,0,0-1.146-24.017,32.394,32.394,0,0,0-4.913-9.559c-2.33-3.03-5.6-5.881-9.41-6.756-2.506-.575-3.576,3.28-1.064,3.857Z"></path><path class="c" d="M126.136,150.232a26.2,26.2,0,0,1,7.628,16.283,2.054,2.054,0,0,0,2,2,2.014,2.014,0,0,0,2-2,30.529,30.529,0,0,0-8.8-19.112c-1.826-1.819-4.655,1.009-2.828,2.829Z"></path><path class="h" d="M129.637,214.876c-.58,7.594-2.62,30.209-3.08,53.776-.161,8.134-.008,16.287.256,23.828-1.374,1.335-2.246,2.176-2.286,2.206.41.267,13.9,13.664,15.99,16.961-1.43,1.659,24.93-21.947,28.74-28.877,2.4-4.354.63-16.211-.86-21.562-1.46-5.263-3.3-13.309-4.85-18.3,0,0-.07-.237-.2-.651a58.67,58.67,0,0,0-6.218-12.116,13.132,13.132,0,0,0-2.782-2.98,32.539,32.539,0,0,0-4.52-3.406,143.136,143.136,0,0,0-20.19-9.1"></path><path class="h" d="M88.887,214.08c.47,6.68,2.65,30.111,3.12,54.572.174,9.084-.03,18.193-.343,26.447-.588.136-.957.229-.957.229a6.943,6.943,0,0,0-2.27,1.451c-3.52,2.942-9.17,9.587-12.33,13.506-.65.8-1.19,1.491-1.59,2.014-5.93-3.712-24.06-23.309-27.49-29.529-2.4-4.354-.62-16.211.86-21.562,1.47-5.263,3.3-13.309,4.85-18.3,0,0,.07-.237.2-.651,2.19-5.647,5.82-12.835,9-15.1a32.539,32.539,0,0,1,4.52-3.406,144.654,144.654,0,0,1,22.43-9.9"></path><path class="c" d="M120.561,144.824a16.407,16.407,0,0,1-1.977,2.029c-.222.2-.448.386-.677.573-.11.089-.22.177-.331.264.34-.269-.124.091-.155.115-.558.414-1.134.806-1.722,1.177a26.149,26.149,0,0,1-9.164,3.611,2,2,0,1,0,1.063,3.857,30.058,30.058,0,0,0,10.119-4.014,22.657,22.657,0,0,0,5.672-4.784,2.059,2.059,0,0,0,0-2.828,2.014,2.014,0,0,0-2.828,0Z"></path><path class="c" d="M86.868,156.81a18.115,18.115,0,0,0-3.067,4.25c-.413.793-.833,1.588-1.186,2.41-.4.925-.727,1.874-1.1,2.807a2.007,2.007,0,0,0,.2,1.542,2,2,0,0,0,3.656-.478c.145-.362.28-.728.415-1.093q.106-.288.216-.573c.042-.109.086-.218.129-.327.119-.3-.049.053-.032.073-.078-.093.527-1.1.594-1.236.186-.369.372-.739.563-1.106a17.716,17.716,0,0,1,1.074-1.829c.1-.15.211-.3.318-.444.155-.212-.015.043-.082.106a2.829,2.829,0,0,0,.207-.254c.294-.353.6-.69.924-1.02a2,2,0,1,0-2.828-2.828Z"></path><path class="c" d="M106.6,142.892c-1.681,3.774-4.271,7.536-8.008,9.488a35.851,35.851,0,0,1-12.413,3.549,2.063,2.063,0,0,0-2,2,2.011,2.011,0,0,0,2,2,41.3,41.3,0,0,0,14.432-4.1c4.3-2.244,7.5-6.564,9.443-10.922a2.063,2.063,0,0,0-.717-2.737,2.017,2.017,0,0,0-2.737.718Z"></path><path class="c" d="M88.193,220.46a52.229,52.229,0,0,0,22.052,4.621,58.23,58.23,0,0,0,19.639-4.14,2.064,2.064,0,0,0,1.4-2.46,2.014,2.014,0,0,0-2.461-1.4,55.374,55.374,0,0,1-18.2,3.983,47.441,47.441,0,0,1-20.409-4.061,2.068,2.068,0,0,0-2.737.717,2.015,2.015,0,0,0,.718,2.737Z"></path><path class="c" d="M89.389,216.448c.583-.2,1.151-.46,1.72-.7q.8-.333,1.592-.67l.476-.2.228-.1c-.4.168-.084.034.019-.008.229-.092.458-.181.686-.277a6.464,6.464,0,0,0,1.847-1.153,5.493,5.493,0,0,0,1.61-2.941c.3-1.381.472-2.815.65-4.214a1.989,1.989,0,0,0-.586-1.414,2,2,0,0,0-2.828,0,2.343,2.343,0,0,0-.586,1.414c-.051.4.045-.291-.015.108-.028.187-.055.374-.085.56-.048.305-.1.609-.151.913-.067.42-.12.841-.195,1.259a9.271,9.271,0,0,1-.3,1.114c-.049.162.1-.286.118-.277s-.053.109-.057.117c-.043.077-.082.155-.128.23-.031.05-.07.1-.1.149-.084.162.192-.236.178-.223-.079.072-.143.167-.219.243s-.148.13-.218.2c-.168.168.37-.244.158-.123-.046.027-.089.063-.134.092-.1.062-.2.12-.3.175-.077.041-.494.224-.214.116s-.106.036-.207.076c-.086.035-.171.072-.256.108l-1.231.52c-.077.032-.154.063-.23.1-.049.022.473-.2.277-.117l-.122.052-.585.246c-.625.262-1.247.545-1.888.767a2,2,0,0,0,1.064,3.858Z"></path><path class="c" d="M119.617,206.459c.172,1.315.341,2.663.622,3.96a5.379,5.379,0,0,0,1.816,3.1,10.681,10.681,0,0,0,2.752,1.427q1.135.459,2.27.921l1.251.51c.244.1,1.218.509.23.089a2.194,2.194,0,0,0,1.541.2,2,2,0,0,0,.478-3.656c-1.37-.582-2.753-1.131-4.132-1.69l-.823-.334-.2-.08-.043-.018a1.29,1.29,0,0,1-.257-.1c.038.075.41.187.071.02-.122-.06-.243-.125-.36-.195-.083-.051-.424-.3-.15-.084s-.04-.042-.1-.1c-.089-.086-.162-.189-.252-.272.4.37.176.24.057.044-.052-.086-.1-.175-.144-.265-.179-.343.149.424.052.123-.035-.109-.074-.217-.105-.327a11.79,11.79,0,0,1-.282-1.5q-.058-.4-.129-.809c-.04-.224-.079-.449-.114-.675-.024-.149-.118-.829-.048-.293a2.2,2.2,0,0,0-.586-1.414,2.033,2.033,0,0,0-1.414-.586c-.967.043-2.145.889-2,2Z"></path><path class="c" d="M138.906,172.984a2.151,2.151,0,0,1,3.039.4,4.627,4.627,0,0,1,.441,2.356,14.049,14.049,0,0,1-.2,2.9c-.629,3.449-2.368,7.594-6.2,8.281a2.018,2.018,0,0,0-1.4,2.461,2.045,2.045,0,0,0,2.46,1.4c5.98-1.073,8.835-7.817,9.285-13.237.233-2.81-.015-5.986-2.442-7.8a6.259,6.259,0,0,0-7.815.41,2.015,2.015,0,0,0,0,2.828,2.044,2.044,0,0,0,2.829,0Z"></path><path class="c" d="M134.474,185.71a15.828,15.828,0,0,1-.924,4.268c-.063.191-.489,1.308-.217.692-.133.3-.272.6-.42.892a36.289,36.289,0,0,1-3.123,5.02c-2.7,3.705-6.374,7.634-11,8.719-2.5.588-1.445,4.446,1.063,3.857,5.6-1.313,9.942-5.888,13.236-10.349,2.842-3.848,5.185-8.209,5.383-13.1.1-2.574-3.9-2.57-4,0Z"></path><path class="c" d="M82.206,170.156a6.26,6.26,0,0,0-7.814-.41c-2.43,1.809-2.675,5-2.442,7.8.45,5.42,3.3,12.164,9.285,13.237a2.057,2.057,0,0,0,2.46-1.4,2.018,2.018,0,0,0-1.4-2.461c-3.836-.687-5.574-4.833-6.2-8.281a14.045,14.045,0,0,1-.2-2.74,5.423,5.423,0,0,1,.375-2.408,2.136,2.136,0,0,1,3.108-.513,2.053,2.053,0,0,0,2.828,0,2.015,2.015,0,0,0,0-2.828Z"></path><path class="c" d="M80.008,185.5a32.975,32.975,0,0,0,7.03,15.782c3.962,4.69,9.208,8.065,15.382,8.732a2.013,2.013,0,0,0,2-2,2.045,2.045,0,0,0-2-2c-5.22-.564-9.575-3.927-12.812-7.871-3.2-3.9-4.885-8.793-5.743-13.707a2.017,2.017,0,0,0-2.46-1.4,2.045,2.045,0,0,0-1.4,2.461Z"></path><path class="c" d="M144.1,249.2c-.032,8.177-1.327,16.328-1.362,24.5-.011,2.575,3.989,2.578,4,0,.035-8.176,1.33-16.327,1.362-24.5.009-2.574-3.991-2.577-4,0Z"></path><path class="c" d="M68.185,249.2c.025,4.236.683,8.528,1.091,12.738.4,4.128,1.064,8.34,1.092,12.493.017,2.573,4.017,2.579,4,0-.028-4.153-.691-8.365-1.092-12.493-.408-4.21-1.066-8.5-1.091-12.738-.016-2.573-4.016-2.578-4,0Z"></path><path class="c" d="M143.9,272.352c-3.215,3.641-6.725,7.04-10.162,10.469-3.5,3.495-6.929,7.163-10.628,10.451a2.026,2.026,0,0,0,.405,3.141c-.851-.618.157.206.369.41.55.533,1.095,1.072,1.639,1.611q2.5,2.482,4.952,5.01c1.75,1.8,3.488,3.62,5.179,5.478.692.76,1.377,1.526,2.039,2.312q.206.245.408.492c.035.043.423.534.247.3-.091-.117.331.459.439.627l.313-2.424c-1.47,1.742.3,4.433,2.437,3.189a11.766,11.766,0,0,0,1.626-1.327c2.06-1.784,4.072-3.626,6.074-5.474,5.767-5.321,11.5-10.735,16.781-16.546a31.715,31.715,0,0,0,5.059-6.479c2.067-4.056,1.474-9.463.946-13.809a117.756,117.756,0,0,0-3.2-14.827c-1.4-5.509-2.579-11.131-4.845-16.362a51.293,51.293,0,0,0-4.915-9.162,25.965,25.965,0,0,0-8.232-7.4,140.178,140.178,0,0,0-20.668-9.3c-2.421-.887-3.465,2.977-1.064,3.857a145.385,145.385,0,0,1,16.764,7.346,37.763,37.763,0,0,1,4.046,2.231,40.648,40.648,0,0,1,3.565,2.851c2.119,1.833,3.549,4.5,4.834,6.948a44.591,44.591,0,0,1,3.305,7.483c.736,2.405,1.379,4.837,2.006,7.273,1.207,4.691,2.606,9.381,3.581,14.125a47.8,47.8,0,0,1,1.133,13.547,8.547,8.547,0,0,1-1.114,3.885,17.508,17.508,0,0,1-1.815,2.434,176.7,176.7,0,0,1-14.579,14.949q-3.957,3.753-8.008,7.407c-.851.765-1.705,1.528-2.571,2.276-.268.231-.543.454-.81.686-.315.276.02-.034.13-.095-.287.161.307-.122.361-.13l1.541.2,0,0,.99,1.727v0l-.273,1.009c.089-.2-.406.506-.258.33a2.06,2.06,0,0,0,.313-2.424,34.623,34.623,0,0,0-3.513-4.274c-1.768-1.954-3.59-3.858-5.425-5.748q-2.487-2.562-5.022-5.08a24.961,24.961,0,0,0-2.747-2.577l.4,3.141c3.7-3.287,7.127-6.956,10.628-10.45,3.437-3.43,6.947-6.828,10.162-10.47,1.7-1.923-1.12-4.763-2.828-2.828Z"></path><path class="c" d="M127.637,214.876c-1.461,19.056-2.95,38.114-3.13,57.237-.064,6.736.069,13.473.3,20.2.088,2.567,4.089,2.579,4,0-.769-22.41.285-44.781,2.011-67.126.266-3.439.555-6.877.819-10.316.2-2.567-3.8-2.555-4,0Z"></path><path class="c" d="M86.887,214.08c1.452,20.485,3.185,40.938,3.184,61.495,0,7.247-.2,14.493-.494,21.734-.1,2.574,3.9,2.569,4,0,.527-12.991.619-25.968.137-38.962-.418-11.232-1.131-22.45-2-33.656-.273-3.537-.58-7.072-.831-10.611-.181-2.553-4.182-2.573-4,0Z"></path><path class="c" d="M69.863,275.9c6.041,5.98,11.674,12.4,17.416,18.661a25.361,25.361,0,0,0,2.014,2.18l.882-3.343c-1.859.6-3.377,2.1-4.762,3.42-1.547,1.481-3.006,3.054-4.435,4.648-2.845,3.171-5.593,6.443-8.188,9.823l2.737-.718c-.4-.255-.791-.532-1.172-.817.1.073-.147-.113-.377-.3-.314-.252-.623-.51-.93-.771-1.159-.984-2.28-2.014-3.383-3.061-2.791-2.647-5.474-5.408-8.1-8.222-2.595-2.783-5.133-5.624-7.57-8.548a52.414,52.414,0,0,1-4.961-6.607c-1.611-2.681-1.285-6.836-1.021-10.057a64.664,64.664,0,0,1,2.114-11.6c1.3-4.836,2.426-9.721,3.773-14.546a50.589,50.589,0,0,1,5.771-13.082,20.219,20.219,0,0,1,4.512-5.069,40.713,40.713,0,0,1,8.081-4.909,148.346,148.346,0,0,1,17.152-7.2c2.411-.851,1.373-4.717-1.064-3.857a157.68,157.68,0,0,0-16.2,6.666,60.531,60.531,0,0,0-7.805,4.114,28.891,28.891,0,0,0-5.613,4.747c-6.764,7.923-8.976,18.474-11.473,28.273a113.341,113.341,0,0,0-2.821,12.677c-.584,4.275-1.116,8.977.011,13.212.739,2.777,2.771,5.128,4.508,7.342,2.365,3.015,4.887,5.908,7.458,8.748,3.046,3.363,6.178,6.653,9.439,9.809a49.916,49.916,0,0,0,7.649,6.509,2.054,2.054,0,0,0,2.736-.718c2.308-3.006,4.785-5.9,7.307-8.728,1.3-1.45,2.613-2.882,3.993-4.251,1-.994,2.427-2.665,3.7-3.073,1.331-.427,2.085-2.31.882-3.342a19.72,19.72,0,0,1-1.546-1.67q-1.909-2.082-3.817-4.165c-3.236-3.526-6.476-7.05-9.757-10.535-1.419-1.507-2.839-3.015-4.31-4.472-1.831-1.813-4.661,1.014-2.828,2.829Z"></path><path class="c" d="M88.085,298.558c4.026,1.013,8.147,1.352,12.2,2.192a18.735,18.735,0,0,1,4.905,1.28,22.1,22.1,0,0,1,4.826,4.011c1.612,1.56,3.143,3.2,4.744,4.772.551.541,1.147,1.035,1.691,1.583a5.387,5.387,0,0,1,.623.711c.239.345.284.813.5,1.131.285.413,0-.376.068-.111a.962.962,0,0,1-.089.265c.015-.029.136-.305.032-.079a8.019,8.019,0,0,1-.888,1.484,6.708,6.708,0,0,1-3.176,2.4c-2.63.841-6.307-.348-8.51-1.6-1.673-.953-3.865,1.012-2.737,2.736.536.819.23-.3.31-.186.014.02-.183.1-.22.076a12.6,12.6,0,0,1-1.424-.613c-1.089-.752-2.032-1.737-3.071-2.559-2.272-1.8-4.622-3.173-7.578-3.285-4.159-.159-9.813.517-12.453-3.491-1.41-2.141-4.875-.14-3.454,2.018a11.49,11.49,0,0,0,7.918,4.979,33.816,33.816,0,0,0,4.85.424,25.506,25.506,0,0,1,4.1.151c3.537.692,5.513,4.316,8.63,5.769a4.818,4.818,0,0,0,5.312-.446,3.668,3.668,0,0,0,.531-4.855L103,320.046a17.5,17.5,0,0,0,9.928,2.323,10.642,10.642,0,0,0,8.229-6.285c1.759-3.959-2.449-6.961-4.871-9.428-1.842-1.877-3.684-3.757-5.649-5.506a14.814,14.814,0,0,0-5.805-3.52C99.7,296.171,94.313,296,89.149,294.7c-2.5-.628-3.562,3.228-1.064,3.858Z"></path><path class="c" d="M118.329,319.518a49.354,49.354,0,0,1,7.325-2.384c1.551-.281,3.483-.139,5.165-.262a16.126,16.126,0,0,0,5.793-1.342,10.186,10.186,0,0,0,4.432-4.452c1.271-2.242-2.183-4.26-3.454-2.018a6.327,6.327,0,0,1-3.242,3.115,15.052,15.052,0,0,1-4.893.77,28.3,28.3,0,0,0-5.283.423,66.191,66.191,0,0,0-6.907,2.292c-2.413.846-1.375,4.712,1.064,3.858Z"></path><path class="c" d="M111.181,304.473a8.837,8.837,0,0,1,2.961-2.437,23.894,23.894,0,0,1,3.477-.916c1.6-.384,3.18-.707,4.806-.956a21.926,21.926,0,0,0,5.054-1.216,2.066,2.066,0,0,0,1.4-2.461,2.014,2.014,0,0,0-2.461-1.4,22.455,22.455,0,0,1-5.21,1.24c-1.738.266-3.421.654-5.133,1.045a19.434,19.434,0,0,0-3.913,1.193,11.341,11.341,0,0,0-3.806,3.077,2.054,2.054,0,0,0,0,2.828,2.015,2.015,0,0,0,2.828,0Z"></path><path class="c" d="M119.2,191.32a4.425,4.425,0,0,1,.76.763l-.312-.405a4.582,4.582,0,0,1,.581,1l-.2-.478a4.54,4.54,0,0,1,.215.66,2.238,2.238,0,0,0,.919,1.195,1.487,1.487,0,0,0,.743.238,1.526,1.526,0,0,0,.8-.036,2.025,2.025,0,0,0,1.2-.919,2.139,2.139,0,0,0,.2-1.541,7.269,7.269,0,0,0-.424-1.155,4.489,4.489,0,0,0-.351-.665,7.725,7.725,0,0,0-.733-.957,4.3,4.3,0,0,0-.563-.525,2.054,2.054,0,0,0-2.828,0,2.01,2.01,0,0,0-.586,1.414l.071.532a2,2,0,0,0,.515.882Z"></path><path class="c" d="M103.076,195.613c1.733,1.7,4.435,2.224,6.768,2.222s5.035-.525,6.769-2.222a2,2,0,1,0-2.828-2.829c-.077.076-.405.34-.085.094s-.1.059-.2.12c-.138.085-.281.164-.427.237a2.307,2.307,0,0,0-.3.14c.131-.094.4-.153.09-.045a9.979,9.979,0,0,1-1.423.389c-.072.013-.605.084-.118.029-.145.016-.291.032-.437.044-.347.029-.7.043-1.045.043-.319,0-.639-.011-.957-.035-.176-.014-.352-.032-.527-.052.272.031.17.022-.04-.015a8.791,8.791,0,0,1-1.443-.382c-.193-.07-.365-.239.033.024a2.361,2.361,0,0,0-.249-.117,5.311,5.311,0,0,1-.474-.26c-.116-.071-.224-.167-.343-.232.546.3.24.194.061.018a2,2,0,0,0-2.829,2.829Z"></path><path class="c" d="M108.676,182.973a25.515,25.515,0,0,1,.6,2.757l-.071-.532a1.676,1.676,0,0,1,.01.381l.071-.532a.969.969,0,0,1-.041.171l.2-.477a.692.692,0,0,1-.06.11l.312-.405a.583.583,0,0,1-.09.089l.405-.313a1.821,1.821,0,0,1-.218.116l.478-.2a1.591,1.591,0,0,1-.369.107l.532-.071a1.422,1.422,0,0,1-.345,0l.531.072c-.13-.018-.258-.05-.388-.068a1.515,1.515,0,0,0-.8-.035,1.486,1.486,0,0,0-.743.237,2,2,0,0,0-.718,2.736l.313.405a2,2,0,0,0,.883.514c.348.047.686.134,1.041.15a3.423,3.423,0,0,0,1.6-.391,2.438,2.438,0,0,0,1.314-1.592,3.751,3.751,0,0,0-.014-1.65c-.15-.888-.355-1.768-.583-2.639a2.064,2.064,0,0,0-.92-1.2,2.038,2.038,0,0,0-1.541-.2,2.017,2.017,0,0,0-1.195.919,2.1,2.1,0,0,0-.2,1.541Z"></path><path class="c" d="M96.913,179.553c1.114-.338,2.23-.668,3.342-1.013a2.1,2.1,0,0,0,1.2-.919,2,2,0,0,0-2.259-2.938c-1.111.345-2.228.675-3.342,1.013a2.089,2.089,0,0,0-1.2.919,2.043,2.043,0,0,0-.2,1.541,2.022,2.022,0,0,0,.92,1.195,2.044,2.044,0,0,0,1.541.2Z"></path><path class="c" d="M123.77,175.628c-1.117-.338-2.254-.6-3.368-.945a2,2,0,0,0-2.461,1.4,2.027,2.027,0,0,0,.2,1.541,2.141,2.141,0,0,0,1.195.919c1.115.344,2.252.607,3.368.945a2,2,0,0,0,2.461-1.4,2.027,2.027,0,0,0-.2-1.541,2.129,2.129,0,0,0-1.2-.919Z"></path></g></svg>
                                        <span class="mt-2 text-lg font-semibold mb-2 px-4 text-center">{{ __('Nursing care') }}</span>
                </div>


                <div class="w-50 flex flex-col items-center bg-white rounded-2xl py-3 transition-transform duration-300 hover:bg-yellow-200"
                style="height: 150px; width: 200px; transition: transform 0.3s;"
                onmouseover="this.style.transform='scale(1.2)'"
                onmouseout="this.style.transform='scale(1)'">

                    <svg
                    class="py-2"
                    fill="#000000" viewBox="-0.5 0 129 129" style="fill-rule:evenodd;clip-rule:evenodd;stroke-linejoin:round;stroke-miterlimit:2;" version="1.1" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:serif="http://www.serif.com/" xmlns:xlink="http://www.w3.org/1999/xlink"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g transform="matrix(1,0,0,1,0,-339)"> <g id="shovel" transform="matrix(1,0,0,1,0,339.167)"> <rect height="128" style="fill:none;" width="128" x="0" y="0"></rect> <g> <g transform="matrix(1,0,0,1,-5714.49,-9146.38)"> <path d="M5819.04,9174.61L5814.12,9169.7L5750.89,9232.93C5750.89,9232.93 5749.83,9235.07 5748.71,9237.34C5748.33,9238.1 5748.48,9239.03 5749.08,9239.64C5749.69,9240.24 5750.61,9240.4 5751.38,9240.02C5753.66,9238.9 5755.8,9237.85 5755.8,9237.85L5819.04,9174.61Z" style="fill:#f7d070;"></path> </g> <g transform="matrix(1,0,0,1,-5714.49,-9146.38)"> <path d="M5816.62,9172.2L5753.39,9235.44C5753.39,9235.44 5751.24,9236.49 5748.97,9237.61C5748.84,9237.67 5748.7,9237.72 5748.56,9237.76C5748.4,9238.42 5748.59,9239.14 5749.08,9239.64C5749.69,9240.24 5750.61,9240.4 5751.38,9240.02C5753.66,9238.9 5755.8,9237.85 5755.8,9237.85L5819.04,9174.61L5816.62,9172.2Z" style="fill:#b99c54;"></path> </g> <g transform="matrix(1,0,0,1,-5714.49,-9146.38)"> <path d="M5771.86,9221.79L5766.94,9216.88L5750.89,9232.93C5750.89,9232.93 5749.83,9235.07 5748.71,9237.34C5748.33,9238.1 5748.48,9239.03 5749.08,9239.64C5749.69,9240.24 5750.61,9240.4 5751.38,9240.02C5753.66,9238.9 5755.8,9237.85 5755.8,9237.85L5771.86,9221.79Z" style="fill:#666666;"></path> </g> <g transform="matrix(1,0,0,1,-5714.49,-9146.38)"> <path d="M5766.86,9216.96L5769.15,9219.25L5753.1,9235.31C5753.1,9235.31 5750.95,9236.36 5748.68,9237.48C5748.66,9237.49 5748.65,9237.5 5748.64,9237.5C5748.35,9238.23 5748.52,9239.07 5749.08,9239.64C5749.69,9240.24 5750.61,9240.4 5751.38,9240.02C5753.66,9238.9 5755.8,9237.85 5755.8,9237.85L5771.86,9221.79L5766.94,9216.88L5766.86,9216.96Z" style="fill:#4c4c4c;"></path> </g> <g transform="matrix(1,0,0,1,-5714.49,-9146.38)"> <path d="M5838.59,9166.97C5839.52,9167.9 5840.03,9169.16 5840.02,9170.47C5840.01,9171.77 5839.48,9173.03 5838.54,9173.94C5836.1,9176.32 5833.29,9179.04 5833.29,9179.04C5827.39,9181.77 5813.91,9174.96 5813.91,9174.96C5813.91,9174.96 5807.11,9161.48 5809.84,9155.59C5809.84,9155.59 5812.48,9152.78 5814.8,9150.31C5815.7,9149.35 5816.96,9148.79 5818.29,9148.77C5819.61,9148.75 5820.89,9149.27 5821.82,9150.2C5826.34,9154.73 5834.09,9162.48 5838.59,9166.97ZM5832.25,9168.64L5828.3,9172.47C5825.56,9173.59 5818.89,9169.91 5818.89,9169.91C5818.89,9169.91 5815.22,9163.25 5816.34,9160.51L5820.09,9156.48L5832.25,9168.64Z" style="fill:#0d79f2;"></path> </g> <g transform="matrix(1,0,0,1,-5714.49,-9146.38)"> <path d="M5821.82,9150.2C5826.34,9154.73 5834.09,9162.48 5838.59,9166.97C5839.52,9167.9 5840.03,9169.16 5840.02,9170.47C5840.01,9171.77 5839.48,9173.03 5838.54,9173.94C5836.1,9176.32 5833.29,9179.04 5833.29,9179.04C5827.39,9181.77 5813.91,9174.96 5813.91,9174.96C5813.91,9174.96 5813.56,9174.26 5813.04,9173.1C5816.95,9174.85 5826.01,9178.42 5830.56,9176.31C5830.56,9176.31 5833.37,9173.59 5835.81,9171.21C5836.75,9170.3 5837.28,9169.05 5837.29,9167.74C5837.3,9166.43 5836.79,9165.17 5835.86,9164.24L5821.82,9150.2ZM5820.09,9156.48L5816.34,9160.51C5815.59,9162.34 5816.98,9165.92 5817.99,9168.09C5816.9,9167.59 5816.17,9167.19 5816.17,9167.19C5816.17,9167.19 5812.49,9160.52 5813.61,9157.78L5817.37,9153.75L5820.09,9156.48Z" style="fill:#0a5bb5;"></path> </g> <g transform="matrix(1,0,0,1,-5714.49,-9146.38)"> <path d="M5774.9,9239.72C5776.13,9240.95 5776.81,9242.61 5776.81,9244.35C5776.8,9246.09 5776.1,9247.76 5774.86,9248.98C5767.72,9256.01 5754.91,9268.63 5754.91,9268.63C5745.58,9274.6 5732.53,9271.25 5725.92,9268.89C5723.19,9267.91 5721.04,9265.76 5720.05,9263.02C5717.69,9256.42 5714.35,9243.36 5720.32,9234.03C5720.32,9234.03 5732.78,9221.17 5739.76,9213.95C5740.98,9212.7 5742.65,9211.98 5744.39,9211.97C5746.14,9211.95 5747.82,9212.64 5749.06,9213.88C5755.8,9220.62 5768.18,9232.99 5774.9,9239.72Z" style="fill:#b6b6b6;"></path> </g> <g transform="matrix(1,0,0,1,-5714.49,-9146.38)"> <path d="M5774.9,9239.72C5776.13,9240.95 5776.81,9242.61 5776.81,9244.35C5776.8,9246.09 5776.1,9247.76 5774.86,9248.98C5767.72,9256.01 5754.91,9268.63 5754.91,9268.63C5745.58,9274.6 5732.53,9271.25 5725.92,9268.89C5723.53,9268.03 5721.58,9266.27 5720.47,9264.01C5720.79,9264.17 5721.12,9264.31 5721.46,9264.43C5728.06,9266.78 5741.12,9270.13 5750.45,9264.16C5750.45,9264.16 5763.25,9251.55 5770.4,9244.51C5771.64,9243.29 5772.34,9241.62 5772.34,9239.89C5772.35,9238.15 5771.66,9236.48 5770.43,9235.25L5774.9,9239.72Z" style="fill:#c8c8c8;"></path> </g> <g transform="matrix(1,0,0,1,-5714.49,-9146.38)"> <path d="M5744.56,9211.97C5746.25,9212 5747.86,9212.68 5749.06,9213.88L5774.9,9239.72C5776.13,9240.95 5776.81,9242.61 5776.81,9244.35C5776.8,9246.09 5776.1,9247.76 5774.86,9248.98L5771,9252.78C5771.91,9251.64 5772.42,9250.22 5772.42,9248.74C5772.43,9247 5771.74,9245.33 5770.51,9244.1C5770.51,9244.1 5760.02,9233.61 5752.42,9226.01C5748.25,9221.84 5741.51,9221.81 5737.3,9225.93C5731.7,9231.71 5724.95,9238.67 5724.95,9238.67C5718.98,9248 5722.33,9261.06 5724.69,9267.66C5724.8,9267.96 5724.92,9268.25 5725.05,9268.53C5722.73,9267.43 5720.93,9265.46 5720.05,9263.02C5717.69,9256.42 5714.35,9243.36 5720.32,9234.03L5739.76,9213.95C5740.98,9212.7 5742.65,9211.98 5744.39,9211.97C5744.42,9211.97 5744.45,9211.97 5744.48,9211.97L5744.56,9211.97Z" style="fill:#888888;"></path> </g> </g> </g> </g> </g></svg>

                    <span class="mt-2 text-lg font-semibold mb-2">{{ __('Agriculture') }}</span>

                </div>

                <div class="w-50 flex flex-col items-center bg-white rounded-2xl py-3 transition-transform duration-300 hover:bg-yellow-200"
                style="height: 150px; width: 200px; transition: transform 0.3s;"
                onmouseover="this.style.transform='scale(1.2)'"
                onmouseout="this.style.transform='scale(1)'">

                  <svg
                    class="mt-5"
                  fill="#000000" viewBox="0 0 64 64" style="fill-rule:evenodd;clip-rule:evenodd;stroke-linejoin:round;stroke-miterlimit:2;" version="1.1" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:serif="http://www.serif.com/" xmlns:xlink="http://www.w3.org/1999/xlink"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g transform="matrix(1,0,0,1,-288,-288)"> <g id="Icon"> <path d="M341.92,327.476C341.92,321.972 337.458,317.509 331.954,317.509C324.951,317.509 315.265,317.509 308.262,317.509C302.757,317.509 298.295,321.972 298.295,327.476C298.295,330.299 298.295,333.156 298.295,334.992C298.295,336.649 299.638,337.992 301.295,337.992C308.33,337.992 331.886,337.992 338.92,337.992C340.577,337.992 341.92,336.649 341.92,334.992L341.92,327.476Z" style="fill:#f8ac3a;"></path> <path d="M337.057,318.913C337.948,320.406 338.46,322.151 338.46,324.016L338.46,331.532C338.46,333.189 337.117,334.532 335.46,334.532L298.295,334.532L298.295,334.992C298.295,336.649 299.638,337.992 301.295,337.992C308.33,337.992 331.886,337.992 338.92,337.992C340.577,337.992 341.92,336.649 341.92,334.992L341.92,327.476C341.92,323.836 339.969,320.653 337.057,318.913Z" style="fill:#f39404;"></path> <path d="M345.062,335.992L295.062,335.992C294.267,335.992 293.504,336.308 292.941,336.871C292.378,337.434 292.062,338.197 292.062,338.992C292.062,339.254 292.062,339.521 292.062,339.783C292.062,340.578 292.378,341.341 292.941,341.904C293.504,342.467 294.267,342.783 295.062,342.783L345.062,342.783C345.858,342.783 346.621,342.467 347.184,341.904C347.746,341.341 348.062,340.578 348.062,339.783C348.062,339.521 348.062,339.254 348.062,338.992C348.062,338.197 347.746,337.434 347.184,336.871C346.621,336.308 345.858,335.992 345.062,335.992Z" style="fill:#f5f0e5;"></path> <path d="M345.361,336.007C345.576,336.427 345.692,336.897 345.692,337.378C345.692,337.639 345.692,337.907 345.692,338.168C345.692,338.964 345.376,339.727 344.813,340.289C344.251,340.852 343.488,341.168 342.692,341.168L292.692,341.168C292.592,341.168 292.492,341.163 292.394,341.153C292.535,341.428 292.719,341.682 292.941,341.904C293.504,342.467 294.267,342.783 295.062,342.783L345.062,342.783C345.858,342.783 346.621,342.467 347.184,341.904C347.746,341.341 348.062,340.578 348.062,339.783C348.062,339.521 348.062,339.254 348.062,338.992C348.062,338.197 347.746,337.434 347.184,336.871C346.692,336.379 346.047,336.076 345.361,336.007Z" style="fill:#eadec7;"></path> <g transform="matrix(1.19758,0,0,1.31169,281.785,295.515)"> <path d="M31.127,17.534L31.165,24.004C31.167,24.425 31.544,24.765 32.004,24.762C32.465,24.76 32.837,24.417 32.835,23.996L32.797,17.526C32.795,17.105 32.418,16.766 31.958,16.768C31.497,16.77 31.125,17.114 31.127,17.534Z" style="fill:#f39404;"></path> </g> <g transform="matrix(1.19758,0,0,1.31169,281.785,295.515)"> <path d="M25.453,17.534L25.491,24.004C25.493,24.425 25.869,24.765 26.33,24.762C26.791,24.76 27.163,24.417 27.161,23.996L27.123,17.526C27.12,17.105 26.744,16.766 26.283,16.768C25.822,16.77 25.45,17.114 25.453,17.534Z" style="fill:#f39404;"></path> </g> <g transform="matrix(1.19758,0,0,1.31169,281.785,295.515)"> <path d="M36.763,17.534L36.801,24.004C36.804,24.425 37.18,24.765 37.641,24.762C38.102,24.76 38.474,24.417 38.471,23.996L38.433,17.526C38.431,17.105 38.055,16.766 37.594,16.768C37.133,16.77 36.761,17.114 36.763,17.534Z" style="fill:#f39404;"></path> </g> <g transform="matrix(-1.125,-1.94342e-16,1.23391e-16,-1.50552,349.291,333.314)"> <path d="M31.145,15.136C31.145,15.136 31.347,15.542 31.57,15.988C31.901,16.65 31.901,17.35 31.57,18.012L30.719,19.715C30.299,20.555 30.299,21.445 30.719,22.285C30.942,22.731 31.145,23.136 31.145,23.136C31.278,23.403 31.769,23.558 32.241,23.483C32.714,23.408 32.989,23.13 32.855,22.864C32.855,22.864 32.653,22.458 32.43,22.012C32.099,21.35 32.099,20.65 32.43,19.988L33.281,18.285C33.701,17.445 33.701,16.555 33.281,15.715C33.058,15.269 32.855,14.864 32.855,14.864C32.722,14.597 32.231,14.442 31.759,14.517C31.286,14.592 31.011,14.87 31.145,15.136Z" style="fill:#f5f0e5;"></path> </g> <g transform="matrix(-1.125,-1.94342e-16,1.23391e-16,-1.50552,356.062,333.314)"> <path d="M31.145,15.136C31.145,15.136 31.347,15.542 31.57,15.988C31.901,16.65 31.901,17.35 31.57,18.012L30.719,19.715C30.299,20.555 30.299,21.445 30.719,22.285C30.942,22.731 31.145,23.136 31.145,23.136C31.278,23.403 31.769,23.558 32.241,23.483C32.714,23.408 32.989,23.13 32.855,22.864C32.855,22.864 32.653,22.458 32.43,22.012C32.099,21.35 32.099,20.65 32.43,19.988L33.281,18.285C33.701,17.445 33.701,16.555 33.281,15.715C33.058,15.269 32.855,14.864 32.855,14.864C32.722,14.597 32.231,14.442 31.759,14.517C31.286,14.592 31.011,14.87 31.145,15.136Z" style="fill:#f5f0e5;"></path> </g> <g transform="matrix(-1.125,-1.94342e-16,1.23391e-16,-1.50552,362.834,333.314)"> <path d="M31.145,15.136C31.145,15.136 31.347,15.542 31.57,15.988C31.901,16.65 31.901,17.35 31.57,18.012L30.719,19.715C30.299,20.555 30.299,21.445 30.719,22.285C30.942,22.731 31.145,23.136 31.145,23.136C31.278,23.403 31.769,23.558 32.241,23.483C32.714,23.408 32.989,23.13 32.855,22.864C32.855,22.864 32.653,22.458 32.43,22.012C32.099,21.35 32.099,20.65 32.43,19.988L33.281,18.285C33.701,17.445 33.701,16.555 33.281,15.715C33.058,15.269 32.855,14.864 32.855,14.864C32.722,14.597 32.231,14.442 31.759,14.517C31.286,14.592 31.011,14.87 31.145,15.136Z" style="fill:#f5f0e5;"></path> </g> </g> </g> </g></svg>

                    <span class="mt-2 text-lg font-semibold mb-2">{{ __('Food and beverage manufacturing') }}</span>

                </div>

                <div class="w-50 flex flex-col items-center bg-white rounded-2xl py-3 transition-transform duration-300 hover:bg-yellow-200"
                style="height: 150px; width: 200px; transition: transform 0.3s;"
                onmouseover="this.style.transform='scale(1.2)'"
                onmouseout="this.style.transform='scale(1)'">



                  <svg
                  class="mt-5"
                  viewBox="0 0 128 128" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" class="iconify iconify--noto" preserveAspectRatio="xMidYMid meet" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path d="M120.82 12.53s-.44-.81-2.29-.48c-2.04.36-6.41 3.67-7.8 11.84s-2.76 33.42-1.81 35.07c1.75 3.07 5.34 5.52 5.42 7.25c.06 1.3-.34 31.36-.62 33.51c-.28 2.14-1.82 7.99-2.02 9.48c-.19 1.46.67 2.6 1.58 2.68c1.49.14 5.97.18 5.97.18l1.57-99.53z" fill="#9c9c9c"></path><path d="M21.64 48.95s-.45-20.09-.49-21.03c-.04-.77-.5-1.8-1.69-1.69c-.69.07-.92.82-.92 1.53c0 1.23-.13 16.73-.11 17.89c.02 1.68-1.89 1.31-1.85.08c.04-1.23-.04-17.02-.1-18.09c-.05-.81-.46-1.38-1.13-1.38c-.66 0-1.21.47-1.32 1.34c-.25 1.85-.19 17.12-.23 18.24c-.05 1.38-1.7 1.33-1.7-.15s-.04-16.91-.04-18.14c0-.65-.21-1.44-1.09-1.4c-.85.04-1.11.76-1.15 1.3c-.08 1.15-.67 16.97-.72 18c-.1 1.62-1.77 1.68-1.77-.08c0-1.77.41-16.41.45-17.64c.03-.77-.27-1.65-1.07-1.61c-.8.04-1.26.42-1.57 1.65c-.32 1.29-.66 8.77-1.01 13.09c-.18 2.26-1.24 11.88-.1 14.41c1.65 3.64 4.88 4.3 4.88 4.3s-.57 35.7-.89 38.04c-.46 3.38-2.36 8.2-2.16 10.66c.11 1.36.97 2.13 2.39 2.2c1.42.07 4.26.44 5.06.22c.35-.09.49-22.19.49-22.19l.35-34.72l7.49-4.83z" fill="#9c9c9c"></path><path d="M6.12 51.03l15.46 1.85s-.04 2.91-1.31 4.53c-1.6 2.03-3.45 2.26-3.45 2.26s-.21 36.93.12 39.51c.34 2.57 2.52 8.88 1.82 10.23c-.62 1.19-2.13 1.49-5.4 1.38c-3.44-.11-4.42-.03-4.55-2.36c-.13-2.33 1.96-6.61 2.06-9.58c.1-2.97.47-40.71.47-40.71S7.6 57.7 6.21 54.5c-1.07-2.5-.09-3.47-.09-3.47z" fill="#c8c8c8"></path><path d="M118.42 62.2l-5.03-1.09s3.38 2.84 3.44 5.03c.07 2.19.19 33.11-.14 34.97c-.33 1.86-2.98 8.96-1.77 10.24c.83.87 3.56.69 5.08.69s2.78-.07 3.45-.99c.66-.93.36-3.41.01-5.27c-.4-2.16-.87-4.11-.87-5.06c0-1.72-1.13-41.82-1.13-41.82l-3.04 3.3z" fill="#c8c8c8"></path><path d="M120.29 12.33c-1.39.04-4.73 1.51-6.51 7.97c-1.39 5.04-1.72 11.09-2.06 21.82c-.41 12.91.13 16.97.53 17.3s6.63 2.92 6.63 2.92l2.58-3.45s-.4-41.82-.4-43.54s.25-3.05-.77-3.02z" fill="#e0e0e0"></path><path d="M5.69 49.05s-.04 2.98 0 3.26s6.34.81 8.82.85s7.09-.25 7.09-.25s.08-1 .08-2.15c0-1-.03-1.83-.03-1.83l-15.96.12z" fill="#e0e0e0"></path><path d="M7.11 55.12c2 .47 6.35-1.37 5.71-2.09c-.69-.78-7.05-1.41-7.13-.81c-.08.59.36 2.65 1.42 2.9z" fill="#fdfdfd"></path><path d="M16.57 108.15c.52-.96.12-3.85-.12-5.37s-.45-2.7-1.1-2.61c-.54.08-.54.68-.54 1.95c0 1.26.1 3.31-.38 3.77c-.48.46-2.23 1.44-2.05 2.39c.18.94 1.42.9 2.33.86c.57-.03 1.44-.21 1.86-.99z" fill="#fdfdfd"></path><path d="M121.12 104.02c-.59-.04-.63 1-.63 2.11c0 1.1-.33 1.92-.82 2.25c-.49.33-1.78 1.02-1.7 1.66c.08.63.72.78 2.54.7c1.82-.08 1.78-1.37 1.72-2.68s-.25-3.98-1.11-4.04z" fill="#fdfdfd"></path><path d="M112.24 59.07c-.49.21 1.01 2.07 2.71 3.53c1.76 1.51 2.5 1.98 4.3 1.88c1.8-.1 2.72-4.99 1.6-5.42c-1.13-.43-1.45 1.36-2.91 1.61c-1.45.26-4.8-1.99-5.7-1.6z" fill="#fdfdfd"></path><path d="M26.99 50.52l75.07-2.5s12.03 22.02-4.2 44.22c-15.85 21.69-49.16 19.19-63.98 1.41c-16.61-19.94-6.89-43.13-6.89-43.13z" fill="#d4d4d4"></path><path d="M63.95 23.89c-23.96.17-38.29 16.61-38.64 38.29c-.35 21.86 16.43 42.13 40.56 42.13c25.18 0 39.34-20.45 39.51-41.96c.16-19.07-16.61-38.64-41.43-38.46z" fill="#f6f6f6"></path><path d="M36.87 62.84l2.25-6.33s6.17-18.36 25.72-18.26c18.22.1 24.97 17.4 24.97 17.4l2.07 6.71l1.1-3.78l-2.6-9.02l-8.8-10.23l-14.83-4.6l-12.38 1.74l-10.13 6.43l-6.75 10.44l-.62 9.5z" fill="#d5d5d5"></path><path d="M64.66 92.46c-16.01 0-28.32-11.86-29.41-28.45c-.52-7.91 2.23-15.48 7.75-21.3c5.61-5.94 13.49-9.31 21.66-9.22c8.59.08 15.97 3.18 21.36 8.96c5.5 5.9 8.36 14.02 7.85 22.26c-.97 15.74-12.95 27.4-28.49 27.75c-.25-.01-.49 0-.72 0zm-.27-56.48c-7.37 0-14.5 3.07-19.58 8.44c-5.03 5.32-7.54 12.22-7.07 19.42c1.01 15.45 12.58 26.42 27.57 26.1c14.21-.31 25.16-10.99 26.05-25.4c.46-7.45-2.23-15.08-7.18-20.41c-4.91-5.27-11.67-8.09-19.55-8.16c-.08.01-.16.01-.24.01z" fill="#ffffff"></path></g></svg>

                    <span class="mt-2 text-lg font-semibold mb-2">{{ __('Dining out') }}</span>

                </div>
                <div class="w-50 flex flex-col items-center bg-white rounded-2xl py-3 transition-transform duration-300 hover:bg-yellow-200"
                     style="height: 150px; width: 200px; transition: transform 0.3s;"
                     onmouseover="this.style.transform='scale(1.2)'"
                     onmouseout="this.style.transform='scale(1)'">

                    <svg
                    class="mt-5"
                    version="1.1" id="_x32_" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512" xml:space="preserve" fill="#759cf5" stroke="#759cf5"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <style type="text/css"> .st0{fill:#1a3232;} </style> <g> <rect y="452.927" class="st0" width="512" height="46.972"></rect> <path class="st0" d="M179,133.431c0,0,46.67,9.34,107.33-51.33c28,37.34,46.67,56,46.67,56v56.018 c18.743-19.322,30.33-45.633,30.33-74.679c0-59.285-48.055-107.34-107.33-107.34c-59.274,0-107.33,48.055-107.33,107.34 c0,29.046,11.587,55.357,30.33,74.679V133.431z"></path> <path class="st0" d="M327.982,257.267c-7.536,4.118-71.986,145.614-71.986,145.614s-64.444-141.496-71.982-145.614 c-72.55,26.174-75.789,84.807-75.789,176.871h295.551C403.776,342.073,400.537,283.441,327.982,257.267z"></path> <polygon class="st0" points="223.867,250.945 223.867,293.789 256,282.863 288.133,293.789 288.133,250.945 256,261.872 "></polygon> </g> </g></svg>

                    <span class="mt-2 text-lg font-semibold mb-2">{{ __('Service') }}</span>

                </div>




            </div>
            <div class="container mt-5 ">
                <div class="grid grid-cols-1 sm:grid-cols-5 gap-20 p-4 rounded-lg mx-auto w-4/5 ">

                    <div class="w-50 flex flex-col items-center bg-white rounded-2xl py-3 transition-transform duration-300 hover:bg-yellow-200"
                    style="height: 150px; width: 200px; transition: transform 0.3s;"
                    onmouseover="this.style.transform='scale(1.2)'"
                    onmouseout="this.style.transform='scale(1)'">

                      <svg
                      class="mt-5"
                      viewBox="0 0 128 128" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" class="iconify iconify--noto" preserveAspectRatio="xMidYMid meet" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M106 24.79H22.15c-1.92 0-3.48 1.56-3.48 3.48v57.59c0 1.92 1.56 3.48 3.48 3.48H106c1.92 0 3.48-1.56 3.48-3.48V28.27c0-1.92-1.55-3.48-3.48-3.48z" fill="#b7d5e5"> </path> <radialGradient id="IconifyId17ecdb2904d178eab9910" cx="48.408" cy="13.024" r="75.465" gradientTransform="matrix(1 0 0 1.0843 0 -10.19)" gradientUnits="userSpaceOnUse"> <stop offset="0" stop-color="#2f7889"> </stop> <stop offset="1" stop-color="#424242"> </stop> </radialGradient> <path fill="url(#IconifyId17ecdb2904d178eab9910)" d="M104.75 83.2H23.4l.96-52.27h79.43z"> </path> <path d="M121.09 123.82H7.59c-.43 0-.83-.03-1.2-.09c-2.88-.44-4.21-4.18-2.5-6.74l.39-.59h119.59l.4.6c1.86 2.78.12 6.76-3.04 6.81c-.04.01-.09.01-.14.01z" fill="#2f7889"> </path> <path d="M106.84 90.41H20.6c-1.27 0-2.54.77-3.25 1.99l-14 25.48c-.59.88-.01 2.12.99 2.12H123.8c1 0 1.58-1.24.99-2.12l-14.71-25.63c-.7-1.08-1.97-1.84-3.24-1.84z" fill="#eee"> </path> <path fill="#b7d5e5" d="M86.36 115.52H41.8l2.85-7.98h39.07z"> </path> <g opacity=".57" fill="#69a1ba"> <path d="M72.69 94.84l-.27-2.2h-3.44l.13 2.2z"> </path> <path d="M67.14 94.84l-.14-2.2h-3.45v2.2z"> </path> <path d="M93.61 94.84l-.81-2.2h-3.26l.68 2.2z"> </path> <path d="M88.36 94.84l-.68-2.2h-3.32l.54 2.2z"> </path> <path d="M83.18 94.84l-.54-2.2h-3.37l.41 2.2z"> </path> <path d="M102.11 94.84l-.95-2.2h-6.71l.82 2.2z"> </path> <path d="M77.61 94.84l-.41-2.2h-3.41l.28 2.2z"> </path> <path d="M33.76 94.84l.68-2.2h-3.26l-.81 2.2z"> </path> <path d="M50.51 94.84l.27-2.2h-3.41l-.4 2.2z"> </path> <path d="M39.35 94.84l.54-2.2h-3.32l-.67 2.2z"> </path> <path d="M28.17 94.84l.81-2.2H25.8l-.95 2.2z"> </path> <path d="M44.93 94.84l.41-2.2h-3.37l-.54 2.2z"> </path> <path d="M56.08 94.84l.14-2.2h-3.44l-.27 2.2z"> </path> <path d="M61.65 94.84v-2.2H58.2l-.14 2.2z"> </path> <g> <path d="M83.78 103.73H44.36l-.75 2.2h41.08z"> </path> <path d="M102.15 105.93l-1.21-2.2h6.54l.95 2.2z"> </path> <path d="M86.75 105.93l-.83-2.2h6.29l.96 2.2z"> </path> <path d="M95.39 105.93l-.96-2.2h4.31l1.1 2.2z"> </path> <path d="M25.67 105.93l1.21-2.2h-6.54l-.95 2.2z"> </path> <path d="M41.07 105.93l.83-2.2h-6.29l-.96 2.2z"> </path> <path d="M32.42 105.93l.97-2.2h-4.31l-1.11 2.2z"> </path> </g> <g> <path d="M29.71 98.51l.82-2.19h-6.67l-.95 2.19z"> </path> <path d="M97.95 98.51l-.81-2.19h6.66l.95 2.19z"> </path> <path d="M96.25 98.51l-.96-2.19h-3.85l.82 2.19z"> </path> <path d="M86.23 98.51l-.65-2.19h3.85l.78 2.19z"> </path> <path d="M80.19 98.51l-.47-2.19h3.85l.6 2.19z"> </path> <path d="M74.15 98.51l-.28-2.19h3.84l.43 2.19z"> </path> <path d="M68.12 98.51l-.11-2.19h3.85l.24 2.19z"> </path> <path d="M62.08 98.51l.07-2.19H66l.06 2.19z"> </path> <path d="M56.04 98.51l.25-2.19h3.85l-.11 2.19z"> </path> <path d="M50.01 98.51l.42-2.19h3.85l-.29 2.19z"> </path> <path d="M43.97 98.51l.6-2.19h3.85l-.47 2.19z"> </path> <path d="M37.93 98.51l.78-2.19h3.85l-.64 2.19z"> </path> <path d="M31.9 98.51l.95-2.19h3.85l-.82 2.19z"> </path> </g> <g> <path d="M29.7 102.22l.81-2.2h-8.75l-.95 2.2z"> </path> <path d="M95.87 102.22l-.77-2.2h-4.17l.64 2.2z"> </path> <path d="M84.93 102.22l-.48-2.2h4.16l.62 2.2z"> </path> <path d="M78.28 102.22l-.32-2.2h4.17l.45 2.2z"> </path> <path d="M71.64 102.22l-.17-2.2h4.17l.3 2.2z"> </path> <path d="M65 102.22l-.01-2.2h4.16l.15 2.2z"> </path> <path d="M58.36 102.22l.14-2.2h4.17l-.01 2.2z"> </path> <path d="M51.71 102.22l.3-2.2h4.17l-.17 2.2z"> </path> <path d="M45.07 102.22l.46-2.2h4.16l-.32 2.2z"> </path> <path d="M38.43 102.22l.61-2.2h4.17l-.48 2.2z"> </path> <path d="M31.78 102.22l.77-2.2h4.17l-.63 2.2z"> </path> <path d="M97.47 102.22l-.82-2.2h8.75l.95 2.2z"> </path> </g> </g> <path d="M124.73 117.88L110.39 92.4c-.71-1.07-1.98-1.84-3.25-1.84c0 0 1.22 1.1 1.59 1.63l12.59 23.59c.56 1.02-.18 2.26-1.34 2.26H7.96c-1.15 0-1.89-1.23-1.35-2.24l11.95-23.18c.35-.6 1.88-1.99 1.88-1.99h-.45c-1.27 0-2.54.77-3.25 1.99L3.28 117.88c-.59.88-.01 2.12.99 2.12h119.46c1.01 0 1.59-1.24 1-2.12z" fill="#b7d5e5"> </path> <path fill="none" stroke="#eee" stroke-width="2.936" stroke-linecap="round" stroke-miterlimit="10" d="M25.97 28.02h13.21"> </path> <path d="M109.37 30.11c0-1.04-1.01-1.12-1.01.11v55.8c0 1.34-1.09 2.43-2.43 2.43H22.08c-1.34 0-2.43-1.09-2.43-2.43v-55.8c0-1.23-1.01-1.15-1.01-.11l-.95 55.91c0 2.42 1.24 4.39 4.39 4.39h83.85c2.73 0 4.39-1.97 4.39-4.39l-.95-55.91z" fill="#75a7bc"> </path> </g></svg>

                        <span class="mt-2 text-lg font-semibold mb-2">{{ __('IT') }}</span>

                    </div>

                    <div class="w-50 flex flex-col items-center bg-white rounded-2xl py-3 transition-transform duration-300 hover:bg-yellow-200"
                     style="height: 150px; width: 200px; transition: transform 0.3s;"
                     onmouseover="this.style.transform='scale(1.2)'"
                     onmouseout="this.style.transform='scale(1)'">

                    <svg
                    class="mt-5"
                    viewBox="0 0 17 17" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" class="si-glyph si-glyph-gear-1" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <title>887</title> <defs> </defs> <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"> <g transform="translate(1.000000, 1.000000)" fill="#3e536f"> <path d="M7.887,9.025 C7.799,8.449 7.569,7.92 7.229,7.475 L7.995,6.71 L7.307,6.023 L6.536,6.794 C6.093,6.467 5.566,6.245 4.994,6.161 L4.994,5.066 L4.021,5.066 L4.021,6.155 C3.444,6.232 2.913,6.452 2.461,6.777 L1.709,6.024 L1.021,6.712 L1.761,7.452 C1.411,7.901 1.175,8.437 1.087,9.024 L0.062,9.024 L0.062,9.025 L0.062,9.998 L1.08,9.998 C1.162,10.589 1.396,11.132 1.744,11.587 L1.02,12.31 L1.708,12.997 L2.437,12.268 C2.892,12.604 3.432,12.83 4.02,12.91 L4.02,13.958 L4.993,13.958 L4.993,12.904 C5.576,12.818 6.11,12.589 6.56,12.252 L7.306,12.999 L7.994,12.311 L7.248,11.564 C7.586,11.115 7.812,10.581 7.893,10 L8.952,10 L8.952,9.998 L8.952,9.026 L7.887,9.026 L7.887,9.025 Z M4.496,11.295 C3.512,11.295 2.715,10.497 2.715,9.512 C2.715,8.528 3.512,7.73 4.496,7.73 C5.481,7.73 6.28,8.528 6.28,9.512 C6.28,10.497 5.481,11.295 4.496,11.295 L4.496,11.295 Z" class="si-glyph-fill"> </path> <path d="M13.031,3.37 L14.121,3.089 L13.869,2.11 L12.778,2.392 C12.66,2.152 12.513,1.922 12.317,1.72 C12.125,1.524 11.902,1.376 11.67,1.256 L11.971,0.177 L10.998,-0.094 L10.699,0.978 C10.158,0.935 9.608,1.056 9.133,1.36 L8.373,0.584 L7.652,1.291 L8.408,2.061 C8.082,2.531 7.939,3.085 7.967,3.636 L6.927,3.904 L7.179,4.881 L8.217,4.613 C8.334,4.856 8.483,5.088 8.682,5.291 C8.885,5.499 9.121,5.653 9.368,5.776 L9.079,6.815 L10.05,7.086 L10.343,6.038 C10.885,6.071 11.435,5.938 11.906,5.623 L12.677,6.409 L13.397,5.702 L12.621,4.911 C12.928,4.446 13.06,3.905 13.031,3.37 L13.031,3.37 Z M10.514,4.987 C9.691,4.987 9.023,4.318 9.023,3.494 C9.023,2.672 9.691,2.005 10.514,2.005 C11.336,2.005 12.004,2.672 12.004,3.494 C12.004,4.318 11.336,4.987 10.514,4.987 L10.514,4.987 Z" class="si-glyph-fill"> </path> </g> </g> </g></svg>

                        <span class="mt-2 text-lg font-semibold mb-2">{{ __('Mechanical Electrical') }}</span>

                    </div>

                    <div class="w-50 flex flex-col items-center bg-white rounded-2xl py-3 transition-transform duration-300 hover:bg-yellow-200"
                    style="height: 150px; width: 200px; transition: transform 0.3s;"
                    onmouseover="this.style.transform='scale(1.2)'"
                    onmouseout="this.style.transform='scale(1)'">

                    <svg
                    class="mt-5"
                    height="200px" width="200px" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512" xml:space="preserve" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path style="fill:#28CC9E;" d="M355.621,157.335c66.788,66.788,112.393,144.29,134.835,220.392 c23.099-96.551-3.012-202.476-78.357-277.82C336.423,24.23,229.894-1.79,133,21.846C209.817,44.05,288.182,89.894,355.621,157.335z"></path> <g> <path style="fill:#FAEE1C;" d="M412.099,99.907c9.605,9.605,18.406,19.709,26.41,30.227l39.877-39.877L421.75,33.62l-39.874,39.876 C392.39,81.5,402.494,90.301,412.099,99.907z"></path> <path style="fill:#FAEE1C;" d="M355.621,157.335c-9.718-9.718-19.667-18.971-29.801-27.785l-36.96,36.96l56.637,56.637 l37.024-37.024C373.973,176.339,365.013,166.727,355.621,157.335z"></path> </g> <polygon style="fill:#315C7C;" points="298.194,175.844 13.429,460.608 51.399,498.576 184.762,365.212 241.241,308.734 336.163,213.812 "></polygon> <path d="M501.147,227.339c-9.342-34.313-24.652-66.75-45.043-95.814l31.774-31.774c5.242-5.242,5.242-13.742,0-18.985 l-56.635-56.635c-5.243-5.241-13.741-5.241-18.985,0l-31.774,31.774c-29.252-20.524-61.916-35.9-96.479-45.226 C233.736-2.892,180.421-3.541,129.818,8.806c-5.909,1.44-10.111,6.677-10.238,12.758c-0.129,6.082,3.85,11.491,9.693,13.178 c62.217,17.983,122.508,50.694,176.773,95.597l-26.677,26.679c-5.188,5.188-5.234,13.564-0.15,18.819L3.937,451.116 c-2.517,2.518-3.932,5.932-3.932,9.492s1.415,6.974,3.932,9.492l37.97,37.968c2.622,2.62,6.057,3.932,9.492,3.932 s6.872-1.312,9.492-3.932l133.365-133.365c5.242-5.242,5.242-13.742,0-18.985c-5.242-5.241-13.742-5.241-18.985,0L51.399,479.59 l-18.985-18.985l265.78-265.779l18.984,18.984l-85.428,85.43c-5.242,5.242-5.242,13.742,0,18.985c5.242,5.241,13.743,5.241,18.984,0 l85.438-85.438c2.6,2.514,5.96,3.78,9.326,3.78c3.437,0,6.87-1.312,9.492-3.932l26.765-26.765 c44.798,53.886,77.59,113.805,95.827,175.651c1.687,5.721,6.938,9.628,12.872,9.628c0.118,0,0.235-0.001,0.353-0.004 c6.078-0.158,11.292-4.383,12.707-10.296C515.576,330.423,514.758,277.339,501.147,227.339z M401.96,72.394l19.79-19.788 l37.651,37.651l-19.79,19.79c-0.259-0.307-0.526-0.607-0.785-0.913c-0.709-0.836-1.428-1.665-2.146-2.494 c-0.811-0.934-1.623-1.865-2.445-2.791c-0.949-1.069-1.904-2.134-2.867-3.191c-0.47-0.514-0.944-1.026-1.416-1.537 c-0.958-1.036-1.924-2.066-2.897-3.089c-0.424-0.446-0.846-0.893-1.273-1.336c-1.384-1.439-2.777-2.869-4.191-4.282 c-1.42-1.42-2.858-2.822-4.304-4.212c-0.43-0.413-0.863-0.822-1.295-1.232c-1.039-0.987-2.083-1.968-3.136-2.94 c-0.506-0.468-1.011-0.936-1.52-1.4c-1.039-0.948-2.086-1.886-3.137-2.819c-0.953-0.847-1.913-1.686-2.877-2.521 c-0.823-0.713-1.644-1.427-2.475-2.13C402.552,72.906,402.259,72.645,401.96,72.394z M364.058,185.6l-18.561,18.561l-37.651-37.651 l18.518-18.518c3.198,2.905,6.358,5.847,9.479,8.813c0.64,0.609,1.278,1.223,1.917,1.836c1.027,0.984,2.053,1.969,3.069,2.959 c1.775,1.73,3.544,3.469,5.302,5.227c1.724,1.724,3.43,3.461,5.127,5.2c0.871,0.894,1.738,1.795,2.606,2.698 c0.673,0.698,1.342,1.397,2.01,2.098C358.622,179.712,361.355,182.639,364.058,185.6z M484.921,322.688 c-25.42-59.845-63.615-116.792-112.384-167.279c-0.283-0.293-0.565-0.585-0.848-0.877c-2.173-2.242-4.36-4.474-6.575-6.689 c-2.326-2.326-4.672-4.621-7.026-6.901c-0.232-0.224-0.463-0.448-0.697-0.673C306.308,90.956,248.686,52.502,188.135,27.127 c66.634-3.757,131.942,16.168,185.306,56.794c0.103,0.085,0.197,0.177,0.303,0.258c4.866,3.704,9.63,7.598,14.278,11.639 c0.405,0.353,0.811,0.709,1.215,1.065c1.836,1.615,3.647,3.258,5.442,4.92c0.507,0.47,1.019,0.933,1.522,1.407 c2.167,2.035,4.309,4.096,6.406,6.194c2.091,2.091,4.147,4.227,6.178,6.39c0.478,0.509,0.946,1.024,1.42,1.536 c1.655,1.788,3.292,3.592,4.901,5.423c0.36,0.408,0.72,0.818,1.077,1.227c4.042,4.65,7.939,9.418,11.647,14.29 c0.064,0.085,0.14,0.158,0.205,0.242C468.411,191.536,488.37,256.43,484.921,322.688z"></path> <path d="M225.395,331.839c-0.336-0.819-0.752-1.596-1.235-2.321c-0.483-0.74-1.047-1.424-1.665-2.042s-1.302-1.181-2.04-1.665 c-0.725-0.482-1.503-0.899-2.322-1.235c-0.805-0.336-1.651-0.589-2.51-0.764c-1.732-0.35-3.517-0.35-5.249,0 c-0.846,0.175-1.691,0.428-2.51,0.764c-0.805,0.336-1.584,0.753-2.309,1.235c-0.738,0.483-1.423,1.047-2.04,1.665 c-0.631,0.618-1.181,1.302-1.678,2.042c-0.483,0.725-0.899,1.502-1.235,2.321c-0.336,0.805-0.591,1.651-0.765,2.51 c-0.175,0.859-0.255,1.745-0.255,2.618c0,0.871,0.081,1.759,0.255,2.631c0.175,0.859,0.43,1.705,0.765,2.51 c0.336,0.805,0.752,1.584,1.235,2.321c0.497,0.725,1.047,1.41,1.678,2.042c0.618,0.617,1.302,1.181,2.04,1.663 c0.725,0.483,1.503,0.901,2.309,1.236c0.819,0.336,1.665,0.589,2.51,0.764c0.873,0.175,1.759,0.268,2.631,0.268 c0.873,0,1.759-0.094,2.618-0.268s1.705-0.428,2.51-0.764c0.819-0.336,1.597-0.753,2.322-1.236c0.738-0.482,1.423-1.046,2.04-1.663 c0.618-0.632,1.181-1.316,1.665-2.042c0.483-0.738,0.899-1.517,1.235-2.321c0.336-0.807,0.591-1.651,0.765-2.51 c0.175-0.873,0.268-1.745,0.268-2.631c0-0.873-0.094-1.76-0.268-2.618C225.986,333.491,225.731,332.644,225.395,331.839z"></path> </g></svg>

                        <span class="mt-2 text-lg font-semibold mb-2">{{ __('Construction Management') }}</span>

                    </div>

                    <div class="w-50 flex flex-col items-center bg-white rounded-2xl py-3 transition-transform duration-300 hover:bg-yellow-200"
                    style="height: 150px; width: 200px; transition: transform 0.3s;"
                    onmouseover="this.style.transform='scale(1.2)'"
                    onmouseout="this.style.transform='scale(1)'">

                    <svg
                    class="mt-5"
                    viewBox="0 0 1024 1024" class="icon" version="1.1" xmlns="http://www.w3.org/2000/svg" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path d="M961.6 169.984H64.384a22.528 22.528 0 0 0-22.4 22.4v703.232c0 12.288 10.112 22.4 22.4 22.4h897.216c12.288 0 22.4-10.048 22.4-22.4V457.344h-0.576c0.128-0.96 0.576-1.792 0.576-2.752a22.4 22.4 0 0 0-44.864 0c0 0.96 0.448 1.792 0.576 2.752h-0.576V332.032h0.128a22.272 22.272 0 0 0 44.608 0h0.128V192.384a22.464 22.464 0 0 0-22.4-22.4z" fill=""></path><path d="M87.424 870.016a0.64 0.64 0 0 1-0.64-0.64V215.424a0.64 0.64 0 0 1 0.64-0.64h851.136a0.64 0.64 0 0 1 0.64 0.64v653.952a0.64 0.64 0 0 1-0.64 0.64H87.424z" fill="#FFFFFF"></path><path d="M331.136 76.032H135.552a22.528 22.528 0 0 0-22.4 22.4v699.2c0 12.288 10.112 22.4 22.4 22.4h75.392v88h44.8v-88h75.392c12.288 0 22.4-10.048 22.4-22.4V98.432a22.464 22.464 0 0 0-22.4-22.4z" fill=""></path><path d="M158.528 777.216a0.64 0.64 0 0 1-0.64-0.64V121.408a0.64 0.64 0 0 1 0.64-0.64h149.504a0.64 0.64 0 0 1 0.64 0.64v655.104a0.64 0.64 0 0 1-0.64 0.64H158.528z" fill="#3db4db"></path><path d="M408 261.312h485.312v165.312H408z" fill=""></path><path d="M430.4 283.776h440.512v120.512H430.4z" fill="#237895"></path><path d="M408 452.032h137.6v49.984h-137.6zM579.456 452.032h137.6v49.984h-137.6zM755.712 452.032h137.6v49.984h-137.6zM543.04 562.048h60.032v59.84h-60.032zM639.04 562.048h60.032v59.84h-60.032zM735.04 562.048h60.032v59.84h-60.032zM831.04 562.048h60.032v59.84h-60.032z" fill=""></path><path d="M543.04 655.488h60.032v60.032h-60.032zM639.04 655.488h60.032v60.032h-60.032zM735.04 655.488h60.032v60.032h-60.032zM831.04 655.488h60.032v60.032h-60.032z" fill=""></path><path d="M543.04 749.056h60.032v60.032h-60.032zM639.04 749.056h60.032v60.032h-60.032zM735.04 749.056h60.032v60.032h-60.032zM831.04 749.056h60.032v60.032h-60.032z" fill=""></path><path d="M193.984 746.496a10.88 10.88 0 0 1-10.88 10.88h-0.64a10.88 10.88 0 0 1-10.88-10.88V149.504c0-5.952 4.928-10.88 10.88-10.88h0.64c5.952 0 10.88 4.928 10.88 10.88v596.992z" fill="#FFFFFF"></path></g></svg>

                        <span class="mt-2 text-lg font-semibold mb-2">{{ __('Administration Sales') }}</span>

                    </div>







            </div>
            <div class="flex justify-center mt-5">
                <p class="text-sky-800 text-xl font-semibold mb-5">{{ __('Other industries and occupations you may be looking for') }}
                    <br> {{ __('Contact us') }}
                </p>

            </div>

            </div>
            </div>










        </div>



        <div class="min-h-screen flex items-center justify-center bg-sky-400">
            <div id="job company" class="max-w-full mx-auto px-4 sm:px-6 lg:px-8 py-20">



                <h1 class="mt-50 mb-5 text-center text-white text-4xl font-bold gsap-reveal">
                    {{ __('How to use') }}
                </h1>
                <h1 class="mt-50 mb-2 text-center text-white text-3xl font-bold gsap-reveal2">
                  {{ __('Service flow (for businesses)') }}
                </h1>




        <div class="bg-sky-400 min-h-screen p-8">

            <div class="flex justify-end hidden-sm  gsap-reveal2">
                <svg
                class="w-96 h-96"
                width="725" height="571" viewBox="0 0 725 571" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <ellipse cx="362.5" cy="246.5" rx="362.5" ry="246.5" fill="#7FB4E0"/>
                    <path d="M160.784 115.909L167.815 138.011H168.085L175.131 115.909H181.949L171.92 145H163.994L153.952 115.909H160.784ZM191.601 115.909V145H185.45V115.909H191.601ZM212.442 124.276C212.329 123.13 211.841 122.24 210.979 121.605C210.118 120.971 208.948 120.653 207.471 120.653C206.467 120.653 205.62 120.795 204.928 121.08C204.237 121.354 203.707 121.738 203.337 122.23C202.978 122.723 202.798 123.281 202.798 123.906C202.779 124.427 202.888 124.882 203.124 125.27C203.371 125.658 203.707 125.994 204.133 126.278C204.559 126.553 205.051 126.795 205.61 127.003C206.169 127.202 206.765 127.372 207.4 127.514L210.013 128.139C211.282 128.423 212.447 128.802 213.508 129.276C214.568 129.749 215.487 130.331 216.263 131.023C217.04 131.714 217.641 132.528 218.067 133.466C218.503 134.403 218.726 135.478 218.735 136.69C218.726 138.471 218.271 140.014 217.371 141.321C216.481 142.618 215.193 143.627 213.508 144.347C211.832 145.057 209.81 145.412 207.442 145.412C205.094 145.412 203.049 145.052 201.306 144.332C199.573 143.613 198.219 142.547 197.244 141.136C196.278 139.716 195.771 137.959 195.724 135.866H201.675C201.742 136.842 202.021 137.656 202.513 138.31C203.015 138.954 203.683 139.441 204.516 139.773C205.359 140.095 206.311 140.256 207.371 140.256C208.413 140.256 209.317 140.104 210.085 139.801C210.861 139.498 211.462 139.077 211.888 138.537C212.315 137.997 212.528 137.377 212.528 136.676C212.528 136.023 212.334 135.473 211.945 135.028C211.567 134.583 211.008 134.205 210.269 133.892C209.54 133.58 208.645 133.295 207.585 133.04L204.417 132.244C201.964 131.648 200.028 130.715 198.607 129.446C197.187 128.177 196.481 126.468 196.491 124.318C196.481 122.557 196.95 121.018 197.897 119.702C198.853 118.385 200.165 117.358 201.832 116.619C203.498 115.881 205.392 115.511 207.513 115.511C209.673 115.511 211.557 115.881 213.167 116.619C214.786 117.358 216.046 118.385 216.945 119.702C217.845 121.018 218.309 122.543 218.337 124.276H212.442ZM227.222 145H220.631L230.674 115.909H238.6L248.629 145H242.038L234.751 122.557H234.523L227.222 145ZM226.81 133.565H242.379V138.366H226.81V133.565ZM253.482 116.36H285.922V140.16H280.922V120.96H258.242V140.4H253.482V116.36ZM256.602 125.04H283.282V129.44H256.602V125.04ZM256.602 133.68H283.362V138.28H256.602V133.68ZM266.962 111.04H271.962V148.6H266.962V111.04ZM292.682 123.32H304.762V126.92H292.682V123.32ZM292.802 112.28H304.642V115.92H292.802V112.28ZM292.682 128.76H304.762V132.4H292.682V128.76ZM290.762 117.68H306.082V121.48H290.762V117.68ZM294.762 134.32H304.802V146.48H294.762V142.68H300.722V138.12H294.762V134.32ZM292.602 134.32H296.642V148.08H292.602V134.32ZM307.042 113.2H327.442V116.64H307.042V113.2ZM308.042 118.08H326.802V121.32H308.042V118.08ZM306.082 122.88H328.202V126.32H306.082V122.88ZM314.802 111.04H319.362V125.8H314.802V111.04ZM308.802 127.84H324.162V131.24H313.242V148.56H308.802V127.84ZM321.522 127.84H326.002V144.12C326.002 146.16 325.602 147.2 324.282 147.84C322.922 148.44 321.042 148.48 318.442 148.48C318.322 147.32 317.722 145.68 317.202 144.64C318.682 144.72 320.362 144.68 320.882 144.68C321.402 144.68 321.522 144.52 321.522 144.08V127.84ZM310.762 133.04H323.842V136.16H310.762V133.04ZM310.762 138.04H323.842V141.16H310.762V138.04ZM360.882 110.96L364.362 114.92C356.122 117.04 344.602 118.04 334.802 118.36C334.682 117.16 334.082 115.2 333.642 114.16C343.282 113.76 354.322 112.72 360.882 110.96ZM334.002 122.32H365.642V126.92H334.002V122.32ZM331.242 131.64H368.002V136.32H331.242V131.64ZM347.162 116.6H352.162V142.88C352.162 145.72 351.442 147 349.522 147.72C347.602 148.48 344.682 148.6 340.602 148.56C340.282 147.2 339.362 145.04 338.642 143.8C341.602 143.92 344.962 143.88 345.882 143.88C346.802 143.88 347.162 143.6 347.162 142.8V116.6ZM394.482 111H399.242V122.32H394.482V111ZM386.162 114.16H407.762V118.04H386.162V114.16ZM387.602 120.4H406.562V124.32H387.602V120.4ZM386.042 126.12H408.122V134.08H403.962V129.84H390.042V134.08H386.042V126.12ZM398.042 131.84H402.362V142.88C402.362 144.04 402.442 144.2 403.002 144.2C403.202 144.2 404.042 144.2 404.322 144.2C404.922 144.2 405.082 143.56 405.162 139.2C406.002 139.96 407.842 140.64 409.002 140.96C408.642 146.68 407.562 148.24 404.802 148.24C404.162 148.24 402.842 148.24 402.242 148.24C398.802 148.24 398.042 146.92 398.042 142.92V131.84ZM390.842 131.84H395.162V135.08C395.162 139.2 394.082 145 386.602 148.64C385.882 147.68 384.402 146.28 383.322 145.44C389.962 142.32 390.842 137.92 390.842 134.96V131.84ZM376.762 111.08L380.922 112.52C379.282 115.64 377.442 119.2 375.922 121.44L372.722 120.12C374.122 117.72 375.842 113.84 376.762 111.08ZM381.282 115.8L385.162 117.6C382.242 122.08 378.362 127.64 375.282 131.08L372.522 129.52C375.522 125.92 379.162 120.08 381.282 115.8ZM370.562 120.4L372.922 117.2C375.002 119.08 377.442 121.68 378.402 123.56L375.802 127.24C374.922 125.28 372.562 122.44 370.562 120.4ZM379.922 125.4L383.242 124C384.842 126.72 386.362 130.24 386.842 132.52L383.242 134.16C382.802 131.84 381.402 128.16 379.922 125.4ZM370.442 128.6C374.042 128.4 379.202 128.12 384.202 127.8L384.242 131.72C379.562 132.08 374.682 132.44 370.962 132.72L370.442 128.6ZM381.002 135.44L384.362 134.4C385.322 136.64 386.122 139.56 386.402 141.48L382.842 142.64C382.642 140.68 381.882 137.72 381.002 135.44ZM372.162 134.56L376.002 135.2C375.602 139.04 374.762 143 373.602 145.56C372.802 145.04 371.042 144.28 370.122 143.88C371.242 141.52 371.842 137.92 372.162 134.56ZM376.562 130.72H380.682V148.6H376.562V130.72ZM416.162 116.32C422.002 117 426.882 117.08 431.122 116.76C434.762 116.52 438.042 115.88 441.362 114.84L442.002 119.4C439.122 120.2 435.642 120.88 432.162 121.12C428.042 121.44 422.522 121.48 416.442 120.88L416.162 116.32ZM415.442 124.68C422.642 125.4 429.122 125.28 433.922 124.8C438.242 124.44 441.242 123.64 443.562 122.96L444.362 127.68C441.962 128.28 439.002 128.84 435.762 129.2C430.722 129.76 422.922 129.88 415.722 129.4L415.442 124.68ZM428.802 117.44C428.402 115.96 427.922 114.48 427.362 112.92L432.722 112.32C433.202 116.16 434.202 119.68 435.242 122.76C436.202 125.56 438.162 129.68 440.002 132.48C440.562 133.28 441.082 133.88 441.802 134.56L439.402 138.24C437.162 137.76 432.802 137.28 429.882 136.96L430.282 133.12C431.962 133.28 434.162 133.48 435.322 133.6C433.202 130.04 431.722 126.56 430.722 123.64C429.722 120.8 429.322 119.36 428.802 117.44ZM423.122 134C422.162 135.32 421.322 136.68 421.322 138.4C421.322 141.36 424.122 142.56 429.442 142.56C433.202 142.56 436.602 142.28 439.482 141.72L439.202 146.8C436.402 147.24 432.722 147.52 429.442 147.52C421.482 147.52 416.522 145.16 416.402 139.48C416.362 136.88 417.202 134.92 418.162 133.04L423.122 134ZM467.762 113.72C467.522 114.76 467.282 116.04 467.082 117.04C466.682 118.84 466.202 121.32 465.762 123.36C464.442 129 461.242 140.4 457.042 147.16L451.802 145.08C456.562 138.68 459.562 128.12 460.682 123.08C461.442 119.48 461.882 116.08 461.842 113.08L467.762 113.72ZM481.562 117.72C484.002 121.2 487.362 128.64 488.602 132.44L483.522 134.8C482.482 130.36 479.642 123.32 476.762 119.76L481.562 117.72ZM451.562 121.92C453.002 122 454.362 121.96 455.842 121.92C459.042 121.84 466.642 120.96 469.602 120.96C473.842 120.96 476.842 122.84 476.842 128.64C476.842 133.36 476.242 139.84 474.562 143.28C473.242 146.08 471.002 146.96 468.002 146.96C466.442 146.96 464.562 146.72 463.202 146.4L462.322 141.12C463.882 141.56 466.162 141.96 467.202 141.96C468.562 141.96 469.602 141.56 470.202 140.24C471.322 138 471.842 133.12 471.842 129.2C471.842 126 470.482 125.52 467.962 125.52C465.602 125.52 458.682 126.4 456.482 126.68C455.322 126.84 453.242 127.12 452.042 127.32L451.562 121.92ZM480.842 112.2C481.842 113.64 483.242 116.2 484.002 117.68L480.802 119.04C479.962 117.4 478.722 115.04 477.642 113.48L480.842 112.2ZM485.562 110.36C486.602 111.88 488.082 114.44 488.802 115.84L485.602 117.2C484.802 115.52 483.482 113.2 482.402 111.68L485.562 110.36ZM201.511 168.04H206.631V189C206.631 191.04 206.951 191.32 209.031 191.32C209.991 191.32 213.991 191.32 215.111 191.32C217.151 191.32 217.511 190.2 217.831 184.48C218.951 185.32 221.111 186.24 222.511 186.52C221.871 193.8 220.471 196.12 215.511 196.12C214.311 196.12 209.591 196.12 208.431 196.12C203.031 196.12 201.511 194.52 201.511 188.96V168.04ZM201.991 162.48L205.111 159C208.351 161.04 212.431 164.04 214.711 165.8L211.551 169.76C209.271 167.8 205.151 164.64 201.991 162.48ZM195.111 169.88L199.711 171.04C198.831 175.76 197.551 181.44 195.551 184.88L190.871 183.16C192.911 179.68 194.391 174.6 195.111 169.88ZM218.671 174.6L223.031 172.56C225.551 176.32 228.031 181.2 229.111 184.56L224.471 186.92C223.551 183.56 221.071 178.4 218.671 174.6ZM220.591 161.36L225.431 163.32C218.991 175.64 208.431 187.64 194.111 194.68C193.391 193.56 191.991 191.8 190.991 190.84C204.551 184.64 215.231 172.64 220.591 161.36ZM231.671 180.72H268.391V184.6H231.671V180.72ZM232.431 160.44H267.431V164.6H232.431V160.44ZM244.991 176.88L249.711 178.08C247.151 182.32 243.751 187.36 241.311 190.56L236.671 189.16C239.151 185.96 242.671 180.8 244.991 176.88ZM256.591 182.16L261.231 183.36C257.271 192.8 249.031 195.52 234.191 196.68C233.871 195.28 233.151 193.6 232.391 192.56C245.871 192 253.391 189.84 256.591 182.16ZM239.431 189.48L241.871 186.04C251.071 187.92 261.031 190.68 267.031 192.88L264.151 196.76C258.351 194.4 248.991 191.52 239.431 189.48ZM242.951 162.08H247.471V175.76H242.951V162.08ZM252.031 162.08H256.551V175.76H252.031V162.08ZM238.751 170.64V174.4H261.351V170.64H238.751ZM234.271 166.88H266.151V178.16H234.271V166.88ZM273.311 166.8C275.031 167 277.191 167.08 278.631 167.08C283.591 167.08 288.991 166.24 292.871 165L292.991 169.64C289.551 170.6 283.791 171.64 278.671 171.6C277.071 171.6 275.391 171.56 273.671 171.48L273.311 166.8ZM288.871 160.8C288.351 162.92 287.391 166.84 286.311 170.24C284.471 176 280.871 183.44 277.471 188.16L272.631 185.68C276.231 181.28 279.831 174.28 281.391 169.96C282.351 167.08 283.231 163.36 283.351 160.28L288.871 160.8ZM298.271 173.28C298.151 174.96 298.191 176.64 298.231 178.4C298.311 180.76 298.671 186.72 298.671 188.96C298.671 192.68 296.671 195.6 290.951 195.6C285.991 195.6 282.071 193.36 282.071 188.96C282.071 185.08 285.351 182.04 290.911 182.04C297.911 182.04 303.431 185.56 306.751 188.56L304.111 192.88C301.231 190.2 296.671 186.08 290.631 186.08C288.311 186.08 286.791 187.08 286.791 188.48C286.791 189.96 288.071 191 290.271 191C292.991 191 293.871 189.48 293.871 187.24C293.871 184.84 293.431 177.48 293.231 173.28H298.271ZM305.151 175.4C302.831 173.52 298.271 170.92 295.511 169.68L298.111 165.76C300.991 167 305.911 169.68 307.991 171.16L305.151 175.4ZM323.511 175.16H348.831V179.2H323.511V175.16ZM327.871 181.12H344.311V184.88H327.871V181.12ZM329.391 176.64L333.511 177.68C331.471 182.32 327.871 186.32 324.071 188.8C323.391 188 321.791 186.56 320.871 185.92C324.551 183.84 327.751 180.52 329.391 176.64ZM343.551 181.12H348.031C348.031 181.12 347.991 182.2 347.911 182.76C347.351 190.6 346.711 193.84 345.631 195.04C344.871 195.92 343.991 196.24 342.951 196.36C342.031 196.48 340.511 196.52 338.871 196.48C338.831 195.32 338.431 193.68 337.831 192.68C339.071 192.8 340.151 192.84 340.671 192.84C341.231 192.84 341.551 192.76 341.871 192.36C342.511 191.64 343.111 188.88 343.551 181.76V181.12ZM331.271 168.4V170.32H341.631V168.4H331.271ZM331.271 163.36V165.28H341.631V163.36H331.271ZM327.031 160.04H346.071V173.64H327.031V160.04ZM311.791 167.44H324.031V172H311.791V167.44ZM315.831 159.52H320.311V184.4H315.831V159.52ZM310.911 185.24C313.991 184.08 318.871 182.04 323.511 180.04L324.511 184.16C320.511 186.24 316.191 188.4 312.671 190.08L310.911 185.24ZM338.991 181.88L342.231 183.64C340.711 188.44 337.351 194 333.791 196.76C332.951 195.84 331.551 194.76 330.351 194.08C334.231 191.68 337.511 186.52 338.991 181.88ZM332.911 181.92L336.071 183.8C334.071 187.92 329.871 192.56 326.071 195C325.311 194 324.031 192.84 322.911 192.16C326.871 190.16 330.991 185.84 332.911 181.92ZM360.031 171.96H380.111V176.16H360.031V171.96ZM359.551 190.96H380.191V195.16H359.551V190.96ZM357.431 180.16H382.911V196.68H377.991V184.4H362.151V196.68H357.431V180.16ZM369.871 163.8C366.591 168.48 360.431 173.76 353.831 177.28C353.191 176.16 351.871 174.4 350.831 173.4C357.751 170.04 364.191 164 367.151 159.08H372.151C376.511 165.24 382.951 170.32 389.391 172.92C388.191 174.12 387.071 175.76 386.231 177.24C380.071 174 373.351 168.56 369.871 163.8ZM405.631 168.44C407.951 168.68 410.231 168.8 412.671 168.8C417.551 168.8 422.551 168.4 426.711 167.52V172.48C422.511 173.12 417.471 173.44 412.671 173.48C410.311 173.48 408.031 173.4 405.671 173.24L405.631 168.44ZM420.871 161.72C420.751 162.48 420.671 163.44 420.631 164.28C420.551 165.6 420.471 168.36 420.471 171.24C420.471 178.6 421.111 183.8 421.111 187.6C421.111 191.8 419.031 194.84 413.271 194.84C407.711 194.84 404.271 192.56 404.271 188.36C404.271 184.28 407.711 181.48 413.191 181.48C420.711 181.48 425.551 185.24 428.671 188.12L425.951 192.32C421.351 188.04 417.311 185.36 412.791 185.36C410.511 185.36 408.951 186.28 408.951 187.8C408.951 189.44 410.551 190.16 412.711 190.16C415.151 190.16 415.991 188.88 415.991 186.52C415.991 183.76 415.471 177.04 415.471 171.28C415.471 168.24 415.431 165.56 415.391 164.36C415.391 163.72 415.271 162.48 415.151 161.72H420.871ZM401.351 162.12C401.031 162.92 400.551 165 400.391 165.72C399.791 168.4 398.471 177.2 398.471 181.2C398.471 181.96 398.511 183 398.631 183.8C399.191 182.4 399.871 181.04 400.431 179.68L402.911 181.64C401.791 184.96 400.471 189 400.031 191.2C399.911 191.76 399.791 192.64 399.831 193.04C399.831 193.48 399.831 194.16 399.871 194.72L395.351 195.04C394.551 192.28 393.751 187.68 393.751 182.28C393.751 176.24 394.951 168.68 395.431 165.6C395.591 164.48 395.751 162.92 395.791 161.68L401.351 162.12ZM440.231 195.76C437.791 192.8 434.391 189.36 431.591 186.96L435.791 183.36C438.631 185.68 442.471 189.6 444.511 192.08L440.231 195.76ZM154.52 231.32H191.48V235.48H154.52V231.32ZM163.76 228.44H168.52V232.56C168.52 237 167.24 241.92 158.24 244.56C157.68 243.44 156.24 241.64 155.24 240.72C162.8 238.72 163.76 235.36 163.76 232.44V228.44ZM177.28 228.4H182.04V244.48H177.28V228.4ZM155.96 213.44H172.04V216.68H159.44V227.76H155.96V213.44ZM170.52 213.44H174.08V223.88C174.08 225.48 173.88 226.44 172.84 227C171.8 227.56 170.44 227.56 168.6 227.56C168.52 226.6 168.08 225.2 167.64 224.28C168.72 224.28 169.72 224.32 170.04 224.28C170.4 224.24 170.52 224.16 170.52 223.8V213.44ZM156.4 208.64L159.6 207.48C160.56 208.88 161.56 210.8 161.88 212.08L158.48 213.36C158.24 212.08 157.32 210.12 156.4 208.64ZM166.8 218.44L168.84 217.92C169.32 219.32 169.88 221.12 170.04 222.2L167.96 222.88C167.76 221.68 167.24 219.84 166.8 218.44ZM170.68 207.44L174.08 208.48C173.2 210.24 172.28 211.96 171.48 213.2L168.36 212.24C169.12 210.92 170.12 208.88 170.68 207.44ZM160.96 217.92L163.36 218.48C162.88 220.68 162.16 223.16 161.44 224.76C160.96 224.44 159.88 223.92 159.24 223.68C160.04 222.04 160.6 219.92 160.96 217.92ZM178.64 207.04L182.48 208.16C180.92 212.8 178.44 217.8 175.88 220.96C175.44 220.12 174.2 218.12 173.48 217.2C175.6 214.64 177.48 210.8 178.64 207.04ZM178.76 210.72H191.36V214.44H176.92L178.76 210.72ZM163 207.04H166.96V215.24H166.56V227.28H163.44V215.24H163V207.04ZM185.6 212.36L189.8 212.76C188.04 220.76 183.84 225.44 176.48 228.16C176.16 227.24 175.08 225.4 174.36 224.56C180.68 222.56 184.4 218.76 185.6 212.36ZM179.68 214.04C181.68 219.2 185.88 223.08 191.96 224.64C191.12 225.48 189.92 227.04 189.4 228.12C182.76 226 178.52 221.36 176.12 214.88L179.68 214.04ZM209.36 238.76H232.16V243.48H209.36V238.76ZM211 219.44H231.2V224.04H211V219.44ZM218.64 207.44H223.56V241.04H218.64V207.44ZM195 214.44H208.12V218.8H195V214.44ZM200.72 228.12L205.48 222.44V244.64H200.72V228.12ZM200.72 207.08H205.48V216.48H200.72V207.08ZM205 223.8C206.4 224.76 210.92 228.76 212 229.76L209.08 233.64C207.52 231.56 204.16 227.88 202.36 226.12L205 223.8ZM206.36 214.44H207.32L208.16 214.28L210.84 216.04C207.8 223.84 201.76 230.84 195.8 234.6C195.36 233.32 194.24 230.96 193.52 230.04C198.96 227.08 204.24 221.2 206.36 215.32V214.44ZM253.68 216.76V218.72H264.52V216.76H253.68ZM253.68 211.68V213.68H264.52V211.68H253.68ZM249.28 208.28H269.12V222.16H249.28V208.28ZM247.32 224H271.16V227.88H247.32V224ZM256.8 226.12H261.32V242.4L256.8 240.44V226.12ZM253.12 233.2C255.12 239.16 259.2 239.92 264.12 239.92C265.48 239.92 270.48 239.92 272.24 239.84C271.64 240.84 271.08 242.84 270.92 244.08H263.92C257.44 244.08 252.8 242.64 250.24 234.16L253.12 233.2ZM260.08 231.4H269V235.16H260.08V231.4ZM249.72 229.08L254.04 229.6C253.2 236.12 251.16 241.28 247.64 244.52C246.92 243.76 245.12 242.32 244.12 241.68C247.44 239 249.12 234.56 249.72 229.08ZM233.88 227.32C237.16 226.64 242 225.32 246.6 224.04L247.24 228.36C243.04 229.64 238.52 230.96 234.92 231.96L233.88 227.32ZM234.28 214.64H247V219.04H234.28V214.64ZM238.6 207.08H243V239C243 241.2 242.64 242.44 241.4 243.16C240.2 243.92 238.44 244.08 235.88 244.08C235.76 242.88 235.2 240.92 234.64 239.64C236.08 239.68 237.48 239.68 237.96 239.68C238.44 239.68 238.6 239.52 238.6 238.96V207.08ZM291.6 206.96L295.68 208.04C294.08 212.56 291.32 216.84 288.16 219.52C287.56 218.68 286.08 217.04 285.2 216.28C288 214.08 290.36 210.68 291.6 206.96ZM300.44 207.08L305.08 208.12C303.92 210.32 302.68 212.44 301.72 213.88L298 212.88C298.88 211.24 299.92 208.8 300.44 207.08ZM291.72 220.36H309.4V223.12H291.72V220.36ZM287.4 229.76H301.88V233.6H287.4V229.76ZM291.72 215.92H309.4V218.68H291.72V215.92ZM298.28 212.64H302.56V226.2H298.28V212.64ZM302.16 233H308.68V236.44H301.12L302.16 233ZM307 233H311.36C311.36 233 311.28 234.08 311.2 234.68C310.72 239.76 310.16 242.2 309.12 243.24C308.28 244.08 307.36 244.4 306.04 244.48C304.96 244.6 303.04 244.64 301 244.52C300.92 243.32 300.4 241.68 299.72 240.6C301.52 240.76 303.4 240.8 304.16 240.8C304.8 240.8 305.24 240.72 305.56 240.44C306.2 239.88 306.64 237.96 307 233.52V233ZM292.44 231.2L297.2 231.16C296.52 238.32 293.84 242.32 288.12 244.76C287.6 243.84 286 242.04 285.08 241.28C290.04 239.6 292.16 236.52 292.44 231.2ZM292.92 211H310.56V214.32H289.92L292.92 211ZM289.6 214.8L293.72 211.2V226.52H289.6V214.8ZM289.6 224.84H310.96V228.24H289.6V224.84ZM273.8 227.16C277.08 226.4 282 225.08 286.6 223.72L287.24 228.04C283.04 229.36 278.48 230.72 274.88 231.76L273.8 227.16ZM274.44 214.64H286.68V219.04H274.44V214.64ZM278.68 207.08H283.08V239.52C283.08 241.76 282.68 243 281.44 243.72C280.24 244.48 278.52 244.64 275.92 244.64C275.8 243.44 275.24 241.48 274.68 240.16C276.12 240.24 277.52 240.24 278 240.2C278.48 240.2 278.68 240.08 278.68 239.52V207.08ZM300.76 229.76H304.96C304.4 232.56 303.68 235.8 303.08 237.96L299.04 237.36C299.64 235.28 300.32 232.28 300.76 229.76ZM336.64 213.6C336.08 217.68 335.28 222.36 333.88 227.08C331.48 235.16 328.04 240.12 323.68 240.12C319.2 240.12 315.52 235.2 315.52 228.44C315.52 219.24 323.56 211.32 333.92 211.32C343.8 211.32 350.08 218.2 350.08 226.96C350.08 235.36 344.92 241.32 334.84 242.88L331.8 238.16C333.36 237.96 334.48 237.76 335.56 237.52C340.64 236.28 344.64 232.64 344.64 226.76C344.64 220.48 340.72 216 333.8 216C325.32 216 320.68 222.92 320.68 227.96C320.68 232 322.28 233.96 323.8 233.96C325.52 233.96 327.04 231.4 328.72 226C329.88 222.24 330.76 217.64 331.16 213.44L336.64 213.6ZM384.28 206.96L387.76 210.92C379.52 213.04 368 214.04 358.2 214.36C358.08 213.16 357.48 211.2 357.04 210.16C366.68 209.76 377.72 208.72 384.28 206.96ZM357.4 218.32H389.04V222.92H357.4V218.32ZM354.64 227.64H391.4V232.32H354.64V227.64ZM370.56 212.6H375.56V238.88C375.56 241.72 374.84 243 372.92 243.72C371 244.48 368.08 244.6 364 244.56C363.68 243.2 362.76 241.04 362.04 239.8C365 239.92 368.36 239.88 369.28 239.88C370.2 239.88 370.56 239.6 370.56 238.8V212.6ZM417.88 207H422.64V218.32H417.88V207ZM409.56 210.16H431.16V214.04H409.56V210.16ZM411 216.4H429.96V220.32H411V216.4ZM409.44 222.12H431.52V230.08H427.36V225.84H413.44V230.08H409.44V222.12ZM421.44 227.84H425.76V238.88C425.76 240.04 425.84 240.2 426.4 240.2C426.6 240.2 427.44 240.2 427.72 240.2C428.32 240.2 428.48 239.56 428.56 235.2C429.4 235.96 431.24 236.64 432.4 236.96C432.04 242.68 430.96 244.24 428.2 244.24C427.56 244.24 426.24 244.24 425.64 244.24C422.2 244.24 421.44 242.92 421.44 238.92V227.84ZM414.24 227.84H418.56V231.08C418.56 235.2 417.48 241 410 244.64C409.28 243.68 407.8 242.28 406.72 241.44C413.36 238.32 414.24 233.92 414.24 230.96V227.84ZM400.16 207.08L404.32 208.52C402.68 211.64 400.84 215.2 399.32 217.44L396.12 216.12C397.52 213.72 399.24 209.84 400.16 207.08ZM404.68 211.8L408.56 213.6C405.64 218.08 401.76 223.64 398.68 227.08L395.92 225.52C398.92 221.92 402.56 216.08 404.68 211.8ZM393.96 216.4L396.32 213.2C398.4 215.08 400.84 217.68 401.8 219.56L399.2 223.24C398.32 221.28 395.96 218.44 393.96 216.4ZM403.32 221.4L406.64 220C408.24 222.72 409.76 226.24 410.24 228.52L406.64 230.16C406.2 227.84 404.8 224.16 403.32 221.4ZM393.84 224.6C397.44 224.4 402.6 224.12 407.6 223.8L407.64 227.72C402.96 228.08 398.08 228.44 394.36 228.72L393.84 224.6ZM404.4 231.44L407.76 230.4C408.72 232.64 409.52 235.56 409.8 237.48L406.24 238.64C406.04 236.68 405.28 233.72 404.4 231.44ZM395.56 230.56L399.4 231.2C399 235.04 398.16 239 397 241.56C396.2 241.04 394.44 240.28 393.52 239.88C394.64 237.52 395.24 233.92 395.56 230.56ZM399.96 226.72H404.08V244.6H399.96V226.72ZM439.56 212.32C445.4 213 450.28 213.08 454.52 212.76C458.16 212.52 461.44 211.88 464.76 210.84L465.4 215.4C462.52 216.2 459.04 216.88 455.56 217.12C451.44 217.44 445.92 217.48 439.84 216.88L439.56 212.32ZM438.84 220.68C446.04 221.4 452.52 221.28 457.32 220.8C461.64 220.44 464.64 219.64 466.96 218.96L467.76 223.68C465.36 224.28 462.4 224.84 459.16 225.2C454.12 225.76 446.32 225.88 439.12 225.4L438.84 220.68ZM452.2 213.44C451.8 211.96 451.32 210.48 450.76 208.92L456.12 208.32C456.6 212.16 457.6 215.68 458.64 218.76C459.6 221.56 461.56 225.68 463.4 228.48C463.96 229.28 464.48 229.88 465.2 230.56L462.8 234.24C460.56 233.76 456.2 233.28 453.28 232.96L453.68 229.12C455.36 229.28 457.56 229.48 458.72 229.6C456.6 226.04 455.12 222.56 454.12 219.64C453.12 216.8 452.72 215.36 452.2 213.44ZM446.52 230C445.56 231.32 444.72 232.68 444.72 234.4C444.72 237.36 447.52 238.56 452.84 238.56C456.6 238.56 460 238.28 462.88 237.72L462.6 242.8C459.8 243.24 456.12 243.52 452.84 243.52C444.88 243.52 439.92 241.16 439.8 235.48C439.76 232.88 440.6 230.92 441.56 229.04L446.52 230ZM486.56 220.52L510.92 217.28L511.6 221.84L487.28 225.12L486.56 220.52ZM501.64 209.56L505.24 207.32C507.32 209.24 509.84 211.92 510.96 213.8L507.12 216.28C506.12 214.44 503.68 211.6 501.64 209.56ZM484.36 207.36L488.92 208.88C485.92 215.96 481.04 223.36 476.04 227.96C475.56 226.8 474.2 224.24 473.36 223.08C477.68 219.36 481.88 213.4 484.36 207.36ZM480.2 218.84L485.12 213.96L485.16 214.04V244.52H480.2V218.84ZM494.04 207.64H498.92C499.2 224.76 501.52 238.04 506.36 238.72C507.28 238.8 507.8 236.72 508.08 232.32C509 233.32 511.16 234.6 512.04 235.04C511 242.8 508.84 244.64 506.6 244.52C497.12 243.64 494.76 229.44 494.04 207.64ZM530.84 209.32H550.4V213.88H530.84V209.32ZM541 221.76H545.92V239.04C545.92 241.6 545.4 242.96 543.64 243.72C541.92 244.44 539.4 244.48 535.8 244.48C535.64 243.08 535 241 534.36 239.6C536.64 239.72 539.28 239.72 540 239.72C540.76 239.68 541 239.52 541 238.92V221.76ZM529.12 220.4H551.44V224.96H529.12V220.4ZM520.16 225.12L524.36 220.92L524.96 221.16V244.64H520.16V225.12ZM524.68 215.76L529.24 217.48C526.08 222.8 521.16 228.4 516.88 231.92C516.2 230.92 514.56 228.76 513.6 227.8C517.68 224.92 522.04 220.28 524.68 215.76ZM523.16 207.04L527.76 208.92C524.84 212.72 520.52 216.88 516.72 219.52C516.08 218.44 514.84 216.56 514.04 215.6C517.36 213.44 521.2 209.84 523.16 207.04ZM155.24 279.52H190.92V283.44H155.24V279.52ZM155.32 261.56H190.76V265.52H155.32V261.56ZM156.96 268.72H189.24V272.48H156.96V268.72ZM158.96 274.24H187.36V277.72H158.96V274.24ZM170.56 270.64H175.32V292.6H170.56V270.64ZM167.08 255H171.56V263.44H167.08V255ZM174.48 255H179.04V263.16H174.48V255ZM169.68 281.28L173.44 282.96C169.64 287.12 163.24 290.52 157.08 292.12C156.44 290.96 155.04 289.12 154 288.12C160.04 286.96 166.4 284.32 169.68 281.28ZM176.28 281.16C179.52 284.32 185.76 286.8 192 287.84C190.92 288.84 189.48 290.84 188.76 292.16C182.44 290.56 176.32 287.16 172.56 282.64L176.28 281.16ZM183.68 255.32L188.72 256.52C187.44 258.72 186.08 260.88 185.04 262.36L181.16 261.16C182.08 259.52 183.12 257.08 183.68 255.32ZM178.4 263.92L183.48 265.08C182.4 267 181.36 268.76 180.52 270.04L176.44 268.88C177.16 267.44 178 265.4 178.4 263.92ZM158.2 256.6L162.32 255.2C163.48 256.92 164.8 259.32 165.36 260.88L161 262.44C160.56 260.88 159.28 258.44 158.2 256.6ZM163.28 265.56L167.92 264.84C168.6 265.96 169.36 267.52 169.68 268.6L164.8 269.44C164.56 268.4 163.88 266.72 163.28 265.56ZM194.96 267.16H230.96V271.4H194.96V267.16ZM198.44 259.36H221.32V263.52H198.44V259.36ZM205.48 281.12H223.36V284.72H205.48V281.12ZM205.48 287.4H223.36V291.44H205.48V287.4ZM207.88 255.04H212.6V269.52H207.88V255.04ZM225.48 256.2L229.6 258.32C221.76 269.24 209.56 277.28 196.6 282.04C196.04 281 194.6 279 193.72 278.04C206.72 273.88 218.48 266.24 225.48 256.2ZM202.8 274.6H226.4V292.48H221.4V278.52H207.6V292.64H202.8V274.6ZM248.88 259.48H270.84V263.28H248.88V259.48ZM249.96 264.84H270V268.44H249.96V264.84ZM248.12 270.16H271.56V274.08H248.12V270.16ZM264.28 254.96L269.04 256.12C267.96 257.92 266.88 259.68 266.08 260.84L262.32 259.76C263.04 258.36 263.88 256.36 264.28 254.96ZM251.44 256.36L255.2 255.12C256.12 256.48 257.12 258.32 257.48 259.56L253.48 261C253.16 259.76 252.28 257.8 251.44 256.36ZM267.76 274.84L271.36 277.4C269.6 279.24 267.48 281.2 265.88 282.48L262.8 280.12C264.36 278.8 266.52 276.52 267.76 274.84ZM248.88 277.12L252.16 274.96C253.6 276.44 255.36 278.48 256.16 279.88L252.72 282.28C252 280.84 250.32 278.68 248.88 277.12ZM246.56 286.16C248.96 285.08 252.48 283.28 255.92 281.52L257.16 285.4C254.36 287.04 251.2 288.8 248.64 290.2L246.56 286.16ZM257.56 262.04H262.16V287.84C262.16 290 261.8 291.16 260.52 291.88C259.2 292.6 257.28 292.68 254.76 292.68C254.64 291.44 254.08 289.56 253.52 288.44C254.88 288.48 256.44 288.48 256.92 288.48C257.4 288.48 257.56 288.28 257.56 287.84V262.04ZM261.92 274.84C263.68 280.2 267.2 284.8 272.32 286.88C271.36 287.76 269.96 289.52 269.28 290.76C264.08 287.88 260.68 282.28 258.8 275.56L261.92 274.84ZM234.76 263.32H248V267.76H234.76V263.32ZM239.64 255.04H244V292.6H239.64V255.04ZM239.56 266.36L242.24 267.28C241.08 273.6 238.8 281.32 235.96 285.44C235.56 284.16 234.52 282.32 233.84 281.2C236.4 277.72 238.64 271.44 239.56 266.36ZM243.8 269.28C244.68 270.36 247.96 275.4 248.64 276.52L246.16 279.96C245.28 277.64 242.88 273.08 241.8 271.2L243.8 269.28ZM292.44 256.92C292.12 258.4 291.6 260.76 290.48 263.64C289.64 265.6 288.48 267.88 287.36 269.48C288.44 269 290.56 268.72 291.92 268.72C295.24 268.72 297.76 270.68 297.76 274.4C297.76 276.56 297.88 280.92 297.92 283.44H293.12C293.28 281.56 293.36 278.16 293.32 276C293.32 273.44 291.72 272.6 290.04 272.6C287.84 272.6 285.32 273.92 283.8 275.36C282.6 276.56 281.48 278 280.12 279.76L275.84 276.56C280.96 271.84 284.04 267.52 285.72 263.12C286.52 260.96 287.04 258.52 287.16 256.48L292.44 256.92ZM277.36 260.64C279.4 260.92 282.36 261.08 284.4 261.08C289.68 261.08 296.92 260.8 302.72 259.76L302.68 264.4C297.04 265.2 289 265.56 284.12 265.56C282.48 265.56 279.56 265.48 277.36 265.28V260.64ZM309.04 272C307.8 272.36 305.64 273.16 304.28 273.68C301.68 274.68 298.08 276.12 294.32 278.04C290.68 279.92 288.72 281.64 288.72 283.84C288.72 286.04 290.64 286.64 294.52 286.64C297.92 286.64 302.4 286.2 305.92 285.48L305.76 290.64C303.08 291 298.2 291.36 294.4 291.36C288.16 291.36 283.48 289.8 283.48 284.64C283.48 279.08 289.2 275.8 294 273.4C297.68 271.48 300.2 270.52 302.6 269.4C304.16 268.72 305.56 268.08 307.08 267.32L309.04 272ZM320.8 260.36C323.76 260.68 327.52 260.84 331.72 260.84C335.64 260.84 340.24 260.6 343.32 260.28V265.6C340.52 265.84 335.56 266.08 331.76 266.08C327.56 266.08 324.08 265.88 320.8 265.64V260.36ZM324.2 277.28C323.8 278.72 323.52 280 323.52 281.36C323.52 283.92 325.92 285.76 331.72 285.76C337.12 285.76 342.2 285.16 345.76 284.2L345.8 289.8C342.32 290.64 337.52 291.16 331.88 291.16C322.72 291.16 318.12 288.08 318.12 282.6C318.12 280.28 318.6 278.32 318.92 276.84L324.2 277.28ZM344.36 256.2C345.36 257.68 346.76 260.24 347.52 261.72L344.32 263.08C343.48 261.44 342.24 259.04 341.16 257.52L344.36 256.2ZM349.08 254.4C350.12 255.92 351.6 258.44 352.32 259.84L349.12 261.24C348.32 259.56 347 257.24 345.92 255.72L349.08 254.4ZM373.92 286.6H387.72V290.84H373.92V286.6ZM371.68 275.56H390.04V292.4H385.4V279.8H376.08V292.56H371.68V275.56ZM370.28 256.92H388.6V261.32H370.28V256.92ZM386.36 256.92H390.84C390.84 256.92 390.8 258.08 390.76 258.64C390.56 267 390.28 270.48 389.28 271.76C388.44 272.8 387.56 273.12 386.28 273.28C385.2 273.44 383.36 273.44 381.4 273.44C381.28 272.04 380.76 270.2 380 269C381.68 269.16 383.32 269.16 384.08 269.16C384.64 269.16 385.04 269.08 385.36 268.72C385.96 268.04 386.2 265.16 386.36 257.6V256.92ZM376 258.72H380.72C380.12 265.48 378.56 271.12 371.48 274.48C370.92 273.36 369.64 271.68 368.64 270.88C374.64 268.28 375.56 263.88 376 258.72ZM360.2 255.08L364.36 256.64C362.72 259.68 360.88 263.24 359.32 265.48L356.12 264.08C357.56 261.72 359.28 257.88 360.2 255.08ZM364.8 259.8L368.68 261.56C365.8 266.16 361.88 271.72 358.84 275.2L356.08 273.64C359.04 270 362.72 264.12 364.8 259.8ZM354.04 264.56L356.32 261.28C358.44 263.12 360.92 265.64 361.96 267.48L359.48 271.2C358.52 269.28 356.08 266.48 354.04 264.56ZM363.6 269.36L366.76 268.04C368.32 270.72 369.84 274.24 370.32 276.56L366.92 278.08C366.48 275.76 365.12 272.12 363.6 269.36ZM354 272.68C357.68 272.56 363.08 272.36 368.36 272.12L368.32 275.92C363.4 276.28 358.28 276.6 354.4 276.88L354 272.68ZM364.48 279.32L367.84 278.24C368.84 280.52 369.88 283.52 370.32 285.52L366.8 286.76C366.4 284.76 365.36 281.68 364.48 279.32ZM355.72 278.56L359.68 279.24C359.28 283.08 358.4 287.08 357.24 289.64C356.4 289.12 354.6 288.28 353.6 287.88C354.76 285.52 355.4 281.96 355.72 278.56ZM360.2 274.8H364.4V292.64H360.2V274.8ZM412.84 259.84C409.72 264.96 403.6 270.48 396.88 274.04C396.28 272.84 394.92 271.04 393.88 270.04C401 266.64 407.24 260.24 410 254.92H415.2C419.32 261.68 425.68 266.96 432.24 269.48C431 270.76 429.92 272.4 429.04 273.88C422.64 270.64 416.08 265.04 412.84 259.84ZM417.28 269.68H422.28V292.6H417.28V269.68ZM403.48 269.88H408.4V274.84C408.4 280.52 407.6 287.68 399.72 292.6C398.88 291.56 397 289.96 395.72 289.2C402.76 285 403.48 279.36 403.48 274.72V269.88ZM443.36 260.44C443.08 261.84 442.88 264.2 442.88 265.32C442.88 267.92 442.88 270.88 443.12 273.8C443.68 279.56 444.88 283.52 447.4 283.52C449.32 283.52 450.88 278.8 451.64 275.64L455.68 280.48C453 287.48 450.52 289.88 447.32 289.88C442.88 289.88 439.08 285.96 437.96 275.24C437.56 271.56 437.52 266.84 437.52 264.4C437.52 263.32 437.48 261.6 437.2 260.36L443.36 260.44ZM463.36 261.32C467.16 265.92 470.24 275.92 470.68 282.04L465.4 284.12C464.8 277.64 462.64 267.96 458.28 263L463.36 261.32ZM491.92 257.08C491.64 258.2 491.28 260 491.08 260.88C490.52 263.6 489.52 268.48 488.44 272.56C487 278.16 484.32 286.32 482.12 291.08L476.56 289.2C478.92 285.16 481.96 276.8 483.48 271.2C484.48 267.44 485.4 263.04 485.68 260.68C485.88 259.2 485.92 257.56 485.8 256.6L491.92 257.08ZM481.72 263.08C486.6 263.08 492.24 262.32 497.44 261.08V266.08C492.48 267.24 486.2 267.92 481.68 267.92C479.72 267.92 478.24 267.84 476.84 267.76L476.68 262.76C478.76 263 480.08 263.08 481.72 263.08ZM494.28 269.2C496.52 268.96 499.4 268.8 502 268.8C504.28 268.8 506.68 268.92 509 269.16L508.92 273.96C506.88 273.72 504.44 273.44 502.04 273.44C499.28 273.44 496.8 273.56 494.28 273.88V269.2ZM496.44 279.24C496.16 280.4 495.92 281.68 495.92 282.56C495.92 284.32 497.08 285.64 501.4 285.64C504.08 285.64 506.84 285.36 509.68 284.84L509.48 289.92C507.24 290.24 504.56 290.48 501.36 290.48C494.6 290.48 491 288.2 491 284.16C491 282.28 491.36 280.36 491.68 278.8L496.44 279.24ZM527.84 257.28C527.6 258.96 527.4 261.04 527.32 262.64C527.12 266.96 526.84 275.88 526.84 280.84C526.84 284.88 529.24 286.2 532.36 286.2C538.96 286.2 543.12 282.4 546.04 278.04L549.68 282.48C547.08 286.32 541.4 291.64 532.28 291.64C525.72 291.64 521.52 288.76 521.52 281.92C521.52 276.56 521.88 266.08 521.88 262.64C521.88 260.72 521.72 258.8 521.4 257.24L527.84 257.28ZM334.263 304.68C334.143 305.48 334.023 306.48 333.983 307.52C333.903 309.56 333.863 315.24 333.863 318.6C333.863 323 334.503 330.24 334.503 333.4C334.503 336.84 331.903 339.48 326.663 339.48C320.263 339.48 316.903 337.04 316.903 332.8C316.903 328.76 320.623 325.92 326.743 325.92C335.543 325.92 342.103 330.24 345.423 333.04L342.543 337.52C338.743 333.92 332.943 330.04 326.103 330.04C323.303 330.04 321.743 331.12 321.743 332.52C321.743 334.04 323.143 334.96 325.903 334.96C328.023 334.96 329.463 334.36 329.463 332.04C329.463 329.64 329.023 322.48 329.023 318.6C329.023 314.76 329.063 309.68 329.063 307.4C329.063 306.68 328.983 305.44 328.823 304.68H334.263ZM317.663 308.4C320.503 308.88 325.103 309.28 327.543 309.28C332.983 309.28 338.223 309 344.063 308.08L344.023 312.64C339.943 313.2 333.583 313.68 327.583 313.68C325.023 313.68 320.383 313.32 317.743 313L317.663 308.4ZM317.423 317.04C320.063 317.52 324.943 317.8 327.063 317.8C334.463 317.8 339.623 317.32 344.543 316.68L344.503 321.4C338.983 322.04 334.623 322.28 327.023 322.28C324.663 322.28 320.143 322.08 317.503 321.76L317.423 317.04ZM376.503 304.76C376.383 305.44 376.263 307.56 376.223 308.2C376.103 310.84 376.183 319 376.223 322.2L371.223 320.52C371.223 318.04 371.223 310.36 371.063 308.24C370.943 306.64 370.783 305.28 370.703 304.76H376.503ZM353.863 309.76C359.823 309.76 370.383 309.44 375.383 309.44C379.463 309.44 385.543 309.4 387.783 309.44L387.703 314.16C385.223 314.04 381.143 313.92 375.263 313.92C367.983 313.92 360.023 314.24 353.983 314.56L353.863 309.76ZM375.543 321.6C375.543 328.12 373.143 331.36 368.543 331.36C365.463 331.36 361.623 328.92 361.623 324.04C361.623 319.52 365.303 316.56 369.623 316.56C374.903 316.56 377.663 320.44 377.663 325.4C377.663 330.64 374.583 337.24 364.823 340L360.583 335.76C367.383 334.28 372.703 331.6 372.703 324.6C372.703 322 371.303 320.76 369.543 320.76C367.983 320.76 366.423 321.84 366.423 323.96C366.423 325.76 367.903 326.92 369.543 326.92C371.423 326.92 373.063 325.32 371.783 320.56L375.543 321.6ZM394.118 327.12C397.718 327.12 400.598 330 400.598 333.56C400.598 337.16 397.718 340.04 394.118 340.04C390.558 340.04 387.638 337.16 387.638 333.56C387.638 330 390.558 327.12 394.118 327.12ZM394.118 337.16C396.118 337.16 397.718 335.56 397.718 333.56C397.718 331.6 396.118 330 394.118 330C392.158 330 390.518 331.6 390.518 333.56C390.518 335.56 392.158 337.16 394.118 337.16Z" fill="white"/>
                    <path d="M358.612 570.459L279.345 480.11L436.959 479.311L358.612 570.459Z" fill="#7FB4E0"/>
                    </svg>

            </div>


            <div class="grid grid-cols-1 md:grid-cols-6 gap-6 max-w-7xl mx-auto">


                <!-- Step 01 -->
                <div class="bg-white rounded-lg p-6 shadow-lg">
                    <h2 class="font-bold text-xl mb-4">{{ __('START') }}</h2>
                    <div class="flex justify-center mb-4">


                        <svg
                         class="w-24 h-24"
                        fill="#000000" height="200px" width="200px" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 315.75 315.75" xml:space="preserve" stroke="#000000" stroke-width="0.0031575200000000005"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <path d="M263.89,8.743c-3.039,0-5.503,2.464-5.503,5.503v257.607c0,0.854,0.199,1.696,0.581,2.461l14.829,29.654 c0.932,1.864,2.837,3.042,4.922,3.042c2.084,0,3.989-1.178,4.922-3.042l14.828-29.654c0.382-0.765,0.581-1.606,0.581-2.461V14.246 c0-3.039-2.464-5.503-5.503-5.503H263.89z M288.044,270.552l-9.325,18.649l-9.326-18.649V19.749h18.651V270.552z"></path> <path d="M304.746,48.037v87.789c0,3.039,2.464,5.503,5.503,5.503c3.039,0,5.503-2.464,5.503-5.503V48.037 c0-3.039-2.464-5.503-5.503-5.503C307.21,42.534,304.746,44.998,304.746,48.037z"></path> <path d="M186.526,164.64H47.204c-3.039,0-5.503,2.465-5.503,5.504c0,3.039,2.464,5.502,5.503,5.502h139.322 c3.039,0,5.503-2.463,5.503-5.502C192.029,167.105,189.565,164.64,186.526,164.64z"></path> <path d="M186.526,246.068H47.204c-3.039,0-5.503,2.464-5.503,5.503c0,3.039,2.464,5.503,5.503,5.503h139.322 c3.039,0,5.503-2.464,5.503-5.503C192.029,248.532,189.565,246.068,186.526,246.068z"></path> <path d="M186.526,129.295H47.204c-3.039,0-5.503,2.464-5.503,5.503c0,3.039,2.464,5.503,5.503,5.503h139.322 c3.039,0,5.503-2.464,5.503-5.503C192.029,131.759,189.565,129.295,186.526,129.295z"></path> <path d="M47.204,104.959h82.709c3.039,0,5.503-2.465,5.503-5.504c0-3.039-2.464-5.502-5.503-5.502H47.204 c-3.039,0-5.503,2.463-5.503,5.502C41.701,102.494,44.165,104.959,47.204,104.959z"></path> <path d="M47.204,69.615h82.709c3.039,0,5.503-2.463,5.503-5.502c0-3.039-2.464-5.504-5.503-5.504H47.204 c-3.039,0-5.503,2.465-5.503,5.504C41.701,67.152,44.165,69.615,47.204,69.615z"></path> <path d="M5.488,306.568h222.754c3.031,0,5.488-2.457,5.488-5.488V87.843l0,0l0,0c0-0.008-0.001-0.015-0.001-0.022 c-0.001-0.177-0.01-0.353-0.027-0.525c-0.013-0.134-0.036-0.265-0.059-0.396c-0.008-0.045-0.012-0.091-0.02-0.136 c-0.031-0.154-0.071-0.308-0.115-0.459c-0.006-0.02-0.01-0.04-0.016-0.061c-0.047-0.15-0.102-0.299-0.16-0.446 c-0.008-0.019-0.014-0.039-0.021-0.058c-0.057-0.138-0.122-0.271-0.191-0.402c-0.014-0.027-0.025-0.057-0.04-0.084 c-0.064-0.119-0.136-0.234-0.208-0.349c-0.024-0.037-0.045-0.077-0.069-0.113c-0.069-0.103-0.146-0.202-0.223-0.301 c-0.033-0.043-0.064-0.089-0.098-0.132c-0.095-0.115-0.197-0.225-0.303-0.333c-0.02-0.021-0.036-0.043-0.057-0.063l-73.174-73.173 c-0.127-0.127-0.26-0.246-0.397-0.359c-0.036-0.029-0.075-0.055-0.111-0.083c-0.105-0.082-0.211-0.164-0.32-0.237 c-0.032-0.021-0.067-0.04-0.1-0.061c-0.118-0.076-0.238-0.15-0.361-0.217c-0.022-0.012-0.047-0.021-0.069-0.033 c-0.137-0.071-0.275-0.139-0.417-0.197c-0.016-0.007-0.032-0.012-0.047-0.018c-0.15-0.061-0.303-0.116-0.457-0.164 c-0.018-0.005-0.035-0.008-0.053-0.013c-0.153-0.046-0.309-0.086-0.467-0.118c-0.043-0.008-0.089-0.012-0.132-0.02 c-0.133-0.023-0.266-0.047-0.4-0.06c-0.181-0.019-0.364-0.028-0.548-0.028l0,0H5.488C2.457,9.183,0,11.64,0,14.671V301.08 C0,304.111,2.457,306.568,5.488,306.568z M214.995,82.357l-54.434,0.006l-0.003-54.441L214.995,82.357z M10.976,20.16h138.605 l0.004,67.692c0,1.456,0.578,2.852,1.607,3.881c1.029,1.028,2.426,1.606,3.881,1.606l67.682-0.008v202.261H10.976V20.16z"></path> </g> </g></svg>
                    </div>
                    <h3 class="text-xl font-bold mb-2">{{ __('Contract') }}</h3>
                    <p class="text-sm">{{ __('First, please register using the form below.') }}</p>
                </div>
                <!-- Step 01 -->
                <div class="bg-white rounded-lg p-6 shadow-lg">
                    <h2 class="font-bold text-xl mb-4">STEP <span class="text-green-600">01</span></h2>
                    <div class="flex justify-center mb-4">
                        <svg class="w-24 h-24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                            <rect x="2" y="3" width="15" height="12" rx="2" />
                            <rect x="7" y="8" width="6" height="12" rx="2" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-2">{{__('Job Posting Create')}}</h3>
                    <p class="text-sm">{{ __('After confirming your registration information, a career advisor will contact you regarding an interview.') }}</p>
                </div>

                <!-- Step 02 -->
                <div class="bg-white rounded-lg p-6 shadow-lg">
                    <h2 class="font-bold text-xl mb-4">STEP <span class="text-green-600">02</span></h2>
                    <div class="flex justify-center mb-4">
                        {{-- <svg class="w-24 h-24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                            <path d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg> --}}

                        <svg
                        class="w-24 h-24"
                        viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <title>search_3_line</title> <g id="页面-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"> <g id="File" transform="translate(-288.000000, -288.000000)"> <g id="search_3_line" transform="translate(288.000000, 288.000000)"> <path d="M24,0 L24,24 L0,24 L0,0 L24,0 Z M12.5934901,23.257841 L12.5819402,23.2595131 L12.5108777,23.2950439 L12.4918791,23.2987469 L12.4918791,23.2987469 L12.4767152,23.2950439 L12.4056548,23.2595131 C12.3958229,23.2563662 12.3870493,23.2590235 12.3821421,23.2649074 L12.3780323,23.275831 L12.360941,23.7031097 L12.3658947,23.7234994 L12.3769048,23.7357139 L12.4804777,23.8096931 L12.4953491,23.8136134 L12.4953491,23.8136134 L12.5071152,23.8096931 L12.6106902,23.7357139 L12.6232938,23.7196733 L12.6232938,23.7196733 L12.6266527,23.7031097 L12.609561,23.275831 C12.6075724,23.2657013 12.6010112,23.2592993 12.5934901,23.257841 L12.5934901,23.257841 Z M12.8583906,23.1452862 L12.8445485,23.1473072 L12.6598443,23.2396597 L12.6498822,23.2499052 L12.6498822,23.2499052 L12.6471943,23.2611114 L12.6650943,23.6906389 L12.6699349,23.7034178 L12.6699349,23.7034178 L12.678386,23.7104931 L12.8793402,23.8032389 C12.8914285,23.8068999 12.9022333,23.8029875 12.9078286,23.7952264 L12.9118235,23.7811639 L12.8776777,23.1665331 C12.8752882,23.1545897 12.8674102,23.1470016 12.8583906,23.1452862 L12.8583906,23.1452862 Z M12.1430473,23.1473072 C12.1332178,23.1423925 12.1221763,23.1452606 12.1156365,23.1525954 L12.1099173,23.1665331 L12.0757714,23.7811639 C12.0751323,23.7926639 12.0828099,23.8018602 12.0926481,23.8045676 L12.108256,23.8032389 L12.3092106,23.7104931 L12.3186497,23.7024347 L12.3186497,23.7024347 L12.3225043,23.6906389 L12.340401,23.2611114 L12.337245,23.2485176 L12.337245,23.2485176 L12.3277531,23.2396597 L12.1430473,23.1473072 Z" id="MingCute" fill-rule="nonzero"> </path> <path d="M10.5,4 C6.91015,4 4,6.91015 4,10.5 C4,14.0899 6.91015,17 10.5,17 C14.0899,17 17,14.0899 17,10.5 C17,6.91015 14.0899,4 10.5,4 Z M2,10.5 C2,5.80558 5.80558,2 10.5,2 C15.1944,2 19,5.80558 19,10.5 C19,12.4869 18.3183,14.3145 17.176,15.7618 L20.8284,19.4142 C21.2189,19.8047 21.2189,20.4379 20.8284,20.8284 C20.4379,21.2189 19.8047,21.2189 19.4142,20.8284 L15.7618,17.176 C14.3145,18.3183 12.4869,19 10.5,19 C5.80558,19 2,15.1944 2,10.5 Z M9.5,7 C9.5,6.44772 9.94772,6 10.5,6 C12.9853,6 15,8.01472 15,10.5 C15,11.0523 14.5523,11.5 14,11.5 C13.4477,11.5 13,11.0523 13,10.5 C13,9.11929 11.8807,8 10.5,8 C9.94772,8 9.5,7.55228 9.5,7 Z" id="形状" fill="#000000"> </path> </g> </g> </g> </g></svg>
                    </div>
                    <h3 class="text-xl font-bold mb-2">{{ __('Examination by our company') }}</h3>
                    <p class="text-sm">{{ __('We will review and examine the job postings you have registered.') }}</p>
                </div>

                <!-- Step 03 -->
                <div class="bg-white rounded-lg p-6 shadow-lg">
                    <h2 class="font-bold text-xl mb-4">STEP <span class="text-green-600">03</span></h2>
                    <div class="flex justify-center mb-4">
                        <svg class="w-24 h-24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                            <path d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-2">{{ __('Publish') }}</h3>
                    <p class="text-sm">{{ __('Once the review is complete, the results will be posted on a dedicated website.') }}</p>
                </div>

                <!-- Step 04 -->
                <div class="bg-white rounded-lg p-6 shadow-lg">
                    <h2 class="font-bold text-xl mb-4">STEP <span class="text-green-600">04</span></h2>
                    <div class="flex justify-center mb-4">
                        {{-- <svg class="w-24 h-24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                            <path d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                        </svg> --}}
                        <svg
                        class="w-24 h-24"
                        fill="#000000" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 56 56" xml:space="preserve"><g id="SVGRepo_bgCarrier" stroke-width="1"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <g> </g> <g> <path d="M12,24c3.309,0,6-2.691,6-6s-2.691-6-6-6s-6,2.691-6,6S8.691,24,12,24z M12,14c2.206,0,4,1.794,4,4s-1.794,4-4,4 s-4-1.794-4-4S9.794,14,12,14z"></path> <path d="M44,24c3.309,0,6-2.691,6-6s-2.691-6-6-6s-6,2.691-6,6S40.691,24,44,24z M44,14c2.206,0,4,1.794,4,4s-1.794,4-4,4 s-4-1.794-4-4S41.794,14,44,14z"></path> <path d="M54,26v13c0,1.654-1.346,3-3,3V31c0-2.757-2.243-5-5-5h-5c-0.552,0-1,0.448-1,1v4v1v1h-8c-0.552,0-1,0.448-1,1v3h-6v-3 c0-0.552-0.448-1-1-1h-8v-1v-1v-4c0-0.552-0.448-1-1-1h-5c-2.757,0-5,2.243-5,5v11c-1.654,0-3-1.346-3-3V26H0v13 c0,2.045,1.237,3.802,3,4.576V56h2V44h1h1h8v11c0,0.552,0.448,1,1,1h3h1h1v-1V40v-1h3h8h3v1v15v1h1h1h3c0.552,0,1-0.448,1-1V44h8 h1h1v12h2V43.576c1.763-0.774,3-2.531,3-4.576V26H54z M20,37h-2h-6v-6h-2v7c0,0.552,0.448,1,1,1h7c0.551,0,1,0.449,1,1v14h-2V43 c0-0.552-0.448-1-1-1H7V31c0-1.654,1.346-3,3-3h4v3v1v2c0,0.552,0.448,1,1,1h8v2H20z M40,42c-0.552,0-1,0.448-1,1v11h-2V40 c0-0.551,0.449-1,1-1h7c0.552,0,1-0.448,1-1v-7h-2v6h-6h-2h-3v-2h8c0.552,0,1-0.448,1-1v-2v-1v-3h4c1.654,0,3,1.346,3,3v11H40z"></path> <path d="M19,10v3c0,0.431,0.275,0.812,0.684,0.949C19.788,13.983,19.895,14,20,14c0.309,0,0.607-0.144,0.8-0.4l2.7-3.6H31 c1.654,0,3-1.346,3-3V3c0-1.654-1.346-3-3-3H19c-1.654,0-3,1.346-3,3v4C16,8.654,17.346,10,19,10z M18,3c0-0.551,0.449-1,1-1h12 c0.551,0,1,0.449,1,1v4c0,0.551-0.449,1-1,1h-8c-0.315,0-0.611,0.148-0.8,0.4L21,10V9c0-0.552-0.448-1-1-1h-1 c-0.551,0-1-0.449-1-1V3z"></path> <rect x="20" y="4" width="10" height="2"></rect> <rect x="27" y="25" width="6" height="2"></rect> <path d="M26,21c-1.654,0-3,1.346-3,3v4c0,1.654,1.346,3,3,3h8c1.654,0,3-1.346,3-3v-0.697l1.832-2.748 c0.205-0.307,0.224-0.701,0.05-1.026C38.708,23.203,38.369,23,38,23h-1.171c-0.413-1.164-1.525-2-2.829-2H26z M35,24 c0,0.552,0.448,1,1,1h0.131l-0.963,1.445C35.059,26.609,35,26.803,35,27v1c0,0.551-0.449,1-1,1h-8c-0.551,0-1-0.449-1-1v-4 c0-0.551,0.449-1,1-1h8C34.551,23,35,23.449,35,24z"></path> <rect x="23" y="16" width="2" height="2"></rect> <rect x="27" y="16" width="2" height="2"></rect> <rect x="31" y="16" width="2" height="2"></rect> </g> </g> </g></svg>
                    </div>
                    <h3 class="text-xl font-bold mb-2">{{ __('Job seeker interviews and tests') }}</h3>
                    <p class="text-sm">{{ __('We will hold a meeting with the job seeker to determine the desired date for your company and then arrange a date to conduct the interview and employment test.') }}</p>
                </div>
                <!-- Step 04 -->
                <div class="bg-white rounded-lg p-6 shadow-lg">
                    <h2 class="font-bold text-xl mb-4">STEP <span class="text-green-600">05</span></h2>
                    <div class="flex justify-center mb-4">
                        {{-- <svg class="w-24 h-24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                            <path d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                        </svg> --}}

                        <svg
                        class="w-24 h-24"
                        fill="#000000" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 47.001 47.001" xml:space="preserve"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <g id="Layer_1_120_"> <g> <g> <path d="M31.736,10.307c-0.111-0.112-0.249-0.193-0.398-0.24l-8.975-2.818c-3.589-1.127-5.924,0.839-6.553,1.47 c-0.367,0.367-0.648,0.754-0.792,1.091l-3.998,9.404c-0.229,0.538-0.151,1.255,0.208,1.97c0.514,1.021,1.44,1.757,2.547,2.022 c1.239,0.297,2.524-0.106,3.53-1.111c0.263-0.263,0.487-0.553,0.619-0.799l1.344-2.493c0.221-0.413,0.542-0.841,0.88-1.179 c1.153-1.154,1.701-0.626,1.934-0.402c2.011,1.941,12.554,12.529,12.554,12.529c0.375,0.375,0.297,1.086-0.172,1.554 c-0.468,0.467-1.18,0.547-1.554,0.174l-2.962-2.961c-0.382-0.383-0.998-0.383-1.38,0c-0.382,0.379-0.382,0.998,0,1.379 l2.962,2.963c0.374,0.373,0.296,1.084-0.172,1.551c-0.468,0.469-1.181,0.547-1.553,0.174l-2.963-2.961 c-0.382-0.382-1-0.382-1.38,0c-0.382,0.379-0.382,0.998,0,1.38l2.962,2.962c0.374,0.374,0.293,1.085-0.174,1.553 c-0.467,0.467-1.178,0.547-1.553,0.172l-2.962-2.961c-0.38-0.381-0.999-0.381-1.38,0c-0.38,0.381-0.38,1,0,1.379l2.962,2.963 c0.375,0.375,0.295,1.086-0.172,1.554c-0.47,0.468-1.181,0.547-1.554,0.173l-3.606-3.609c0.515-0.774,0.375-1.897-0.389-2.664 c-0.856-0.855-2.173-0.934-2.935-0.17c0.762-0.763,0.687-2.078-0.171-2.935c-0.858-0.856-2.172-0.935-2.934-0.173 c0.762-0.762,0.685-2.076-0.174-2.932c-0.856-0.858-2.17-0.936-2.934-0.174c0.764-0.762,0.685-2.076-0.172-2.935 c-0.802-0.802-1.997-0.911-2.774-0.3l-5.839-5.839c-0.381-0.382-1-0.382-1.381,0c-0.38,0.38-0.38,0.999,0,1.381l5.824,5.823 l-1.727,1.727c-0.762,0.761-0.685,2.075,0.174,2.934c0.856,0.856,2.17,0.935,2.933,0.172c-0.763,0.763-0.685,2.076,0.173,2.934 c0.856,0.855,2.171,0.936,2.934,0.173c-0.763,0.763-0.686,2.076,0.172,2.933c0.858,0.858,2.172,0.936,2.934,0.174 c-0.762,0.761-0.685,2.074,0.173,2.933c0.857,0.856,2.17,0.935,2.934,0.172l1.824-1.823l3.581,3.58 c1.143,1.143,3.076,1.063,4.314-0.173c0.603-0.603,0.925-1.373,0.97-2.135c0.762-0.045,1.533-0.368,2.135-0.972 c0.604-0.603,0.928-1.373,0.974-2.135c0.761-0.045,1.529-0.367,2.135-0.971c0.603-0.604,0.926-1.373,0.97-2.136 c0.763-0.044,1.533-0.366,2.137-0.972c1.236-1.236,1.312-3.172,0.172-4.313l-1.51-1.511l6.2-6.199 c0.381-0.38,0.381-0.999,0-1.38L31.736,10.307z"></path> </g> <g> <path d="M46.43,12.489l-7.901-7.901c-0.762-0.763-1.999-0.763-2.762,0l-2.762,2.76c-0.762,0.762-0.762,1.999,0,2.761 l7.902,7.903c0.763,0.762,2,0.762,2.762,0l2.761-2.761C47.191,14.488,47.191,13.251,46.43,12.489z M42.283,16.513 c-0.884,0-1.602-0.717-1.602-1.602c0-0.885,0.718-1.603,1.602-1.603c0.885,0,1.603,0.717,1.603,1.603 C43.885,15.795,43.168,16.513,42.283,16.513z"></path> </g> </g> </g> </g> </g></svg>
                    </div>
                    <h3 class="text-xl font-bold mb-2">{{ __('Job offer/Joining the company') }}</h3>
                    <p class="text-sm">{{ __('The invoice amount is to be paid upon confirmation of employment.') }}</p>
                </div>
            </div>
        </div>

            </div>
            </div>





        {{-- <div  id="job seeker" class="max-w-full mx-auto px-4 sm:px-6 lg:px-8 py-20">

            <h1 class="mt-50 mb-2 inset-0 flex items-center justify-center text-sky-800 text-3xl font-bold gsap-reveal">サービスのフロー（求職者様）

            </h1>





            <div class="container mb-10">
                <div class="w-full grid grid-cols-1 sm:grid-cols-6 gap-6 p-4 rounded-lg mx-auto">

                    <div class="flex flex-col md:flex-row items-center gap-4">
                        <!-- First div -->
                        <div>
                            <div class="flex items-center justify-center  bg-gray-100 rounded-lg shadow stagger-text" style="height:160px; width:180px">
                                <div class="text-center">
                                    <p class="text-xl font-bold mt-4">Start</p>
                                    <p class="text-lg py-2 font-semibold text-gray-800">ご登録</p>
                                </div>
                            </div>
                            <p class="text-sm px-5 mt-2">まずは下記フォームよりご登録をお願いいたします。</p>
                        </div>

                           <!-- Arrow with adjusted positioning -->
                            <div class="flex items-center mb-10 -mx-4">
                                <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                                </svg>
                            </div>


                        <!-- Second div -->
                        <div>
                            <div class="flex items-center justify-center w-60 h-40 bg-yellow-50 rounded-lg shadow stagger-text" style="height:160px; width:180px">
                                <div class="text-center">
                                    <p class="text-xl font-bold mt-4">Step <span class="text-green-400">1</span></p>
                                    <p class="text-lg py-2 font-semibold text-gray-800">履歴書<br>作成</p>
                                </div>
                            </div>
                            <p class="text-sm px-5 mt-2">まずは下記フォームよりご登録をお願いいたします。</p>
                        </div>

                      <!-- Arrow with adjusted positioning -->
                      <div class="flex items-center mb-10 -mx-4">
                        <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                        </svg>
                    </div>

                    <div>
                        <div class="flex items-center justify-center w-60 h-40 bg-yellow-50 rounded-lg shadow stagger-text" style="height:160px; width:180px">
                            <div class="text-center">
                                <p class="text-xl font-bold mt-4">Step <span class="text-green-400">2</span></p>
                                <p class="text-lg py-2 font-semibold text-gray-800">企業情報
                                    <br>閲覧可能
                                </p>
                            </div>
                        </div>
                        <p class="text-sm px-2 mt-2">必要項目をすべて記入していただいた後、
                            求人票が閲覧可能となります。

                            </p>
                    </div>





                   <!-- Arrow with adjusted positioning -->
                   <div class="flex items-center mb-10 -mx-4">
                    <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                    </svg>
                </div>

                    <div>
                        <div class="flex items-center justify-center w-60 h-40 bg-yellow-50 rounded-lg shadow stagger-text" style="height:160px; width:180px">
                            <div class="text-center">
                                <p class="text-xl font-bold mt-4">Step <span class="text-green-400">3</span></p>
                                <p class="text-lg py-2 font-semibold text-gray-800">応募

                                   </p>
                            </div>
                        </div>
                        <p class="text-sm px-2 mt-2">応募したい企業が見つかったら応募をし、
                            弊社との面談日程を調整します。
                            （企業様へご紹介する前にヒアリングを行います。）
                            </p>
                    </div>

                     <!-- Arrow with adjusted positioning -->
                     <div class="flex items-center mb-10 -mx-4">
                        <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                        </svg>
                    </div>


                    <div>
                        <div class="flex items-center justify-center w-60 h-40 bg-yellow-50 rounded-lg shadow stagger-text" style="height:160px; width:180px">
                            <div class="text-center">
                                <p class="text-xl font-bold mt-4">Step <span class="text-green-400">4</span></p>
                                <p class="text-lg py-2 font-semibold text-gray-800">面接・試験

                                    <br>の実施


                                </p>
                            </div>
                        </div>
                        <p class="text-sm px-2 mt-2">求職者様と応募先の企業様との面接日程を調整します。
                            日程調整後、
                            面接・採用試験を
                            実施します。

                            </p>
                    </div>

                <!-- Arrow with adjusted positioning -->
                            <div class="flex items-center mb-10 -mx-4">
                                <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                                </svg>
                            </div>


                    <div>
                        <div class="flex items-center justify-center w-60 h-40 bg-yellow-50 rounded-lg shadow stagger-text" style="height:160px; width:180px">
                            <div class="text-center">
                                <p class="text-xl font-bold mt-4">Step <span class="text-green-400">5</span></p>
                                <p class="text-lg py-2 font-semibold text-gray-800">内定・入社</p>
                            </div>
                        </div>
                        <p class="text-sm px-5 mt-2">
                            </p>
                    </div>





                    <div>








                </div>


              </div>





        </div> --}}

        {{-- <div class="min-h-screen flex items-center justify-center bg-sky-400">
            <div id="job company" class="max-w-full mx-auto px-4 sm:px-6 lg:px-8 py-20"> --}}

        <div  id="job seeker" class="bg-green-400 max-w-full p-8">
            <h1 class="mt-8 mb-5 text-center text-white text-4xl font-bold gsap-reveal">
                {{ __('How to use') }}
            </h1>
            <h1 class="mt-5 mb-5 text-center text-white text-3xl font-bold gsap-reveal2">
              {{ __('Service flow (for Job Seekers)') }}
            </h1>
            {{-- <div class="bg-sky-400 min-h-screen p-8"> --}}
                <div class="grid grid-cols-1 md:grid-cols-7 gap-4 max-w-7xl mx-auto mt-20 mb-20">

                <!-- Step 01 -->
                <div class="bg-white rounded-lg p-6 shadow-lg ">
                    <h2 class="font-bold text-xl mb-4">START</h2>
                    <div class="flex justify-center mb-4">
                        {{-- <svg class="w-24 h-24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                            <rect x="2" y="3" width="15" height="12" rx="2" />
                            <rect x="7" y="8" width="6" height="12" rx="2" />
                        </svg> --}}

                        <svg
                         class="w-24 h-24"
                        fill="#000000" height="200px" width="200px" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 315.75 315.75" xml:space="preserve" stroke="#000000" stroke-width="0.0031575200000000005"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <path d="M263.89,8.743c-3.039,0-5.503,2.464-5.503,5.503v257.607c0,0.854,0.199,1.696,0.581,2.461l14.829,29.654 c0.932,1.864,2.837,3.042,4.922,3.042c2.084,0,3.989-1.178,4.922-3.042l14.828-29.654c0.382-0.765,0.581-1.606,0.581-2.461V14.246 c0-3.039-2.464-5.503-5.503-5.503H263.89z M288.044,270.552l-9.325,18.649l-9.326-18.649V19.749h18.651V270.552z"></path> <path d="M304.746,48.037v87.789c0,3.039,2.464,5.503,5.503,5.503c3.039,0,5.503-2.464,5.503-5.503V48.037 c0-3.039-2.464-5.503-5.503-5.503C307.21,42.534,304.746,44.998,304.746,48.037z"></path> <path d="M186.526,164.64H47.204c-3.039,0-5.503,2.465-5.503,5.504c0,3.039,2.464,5.502,5.503,5.502h139.322 c3.039,0,5.503-2.463,5.503-5.502C192.029,167.105,189.565,164.64,186.526,164.64z"></path> <path d="M186.526,246.068H47.204c-3.039,0-5.503,2.464-5.503,5.503c0,3.039,2.464,5.503,5.503,5.503h139.322 c3.039,0,5.503-2.464,5.503-5.503C192.029,248.532,189.565,246.068,186.526,246.068z"></path> <path d="M186.526,129.295H47.204c-3.039,0-5.503,2.464-5.503,5.503c0,3.039,2.464,5.503,5.503,5.503h139.322 c3.039,0,5.503-2.464,5.503-5.503C192.029,131.759,189.565,129.295,186.526,129.295z"></path> <path d="M47.204,104.959h82.709c3.039,0,5.503-2.465,5.503-5.504c0-3.039-2.464-5.502-5.503-5.502H47.204 c-3.039,0-5.503,2.463-5.503,5.502C41.701,102.494,44.165,104.959,47.204,104.959z"></path> <path d="M47.204,69.615h82.709c3.039,0,5.503-2.463,5.503-5.502c0-3.039-2.464-5.504-5.503-5.504H47.204 c-3.039,0-5.503,2.465-5.503,5.504C41.701,67.152,44.165,69.615,47.204,69.615z"></path> <path d="M5.488,306.568h222.754c3.031,0,5.488-2.457,5.488-5.488V87.843l0,0l0,0c0-0.008-0.001-0.015-0.001-0.022 c-0.001-0.177-0.01-0.353-0.027-0.525c-0.013-0.134-0.036-0.265-0.059-0.396c-0.008-0.045-0.012-0.091-0.02-0.136 c-0.031-0.154-0.071-0.308-0.115-0.459c-0.006-0.02-0.01-0.04-0.016-0.061c-0.047-0.15-0.102-0.299-0.16-0.446 c-0.008-0.019-0.014-0.039-0.021-0.058c-0.057-0.138-0.122-0.271-0.191-0.402c-0.014-0.027-0.025-0.057-0.04-0.084 c-0.064-0.119-0.136-0.234-0.208-0.349c-0.024-0.037-0.045-0.077-0.069-0.113c-0.069-0.103-0.146-0.202-0.223-0.301 c-0.033-0.043-0.064-0.089-0.098-0.132c-0.095-0.115-0.197-0.225-0.303-0.333c-0.02-0.021-0.036-0.043-0.057-0.063l-73.174-73.173 c-0.127-0.127-0.26-0.246-0.397-0.359c-0.036-0.029-0.075-0.055-0.111-0.083c-0.105-0.082-0.211-0.164-0.32-0.237 c-0.032-0.021-0.067-0.04-0.1-0.061c-0.118-0.076-0.238-0.15-0.361-0.217c-0.022-0.012-0.047-0.021-0.069-0.033 c-0.137-0.071-0.275-0.139-0.417-0.197c-0.016-0.007-0.032-0.012-0.047-0.018c-0.15-0.061-0.303-0.116-0.457-0.164 c-0.018-0.005-0.035-0.008-0.053-0.013c-0.153-0.046-0.309-0.086-0.467-0.118c-0.043-0.008-0.089-0.012-0.132-0.02 c-0.133-0.023-0.266-0.047-0.4-0.06c-0.181-0.019-0.364-0.028-0.548-0.028l0,0H5.488C2.457,9.183,0,11.64,0,14.671V301.08 C0,304.111,2.457,306.568,5.488,306.568z M214.995,82.357l-54.434,0.006l-0.003-54.441L214.995,82.357z M10.976,20.16h138.605 l0.004,67.692c0,1.456,0.578,2.852,1.607,3.881c1.029,1.028,2.426,1.606,3.881,1.606l67.682-0.008v202.261H10.976V20.16z"></path> </g> </g></svg>
                    </div>
                    <h3 class="text-xl font-bold mb-2">{{ __('Registration') }}</h3>
                    <p class="text-sm">{{ __('First, please register using the form below.') }}</p>
                </div>
                <!-- Step 01 -->
                <div class="bg-white rounded-lg p-6 shadow-lg">
                    <h2 class="font-bold text-xl mb-4">STEP <span class="text-green-600">01</span></h2>
                    <div class="flex justify-center mb-4">
                        <svg
                        class="w-24 h-24"
                        fill="#000000" viewBox="0 0 846.66 846.66" style="shape-rendering:geometricPrecision; text-rendering:geometricPrecision; image-rendering:optimizeQuality; fill-rule:evenodd; clip-rule:evenodd" version="1.1" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <defs> <style type="text/css">  .fil0 {fill:black;fill-rule:nonzero}  </style> </defs> <g id="Layer_x0020_1"> <path class="fil0" d="M539.75 794.68c27.15,0 27.15,41.29 0,41.29l-497.47 0c-11.4,0 -20.64,-9.25 -20.64,-20.65l0 -621.69c0,-5.7 2.31,-10.87 6.04,-14.6l162.3 -162.29c4.03,-4.03 9.31,-6.05 14.59,-6.05l466.89 0c11.4,0 20.65,9.25 20.65,20.65l0 361.36c0,27.16 -41.29,27.16 -41.29,0l0 -340.72 -437.7 0 -150.19 150.2 0 592.5 476.82 0zm-351.21 -181.98c-27.16,0 -27.16,-41.29 0,-41.29l306.67 0c27.16,0 27.16,41.29 0,41.29l-306.67 0zm0 -274.68c-27.16,0 -27.16,-41.29 0,-41.29l306.67 0c27.16,0 27.16,41.29 0,41.29l-306.67 0zm0 91.56c-27.16,0 -27.16,-41.29 0,-41.29l306.67 0c27.16,0 27.16,41.29 0,41.29l-306.67 0zm0 91.56c-27.16,0 -27.16,-41.29 0,-41.29l306.67 0c27.16,0 27.16,41.29 0,41.29l-306.67 0zm0 -274.68c-27.16,0 -27.16,-41.29 0,-41.29l306.67 0c27.16,0 27.16,41.29 0,41.29l-306.67 0zm496.57 238.25c49.84,0 90.24,40.4 90.24,90.24 0,18.1 -5.33,34.95 -14.5,49.07 37.57,24.93 61.47,66.08 64.13,111.2 1.59,27.06 -39.55,29.47 -41.13,2.42 -2.11,-35.69 -22.61,-67.48 -54.13,-84.24 -13.16,7.5 -28.38,11.78 -44.61,11.78 -17.56,0 -33.95,-5.01 -47.81,-13.69 -33.44,16.12 -55.6,49.04 -57.79,86.15 -1.59,27.05 -42.72,24.64 -41.13,-2.42 2.79,-47.18 28.75,-89.88 69.08,-114.28 -7.99,-13.47 -12.58,-29.19 -12.58,-45.99 0,-49.83 40.4,-90.24 90.23,-90.24zm0 41.29c-27.03,0 -48.94,21.92 -48.94,48.95 0,27.03 21.91,48.94 48.94,48.94 27.03,0 48.95,-21.91 48.95,-48.94 0,-27.03 -21.91,-48.95 -48.95,-48.95z"></path> </g> </g></svg>
                    </div>
                    <h3 class="text-xl font-bold mb-2">{{__('Create Resume')}}</h3>
                    <p class="text-sm">{{ __('After confirming your registration information, a career advisor will contact you regarding an interview.') }}</p>
                </div>

                <!-- Step 02 -->
                <div class="bg-white rounded-lg p-6 shadow-lg">
                    <h2 class="font-bold text-xl mb-4">STEP <span class="text-green-600">02</span></h2>
                    <div class="flex justify-center mb-4">

                  <svg
                  class="w-24 h-24"
                  fill="#000000" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 60 60" xml:space="preserve"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <g> <path d="M59,16c0.6,0,1-0.4,1-1V1c0-0.6-0.4-1-1-1H37c-0.6,0-1,0.4-1,1v6H24V1c0-0.6-0.4-1-1-1H1C0.4,0,0,0.4,0,1v14 c0,0.6,0.4,1,1,1h9v5H1c-0.6,0-1,0.4-1,1v14c0,0.6,0.4,1,1,1h18v-2H2V23h21v-2H12v-5h11c0.6,0,1-0.4,1-1V9h12v6c0,0.6,0.4,1,1,1 h10v5H37v2h21v12H41v2h18c0.6,0,1-0.4,1-1V22c0-0.6-0.4-1-1-1H49v-5H59z M22,14H2V2h20V14z M38,2h20v12H38V2z"></path> <path d="M35,39H25c-3.9,0-7,3.1-7,7v14h2V46c0-2.8,2.2-5,5-5h1.3l2.8,7.4c0.1,0.3,0.5,0.6,0.9,0.6s0.8-0.3,1.1-0.6l2.8-7.4H35 c2.8,0,5,2.2,5,5v14h2V46C42,42.1,38.9,39,35,39z M30.1,45.2L28.5,41h3.2L30.1,45.2z"></path> <rect x="29" y="51" width="2" height="2"></rect> <rect x="29" y="55" width="2" height="2"></rect> <path d="M29,38h2c2.8,0,5-2.2,5-5v-3c0-2.8-2.2-5-5-5h-2c-2.8,0-5,2.2-5,5v3C24,35.8,26.2,38,29,38z M26,30c0-1.7,1.3-3,3-3h2 c1.7,0,3,1.3,3,3v3c0,1.7-1.3,3-3,3h-2c-1.7,0-3-1.3-3-3V30z"></path> <rect x="23" y="49" width="2" height="11"></rect> <rect x="35" y="49" width="2" height="11"></rect> <rect x="5" y="5" width="10" height="2"></rect> <rect x="5" y="9" width="14" height="2"></rect> <rect x="41" y="26" width="10" height="2"></rect> <rect x="41" y="30" width="14" height="2"></rect> <rect x="41" y="5" width="2" height="2"></rect> <rect x="45" y="5" width="2" height="2"></rect> <rect x="49" y="5" width="2" height="2"></rect> <rect x="53" y="5" width="2" height="2"></rect> <rect x="41" y="9" width="2" height="2"></rect> <rect x="45" y="9" width="2" height="2"></rect> <rect x="49" y="9" width="2" height="2"></rect> <rect x="53" y="9" width="2" height="2"></rect> <rect x="5" y="26" width="2" height="2"></rect> <rect x="9" y="26" width="2" height="2"></rect> <rect x="13" y="26" width="2" height="2"></rect> <rect x="17" y="26" width="2" height="2"></rect> <rect x="5" y="30" width="2" height="2"></rect> <rect x="9" y="30" width="2" height="2"></rect> <rect x="13" y="30" width="2" height="2"></rect> <rect x="17" y="30" width="2" height="2"></rect> </g> </g> </g></svg>
                    </div>
                    <h3 class="text-xl font-bold mb-2">{{ __('Company information available') }}</h3>
                    <p class="text-sm">{{ __('Once you have filled out all the required fields, you will be able to view the job posting.') }}</p>
                </div>

                <!-- Step 03 -->
                <div class="bg-white rounded-lg p-6 shadow-lg">
                    <h2 class="font-bold text-xl mb-4">STEP <span class="text-green-600">03</span></h2>
                    <div class="flex justify-center mb-4">
                        <svg
                        class="w-24 h-24"
                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <path fill="none" d="M0 0h24v24H0z"></path> <path d="M12 22C6.477 22 2 17.523 2 12S6.477 2 12 2s10 4.477 10 10-4.477 10-10 10zm0-2a8 8 0 1 0 0-16 8 8 0 0 0 0 16zm-.997-4L6.76 11.757l1.414-1.414 2.829 2.829 5.656-5.657 1.415 1.414L11.003 16z"></path> </g> </g></svg>
                    </div>
                    <h3 class="text-xl font-bold mb-2">{{ __('Apply') }}</h3>
                    <p class="text-sm">{{ __('If you find a company that interests you, please apply.') }}</p>
                </div>


                <!-- Step 04 -->
                <div class="bg-white rounded-lg p-6 shadow-lg">
                    <h2 class="font-bold text-xl mb-4">STEP <span class="text-green-600">04</span></h2>
                    <div class="flex justify-center mb-4">
                  <svg
                  class="w-24 h-24"
                  fill="#000000" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 943.118 943.118" xml:space="preserve"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <g> <g> <path d="M54.182,670.915v189.128c0,11.047,8.955,20,20,20h362.347c-3.137-6.688-4.899-14.143-4.899-22.006V670.915H54.182z"></path> <path d="M30,639.904h24.182h377.446V622.67v-24.418c0-0.229,0.007-0.456,0.009-0.685c0.107-15.218,3.8-29.6,10.277-42.337 c2.796-5.496,6.107-10.688,9.873-15.506c4.478-5.729,9.597-10.934,15.245-15.507c16.361-13.248,37.182-21.197,59.827-21.197 h22.555v-43.313c0-32.846-26.627-59.473-59.473-59.473h-53.809c-10.504,0-19.628,7.229-22.029,17.455l-25.013,106.529 l-3.642,15.507l-2.578,10.977c-0.36,1.538-0.785,3.049-1.271,4.528h-16.584c-0.183-5.188-0.711-10.367-1.577-15.506 c-0.148-0.892-0.306-1.779-0.476-2.666l-3.326-12.841l-19.571-75.542l15.62-34.473c2.965-6.545-1.82-13.968-9.006-13.968h-33.525 c-7.186,0-11.972,7.423-9.006,13.968l15.62,34.473l-20.313,75.542l-3.086,11.478c-0.268,1.339-0.506,2.683-0.728,4.029 c-0.848,5.14-1.36,10.317-1.527,15.506h-15.88c-0.484-1.48-0.909-2.99-1.271-4.528l-2.578-10.977l-3.641-15.508l-25.013-106.525 c-2.401-10.227-11.524-17.455-22.029-17.455h-53.808c-32.846,0-59.473,26.627-59.473,59.473v64.513v15.506v15.506H30 c-16.568,0-30,13.431-30,30v24.674C0,626.474,13.432,639.904,30,639.904z"></path> <path d="M329.919,368.094c73.717,0,133.477-59.76,133.477-133.477V92.744c0-18.391-16.561-32.347-34.686-29.233 c-39.276,6.747-128.839,24.62-184.565,35.864c-27.752,5.599-47.704,29.986-47.704,58.297v76.946 C196.442,308.335,256.202,368.094,329.919,368.094z"></path> <path d="M526.859,533.021c-10.345,0-20.121,2.418-28.812,6.703c-7.723,3.809-14.576,9.102-20.201,15.506 c-9.95,11.325-16.036,26.118-16.204,42.337c-0.002,0.229-0.017,0.455-0.017,0.685v24.418v17.234v15.505v15.506v187.122 c0,12.154,9.853,22.006,22.005,22.006h334.086h103.396c12.153,0,22.006-9.852,22.006-22.006V598.252 c0-31.565-22.422-57.893-52.209-63.928c-4.207-0.852-8.562-1.303-13.021-1.303H549.414H526.859L526.859,533.021z"></path> <path d="M702.375,497.769c80.854,0,146.4-65.546,146.4-146.4v-84.396c0-31.052-21.886-57.8-52.322-63.941 c-61.123-12.332-159.355-31.935-202.434-39.336c-1.879-0.323-3.743-0.478-5.577-0.478c-17.574,0-32.468,14.276-32.468,32.542 v155.609C555.975,432.223,621.52,497.769,702.375,497.769z"></path> </g> </g> </g> </g></svg>
                    </div>
                    <h3 class="text-xl font-bold mb-2">{{ __('Interview with a career adviser') }}</h3>
                    <p class="text-sm">{{ __('We will arrange an interview to confirm whether the VISA you hold is suitable for the position and to assess if your skills and abilities can be effectively utilized.') }}</p>
                </div>

                <!-- Step 05 -->
                <div class="bg-white rounded-lg p-6 shadow-lg">
                    <h2 class="font-bold text-xl mb-4">STEP <span class="text-green-600">05</span></h2>
                    <div class="flex justify-center mb-4">
                        {{-- <svg class="w-24 h-24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                            <path d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                        </svg> --}}
                        <svg
                        class="w-24 h-24"
                        fill="#000000" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 56 56" xml:space="preserve"><g id="SVGRepo_bgCarrier" stroke-width="1"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <g> </g> <g> <path d="M12,24c3.309,0,6-2.691,6-6s-2.691-6-6-6s-6,2.691-6,6S8.691,24,12,24z M12,14c2.206,0,4,1.794,4,4s-1.794,4-4,4 s-4-1.794-4-4S9.794,14,12,14z"></path> <path d="M44,24c3.309,0,6-2.691,6-6s-2.691-6-6-6s-6,2.691-6,6S40.691,24,44,24z M44,14c2.206,0,4,1.794,4,4s-1.794,4-4,4 s-4-1.794-4-4S41.794,14,44,14z"></path> <path d="M54,26v13c0,1.654-1.346,3-3,3V31c0-2.757-2.243-5-5-5h-5c-0.552,0-1,0.448-1,1v4v1v1h-8c-0.552,0-1,0.448-1,1v3h-6v-3 c0-0.552-0.448-1-1-1h-8v-1v-1v-4c0-0.552-0.448-1-1-1h-5c-2.757,0-5,2.243-5,5v11c-1.654,0-3-1.346-3-3V26H0v13 c0,2.045,1.237,3.802,3,4.576V56h2V44h1h1h8v11c0,0.552,0.448,1,1,1h3h1h1v-1V40v-1h3h8h3v1v15v1h1h1h3c0.552,0,1-0.448,1-1V44h8 h1h1v12h2V43.576c1.763-0.774,3-2.531,3-4.576V26H54z M20,37h-2h-6v-6h-2v7c0,0.552,0.448,1,1,1h7c0.551,0,1,0.449,1,1v14h-2V43 c0-0.552-0.448-1-1-1H7V31c0-1.654,1.346-3,3-3h4v3v1v2c0,0.552,0.448,1,1,1h8v2H20z M40,42c-0.552,0-1,0.448-1,1v11h-2V40 c0-0.551,0.449-1,1-1h7c0.552,0,1-0.448,1-1v-7h-2v6h-6h-2h-3v-2h8c0.552,0,1-0.448,1-1v-2v-1v-3h4c1.654,0,3,1.346,3,3v11H40z"></path> <path d="M19,10v3c0,0.431,0.275,0.812,0.684,0.949C19.788,13.983,19.895,14,20,14c0.309,0,0.607-0.144,0.8-0.4l2.7-3.6H31 c1.654,0,3-1.346,3-3V3c0-1.654-1.346-3-3-3H19c-1.654,0-3,1.346-3,3v4C16,8.654,17.346,10,19,10z M18,3c0-0.551,0.449-1,1-1h12 c0.551,0,1,0.449,1,1v4c0,0.551-0.449,1-1,1h-8c-0.315,0-0.611,0.148-0.8,0.4L21,10V9c0-0.552-0.448-1-1-1h-1 c-0.551,0-1-0.449-1-1V3z"></path> <rect x="20" y="4" width="10" height="2"></rect> <rect x="27" y="25" width="6" height="2"></rect> <path d="M26,21c-1.654,0-3,1.346-3,3v4c0,1.654,1.346,3,3,3h8c1.654,0,3-1.346,3-3v-0.697l1.832-2.748 c0.205-0.307,0.224-0.701,0.05-1.026C38.708,23.203,38.369,23,38,23h-1.171c-0.413-1.164-1.525-2-2.829-2H26z M35,24 c0,0.552,0.448,1,1,1h0.131l-0.963,1.445C35.059,26.609,35,26.803,35,27v1c0,0.551-0.449,1-1,1h-8c-0.551,0-1-0.449-1-1v-4 c0-0.551,0.449-1,1-1h8C34.551,23,35,23.449,35,24z"></path> <rect x="23" y="16" width="2" height="2"></rect> <rect x="27" y="16" width="2" height="2"></rect> <rect x="31" y="16" width="2" height="2"></rect> </g> </g> </g></svg>
                    </div>
                    <h3 class="text-xl font-bold mb-2">{{ __('Interviews and exams') }}</h3>
                    <p class="text-sm">{{ __('We will arrange an interview date between the job seeker and the company to which they are applying. After arranging the schedule, the interview and employment test will be conducted.') }}</p>
                </div>
                <!-- Step 04 -->
                <div class="bg-white rounded-lg p-6 shadow-lg">
                    <h2 class="font-bold text-xl mb-4">STEP <span class="text-green-600">06</span></h2>
                    <div class="flex justify-center mb-4">
                        {{-- <svg class="w-24 h-24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                            <path d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                        </svg> --}}

                        <svg
                        class="w-24 h-24"
                        fill="#000000" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 47 47" xml:space="preserve"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <g id="Layer_1_33_"> <g> <path d="M9.702,33.114H3.292c-1.18,0-2.136,0.956-2.136,2.136v9.614c0,1.18,0.957,2.136,2.136,2.136h6.409 c1.18,0,2.137-0.957,2.137-2.136V35.25C11.838,34.07,10.881,33.114,9.702,33.114z"></path> <path d="M26.266,25.636h-6.409c-1.18,0-2.136,0.957-2.136,2.138v17.091c0,1.18,0.957,2.136,2.136,2.136h6.409 c1.18,0,2.137-0.957,2.137-2.136V27.773C28.403,26.593,27.446,25.636,26.266,25.636z"></path> <path d="M42.833,17.091h-6.409c-1.18,0-2.137,0.957-2.137,2.136v25.637c0,1.18,0.957,2.136,2.137,2.136h6.409 c1.18,0,2.137-0.957,2.137-2.136V19.227C44.969,18.047,44.014,17.091,42.833,17.091z"></path> <circle cx="39.628" cy="1.521" r="1.521"></circle> <path d="M45.671,1.028c-0.282-0.379-0.819-0.456-1.198-0.172l-3.486,2.61h-0.551c-0.235,0-0.44,0.102-0.595,0.257l0.399,2.928 L39.628,7.17l-0.612-0.519l0.399-2.928c-0.155-0.155-0.358-0.257-0.595-0.257H38.27l-3.485-2.61 c-0.378-0.284-0.916-0.207-1.199,0.172c-0.284,0.379-0.207,0.916,0.172,1.199l3.716,2.781c0.143,0.107,0.313,0.166,0.491,0.17 v3.868l-1.582,5.536c-0.13,0.455,0.134,0.93,0.589,1.06c0.077,0.022,0.157,0.033,0.235,0.033c0.373,0,0.716-0.246,0.823-0.622 l1.598-5.594l1.598,5.594c0.107,0.376,0.451,0.622,0.824,0.622c0.078,0,0.158-0.011,0.236-0.033 c0.455-0.13,0.718-0.604,0.588-1.06l-1.582-5.536V5.179c0.178-0.004,0.35-0.063,0.492-0.17L45.5,2.227 C45.877,1.943,45.957,1.407,45.671,1.028z"></path> </g> </g> </g> </g></svg>
                    </div>
                    <h3 class="text-xl font-bold mb-2">{{ __('Joining the company') }}</h3>
                    <p class="text-sm">.</p>
                </div>
            </div>
        </div>



        <div class="bg-sky-400 min-h-screen p-8">
            <h1 class="mt-8 mb-5 text-center text-white text-4xl font-bold gsap-reveal">
                {{ __('Question and answer') }}
            </h1>

            <div class=" max-w-7xl mx-auto mt-10">
                {{-- <div id="qa" class="rounded-3xl bg-gray-100 py-10"> --}}
                    <h2 class="text-white text-3xl font-semibold text-center mb-6 gsap-reveal py-5">よくあるご質問</h2>




                    <div class="max-w-4xl mx-auto bg-white p-6 rounded-3xl shadow-lg mb-5 gsap-reveal">


                      <div class="relative space-y-8">
                          <div class="flex items-start space-x-4">
                              <div class="flex-shrink-0">
                                  <div class="w-8 h-8 rounded-full bg-blue-600 flex items-center justify-center text-white font-bold">
                                      Q
                                  </div>
                              </div>
                              <div class="flex-grow justify-between">
                                  <h3 class="text-lg font-semibold text-gray-900">{{ __('Is there a cost associated with using the service?') }}</h3>
                              </div>


                          </div>

                          <!-- Divider line -->
                          <hr class="border-gray-200">

                          <div class="flex items-start">
                            <div class="flex-shrink-0">
                                <div class="w-8 h-8 rounded-full bg-green-400 flex items-center justify-center text-white font-bold">
                                    A
                                </div>
                            </div>

                            <div class="flex-grow justify-between text-content mt-2 px-4">


                                <p class="text-gray-700 text-m">
                               {{ __('Job seekers can use this service free of charge.') }}
                                </p>
                            </div>

                          </div>




                      </div>
                  </div>


                    <div class="max-w-4xl mx-auto bg-white p-6 rounded-3xl shadow-lg mb-5 gsap-reveal2">
                      <div class="relative space-y-8">
                          <div class="flex items-start space-x-4">
                              <div class="flex-shrink-0">
                                  <div class="w-8 h-8 rounded-full bg-blue-600 flex items-center justify-center text-white font-bold">
                                      Q
                                  </div>
                              </div>
                              <div class="flex-grow justify-between">
                                  <h3 class="text-lg font-semibold text-gray-900">{{ __('Can applicants select multiple companies?') }}</h3>
                              </div>


                          </div>

                          <!-- Divider line -->
                          <hr class="border-gray-200">

                          <div class="flex items-start">
                            <div class="flex-shrink-0">
                                <div class="w-8 h-8 rounded-full bg-green-400 flex items-center justify-center text-white font-bold">
                                    A
                                </div>
                            </div>

                            <div class="flex-grow justify-between text-content mt-2 px-4">


                              <p class="text-gray-700 text-m">
                                  {{ __('Yes, you can apply to multiple companies. Our career advisors will provide detailed support.') }}
                              </p>
                          </div>
                      </div>
                    </div>
                  </div>

                  <!--3-->
                    <div class="max-w-4xl mx-auto bg-white p-6 rounded-3xl shadow-lg mb-5 gsap-reveal">
                      <div class="relative space-y-8">
                          <div class="flex items-start space-x-4">
                              <div class="flex-shrink-0">
                                  <div class="w-8 h-8 rounded-full bg-blue-600 flex items-center justify-center text-white font-bold">
                                      Q
                                  </div>
                              </div>
                              <div class="flex-grow justify-between">
                                  <h3 class="text-lg font-semibold text-gray-900">{{ __('How are interviews with career advisors conducted?') }}</h3>
                              </div>


                          </div>

                          <!-- Divider line -->
                          <hr class="border-gray-200">
                          <div class="flex items-start">
                            <div class="flex-shrink-0">
                                <div class="w-8 h-8 rounded-full bg-green-400 flex items-center justify-center text-white font-bold">
                                    A
                                </div>
                            </div>

                            <div class="flex-grow justify-between text-content mt-2 px-4">




                              <p class="text-gray-700 text-m">
                             {{ __('Interviews are conducted either online or in person, with scheduling arranged to accommodate the job seekers availability.') }}
                              </p>
                          </div>
                          </div>
                      </div>
                  </div>
                  <!--4-->
                    <div class="max-w-4xl mx-auto bg-white p-6 rounded-3xl shadow-lg mb-5 gsap-reveal2">
                      <div class="relative space-y-8">
                          <div class="flex items-start space-x-4">
                              <div class="flex-shrink-0">
                                  <div class="w-8 h-8 rounded-full bg-blue-600 flex items-center justify-center text-white font-bold">
                                      Q
                                  </div>
                              </div>
                              <div class="flex-grow justify-between">
                                  <h3 class="text-lg font-semibold text-gray-900">{{ __('How long does it take to receive the selection results after applying?') }}</h3>
                              </div>


                          </div>

                          <!-- Divider line -->
                          <hr class="border-gray-200">

                          <div class="flex items-start">
                            <div class="flex-shrink-0">
                                <div class="w-8 h-8 rounded-full bg-green-400 flex items-center justify-center text-white font-bold">
                                    A
                                </div>
                            </div>

                            <div class="flex-grow justify-between text-content mt-2 px-4">
                              <p class="text-gray-700 text-m">
                             {{ __('Typically, the selection process takes about 1 to 2 weeks, but this may vary depending on the company.') }}
                              </p>
                          </div>
                          </div>
                      </div>
                  </div>

                  <!--5-->
                    <div class="max-w-4xl mx-auto bg-white p-6 rounded-3xl shadow-lg mb-5 gsap-reveal">
                      <div class="relative space-y-8">
                          <div class="flex items-start space-x-4">
                              <div class="flex-shrink-0">
                                  <div class="w-8 h-8 rounded-full bg-blue-600 flex items-center justify-center text-white font-bold">
                                      Q
                                  </div>
                              </div>
                              <div class="flex-grow justify-between">
                                  <h3 class="text-lg font-semibold text-gray-900">{{ __('What is the fee structure upon successful hiring?') }}</h3>
                              </div>


                          </div>

                          <!-- Divider line -->
                          <hr class="border-gray-200">

                          <div class="flex items-start">
                            <div class="flex-shrink-0">
                                <div class="w-8 h-8 rounded-full bg-green-400 flex items-center justify-center text-white font-bold">
                                    A
                                </div>
                            </div>

                            <div class="flex-grow justify-between text-content mt-2 px-4">
                              <p class="text-gray-700 text-m">
                             {{ __('We charge a success fee only upon a successful hire, and the detailed fee structure will be provided at the time of contract.') }}
                              </p>
                          </div>
                          </div>
                      </div>
                  </div>

                  <!--6-->
                    <div class="max-w-4xl mx-auto bg-white p-6 rounded-3xl shadow-lg mb-5 gsap-reveal2">
                      <div class="relative space-y-8">
                          <div class="flex items-start space-x-4">
                              <div class="flex-shrink-0">
                                  <div class="w-8 h-8 rounded-full bg-blue-600 flex items-center justify-center text-white font-bold">
                                      Q
                                  </div>
                              </div>
                              <div class="flex-grow justify-between">
                                  <h3 class="text-lg font-semibold text-gray-900">{{ __('Is there an opportunity to speak directly with job seekers before they apply?') }}</h3>
                              </div>

                          </div>

                          <!-- Divider line -->
                          <hr class="border-gray-200">

                          <div class="flex items-start">
                            <div class="flex-shrink-0">
                                <div class="w-8 h-8 rounded-full bg-green-400 flex items-center justify-center text-white font-bold">
                                    A
                                </div>
                            </div>

                            <div class="flex-grow justify-between text-content mt-2 px-4">
                              <p class="text-gray-700 text-m">
                             {{ __('Yes, it is possible to arrange an online meeting with the job seeker prior to the interview. Please consult with us as needed.') }}
                              </p>
                          </div>
                          </div>
                      </div>
                  </div>

                  <!--7-->
                    <div class="max-w-4xl mx-auto bg-white p-6 rounded-3xl shadow-lg mb-5 gsap-reveal">
                      <div class="relative space-y-8">
                          <div class="flex items-start space-x-4">
                              <div class="flex-shrink-0">
                                  <div class="w-8 h-8 rounded-full bg-blue-600 flex items-center justify-center text-white font-bold">
                                      Q
                                  </div>
                              </div>
                              <div class="flex-grow justify-between">
                                  <h3 class="text-lg font-semibold text-gray-900">{{ __('Is support available for obtaining a VISA?') }}</h3>
                              </div>


                          </div>

                          <!-- Divider line -->
                          <hr class="border-gray-200">

                          <div class="flex items-start">
                            <div class="flex-shrink-0">
                                <div class="w-8 h-8 rounded-full bg-green-400 flex items-center justify-center text-white font-bold">
                                    A
                                </div>
                            </div>

                            <div class="flex-grow justify-between text-content mt-2 px-4">
                              <p class="text-gray-700 text-m">
                             {{ __('Yes, we provide information relevant to the position regarding obtaining a VISA and can refer you to a certified immigration specialist firm that we partner with. You can rely on professional support if needed.') }}
                              </p>
                          </div>
                          </div>
                      </div>
                  </div>



                </div>

            </div>
        </div>





    </div>

        </div>
        </div>
        </div>
        </div>
        <div id="contact" class="relative bg-cover bg-center min-h-[24rem] border-t-4 border-green-600">
            <div class="absolute inset-0 bg-sky-900 bg-opacity-80">
                <div class="container mx-auto px-4 h-full flex flex-col md:flex-row items-center justify-between py-12 md:py-0">
                    <!-- Text Section -->
                    <div class="text-center md:text-left mb-8 md:mb-0 md:ml-20">
                        <h1 class="text-3xl md:text-4xl text-white font-bold mb-4">{{ __('Contact') }}</h1>
                        <p class="text-lg md:text-xl font-semibold text-white">{{ __('Please feel free to contact us here') }}</p>
                    </div>

                    <!-- Button Section -->
                    <div class="md:mr-20">

                        <button type="button"
                        onclick="openContactModal()"
                        class="inline-block px-12 py-6 bg-sky-600 hover:bg-sky-700 shadow-lg rounded-lg text-2xl text-white font-semibold transition duration-300 transform hover:scale-105">
                        {{ __('Contact Us') }}
                        </button>



                         <!-- Modal -->
                                    <div id="contactModal"
                                    class="hidden fixed inset-0 bg-black bg-opacity-90 overflow-y-auto h-full w-full z-50">
                                <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-lg bg-white">
                                    <div class="mt-3 text-center">
                                        <h3 class="text-2xl font-semibold text-gray-700 mb-6">お問い合わせ</h3>
                                        <div class="space-y-4">
                                            <a href="{{ route('contact') }}"
                                                class="block w-full px-6 py-4 bg-sky-600 text-white rounded-lg hover:bg-sky-700 transition duration-200">
                                                求職者様お問い合わせ
                                            </a>
                                            <a href="{{ route('contact2') }}"
                                                class="block w-full px-6 py-4 bg-sky-600 text-white rounded-lg hover:bg-sky-700 transition duration-200">
                                                企業様お問い合わせ
                                            </a>
                                        </div>
                                        <button onclick="closeContactModal()"
                                                class="mt-4 px-4 py-2 text-red-500 hover:text-red-700">
                                         閉じる
                                        </button>
                                    </div>
                                </div>
                                </div>



                        {{-- <a href="{{ route('contact') }}" class="inline-block px-12 py-6 bg-sky-600 hover:bg-sky-700 shadow-lg rounded-lg text-2xl text-white font-semibold transition duration-300 transform hover:scale-105"> --}}

                        </a>
                    </div>
                </div>
            </div>
        </div>
    <footer>
        <div class="w-auto bg-white flex-justify-center text-gray-800 text-sm font-semibold text-center py-5">
            Copyright © Taisei Hds 2024. All Rights Reserved.
        </div>
    </footer>

 <div>

 </div>
</body>
<script>

// document.addEventListener('DOMContentLoaded', () => {
//     gsap.registerPlugin(ScrollTrigger);

//     // Select all cards
//     const cards = document.querySelectorAll('.card');

//     cards.forEach((card, index) => {
//         // Create animation for each card
//         gsap.from(card, {
//             rotationY: 90,
//             opacity: 0,
//             duration: 1,
//             ease: "power2.out",
//             delay: index * 0.2, // Sequential delay for each card

//             scrollTrigger: {
//                 trigger: card,
//                 start: "top bottom-=100",
//                 toggleActions: "play none none reverse"
//             }
//         });
//     });
// });
    // Initialize all animations when document is ready
// document.addEventListener("DOMContentLoaded", function(){
//     const menuToggle=document.getElementById("menuToggle");
//     const closeMenu=document.getElementById("closeMenu");
//     const mobileMenu=document.getElementById("mobileMenu");


//     if(menuToggle && closeMenu && mobileMenu){
//         menuToggle.addEventListener("click", ()=>{
//             mobileMenu.classList.remove("hidden");
//             mobileMenu.classList.remove("translate-x-full");

//         });

//         closeMenu.addEventListener("click",()=>{
//             mobileMenu.classList.add("translate-x-full");
//             setTimeout(() =>mobileMenu.classList.add("hidden"),300);
//         });

//         document.querySelectorAll(".mobile-link").forEach(link=>{
//             link.addEventListener("click", () => {
//                 mobileMenu.classList.add("translate-x-full");
//                 setTimeout(() => mobileMenu.classList.add("hidden"), 300);
//             });
//         });

//     }
// });



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





window.addEventListener('DOMContentLoaded', () => {
    // 1. Original gsap-reveal animations
    gsap.utils.toArray('.gsap-reveal2').forEach(element => {
        gsap.from(element, {
            y: 100,
            opacity: 0,
            duration: 1.5,
            scrollTrigger: {
                trigger: element,
                start: 'top 70%',
                end: 'bottom 30%',
                toggleActions: 'play none none reverse'
            }
        });
    });

       // 1. Original gsap-reveal animations
       gsap.utils.toArray('.gsap-reveal').forEach(element => {
        gsap.from(element, {
            y: 50,
            opacity: 0,
            duration: 1,
            scrollTrigger: {
                trigger: element,
                start: 'top 80%',
                end: 'bottom 20%',
                toggleActions: 'play none none reverse'
            }
        });
    });




    });


    function openContactModal(){
        document.getElementById('contactModal').classList.remove('hidden');
    }
    function closeContactModal(){
        document.getElementById('contactModal').classList.add('hidden');
    }



    window.onclick=function(event){
        let modal=document.getElementById('contactModal');
        if(event.target ==modal){
            closeContactModal();
        }
    }


</script>
</html>

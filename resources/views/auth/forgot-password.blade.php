



<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>




    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/SplitText.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.4/TextPlugin.min.js"></script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>JP Jobs</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<div class="min-h-screen bg-gradient-to-r from-sky-600 to-orange-200 text-gray-900 flex justify-center">


    <div class="bg-white mt-24 mb-24 rounded-2xl px-20 py-5">

        <div>
            <div>
                <img src="{{ asset('images/1.png') }}"
                    class="w-mx-auto" />
            </div>
            <div class="mt-12 flex flex-col items-center">
                <div class="w-full flex-1 mt-8">

                    <h1 class="mb-5 font-semibold">{{ __('Recruitment System ') }}</h1>




                    <form method="POST" action="{{ route('password.email') }}">
                    @csrf


                    <div class="w-mx-md max-w-sm">
                        <input
                            class="w-full px-8 py-4 rounded-lg font-medium bg-gray-100 border border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:border-gray-400 focus:bg-white"
                           id="email" type="email" name="email" placeholder="Email" />


                           <h1 class="mt-2 mb-2 font-semibold text-xs px-2">{{ __('Please enter your email address ') }}</h1>




                        <button
                            class="mt-5 tracking-wide font-semibold bg-blue-400 text-white-500 w-full py-4 rounded-lg hover:bg-blue-700 transition-all duration-300 ease-in-out flex items-center justify-center focus:shadow-outline focus:outline-none">
                            <svg class="w-6 h-6 -ml-2" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path d="M16 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2" />
                                <circle cx="8.5" cy="7" r="4" />
                                <path d="M20 8v6M23 11h-6" />
                            </svg>
                            <span class="ml-">
                               {{ __('Reset Link') }}
                            </span>
                        </button>
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        <x-auth-session-status class="mb-4" :status="session('status')" />


                    </div>


                </form>

                </div>
            </div>
        </div>

    </div>
</div>

</html>


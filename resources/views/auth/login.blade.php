

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
@endif

<div class="min-h-screen bg-gradient-to-r from-sky-600 to-orange-200 text-gray-900 flex justify-center">
    <div class="bg-white mt-24 mb-24 rounded-2xl px-20 py-5">



        <div >
            <div>
                {{-- <img src="https://drive.google.com/uc?export=view&id=1MFiKAExRFF0-2YNpAZzIu1Sh52J8r16v"
                    class="w-mx-auto" /> --}}
            </div>
            <div class="mt-12 flex flex-col items-center">
                <div class="w-full flex-1 mt-8">



                    <h1 class="mb-5 font-semibold text-xl">人材紹介システム</h1>



                <form method="POST" action="{{ route('login') }}">
                    @csrf


                    <div class="mx-auto max-w-xs">
                        <input
                            class="w-full px-8 py-4 rounded-lg font-medium bg-gray-100 border border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:border-gray-400 focus:bg-white"
                           id="email" type="email" name="email" placeholder="Email" />
                        <input
                            class="w-full px-8 py-4 rounded-lg font-medium bg-gray-100 border border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:border-gray-400 focus:bg-white mt-5"
                            id="password" name="password" type="password" placeholder="Password" />



                        <div class="mt-5">
                            @if (Route::has('password.request'))
                            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                                パスワードをお忘れですか？
                            </a>
                        @endif
                        </div>
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />


                        <button
                            class="mt-5 tracking-wide font-semibold bg-blue-400 text-white-500 w-full py-4 rounded-lg hover:bg-blue-700 transition-all duration-300 ease-in-out flex items-center justify-center focus:shadow-outline focus:outline-none hover:text-white">
                            <svg class="w-6 h-6 -ml-2" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path d="M16 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2" />
                                <circle cx="8.5" cy="7" r="4" />
                                <path d="M20 8v6M23 11h-6" />
                            </svg>
                            <span class="ml-2 ">
                              ログイン
                            </span>
                        </button>


                    </div>

                </form>
                <div class="mt-10">
                    <a href="{{ route('home') }}"
                       class="inline-flex items-center px-6 py-2 text-gray-50 hover:text-white bg-gray-600 hover:bg-gray-800 rounded-lg font-semibold text-lg shadow-md transition ease-in-out duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5 mr-2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                        </svg>
                        戻り
                    </a>
                </div>


                </div>
            </div>
        </div>

    </div>
</div>

</html>

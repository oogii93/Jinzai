<x-app-layout>

    @if (session('status') || session('error'))
    <div id="statusToast" class="fixed top-16 left-1/2 transform -translate-x-1/2 z-50 w-full max-w-md">
        <div class="bg-gray-100 border-l-4 @if(session('status')) border-blue-500 @else border-red-500 @endif rounded-r-lg shadow-md overflow-hidden">
            <div class="p-4 flex items-center">
                <div class="flex-shrink-0">
                    @if (session('status'))
                        <svg class="w-6 h-6 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    @else
                        <svg class="w-6 h-6 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    @endif
                </div>
                <div class="ml-3 w-0 flex-1">
                    @if (session('status'))
                        <p class="text-lg font-semibold text-blue-900">
                            {!! session('status') !!}
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



<head>



    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/SplitText.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.4/TextPlugin.min.js"></script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>




<div class="max-w-4xl mx-auto bg-white shadow-lg rounded-lg overflow-hidden">
    <!-- Form Header -->
    <div class="bg-gradient-to-r from-sky-500 to-sky-700 py-6 px-8">
        <h2 class="text-2xl font-bold text-white">履歴書</h2>
        <p class="text-sky-100 mt-2"></p>
    </div>

    <!-- Main Form -->
    <form class="p-8" method="POST" action="{{ route('jobseeker.profile.update') }}" enctype="multipart/form-data">

        @csrf
        @method('PUT')
        <!-- Top Section with Image Upload -->
        <div class="flex flex-wrap gap-8 mb-8">
            <div class="flex-1 space-y-6">
                <!-- Furigana Input -->
                <div class="space-y-2">
                    <label class="block text-sm font-semibold text-gray-700">ふりがな</label>
                    <input type="text"
                           name="furigana"
                           id="furigana"
                           class="w-full px-4 py-2 border border-gray-300 rounded-md"
                           value="{{ old('furigana',$user->furigana) }}"
                        >


                </div>

                <!-- Name Input -->
                <div class="space-y-2">
                    <label class="block text-sm font-semibold text-gray-700">氏名</label>
                    <input type="text"
                           name="name"
                            id="name"
                            value="{{ old('name',$user->name) }}"
                           class="w-full px-4 py-2 border border-gray-300 rounded-md "
                       >


                </div>
            </div>


            <div class="w-48">
                <div class="text-sm font-semibold text-gray-700 mb-2">プロフィール写真</div>
                <div class="border-2 border-dashed border-gray-300 rounded-lg p-4 text-center hover:border-sky-500 transition-colors cursor-pointer">
                    <label for="imageUpload" class="cursor-pointer">
                        <div class="w-40 h-40 bg-gray-200 flex items-center justify-center rounded-md overflow-hidden">
                            <img id="selectedImage" alt="Selected Image"
                                 class="{{ $user->profile_image ? 'block w-40 h-40 object-cover' : 'hidden w-40 h-40 object-cover' }}"
                                 src="{{ $user->profile_image ? Storage::url($user->profile_image) : '' }}">
                            <span class="text-gray-500 {{ $user->profile_image ? 'hidden' : '' }}" id="placeholderText">写真選択</span>
                        </div>
                    </label>
                    <input type="file" id="imageUpload" name="profile_image" class="hidden" accept="image/*">
                </div>
            </div>
        </div>

    <!-- Birth Date and Gender Section -->
<div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
    <div class="space-y-2">
        <label class="block text-sm font-semibold text-gray-700">生年月日</label>
        <div class="grid grid-cols-3 gap-2">
            <select name="year" class="px-3 py-2 border border-gray-300 rounded-md">
                <option value="">年</option>
                @for($i = date('Y'); $i >= 1950; $i--)
                    <option value="{{ $i }}"
                        {{ $user->date_of_birth && explode('-', $user->date_of_birth)[0] == $i ? 'selected' : '' }}>
                        {{ $i }}
                    </option>
                @endfor
            </select>
            <select name="month" class="px-3 py-2 border border-gray-300 rounded-md">
                <option value="">月</option>
                @foreach(range(1, 12) as $month)
                    <option value="{{ $month }}"
                        {{ $user->date_of_birth && explode('-', $user->date_of_birth)[1] == $month ? 'selected' : '' }}>
                        {{ __($month . '月') }}
                    </option>
                @endforeach
            </select>
            <select name="day" class="px-3 py-2 border border-gray-300 rounded-md">
                <option value="">日</option>
                @foreach(range(1, 31) as $day)
                    <option value="{{ $day }}"
                        {{ $user->date_of_birth && (int)explode('-', $user->date_of_birth)[2] == $day ? 'selected' : '' }}>
                        {{ $day }}
                    </option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="space-y-2">
        <label class="block text-sm font-semibold text-gray-700">性別</label>
        <select name="gender" class="w-full px-3 py-2 border border-gray-300 rounded-md">
            <option value="">性別選択</option>
            <option value="male" {{ old('gender', $user->gender ?? '') == 'male' ? 'selected' : '' }}>男性</option>
            <option value="female" {{ old('gender', $user->gender ?? '') == 'female' ? 'selected' : '' }}>女性</option>
        </select>
    </div>
</div>

        <div class="mt-4 hidden">
            <label for="role">Role</label>
            <select id="role" name="role" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm">
                <option value="jobseeker" selected>Job Seeker</option>
                <option value="company">Company</option>
            </select>
        </div>


        <!-- Contact Information -->
        <div class="space-y-6">
            <div class="space-y-2">
                <label class="block text-sm font-semibold text-gray-700">住所</label>
                <input type="text"
                       name="address"
                       id="address"
                       value="{{ old('address',$user->address) }}"
                       class="w-full px-4 py-2 border border-gray-300 rounded-md "
                       placeholder="在住所を入力してください。">


            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="space-y-2">
                    <label class="block text-sm font-semibold text-gray-700">電話番号</label>
                    <input type="tel"
                           name="phone_number"
                           id="phone_number"
                           value="{{ old('phone_number',$user->phone_number) }}"
                           class="w-full px-4 py-2 border border-gray-300 rounded-md "
                           placeholder="電話番号を入力してください。" >


                </div>

                <div class="space-y-2">
                    <label class="block text-sm font-semibold text-gray-700">携帯電話番号</label>
                    <input type="tel"
                           name="mobile_number"
                           id="mobile_number"
                           value="{{ old('mobile_number',$user->mobile_number) }}"
                           class="w-full px-4 py-2 border border-gray-300 rounded-md "
                           placeholder="携帯電話番号を入力してください。" >


                </div>
            </div>

            <div class="space-y-2">
                <label class="block text-sm font-semibold text-gray-700">メールアドレス</label>
                <input type="email"
                       name="email"
                       id="email"
                       value="{{ old('email', $user->email) }}"
                       class="w-full px-4 py-2 border border-gray-300 rounded-md "
                       placeholder="メールアドレスを入力してください。" >


            </div>
        </div>

<!--dfadfds-->
        {{-- <div class="space-y-2 mt-4">
            <label class="block text-sm font-semibold text-gray-700">学歴</label>

            <div class="grid grid-cols-4 gap-2 education-row" id="row-1">
                <select
                    name="education_year_1"
                    class="px-4 py-2 border border-gray-300 rounded-md "
                >
                    <option value="">年</option>
                    @for($i = date('Y'); $i >= 1950; $i--)
                        <option value="{{ $i }}">{{ $i }}</option>
                    @endfor
                </select>

                <select
                    name="education_month_1"
                    class="px-4 py-2 border border-gray-300 rounded-md "
                >
                    <option value="">月</option>
                    @foreach(range(1, 12) as $month)
                        <option value="{{ $month }}">{{ __($month . '月') }}</option>
                    @endforeach
                </select>

                <input
                    type="text"
                    name="education_school_1"
                    placeholder="学校名"
                    class="px-4 py-2 border border-gray-300 rounded-md "
                >

                <select
                name="education_startEnd_1"
                class="px-4 py-2 border border-gray-300 rounded-md "
            >
                <option value="" disabled selected class="">選択</option>

                <option value="入学">入学</option>
                <option value="卒業">卒業</option>
                <option value="入社">入社</option>
                <option value="退社">退社</option>
                <option value="退学">退学</option>
            </select>






                    @error('education_school_1')
                    <p class="text-red-300 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>





            <div class="grid grid-cols-4 gap-2 education-row" id="row-2">
                <select
                    name="education_year_2"
                    class="px-4 py-2 border border-gray-300 rounded-md "
                >
                    <option value="">年</option>
                    @for($i = date('Y'); $i >= 1950; $i--)
                        <option value="{{ $i }}">{{ $i }}</option>
                    @endfor
                </select>

                <select
                    name="education_month_2"
                    class="px-4 py-2 border border-gray-300 rounded-md "
                >
                    <option value="">月</option>
                    @foreach(range(1, 12) as $month)
                        <option value="{{ $month }}">{{ __($month . '月') }}</option>
                    @endforeach
                </select>

                <input
                    type="text"
                    name="education_school_2"
                    placeholder="学校名"
                    value="{{ old('education_school_2') }}"
                    class="px-4 py-2 border border-gray-300 rounded-md "
                >


                <select
                name="education_startEnd_2"
                class="px-4 py-2 border border-gray-300 rounded-md "
            >
                <option value="" disabled selected class="">選択</option>

                <option value="入学">入学</option>
                <option value="卒業">卒業</option>
                <option value="入社">入社</option>
                <option value="退社">退社</option>
                <option value="退学">退学</option>
            </select>

                    @error('education_school_2')
                    <p class="text-red-300 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="grid grid-cols-4 gap-2 education-row" id="row-3" >
                <select
                    name="education_year_3"
                    class="px-4 py-2 border border-gray-300 rounded-md "
                >
                    <option value="">年</option>
                    @for($i = date('Y'); $i >= 1950; $i--)
                        <option value="{{ $i }}">{{ $i }}</option>
                    @endfor
                </select>

                <select
                    name="education_month_3"
                    class="px-4 py-2 border border-gray-300 rounded-md "
                >
                    <option value="">月</option>
                    @foreach(range(1, 12) as $month)
                        <option value="{{ $month }}">{{ __($month . '月') }}</option>
                    @endforeach
                </select>

                <input
                    type="text"
                    name="education_school_3"
                    placeholder="学校名"
                    class="px-4 py-2 border border-gray-300 rounded-md "
                >

                <select
                name="education_startEnd_3"
                class="px-4 py-2 border border-gray-300 rounded-md "
            >
                <option value="" disabled selected class="">選択</option>

                <option value="入学">入学</option>
                <option value="卒業">卒業</option>
                <option value="入社">入社</option>
                <option value="退社">退社</option>
                <option value="退学">退学</option>
            </select>



                    @error('education_school_3')
                    <p class="text-red-300 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="grid grid-cols-4 gap-2 education-row" id="row-4" style="display: none;">
                <select
                    name="education_year_4"
                    class="px-4 py-2 border border-gray-300 rounded-md "
                >
                    <option value="">年</option>
                    @for($i = date('Y'); $i >= 1950; $i--)
                        <option value="{{ $i }}">{{ $i }}</option>
                    @endfor
                </select>

                <select
                    name="education_month_4"
                    class="px-4 py-2 border border-gray-300 rounded-md "
                >
                    <option value="">月</option>
                    @foreach(range(1, 12) as $month)
                        <option value="{{ $month }}">{{ __($month . '月') }}</option>
                    @endforeach
                </select>

                <input
                    type="text"
                    name="education_school_4"
                    placeholder="学校名"
                    class="px-4 py-2 border border-gray-300 rounded-md "
                >

                <select
                name="education_startEnd_4"
                class="px-4 py-2 border border-gray-300 rounded-md "
            >
                <option value="" disabled selected class="">選択</option>

                <option value="入学">入学</option>
                <option value="卒業">卒業</option>
                <option value="入社">入社</option>
                <option value="退社">退社</option>
                <option value="退学">退学</option>
            </select>



                    @error('education_school_4')
                    <p class="text-red-300 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="grid grid-cols-4 gap-2 education-row" id="row-5" style="display: none;">
                <select
                    name="education_year_5"
                    class="px-4 py-2 border border-gray-300 rounded-md "
                >
                    <option value="">年</option>
                    @for($i = date('Y'); $i >= 1950; $i--)
                        <option value="{{ $i }}">{{ $i }}</option>
                    @endfor
                </select>

                <select
                    name="education_month_5"
                    class="px-4 py-2 border border-gray-300 rounded-md "
                >
                    <option value="">月</option>
                    @foreach(range(1, 12) as $month)
                        <option value="{{ $month }}">{{ __($month . '月') }}</option>
                    @endforeach
                </select>

                <input
                    type="text"
                    name="education_school_5"
                    placeholder="学校名"
                    class="px-4 py-2 border border-gray-300 rounded-md "
                >

                <select
                name="education_startEnd_5"
                class="px-4 py-2 border border-gray-300 rounded-md "
            >
                <option value="" disabled selected class="">選択</option>

                <option value="入学">入学</option>
                <option value="卒業">卒業</option>
                <option value="入社">入社</option>
                <option value="退社">退社</option>
                <option value="退学">退学</option>
            </select>



                    @error('education_school_5')
                    <p class="text-red-300 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="grid grid-cols-4 gap-2 education-row" id="row-6" style="display: none;">
                <select
                    name="education_year_6"
                    class="px-4 py-2 border border-gray-300 rounded-md "
                >
                    <option value="">年</option>
                    @for($i = date('Y'); $i >= 1950; $i--)
                        <option value="{{ $i }}">{{ $i }}</option>
                    @endfor
                </select>

                <select
                    name="education_month_6"
                    class="px-4 py-2 border border-gray-300 rounded-md "
                >
                    <option value="">月</option>
                    @foreach(range(1, 12) as $month)
                        <option value="{{ $month }}">{{ __($month . '月') }}</option>
                    @endforeach
                </select>

                <input
                    type="text"
                    name="education_school_6"
                    placeholder="学校名"
                    class="px-4 py-2 border border-gray-300 rounded-md "
                >

                <select
                name="education_startEnd_6"
                class="px-4 py-2 border border-gray-300 rounded-md "
            >
                <option value="" disabled selected class="">選択</option>

                <option value="入学">入学</option>
                <option value="卒業">卒業</option>
                <option value="入社">入社</option>
                <option value="退社">退社</option>
                <option value="退学">退学</option>
            </select>



                    @error('education_school_6')
                    <p class="text-red-300 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="grid grid-cols-4 gap-2 education-row" id="row-7" style="display: none;">
                <select
                    name="education_year_7"
                    class="px-4 py-2 border border-gray-300 rounded-md "
                >
                    <option value="">年</option>
                    @for($i = date('Y'); $i >= 1950; $i--)
                        <option value="{{ $i }}">{{ $i }}</option>
                    @endfor
                </select>

                <select
                    name="education_month_7"
                    class="px-4 py-2 border border-gray-300 rounded-md "
                >
                    <option value="">月</option>
                    @foreach(range(1, 12) as $month)
                        <option value="{{ $month }}">{{ __($month . '月') }}</option>
                    @endforeach
                </select>

                <input
                    type="text"
                    name="education_school_7"
                    placeholder="学校名"
                    class="px-4 py-2 border border-gray-300 rounded-md "
                >

                <select
                name="education_startEnd_7"
                class="px-4 py-2 border border-gray-300 rounded-md "
            >
                <option value="" disabled selected class="">選択</option>

                <option value="入学">入学</option>
                <option value="卒業">卒業</option>
                <option value="入社">入社</option>
                <option value="退社">退社</option>
                <option value="退学">退学</option>
            </select>



                    @error('education_school_7')
                    <p class="text-red-300 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="grid grid-cols-4 gap-2 education-row" id="row-8" style="display: none;">
                <select
                    name="education_year_8"
                    class="px-4 py-2 border border-gray-300 rounded-md "
                >
                    <option value="">年</option>
                    @for($i = date('Y'); $i >= 1950; $i--)
                        <option value="{{ $i }}">{{ $i }}</option>
                    @endfor
                </select>

                <select
                    name="education_month_8"
                    class="px-4 py-2 border border-gray-300 rounded-md "
                >
                    <option value="">月</option>
                    @foreach(range(1, 12) as $month)
                        <option value="{{ $month }}">{{ __($month . '月') }}</option>
                    @endforeach
                </select>

                <input
                    type="text"
                    name="education_school_8"
                    placeholder="学校名"
                    class="px-4 py-2 border border-gray-300 rounded-md "
                >

                <select
                name="education_startEnd_8"
                class="px-4 py-2 border border-gray-300 rounded-md "
            >
                <option value="" disabled selected class="">選択</option>

                <option value="入学">入学</option>
                <option value="卒業">卒業</option>
                <option value="入社">入社</option>
                <option value="退社">退社</option>
                <option value="退学">退学</option>
            </select>



                    @error('education_school_8')
                    <p class="text-red-300 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="grid grid-cols-4 gap-2 education-row" id="row-9" style="display: none;">
                <select
                    name="education_year_9"
                    class="px-4 py-2 border border-gray-300 rounded-md "
                >
                    <option value="">年</option>
                    @for($i = date('Y'); $i >= 1950; $i--)
                        <option value="{{ $i }}">{{ $i }}</option>
                    @endfor
                </select>

                <select
                    name="education_month_9"
                    class="px-4 py-2 border border-gray-300 rounded-md "
                >
                    <option value="">月</option>
                    @foreach(range(1, 12) as $month)
                        <option value="{{ $month }}">{{ __($month . '月') }}</option>
                    @endforeach
                </select>

                <input
                    type="text"
                    name="education_school_9"
                    placeholder="学校名"
                    class="px-4 py-2 border border-gray-300 rounded-md "
                >

                <select
                name="education_startEnd_9"
                class="px-4 py-2 border border-gray-300 rounded-md "
            >
                <option value="" disabled selected class="">選択</option>

                <option value="入学">入学</option>
                <option value="卒業">卒業</option>
                <option value="入社">入社</option>
                <option value="退社">退社</option>
                <option value="退学">退学</option>
            </select>



                    @error('education_school_9')
                    <p class="text-red-300 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="grid grid-cols-4 gap-2 education-row" id="row-10" style="display: none;">
                <select
                    name="education_year_10"
                    class="px-4 py-2 border border-gray-300 rounded-md "
                >
                    <option value="">年</option>
                    @for($i = date('Y'); $i >= 1950; $i--)
                        <option value="{{ $i }}">{{ $i }}</option>
                    @endfor
                </select>

                <select
                    name="education_month_10"
                    class="px-4 py-2 border border-gray-300 rounded-md "
                >
                    <option value="">月</option>
                    @foreach(range(1, 12) as $month)
                        <option value="{{ $month }}">{{ __($month . '月') }}</option>
                    @endforeach
                </select>

                <input
                    type="text"
                    name="education_school_10"
                    placeholder="学校名"
                    class="px-4 py-2 border border-gray-300 rounded-md "
                >

                <select
                name="education_startEnd_10"
                class="px-4 py-2 border border-gray-300 rounded-md "
            >
                <option value="" disabled selected class="">選択</option>

                <option value="入学">入学</option>
                <option value="卒業">卒業</option>
                <option value="入社">入社</option>
                <option value="退社">退社</option>
                <option value="退学">退学</option>
            </select>



                    @error('education_school_10')
                    <p class="text-red-300 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="grid grid-cols-4 gap-2 education-row" id="row-11" style="display: none;">
                <select
                    name="education_year_11"
                    class="px-4 py-2 border border-gray-300 rounded-md "
                >
                    <option value="">年</option>
                    @for($i = date('Y'); $i >= 1950; $i--)
                        <option value="{{ $i }}">{{ $i }}</option>
                    @endfor
                </select>

                <select
                    name="education_month_11"
                    class="px-4 py-2 border border-gray-300 rounded-md "
                >
                    <option value="">月</option>
                    @foreach(range(1, 12) as $month)
                        <option value="{{ $month }}">{{ __($month . '月') }}</option>
                    @endforeach
                </select>

                <input
                    type="text"
                    name="education_school_11"
                    placeholder="学校名"
                    class="px-4 py-2 border border-gray-300 rounded-md "
                >

                <select
                name="education_startEnd_11"
                class="px-4 py-2 border border-gray-300 rounded-md "
            >
                <option value="" disabled selected class="">選択</option>

                <option value="入学">入学</option>
                <option value="卒業">卒業</option>
                <option value="入社">入社</option>
                <option value="退社">退社</option>
                <option value="退学">退学</option>
            </select>



                    @error('education_school_11')
                    <p class="text-red-300 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="grid grid-cols-4 gap-2 education-row" id="row-12" style="display: none;">
                <select
                    name="education_year_12"
                    class="px-4 py-2 border border-gray-300 rounded-md "
                >
                    <option value="">年</option>
                    @for($i = date('Y'); $i >= 1950; $i--)
                        <option value="{{ $i }}">{{ $i }}</option>
                    @endfor
                </select>

                <select
                    name="education_month_12"
                    class="px-4 py-2 border border-gray-300 rounded-md "
                >
                    <option value="">月</option>
                    @foreach(range(1, 12) as $month)
                        <option value="{{ $month }}">{{ __($month . '月') }}</option>
                    @endforeach
                </select>

                <input
                    type="text"
                    name="education_school_12"
                    placeholder="学校名"
                    class="px-4 py-2 border border-gray-300 rounded-md "
                >

                <select
                name="education_startEnd_12"
                class="px-4 py-2 border border-gray-300 rounded-md "
            >
                <option value="" disabled selected class="">選択</option>

                <option value="入学">入学</option>
                <option value="卒業">卒業</option>
                <option value="入社">入社</option>
                <option value="退社">退社</option>
                <option value="退学">退学</option>
            </select>



                    @error('education_school_12')
                    <p class="text-red-300 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="grid grid-cols-4 gap-2 education-row" id="row-13" style="display: none;">
                <select
                    name="education_year_13"
                    class="px-4 py-2 border border-gray-300 rounded-md "
                >
                    <option value="">年</option>
                    @for($i = date('Y'); $i >= 1950; $i--)
                        <option value="{{ $i }}">{{ $i }}</option>
                    @endfor
                </select>

                <select
                    name="education_month_13"
                    class="px-4 py-2 border border-gray-300 rounded-md "
                >
                    <option value="">月</option>
                    @foreach(range(1, 12) as $month)
                        <option value="{{ $month }}">{{ __($month . '月') }}</option>
                    @endforeach
                </select>

                <input
                    type="text"
                    name="education_school_13"
                    placeholder="学校名"
                    class="px-4 py-2 border border-gray-300 rounded-md "
                >

                <select
                name="education_startEnd_13"
                class="px-4 py-2 border border-gray-300 rounded-md "
            >
                <option value="" disabled selected class="">選択</option>

                <option value="入学">入学</option>
                <option value="卒業">卒業</option>
                <option value="入社">入社</option>
                <option value="退社">退社</option>
                <option value="退学">退学</option>
            </select>



                    @error('education_school_13')
                    <p class="text-red-300 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="grid grid-cols-4 gap-2 education-row" id="row-14" style="display: none;">
                <select
                    name="education_year_14"
                    class="px-4 py-2 border border-gray-300 rounded-md "
                >
                    <option value="">年</option>
                    @for($i = date('Y'); $i >= 1950; $i--)
                        <option value="{{ $i }}">{{ $i }}</option>
                    @endfor
                </select>

                <select
                    name="education_month_14"
                    class="px-4 py-2 border border-gray-300 rounded-md "
                >
                    <option value="">月</option>
                    @foreach(range(1, 12) as $month)
                        <option value="{{ $month }}">{{ __($month . '月') }}</option>
                    @endforeach
                </select>

                <input
                    type="text"
                    name="education_school_14"
                    placeholder="学校名"
                    class="px-4 py-2 border border-gray-300 rounded-md "
                >

                <select
                name="education_startEnd_14"
                class="px-4 py-2 border border-gray-300 rounded-md "
            >
                <option value="" disabled selected class="">選択</option>

                <option value="入学">入学</option>
                <option value="卒業">卒業</option>
                <option value="入社">入社</option>
                <option value="退社">退社</option>
                <option value="退学">退学</option>
            </select>



                    @error('education_school_14')
                    <p class="text-red-300 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="grid grid-cols-4 gap-2 education-row" id="row-15" style="display: none;">
                <select
                    name="education_year_15"
                    class="px-4 py-2 border border-gray-300 rounded-md "
                >
                    <option value="">年</option>
                    @for($i = date('Y'); $i >= 1950; $i--)
                        <option value="{{ $i }}">{{ $i }}</option>
                    @endfor
                </select>

                <select
                    name="education_month_15"
                    class="px-4 py-2 border border-gray-300 rounded-md "
                >
                    <option value="">月</option>
                    @foreach(range(1, 12) as $month)
                        <option value="{{ $month }}">{{ __($month . '月') }}</option>
                    @endforeach
                </select>

                <input
                    type="text"
                    name="education_school_15"
                    placeholder="学校名"
                    class="px-4 py-2 border border-gray-300 rounded-md "
                >

                <select
                name="education_startEnd_15"
                class="px-4 py-2 border border-gray-300 rounded-md "
            >
                <option value="" disabled selected class="">選択</option>

                <option value="入学">入学</option>
                <option value="卒業">卒業</option>
                <option value="入社">入社</option>
                <option value="退社">退社</option>
                <option value="退学">退学</option>
            </select>



                    @error('education_school_3')
                    <p class="text-red-300 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

           <div class="mt-4">
                <button type="button" id="add-row" class="px-4 py-2 bg-sky-400 hover:bg-sky-600 text-white rounded-md font-bold text-2xl">+</button>
                <button type="button" id="remove-row" class="px-4 py-2 bg-orange-300 hover:bg-orange-400 text-white rounded-md font-bold text-2xl">-</button>
            </div>




        </div> --}}

        <div class="space-y-2 mt-4">
            <label class="block text-sm font-semibold text-gray-700">学歴</label>

            @php
                $educationCount = 0;
                for($i = 1; $i <= 15; $i++) {
                    if($user->{'education_school_' . $i}) {
                        $educationCount++;
                    }
                }
            @endphp

            @for($i = 1; $i <= 15; $i++)
                @if($user->{'education_school_' . $i})
                    <div class="grid grid-cols-4 gap-2 education-row" id="row-{{ $i }}">
                        <select
                            name="education_year_{{ $i }}"
                            class="px-4 py-2 border border-gray-300 rounded-md"
                        >
                            <option value="">年</option>
                            @for($year = date('Y'); $year >= 1950; $year--)
                                <option value="{{ $year }}"
                                    {{ $user->{'education_year_' . $i} == $year ? 'selected' : '' }}>
                                    {{ $year }}
                                </option>
                            @endfor
                        </select>

                        <select
                            name="education_month_{{ $i }}"
                            class="px-4 py-2 border border-gray-300 rounded-md"
                        >
                            <option value="">月</option>
                            @foreach(range(1, 12) as $month)
                                <option value="{{ $month }}"
                                    {{ $user->{'education_month_' . $i} == $month ? 'selected' : '' }}>
                                    {{ $month }}月
                                </option>
                            @endforeach
                        </select>

                        <input
                            type="text"
                            name="education_school_{{ $i }}"
                            placeholder="学校名"
                            value="{{ $user->{'education_school_' . $i} }}"
                            class="px-4 py-2 border border-gray-300 rounded-md"
                        >

                        <select
                            name="education_startEnd_{{ $i }}"
                            class="px-4 py-2 border border-gray-300 rounded-md"
                        >
                            <option value="" disabled>選択</option>
                            <option value="入学" {{ $user->{'education_startEnd_' . $i} == '入学' ? 'selected' : '' }}>入学</option>
                            <option value="卒業" {{ $user->{'education_startEnd_' . $i} == '卒業' ? 'selected' : '' }}>卒業</option>
                            <option value="入社" {{ $user->{'education_startEnd_' . $i} == '入社' ? 'selected' : '' }}>入社</option>
                            <option value="退社" {{ $user->{'education_startEnd_' . $i} == '退社' ? 'selected' : '' }}>退社</option>
                            <option value="退学" {{ $user->{'education_startEnd_' . $i} == '退学' ? 'selected' : '' }}>退学</option>
                        </select>
                    </div>
                @endif

            @endfor


            <!-- Additional empty rows -->
            @for($i = $educationCount + 1; $i <= 15; $i++)
                <div class="grid grid-cols-4 gap-2 education-row" id="row-{{ $i }}" style="display: none;">
                    <select
                        name="education_year_{{ $i }}"
                        class="px-4 py-2 border border-gray-300 rounded-md"
                    >
                        <option value="">年</option>
                        @for($year = date('Y'); $year >= 1950; $year--)
                            <option value="{{ $year }}">{{ $year }}</option>
                        @endfor
                    </select>

                    <select
                        name="education_month_{{ $i }}"
                        class="px-4 py-2 border border-gray-300 rounded-md"
                    >
                        <option value="">月</option>
                        @foreach(range(1, 12) as $month)
                            <option value="{{ $month }}">{{ $month }}月</option>
                        @endforeach
                    </select>

                    <input
                        type="text"
                        name="education_school_{{ $i }}"
                        placeholder="学校名"
                        class="px-4 py-2 border border-gray-300 rounded-md"
                    >

                    <select
                        name="education_startEnd_{{ $i }}"
                        class="px-4 py-2 border border-gray-300 rounded-md"
                    >
                        <option value="" disabled selected>選択</option>
                        <option value="入学">入学</option>
                        <option value="卒業">卒業</option>
                        <option value="入社">入社</option>
                        <option value="退社">退社</option>
                        <option value="退学">退学</option>
                    </select>
                </div>
            @endfor
        </div>

        <div class="mt-4">
            <button type="button" id="add-row" class="px-4 py-2 bg-sky-400 hover:bg-sky-600 text-white rounded-md font-bold text-2xl">+</button>
            <button type="button" id="remove-row" class="px-4 py-2 bg-orange-300 hover:bg-orange-400 text-white rounded-md font-bold text-2xl">-</button>
        </div>

            <!-- Information -->
            <div class="space-y-6 mt-3">

                <div class="space-y-2">
                    <label class="block text-sm font-semibold text-gray-700">アピールポイント</label>
                    <textarea
                        name="appear_point"
                        id="appear_point"
                        class="w-full px-4 py-2 border border-gray-300 rounded-md"
                        placeholder="アピールポイントを押してください"
                    >{{ old('appear_point', $user->appear_point) }}</textarea>
                </div>


                <div class="space-y-2">
                    <label class="block text-sm font-semibold text-gray-700">日本に留学した理由</label>
                    <textarea type="text"
                           name="study_japan"
                           id="study_japan"

                           class="w-full px-4 py-2 border border-gray-300 rounded-md"
                           placeholder="日本に留学した理由を押してください"
                           >{{ old('study_japan', $user->study_japan) }}
                        </textarea>


                </div>

                <div class="space-y-2">
                    <label class="block text-sm font-semibold text-gray-700">スキル</label>
                    <input type="text"
                           name="skill"
                           id="skill"
                           value="{{ old('skill',$user->skill) }}"
                           class="w-full px-4 py-2 border border-gray-300 rounded-md"
                           >

                </div>

                <div class="space-y-2">
                    <label class="block text-sm font-semibold text-gray-700">志望動機</label>
                    <textarea type="text"
                           name="reason"
                           id="reason"

                           class="w-full px-4 py-2 border border-gray-300 rounded-md"
                          >{{ old('reason',$user->reason) }}
                    </textarea>

                </div>


                <div class="space-y-2">
                    <label class="block text-sm font-semibold text-gray-700">語学力</label>
                    <input type="text"
                           name="language"
                           id="language"
                           value="{{ old('language',$user->language) }}"
                           class="w-full px-4 py-2 border border-gray-300 rounded-md"
                           placeholder="語学力を押してください">


                </div>

                <div class="space-y-2">
                    <label class="block text-sm font-semibold text-gray-700">免許、資格</label>
                    <input type="text"
                           name="license"
                           id="license"
                           value="{{ old('license', $user->license) }}"
                           class="w-full px-4 py-2 border border-gray-300 rounded-md"
                           placeholder="免許、資格を入力してください" required>

                </div>

                <div class="space-y-2">
                    <label class="block text-sm font-semibold text-gray-700">趣味、特徴</label>
                    <input type="text"
                           name="hobby"
                           id="hobby"
                           value="{{ old('hobby',$user->hobby) }}"
                           class="w-full px-4 py-2 border border-gray-300 rounded-md"
                           placeholder="趣味、特徴を入力してください">

                </div>

                <div class="space-y-2">
                    <label class="block text-sm font-semibold text-gray-700">アルバイト経験</label>
                    <input type="text"
                           name="part_time"
                           id="part_time"
                           value="{{ old('part_time',$user->part_time) }}"
                           class="w-full px-4 py-2 border border-gray-300 rounded-md"
                           placeholder="アルバイト経験を押してください">


                </div>
                <div class="space-y-2">
                    <label class="block text-m font-semibold text-gray-700">個人情報の求人者への提供について同意いたします。</label>
                    <input type="checkbox"
                           name="check_approve"
                           id="check_approve"
                           value="1"
                           class="w-8 h-8"
                           {{ old('check_approve',$user->check_approve) ? 'checked' : '' }}
                           placeholder="" required>
                           <small class="px-2 text-yellow-600">チェックボックスをチェックしてください。</small>


                </div>

        </div>

        <!-- Submit Button -->
        <div class="mt-8">
            <button type="submit"
                    class="w-full bg-sky-600 text-white py-3 px-4 rounded-md hover:bg-sky-700 focus:outline-none focus:ring-2 focus:ring-sky-500 focus:ring-offset-2 transition-colors font-semibold">
                    更新ボタン
            </button>
        </div>
    </form>
</div>

<script>

document.addEventListener("DOMContentLoaded", () => {
    let visibleRows = {{ $educationCount }}; // Start with number of existing entries
    const maxRows = 15;

    // Row Addition Functionality
    const addRowButton = document.getElementById("add-row");
    const removeRowButton = document.getElementById("remove-row");

    addRowButton.addEventListener("click", () => {
        if (visibleRows < maxRows) {
            visibleRows++;
            document.getElementById(`row-${visibleRows}`).style.display = "grid";
        }
    });

    removeRowButton.addEventListener("click", () => {
        if (visibleRows > 1) {
            document.getElementById(`row-${visibleRows}`).style.display = "none";
            visibleRows--;
        }
    });
});
//    document.addEventListener("DOMContentLoaded", () => {
//     let visibleRows = 3; // Initially show 3 rows
//     const maxRows = 15;

//     // Row Addition Functionality
//     const addRowButton = document.getElementById("add-row");
//     const removeRowButton = document.getElementById("remove-row");

//     addRowButton.addEventListener("click", () => {
//         if (visibleRows < maxRows) {
//             visibleRows++;
//             document.getElementById(`row-${visibleRows}`).style.display = "grid";
//         }
//     });

//     removeRowButton.addEventListener("click", () => {
//         if (visibleRows > 1) {
//             document.getElementById(`row-${visibleRows}`).style.display = "none";
//             visibleRows--;
//         }
//     });

    // Image Preview Functionality
    document.addEventListener('DOMContentLoaded', () => {
    const fileInput = document.getElementById('imageUpload');
    const imageElement = document.getElementById('selectedImage');
    const placeholderText = document.getElementById('placeholderText');

    fileInput.addEventListener('change', (event) => {
        const input = event.target;
        const file = input.files[0];

        if (file) {
            const reader = new FileReader();

            reader.onload = function(e) {
                imageElement.src = e.target.result;
                imageElement.classList.remove('hidden');
                placeholderText.classList.add('hidden');
            };

            reader.readAsDataURL(file);
        } else {
            // If no file is selected, reset to original state
            imageElement.src = '';
            imageElement.classList.add('hidden');
            placeholderText.classList.remove('hidden');
        }
    });
});


    // const fileInput = document.getElementById('imageUpload');
    // const imageElement = document.getElementById('selectedImage');
    // const placeholderText = document.getElementById('placeholderText');

    // fileInput.addEventListener('change', (event) => {
    //     const input = event.target;
    //     const file = input.files[0];

    //     if (file) {
    //         const reader = new FileReader();

    //         reader.onload = function(e) {
    //             imageElement.src = e.target.result;
    //             imageElement.classList.remove('hidden');
    //             placeholderText.classList.add('hidden');
    //         };

    //         reader.readAsDataURL(file);
    //     } else {
    //         // If no file is selected, reset to original state
    //         imageElement.src = '';
    //         imageElement.classList.add('hidden');
    //         placeholderText.classList.remove('hidden');
    //     }
    // });

</script>

{{-- <script>

document.addEventListener("DOMContentLoaded", () => {
let visibleRows = 3; // Initially show 1 row
const maxRows = 15;

document.getElementById("add-row").addEventListener("click", () => {
if (visibleRows < maxRows) {
    visibleRows++;
    document.getElementById(`row-${visibleRows}`).style.display = "grid";
}
});

document.getElementById("remove-row").addEventListener("click", () => {
if (visibleRows > 1) {
    document.getElementById(`row-${visibleRows}`).style.display = "none";
    visibleRows--;
}
});


function previewImage(event) {
        const input = event.target;
        const reader = new FileReader();
        const imageElement = document.getElementById('selectedImage');
        const placeholderText = document.getElementById('placeholderText');

        reader.onload = function() {
            imageElement.src = reader.result;
            imageElement.classList.remove('hidden');
            placeholderText.classList.add('hidden');
        };

        if (input.files && input.files[0]) {
            reader.readAsDataURL(input.files[0]);
        }
    }
        // Get the current date
        const today = new Date();
    // Format the date to 'YYYY-MM-DD'
    const formattedDate = today.toISOString().split('T')[0];
    // Set the formatted date as the default value for the input
    document.getElementById('currentDate').value = formattedDate;








});

</script> --}}
</x-app-layout>






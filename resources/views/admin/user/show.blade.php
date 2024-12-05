
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

    <div class="max-w-5xl mx-auto bg-white shadow-xl rounded-xl overflow-hidden mt-8">
        <!-- Header Section with Profile Image -->
        <div class="bg-gradient-to-r from-blue-600 to-blue-800 px-8 py-12">
            <div class="flex items-center space-x-8">
                <!-- Profile Image -->
                <div class="relative">
                    @if ($user->profile_image)
                        <div class="w-40 h-40  overflow-hidden border-4 border-white shadow-lg">
                            <img src="{{ asset('storage/' . $user->profile_image) }}"
                                 alt="Profile Image"
                                 class="w-full h-full object-cover">
                        </div>
                    @else
                        <div class="w-32 h-32  overflow-hidden border-4 border-white shadow-lg bg-gray-200 flex items-center justify-center">
                            <svg class="w-16 h-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </div>
                    @endif
                </div>

                <!-- Name and Basic Info -->
                <div class="text-white">
                    <h1 class="text-3xl font-bold mb-2">{{ $user->name }}</h1>
                    <p class="text-blue-100 text-lg">{{ $user->furigana }}</p>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="p-8">
            <!-- Personal Information Section -->
            <div class="mb-10">
                <h2 class="text-xl font-semibold text-gray-800 mb-6 pb-2 border-b-2 border-blue-500">個人情報</h2>

                <div class="grid grid-cols-1 md:grid-cols-1 gap-2">
                    <!-- Name Card -->

                <div class="flex justify-between space-x-3">

                    <div class="w-full">
                        <div class="flex flex-col sm:flex-row justify-normal border-2 border-gray-200 rounded-sm">
                            <label for="furigana"
                                class="block font-semibold text-white bg-blue-600 w-full sm:w-[200px] h-auto sm:h-[50px] px-5 py-5 text-md ">
                             フリガナ
                            </label>
                            <p class="px-5 py-3 text-sm text-gray-700">
                                {{ $user->furigana }}
                            </p>
                        </div>


                        <div class="flex flex-col sm:flex-row justify-normal border-2 border-gray-200 rounded-sm mt-2">
                            <label for="name"
                                class="block font-semibold text-white bg-blue-600 w-full sm:w-[200px] h-auto sm:h-[100px] px-5 py-5 text-md">
                        氏名
                            </label>
                            <p class="px-5 py-3 text-sm text-gray-700">
                                {{ $user->name }}
                            </p>
                        </div>


                    </div>








                </div>

                <div class="flex justify-normal space-x-3">
                    <div class="w-4/5">
                        <!-- Email Address -->
                        <div class="flex flex-col sm:flex-row justify-normal border-2 border-gray-200 rounded-sm">
                            <label for="name"
                                class="block font-semibold text-white bg-blue-600 w-full sm:w-[200px] h-auto sm:h-[60px] px-5 py-5 text-md">
                                生年月日
                            </label>

                            <p class="px-5 py-3 text-md text-gray-700">
                                {{ $user->date_of_birth }}
                            </p>




                        </div>

                    </div>


                    <div class="w-1/5">

                        <!-- Gender -->
                        <div class="flex flex-col sm:flex-row justify-normal border-2 border-gray-200 rounded-sm">
                            <label for="name" :value=""
                                class="block font-semibold text-white bg-blue-600 sm:w-[100px] h-auto sm:h-[60px] px-5 py-5 text-md">性別</label>


                                <p class="px-5 py-3 text-md text-gray-700">
                                    {{ $user->gender }}
                                </p>

                        </div>

                    </div>

                </div>


                <!--role-->




                <div class="flex flex-col sm:flex-row justify-normal border-2 border-gray-200 rounded-sm">
                    <label for="address"
                        class="block font-semibold text-white bg-blue-600 w-full sm:w-[200px] h-auto sm:h-[100px] px-5 py-5 text-md">
                   住所
                    </label>
                    <p class="px-5 py-3 text-md text-gray-700">
                        {{ $user->address }}
                    </p>
                </div>

                <div class="flex flex-col sm:flex-row justify-normal border-2 border-gray-200 rounded-sm">
                    <label for="phone_number"
                        class="block font-semibold text-white bg-blue-600 w-full sm:w-[200px] h-auto sm:h-[100px] px-5 py-5 text-md">
                      電話番号
                    </label>
                    <p class="px-5 py-3 text-md text-gray-700">
                        {{ $user->phone_number }}
                    </p>
                </div>

                <div class="flex flex-col sm:flex-row justify-normal border-2 border-gray-200 rounded-sm">
                    <label for="mobile_number"
                        class="block font-semibold text-white bg-blue-600 w-full sm:w-[200px] h-auto sm:h-[100px] px-5 py-5 text-md">
                    携帯電話
                    </label>
                    <p class="px-5 py-3 text-md text-gray-700">
                        {{ $user->mobile_number }}
                    </p>
                </div>

                <div class="flex flex-col sm:flex-row justify-normal border-2 border-gray-200 rounded-sm">
                    <label for="email"
                        class="block font-semibold text-white bg-blue-600 w-full sm:w-[200px] h-auto sm:h-[100px] px-5 py-5 text-md">
                    メールアドレス
                    </label>
                    <p class="px-5 py-3 text-md text-gray-700">
                        {{ $user->email }}
                    </p>
                </div>


                {{-- <div class="flex flex-col sm:flex-row justify-normal border-2 border-gray-200 rounded-sm">
                    <label for="email"
                        class="block font-semibold text-white bg-blue-600 w-full sm:w-[200px] h-auto sm:h-[180px] px-5 py-5 text-md">
                        学史
                    </label>

                    <!-- Date Selection Column -->
                    <div class="border-b-2 border-gray-200">
                        <!-- First Entry -->
                        <div class="flex flex-col sm:flex-row sm:space-x-5 space-y-2 sm:space-y-0 mb-2 border border-gray-300 rounded-lg mt-2">
                        <small class="ml-2 mt-1 bg-yellow-100 px-2 py-2 rounded-md border border-gray-300">学史１</small>
                            <p class="px-5 py-3 text-md text-gray-700 bg-white rounded-xl border border-gray-300">
                                {{ $user->education_year_1 }}
                            </p>
                            <p class="px-5 py-3 text-md text-gray-700 bg-white rounded-xl border border-gray-300">
                                {{ $user->education_month_1 }}
                            </p>
                            <p class="px-5 py-3 text-md text-gray-700 bg-white rounded-xl border border-gray-300">
                                {{ $user->education_school_1 }}
                            </p>
                            <p class="px-5 py-3 text-md text-gray-700 bg-white rounded-xl border border-gray-300">
                                {{ $user->education_startEnd_1 }}
                            </p>
                        </div>
                        <div class="flex flex-col sm:flex-row sm:space-x-5 space-y-2 sm:space-y-0 mb-2 border border-gray-300 rounded-lg mt-2">
                        <small class="ml-2 mt-1 bg-yellow-100 px-2 py-2 rounded-md border border-gray-300">学史１</small>
                            <p class="px-5 py-3 text-md text-gray-700 bg-white rounded-xl border border-gray-300">
                                {{ $user->education_year_1 }}
                            </p>
                            <p class="px-5 py-3 text-md text-gray-700 bg-white rounded-xl border border-gray-300">
                                {{ $user->education_month_1 }}
                            </p>
                            <p class="px-5 py-3 text-md text-gray-700 bg-white rounded-xl border border-gray-300">
                                {{ $user->education_school_1 }}
                            </p>
                            <p class="px-5 py-3 text-md text-gray-700 bg-white rounded-xl border border-gray-300">
                                {{ $user->education_startEnd_1 }}
                            </p>
                        </div>

                        <!-- Second Entry -->


                    </div>
                </div> --}}

                <div class="flex flex-col sm:flex-row border border-gray-300 rounded-lg shadow-lg overflow-hidden">
                    <!-- Sidebar Header -->
                    <div class="bg-blue-500 text-white px-8 py-6 sm:w-[250px] flex items-center justify-center">
                        <h3 class="text-2xl font-bold">学史</h3>
                    </div>

                    <!-- Content Area -->
                    <div class="flex flex-col w-full">
                        <div class="p-6 space-y-4">
                            @for($i = 1; $i <= 15; $i++)
                                @if($user->{'education_year_' . $i})
                                    <div class="flex items-center space-x-6 bg-gray-100 p-4 rounded-lg shadow-sm">
                                        <!-- Tag -->
                                        <span class="bg-yellow-200 text-yellow-600 px-4 py-2 rounded-full text-sm font-semibold">
                                            学史 {{ $i }}
                                        </span>
                                        <!-- Details -->
                                        <div class="flex flex-col sm:flex-row sm:space-x-6 space-y-2 sm:space-y-0">
                                            <p class="text-gray-800 font-medium">
                                                <span class="font-semibold">年:</span> {{ $user->{'education_year_' . $i} }}
                                            </p>
                                            <p class="text-gray-800 font-medium">
                                                <span class="font-semibold">月:</span> {{ $user->{'education_month_' . $i} }}
                                            </p>
                                            <p class="text-gray-800 font-medium">
                                                <span class="font-semibold">学校名:</span> {{ $user->{'education_school_' . $i} }}
                                            </p>
                                            <p class="text-gray-800 font-medium">
                                                <span class="font-semibold">種類:</span> {{ $user->{'education_startEnd_' . $i} }}
                                            </p>
                                        </div>
                                    </div>
                                @endif
                            @endfor
                        </div>
                    </div>
                </div>



                <div class="flex flex-col sm:flex-row border-2 border-gray-200 rounded-sm">
                    <label class="block font-semibold text-white bg-blue-600 w-full sm:w-[200px] h-auto sm:h-[200px] px-5 py-3 text-md">
                アピールポイント
                    </label>
                    <p class="px-5 py-3 text-md text-gray-700">
                        {{ $user->appear_point }}
                    </p>
                </div>


                <div>
                    <div class="flex flex-col sm:flex-row justify-normal border-2 border-gray-200 rounded-sm">
                        <label for="name"
                            class="block font-semibold text-white bg-blue-600 w-full sm:w-[200px] h-auto sm:h-[200px] px-5 py-5 text-md ">
                            日本留学の理由
                        </label>
                        <p class="px-5 py-3 text-md text-gray-700">
                            {{ $user->study_japan }}
                        </p>
                    </div>
                </div>

                <div>
                    <div class="flex flex-col sm:flex-row justify-normal border-2 border-gray-200 rounded-sm">
                        <label for="skill"
                            class="block font-semibold text-white bg-blue-600 w-full sm:w-[200px] h-auto sm:h-[100px] px-5 py-5 text-md">
               スキル
                        </label>
                        <p class="px-5 py-3 text-md text-gray-700">
                            {{ $user->skill }}
                        </p>
                    </div>
                </div>

                <div>
                    <div class="flex flex-col sm:flex-row justify-normal border-2 border-gray-200 rounded-sm">
                        <label for="reason"
                            class="block font-semibold text-white bg-blue-600 w-full sm:w-[200px] h-auto sm:h-[200px] px-5 py-5 text-md">
                            応募理由
                        </label>
                        <p class="px-5 py-3 text-md text-gray-700">
                            {{ $user->reason }}
                        </p>
                    </div>
                </div>

                <div>
                    <div class="flex flex-col sm:flex-row justify-normal border-2 border-gray-200 rounded-sm">
                        <label for="language"
                            class="block font-semibold text-white bg-blue-600 w-full sm:w-[200px] h-auto sm:h-[100px] px-5 py-5 text-md">
                            言語能力
                        </label>
                        <p class="px-5 py-3 text-md text-gray-700">
                            {{ $user->language }}
                        </p>
                    </div>
                </div>

                <div>
                    <div class="flex flex-col sm:flex-row justify-normal border-2 border-gray-200 rounded-sm">
                        <label for="license"
                            class="block font-semibold text-white bg-blue-600 w-full sm:w-[200px] h-auto sm:h-[100px] px-5 py-5 text-md">
                            運転免許証と資格
                        </label>
                        <p class="px-5 py-3 text-md text-gray-700">
                            {{ $user->license }}
                        </p>
                    </div>
                </div>

                <div>
                    <div class="flex flex-col sm:flex-row justify-normal border-2 border-gray-200 rounded-sm">
                        <label for="hobby"
                            class="block font-semibold text-white bg-blue-600 w-full sm:w-[200px] h-auto sm:h-[100px] px-5 py-5 text-md">
                            趣味と特技
                        </label>
                        <p class="px-5 py-3 text-md text-gray-700">
                            {{ $user->hobby }}
                        </p>
                    </div>
                </div>

                <div>
                    <div class="flex flex-col sm:flex-row justify-normal border-2 border-gray-200 rounded-sm">
                        <label for="part_time"
                            class="block font-semibold text-white bg-blue-600 w-full sm:w-[200px] h-auto sm:h-[100px] px-5 py-5 text-md">
                        アルバイト経験
                        </label>
                        <p class="px-5 py-3 text-md text-gray-700">
                            {{ $user->part_time }}
                        </p>
                    </div>
                </div>
                <div>
                    <div class="flex flex-col sm:flex-row justify-normal border-2 border-gray-200 rounded-sm">
                        <label for="part_time"
                            class="block font-semibold text-white bg-blue-600 w-full sm:w-[200px] h-auto sm:h-[100px] px-5 py-5 text-md">
                            個人情報の提供
                        </label>
                        <p class="px-5 py-3 text-md text-gray-700">
                            {{ $user->check_approve ? '個人情報の提供に同意しました' : '個人情報の提供に同意していません' }}
                        </p>
                    </div>
                </div>


                <div class="mt-4 flex space-x-4">
                    <form action="{{ route('admin.users.approve', $user->id) }}" method="POST" class="inline">
                        @csrf
                        @method('PATCH')
                        <button type="submit"
                                class="px-4 py-2 bg-green-500 text-white rounded hover:bg-green-600 transition duration-300">
                                求職者の承認
                        </button>
                    </form>

                    <form action="{{ route('admin.users.disapprove', $user->id) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                                class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600 transition duration-300">
                                求職者を不承認にする
                        </button>
                    </form>

                  <a href="{{ route('admin.user.index') }}"  class="px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600 transition duration-300">戻り</a>
                </div>

        </div>










    </div>
    </div>
    </div>


</x-app-layout>


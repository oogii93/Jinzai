<x-app-layout>

    @if (session('status') || session('error'))
        <div id="statusToast" class="fixed top-16 left-1/2 transform -translate-x-1/2 z-50 w-full max-w-md">
            <div
                class="bg-gray-100 border-l-4 @if (session('status')) border-blue-500 @else border-red-500 @endif rounded-r-lg shadow-md overflow-hidden">
                <div class="p-4 flex items-center">
                    <div class="flex-shrink-0">
                        @if (session('status'))
                            <svg class="w-6 h-6 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        @else
                            <svg class="w-6 h-6 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
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
                    <button id="closeToast" type="button"
                        class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-blue-600 text-base font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:ml-3 sm:w-auto sm:text-sm">
                        閉じる
                    </button>
                </div>
            </div>
        </div>

        <style>
            @keyframes slideDown {
                from {
                    transform: translate(-50%, -100%);
                }

                to {
                    transform: translate(-50%, 0);
                }
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



    <div class="max-w-4xl mx-auto bg-white shadow-lg rounded-lg overflow-hidden mt-5">
        <!-- Form Header -->
        <div class="bg-gradient-to-r from-sky-500 to-sky-700 py-6 px-8 ">
            <h2 class="text-2xl font-bold text-white">履歴書</h2>
            <p class="text-sky-100 mt-2"></p>
        </div>

        <!-- Main Form -->
        <div class="p-8">


            <!-- Top Section with Image Upload -->
            <div class="flex flex-wrap gap-8 mb-8">
                <div class="flex-1 space-y-6">
                    <!-- Furigana Input -->
                    <div class="space-y-2">
                        <label class="block text-sm font-semibold text-gray-700">ふりがな</label>
                        <p class="px-4 py-2 border border-gray-300 rounded-md bg-gray-100">
                            {{ $user->furigana ?? '未設定' }}
                        </p>


                    </div>

                    <!-- Name Input -->
                    <div class="space-y-2">
                        <label class="block text-sm font-semibold text-gray-700">氏名</label>
                        <p class="px-4 py-2 border border-gray-300 rounded-md bg-gray-100">
                            {{ $user->name ?? '未設定' }}
                        </p>


                    </div>
                </div>


                <div class="w-48">
                    <div class="text-sm font-semibold text-gray-700 mb-2">プロフィール写真</div>

                    <div class="border-2 border-dashed border-gray-300 rounded-lg p-4 text-center">
                        <div class="w-40 h-40 bg-gray-200 flex items-center justify-center rounded-md overflow-hidden">
                            @if ($user->profile_image)
                                <img class="block w-40 h-40 object-cover" src="{{ Storage::url($user->profile_image) }}"
                                    alt="プロフィール写真">
                            @else
                                <span class="text-gray-500">写真未登録</span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <!-- Birth Date and Gender Section -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <div class="space-y-2">
                    <label class="block text-sm font-semibold text-gray-700">生年月日</label>
                    <p class="px-3 py-2 border border-gray-300 rounded-md bg-gray-100">
                        {{ $user->date_of_birth ? \Carbon\Carbon::parse($user->date_of_birth)->format('Y年m月d日') : '未設定' }}
                    </p>
                </div>

                <div class="space-y-2">
                    <label class="block text-sm font-semibold text-gray-700">性別</label>
                    <p class="px-3 py-2 border border-gray-300 rounded-md bg-gray-100">
                        {{ $user->gender == 'male' ? '男性' : ($user->gender == 'female' ? '女性' : '未設定') }}
                    </p>
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

                    <!-- Read-Only Display -->
                    <p class="px-4 py-2 border border-gray-300 rounded-md bg-gray-100">
                        {{ $user->address ?? '未設定' }}
                    </p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="space-y-2">
                        <label class="block text-sm font-semibold text-gray-700">電話番号</label>
                        <p class="px-4 py-2 border border-gray-300 rounded-md bg-gray-100">
                            {{ $user->phone_number ?? '未設定' }}
                        </p>


                    </div>

                    <div class="space-y-2">
                        <label class="block text-sm font-semibold text-gray-700">携帯電話番号</label>
                        <p class="px-4 py-2 border border-gray-300 rounded-md bg-gray-100">
                            {{ $user->mobile_number ?? '未設定' }}
                        </p>


                    </div>
                </div>

                <div class="space-y-2">
                    <label class="block text-sm font-semibold text-gray-700">メールアドレス</label>
                    <p class="px-4 py-2 border border-gray-300 rounded-md bg-gray-100">
                        {{ $user->email ?? '未設定' }}
                    </p>


                </div>
            </div>


            <div class="space-y-2 mt-4">
                <label class="block text-sm font-semibold text-gray-700">学歴</label>

                @php
                    $educationCount = 0;
                    for ($i = 1; $i <= 15; $i++) {
                        if ($user->{'education_school_' . $i}) {
                            $educationCount++;
                        }
                    }
                @endphp

                @if (auth()->user()->role === 'admin')
                    {{-- Read-Only View for Admins --}}
                    @for ($i = 1; $i <= $educationCount; $i++)
                        <div class="grid grid-cols-4 gap-2 education-row" id="row-{{ $i }}">
                            <p class="px-4 py-2 border border-gray-300 rounded-md bg-gray-100">
                                {{ $user->{'education_year_' . $i} ?? '未設定' }}年
                            </p>

                            <p class="px-4 py-2 border border-gray-300 rounded-md bg-gray-100">
                                {{ $user->{'education_month_' . $i} ?? '未設定' }}月
                            </p>

                            <p class="px-4 py-2 border border-gray-300 rounded-md bg-gray-100">
                                {{ $user->{'education_school_' . $i} ?? '未設定' }}
                            </p>

                            <p class="px-4 py-2 border border-gray-300 rounded-md bg-gray-100">
                                {{ $user->{'education_startEnd_' . $i} ?? '未設定' }}
                            </p>
                        </div>
                    @endfor
                @else
                    {{-- Editable View for Users --}}
                    @for ($i = 1; $i <= 15; $i++)
                        @if ($user->{'education_school_' . $i})
                            <div class="grid grid-cols-4 gap-2 education-row" id="row-{{ $i }}">
                                <select name="education_year_{{ $i }}"
                                    class="px-4 py-2 border border-gray-300 rounded-md">
                                    <option value="">年</option>
                                    @for ($year = date('Y'); $year >= 1950; $year--)
                                        <option value="{{ $year }}"
                                            {{ $user->{'education_year_' . $i} == $year ? 'selected' : '' }}>
                                            {{ $year }}
                                        </option>
                                    @endfor
                                </select>

                                <select name="education_month_{{ $i }}"
                                    class="px-4 py-2 border border-gray-300 rounded-md">
                                    <option value="">月</option>
                                    @foreach (range(1, 12) as $month)
                                        <option value="{{ $month }}"
                                            {{ $user->{'education_month_' . $i} == $month ? 'selected' : '' }}>
                                            {{ $month }}月
                                        </option>
                                    @endforeach
                                </select>

                                <input type="text" name="education_school_{{ $i }}" placeholder="学校名"
                                    value="{{ $user->{'education_school_' . $i} }}"
                                    class="px-4 py-2 border border-gray-300 rounded-md">

                                <select name="education_startEnd_{{ $i }}"
                                    class="px-4 py-2 border border-gray-300 rounded-md">
                                    <option value="" disabled>選択</option>
                                    <option value="入学"
                                        {{ $user->{'education_startEnd_' . $i} == '入学' ? 'selected' : '' }}>入学</option>
                                    <option value="卒業"
                                        {{ $user->{'education_startEnd_' . $i} == '卒業' ? 'selected' : '' }}>卒業</option>
                                    <option value="入社"
                                        {{ $user->{'education_startEnd_' . $i} == '入社' ? 'selected' : '' }}>入社</option>
                                    <option value="退社"
                                        {{ $user->{'education_startEnd_' . $i} == '退社' ? 'selected' : '' }}>退社</option>
                                    <option value="退学"
                                        {{ $user->{'education_startEnd_' . $i} == '退学' ? 'selected' : '' }}>退学</option>
                                </select>
                            </div>
                        @endif
                    @endfor
                @endif
            </div>




            <!-- Information -->
            <div class="space-y-6 mt-3">

                <div class="space-y-2">
                    <label class="block text-sm font-semibold text-gray-700">アピールポイント</label>
                    <p class="w-full px-4 py-2 border border-gray-300 rounded-md bg-gray-100">
                        {{ $user->appear_point ?? '未設定' }}
                    </p>
                </div>


                <div class="space-y-2">
                    <label class="block text-sm font-semibold text-gray-700">日本に留学した理由</label>
                    <p class="w-full px-4 py-2 border border-gray-300 rounded-md bg-gray-100">
                        {{ $user->study_japan ?? '未設定' }}
                    </p>


                </div>

                <div class="space-y-2">
                    <label class="block text-sm font-semibold text-gray-700">スキル</label>
                    <p class="w-full px-4 py-2 border border-gray-300 rounded-md bg-gray-100">
                        {{ $user->skill ?? '未設定' }}
                    </p>

                </div>

                <div class="space-y-2">
                    <label class="block text-sm font-semibold text-gray-700">志望動機</label>
                    <p class="w-full px-4 py-2 border border-gray-300 rounded-md bg-gray-100">
                        {{ $user->reason ?? '未設定' }}
                    </p>

                </div>


                <div class="space-y-2">
                    <label class="block text-sm font-semibold text-gray-700">語学力</label>
                    <p class="w-full px-4 py-2 border border-gray-300 rounded-md bg-gray-100">
                        {{ $user->language ?? '未設定' }}
                    </p>


                </div>

                <div class="space-y-2">
                    <label class="block text-sm font-semibold text-gray-700">免許、資格</label>
                    <p class="w-full px-4 py-2 border border-gray-300 rounded-md bg-gray-100">
                        {{ $user->license ?? '未設定' }}
                    </p>

                </div>

                <div class="space-y-2">
                    <label class="block text-sm font-semibold text-gray-700">趣味、特徴</label>
                    <p class="w-full px-4 py-2 border border-gray-300 rounded-md bg-gray-100">
                        {{ $user->hobby ?? '未設定' }}
                    </p>

                </div>

                <div class="space-y-2">
                    <label class="block text-sm font-semibold text-gray-700">アルバイト経験</label>
                    <p class="w-full px-4 py-2 border border-gray-300 rounded-md bg-gray-100">
                        {{ $user->part_time ?? '未設定' }}
                    </p>


                </div>
                <div class="space-y-2">
                    <label class="block text-m font-semibold text-gray-700">個人情報の求人者への提供について同意いたします。</label>
                    <p class="px-4 py-2 border border-gray-300 rounded-md bg-gray-100">
                        {{ $user->check_approve ? '同意済み' : '未同意' }}
                    </p>


                </div>

            </div>

            <!-- Submit Button -->



            @auth
            @if(auth()->user()->role === 'admin')
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

                    <a href="{{ route('admin.user.index') }}"
                        class="px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600 transition duration-300">戻り</a>
                </div>
            @endif
        @endauth





        </div>


</x-app-layout>

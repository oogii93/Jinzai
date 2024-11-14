
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
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
        <h2 class="text-2xl font-bold text-white">申請登録</h2>
        <p class="text-sky-100 mt-2">アカウント作成のために情報をご入力ください。</p>
    </div>

    <!-- Main Form -->
    <form class="p-8" method="POST" action="{{ route('register') }}" enctype="multipart/form-data">

        @csrf
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
                           value="{{ old('furigana') }}"
                           placeholder="ふりがなを入力してください。">
                        @error('furigana')
                        <p class="text-red-300 text-xs mt-1">{{ $message }}</p>
                        @enderror

                </div>

                <!-- Name Input -->
                <div class="space-y-2">
                    <label class="block text-sm font-semibold text-gray-700">氏名</label>
                    <input type="text"
                           name="name"
                            id="name"
                            value="{{ old('name') }}"
                           class="w-full px-4 py-2 border border-gray-300 rounded-md "
                           placeholder="氏名を入力してください。">

                           @error('name')
                             <p class="text-red-300 text-xs mt-1">{{ $message }}</p>
                           @enderror
                </div>
            </div>

            <!-- Image Upload Section -->
            <div class="w-48">
                <div class="text-sm font-semibold text-gray-700 mb-2">プロフィール写真</div>
                <div class="border-2 border-dashed border-gray-300 rounded-lg p-4 text-center hover:border-sky-500 transition-colors cursor-pointer">
                    <label for="imageUpload" class="cursor-pointer">
                        <div class="w-40 h-40 bg-gray-200 flex items-center justify-center rounded-md overflow-hidden">
                            <img id="selectedImage" src="#" alt="Selected Image" class="hidden w-40 h-40 object-cover">
                            <span class="text-gray-500" id="placeholderText">写真選択</span>
                        </div>
                    </label>
                    <input type="file" id="imageUpload" name="profile_image" class="hidden" accept="image/*" onchange="previewImage(event)">
                </div>
            </div>
        </div>

        <!-- Birth Date and Gender Section -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
            <div class="space-y-2">
                <label class="block text-sm font-semibold text-gray-700">生年月日</label>
                <div class="grid grid-cols-3 gap-2">
                    <select name="year" class="px-3 py-2 border border-gray-300 rounded-md ">
                        <option value="">年</option>
                        @for($i = date('Y'); $i >= 1950; $i--)
                            <option value="{{ $i }}">{{ $i }}</option>
                        @endfor
                    </select>
                    <select name="month" class="px-3 py-2 border border-gray-300 rounded-md ">
                        <option value="">月</option>
                        @foreach(range(1, 12) as $month)
                            <option value="{{ $month }}">{{ __($month . '月') }}</option>
                        @endforeach
                    </select>

                    <select name="day" class="px-3 py-2 border border-gray-300 rounded-md ">
                        <option value="">日</option>
                        @foreach(range(1, 31) as $day)
                            <option value="{{ $day }}">{{ $day }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="space-y-2">
                <label class="block text-sm font-semibold text-gray-700">性別</label>
                <select name="gender" class="w-full px-3 py-2 border border-gray-300 ">
                    <option value="">性別選択</option>
                    <option value="male">男性</option>
                    <option value="female">女性</option>

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
                       value="{{ old('address') }}"
                       class="w-full px-4 py-2 border border-gray-300 rounded-md "
                       placeholder="在住所を入力してください。">

                       @error('address')
                           <p class="text-red-300 text-xs mt-1">{{ $message }}</p>
                       @enderror
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="space-y-2">
                    <label class="block text-sm font-semibold text-gray-700">電話番号</label>
                    <input type="tel"
                           name="phone_number"
                           id="phone_number"
                           value="{{ old('phone_number') }}"
                           class="w-full px-4 py-2 border border-gray-300 rounded-md "
                           placeholder="電話番号を入力してください。" required>

                           @error('phone_number')
                                 <p class="text-red-300 text-xs mt-1">{{ $message }}</p>

                           @enderror
                </div>

                <div class="space-y-2">
                    <label class="block text-sm font-semibold text-gray-700">携帯電話番号</label>
                    <input type="tel"
                           name="mobile_number"
                           id="mobile_number"
                           value="{{ old('mobile_number') }}"
                           class="w-full px-4 py-2 border border-gray-300 rounded-md "
                           placeholder="携帯電話番号を入力してください。" required>

                        @error('mobile_number')
                         <p class="text-red-300 text-xs mt-1">{{ $message }}</p>

                        @enderror
                </div>
            </div>

            <div class="space-y-2">
                <label class="block text-sm font-semibold text-gray-700">メールアドレス</label>
                <input type="email"
                       name="email"
                       id="email"
                       value="{{ old('email') }}"
                       class="w-full px-4 py-2 border border-gray-300 rounded-md "
                       placeholder="メールアドレスを入力してください。" required>

                    @error('email')
                    <p class="text-red-300 text-xs mt-1">{{ $message }}</p>
                    @enderror
            </div>
        </div>


        <div class="space-y-2 mt-4">
            <label class="block text-sm font-semibold text-gray-700">学歴</label>

            <div class="grid grid-cols-3 gap-2">
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
                    @error('education_school_1')
                    <p class="text-red-300 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="grid grid-cols-3 gap-2">
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
                    @error('education_school_2')
                    <p class="text-red-300 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="grid grid-cols-3 gap-2">
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
                    @error('education_school_3')
                    <p class="text-red-300 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>


        </div>

            <!-- Information -->
            <div class="space-y-6 mt-3">
                <div class="space-y-2">
                    <label class="block text-sm font-semibold text-gray-700">アピールポイント</label>
                    <textarea type="text"
                           name="appear_point"
                           id="appear_point"
                           value="{{ old('appear_point') }}"
                           class="w-full px-4 py-2 border border-gray-300 rounded-md @error('appear_point')  @enderror"
                           placeholder="アピールポイントを押してください">

                           {{ old('appear_point') }}
                        </textarea>

                           @error('appear_point')
                               <p class="text-red-300 text-xs mt-1">{{ $message }}</p>
                           @enderror
                </div>

                <div class="space-y-2">
                    <label class="block text-sm font-semibold text-gray-700">日本に留学した理由</label>
                    <textarea type="text"
                           name="study_japan"
                           id="study_japan"
                           value="{{ old('study_japan') }}"
                           class="w-full px-4 py-2 border border-gray-300 rounded-md @error('study_japan')  @enderror "
                           placeholder="日本に留学した理由を押してください">

                           {{ old('study_japan') }}
                        </textarea>

                           @error('study_japan')
                               <p class="text-red-300 text-xs mt-1">{{ $message }}</p>
                           @enderror
                </div>

                <div class="space-y-2">
                    <label class="block text-sm font-semibold text-gray-700">スキル</label>
                    <input type="text"
                           name="skill"
                           id="skill"
                           value="{{ old('skill') }}"
                           class="w-full px-4 py-2 border border-gray-300 rounded-md @error('skill')  @enderror"
                           placeholder="スキルを押してください" required>

                        @error('skill')
                        <p class="text-red-300 text-xs mt-1">{{ $message }}</p>
                        @enderror
                </div>

                <div class="space-y-2">
                    <label class="block text-sm font-semibold text-gray-700">志望動機</label>
                    <textarea type="text"
                           name="reason"
                           id="reason"
                           value="{{ old('reason') }}"
                           class="w-full px-4 py-2 border border-gray-300 rounded-md @error('reason')  @enderror "
                           placeholder="志望動機を入力してください">

                           {{ old('reason') }}
                        </textarea>

                           @error('reason')
                               <p class="text-red-300 text-xs mt-1">{{ $message }}</p>
                           @enderror
                </div>


                <div class="space-y-2">
                    <label class="block text-sm font-semibold text-gray-700">語学力</label>
                    <input type="text"
                           name="language"
                           id="language"
                           value="{{ old('language') }}"
                           class="w-full px-4 py-2 border border-gray-300 rounded-md @error('language')  @enderror"
                           placeholder="語学力を押してください" required>

                        @error('language')
                        <p class="text-red-300 text-xs mt-1">{{ $message }}</p>
                        @enderror
                </div>

                <div class="space-y-2">
                    <label class="block text-sm font-semibold text-gray-700">免許、資格</label>
                    <input type="text"
                           name="license"
                           id="license"
                           value="{{ old('license') }}"
                           class="w-full px-4 py-2 border border-gray-300 rounded-md @error('license')  @enderror"
                           placeholder="免許、資格を入力してください" required>

                        @error('license')
                        <p class="text-red-300 text-xs mt-1">{{ $message }}</p>
                        @enderror
                </div>

                <div class="space-y-2">
                    <label class="block text-sm font-semibold text-gray-700">趣味、特徴</label>
                    <input type="text"
                           name="hobby"
                           id="hobby"
                           value="{{ old('hobby') }}"
                           class="w-full px-4 py-2 border border-gray-300 rounded-md @error('hobby')  @enderror"
                           placeholder="趣味、特徴を入力してください" required>

                        @error('hobby')
                        <p class="text-red-300 text-xs mt-1">{{ $message }}</p>
                        @enderror
                </div>

                <div class="space-y-2">
                    <label class="block text-sm font-semibold text-gray-700">アルバイト経験</label>
                    <input type="text"
                           name="part_time"
                           id="part_time"
                           value="{{ old('part_time') }}"
                           class="w-full px-4 py-2 border border-gray-300 rounded-md @error('part_time')  @enderror"
                           placeholder="アルバイト経験を押してください" required>

                        @error('part_time')
                        <p class="text-red-300 text-xs mt-1">{{ $message }}</p>
                        @enderror
                </div>

        </div>

        <!-- Submit Button -->
        <div class="mt-8">
            <button type="submit"
                    class="w-full bg-sky-600 text-white py-3 px-4 rounded-md hover:bg-sky-700 focus:outline-none focus:ring-2 focus:ring-sky-500 focus:ring-offset-2 transition-colors font-semibold">
                    申し込む
            </button>
        </div>
    </form>
</div>

<script>


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
</script>
</html>






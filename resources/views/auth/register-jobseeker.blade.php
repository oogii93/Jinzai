
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
        <h2 class="text-2xl font-bold text-white">{{ __('Sign up Form') }}</h2>
        <p class="text-sky-100 mt-2">{{ __('Please fill in your information to create an account') }}</p>
    </div>

    <!-- Main Form -->
    <form class="p-8" method="POST" action="{{ route('register') }}" enctype="multipart/form-data">

        @csrf
        <!-- Top Section with Image Upload -->
        <div class="flex flex-wrap gap-8 mb-8">
            <div class="flex-1 space-y-6">
                <!-- Furigana Input -->
                <div class="space-y-2">
                    <label class="block text-sm font-medium text-gray-700">{{ __('Furigana') }}</label>
                    <input type="text"
                           name="furigana"
                           id="furigana"
                           class="w-full px-4 py-2 border border-gray-300 rounded-md"
                           value="{{ old('furigana') }}"
                           placeholder="{{ __('Please enter furigana') }}">
                        @error('furigana')
                        <p class="text-red-300 text-xs mt-1">{{ $message }}</p>
                        @enderror

                </div>

                <!-- Name Input -->
                <div class="space-y-2">
                    <label class="block text-sm font-medium text-gray-700">{{ __('Name') }}</label>
                    <input type="text"
                           name="name"
                            id="name"
                            value="{{ old('name') }}"
                           class="w-full px-4 py-2 border border-gray-300 rounded-md "
                           placeholder="{{ __('Please enter your name') }}">

                           @error('name')
                             <p class="text-red-300 text-xs mt-1">{{ $message }}</p>
                           @enderror
                </div>
            </div>

            <!-- Image Upload Section -->
            <div class="w-48">
                <div class="text-sm font-medium text-gray-700 mb-2">{{ __('Profile Photo') }}</div>
                <div class="border-2 border-dashed border-gray-300 rounded-lg p-4 text-center hover:border-sky-500 transition-colors cursor-pointer">
                    <label for="imageUpload" class="cursor-pointer">
                        <div class="w-40 h-40 bg-gray-200 flex items-center justify-center rounded-md overflow-hidden">
                            <img id="selectedImage" src="#" alt="Selected Image" class="hidden w-40 h-40 object-cover">
                            <span class="text-gray-500" id="placeholderText">{{ __('Select Image') }}</span>
                        </div>
                    </label>
                    <input type="file" id="imageUpload" name="profile_image" class="hidden" accept="image/*" onchange="previewImage(event)">
                </div>
            </div>
        </div>

        <!-- Birth Date and Gender Section -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
            <div class="space-y-2">
                <label class="block text-sm font-medium text-gray-700">{{ __('Date of Birth') }}</label>
                <div class="grid grid-cols-3 gap-2">
                    <select name="year" class="px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-sky-500 focus:border-sky-500">
                        <option value="">{{ __('Year') }}</option>
                        @for($i = date('Y'); $i >= 1950; $i--)
                            <option value="{{ $i }}">{{ $i }}</option>
                        @endfor
                    </select>
                    <select name="month" class="px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-sky-500 focus:border-sky-500">
                        <option value="">{{ __('Month') }}</option>
                        @foreach(range(1, 12) as $month)
                            <option value="{{ $month }}">{{ __($month . '月') }}</option>
                        @endforeach
                    </select>

                    <select name="day" class="px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-sky-500 focus:border-sky-500">
                        <option value="">{{ __('Day') }}</option>
                        @foreach(range(1, 31) as $day)
                            <option value="{{ $day }}">{{ $day }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="space-y-2">
                <label class="block text-sm font-medium text-gray-700">{{ __('Gender') }}</label>
                <select name="gender" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-sky-500 focus:border-sky-500">
                    <option value="">{{ __('Select Gender') }}</option>
                    <option value="male">{{ __('Male') }}</option>
                    <option value="female">{{ __('Female') }}</option>

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
                <label class="block text-sm font-medium text-gray-700">{{ __('Address') }}</label>
                <input type="text"
                       name="address"
                       id="address"
                       value="{{ old('address') }}"
                       class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-sky-500 focus:border-sky-500"
                       placeholder="{{ __('Please enter your address') }}">

                       @error('address')
                           <p class="text-red-300 text-xs mt-1">{{ $message }}</p>
                       @enderror
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="space-y-2">
                    <label class="block text-sm font-medium text-gray-700">{{ __('Phone number') }}</label>
                    <input type="tel"
                           name="phone_number"
                           id="phone_number"
                           value="{{ old('phone_number') }}"
                           class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-sky-500 focus:border-sky-500"
                           placeholder="{{ __('Please enter your phone number') }}" required>

                           @error('phone_number')
                                 <p class="text-red-300 text-xs mt-1">{{ $message }}</p>

                           @enderror
                </div>

                <div class="space-y-2">
                    <label class="block text-sm font-medium text-gray-700">{{ __('Mobile number') }}</label>
                    <input type="tel"
                           name="mobile_number"
                           id="mobile_number"
                           value="{{ old('mobile_number') }}"
                           class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-sky-500 focus:border-sky-500"
                           placeholder="{{ __('Please enter your mobile number') }}" required>

                        @error('mobile_number')
                         <p class="text-red-300 text-xs mt-1">{{ $message }}</p>

                        @enderror
                </div>
            </div>

            <div class="space-y-2">
                <label class="block text-sm font-medium text-gray-700">{{ __('Email') }}</label>
                <input type="email"
                       name="email"
                       id="email"
                       value="{{ old('email') }}"
                       class="w-full px-4 py-2 border border-gray-300 rounded-md "
                       placeholder="{{ __('Please enter your email') }}" required>

                    @error('email')
                    <p class="text-red-300 text-xs mt-1">{{ $message }}</p>
                    @enderror
            </div>
        </div>


        <div class="space-y-2 mt-4">
            <label class="block text-sm font-medium text-gray-700">{{ __('Education') }}</label>

            <div class="grid grid-cols-3 gap-2">
                <select
                    name="education_year_1"
                    class="px-4 py-2 border border-gray-300 rounded-md "
                >
                    <option value="">{{ __('Year') }}</option>
                    @for($i = date('Y'); $i >= 1950; $i--)
                        <option value="{{ $i }}">{{ $i }}</option>
                    @endfor
                </select>

                <select
                    name="education_month_1"
                    class="px-4 py-2 border border-gray-300 rounded-md "
                >
                    <option value="">{{ __('Month') }}</option>
                    @foreach(range(1, 12) as $month)
                        <option value="{{ $month }}">{{ __($month . '月') }}</option>
                    @endforeach
                </select>

                <input
                    type="text"
                    name="education_school_1"
                    placeholder="{{ __('School name') }}"
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
                    <option value="">{{ __('Year') }}</option>
                    @for($i = date('Y'); $i >= 1950; $i--)
                        <option value="{{ $i }}">{{ $i }}</option>
                    @endfor
                </select>

                <select
                    name="education_month_2"
                    class="px-4 py-2 border border-gray-300 rounded-md "
                >
                    <option value="">{{ __('Month') }}</option>
                    @foreach(range(1, 12) as $month)
                        <option value="{{ $month }}">{{ __($month . '月') }}</option>
                    @endforeach
                </select>

                <input
                    type="text"
                    name="education_school_2"
                    placeholder="{{ __('School name') }}"
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
                    <option value="">{{ __('Year') }}</option>
                    @for($i = date('Y'); $i >= 1950; $i--)
                        <option value="{{ $i }}">{{ $i }}</option>
                    @endfor
                </select>

                <select
                    name="education_month_3"
                    class="px-4 py-2 border border-gray-300 rounded-md "
                >
                    <option value="">{{ __('Month') }}</option>
                    @foreach(range(1, 12) as $month)
                        <option value="{{ $month }}">{{ __($month . '月') }}</option>
                    @endforeach
                </select>

                <input
                    type="text"
                    name="education_school_3"
                    placeholder="{{ __('School name') }}"
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
                    <label class="block text-sm font-medium text-gray-700">{{ __('Appear point') }}</label>
                    <textarea type="text"
                           name="appear_point"
                           id="appear_point"
                           value="{{ old('appear_point') }}"
                           class="w-full px-4 py-2 border border-gray-300 rounded-md @error('appear_point')  @enderror"
                           placeholder="{{ __('Please enter your appear point') }}">

                           {{ old('appear_point') }}
                        </textarea>

                           @error('appear_point')
                               <p class="text-red-300 text-xs mt-1">{{ $message }}</p>
                           @enderror
                </div>

                <div class="space-y-2">
                    <label class="block text-sm font-medium text-gray-700">{{ __('Reason for studying in Japan') }}</label>
                    <textarea type="text"
                           name="study_japan"
                           id="study_japan"
                           value="{{ old('study_japan') }}"
                           class="w-full px-4 py-2 border border-gray-300 rounded-md @error('study_japan')  @enderror "
                           placeholder="{{ __('Please enter your reason for studying japan') }}">

                           {{ old('study_japan') }}
                        </textarea>

                           @error('study_japan')
                               <p class="text-red-300 text-xs mt-1">{{ $message }}</p>
                           @enderror
                </div>

                <div class="space-y-2">
                    <label class="block text-sm font-medium text-gray-700">{{ __('Skill') }}</label>
                    <input type="text"
                           name="skill"
                           id="skill"
                           value="{{ old('skill') }}"
                           class="w-full px-4 py-2 border border-gray-300 rounded-md @error('skill')  @enderror"
                           placeholder="{{ __('Please enter your skill') }}" required>

                        @error('skill')
                        <p class="text-red-300 text-xs mt-1">{{ $message }}</p>
                        @enderror
                </div>

                <div class="space-y-2">
                    <label class="block text-sm font-medium text-gray-700">{{ __('Reasons for applying') }}</label>
                    <textarea type="text"
                           name="reason"
                           id="reason"
                           value="{{ old('reason') }}"
                           class="w-full px-4 py-2 border border-gray-300 rounded-md @error('reason')  @enderror focus:ring-2 focus:ring-sky-500 focus:border-sky-500"
                           placeholder="{{ __('Please enter your reason for applying') }}">

                           {{ old('reason') }}
                        </textarea>

                           @error('reason')
                               <p class="text-red-300 text-xs mt-1">{{ $message }}</p>
                           @enderror
                </div>


                <div class="space-y-2">
                    <label class="block text-sm font-medium text-gray-700">{{ __('Langueage Ability') }}</label>
                    <input type="text"
                           name="language"
                           id="language"
                           value="{{ old('language') }}"
                           class="w-full px-4 py-2 border border-gray-300 rounded-md @error('language')  @enderror"
                           placeholder="{{ __('Please enter your language skill') }}" required>

                        @error('language')
                        <p class="text-red-300 text-xs mt-1">{{ $message }}</p>
                        @enderror
                </div>

                <div class="space-y-2">
                    <label class="block text-sm font-medium text-gray-700">{{ __('Langueage Ability') }}</label>
                    <input type="text"
                           name="license"
                           id="license"
                           value="{{ old('license') }}"
                           class="w-full px-4 py-2 border border-gray-300 rounded-md @error('license')  @enderror"
                           placeholder="{{ __('Please enter your licenses') }}" required>

                        @error('license')
                        <p class="text-red-300 text-xs mt-1">{{ $message }}</p>
                        @enderror
                </div>

                <div class="space-y-2">
                    <label class="block text-sm font-medium text-gray-700">{{ __('Hobby and speciality') }}</label>
                    <input type="text"
                           name="hobby"
                           id="hobby"
                           value="{{ old('hobby') }}"
                           class="w-full px-4 py-2 border border-gray-300 rounded-md @error('hobby')  @enderror"
                           placeholder="{{ __('Please enter your hobby') }}" required>

                        @error('hobby')
                        <p class="text-red-300 text-xs mt-1">{{ $message }}</p>
                        @enderror
                </div>

                <div class="space-y-2">
                    <label class="block text-sm font-medium text-gray-700">{{ __('Part time job experience') }}</label>
                    <input type="text"
                           name="part_time"
                           id="part_time"
                           value="{{ old('part_time') }}"
                           class="w-full px-4 py-2 border border-gray-300 rounded-md @error('part_time')  @enderror"
                           placeholder="{{ __('Please enter your part time job experience') }}" required>

                        @error('part_time')
                        <p class="text-red-300 text-xs mt-1">{{ $message }}</p>
                        @enderror
                </div>

        </div>

        <!-- Submit Button -->
        <div class="mt-8">
            <button type="submit"
                    class="w-full bg-sky-600 text-white py-3 px-4 rounded-md hover:bg-sky-700 focus:outline-none focus:ring-2 focus:ring-sky-500 focus:ring-offset-2 transition-colors">
                {{ __('Save and Sent') }}
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






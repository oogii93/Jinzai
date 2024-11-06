
<x-app-layout>

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
                <h2 class="text-xl font-semibold text-gray-800 mb-6 pb-2 border-b-2 border-blue-500">{{ __('Personal Information') }}</h2>

                <div class="grid grid-cols-1 md:grid-cols-1 gap-2">
                    <!-- Name Card -->
                    <div class="bg-gray-50 rounded-lg p-6 hover:shadow-md transition duration-300">
                        <div class="flex items-start space-x-4">
                            <div class="p-1 bg-blue-100 rounded-lg">
                                <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                                <p class="text-sm text-gray-700 mb-1">{{ __('Name') }}</p>
                            </div>
                            <div>

                                <p class="text-lg font-medium text-gray-800">{{ $user->name }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="bg-gray-50 rounded-lg p-6 hover:shadow-md transition duration-300">
                        <div class="flex items-start space-x-4">
                            <div class="p-2 bg-blue-100 rounded-lg">
                                <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm text-gray-500 mb-1">{{ __('Furigana') }}</p>
                                <p class="text-lg font-medium text-gray-800">{{ $user->furigana }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Date of Birth Card -->
                    <div class="bg-gray-50 rounded-lg p-6 hover:shadow-md transition duration-300">
                        <div class="flex items-start space-x-4">
                            <div class="p-2 bg-blue-100 rounded-lg">
                                <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm text-gray-500 mb-1">{{ __('Date of Birth') }}</p>
                                <p class="text-lg font-medium text-gray-800">
                                    @if($user->date_of_birth)
                                        {{ date('F j, Y', strtotime($user->date_of_birth)) }}
                                    @endif
                                </p>
                                <p class="text-sm text-gray-600 mt-1">
                                    @if($user->date_of_birth)
                                        {{ \Carbon\Carbon::parse($user->date_of_birth)->age }} {{ __('years old') }}
                                    @endif
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="bg-gray-50 rounded-lg p-6 hover:shadow-md transition duration-300">
                        <div class="flex items-start space-x-4">
                            <div class="p-2 bg-blue-100 rounded-lg">
                                <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm text-gray-500 mb-1">{{ __('Gender') }}</p>
                                <p class="text-lg font-medium text-gray-800">{{ $user->gender }}</p>
                            </div>
                        </div>
                    </div>


                    <!-- Address -->
                    <div class="bg-gray-50 rounded-lg p-6 hover:shadow-md transition duration-300">
                        <div class="flex items-start space-x-4">
                            <div class="p-2 bg-blue-100 rounded-lg">
                                <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm text-gray-500 mb-1">{{ __('Address') }}</p>
                                <p class="text-lg font-medium text-gray-800">{{ $user->address }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Email Card -->
                    <div class="bg-gray-50 rounded-lg p-6 hover:shadow-md transition duration-300">
                        <div class="flex items-start space-x-4">
                            <div class="p-2 bg-blue-100 rounded-lg">
                                <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm text-gray-500 mb-1">{{ __('Email') }}</p>
                                <p class="text-lg font-medium text-gray-800">{{ $user->email }}</p>
                            </div>
                        </div>
                    </div>



                    <!-- Phone  -->
                    <div class="bg-gray-50 rounded-lg p-6 hover:shadow-md transition duration-300">
                        <div class="flex items-start space-x-4">
                            <div class="p-2 bg-blue-100 rounded-lg">
                                <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm text-gray-500 mb-1">{{ __('Phone Number') }}</p>
                                <p class="text-lg font-medium text-gray-800">{{ $user->phone_number }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Phone Card -->
                    <div class="bg-gray-50 rounded-lg p-6 hover:shadow-md transition duration-300">
                        <div class="flex items-start space-x-4">
                            <div class="p-2 bg-blue-100 rounded-lg">
                                <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm text-gray-500 mb-1">{{ __('Mobile Number') }}</p>
                                <p class="text-lg font-medium text-gray-800">{{ $user->mobile_number }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- education Card -->




                </div>

                <div class="grid grid-cols-1 md:grid-cols-1 gap-6 mt-5">


                    <div class="bg-gray-50 rounded-lg p-6 hover:shadow-md transition duration-300">
                        <div class="flex items-start space-x-4">
                            <div class="p-2 bg-blue-100 rounded-lg">
                                <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm text-gray-500 mb-1">{{ __('Appear Point') }}</p>
                                <p class="text-lg font-medium text-gray-800">{{ $user->appear_point }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="bg-gray-50 rounded-lg p-6 hover:shadow-md transition duration-300">
                        <div class="flex items-start space-x-4">
                            <div class="p-2 bg-blue-100 rounded-lg">
                                <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm text-gray-500 mb-1">{{ __('Reason for studying in Japan') }}</p>
                                <p class="text-lg font-medium text-gray-800">{{ $user->study_japan }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="bg-gray-50 rounded-lg p-6 hover:shadow-md transition duration-300">
                        <div class="flex items-start space-x-4">
                            <div class="p-2 bg-blue-100 rounded-lg">
                                <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm text-gray-500 mb-1">{{ __('Skill') }}</p>
                                <p class="text-lg font-medium text-gray-800">{{ $user->skill }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="bg-gray-50 rounded-lg p-6 hover:shadow-md transition duration-300">
                        <div class="flex items-start space-x-4">
                            <div class="p-2 bg-blue-100 rounded-lg">
                                <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm text-gray-500 mb-1">{{ __('Reason') }}</p>
                                <p class="text-lg font-medium text-gray-800">{{ $user->reason }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="bg-gray-50 rounded-lg p-6 hover:shadow-md transition duration-300">
                        <div class="flex items-start space-x-4">
                            <div class="p-2 bg-blue-100 rounded-lg">
                                <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm text-gray-500 mb-1">{{ __('Language Ability') }}</p>
                                <p class="text-lg font-medium text-gray-800">{{ $user->language }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="bg-gray-50 rounded-lg p-6 hover:shadow-md transition duration-300">
                        <div class="flex items-start space-x-4">
                            <div class="p-2 bg-blue-100 rounded-lg">
                                <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm text-gray-500 mb-1">{{ __('Driver licence and Qualifications') }}</p>
                                <p class="text-lg font-medium text-gray-800">{{ $user->license }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="bg-gray-50 rounded-lg p-6 hover:shadow-md transition duration-300">
                        <div class="flex items-start space-x-4">
                            <div class="p-2 bg-blue-100 rounded-lg">
                                <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm text-gray-500 mb-1">{{ __('Hobby and speciality') }}</p>
                                <p class="text-lg font-medium text-gray-800">{{ $user->hobby }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="bg-gray-100 rounded-lg p-6 hover:shadow-md transition duration-300">
                        <div class="flex items-start space-x-4">
                            <div class="p-2 bg-blue-100 rounded-lg">
                                <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm text-gray-500 mb-1">{{ __('Part time job experience') }}</p>
                                <p class="text-lg font-medium text-gray-800">{{ $user->part_time }}</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

</x-app-layout>




{{-- <x-app-layout>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-10 py-10">


        <div class="shadow sm:rounded-lg border border-gray-300 bg-white">
            <div class="flex justify-end mb-2 mt-2 px-2">
                <h1>
                    {{ $user->created_at }}

                </h1>
            </div>

            <div class="space-y-0.5 p-2" >

                <h2 class="text-2xl font-bold text-gray-800 text-center mb-2">{{ __('My CV') }}</h2>





                <div class="flex justify-between space-x-3">

                    <div class="w-4/5">
                        <div class="flex flex-col sm:flex-row justify-between border-2 border-gray-200 rounded-sm">
                            <label for="furigana"
                                class="block font-semibold text-white bg-blue-600 w-full sm:w-[200px] h-[50px] px-5 py-5 text-md flex-shrink-0">
                                {{ __('Furigana') }}
                            </label>
                            <input type="text" name="furigana" id="furigana"
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-100 rounded-md"
                                value="{{ $user->furigana }}" required>
                        </div>
                        <div class="flex flex-col sm:flex-row justify-between border-2 border-gray-200 rounded-sm">
                            <label for="name"
                                class="block font-semibold text-white bg-blue-600 w-full sm:w-[200px] h-[100px] px-5 py-5 text-md flex-shrink-0">
                                {{ __('Name') }}
                            </label>
                            <input type="text" name="name" id="name"
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-100 rounded-md"
                                value="{{ $user->name }}" required>
                        </div>


                    </div>




                    <div class="w-1/5 bg-gray-100 p-4 flex flex-col items-center space-y-2">
                        <label for="imageUpload" class="cursor-pointer">
                            <div
                                class="w-full h-full bg-gray-200 flex items-center justify-center rounded-md overflow-hidden">
                                <!-- Display the user's profile image if it exists -->
                                @if ($user->profile_image)
                                    <img id="selectedImage" src="{{ asset('storage/' . $user->profile_image) }}"
                                        alt="Profile Image" class="w-full h-full object-cover">
                                @else
                                    <!-- Show placeholder if no image is found -->
                                    <img id="selectedImage" src="#" alt="Selected Image"
                                        class="hidden w-full h-full object-cover">
                                    <span class="text-gray-500" id="placeholderText">{{ __('Select Image') }}</span>
                                @endif
                            </div>
                        </label>
                        <input type="file" id="imageUpload" name="profile_image" class="hidden" accept="image/*"
                            onchange="previewImage(event)">
                    </div>



                </div>

                <div class="flex justify-between space-x-3">
                    <div class="w-4/5">
                        <!-- Email Address -->
                        <div class="flex flex-col sm:flex-row justify-between border-2 border-gray-200 rounded-sm">
                            <label for="name"
                                class="block font-semibold text-white bg-blue-600 w-full sm:w-[200px] h-[60px] px-5 py-5 text-md flex-shrink-0">
                                {{ __('Date of Birth') }}
                            </label>

                            <div class="flex w-full sm:h-[60px] h-[50px] px-4 py-2 bg-gray-100 border-gray-200">

                                <!-- Year Dropdown -->
                                <select name="year"
                                    class="w-1/3 focus:ring-blue-500 focus:border-blue-500 border-gray-200 rounded-r-md text-gray-700">
                                    <option value="" selected disabled>Year</option>
                                    @for ($i = date('Y'); $i >= 1900; $i--)
                                        <option value="{{ $i }}"
                                            {{ old('year', $user->date_of_birth ? date('Y', strtotime($user->date_of_birth)) : '') == $i ? 'selected' : '' }}>
                                            {{ $i }}
                                        </option>
                                    @endfor
                                </select>

                                <!-- Month Dropdown -->
                                <select name="month"
                                    class="w-1/3 focus:ring-blue-500 focus:border-blue-500 border-gray-200 text-gray-700 mr-1">
                                    <option value="" selected disabled>Month</option>
                                    @foreach (['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'] as $key => $month)
                                        <option value="{{ $key + 1 }}"
                                            {{ old('month', $user->date_of_birth ? date('n', strtotime($user->date_of_birth)) : '') == $key + 1 ? 'selected' : '' }}>
                                            {{ $month }}
                                        </option>
                                    @endforeach
                                </select>

                                <!-- Day Dropdown -->
                                <select name="day"
                                    class="w-1/3 focus:ring-blue-500 focus:border-blue-500 border-gray-200 rounded-l-md text-gray-700 mr-1">
                                    <option value="" selected disabled>Day</option>
                                    @for ($i = 1; $i <= 31; $i++)
                                        <option value="{{ $i }}"
                                            {{ old('day', $user->date_of_birth ? date('j', strtotime($user->date_of_birth)) : '') == $i ? 'selected' : '' }}>
                                            {{ $i }}
                                        </option>
                                    @endfor
                                </select>

                            </div>

                        </div>

                    </div>


                    <div class="w-1/5">

                        <!-- Gender -->
                        <div class="mt-2 flex justify-normal">
                            <label for="name" :value=""
                                class="block font-semibold text-white bg-blue-600 sm:w-[100px] h-[50px] px-5 py-5 text-md flex-shrink-0">{{ __('Gender') }}</label>




                            <select name="gender"
                                class=" focus:ring-blue-500 focus:border-blue-500 bg-gray-100 border-gray-200 text-gray-700 mr-1">
                                <option value="">{{ __('Select') }} </option>
                                <option value="male" {{ old('gender', $user->gender) == 'male' ? 'selected' : '' }}>
                                    {{ __('Male') }} </option>
                                <option value="female"{{ old('gender', $user->gender) == 'female' ? 'selected' : '' }}>
                                    {{ __('Female') }} </option>

                            </select>
                        </div>

                    </div>

                </div>


                <!--role-->


                <div class="mt-4 hidden">
                    <label for="role">Role</label>
                    <select id="role" name="role"
                        class="block mt-1 w-full border-gray-300 rounded-md shadow-sm">
                        <option value="jobseeker" selected>Job Seeker</option>
                        <option value="company">Company</option>
                    </select>
                </div>


                <div class="flex flex-col sm:flex-row justify-between border-2 border-gray-200 rounded-sm">
                    <label for="address"
                        class="block font-semibold text-white bg-blue-600 w-full sm:w-[200px] h-[100px] px-5 py-5 text-md flex-shrink-0">
                        {{ __('Address') }}
                    </label>
                    <input type="text" name="address" id="address"
                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-100 rounded-md"
                        value="{{ $user->address }}">
                    </input>
                </div>
                <div class="flex flex-col sm:flex-row justify-between border-2 border-gray-200 rounded-sm">
                    <label for="phone_number"
                        class="block font-semibold text-white bg-blue-600 w-full sm:w-[200px] h-[100px] px-5 py-5 text-md flex-shrink-0">
                        {{ __('Phone number') }}
                    </label>
                    <input type="text" name="phone_number" id="phone_number"
                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-100 rounded-md"
                        value="{{ $user->phone_number }}">
                    </input>
                </div>
                <div class="flex flex-col sm:flex-row justify-between border-2 border-gray-200 rounded-sm">
                    <label for="mobile_number"
                        class="block font-semibold text-white bg-blue-600 w-full sm:w-[200px] h-[100px] px-5 py-5 text-md flex-shrink-0">
                        {{ __('Mobile number') }}
                    </label>
                    <input type="text" name="mobile_number" id="mobile_number"
                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-100 rounded-md"
                        value="{{ $user->mobile_number }}">
                    </input>
                </div>
                <div class="flex flex-col sm:flex-row justify-between border-2 border-gray-200 rounded-sm">
                    <label for="email"
                        class="block font-semibold text-white bg-blue-600 w-full sm:w-[200px] h-[100px] px-5 py-5 text-md flex-shrink-0">
                        {{ __('Email') }}
                    </label>
                    <input type="text" name="email" id="email"
                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-100 rounded-md"
                        value="{{ $user->email }}">
                    </input>
                </div>


                <div class="grid grid-cols-3 gap-0 border-2 border-gray-200 rounded-sm w-full">
                    <!-- Label Column with Fixed Size -->
                    <label for="education"
                        class="block font-semibold text-white bg-blue-600 w-full sm:w-[200px] h-[120px] px-5 py-5 text-md flex-shrink-0">
                        {{ __('Education') }}
                    </label>

                    <!-- Date Selection Column -->
                    <div class="col-span-2 bg-gray-200 px-2 py-3 w-full">
                        <!-- First Entry -->
                        <div class="flex space-x-2 mb-3">





                            <select name="education_year_1"
                                class="w-1/3 focus:ring-blue-500 focus:border-blue-500 border-gray-200 rounded-md text-gray-700">
                                <option value="" selected disabled>{{ __('Year') }}</option>
                                @for ($i = date('Y'); $i >= 1950; $i--)
                                    <option value="{{ $i }}"
                                        {{ old('education_year_1', $user->education_year_1) == $i ? 'selected' : '' }}>
                                        {{ $i }}</option>
                                @endfor
                            </select>

                            <select name="education_month_1"
                                class="w-1/3 focus:ring-blue-500 focus:border-blue-500 border-gray-200 rounded-md text-gray-700">
                                <option value="" selected disabled>{{ __('Month') }}</option>
                                @foreach (['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'] as $key => $month)
                                    <option value="{{ $key + 1 }}"
                                        {{ old('education_month_1', $user->education_month_1) == $key + 1 ? 'selected' : '' }}>
                                        {{ $month }}</option>
                                @endforeach
                            </select>

                            <input type="text" name="education_school_1" placeholder="{{ __('School name') }}"
                                class="w-1/3 focus:ring-blue-500 focus:border-blue-500 border-gray-200 rounded-md text-gray-700"
                                value={{ $user->education_school_1 }}>
                        </div>

                        <!-- Second Entry -->
                        <div class="flex space-x-2 mb-3">
                            <select name="education_year_2"
                                class="w-1/3 focus:ring-blue-500 focus:border-blue-500 border-gray-200 rounded-md text-gray-700">
                                <option value="" selected disabled>Year</option>
                                @for ($i = date('Y'); $i >= 1950; $i--)
                                    <option value="{{ $i }}"
                                        {{ old('education_year_2', $user->education_year_2) == $i ? 'selected' : '' }}>
                                        {{ $i }}</option>
                                @endfor
                            </select>

                            <select name="education_month_2"
                                class="w-1/3 focus:ring-blue-500 focus:border-blue-500 border-gray-200 rounded-md text-gray-700">
                                <option value="" selected disabled>Month</option>
                                @foreach (['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'] as $key => $month)
                                    <option value="{{ $key + 1 }}"
                                        {{ old('education_month_2', $user->education_month_2) == $key + 1 ? 'selected' : '' }}>
                                        {{ $month }}</option>
                                @endforeach
                            </select>

                            <input type="text" name="education_school_2" placeholder="{{ __('School name') }}"
                                value="{{ $user->education_school_2 }}"
                                class="w-1/3 focus:ring-blue-500 focus:border-blue-500 border-gray-200 rounded-md text-gray-700">
                        </div>

                        <!-- Third Entry -->
                        <div class="flex space-x-2">
                            <select name="education_year_3"
                                class="w-1/3 focus:ring-blue-500 focus:border-blue-500 border-gray-200 rounded-md text-gray-700">
                                <option value="" selected disabled>Year</option>
                                @for ($i = date('Y'); $i >= 1950; $i--)
                                    <option value="{{ $i }}"
                                        {{ old('education_year_3', $user->education_year_3) == $i ? 'selected' : '' }}>
                                        {{ $i }}</option>
                                @endfor
                            </select>

                            <select name="education_month_3"
                                class="w-1/3 focus:ring-blue-500 focus:border-blue-500 border-gray-200 rounded-md text-gray-700">
                                <option value="" selected disabled>Month</option>
                                @foreach (['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'] as $key => $month)
                                    <option value="{{ $key + 1 }}"
                                        {{ old('education_month_3', $user->education_month_3) == $key + 1 ? 'selected' : '' }}>
                                        {{ $month }}</option>
                                @endforeach
                            </select>

                            <input type="text" name="education_school_3" value="{{ $user->education_school_3 }}"
                                placeholder="{{ __('School name') }}"
                                class="w-1/3 focus:ring-blue-500 focus:border-blue-500 border-gray-200 rounded-md text-gray-700">
                        </div>
                    </div>
                </div>




                <div class="flex flex-col sm:flex-row justify-between border-2 border-gray-200 rounded-sm">
                    <label for="appear_point"
                        class="block font-semibold text-white bg-blue-600 w-full sm:w-[200px] h-[200px] px-5 py-5 text-md flex-shrink-0">
                        {{ __('Appear point') }}
                    </label>
                    <textarea type="text" name="appear_point" id="appear_point"
                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-100 rounded-md"
                        value="" required>
                        {{ $user->appear_point }}</textarea>
                </div>


                <div>
                    <div class="flex flex-col sm:flex-row justify-between border-2 border-gray-200 rounded-sm">
                        <label for="name"
                            class="block font-semibold text-white bg-blue-600 w-full sm:w-[200px] h-[200px] px-5 py-5 text-md flex-shrink-0">
                            {{ __('Reason for studying in Japan') }}
                        </label>
                        <textarea type="text" name="study_japan" id="study_japan"
                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-100 rounded-md"
                            value="" required>
                            {{ $user->study_japan }}
                            </textarea>
                    </div>
                </div>

                <div>
                    <div class="flex flex-col sm:flex-row justify-between border-2 border-gray-200 rounded-sm">
                        <label for="skill"
                            class="block font-semibold text-white bg-blue-600 w-full sm:w-[200px] h-[100px] px-5 py-5 text-md flex-shrink-0">
                            {{ __('Skill') }}
                        </label>
                        <input type="text" name="skill" id="skill"
                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-100 rounded-md"
                            value="{{ $user->skill }}" required>
                    </div>
                </div>

                <div>
                    <div class="flex flex-col sm:flex-row justify-between border-2 border-gray-200 rounded-sm">
                        <label for="reason"
                            class="block font-semibold text-white bg-blue-600 w-full sm:w-[200px] h-[200px] px-5 py-5 text-md flex-shrink-0">
                            {{ __('Reasons for applying') }}
                        </label>
                        <textarea type="text" name="reason" id="reason"
                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-100 rounded-md"
                            value="" required>
                        {{ $user->reason }}
                        </textarea>
                    </div>
                </div>

                <div>
                    <div class="flex flex-col sm:flex-row justify-between border-2 border-gray-200 rounded-sm">
                        <label for="language"
                            class="block font-semibold text-white bg-blue-600 w-full sm:w-[200px] h-[100px] px-5 py-5 text-md flex-shrink-0">
                            {{ __('Language Ability') }}
                        </label>
                        <input type="text" name="language" id="language"
                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-100 rounded-md"
                            value="{{ $user->language }}" required>
                    </div>
                </div>

                <div>
                    <div class="flex flex-col sm:flex-row justify-between border-2 border-gray-200 rounded-sm">
                        <label for="license"
                            class="block font-semibold text-white bg-blue-600 w-full sm:w-[200px] h-[100px] px-5 py-5 text-md flex-shrink-0">
                            {{ __('Driver licence and Qualifications') }}
                        </label>
                        <input type="text" name="license" id="license"
                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-100 rounded-md"
                            value="{{ $user->license }}" required>
                    </div>
                </div>

                <div>
                    <div class="flex flex-col sm:flex-row justify-between border-2 border-gray-200 rounded-sm">
                        <label for="hobby"
                            class="block font-semibold text-white bg-blue-600 w-full sm:w-[200px] h-[100px] px-5 py-5 text-md flex-shrink-0">
                            {{ __('Hobby and speciality') }}
                        </label>
                        <input type="text" name="hobby" id="hobby"
                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-100 rounded-md"
                            value="{{ $user->hobby }}" required>
                    </div>
                </div>

                <div>
                    <div class="flex flex-col sm:flex-row justify-between border-2 border-gray-200 rounded-sm">
                        <label for="part_time"
                            class="block font-semibold text-white bg-blue-600 w-full sm:w-[200px] h-[100px] px-5 py-5 text-md flex-shrink-0">
                            {{ __('Part time job experience') }}
                        </label>
                        <input type="text" name="part_time" id="part_time"
                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-100 rounded-md"
                            value="{{ $user->part_time }}" required>
                    </div>
                </div>
        </div>










    </div>
    </div>
    </div>


</x-app-layout> --}}


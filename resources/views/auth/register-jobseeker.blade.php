{{-- <x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>


        <!--role-->


        <div class="mt-4">
            <x-input-label for="role" :value="__('Register as')" />
            <select id="role" name="role" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm">
                <option value="jobseeker">Job Seeker</option>
                <option value="company">Company</option>
            </select>
            <x-input-error :messages="$errors->get('role')" class="mt-2" />
        </div>









        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>




        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

               <!-- Email Address -->
               <div class="mt-4">
                <x-input-label for="email" :value="__('furigana')" />
                <x-text-input id="furigana" class="block mt-1 w-full" type="text" name="furigana"  required autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>









        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}



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

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-10">
    <div class="mb-6">
        <h2 class="text-2xl font-bold text-gray-800 text-center">{{ __('Sign up Form') }}</h2>
    </div>

    <div class="shadow sm:rounded-lg border border-gray-300">
        <div class="flex justify-end mb-2 mt-2 px-2">
            <input type="date" id="currentDate">
        </div>

        <form method="POST" action="{{ route('register') }}" class="space-y-0.5 p-2" enctype="multipart/form-data">
            @csrf





            <div class="flex justify-between space-x-3">

                <div class="w-4/5">
                    <div class="flex flex-col sm:flex-row justify-between border-2 border-gray-200 rounded-sm">
                        <label for="furigana" class="block font-semibold text-white bg-blue-600 w-full sm:w-[200px] h-[50px] px-5 py-5 text-md flex-shrink-0">
                            {{ __('Furigana')}}
                        </label>
                        <input type="text" name="furigana" id="furigana"
                               class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-100 rounded-md"
                               value="" required>
                    </div>
                    <div class="flex flex-col sm:flex-row justify-between border-2 border-gray-200 rounded-sm">
                        <label for="name" class="block font-semibold text-white bg-blue-600 w-full sm:w-[200px] h-[100px] px-5 py-5 text-md flex-shrink-0">
                            {{ __('Name')}}
                        </label>
                        <input type="text" name="name" id="name"
                               class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-100 rounded-md"
                               value="" required>
                    </div>


                </div>




                <div class="w-1/5 bg-gray-100 p-4 flex flex-col items-center space-y-2">
                    <label for="imageUpload" class="cursor-pointer">
                        <div class="w-full h-full bg-gray-200 flex items-center justify-center rounded-md overflow-hidden">
                            <img id="selectedImage" src="#" alt="Selected Image" class="hidden w-full h-full object-cover">
                            <span class="text-gray-500" id="placeholderText">{{ __('Select Image') }}</span>
                        </div>
                    </label>
                    <input type="file" id="imageUpload" name="profile_image" class="hidden" accept="image/*" onchange="previewImage(event)">
                </div>



            </div>

            <div class="flex justify-between space-x-3">
                <div class="w-4/5">
                           <!-- Email Address -->
                           <div class="flex flex-col sm:flex-row justify-between border-2 border-gray-200 rounded-sm">
                            <label for="name" class="block font-semibold text-white bg-blue-600 w-full sm:w-[200px] h-[60px] px-5 py-5 text-md flex-shrink-0">
                                {{ __('Date of Birth')}}
                            </label>


                    <div class="flex w-full sm:h-[60px] h-[50px] px-4 py-2 bg-gray-100 border-gray-200">

                        <select name="year" class="w-1/3 focus:ring-blue-500 focus:border-blue-500 border-gray-200 rounded-r-md text-gray-700">
                            <option value="" selected disabled>Year</option>
                            @for($i = date('Y'); $i >= 1900; $i--)
                                <option value="{{ $i }}">{{ $i }}</option>
                            @endfor
                        </select>

                        <select name="month" class="w-1/3 focus:ring-blue-500 focus:border-blue-500 border-gray-200 text-gray-700 mr-1">
                            <option value="" selected disabled>Month</option>
                            @foreach(['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'] as $key => $month)
                                <option value="{{ $key + 1 }}">{{ $month }}</option>
                            @endforeach
                        </select>


                            <select name="day" class="w-1/3 focus:ring-blue-500 focus:border-blue-500 border-gray-200 rounded-l-md text-gray-700 mr-1">
                                <option value="" selected disabled>Day</option>
                                @for($i = 1; $i <= 31; $i++)
                                    <option value="{{ $i }}">{{ $i }}</option>
                                @endfor
                            </select>


                        </div>
                    </div>

                </div>


                <div class="w-1/5">

                                        <!-- Gender -->
                   <div class="mt-2 flex justify-normal">
                    <label for="name" :value="" class="block font-semibold text-white bg-blue-600 sm:w-[100px] h-[50px] px-5 py-5 text-md flex-shrink-0">{{ __('Gender') }}</label>

                    <select name="gender" class=" focus:ring-blue-500 focus:border-blue-500 bg-gray-100 border-gray-200 text-gray-700 mr-1">
                        <option value="" >{{ __('Select') }} </option>
                        <option value="male" >{{ __('Male') }} </option>
                        <option value="female" >{{ __('Female') }} </option>

                    </select>
                 </div>

                </div>

            </div>


            <!--role-->


            <div class="mt-4 hidden">
                <label for="role">Role</label>
                <select id="role" name="role" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm">
                    <option value="jobseeker" selected>Job Seeker</option>
                    <option value="company">Company</option>
                </select>
            </div>


            <div class="flex flex-col sm:flex-row justify-between border-2 border-gray-200 rounded-sm">
                <label for="address" class="block font-semibold text-white bg-blue-600 w-full sm:w-[200px] h-[100px] px-5 py-5 text-md flex-shrink-0">
                    {{ __('Address')}}
                </label>
                <input type="text" name="address" id="address"
                       class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-100 rounded-md"
                       value="" >
                </input>
            </div>
            <div class="flex flex-col sm:flex-row justify-between border-2 border-gray-200 rounded-sm">
                <label for="phone_number" class="block font-semibold text-white bg-blue-600 w-full sm:w-[200px] h-[100px] px-5 py-5 text-md flex-shrink-0">
                    {{ __('Phone number')}}
                </label>
                <input type="text" name="phone_number" id="phone_number"
                       class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-100 rounded-md"
                       value="" >
                </input>
            </div>
            <div class="flex flex-col sm:flex-row justify-between border-2 border-gray-200 rounded-sm">
                <label for="mobile_number" class="block font-semibold text-white bg-blue-600 w-full sm:w-[200px] h-[100px] px-5 py-5 text-md flex-shrink-0">
                    {{ __('Mobile number')}}
                </label>
                <input type="text" name="mobile_number" id="mobile_number"
                       class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-100 rounded-md"
                       value="" >
                </input>
            </div>
            <div class="flex flex-col sm:flex-row justify-between border-2 border-gray-200 rounded-sm">
                <label for="email" class="block font-semibold text-white bg-blue-600 w-full sm:w-[200px] h-[100px] px-5 py-5 text-md flex-shrink-0">
                    {{ __('Email')}}
                </label>
                <input type="text" name="email" id="email"
                       class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-100 rounded-md"
                       value="" >
                </input>
            </div>


            <div class="grid grid-cols-3 gap-0 border-2 border-gray-200 rounded-sm w-full">
                <!-- Label Column with Fixed Size -->
                <label for="education" class="block font-semibold text-white bg-blue-600 w-full sm:w-[200px] h-[120px] px-5 py-5 text-md flex-shrink-0">
                    {{ __('Education') }}
                </label>

                <!-- Date Selection Column -->
                <div class="col-span-2 bg-gray-200 px-2 py-3 w-full">
                    <!-- First Entry -->
                    <div class="flex space-x-2 mb-3">
                        <select name="education_year_1" class="w-1/3 focus:ring-blue-500 focus:border-blue-500 border-gray-200 rounded-md text-gray-700">
                            <option value="" selected disabled>Year</option>
                            @for($i = date('Y'); $i >= 1950; $i--)
                                <option value="{{ $i }}">{{ $i }}</option>
                            @endfor
                        </select>

                        <select name="education_month_1" class="w-1/3 focus:ring-blue-500 focus:border-blue-500 border-gray-200 rounded-md text-gray-700">
                            <option value="" selected disabled>Month</option>
                            @foreach(['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'] as $key => $month)
                                <option value="{{ $key + 1 }}">{{ $month }}</option>
                            @endforeach
                        </select>

                        <input type="text" name="education_school_1" placeholder="{{ __('School name') }}" class="w-1/3 focus:ring-blue-500 focus:border-blue-500 border-gray-200 rounded-md text-gray-700">
                    </div>

                    <!-- Second Entry -->
                    <div class="flex space-x-2 mb-3">
                        <select name="education_year_2" class="w-1/3 focus:ring-blue-500 focus:border-blue-500 border-gray-200 rounded-md text-gray-700">
                            <option value="" selected disabled>Year</option>
                            @for($i = date('Y'); $i >= 1950; $i--)
                                <option value="{{ $i }}">{{ $i }}</option>
                            @endfor
                        </select>

                        <select name="education_month_2" class="w-1/3 focus:ring-blue-500 focus:border-blue-500 border-gray-200 rounded-md text-gray-700">
                            <option value="" selected disabled>Month</option>
                            @foreach(['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'] as $key => $month)
                                <option value="{{ $key + 1 }}">{{ $month }}</option>
                            @endforeach
                        </select>

                        <input type="text" name="education_school_2" placeholder="{{ __('School name') }}" class="w-1/3 focus:ring-blue-500 focus:border-blue-500 border-gray-200 rounded-md text-gray-700">
                    </div>

                    <!-- Third Entry -->
                    <div class="flex space-x-2">
                        <select name="education_year_3" class="w-1/3 focus:ring-blue-500 focus:border-blue-500 border-gray-200 rounded-md text-gray-700">
                            <option value="" selected disabled>Year</option>
                            @for($i = date('Y'); $i >= 1950; $i--)
                                <option value="{{ $i }}">{{ $i }}</option>
                            @endfor
                        </select>

                        <select name="education_month_3" class="w-1/3 focus:ring-blue-500 focus:border-blue-500 border-gray-200 rounded-md text-gray-700">
                            <option value="" selected disabled>Month</option>
                            @foreach(['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'] as $key => $month)
                                <option value="{{ $key + 1 }}">{{ $month }}</option>
                            @endforeach
                        </select>

                        <input type="text" name="education_school_3" placeholder="{{ __('School name') }}" class="w-1/3 focus:ring-blue-500 focus:border-blue-500 border-gray-200 rounded-md text-gray-700">
                    </div>
                </div>
            </div>




                 <div class="flex flex-col sm:flex-row justify-between border-2 border-gray-200 rounded-sm">
                    <label for="appear_point" class="block font-semibold text-white bg-blue-600 w-full sm:w-[200px] h-[200px] px-5 py-5 text-md flex-shrink-0">
                        {{ __('Appear point')}}
                    </label>
                    <textarea type="text" name="appear_point" id="appear_point"
                           class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-100 rounded-md"
                           value="" required>
                    </textarea>
                </div>


             <div>
                <div class="flex flex-col sm:flex-row justify-between border-2 border-gray-200 rounded-sm">
                    <label for="name" class="block font-semibold text-white bg-blue-600 w-full sm:w-[200px] h-[200px] px-5 py-5 text-md flex-shrink-0">
                        {{ __('Reason for studying in Japan')}}
                    </label>
                    <textarea type="text" name="study_japan" id="study_japan"
                           class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-100 rounded-md"
                           value="" required>
                    </textarea>
                </div>
            </div>

            <div>
                <div class="flex flex-col sm:flex-row justify-between border-2 border-gray-200 rounded-sm">
                    <label for="skill" class="block font-semibold text-white bg-blue-600 w-full sm:w-[200px] h-[100px] px-5 py-5 text-md flex-shrink-0">
                        {{ __('Skill')}}
                    </label>
                    <input type="text" name="skill" id="skill"
                           class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-100 rounded-md"
                           value="" required>
                </div>
            </div>

            <div>
                <div class="flex flex-col sm:flex-row justify-between border-2 border-gray-200 rounded-sm">
                    <label for="reason" class="block font-semibold text-white bg-blue-600 w-full sm:w-[200px] h-[200px] px-5 py-5 text-md flex-shrink-0">
                        {{ __('Reasons for applying')}}
                    </label>
                    <textarea type="text" name="reason" id="reason"
                           class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-100 rounded-md"
                           value="" required>
                    </textarea>
                </div>
            </div>

            <div>
                <div class="flex flex-col sm:flex-row justify-between border-2 border-gray-200 rounded-sm">
                    <label for="language" class="block font-semibold text-white bg-blue-600 w-full sm:w-[200px] h-[100px] px-5 py-5 text-md flex-shrink-0">
                        {{ __('Language Ability')}}
                    </label>
                    <input type="text" name="language" id="language"
                           class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-100 rounded-md"
                           value="" required>
                </div>
            </div>

            <div>
                <div class="flex flex-col sm:flex-row justify-between border-2 border-gray-200 rounded-sm">
                    <label for="license" class="block font-semibold text-white bg-blue-600 w-full sm:w-[200px] h-[100px] px-5 py-5 text-md flex-shrink-0">
                        {{ __('Driver licence and Qualifications')}}
                    </label>
                    <input type="text" name="license" id="license"
                           class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-100 rounded-md"
                           value="" required>
                </div>
            </div>

            <div>
                <div class="flex flex-col sm:flex-row justify-between border-2 border-gray-200 rounded-sm">
                    <label for="hobby" class="block font-semibold text-white bg-blue-600 w-full sm:w-[200px] h-[100px] px-5 py-5 text-md flex-shrink-0">
                        {{ __('Hobby and speciality')}}
                    </label>
                    <input type="text" name="hobby" id="hobby"
                           class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-100 rounded-md"
                           value="" required>
                </div>
            </div>

            <div>
                <div class="flex flex-col sm:flex-row justify-between border-2 border-gray-200 rounded-sm">
                    <label for="part_time" class="block font-semibold text-white bg-blue-600 w-full sm:w-[200px] h-[100px] px-5 py-5 text-md flex-shrink-0">
                        {{ __('Part time job experience')}}
                    </label>
                    <input type="text" name="part_time" id="part_time"
                           class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-100 rounded-md"
                           value="" required>
                </div>
            </div>
        </div>












            <div class="flex items-center justify-end mt-4 mb-5">


        <button type="submit" class="px-2 py-3 bg-blue-500 rounded-2xl text-white font-semibold hover:bg-blue-700">
         {{ __('Save and Sent') }}
        </button>
            </div>
        </form>




    </div>
</div>
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







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




<div class="max-w-5xl mx-auto bg-white shadow-xl rounded-xl overflow-hidden ">

    <div class="bg-gradient-to-r from-sky-500 to-sky-700 px-8 py-12">
        <h2 class="text-2xl font-bold text-white text-center">{{ __('Sign up Form') }}</h2>


    </div>

    <div class="shadow sm:rounded-lg border border-gray-300">
        <div class="flex justify-end mb-2 mt-2 px-2">
            <input type="date" id="currentDate">
        </div>

        <form method="POST" action="{{ route('register') }}" class="space-y-0.5 p-2" enctype="multipart/form-data">
            @csrf





            <div class="flex justify-between md:space-x-3 sm:space-x-1">

                <div class="md:w-3/5 sm:w-3/5 flex-shrink-0 mt-2">

                    <div class="flex flex-col sm:flex-row justify-normal border-2 border-gray-200 rounded-sm">
                        <label for="furigana" class="block font-semibold text-white bg-sky-600 sm:w-[200px] md:h-[80px] sm:h-[50px] px-5 py-5 text-md">
                            {{ __('Furigana') }}
                        </label>
                        <input class="px-5 py-3 text-sm text-gray-700 w-full @error('furigana') border-red-300 @enderror"
                            name="furigana" id="furigana" type="text" value="{{ old('furigana') }}" required placeholder="{{ __('Please enter furigana') }}">
                        </input>

                        @error('furigana')
                        <p class="text-red-300 text-xs mt-1">{{ $message }}</p>
                    @enderror


                    </div>

                    <div class="flex flex-col sm:flex-row justify-normal border-2 border-gray-200 rounded-sm">
                        <label for="name" class="block font-semibold text-white bg-sky-600 sm:w-[200px] md:h-[80px] sm:h-[50px] px-5 py-5 text-md">
                            {{ __('Name') }}
                        </label>
                        <input class="px-5 py-3 text-sm text-gray-700 w-full @error('name') border-red-300 @enderror"
                            name="name" id="name" type="text" value="{{ old('name') }}" required placeholder="{{ __('Please enter your name') }}" required>
                        </input>

                        @error('name')
                        <p class="text-red-300 text-xs mt-1">{{ $message }}</p>
                    @enderror




                    </div>


                </div>






                <div class="md:w-2/5 sm:2/5 bg-white p-4 flex flex-col items-center space-y-2">
                    <label for="imageUpload" class="cursor-pointer">
                        <div class="w-40 h-40 bg-gray-200 flex items-center justify-center rounded-md overflow-hidden">
                            <img id="selectedImage" src="#" alt="Selected Image" class="hidden w-40 h-40 object-cover">
                            <span class="text-gray-500" id="placeholderText">{{ __('Select Image') }}</span>
                        </div>
                    </label>
                    <input type="file" id="imageUpload" name="profile_image" class="hidden" accept="image/*" onchange="previewImage(event)">
                </div>



            </div>

            <div class="flex justify-between space-x-3">
                <div class="w-3/5 ">
                           <!-- Email Address -->
                           <div class="flex flex-col sm:flex-row justify-between border-2 border-gray-200 rounded-sm">
                            <label for="name" class="block font-semibold text-white bg-sky-600 sm:w-[200px] md:h-[60px] sm:h-[50px] px-5 py-5 text-md">
                                {{ __('Date of Birth') }}
                            </label>


                    <div class="flex w-full sm:h-[60px] h-[50px] px-4 py-2 bg-gray-100 border-gray-200">

                        <select name="year" class="w-1/3 focus:ring-blue-500 focus:border-blue-500 border-gray-200 rounded-r-md text-gray-700">
                            <option value="" selected disabled>{{ __('Year') }}</option>
                            @for($i = date('Y'); $i >= 1900; $i--)
                                <option value="{{ $i }}">{{ $i }}</option>
                            @endfor
                        </select>

                        <select name="month" class="w-1/3 focus:ring-blue-500 focus:border-blue-500 border-gray-200 text-gray-700 mr-1">
                            <option value="" selected disabled>{{ __('Month') }}</option>
                            @foreach([
                                      1 =>__('January'),
                                2 =>__('February'),
                                3 =>__('March'),
                                4 =>__('April'),
                                5 =>__('May'),
                                6 =>__('June'),
                                7 =>__('July'),
                                8 =>__('August'),
                                9 =>__('September'),
                                10 =>__('October'),
                                11 =>__('November'),
                                12 =>__('December')
                                ] as $key => $month)
                                <option value="{{ $key + 1 }}">{{ $month }}</option>
                            @endforeach
                        </select>


                            <select name="day" class="w-1/3 focus:ring-blue-500 focus:border-blue-500 border-gray-200 rounded-l-md text-gray-700 mr-1">
                                <option value="" selected disabled>{{ __('Day') }}</option>
                                @for($i = 1; $i <= 31; $i++)
                                    <option value="{{ $i }}">{{ $i }}</option>
                                @endfor
                            </select>


                        </div>
                    </div>

                </div>


                <div class="w-2/5 px-2">

                                        <!-- Gender -->
                   <div class="mt-2 flex justify-normal">


                            <label for="name" class="block font-semibold text-white bg-sky-600 sm:w-[100px] h-auto sm:h-[50px] px-5 py-5 text-md">{{ __('Gender') }}</label>

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



            <div class="flex flex-col sm:flex-row justify-normal border-2 border-gray-200 rounded-sm">
                <label for="address" class="block font-semibold text-white bg-sky-600 sm:w-[200px] h-auto sm:h-[50px] px-5 py-5 text-md">
                    {{ __('Address') }}
                </label>
                <input class="px-5 py-3 text-sm text-gray-700 w-full @error('name') border-red-300 @enderror"
                    name="address" id="address" type="text" value="{{ old('address') }}" required placeholder="{{ __('Please enter your address') }}" required>
                </input>

                @error('address')
                <p class="text-red-300 text-xs mt-1">{{ $message }}</p>
            @enderror


            </div>

            <div class="flex flex-col sm:flex-row justify-normal border-2 border-gray-200 rounded-sm">
                <label for="phone_number" class="block font-semibold text-white bg-sky-600 sm:w-[200px] h-auto sm:h-[50px] px-5 py-5 text-md">
                    {{ __('Phone number') }}
                </label>
                <input class="px-5 py-3 text-sm text-gray-700 w-full @error('phone_number') border-red-300 @enderror"
                    name="phone_number" id="phone_number" type="text" value="{{ old('phone_number') }}" required placeholder="{{ __('Please enter your phone number') }}" required>
                </input>

                @error('phone_number')
                <p class="text-red-300 text-xs mt-1">{{ $message }}</p>
            @enderror


            </div>

            <div class="flex flex-col sm:flex-row justify-normal border-2 border-gray-200 rounded-sm">
                <label for="mobile_number" class="block font-semibold text-white bg-sky-600 sm:w-[200px] h-auto sm:h-[50px] px-5 py-5 text-md">
                    {{ __('Mobile number') }}
                </label>
                <input class="px-5 py-3 text-sm text-gray-700 w-full @error('mobile_number') border-red-300 @enderror"
                    name="mobile_number" id="mobile_number" type="text" value="{{ old('mobile_number') }}" required placeholder="{{ __('Please enter your mobile number') }}" required>
                </input>

                @error('mobile_number')
                <p class="text-red-300 text-xs mt-1">{{ $message }}</p>
            @enderror


            </div>

            <div class="flex flex-col sm:flex-row justify-normal border-2 border-gray-200 rounded-sm">
                <label for="email" class="block font-semibold text-white bg-sky-600 sm:w-[200px] h-auto sm:h-[50px] px-5 py-5 text-md">
                    {{ __('Email') }}
                </label>
                <input class="px-5 py-3 text-sm text-gray-700 w-full @error('email') border-red-300 @enderror"
                    name="email" id="email" type="email" value="{{ old('email') }}" required placeholder="{{ __('Please enter your email') }}" required>
                </input>

                @error('email')
                <p class="text-red-300 text-xs mt-1">{{ $message }}</p>
            @enderror


            </div>



            <div class="flex flex-col sm:flex-row justify-normal border-2 border-gray-200 rounded-sm w-full">
                <!-- Label Column with Fixed Width to Match Other Labels -->
                <label for="education" class="block font-semibold text-white bg-sky-600 sm:w-[200px] md:h-40 sm:h-[50px] px-5 py-5 text-md">
                    {{ __('Education') }}
                </label>

                <!-- Date Selection Column -->
                <div class="col-span-2 bg-gray-200  py-4 w-full">
                    <!-- First Entry -->
                    <div class="flex space-x-2 mb-3">
                        <select name="education_year_1" class="w-1/3 focus:ring-blue-500 focus:border-blue-500 border-gray-200 rounded-md text-gray-700">
                            <option value="" selected disabled>{{ __('Year') }}</option>
                            @for($i = date('Y'); $i >= 1950; $i--)
                                <option value="{{ $i }}">{{ $i }}</option>
                            @endfor
                        </select>

                        <select name="education_month_1" class="w-1/3 focus:ring-blue-500 focus:border-blue-500 border-gray-200 rounded-md text-gray-700">
                            <option value="" selected disabled>{{ __('Month') }}</option>
                            @foreach([
                                1 =>__('January'),
                                2 =>__('February'),
                                3 =>__('March'),
                                4 =>__('April'),
                                5 =>__('May'),
                                6 =>__('June'),
                                7 =>__('July'),
                                8 =>__('August'),
                                9 =>__('September'),
                                10 =>__('October'),
                                11 =>__('November'),
                                12 =>__('December'),

                                ] as $key => $month)
                                <option value="{{ $key + 1 }}">{{ $month }}</option>
                            @endforeach
                        </select>

                        <input type="text" name="education_school_1" placeholder="{{ __('School name') }}" class="w-1/3 focus:ring-blue-500 focus:border-blue-500 border-gray-200 rounded-md text-gray-700">
                    </div>

                    <!-- Second Entry -->
                    <div class="flex space-x-2 mb-3">
                        <select name="education_year_2" class="w-1/3 focus:ring-blue-500 focus:border-blue-500 border-gray-200 rounded-md text-gray-700">
                            <option value="" selected disabled>{{ __('Year') }}</option>
                            @for($i = date('Y'); $i >= 1950; $i--)
                                <option value="{{ $i }}">{{ $i }}</option>
                            @endfor
                        </select>

                        <select name="education_month_2" class="w-1/3 focus:ring-blue-500 focus:border-blue-500 border-gray-200 rounded-md text-gray-700">
                            <option value="" selected disabled>{{ __('Month') }}</option>
                            @foreach([
                                   1 =>__('January'),
                                2 =>__('February'),
                                3 =>__('March'),
                                4 =>__('April'),
                                5 =>__('May'),
                                6 =>__('June'),
                                7 =>__('July'),
                                8 =>__('August'),
                                9 =>__('September'),
                                10 =>__('October'),
                                11 =>__('November'),
                                12 =>__('December')
                                ] as $key => $month)
                                <option value="{{ $key + 1 }}">{{ $month }}</option>
                            @endforeach
                        </select>

                        <input type="text" name="education_school_2" placeholder="{{ __('School name') }}" class="w-1/3 focus:ring-blue-500 focus:border-blue-500 border-gray-200 rounded-md text-gray-700">
                    </div>

                    <!-- Third Entry -->
                    <div class="flex space-x-2">
                        <select name="education_year_3" class="w-1/3 focus:ring-blue-500 focus:border-blue-500 border-gray-200 rounded-md text-gray-700">
                            <option value="" selected disabled>{{ __('Year') }}</option>
                            @for($i = date('Y'); $i >= 1950; $i--)
                                <option value="{{ $i }}">{{ $i }}</option>
                            @endfor
                        </select>

                        <select name="education_month_3" class="w-1/3 focus:ring-blue-500 focus:border-blue-500 border-gray-200 rounded-md text-gray-700">
                            <option value="" selected disabled>{{ __('Month') }}</option>
                            @foreach([
                                 1 =>__('January'),
                                2 =>__('February'),
                                3 =>__('March'),
                                4 =>__('April'),
                                5 =>__('May'),
                                6 =>__('June'),
                                7 =>__('July'),
                                8 =>__('August'),
                                9 =>__('September'),
                                10 =>__('October'),
                                11 =>__('November'),
                                12 =>__('December')
                                ] as $key => $month)
                                <option value="{{ $key + 1 }}">{{ $month }}</option>
                            @endforeach
                        </select>

                        <input type="text" name="education_school_3" placeholder="{{ __('School name') }}" class="w-1/3 focus:ring-blue-500 focus:border-blue-500 border-gray-200 rounded-md text-gray-700">
                    </div>
                </div>
            </div>









            <div class="flex flex-col sm:flex-row justify-normal border-2 border-gray-200 rounded-sm">
                <!-- Label with increased height and padding -->
                <label for="appear_point" class="block font-semibold text-white bg-sky-600 sm:w-[200px] md:h-40 sm:h-[70px] px-5 py-6 text-md flex items-center">
                    {{ __('Appear point') }}
                </label>
                <!-- Textarea with increased height -->
                <textarea class="px-5 py-4 text-sm text-gray-700 w-full h-40 @error('appear_point') border-red-300 @enderror"
                    name="appear_point" id="appear_point" required placeholder="{{ __('Please enter your appear point') }}">{{ old('appear_point') }}</textarea>

                @error('appear_point')
                    <p class="text-red-300 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex flex-col sm:flex-row justify-normal border-2 border-gray-200 rounded-sm">
                <!-- Label with increased height and padding -->
                <label for="study_japan" class="block font-semibold text-white bg-sky-600 sm:w-[200px] md:h-40 sm:h-[70px] px-5 py-6 text-md flex items-center">
                    {{ __('Reason for studying in Japan') }}
                </label>
                <!-- Textarea with increased height -->
                <textarea class="px-5 py-4 text-sm text-gray-700 w-full h-40 @error('study_japan') border-red-300 @enderror"
                    name="study_japan" id="study_japan" required placeholder="{{ __('Please enter your reason for studying japan') }}">{{ old('study_japan') }}</textarea>

                @error('study_japan')
                    <p class="text-red-300 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>








            <div class="flex flex-col sm:flex-row justify-normal border-2 border-gray-200 rounded-sm">
                <label for="skill" class="block font-semibold text-white bg-sky-600 sm:w-[200px] h-auto sm:h-[50px] px-5 py-5 text-md">
                    {{ __('Skill') }}
                </label>
                <input class="px-5 py-3 text-sm text-gray-700 w-full @error('skill') border-red-300 @enderror"
                    name="skill" id="skill" type="text" value="{{ old('skill') }}" required placeholder="{{ __('Please enter your skill') }}" required>
                </input>

                @error('skill')
                <p class="text-red-300 text-xs mt-1">{{ $message }}</p>
            @enderror


            </div>







            <div class="flex flex-col sm:flex-row justify-normal border-2 border-gray-200 rounded-sm">
                <!-- Label with increased height and padding -->
                <label for="reason" class="block font-semibold text-white bg-sky-600 sm:w-[200px] md:h-40 sm:h-[70px] px-5 py-6 text-md flex items-center">
                    {{ __('Reasons for applying') }}
                </label>
                <!-- Textarea with increased height -->
                <textarea class="px-5 py-4 text-sm text-gray-700 w-full h-40 @error('reason') border-red-300 @enderror"
                    name="reason" id="reason" required placeholder="{{ __('Please enter your appear point') }}">{{ old('reason') }}</textarea>

                @error('reason')
                    <p class="text-red-300 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>



            <div class="flex flex-col sm:flex-row justify-normal border-2 border-gray-200 rounded-sm">
                <label for="language" class="block font-semibold text-white bg-sky-600 sm:w-[200px] h-auto sm:h-[50px] px-5 py-5 text-md">
                    {{ __('Language Ability') }}
                </label>
                <input class="px-5 py-3 text-sm text-gray-700 w-full @error('language') border-red-300 @enderror"
                    name="language" id="language" type="text" value="{{ old('language') }}" required placeholder="{{ __('Please enter your language skill') }}" required>
                </input>

                @error('language')
                <p class="text-red-300 text-xs mt-1">{{ $message }}</p>
            @enderror


            </div>

            <div class="flex flex-col sm:flex-row justify-normal border-2 border-gray-200 rounded-sm">
                <label for="license" class="block font-semibold text-white bg-sky-600 sm:w-[200px] h-auto sm:h-[50px] px-5 py-5 text-md">
                    {{ __('Driver licence and Qualifications') }}
                </label>
                <input class="px-5 py-3 text-sm text-gray-700 w-full @error('license') border-red-300 @enderror"
                    name="license" id="license" type="text" value="{{ old('license') }}" required placeholder="{{ __('Please enter your licenses') }}" required>
                </input>

                @error('license')
                <p class="text-red-300 text-xs mt-1">{{ $message }}</p>
            @enderror


            </div>

            <div class="flex flex-col sm:flex-row justify-normal border-2 border-gray-200 rounded-sm">
                <label for="hobby" class="block font-semibold text-white bg-sky-600 sm:w-[200px] h-auto sm:h-[50px] px-5 py-5 text-md">
                    {{ __('Hobby and speciality') }}
                </label>
                <input class="px-5 py-3 text-sm text-gray-700 w-full @error('hobby') border-red-300 @enderror"
                    name="hobby" id="hobby" type="text" value="{{ old('hobby') }}" required placeholder="{{ __('Please enter your hobby') }}" required>
                </input>

                @error('hobby')
                <p class="text-red-300 text-xs mt-1">{{ $message }}</p>
            @enderror


            </div>

            <div class="flex flex-col sm:flex-row justify-normal border-2 border-gray-200 rounded-sm">
                <label for="part_time" class="block font-semibold text-white bg-sky-600 sm:w-[200px] h-auto sm:h-[50px] px-5 py-5 text-md">
                    {{ __('Part time job experience') }}
                </label>
                <input class="px-5 py-3 text-sm text-gray-700 w-full @error('part_time') border-red-300 @enderror"
                    name="part_time" id="part_time" type="text" value="{{ old('part_time') }}" required placeholder="{{ __('Please enter your part time job experience') }}" required>
                </input>

                @error('part_time')
                <p class="text-red-300 text-xs mt-1">{{ $message }}</p>
            @enderror


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






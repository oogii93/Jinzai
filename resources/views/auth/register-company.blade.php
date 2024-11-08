
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
        <h2 class="text-2xl font-bold text-gray-800 text-center">{{ __('Sign up Form for Company') }}</h2>


    </div>

    <form method="POST" action="{{ route('register') }}" class="space-y-0.5 p-2" enctype="multipart/form-data">
        @csrf





        <div class="flex justify-between space-x-3">

            <div class="w-4/5">

                <input type="hidden" name="role" value="company">

                <div class="mt-4 hidden">
                    <label for="role">Role</label>
                    <select id="role" name="role" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm">
                        <option value="jobseeker">Job Seeker</option>
                        <option value="company" selected>Company</option>
                    </select>
                </div>


                <div class="w-1/5 bg-gray-100 p-4 flex flex-col items-center space-y-2">
                    <label for="imageUpload" class="cursor-pointer">
                        <div class="w-full h-full bg-gray-200 flex items-center justify-center rounded-md overflow-hidden">
                            <img id="selectedImage" src="#" alt="Selected Image" class="hidden w-full h-full object-cover">
                            <span class="text-gray-500" id="placeholderText">{{ __('Select Image') }}</span>
                        </div>
                    </label>
                    <input type="file" id="imageUpload" name="profile_image" class="hidden" accept="image/*" onchange="previewImage(event)">

                    @error('profile_image')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror


                </div>

                <div class="flex flex-col sm:flex-row justify-between border-2 border-gray-200 rounded-sm">
                    <label for="email" class="block font-semibold text-white bg-blue-600 w-full sm:w-[200px] h-[100px] px-5 py-5 text-md flex-shrink-0">
                        {{ __('Email')}}
                    </label>
                    <input type="text" name="email" id="email"
                           class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-100 rounded-md @error('email') border-red-300 @enderror"
                           value="{{ old('email') }}" >
                    </input>
                    @error('email')
                        <p class="text-red-300 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex flex-col sm:flex-row justify-between border-2 border-gray-200 rounded-sm">
                    <label for="address" class="block font-semibold text-white bg-blue-600 w-full sm:w-[200px] h-[100px] px-5 py-5 text-md flex-shrink-0">
                        {{ __('Address')}}
                    </label>
                    <input type="text" name="address" id="address"
                           class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-100 rounded-md @error('address') border-red-300 @enderror"
                           value="{{ old('address') }}" >
                    </input>

                    @error('address')
                    <p class="text-red-300 text-xs mt-1">{{ $message }}</p>
                @enderror
                </div>

                <div class="flex flex-col sm:flex-row justify-between border-2 border-gray-200 rounded-sm">
                    <label for="phone_number" class="block font-semibold text-white bg-blue-600 w-full sm:w-[200px] h-[100px] px-5 py-5 text-md flex-shrink-0">
                        {{ __('Phone number')}}
                    </label>
                    <input type="text" name="phone_number" id="phone_number"
                           class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-100 rounded-md @error('phone_number') border-red-300 @enderror"
                           value="{{ old('phone_number') }}" >
                    </input>

                    @error('phone_number')
                    <p class="text-red-300 text-xs mt-1">{{ $message }}</p>
                @enderror
                </div>


                <div class="flex flex-col sm:flex-row justify-between border-2 border-gray-200 rounded-sm">
                    <label for="mobile_number" class="block font-semibold text-white bg-blue-600 w-full sm:w-[200px] h-[100px] px-5 py-5 text-md flex-shrink-0">
                        {{ __('Mobile number')}}
                    </label>
                    <input type="text" name="mobile_number" id="mobile_number"
                           class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-100 rounded-md @error('mobile_number') border-red-300 @enderror"
                           value="{{ old('mobile_number') }}" >
                    </input>

                    @error('mobile_number')
                    <p class="text-red-300 text-xs mt-1">{{ $message }}</p>
                @enderror
                </div>


                <div class="flex flex-col sm:flex-row justify-between border-2 border-gray-200 rounded-sm">
                    <label for="name" class="block font-semibold text-white bg-blue-600 w-full sm:w-[200px] h-[100px] px-5 py-5 text-md flex-shrink-0">
                        {{ __('Company Name')}}
                    </label>
                    <input type="text" name="name" id="name"
                           class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-100 rounded-md @error('name') border-red-300 @enderror"
                           value="{{ old('name') }}" >
                    </input>

                    @error('name')
                    <p class="text-red-300 text-xs mt-1">{{ $message }}</p>
                    @enderror

                </div>

                <div class="flex flex-col sm:flex-row justify-between border-2 border-gray-200 rounded-sm">
                    <label for="company_description" class="block font-semibold text-white bg-blue-600 w-full sm:w-[200px] h-[100px] px-5 py-5 text-md flex-shrink-0">
                        {{ __('company_description')}}
                    </label>
                    <input type="text" name="company_description" id="company_description"
                           class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-100 rounded-md @error('company_description') border-red-300 @enderror"
                           value="{{ old('company_description') }}" >
                    </input>

                    @error('company_description')
                    <p class="text-red-300 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>


                <div class="flex flex-col sm:flex-row justify-between border-2 border-gray-200 rounded-sm">
                    <label for="industry" class="block font-semibold text-white bg-blue-600 w-full sm:w-[200px] h-[100px] px-5 py-5 text-md flex-shrink-0">
                        {{ __('industry')}}
                    </label>
                    <input type="text" name="industry" id="industry"
                           class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-100 rounded-md @error('industry') border-red-300 @enderror"
                           value="{{ old('industry') }}" >

                    @error('industry')
                    <p class="text-red-300 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Add the missing website field -->
                <div class="flex flex-col sm:flex-row justify-between border-2 border-gray-200 rounded-sm">
                    <label for="website" class="block font-semibold text-white bg-blue-600 w-full sm:w-[200px] h-[100px] px-5 py-5 text-md flex-shrink-0">
                        {{ __('Website URL')}}
                    </label>
                    <input type="url" name="website" id="website"
                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-100 rounded-md @error('website') border-red-300 @enderror"
                        value="{{ old('website') }}" >

                    @error('website')
                    <p class="text-red-300 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>




            <div class="flex items-center justify-end mt-4 mb-5">


                <button type="submit" class="px-2 py-3 bg-blue-500 rounded-2xl text-white font-semibold hover:bg-blue-700">
                 {{ __('Save and Sent') }}
                </button>
            </div>


     </form>

     <script>
        function previewImage(event) {
            const input = event.target;
            const preview = document.getElementById('selectedImage');
            const placeholderText = document.getElementById('placeholderText');

            if (input.files && input.files[0]) {
                const file = input.files[0];

                // Check file size (limit to 2MB)
                if (file.size > 10 * 1024 * 1024) {
                    alert('Image size should be less than 2MB');
                    input.value = '';
                    return;
                }

                // Check file type
                if (!file.type.startsWith('image/')) {
                    alert('Please select an image file');
                    input.value = '';
                    return;
                }

                const reader = new FileReader();

                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.classList.remove('hidden');
                    placeholderText.classList.add('hidden');
                }

                reader.readAsDataURL(file);
            }
        }
        </script>






</div>

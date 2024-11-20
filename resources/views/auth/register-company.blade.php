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



<div class="max-w-5xl mx-auto bg-white shadow-xl rounded-xl overflow-hidden mt-8">

    <div class="bg-gradient-to-r from-sky-600 to-green-600 px-8 py-12">
        <h2 class="text-2xl font-bold text-gray-800 text-center">企業登録フォーム</h2>


    </div>

    <form method="POST" action="{{ route('register') }}" class="space-y-0.5 p-2" enctype="multipart/form-data">
        @csrf





        <div class="w-full space-x-3">

            <div class="w-full">

                <input type="hidden" name="role" value="company">

                <div class="mt-4 hidden">
                    <label for="role">Role</label>
                    <select id="role" name="role"
                        class="block mt-1 w-full border-gray-300 rounded-md shadow-sm">
                        <option value="jobseeker">Job Seeker</option>
                        <option value="company" selected>Company</option>
                    </select>
                </div>


                <div class="w-40 h-40 bg-gray-100 p-4 flex flex-col items-center space-y-2 rounded-lg mb-2">
                    <label for="imageUpload" class="cursor-pointer">
                        <div
                            class="w-full h-full bg-gray-200 flex items-center justify-center rounded-md overflow-hidden">
                            <img id="selectedImage" src="#" alt="Selected Image"
                                class="hidden w-32 h-32 object-cover">
                            <span class="text-gray-500" id="placeholderText">写真選択</span>
                        </div>
                    </label>
                    <input type="file" id="imageUpload" name="profile_image" class="hidden" accept="image/*"
                        onchange="previewImage(event)">

                    @error('profile_image')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror


                </div>



                <div class="flex flex-col sm:flex-row justify-normal border-2 border-gray-200 rounded-sm">
                    <label for="email" class="block font-semibold text-white bg-sky-600 sm:w-[200px] h-auto sm:h-[50px] px-5 py-5 text-md">
                        メール
                    </label>
                    <input class="px-5 py-3 text-sm text-gray-700 w-full @error('email') border-red-300 @enderror"
                        name="email" id="email" type="email" value="{{ old('email') }}" required placeholder="会社のメールアドレスを入力してください">
                    </input>

                    @error('email')
                    <p class="text-red-300 text-xs mt-1">{{ $message }}</p>
                @enderror


                </div>

                <div class="flex flex-col sm:flex-row justify-normal border-2 border-gray-200 rounded-sm">
                    <label for="address" class="block font-semibold text-white bg-sky-600 sm:w-[200px] h-auto sm:h-[50px] px-5 py-5 text-md">
                        現住所
                    </label>
                    <input class="px-5 py-3 text-sm text-gray-700 w-full @error('address') border-red-300 @enderror"
                        name="address" id="address" type="text" value="{{ old('address') }}" required placeholder="企業の住所を入力してください。">
                    </input>

                    @error('address')
                    <p class="text-red-300 text-xs mt-1">{{ $message }}</p>
                @enderror


                </div>


                <div class="flex flex-col sm:flex-row justify-normal border-2 border-gray-200 rounded-sm">
                    <label for="phone_number" class="block font-semibold text-white bg-sky-600 sm:w-[200px] h-auto sm:h-[50px] px-5 py-5 text-md">
                        電話番号
                    </label>
                    <input class="px-5 py-3 text-sm text-gray-700 w-full @error('phone_number') border-red-300 @enderror"
                        name="phone_number" id="phone_number" type="text" value="{{ old('phone_number') }}" required placeholder="電話番号を入力してください。">
                    </input>

                    @error('phone_number')
                    <p class="text-red-300 text-xs mt-1">{{ $message }}</p>
                @enderror


                </div>

                <div class="flex flex-col sm:flex-row justify-normal border-2 border-gray-200 rounded-sm">
                    <label for="mobile_number" class="block font-semibold text-white bg-sky-600 sm:w-[200px] h-auto sm:h-[50px] px-5 py-5 text-md">
                     携帯電話番号
                    </label>
                    <input class="px-5 py-3 text-sm text-gray-700 w-full @error('mobile_number') border-red-300 @enderror"
                        name="mobile_number" id="mobile_number" type="text" value="{{ old('mobile_number') }}" required placeholder="携帯電話番号を入力してください。">
                    </input>

                    @error('mobile_number')
                    <p class="text-red-300 text-xs mt-1">{{ $message }}</p>
                @enderror


                </div>



                <div class="flex flex-col sm:flex-row justify-normal border-2 border-gray-200 rounded-sm">
                    <label for="name" class="block font-semibold text-white bg-sky-600 sm:w-[200px] h-auto sm:h-[50px] px-5 py-5 text-md">
                       企業名
                    </label>
                    <input class="px-5 py-3 text-sm text-gray-700 w-full @error('name') border-red-300 @enderror"
                        name="name" id="name" type="text" value="{{ old('name') }}" required placeholder="企業名を入力してください。">
                    </input>

                    @error('name')
                    <p class="text-red-300 text-xs mt-1">{{ $message }}</p>
                @enderror


                </div>




                <div class="flex flex-col sm:flex-row justify-normal border-2 border-gray-200 rounded-sm">
                    <label for="company_description" class="block font-semibold text-white bg-sky-600 sm:w-[200px] h-auto sm:h-[50px] px-5 py-5 text-md">
                        企業情報
                    </label>
                    <input class="px-5 py-3 text-sm text-gray-700 w-full @error('company_description') border-red-300 @enderror"
                        name="company_description" id="company_description" type="text" value="{{ old('company_description') }}" required placeholder="企業情報を入力してください。">
                    </input>

                    @error('company_description')
                    <p class="text-red-300 text-xs mt-1">{{ $message }}</p>
                @enderror


                </div>




                <div class="flex flex-col sm:flex-row justify-normal border-2 border-gray-200 rounded-sm">
                    <label for="industry" class="block font-semibold text-white bg-sky-600 sm:w-[200px] h-auto sm:h-[50px] px-5 py-5 text-md">
                        業種
                    </label>
                    <input class="px-5 py-3 text-sm text-gray-700 w-full @error('industry') border-red-300 @enderror"
                        name="industry" id="industry" type="text" value="{{ old('industry') }}" required placeholder=" 業種を入力してください。">
                    </input>

                    @error('industry')
                    <p class="text-red-300 text-xs mt-1">{{ $message }}</p>
                @enderror


                </div>

                <!-- Add the missing website field -->
                <div class="flex flex-col sm:flex-row justify-normal border-2 border-gray-200 rounded-sm">
                    <label for="website" class="block font-semibold text-white bg-sky-600 sm:w-[200px] h-auto sm:h-[50px] px-5 py-5 text-md">
                        ウェブサイト
                    </label>
                    <input class="px-5 py-3 text-sm text-gray-700 w-full @error('website') border-red-300 @enderror"
                    name="website" id="website" type="text" value="{{ old('website') }}" required placeholder="ウェブサイトのURLを入力してください。">
                </input>

                        @error('website')
                        <p class="text-red-300 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>







                <div class="flex items-center justify-end mt-4 mb-5">


                    <button type="submit"
                        class="px-2 py-3 bg-blue-500 rounded-2xl text-white font-semibold hover:bg-blue-700">
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

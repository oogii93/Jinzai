<x-app-layout>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-10 ">
        <div class="mb-6">
            <h2 class="text-2xl font-bold text-gray-800 text-center">{{ __('Company information') }}</h2>
        </div>

        <div class="shadow sm:rounded-lg border border-gray-300 bg-white">
            <div class="flex justify-end mb-2 mt-2 px-2">
                <h1>
                    {{ $user->created_at }}

            </h1>
            </div>

            <div method="POST" action="" class="space-y-0.5 p-2" enctype="multipart/form-data">
                @csrf





                <div class="flex justify-between space-x-3">

                    <div class="w-4/5">

                        <div class="flex flex-col sm:flex-row justify-between border-2 border-gray-200 rounded-sm">
                            <label for="name" class="block font-semibold text-white bg-blue-600 w-full sm:w-[200px] h-[100px] px-5 py-5 text-md flex-shrink-0">
                                {{ __('Company Name')}}
                            </label>
                            <input type="text" name="name" id="name"
                                   class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-100 rounded-md"
                                   value="{{ $user->name }}" required>
                        </div>


                    </div>




                    <div class="w-1/5 bg-gray-100 p-4 flex flex-col items-center space-y-2">
                        <label for="imageUpload" class="cursor-pointer">
                            <div class="w-full h-full bg-gray-200 flex items-center justify-center rounded-md overflow-hidden">
                                <!-- Display the user's profile image if it exists -->
                                @if($user->profile_image)
                                    <img id="selectedImage" src="{{ asset('storage/' . $user->profile_image) }}" alt="Profile Image" class="w-full h-full object-cover">
                                @else
                                    <!-- Show placeholder if no image is found -->
                                    <img id="selectedImage" src="#" alt="Selected Image" class="hidden w-full h-full object-cover">
                                    <span class="text-gray-500" id="placeholderText">{{ __('Select Image') }}</span>
                                @endif
                            </div>
                        </label>
                        <input type="file" id="imageUpload" name="profile_image" class="hidden" accept="image/*" onchange="previewImage(event)">
                    </div>



                </div>









                <div class="flex flex-col sm:flex-row justify-between border-2 border-gray-200 rounded-sm">
                    <label for="address" class="block font-semibold text-white bg-blue-600 w-full sm:w-[200px] h-[100px] px-5 py-5 text-md flex-shrink-0">
                        {{ __('Address')}}
                    </label>
                    <input type="text" name="address" id="address"
                           class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-100 rounded-md"
                           value="{{ $user->address }}" >
                    </input>
                </div>
                <div class="flex flex-col sm:flex-row justify-between border-2 border-gray-200 rounded-sm">
                    <label for="phone_number" class="block font-semibold text-white bg-blue-600 w-full sm:w-[200px] h-[100px] px-5 py-5 text-md flex-shrink-0">
                        {{ __('Phone number')}}
                    </label>
                    <input type="text" name="phone_number" id="phone_number"
                           class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-100 rounded-md"
                           value="{{ $user->phone_number }}" >
                    </input>
                </div>

                <div class="flex flex-col sm:flex-row justify-between border-2 border-gray-200 rounded-sm">
                    <label for="mobile_number" class="block font-semibold text-white bg-blue-600 w-full sm:w-[200px] h-[100px] px-5 py-5 text-md flex-shrink-0">
                        {{ __('Mobile number')}}
                    </label>
                    <input type="text" name="mobile_number" id="mobile_number"
                           class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-100 rounded-md"
                           value="{{ $user->mobile_number }}" >
                    </input>
                </div>

                <div class="flex flex-col sm:flex-row justify-between border-2 border-gray-200 rounded-sm">
                    <label for="email" class="block font-semibold text-white bg-blue-600 w-full sm:w-[200px] h-[100px] px-5 py-5 text-md flex-shrink-0">
                        {{ __('Email')}}
                    </label>
                    <input type="text" name="email" id="email"
                           class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-100 rounded-md"
                           value="{{ $user->email }}" >
                    </input>
                </div>
                <div class="flex flex-col sm:flex-row justify-between border-2 border-gray-200 rounded-sm">
                    <label for="email" class="block font-semibold text-white bg-blue-600 w-full sm:w-[200px] h-[100px] px-5 py-5 text-md flex-shrink-0">
                        {{ __('Company description')}}
                    </label>
                    <input type="text" name="email" id="email"
                           class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-100 rounded-md"
                           value="{{ $user->companyProfile->company_description ?? '' }}">
                    </input>
                </div>
                <div class="flex flex-col sm:flex-row justify-between border-2 border-gray-200 rounded-sm">
                    <label for="email" class="block font-semibold text-white bg-blue-600 w-full sm:w-[200px] h-[100px] px-5 py-5 text-md flex-shrink-0">
                        {{ __('Industry')}}
                    </label>
                    <input type="text" name="email" id="email"
                           class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-100 rounded-md"
                           value="{{ $user->companyProfile->industry ?? '' }}">
                    </input>
                </div>
                <div class="flex flex-col sm:flex-row justify-between border-2 border-gray-200 rounded-sm">
                    <label for="email" class="block font-semibold text-white bg-blue-600 w-full sm:w-[200px] h-[100px] px-5 py-5 text-md flex-shrink-0">
                        {{ __('Website')}}
                    </label>
                    <input type="text" name="email" id="email"
                           class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-100 rounded-md"
                           value="{{ $user->companyProfile->website ?? '' }}">
                    </input>
                </div>






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
    </x-app-layout>

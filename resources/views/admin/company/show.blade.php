<x-app-layout>

    <div class="max-w-5xl mx-auto bg-white shadow-xl rounded-xl overflow-hidden mt-8">
        <!-- Header Section with Profile Image -->
        <div class="bg-gradient-to-r from-sky-600 to-orange-800 px-8 py-12">
            <div class="flex items-center space-x-8">
                <!-- Profile Image -->
                <div class="relative">
                    @if ($user->profile_image)
                        <div class="w-40 h-40  overflow-hidden border-4 border-white shadow-lg">
                            <img src="{{ asset('storage/' . $user->profile_image) }}" alt="Profile Image"
                                class="w-full h-full object-cover">
                        </div>
                    @else
                        <div
                            class="w-32 h-32  overflow-hidden border-4 border-white shadow-lg bg-gray-200 flex items-center justify-center">
                            <svg class="w-16 h-16 text-gray-400" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </div>
                    @endif
                </div>

                <!-- Name and Basic Info -->
                <div class="text-white">
                    <h1 class="text-3xl font-bold mb-2">{{ $user->name }}</h1>
                    <p class="text-blue-100 text-lg">{{ $user->address }}</p>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="p-8">
            <!-- Personal Information Section -->
            <div class="mb-10">
                <h2 class="text-xl font-semibold text-gray-800 mb-6 pb-2 border-b-2 border-sky-500">
                    {{ __('Company Information') }}</h2>

                <div class="grid grid-cols-1 md:grid-cols-1 gap-2">
                    <!-- Name Card -->

                    <div class="flex justify-between space-x-3">

                        <div class="w-full">
                            <div class="flex flex-col sm:flex-row justify-normal border-2 border-gray-200 rounded-sm">
                                <label for="furigana"
                                    class="block font-semibold text-white bg-sky-600 w-full sm:w-[200px] h-auto sm:h-[50px] px-5 py-5 text-md ">
                                    {{ __('Company Name') }}
                                </label>
                                <p class="px-5 py-3 text-sm text-gray-700">
                                    {{ $user->name }}
                                </p>
                            </div>


                            <div
                                class="flex flex-col sm:flex-row justify-normal border-2 border-gray-200 rounded-sm mt-2">
                                <label for="name"
                                    class="block font-semibold text-white bg-sky-600 w-full sm:w-[200px] h-auto sm:h-[100px] px-5 py-5 text-md">
                                    {{ __('Address') }}
                                </label>
                                <p class="px-5 py-3 text-sm text-gray-700">
                                    {{ $user->address }}
                                </p>
                            </div>

                            <div
                                class="flex flex-col sm:flex-row justify-normal border-2 border-gray-200 rounded-sm mt-2">
                                <label for="name"
                                    class="block font-semibold text-white bg-sky-600 w-full sm:w-[200px] h-auto sm:h-[100px] px-5 py-5 text-md">
                                    {{ __('Phone number') }}
                                </label>
                                <p class="px-5 py-3 text-sm text-gray-700">
                                    {{ $user->phone_number }}
                                </p>
                            </div>

                            <div
                                class="flex flex-col sm:flex-row justify-normal border-2 border-gray-200 rounded-sm mt-2">
                                <label for="name"
                                    class="block font-semibold text-white bg-sky-600 w-full sm:w-[200px] h-auto sm:h-[100px] px-5 py-5 text-md">
                                    {{ __('Mobile number') }}
                                </label>
                                <p class="px-5 py-3 text-sm text-gray-700">
                                    {{ $user->mobile_number }}
                                </p>
                            </div>

                            <div
                                class="flex flex-col sm:flex-row justify-normal border-2 border-gray-200 rounded-sm mt-2">
                                <label for="name"
                                    class="block font-semibold text-white bg-sky-600 w-full sm:w-[200px] h-auto sm:h-[100px] px-5 py-5 text-md">
                                    {{ __('Email') }}
                                </label>
                                <p class="px-5 py-3 text-sm text-gray-700">
                                    {{ $user->email }}
                                </p>
                            </div>

                            <div
                                class="flex flex-col sm:flex-row justify-normal border-2 border-gray-200 rounded-sm mt-2">
                                <label for="name"
                                    class="block font-semibold text-white bg-sky-600 w-full sm:w-[200px] h-auto sm:h-[100px] px-5 py-5 text-md">
                                    {{ __('Company description') }}
                                </label>
                                <p class="px-5 py-3 text-sm text-gray-700">
                                    {{ $user->companyProfile->company_description ?? '' }}
                                </p>
                            </div>

                            <div
                                class="flex flex-col sm:flex-row justify-normal border-2 border-gray-200 rounded-sm mt-2">
                                <label for="name"
                                    class="block font-semibold text-white bg-sky-600 w-full sm:w-[200px] h-auto sm:h-[100px] px-5 py-5 text-md">
                                    {{ __('Industry') }}
                                </label>
                                <p class="px-5 py-3 text-sm text-gray-700">
                                    {{ $user->companyProfile->industry ?? '' }}
                                </p>
                            </div>

                            <div
                                class="flex flex-col sm:flex-row justify-normal border-2 border-gray-200 rounded-sm mt-2">
                                <label for="name"
                                    class="block font-semibold text-white bg-sky-600 w-full sm:w-[200px] h-auto sm:h-[100px] px-5 py-5 text-md">
                                    {{ __('Website') }}
                                </label>
                                <p class="px-5 py-3 text-sm text-gray-700">
                                    {{ $user->companyProfile->website ?? '' }}
                                </p>
                            </div>

                        </div>


                    </div>
                </div>
            </div>
        </div>


</x-app-layout>

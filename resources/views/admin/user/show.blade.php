
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

                <div class="flex justify-between space-x-3">

                    <div class="w-full">
                        <div class="flex flex-col sm:flex-row justify-normal border-2 border-gray-200 rounded-sm">
                            <label for="furigana"
                                class="block font-semibold text-white bg-blue-600 w-full sm:w-[200px] h-auto sm:h-[50px] px-5 py-5 text-md ">
                                {{ __('Furigana') }}
                            </label>
                            <p class="px-5 py-3 text-sm text-gray-700">
                                {{ $user->furigana }}
                            </p>
                        </div>


                        <div class="flex flex-col sm:flex-row justify-normal border-2 border-gray-200 rounded-sm mt-2">
                            <label for="name"
                                class="block font-semibold text-white bg-blue-600 w-full sm:w-[200px] h-auto sm:h-[100px] px-5 py-5 text-md">
                                {{ __('Name') }}
                            </label>
                            <p class="px-5 py-3 text-sm text-gray-700">
                                {{ $user->name }}
                            </p>
                        </div>


                    </div>








                </div>

                <div class="flex justify-normal space-x-3">
                    <div class="w-4/5">
                        <!-- Email Address -->
                        <div class="flex flex-col sm:flex-row justify-normal border-2 border-gray-200 rounded-sm">
                            <label for="name"
                                class="block font-semibold text-white bg-blue-600 w-full sm:w-[200px] h-auto sm:h-[60px] px-5 py-5 text-md">
                                {{ __('Date of Birth') }}
                            </label>

                            <p class="px-5 py-3 text-md text-gray-700">
                                {{ $user->date_of_birth }}
                            </p>




                        </div>

                    </div>


                    <div class="w-1/5">

                        <!-- Gender -->
                        <div class="flex flex-col sm:flex-row justify-normal border-2 border-gray-200 rounded-sm">
                            <label for="name" :value=""
                                class="block font-semibold text-white bg-blue-600 sm:w-[100px] h-auto sm:h-[60px] px-5 py-5 text-md">{{ __('Gender') }}</label>


                                <p class="px-5 py-3 text-md text-gray-700">
                                    {{ $user->gender }}
                                </p>

                        </div>

                    </div>

                </div>


                <!--role-->




                <div class="flex flex-col sm:flex-row justify-normal border-2 border-gray-200 rounded-sm">
                    <label for="address"
                        class="block font-semibold text-white bg-blue-600 w-full sm:w-[200px] h-auto sm:h-[100px] px-5 py-5 text-md">
                        {{ __('Address') }}
                    </label>
                    <p class="px-5 py-3 text-md text-gray-700">
                        {{ $user->address }}
                    </p>
                </div>

                <div class="flex flex-col sm:flex-row justify-normal border-2 border-gray-200 rounded-sm">
                    <label for="phone_number"
                        class="block font-semibold text-white bg-blue-600 w-full sm:w-[200px] h-auto sm:h-[100px] px-5 py-5 text-md">
                        {{ __('Phone number') }}
                    </label>
                    <p class="px-5 py-3 text-md text-gray-700">
                        {{ $user->phone_number }}
                    </p>
                </div>

                <div class="flex flex-col sm:flex-row justify-normal border-2 border-gray-200 rounded-sm">
                    <label for="mobile_number"
                        class="block font-semibold text-white bg-blue-600 w-full sm:w-[200px] h-auto sm:h-[100px] px-5 py-5 text-md">
                        {{ __('Mobile number') }}
                    </label>
                    <p class="px-5 py-3 text-md text-gray-700">
                        {{ $user->mobile_number }}
                    </p>
                </div>

                <div class="flex flex-col sm:flex-row justify-normal border-2 border-gray-200 rounded-sm">
                    <label for="email"
                        class="block font-semibold text-white bg-blue-600 w-full sm:w-[200px] h-auto sm:h-[100px] px-5 py-5 text-md">
                        {{ __('Email') }}
                    </label>
                    <p class="px-5 py-3 text-md text-gray-700">
                        {{ $user->email }}
                    </p>
                </div>


                <div class="flex flex-col sm:flex-row justify-normal border-2 border-gray-200 rounded-sm">
                    <label for="email"
                        class="block font-semibold text-white bg-blue-600 w-full sm:w-[200px] h-auto sm:h-[180px] px-5 py-5 text-md">
                        {{ __('Education') }}
                    </label>

                    <!-- Date Selection Column -->
                    <div class="border-b-2 border-gray-200">
                        <!-- First Entry -->
                        <div class="flex flex-col sm:flex-row sm:space-x-5 space-y-2 sm:space-y-0 mb-2">
                        <small class="ml-2 mt-1 bg-yellow-100 px-2 py-2 rounded-xl">{{ __('Education1') }}</small>
                            <p class="px-5 py-3 text-md text-gray-700 bg-white rounded-xl">
                                {{ $user->education_year_1 }}
                            </p>
                            <p class="px-5 py-3 text-md text-gray-700 bg-white rounded-xl">
                                {{ $user->education_month_1 }}
                            </p>
                            <p class="px-5 py-3 text-md text-gray-700 bg-white rounded-xl">
                                {{ $user->education_school_1 }}
                            </p>
                        </div>

                        <!-- Second Entry -->
                        <div class="flex flex-col sm:flex-row sm:space-x-5 space-y-2 sm:space-y-0 mb-2">

                            <small class="ml-2 bg-yellow-100 px-2 py-2 rounded-xl">{{ __('Education2') }}</small>
                            <p class="px-5 py-3 text-md text-gray-700 bg-white rounded-xl">
                                {{ $user->education_year_2 }}
                            </p>
                            <p class="px-5 py-3 text-md text-gray-700 bg-white rounded-xl">
                                {{ $user->education_month_2 }}
                            </p>
                            <p class="px-5 py-3 text-md text-gray-700 bg-white rounded-xl">
                                {{ $user->education_school_2 }}
                            </p>
                        </div>

                        <!-- Third Entry -->
                        <div class="flex flex-col sm:flex-row sm:space-x-5 space-y-2 sm:space-y-0">
                            <small class="ml-2 bg-yellow-100 px-2 py-2 rounded-xl">{{ __('Education3') }}</small>
                            <p class="px-5 py-3 text-md text-gray-700 bg-white rounded-xl">
                                {{ $user->education_year_3 }}
                            </p>
                            <p class="px-5 py-3 text-md text-gray-700 bg-white rounded-xl">
                                {{ $user->education_month_3 }}
                            </p>
                            <p class="px-5 py-3 text-md text-gray-700 bg-white rounded-xl">
                                {{ $user->education_school_3 }}
                            </p>
                        </div>
                    </div>
                </div>



                <div class="flex flex-col sm:flex-row border-2 border-gray-200 rounded-sm">
                    <label class="block font-semibold text-white bg-blue-600 w-full sm:w-[200px] h-auto sm:h-[200px] px-5 py-3 text-md">
                        {{ __('Appear point') }}
                    </label>
                    <p class="px-5 py-3 text-md text-gray-700">
                        {{ $user->appear_point }}
                    </p>
                </div>


                <div>
                    <div class="flex flex-col sm:flex-row justify-normal border-2 border-gray-200 rounded-sm">
                        <label for="name"
                            class="block font-semibold text-white bg-blue-600 w-full sm:w-[200px] h-auto sm:h-[200px] px-5 py-5 text-md ">
                            {{ __('Reason for studying in Japan') }}
                        </label>
                        <p class="px-5 py-3 text-md text-gray-700">
                            {{ $user->study_japan }}
                        </p>
                    </div>
                </div>

                <div>
                    <div class="flex flex-col sm:flex-row justify-normal border-2 border-gray-200 rounded-sm">
                        <label for="skill"
                            class="block font-semibold text-white bg-blue-600 w-full sm:w-[200px] h-auto sm:h-[100px] px-5 py-5 text-md">
                            {{ __('Skill') }}
                        </label>
                        <p class="px-5 py-3 text-md text-gray-700">
                            {{ $user->skill }}
                        </p>
                    </div>
                </div>

                <div>
                    <div class="flex flex-col sm:flex-row justify-normal border-2 border-gray-200 rounded-sm">
                        <label for="reason"
                            class="block font-semibold text-white bg-blue-600 w-full sm:w-[200px] h-auto sm:h-[200px] px-5 py-5 text-md">
                            {{ __('Reasons for applying') }}
                        </label>
                        <p class="px-5 py-3 text-md text-gray-700">
                            {{ $user->reason }}
                        </p>
                    </div>
                </div>

                <div>
                    <div class="flex flex-col sm:flex-row justify-normal border-2 border-gray-200 rounded-sm">
                        <label for="language"
                            class="block font-semibold text-white bg-blue-600 w-full sm:w-[200px] h-auto sm:h-[100px] px-5 py-5 text-md">
                            {{ __('Language Ability') }}
                        </label>
                        <p class="px-5 py-3 text-md text-gray-700">
                            {{ $user->language }}
                        </p>
                    </div>
                </div>

                <div>
                    <div class="flex flex-col sm:flex-row justify-normal border-2 border-gray-200 rounded-sm">
                        <label for="license"
                            class="block font-semibold text-white bg-blue-600 w-full sm:w-[200px] h-auto sm:h-[100px] px-5 py-5 text-md">
                            {{ __('Driver licence and Qualifications') }}
                        </label>
                        <p class="px-5 py-3 text-md text-gray-700">
                            {{ $user->license }}
                        </p>
                    </div>
                </div>

                <div>
                    <div class="flex flex-col sm:flex-row justify-normal border-2 border-gray-200 rounded-sm">
                        <label for="hobby"
                            class="block font-semibold text-white bg-blue-600 w-full sm:w-[200px] h-auto sm:h-[100px] px-5 py-5 text-md">
                            {{ __('Hobby and speciality') }}
                        </label>
                        <p class="px-5 py-3 text-md text-gray-700">
                            {{ $user->hobby }}
                        </p>
                    </div>
                </div>

                <div>
                    <div class="flex flex-col sm:flex-row justify-normal border-2 border-gray-200 rounded-sm">
                        <label for="part_time"
                            class="block font-semibold text-white bg-blue-600 w-full sm:w-[200px] h-auto sm:h-[100px] px-5 py-5 text-md">
                            {{ __('Part time job experience') }}
                        </label>
                        <p class="px-5 py-3 text-md text-gray-700">
                            {{ $user->part_time }}
                        </p>
                    </div>
                </div>
        </div>










    </div>
    </div>
    </div>


</x-app-layout>


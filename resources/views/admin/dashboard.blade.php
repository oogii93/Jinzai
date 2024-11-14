<x-app-layout>


    <div class="py-12">
        <div class="max-w-7xl mx-auto bg-white shadow-xl rounded-t-xl overflow-hidden mt-8">
            <!-- Header Section with Profile Image -->
            <div class="bg-gradient-to-r from-sky-600 to-sky-500 px-8 py-12">
                <div class="flex items-center space-x-8">
                    <!-- Profile Image -->
                    <div class="relative">
                        @if (Auth::user()->profile_image)
                            <div class="w-40 h-40  rounded-full overflow-hidden border-4 border-white shadow-lg">
                                <img src="{{ asset('storage/' . Auth::user()->profile_image ) }}"
                                     alt="Profile Image"
                                     class="w-full h-full object-cover">
                            </div>
                        @else
                            <div class="w-32 h-32 rounded-full overflow-hidden border-4 border-white shadow-lg bg-gray-200 flex items-center justify-center">
                                <svg class="w-16 h-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                            </div>
                        @endif
                    </div>

                    <!-- Name and Basic Info -->
                    <div class="text-white">
                        <h1 class="text-3xl font-bold mb-2">{{ Auth::user()->name }}</h1>
                        <p class="text-blue-100 text-lg">{{ Auth::user()->role  }}</p>
                        <p class="text-blue-100 text-lg">{{ Auth::user()->email  }}</p>
                    </div>
                </div>
            </div>

                    {{-- </div> --}}


                        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 rounded-b-xl">
                            <!-- Statistics Section -->
                            <div class="grid grid-cols-1 md:grid-cols-6 gap-6 mb-6 mt-3">

                                <div class="bg-gray-200 overflow-hidden shadow-sm sm:rounded-lg">
                                    <div class="p-6">
                                        <div class="text-xl font-semibold text-gray-800">{{ $statistics2['total_jobseeker'] }}</div>
                                        <div class="text-md text-gray-600 font-semibold">求職者総数</div>
                                    </div>
                                </div>

                                    <div class="bg-gray-200 overflow-hidden shadow-sm sm:rounded-lg">
                                        <div class="p-6">
                                            <div class="text-xl font-semibold text-gray-800">{{ $statistics2['total_company'] }}</div>
                                            <div class="text-md text-gray-600 font-semibold">企業総数</div>
                                        </div>
                                    </div>




                                <div class="bg-gray-200 overflow-hidden shadow-sm sm:rounded-lg">
                                    <div class="p-6">
                                        <div class="text-xl font-semibold text-gray-800">{{ $statistics['total_jobs'] }}</div>
                                        <div class="text-md text-gray-600 font-semibold">求人投稿</div>
                                    </div>
                                </div>
                                <div class="bg-gray-200 overflow-hidden shadow-sm sm:rounded-lg">
                                    <div class="p-6">
                                        <div class="text-xl font-semibold text-gray-800">{{ $statistics2['total_application'] }}</div>
                                        <div class="text-md text-gray-600 font-semibold">総申請数</div>
                                    </div>
                                </div>

                            </div>

                                   <!--New cols-->














    </div>






            </div>
        </div>
    </div>
</x-app-layout>

<x-app-layout>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-700 text-xl font-semibold">
                    {{ __("Admin Dashboard") }}
                </div>

                    <div class="flex justify mb-2">
                        <div class="px-5">
                            @if(Auth::user()->profile_image)
                                <img src="{{ asset('storage/' . Auth::user()->profile_image) }}" alt="profile" class="w-40 h-40 rounded-full border-4 border-pink-800">
                            @else
                                <!-- Fallback to default image if profile image is not available -->
                                <img src="{{ asset('images/pro.jpg') }}" alt="profile" class="w-40 h-40 rounded-full border-4 border-pink-800">
                            @endif
                        </div>

                        <div class="font-medium px-10 py-2">
                            <p class="">{{ Auth::user()->name }}</p>
                            <p class="">{{ Auth::user()->email }}</p>
                            <p class="">{{ Auth::user()->role }}</p>
                        </div>


                    </div>












    </div>






            </div>
        </div>
    </div>
</x-app-layout>

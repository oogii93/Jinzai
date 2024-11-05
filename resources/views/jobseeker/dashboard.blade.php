<x-app-layout>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-700 text-xl font-semibold">
                    {{ __("マイページ管理") }}
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

                        <button class="bg-blue-600 text-white rounded-xl text-lg font-medium hover:bg-blue-800 mx-auto" style=" width:200px; height:50px;">
                            + 編集
                        </button>
                    </div>


<div class="container px-5 flex justify-between gap-5">

    <div class="">


        <div class="bg-green-100 scale-100 p-6  dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none flex  transition-all duration-250 focus:outline focus:outline-2 focus:outline-indigo-500">
            <div>
                <div class="h-16 w-16  dark:bg-indigo-900/20 flex items-center justify-center rounded-full">
                    <svg class="w-8 h-8 " fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg>
                </div>

                <h2 class="mt-6 text-xl font-semibold  dark:text-white"></h2>

                <p class="mt-4  dark:text-gray-400 text-sm leading-relaxed">
                    このフォームを使用して申請を行います。クリックして詳細を表示し、必要事項を入力してください。
                </p>
            </div>

            <a href="{{ route('cv') }}" class="absolute top-0 right-0 p-6 text-sm font-semibold  bg-white rounded-bl-2xl hover: focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:bg-gray-800 dark:text-white dark:hover:bg-gray-700">
            履歴書を見る
                <span aria-hidden="true">&rarr;</span>
            </a>
        </div>











    </div>

    <div class="bg-yellow-100 py-5 scale-100 p-6  dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none flex motion-safe: transition-all duration-250 focus:outline focus:outline-2 focus:outline-indigo-500">
        <div>


            <h2 class="mt-1 text-xl font-semibold  dark:text-white"></h2>

                <form action="{{ route('video-profile.store') }}" method="POST" enctype="multipart/form-data">

            <p class="mt-4  dark:text-gray-400 text-sm leading-relaxed px-2">
                求職者は、日本語での自己紹介のために1分から3分のビデオをアップロードする必要があります。
                    そのビデオをここにアップロードしてください!!
                    </p>


                    @csrf
                    <div class="mb-4">
                        <label for="video" class="block text-sm font-medium text-gray-700">Profile Video (Max 5 minutes)</label>
                        <input type="file"
                            id="video"
                            name="video"
                            accept="video/mp4,video/quicktime"
                            class="mt-1 block w-full">
                        @error('video')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- <div class="mb-4">
                        <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                        <input type="text"
                            id="title"
                            name="title"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                    </div>

                    <div class="mb-4">
                        <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                        <textarea id="description"
                                name="description"
                                rows="3"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"></textarea>
                    </div> --}}

                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">
                        Upload Video
                    </button>


                </form>
        </div>

    </div>


</div>

<div class="container px-2 space-x-5 bg-white mb-5">

    <div class="mt-5">


        <div class="bg-blue-50 scale-100 p-6  dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none flex motion-safe:hover: transition-all duration-250 focus:outline focus:outline-2 focus:outline-indigo-500">



        <div class="mt-8 px-2">
            @if(Auth::user()->videoProfile)

                    <h3 class="text-lg font-medium mb-2">Your Current Video Profile</h3>
                    <video width="800" height="600" controls class="rounded-lg shadow-lg">
                        <source src="{{ Storage::url(Auth::user()->videoProfile->video_path) }}" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>

                    <div class="mt-2">
                        @if(Auth::user()->videoProfile->title)
                            <h4 class="font-medium">{{ Auth::user()->videoProfile->title }}</h4>
                        @endif

                        @if(Auth::user()->videoProfile->description)
                            <p class="text-gray-600 mt-1">{{ Auth::user()->videoProfile->description }}</p>
                        @endif

                        <div class="mt-2 text-sm text-gray-500">
                            Duration: {{ floor(Auth::user()->videoProfile->duration / 60) }}:{{ str_pad(Auth::user()->videoProfile->duration % 60, 2, '0', STR_PAD_LEFT) }}
                        </div>
                    </div>

                    <!-- Delete Video Button -->
                    <form action="{{ route('video-profile.destroy') }}" method="POST" class="mt-4">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">
                            Delete Video
                        </button>
                    </form>

            @else
                <p class="text-gray-500 italic">No video profile uploaded yet.</p>
            @endif
        </div>








        </div>












    </div>

</div>



            </div>
        </div>
    </div>
</x-app-layout>

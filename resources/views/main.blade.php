<x-app-layout>
    <style>
        /* Add these to your CSS file if you want the dropdown arrow transition */
.category-arrow {
    @apply transition-transform duration-200 ease-in-out;
}

.category-expanded .category-arrow {
    @apply transform rotate-180;
}

/* Optional: Add these custom styles to your existing Tailwind CSS */
@layer components {
    .category-link {
        @apply block w-full px-3 py-2 text-gray-700 hover:text-blue-600 hover:bg-gray-50 rounded-md transition-colors duration-200;
    }

    .subcategory-link {
        @apply block w-full px-3 py-1.5 text-sm text-gray-600 hover:text-blue-600 hover:bg-gray-50 rounded-md transition-colors duration-200;
    }

    .active-category {
        @apply font-semibold text-blue-600 bg-blue-50;
    }
}
    </style>



        <div class="w-full mx-auto">



            {{-- <div id="chatBox" class="fixed bottom-4 right-5 z-50 bg-white shadow-lg border rounded-2xl p-6 w-80 transition-all duration-300">
                <svg
                class="w-8 h-8"
                viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M8 10.5H16" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"></path> <path d="M8 14H13.5" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"></path> <path d="M17 3.33782C15.5291 2.48697 13.8214 2 12 2C6.47715 2 2 6.47715 2 12C2 13.5997 2.37562 15.1116 3.04346 16.4525C3.22094 16.8088 3.28001 17.2161 3.17712 17.6006L2.58151 19.8267C2.32295 20.793 3.20701 21.677 4.17335 21.4185L6.39939 20.8229C6.78393 20.72 7.19121 20.7791 7.54753 20.9565C8.88837 21.6244 10.4003 22 12 22C17.5228 22 22 17.5228 22 12C22 10.1786 21.513 8.47087 20.6622 7" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"></path> </g>
                </svg>
                <button id="toggleChatSize" class="absolute top-2 right-2 text-gray-500 hover:text-gray-700">
                    <svg id="toggleIcon" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 8h16M4 16h16" />
                    </svg>
                </button>

                @if(auth()->user()->role === 'admin')
                <div class="space-y-2   py-3">
                    @foreach($users as $user)
                        @if($user->id !== auth()->id())
                            <a href="{{ route('chat.show', $user) }}"
                               class="block  bg-sky-100 border border-blue-300 rounded-lg p-4 hover:bg-sky-200 transition">
                                <h3 class="font-medium text-blue-800">{{ $user->name }}</h3>
                                <p class="text-sm text-gray-600 capitalize">{{ $user->role }}</p>
                            </a>
                        @endif
                    @endforeach
                </div>
            @else
                    @php
                        $admin = App\Models\User::where('role', 'admin')->first();
                    @endphp
                    @if($admin)
                        <div class="text-center">
                            <a href="{{ route('chat.show', $admin) }}"
                               class="text-blue-500  hover:text-blue-700 transition font-bold">
                                チャット
                            </a>
                        </div>
                    @else
                        <p class="text-sm text-gray-500 text-center">No admin available for chat.</p>
                    @endif
                @endif
            </div> --}}



            {{-- <div class="bg-gradient-to-r from-blue-600 to-blue-800 px-8 py-12"> --}}

                <div class="relative flex flex-col items-center justify-center w-full bg-gradient-to-r from-sky-400 to-sky-500 overflow-hidden py-12 px-4 md:px-8 lg:px-16">
                    <!-- Gradient Background -->
                    <div id="three-background" class="absolute inset-0 opacity-30 pointer-events-none"></div>

                    <!-- Text/Heading -->
                    <h1 class="text-white text-3xl md:text-4xl font-bold">仕事探しがより簡単になり</h1>
                </div>

                <!-- Search Bar -->
                <div class="bg-gray-100">


                <div class="relative -mt-8 z-10">
                    <form id="searchForm" class="flex items-center w-full max-w-3xl mx-auto h-16 border-2 border-indigo-500 rounded-lg bg-white shadow-md">
                        <!-- Search Icon -->
                        <div class="relative flex items-center px-4">
                            <svg class="h-6 w-6 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <!-- Input Field -->
                        <input
                            type="text"
                            name="search"
                            id="searchInput"
                            value="{{ request('search') }}"
                            class="flex-grow h-full px-4 text-lg text-gray-700 focus:outline-none"
                            placeholder="職種、企業名など。。。"
                            autocomplete="off"
                        />
                        <!-- Search Button -->
                        <button
                            type="submit"
                            class="flex items-center justify-center px-6 bg-indigo-500 hover:bg-indigo-600 text-white font-medium h-full rounded-r-lg transition-all duration-300"
                        >
                            <svg class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                            </svg>
                        </button>
                    </form>
                </div>
            </div>








                <div class="bg-gray-100 overflow-hidden shadow-sm sm:rounded-b-xl">
                    <div class="mt-5 flex flex-wrap justify-start px-5 gap-2">
                        @foreach ($tags as $item)
                            <a href="{{ route('tags.jobPosts', $item) }}"
                               class="px-4 py-2 bg-green-300 rounded-md hover:bg-green-400 text-md font-semibold text-gray-600 hover:text-white
                                      {{ isset($tag) && $tag->id === $item->id ? 'bg-green-400 text-white' : '' }}">
                                {{ $item->name }}
                            </a>
                        @endforeach
                    </div>




                       <!-- Search and Filter Section -->












                <div class="container px-2 py-4">

                    <div class="flex gap-6 px-2">



                        <div class="md:w-1/5 sm:w-3/5 bg-white p-4 shadow rounded-lg px-2">
                            <h2 class="text-2xl font-semibold mb-4 text-center text-sky-700">業種</h2>
                            <ul class="space-y-2">



                                @foreach ($categories as $category)
                                    <li class="rounded-md">
                                        {{-- Main Category --}}
                                        <div class="px-2 py-2 bg-sky-100 border border-sky-200 hover:bg-gray-100 flex justify-between items-center">
                                            <a href="{{ route('categories.jobPosts', $category) }}"
                                               class="flex-1 text-gray-700  font-semibold hover:text-sky-600 {{ request()->route('category')?->id === $category->id ? 'font-semibold text-sky-600' : '' }}">
                                                {{ $category->name }}
                                            </a>
                                            @if($category->subcategories->count() > 0)
                                                <button
                                                    onclick="toggleSubcategories(event, 'subcategories-{{ $category->id }}')"
                                                    class="text-gray-400 hover:text-gray-600 transform transition-transform duration-200 focus:outline-none"
                                                    data-rotation="0">
                                                    ▼
                                                </button>
                                            @endif
                                        </div>

                                        {{-- Subcategories --}}
                                        @if($category->subcategories->count() > 0)


                                            <ul id="subcategories-{{ $category->id }}"
                                                class="ml-4 mt-1 border-l-2 border-gray-100 hidden transition-all duration-200">
                                                <h3 class="text-center text-lg font-semibold text-sky-600 mb-2 bg-gray-200 py-2 border border-gray-300">職種</h3>
                                                @foreach($category->subcategories as $subcategory)
                                                    <li class="pl-2 border border-gray-200 bg-gray-50">
                                                        {{-- <a href="{{ route('categories.jobPosts', ['category' => $category, 'subcategory' => $subcategory]) }}"
                                                           class="block px-3 py-2 text-sm text-gray-600 hover:bg-gray-50 hover:text-blue-600 rounded-md
                                                                  {{ request()->query('subcategory') == $subcategory->id ? 'bg-blue-50 text-blue-600 font-medium' : '' }}">
                                                            {{ $subcategory->name }}
                                                        </a> --}}


                                                        <a href="{{ route('categories.subcategory', ['category' => $category, 'subcategory' => $subcategory]) }}"
                                                            class="block px-3 py-2 text-sm font-semibold text-gray-600 hover:bg-sky-100 hover:text-sky-700
                                                                   {{ request()->route('subcategory')?->id === $subcategory->id ? 'bg-blue-50 text-sky-700 font-medium' : '' }}">
                                                             {{ $subcategory->name }}
                                                         </a>


                                                    </li>
                                                @endforeach
                                            </ul>
                                        @endif
                                    </li>
                                @endforeach
                            </ul>
                        </div>





                        <!-- Right Column (3/5 width) -->


                        <div class="md:w-3/5 sm:w-3/5 mx-auto p-6">
                            <div class="space-y-6">
                                @foreach ($jobposts as $jobpost)
                                    <div class="bg-white rounded-xl shadow-md hover:shadow-lg transition-shadow duration-500 overflow-hidden border border-gray-200">
                                        <div class="flex flex-col sm:flex-row items-start p-6 space-y-4 sm:space-y-0 sm:space-x-6">
                                            <!-- Company Logo -->
                                            <div class="flex-shrink-0">
                                                <img src="{{ asset('storage/' . $jobpost->user->profile_image) }}"
                                                     alt="{{ $jobpost->user->name }}"
                                                     class="w-24 h-24 object-cover rounded-lg">
                                            </div>

                                            <!-- Job Details -->
                                            <div class="flex-1">
                                                <div class="flex justify-between items-start">
                                                    <div>
                                                        <!-- Company Name -->
                                                        <div class="flex items-center space-x-2">
                                                            <h3 class="text-sm font-semibold text-gray-700">株式会社 {{ $jobpost->user->name }}</h3>
                                                            <span class="px-2 py-1 text-xs font-medium text-blue-700 bg-blue-100 rounded-full">
                                                              新着
                                                            </span>
                                                        </div>
                                                        <!-- Job Title -->
                                                        <h2 class="text-2xl font-bold text-gray-900 mt-1">{{ $jobpost->title }}</h2>
                                                    </div>

                                                    <!-- Apply Button -->

                                                </div>

                                                <!-- Job Metadata -->
                                                <div class="mt-4 space-y-3">
                                                    <!-- Working Hours -->
                                                    <div class="flex items-center space-x-3">
                                                        <div class="flex-shrink-0 w-8 h-8 flex items-center justify-center rounded-lg bg-blue-50">
                                                            <svg class="w-5 h-5 text-blue-600" viewBox="0 0 24 24" fill="none">
                                                                <path d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                            </svg>
                                                        </div>
                                                        <div>
                                                            <div class="text-xs font-medium text-gray-500">勤務時間</div>
                                                            <div class="text-sm text-gray-800">{{ $jobpost->working_hour }}</div>
                                                        </div>
                                                    </div>

                                                    <!-- Salary -->
                                                    <div class="flex items-center space-x-3">
                                                        <div class="flex-shrink-0 w-8 h-8 flex items-center justify-center rounded-lg bg-green-50">
                                                            <svg class="w-5 h-5 text-green-600" viewBox="0 0 24 24" fill="none">
                                                                <path d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                            </svg>
                                                        </div>
                                                        <div>
                                                            <div class="text-xs font-medium text-gray-500">給与</div>
                                                            <div class="text-sm font-medium text-green-600">{{ $jobpost->salary }}</div>
                                                        </div>
                                                    </div>

                                                    <!-- Location -->
                                                    <div class="flex items-center space-x-3">
                                                        <div class="flex-shrink-0 w-8 h-8 flex items-center justify-center rounded-lg bg-purple-50">
                                                            <svg class="w-5 h-5 text-purple-600" viewBox="0 0 24 24" fill="none">
                                                                <path d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                                <path d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                            </svg>
                                                        </div>
                                                        <div>
                                                            <div class="text-xs font-medium text-gray-500">勤務地</div>
                                                            <div class="text-sm text-gray-800">{{ $jobpost->working_location }}</div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Posted Date -->
                                                <div class="mt-4 text-sm text-gray-500">
                                                    投稿日 {{ \Carbon\Carbon::parse($jobpost->created_at)->format('Y年m月d日') }}
                                                </div>

                                                <!-- Tags -->
                                                <div class="mt-2 space-x-2">
                                                    @foreach($jobpost->tags as $tag)
                                                        <a href="{{ route('posts.tag', $tag->id) }}"
                                                           class="inline-block bg-gray-200 hover:bg-gray-300 rounded-full px-3 py-1 text-xs font-semibold text-gray-700">
                                                            {{ $tag->name }}
                                                        </a>
                                                    @endforeach
                                                </div>
                                            <div class="flex justify-end">




{{--
                                                <div class="flex px-5">
                                                    <button
                                                        id="favorite-btn-{{ $jobpost->id }}"
                                                        onclick="toggleFavorite({{ $jobpost->id }})"
                                                        class="inline-flex items-center px-6 py-3.5 bg-gray-200 rounded-xl text-gray-800 font-semibold text-lg shadow-lg shadow-yellow-500/30 hover:shadow-yellow-300/60 transition-all duration-200 hover:-translate-y-0.5">

                                                        <svg
                                                        class="w-8 h-8"
                                                        viewBox="0 -0.5 32 32"
                                                        fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                                        <g id="SVGRepo_iconCarrier">
                                                            <path d="M16.0005 0L21.4392 9.27275L32.0005 11.5439L24.8005 19.5459L25.889 30.2222L16.0005 25.895L6.11194 30.2222L7.20049 19.5459L0.000488281 11.5439L10.5618 9.27275L16.0005 0Z" fill="#FFCB45"></path>
                                                        </g>
                                                    </svg>

                                                    <span id="favorite-text-{{ $jobpost->id }}">
                                                        {{ $jobpost->is_favorited ? 'お気に入り済' : 'お気に入り' }}

                                                    </span>

                                                    </button>

                                                </div> --}}
                                                <button
                                                id="favorite-btn-{{ $jobpost->id }}"
                                                onclick="toggleFavorite({{ $jobpost->id }})"
                                                class="inline-flex items-center px-6 py-3.5 bg-gray-200 rounded-xl text-gray-800 font-semibold text-lg">

                                                <svg class="w-8 h-8" viewBox="0 -0.5 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M16.0005 0L21.4392 9.27275L32.0005 11.5439L24.8005 19.5459L25.889 30.2222L16.0005 25.895L6.11194 30.2222L7.20049 19.5459L0.000488281 11.5439L10.5618 9.27275L16.0005 0Z" fill="#FFCB45"></path>
                                                </svg>

                                                <span id="favorite-text-{{ $jobpost->id }}">
                                                    {{ $jobpost->is_favorited ? 'お気に入り済' : 'お気に入り' }}
                                                </span>
                                            </button>

                                                <div class="flex justify-end">
                                                    <a href="{{ route('jobpost.show', $jobpost->id) }}"
                                                        class="inline-flex items-center px-6 py-3.5 bg-gradient-to-r from-indigo-600 to-purple-600 rounded-xl text-white font-semibold text-lg shadow-lg shadow-indigo-500/30 hover:shadow-indigo-500/50 transition-all duration-200 hover:-translate-y-0.5">

                                                        詳細
                                                        <svg class="ml-3 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M9 5l7 7-7 7"/>
                                                        </svg>
                                                    </a>

                                                </div>


                                            </div>
                                            <div class="mt-2 text-sm text-gray-500">
                                             公開情報:
                                                @if ($jobpost->status === '承認')
                                                    <span class="text-white bg-green-600 px-2 py-2 rounded-lg font-bold">公開中</span>
                                                @elseif ($jobpost->status === '進行中')
                                                    <span class="text-white bg-yellow-500 px-2 py-2 rounded-lg  font-bold">申請中</span>
                                                @elseif ($jobpost->status === '拒否')
                                                    <span class="text-white bg-red-500 px-2 py-2 rounded-lg font-bold">拒否</span>
                                                @endif
                                            </div>



                                            </div>
                                        </div>
                                    </div>
                                @endforeach



                            </div>


                            <div class="mt-6">
                                {{ $jobposts->links() }}
                            </div>
                        </div>








{{--
                        <div class="md:w-4/5 sm:w-3/5 mx-auto p-6">
    <div class="space-y-6">
        @foreach ($jobposts as $jobpost)
            <div class="bg-white rounded-xl shadow-md hover:shadow-lg transition-shadow duration-300 overflow-hidden hover:bg-gray-100 border border-gray-300">
                <div class="flex flex-col sm:flex-row items-start p-6">
                    <!-- Company Logo -->
                    <div class="flex-shrink-0">
                        <img src="{{ asset('storage/' . $jobpost->user->profile_image) }}"
                             alt="{{ $jobpost->user->name }}"
                             class="w-24 h-24 object-cover rounded-lg mb-4 sm:mb-0">
                    </div>

                    <!-- Job Details -->
                    <div class="flex-1 sm:ml-6">
                        <div class="flex justify-between items-start">
                            <div>
                                <!-- Company Name -->
                                <div class="flex items-center space-x-2">
                                    <h3 class="text-base font-semibold text-gray-800">{{ __('Company') }} {{ $jobpost->user->name }}</h3>
                                    <span class="px-2 py-1 text-xs font-medium text-blue-600 bg-blue-50 rounded-full">
                                        {{ __('New') }}
                                    </span>
                                </div>
                                <!-- Job Title -->
                                <h2 class="text-xl font-bold text-gray-900 mt-2">{{ $jobpost->title }}</h2>
                            </div>

                            <!-- Apply Button -->
                            <a href="{{ route('jobpost.show', $jobpost->id) }}"
                               class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white text-xs font-medium rounded-lg transition-colors duration-300">
                                {{ __('See Details') }}
                                <svg class="ml-2 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                </svg>
                            </a>
                        </div>

                        <!-- Job Metadata -->
                        <div class="mt-4 space-y-2">
                            <!-- Working Hours -->
                            <div class="flex items-center space-x-3">
                                <div class="flex-shrink-0 w-8 h-8 flex items-center justify-center rounded-lg bg-blue-50">
                                    <svg class="w-5 h-5 text-blue-600" viewBox="0 0 24 24" fill="none">
                                        <path d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </div>
                                <div>
                                    <div class="text-xs font-medium text-gray-500">{{ __('Working hours') }}</div>
                                    <div class="text-sm text-gray-900">{{ $jobpost->working_hour }}</div>
                                </div>
                            </div>

                            <!-- Salary -->
                            <div class="flex items-center space-x-3">
                                <div class="flex-shrink-0 w-8 h-8 flex items-center justify-center rounded-lg bg-green-50">
                                    <svg class="w-5 h-5 text-green-600" viewBox="0 0 24 24" fill="none">
                                        <path d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </div>
                                <div>
                                    <div class="text-xs font-medium text-gray-500">{{ __('Salary') }}</div>
                                    <div class="text-sm font-medium text-green-600">{{ $jobpost->salary }}</div>
                                </div>
                            </div>

                            <!-- Location -->
                            <div class="flex items-center space-x-3">
                                <div class="flex-shrink-0 w-8 h-8 flex items-center justify-center rounded-lg bg-purple-50">
                                    <svg class="w-5 h-5 text-purple-600" viewBox="0 0 24 24" fill="none">
                                        <path d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </div>
                                <div>
                                    <div class="text-xs font-medium text-gray-500">{{ __('Location') }}</div>
                                    <div class="text-sm text-gray-900">{{ $jobpost->working_location }}</div>
                                </div>
                            </div>
                        </div>

                        <!-- Posted Date -->
                        <div class="mt-4 text-sm text-gray-500">
                            {{ __('Posted Date') }} {{ \Carbon\Carbon::parse($jobpost->created_at)->format('Y年m月d日') }}
                        </div>

                        <!-- Tags -->
                        <div class="mt-2 space-x-2">
                            @foreach($jobpost->tags as $tag)
                                <a href="{{ route('posts.tag', $tag->id) }}"
                                   class="inline-block bg-gray-200 hover:bg-gray-300 rounded-full px-3 py-1 text-xs font-semibold text-gray-700">
                                    {{ $tag->name }}
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="mt-4">
        {{ $jobposts->links() }}
    </div>
</div> --}}

                    </div>
                </div>



            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
    const chatBox = document.getElementById('chatBox');
    const toggleButton = document.getElementById('toggleChatSize');
    const toggleIcon = document.getElementById('toggleIcon');

    let isSmall = false;

    toggleButton.addEventListener('click', () => {
        if (isSmall) {
            chatBox.style.width = '20rem'; // Original width
            chatBox.style.height = 'auto'; // Reset height
            toggleIcon.innerHTML = `
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 8h16M4 16h16" />
            `;
        } else {
            chatBox.style.width = '5rem'; // Smaller width
            chatBox.style.height = '5rem'; // Smaller height
            toggleIcon.innerHTML = `
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            `;
        }
        isSmall = !isSmall;
    });
});



function toggleSubcategories(event, subcategoriesId) {
    event.preventDefault();
    event.stopPropagation();

    const button = event.currentTarget;
    const subcategoriesList = document.getElementById(subcategoriesId);
    const currentRotation = parseInt(button.getAttribute('data-rotation')) || 0;

    // Toggle subcategories visibility
    if (subcategoriesList.classList.contains('hidden')) {
        subcategoriesList.classList.remove('hidden');
        button.style.transform = 'rotate(180deg)';
        button.setAttribute('data-rotation', '180');
    } else {
        subcategoriesList.classList.add('hidden');
        button.style.transform = 'rotate(0deg)';
        button.setAttribute('data-rotation', '0');
    }
}

// Optionally: Show active category's subcategories by default
document.addEventListener('DOMContentLoaded', function() {
    const activeCategory = document.querySelector('.text-blue-600')?.closest('li');
    if (activeCategory) {
        const subcategoriesList = activeCategory.querySelector('ul');
        const button = activeCategory.querySelector('button');
        if (subcategoriesList && button) {
            subcategoriesList.classList.remove('hidden');
            button.style.transform = 'rotate(180deg)';
            button.setAttribute('data-rotation', '180');
        }
    }
});
function toggleFavorite(jobId) {
    const favoriteBtn = document.getElementById(`favorite-btn-${jobId}`);
    const favoriteText = document.getElementById(`favorite-text-${jobId}`);

    const baseUrl = window.location.origin;

    fetch(`${baseUrl}/jobs/${jobId}/favorite`, {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content ||
                            document.querySelector('meta[name="token"]')?.content ||
                            'undefined',
            'Content-Type': 'application/json',
            'Accept': 'application/json',
            'X-Requested-With': 'XMLHttpRequest'
        },
        credentials: 'same-origin'
    })
    .then(response => {
        // Log the entire response for debugging
        console.log('Response status:', response.status);
        console.log('Response headers:', Object.fromEntries(response.headers.entries()));

        // Try to get response text even if not OK
        return response.text().then(text => {
            if (!response.ok) {
                // Log the error response text
                console.error('Error response text:', text);
                throw new Error(`HTTP error! status: ${response.status}, body: ${text}`);
            }

            // Try to parse JSON if response is OK
            try {
                return JSON.parse(text);
            } catch (parseError) {
                console.error('JSON parse error:', parseError);
                throw new Error('Failed to parse JSON response');
            }
        });
    })
    .then(data => {
        console.log('Received data:', data);

        if (data.isFavorited !== undefined) {
            favoriteBtn.classList.toggle('favorited', data.isFavorited);
            favoriteText.textContent = data.isFavorited ? 'お気に入り済' : 'お気に入り';
        } else {
            console.warn('Unexpected response data:', data);
            throw new Error('Invalid response format');
        }
    })
    .catch(error => {
        console.error('Favorite Toggle Detailed Error:', {
            message: error.message,
            stack: error.stack
        });

        alert(`お気に入りの操作中にエラーが発生しました: ${error.message}`);
    });
}

    </script>
</x-app-layout>

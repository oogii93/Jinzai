<x-app-layout>

        <div class="min-h-screen bg-gray-200 py-8">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <!-- Header Section -->
                <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-8 bg-white p-5 rounded-xl px-10 py-10">
                    <div class="mb-4 md:mb-0">
                        <h1 class="text-3xl font-bold bg-gradient-to-r from-indigo-600 to-purple-600 bg-clip-text text-transparent">
                          sdf
                        </h1>
                        <p class="mt-4 text-sm text-gray-600">
                           稿一覧
                        </p>
                    </div>

                </div>

                <!-- Success Message -->
                @if (session('success'))
                <div class="mb-6 transform animate-fadeIn">
                    <div class="rounded-xl bg-green-50 border border-green-200 p-4">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <svg class="h-5 w-5 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                </svg>
                            </div>
                            <div class="ml-3">
                                <p class="text-sm font-medium text-green-800">{{ session('success') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                @endif

                <!-- Main Content Card -->
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100">
                    <!-- Search and Filter Section -->
                    <div class="p-6 border-b border-gray-100">
                        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                                    </svg>
                                </div>
                                <input type="text"
                                       class="block w-full pl-10 pr-3 py-2 border border-gray-200 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent"
                                       placeholder="検索...">
                            </div>
{{--
                            <div class="flex items-center space-x-2">
                                <select class="block w-full py-2 pl-3 pr-10 text-base border border-gray-200 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                                    <option>All Categories</option>
                                    <option>Category 1</option>
                                    <option>Category 2</option>
                                </select>
                            </div> --}}
                        </div>
                    </div>

                    <!-- Table Section -->

                    <div class="container bg-white-100 px-5 py-2">

                        <div class="container mx-auto py-6 px-4 sm:px-6 lg:px-8">
                            <!-- Header Section -->
                            <div class="mb-8">
                                <h2 class="text-2xl font-bold text-gray-900">承認待ちの求人</h2>
                                <p class="mt-2 text-sm text-gray-600">全 {{ $pendingPosts->total() }} 件の求人が承認待ちです</p>
                            </div>

                            <!-- Job Posts Grid -->
                            <div class="space-y-6">
                                @forelse($pendingPosts as $post)
                                    <div class="bg-white rounded-lg shadow-sm border border-gray-200 hover:shadow-md transition-shadow duration-300"
                                         id="job-post-{{ $post->id }}">
                                        <div class="p-6">
                                            <!-- Company Info Section -->
                                            <div class="flex items-start justify-between">
                                                <div class="flex items-center space-x-3">
                                                    <!-- Company Avatar -->
                                                    <div class="flex-shrink-0">
                                                        <div class="w-12 h-12 bg-gray-200 rounded-full flex items-center justify-center">
                                                            <span class="text-gray-600 font-semibold text-lg">
                                                                {{ substr($post->user->name, 0, 1) }}
                                                            </span>
                                                        </div>
                                                    </div>

                                                    <!-- Company Details -->
                                                    <div>
                                                        <h3 class="text-lg font-semibold text-gray-900 line-clamp-1">
                                                            {{ $post->title }}
                                                        </h3>
                                                        <p class="text-sm text-gray-600">
                                                            {{ $post->user->name }}
                                                        </p>
                                                    </div>
                                                </div>

                                                <!-- Status Badge -->
                                                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium
                                                    @if($post->status === '承認待ち') bg-yellow-100 text-yellow-800
                                                    @elseif($post->status === '承認') bg-green-100 text-green-800
                                                    @else bg-red-100 text-red-800
                                                    @endif">
                                                    {{ $post->status }}
                                                </span>
                                            </div>

                                            <!-- Job Details -->
                                            <div class="mt-4 grid grid-cols-2 gap-4">
                                                @if($post->location)
                                                <div class="flex items-center text-sm text-gray-600">
                                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                              d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                                    </svg>
                                                    {{ $post->location }}
                                                </div>
                                                @endif

                                                @if($post->salary)
                                                <div class="flex items-center text-sm text-gray-600">
                                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                              d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                                    </svg>
                                                    {{ $post->salary }}
                                                </div>
                                                @endif
                                            </div>

                                            <!-- Actions Section -->
                                            <div class="mt-6 flex items-center justify-between">
                                                <a href="{{ route('jobpost.show', $post->id) }}"
                                                   class="inline-flex items-center text-sm font-medium text-blue-600 hover:text-blue-500">
                                                    詳細を見る
                                                    <svg class="ml-1 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                                    </svg>
                                                </a>
                                                <div class="flex space-x-3">
                                                    <!-- Approve Button -->
                                                    <form action="{{ route('jobpost.approve', $post->id) }}" method="POST">
                                                        @csrf
                                                        <button type="submit"
                                                                {{ $post->status === '承認' ? 'disabled' : '' }}
                                                                class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white
                                                                       {{ $post->status === '承認' ? 'bg-gray-400 cursor-not-allowed' : 'bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500' }}">
                                                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                                            </svg>
                                                            承認する
                                                        </button>
                                                    </form>

                                                    <!-- Reject Button -->
                                                    <form action="{{ route('jobpost.reject', $post->id) }}" method="POST">
                                                        @csrf
                                                        <button type="submit"
                                                                {{ $post->status === '拒否' ? 'disabled' : '' }}
                                                                class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white
                                                                       {{ $post->status === '拒否' ? 'bg-gray-400 cursor-not-allowed' : 'bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500' }}">
                                                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                                            </svg>
                                                            拒否する
                                                        </button>
                                                    </form>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6 text-center">
                                        <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                  d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                                        </svg>
                                        <h3 class="mt-2 text-sm font-medium text-gray-900">求人なし</h3>
                                        <p class="mt-1 text-sm text-gray-500">現在、承認待ちの求人はありません。</p>
                                    </div>
                                @endforelse
                            </div>

                            <!-- Pagination -->
                            <div class="mt-6">
                                {{ $pendingPosts->links() }}
                            </div>
                        </div>




    </x-app-layout>






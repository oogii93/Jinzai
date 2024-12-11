<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>お気に入りの求人</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-50 min-h-screen antialiased">
    <x-app-layout>
        {{-- Status Toast Notification --}}
        @if (session('success') || session('error'))
            <div id="statusToast" class="fixed top-6 left-1/2 transform -translate-x-1/2 z-50 w-full max-w-md animate-slide-down">
                <div class="bg-white border-l-4 @if (session('success')) border-green-500 @else border-red-500 @endif rounded-lg shadow-lg overflow-hidden">
                    <div class="p-4 flex items-center">
                        <div class="flex-shrink-0">
                            @if (session('success'))
                                <svg class="w-8 h-8 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            @else
                                <svg class="w-8 h-8 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            @endif
                        </div>
                        <div class="ml-4 flex-1">
                            @if (session('success'))
                                <p class="text-lg font-semibold text-gray-800">
                                    {!! session('success') !!}
                                </p>
                            @endif
                            @if (session('error'))
                                <p class="text-sm font-medium text-gray-700">
                                    {{ session('error') }}
                                </p>
                            @endif
                        </div>
                        <button id="closeToast" class="ml-4 text-gray-500 hover:text-gray-700 focus:outline-none">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        @endif

        <div class="container mx-auto px-4 py-8">
            <div class="max-w-6xl mx-auto bg-white shadow-2xl rounded-2xl overflow-hidden">
                {{-- Header --}}
                <div class="bg-gradient-to-r from-indigo-500 to-purple-600 p-6">
                    <h1 class="text-4xl font-bold text-white text-center tracking-tight">
                        お気に入り一覧
                    </h1>
                </div>

                {{-- Content --}}
                <div class="p-6">
                    @if($likedPosts->count())
                        <div class="space-y-6">
                            @foreach ($likedPosts as $liked)
                                <div class="bg-white border border-gray-200 rounded-xl shadow-md hover:shadow-xl transition-all duration-300 ease-in-out">
                                    <div class="p-6">
                                        <div class="flex justify-between items-start mb-4">
                                            <div>
                                                <div class="flex items-center space-x-2 mb-2">
                                                    <span class="text-sm font-medium text-gray-500">株式会社</span>
                                                    <h3 class="text-sm font-semibold text-gray-700">{{ $liked->user->name }}</h3>
                                                </div>
                                                <h2 class="text-2xl font-bold text-gray-900">{{ $liked->title }}</h2>
                                            </div>
                                            <form action="{{ route('job-post.unlike', $liked->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-500 hover:text-red-700 transition-colors">
                                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                                    </svg>
                                                </button>
                                            </form>
                                        </div>

                                        <div class="grid md:grid-cols-3 gap-4 mb-4">
                                            {{-- Working Hours --}}
                                            <div class="flex items-center space-x-3 bg-blue-50 p-3 rounded-lg">
                                                <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                                <div>
                                                    <div class="text-xs font-medium text-gray-500">勤務時間</div>
                                                    <div class="text-sm text-gray-800">{{ $liked->working_hour }}</div>
                                                </div>
                                            </div>

                                            {{-- Salary --}}
                                            <div class="flex items-center space-x-3 bg-green-50 p-3 rounded-lg">
                                                <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                                <div>
                                                    <div class="text-xs font-medium text-gray-500">給与</div>
                                                    <div class="text-sm font-medium text-green-600">{{ $liked->salary }}</div>
                                                </div>
                                            </div>

                                            {{-- Location --}}
                                            <div class="flex items-center space-x-3 bg-purple-50 p-3 rounded-lg">
                                                <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                                <div>
                                                    <div class="text-xs font-medium text-gray-500">勤務地</div>
                                                    <div class="text-sm text-gray-800">{{ $liked->working_location }}</div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="flex justify-between items-center mt-4">
                                            <div class="space-x-2">
                                                @foreach ($liked->tags as $tag)
                                                    <a href="{{ route('posts.tag', $tag->id) }}"
                                                       class="inline-block bg-gray-100 hover:bg-gray-200 rounded-full px-3 py-1 text-xs font-medium text-gray-700 transition-colors">
                                                        {{ $tag->name }}
                                                    </a>
                                                @endforeach
                                            </div>
                                            <div class="text-sm text-gray-500">
                                                投稿日 {{ \Carbon\Carbon::parse($liked->created_at)->format('Y年m月d日') }}
                                            </div>
                                        </div>

                                        <div class="mt-4 text-center">
                                            <a href="{{ route('jobpost.show', $liked->id) }}"
                                               class="inline-block bg-indigo-500 text-white px-6 py-2 rounded-lg hover:bg-indigo-600 transition-colors">
                                                詳細を見る
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        {{-- Pagination Links --}}
                        <div class="mt-6">
                            {{ $likedPosts->links() }}
                        </div>
                    @else
                        <div class="text-center py-12 bg-gray-50 rounded-lg">
                            <p class="text-xl text-gray-600">まだ求人投稿に「いいね！」していません。</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </x-app-layout>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const statusToast = document.getElementById('statusToast');
            const closeToast = document.getElementById('closeToast');

            if (statusToast && closeToast) {
                const hideTimeout = setTimeout(() => {
                    hideToast();
                }, 8000);

                closeToast.addEventListener('click', () => {
                    clearTimeout(hideTimeout);
                    hideToast();
                });

                function hideToast() {
                    statusToast.style.transform = 'translate(-50%, -100%)';
                    statusToast.style.transition = 'transform 0.5s ease-in-out';
                    setTimeout(() => {
                        statusToast.style.display = 'none';
                    }, 500);
                }
            }
        });
    </script>
</body>
</html>

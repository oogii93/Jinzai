<x-app-layout>
    <div class="min-h-screen bg-gray-200 py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Header Section -->
            <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-8 bg-white p-5 rounded-xl px-10 py-10">
                <div class="mb-4 md:mb-0">
                    <h1 class="text-3xl font-bold bg-gradient-to-r from-indigo-600 to-purple-600 bg-clip-text text-transparent">お気に入り</h1>
                    <p class="mt-4 text-sm text-gray-600">お気に入り一覧</p>
                </div>
            </div>

            @if (session('status') || session('error'))
            <div id="statusToast" class="fixed top-16 left-1/2 transform -translate-x-1/2 z-50 w-full max-w-md">
                <div class="bg-gray-100 border-l-4 @if(session('status')) border-blue-500 @else border-red-500 @endif rounded-r-lg shadow-md overflow-hidden">
                    <div class="p-4 flex items-center">
                        <div class="flex-shrink-0">
                            @if (session('status'))
                                <svg class="w-6 h-6 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            @else
                                <svg class="w-6 h-6 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            @endif
                        </div>
                        <div class="ml-3 w-0 flex-1">
                            @if (session('status'))
                                <p class="text-lg font-semibold text-blue-900">
                                    {!! session('status') !!}
                                </p>
                            @endif
                            @if (session('error'))
                                <p class="text-sm font-medium text-gray-900">
                                    {{ session('error') }}
                                </p>
                            @endif


                        </div>
                    </div>
                    <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                        <button id="closeToast" type="button" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-blue-600 text-base font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:ml-3 sm:w-auto sm:text-sm">
                            閉じる
                        </button>
                    </div>
                </div>
            </div>

            <style>
                @keyframes slideDown {
                    from { transform: translate(-50%, -100%); }
                    to { transform: translate(-50%, 0); }
                }
                #statusToast {
                    animation: slideDown 0.5s ease-out;
                }
            </style>

            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    var statusToast = document.getElementById('statusToast');
                    var closeToast = document.getElementById('closeToast');

                    var hideTimeout = setTimeout(function() {
                        hideToast();
                    }, 8000);

                    closeToast.addEventListener('click', function() {
                        clearTimeout(hideTimeout);
                        hideToast();
                    });

                    function hideToast() {
                        statusToast.style.transform = 'translate(-50%, -100%)';
                        statusToast.style.transition = 'transform 0.5s ease-in-out';
                        setTimeout(function() {
                            statusToast.style.display = 'none';
                        }, 500);
                    }
                });
            </script>
        @endif

            <!-- Main Content Card -->
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100">
                <!-- Table Section -->
                <div class="container bg-white-100 px-5 py-2">
                    <div class="container mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        <!-- Header Section -->
                        <div class="mb-8">
                            <h2 class="text-2xl font-bold text-gray-900">キープした求人 {{ $favorites->total() }} 件を表示しています</h2>
                        </div>

                        <!-- Job Posts Grid -->
                        <div class="grid grid-cols-1 space-y-8">
                            @forelse($favorites as $favorite)
                            <div class="bg-white rounded-lg shadow-md border border-gray-200 hover:shadow-lg transition-shadow duration-300">
                                <div class="h-full flex flex-col">
                                    <div class="p-6 flex-grow">
                                        <div class="flex justify-between items-center mb-4">
                                            <h3 class="text-gray-800 font-bold text-lg">{{ $favorite->jobPost->title }}</h3>


                                            <button
                                            onclick="deleteFavorite({{ $favorite->id }},this)"
                                            class="text-gray-500 hover:text-red-400 focus:outline-none">
                                                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                                </svg>
                                            </button>
                                        </div>
                                        <div class="border-t border-gray-200 pt-4 mb-4">
                                            <div class="flex items-center space-x-3 mb-2">
                                                <div class="flex-shrink-0 w-8 h-8 flex items-center justify-center rounded-lg bg-green-50">
                                                    <svg class="w-5 h-5 text-green-600" viewBox="0 0 24 24" fill="none">
                                                        <path d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                    </svg>
                                                </div>
                                                <div>
                                                    <div class="text-xs font-medium text-gray-500">給与</div>
                                                    <div class="text-sm font-medium text-green-600">{{ $favorite->jobpost->salary }}</div>
                                                </div>
                                            </div>
                                            <div class="flex items-center space-x-3 mb-4">
                                                <div class="flex-shrink-0 w-8 h-8 flex items-center justify-center rounded-lg bg-purple-50">
                                                    <svg class="w-5 h-5 text-purple-600" viewBox="0 0 24 24" fill="none">
                                                        <path d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                        <path d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                    </svg>
                                                </div>
                                                <div>
                                                    <div class="text-xs font-medium text-gray-500">勤務地</div>
                                                    <div class="text-sm text-gray-800">{{ $favorite->jobpost->working_location }}</div>
                                                </div>
                                            </div>
                                            <p class="text-gray-700 mb-4 line-clamp-3">{{ $favorite->jobPost->job_detail }}</p>
                                        </div>
                                    </div>
                                    <div class="p-6 border-t border-gray-200 flex justify-end">
                                        <a href="{{ route('jobpost.show', $favorite->jobPost->id) }}" class="bg-blue-500 hover:bg-blue-600 text-white font-medium py-2 px-4 rounded-lg">詳細</a>
                                    </div>
                                </div>
                            </div>
                            @empty
                            <div class="bg-white rounded-lg shadow-md border border-gray-200 p-6 text-center">
                                <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                                </svg>
                                <h3 class="mt-2 text-sm font-medium text-gray-900">求人なし</h3>
                                <p class="mt-1 text-sm text-gray-500">現在、承認待ちの求人はありません。</p>
                            </div>
                            @endforelse
                        </div>

                        <!-- Pagination -->
                        <div class="mt-6">
                            {{ $favorites->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script>
        function deleteFavorite(favoriteId, element){
            if(!confirm('このお気に入りを削除してもよろしいですか?')){
                return;
            }


    fetch(`/favorites/${favoriteId}`, {
        method: 'DELETE',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
            'Content-Type': 'application/json'
        },
    })

    .then(response => response.json())
    .then(data => {
        if (data.success) {
            // Remove the entire job card from the DOM
            const jobCard = element.closest('.bg-white');
            if (jobCard) {
                jobCard.remove();
            }

            // Optional: Show a success toast/notification
            alert('Favorite removed successfully');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Failed to remove favorite');
    });
}
    </script>
</x-app-layout>

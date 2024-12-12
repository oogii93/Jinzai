<x-app-layout>
    @if (session('success') || session('error'))
    <div id="statusToast" class="fixed top-16 left-1/2 transform -translate-x-1/2 z-50 w-full max-w-md">
        <div class="bg-gray-100 border-l-4 @if(session('success')) border-blue-500 @else border-red-500 @endif rounded-r-lg shadow-md overflow-hidden">
            <div class="p-4 flex items-center">
                <div class="flex-shrink-0">
                    @if (session('success'))
                        <svg class="w-6 h-6 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    @else
                        <svg class="w-6 h-6 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    @endif
                </div>
                <div class="ml-3 w-0 flex-1">
                    @if (session('success'))
                        <p class="text-lg font-semibold text-blue-900">
                            {!! session('success') !!}
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
    <div class="min-h-screen bg-gray-200">
        <div class="p-4 sm:p-6 lg:p-8">
            <!-- Page Header -->
            <div class="sm:flex sm:items-center sm:justify-between mb-8 bg-white rounded-lg ">
                <div class="px-5 py-10 p-5">
                    <h2 class="text-3xl font-bold bg-gradient-to-r from-indigo-600 to-purple-600 bg-clip-text text-transparent">求職者管理</h2>
                    <h2 class="mt-4 text-sm text-gray-600">求職者一覧</h2>
                </div>


            </div>







            <!-- Table Section -->
            <div class="bg-white rounded-lg shadow overflow-hidden">
                <div class="p-6 border-b border-gray-200">
                    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                        <div class="md:w-3/5 sm:w-full">
                            <form action="{{ route('admin.user.index') }}" method="GET" class="relative">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                    </svg>
                                </div>

                                <input
                                    type="search"
                                    name="search"
                                    value="{{ request('search') }}"
                                    placeholder="検索（名前、メール、電話番号）"
                                    class="block w-full py-3 pl-10 pr-24 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 transition duration-300 ease-in-out"
                                >

                                <div class="absolute inset-y-0 right-0 flex items-center pr-3">
                                    @if(request('search'))
                                        <a href="{{ route('admin.user.index') }}" class="mr-2 text-gray-500 hover:text-gray-700 transition">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                                            </svg>
                                        </a>
                                    @endif

                                    <button
                                        type="submit"
                                        class="px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 transition duration-300 ease-in-out"
                                    >
                                        検索
                                    </button>
                                </div>
                            </form>

                            @if(request('search'))
                                <div class="mt-2 text-sm text-gray-500">
                                    <span>検索結果: </span>
                                    <span class="font-semibold">{{ $users->total() }}件</span>
                                    <span class="ml-2 text-gray-400">"|"</span>
                                    <span class="ml-2">検索キーワード: "{{ request('search') }}"</span>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>


                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-orange-200">

                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">氏名</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">メール</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">携帯電話</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">自己紹介動画</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">履歴書</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">管理者の承認</th>

                                <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">作動</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($users as $item)
                                <tr class="hover:bg-gray-50">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $item->id }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="h-8 w-8 flex-shrink-0">
                                                <span class="inline-flex h-8 w-8 items-center justify-center rounded-full bg-gray-500">
                                                    <span class="text-sm font-medium leading-none text-white">{{ substr($item->name, 0, 1) }}</span>
                                                </span>
                                            </div>
                                            <div class="ml-4">
                                                <div class="text-sm font-medium text-gray-900">{{ $item->name }}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $item->email }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $item->mobile_number }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm">
                                        @if ($item->videoProfile)
                                            <a href="{{ asset('storage/' . $item->videoProfile->video_path) }}"
                                               class="inline-flex items-center text-sm text-indigo-600 hover:text-indigo-900"
                                               target="_blank">
                                                <svg class="mr-1.5 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                </svg>
                                               動画を見る
                                            </a>
                                        @else
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800">動画がない</span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm">
                                        <a href="{{ route('admin.user.show', $item) }}"
                                           class="text-indigo-600 hover:text-indigo-900">
                                            履歴書見る
                                        </a>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        <span class="px-2 py-1 rounded
                                            {{ $item->admin_check_approve ? ' rounded-lg bg-green-200 text-green-800' : 'rounded-lg bg-red-200 text-red-800' }}">
                                            {{ $item->admin_check_approve ? '承認' : '不承認'}}
                                        </span>
                                    </td>


                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <div class="flex justify-end space-x-3">

                                            <form action="{{ route('admin.user.destroy', $item) }}" method="POST" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                        class="text-red-600 hover:text-red-900"
                                                        onclick="return confirm('このユーザーを削除してもよろしいですか?')">
                                                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                    </svg>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

                {{ $users->appends(request()->query())->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

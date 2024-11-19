
<x-app-layout>
    <div class="min-h-screen bg-gray-200 py-8">
        <div class="max-w-9xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Header Section -->
            <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-8 bg-white p-5 rounded-xl px-10 py-10">
                <div class="mb-4 md:mb-0">
                    <h1 class="text-3xl font-bold bg-gradient-to-r from-indigo-600 to-purple-600 bg-clip-text text-transparent">
                        申請管理(企業)
                    </h1>
                    <p class="mt-4 text-sm font-semibold text-gray-600">
                        応募者一覧
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
                <div class="overflow-x-auto px-2">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50/50">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider border border-gray-400">ID</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider border border-gray-400">応募した仕事</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider border border-gray-400">応募者</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider border border-gray-400">自己紹介動画</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider border border-gray-400">太成HDs面談結果</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider border border-gray-400">書類選考結果</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider border border-gray-400">ウェブ面接日</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider border border-gray-400">最終結果</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider border border-gray-400">入社日付</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider border border-gray-400">作動</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white">
                            @foreach ($applications as $application)
                                <tr class="hover:bg-gray-50">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 border border-gray-400">{{ $application->id }}</td>
                                    <!-- Repeat border class for each <td> as needed -->


                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 border border-gray-400" style="width: 150px;">
                                        <div class="flex flex-col items-start space-y-2">
                                            <div class="text-sm font-semibold text-gray-800">
                                                {{ $application->jobPost->id }}
                                            </div>

                                            <a href="{{ route('jobpost.show', $application->jobPost->id) }}" class="flex items-center justify-center w-full text-white bg-blue-400 px-3 py-1.5 rounded-lg font-semibold hover:bg-blue-500 transition duration-150 ease-in-out shadow-md">
                                                内容を見る
                                            </a>
                                        </div>
                                    </td>




                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 border border-gray-400">
                                        <div class="flex items-center">

                                            <div class="ml-4">
                                                <div class="text-sm font-medium text-gray-900">{{ $application->user->name }}
                                                    <br>
                                                    <small>
                                                        <span class="text-blue-500 font-semibold">応募日付け</span>
                                                        {{ $application->created_at->format('Y-m') }}月-{{ $application->created_at->format('d') }}日
                                                    </small>
                                                </div>
                                            </div>
                                        </div>
                                    </td>


                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 border border-gray-400">
                                        @if ($application->user && $application->user->videoProfile)
                                            <a href="{{ asset('storage/' . $application->user->videoProfile->video_path) }}"
                                               class="inline-flex items-center text-sm text-indigo-600 hover:text-indigo-900"
                                               target="_blank">
                                                <svg class="mr-1 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                </svg>
                                                動画
                                            </a>
                                        @else
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800">
                                                動画がない
                                            </span>
                                        @endif

                                        <a href="{{ route('admin.user.show', $application->user) }}"
                                           class="inline-flex items-center text-pink-600 hover:text-pink-700 text-sm px-2 mt-2">
                                            <svg class="mr-1 h-5 w-5" fill="#f52ea2" viewBox="0 0 32 32">
                                                <rect height="1" width="12" x="10" y="29"></rect>
                                                <rect height="1" width="12" x="10" y="2"></rect>
                                                <rect height="1" width="4" x="9" y="5"></rect>
                                                <rect height="1" width="4" x="9" y="9"></rect>
                                                <rect height="1" width="10" x="13" y="12"></rect>
                                                <rect height="1" width="3" x="9" y="12"></rect>
                                                <rect height="1" width="10" x="13" y="15"></rect>
                                                <rect height="1" width="3" x="9" y="15"></rect>
                                                <rect height="1" width="10" x="13" y="18"></rect>
                                                <rect height="1" width="3" x="9" y="18"></rect>
                                                <rect height="1" width="10" x="13" y="21"></rect>
                                                <rect height="1" width="3" x="9" y="21"></rect>
                                                <rect height="1" width="10" x="13" y="24"></rect>
                                                <rect height="1" width="3" x="9" y="24"></rect>
                                                <rect height="1" transform="translate(9.5 41.5) rotate(-90)" width="20" x="15.5" y="15.5"></rect>
                                                <path d="M22,2V3h2a1,1,0,0,1,1,1V6h1V4a2,2,0,0,0-2-2Z"></path>
                                                <rect height="1" transform="translate(-9.5 22.5) rotate(-90)" width="20" x="-3.5" y="15.5"></rect>
                                                <path d="M10,2V3H8A1,1,0,0,0,7,4V6H6V4A2,2,0,0,1,8,2Z"></path>
                                                <path d="M22,30V29h2a1,1,0,0,0,1-1V26h1v2a2,2,0,0,1-2,2Z"></path>
                                                <path d="M10,30V29H8a1,1,0,0,1-1-1V26H6v2a2,2,0,0,0,2,2Z"></path>
                                                <rect height="5" width="1" x="9" y="5"></rect>
                                                <rect height="5" width="1" x="12" y="5"></rect>
                                            </svg>
                                            履歴書
                                        </a>
                                    </td>

                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 border border-gray-400">
                                        <span class="{{ empty($application->taisei_result)
                                        ? 'bg-orange-500 rounded-xl px-2  text-white font-semibold py-1'
                                        : 'bg-sky-500 rounded-xl px-2 text-white font-semibold py-1' }}">
                                            {{ $application->taisei_result ?? '進行中' }}
                                        </span>
                                    </td>

                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 border border-gray-400">
                                        <span class="{{ empty($application->document_result)
                                        ? 'bg-orange-500 rounded-xl px-2  text-white font-semibold py-1'
                                        : 'bg-sky-500 rounded-xl px-2 text-white font-semibold py-1' }}">
                                            {{ $application->document_result ?? '進行中' }}
                                        </span>
                                    </td>

                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 border border-gray-400">
                                        <span class="{{ empty($application->web_interview)
                                        ? 'bg-orange-500 rounded-xl px-2  text-white font-semibold py-1'
                                        : 'bg-sky-500 rounded-xl px-2 text-white font-semibold py-1' }}">
                                            {{ $application->web_interview ?? '進行中' }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 border border-gray-400">
                                        <span class="{{ empty($application->web_interview)
                                        ? 'bg-orange-500 rounded-xl px-2  text-white font-semibold py-1'
                                        : 'bg-sky-500 rounded-xl px-2 text-white font-semibold py-1' }}">
                                            {{ $application->web_interview ?? '進行中' }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 border border-gray-400">
                                        <span class="{{ empty($application->web_interview)
                                        ? 'bg-orange-500 rounded-xl px-2  text-white font-semibold py-1'
                                        : 'bg-sky-500 rounded-xl px-2 text-white font-semibold py-1' }}">
                                            {{ $application->web_interview ?? '進行中' }}
                                        </span>
                                    </td>

                                    {{-- <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 border border-gray-400">
                                        {{ $application->document_result ?? '進行中' }}
                                    </td> --}}








                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 border border-gray-400">
                                        <form action="{{ route('admin.applications.review', $application) }}" method="POST" class="space-y-2">
                                            @csrf

                                            <div class="flex justify-normal items-center space-x-2">

                                                <select name="admin_status" id="admin_status" class="border-2 border-gray-300 rounded-md p-1 text-sm">
                                                    <option value="">選択</option>
                                                    <option value="approved">承認</option>
                                                    <option value="rejected">拒否</option>
                                                </select>


                                            <button type="submit" class="bg-green-400 px-5 py-2 rounded-lg hover:bg-green-500 text-sm text-white ">
                                                提出
                                            </button>
                                            </div>



                                        </form>
                                    </td>



                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Pagination Section -->
                <div class="px-6 py-4 border-t border-gray-100">
                    {{-- {{ $items->links() }} --}}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>



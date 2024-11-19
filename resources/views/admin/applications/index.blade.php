<x-app-layout>

            <!-- Success Message -->
            @if (session('success'))
                <div class="rounded-lg bg-green-50 p-4 mb-6 border border-green-200">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <svg class="h-5 w-5 text-green-400" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm font-medium text-green-800">{{ session('success') }}</p>
                        </div>
                    </div>
                </div>
            @endif


            <div class="min-h-screen bg-gray-200">
                <div class="p-4 sm:p-6 lg:p-8">
                    <!-- Page Header -->
                    <div class="sm:flex sm:items-center sm:justify-between mb-8 bg-white rounded-lg ">
                        <div class="px-5 py-10 p-5">
                            <h2 class="text-3xl font-bold bg-gradient-to-r from-indigo-600 to-purple-600 bg-clip-text text-transparent">申請管理</h2>
                            <h2 class="mt-4 text-md text-gray-600 font-semibold">申請一覧</h2>
                        </div>


                    </div>

            <div class="mb-6 bg-white p-4 rounded-lg shadow">
                <div class="border-b border-gray-200">
                    <nav class="-mb-px flex space-x-8">
                        <a href="{{ route('admin.applications.index', ['status' => 'pending']) }}"
                           class="@if($status === 'pending') border-indigo-500 text-indigo-600 @else border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700 @endif whitespace-nowrap border-b-2 py-4 px-1 text-sm font-semibold">
                            中 ({{ $counts['pending'] }})
                        </a>
                        <a href="{{ route('admin.applications.index', ['status' => 'approved']) }}"
                           class="@if($status === 'approved') border-indigo-500 text-indigo-600 @else border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700 @endif whitespace-nowrap border-b-2 py-4 px-1 text-sm font-semibold">
                           合格  ({{ $counts['approved'] }})
                        </a>
                        <a href="{{ route('admin.applications.index', ['status' => 'rejected']) }}"
                           class="@if($status === 'rejected') border-indigo-500 text-indigo-600 @else border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700 @endif whitespace-nowrap border-b-2 py-4 px-1 text-sm font-semibold">
                           不合格({{ $counts['rejected'] }})
                        </a>
                        <a href="{{ route('admin.applications.index', ['status' => 'all']) }}"
                           class="@if($status === 'all') border-indigo-500 text-indigo-600 @else border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700 @endif whitespace-nowrap border-b-2 py-4 px-1 text-sm font-semibold">
                            全申請
                        </a>
                    </nav>
                </div>
            </div>




            <!-- Search and Filter Section -->
            <div class="mb-6">
                <div class="mt-1 flex rounded-lg shadow-sm">
                    <div class="relative flex-grow focus-within:z-10">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                        <input type="text" name="search" class="block w-full h-20 rounded-lg border-gray-300 pl-10 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" placeholder="検索...">
                    </div>
                </div>
            </div>

            <!-- Table Section -->
            <div class="bg-white rounded-lg shadow overflow-hidden">
                <div class="overflow-x-auto">
                    <!-- Status Tabs -->

                    <table class="min-w-full border border-gray-400">
                        <thead class="bg-gray-200">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider border border-gray-400">ID</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider border border-gray-400">採用会社</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider border border-gray-400">採用投稿</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider border border-gray-400">申請者</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider border border-gray-400">自己紹介動画</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider border border-gray-400">TaiseiHDs面談日付け</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider border border-gray-400">TaiseiHDs面談結果</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider border border-gray-400">書選</th>
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
                                        <!-- Repeat the border class for each <td> as needed -->

                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 border border-gray-400">
                                        <div class="flex items-center">

                                            <div class="ml-4">
                                                <div class="text-sm font-medium text-gray-900">{{ $application->jobPost->user->name }}
                                                  <br>



                                                </div>
                                            </div>
                                        </div>
                                    </td>

                                    {{-- <br><span>      <td class="px-6 py-4 whitespace-nowrap text-sm">
                                        <a href="{{ route('admin.company.show', $application->user) }}"
                                           class="text-indigo-600 hover:text-indigo-900">
                                           企業情報見る
                                        </a>
                                    </td></span> --}}



                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 border border-gray-400" style="width: 150px;">
                                        <div class="flex flex-col items-start space-y-2">


                                            <a href="{{ route('jobpost.show', $application->jobPost->id) }}" class="hover:bg-gray-200 rounded-lg">
                                                <svg
                                                class="w-10 h-10"
                                                fill="#000000" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 201.917 201.917" xml:space="preserve"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <path d="M104.809,175.836c0-2.052,1.65-3.708,3.702-3.708h12.732c5.353,3.593,11.399,6.083,17.823,7.246 c-0.269,0.062-0.512,0.158-0.792,0.158h-29.764C106.459,179.539,104.809,177.876,104.809,175.836z M95.76,146.2h6.597 c-0.7-2.436-1.212-4.901-1.504-7.41H95.76c-2.046,0-3.706,1.662-3.706,3.708S93.714,146.2,95.76,146.2z M68.499,52.632 c-4.545-3.054-7.675-9.104-7.675-14.541c0-7.676,6.217-13.905,13.898-13.905c7.681,0,13.898,6.229,13.898,13.905 c0,5.438-3.136,11.487-7.688,14.541c10.894,2.761,18.961,12.227,18.961,19.229c0,8.281-50.339,8.281-50.339,0 C49.55,64.858,57.624,55.399,68.499,52.632z M67.659,71.027l7.057,7.045l7.063-7.045l-5.94-14.355h0.055l2.308-2.637 c-1.124,0.393-2.265,0.636-3.486,0.636c-1.208,0-2.362-0.244-3.486-0.648l2.302,2.649h0.061L67.659,71.027z M160.688,193.836 l0.013-0.012l-0.177-0.311c-0.092,0-0.171,0.023-0.256,0.023H31.249c-6.67,0-12.096-5.425-12.096-12.093V20.152 c0-6.665,5.426-12.09,12.096-12.09h129.02c6.668,0,12.093,5.425,12.093,12.09v73.822c2.893,1.827,5.627,3.903,8.068,6.333V20.152 C180.43,9.036,171.388,0,160.269,0H31.249C20.127,0,11.084,9.036,11.084,20.152v161.292c0,11.112,9.042,20.149,20.164,20.149 h129.02c1.571,0,3.094-0.226,4.573-0.572L160.688,193.836z M53.249,129.315h47.511c0.225-2.479,0.636-4.95,1.26-7.411H53.255 c-2.046,0-3.699,1.656-3.699,3.703C49.55,127.665,51.203,129.315,53.249,129.315z M53.249,95.551h66.576 c1.315-0.956,2.686-1.86,4.116-2.688c3.63-2.095,7.526-3.672,11.552-4.728H53.249c-2.046,0-3.699,1.66-3.699,3.711 S51.203,95.551,53.249,95.551z M53.249,112.43h52.266c1.304-2.618,2.838-5.096,4.592-7.41H53.249c-2.046,0-3.699,1.662-3.699,3.708 S51.203,112.43,53.249,112.43z M179.803,114.684c10.327,17.89,4.177,40.857-13.725,51.173 c-17.884,10.321-40.847,4.201-51.174-13.713c-10.333-17.884-4.177-40.847,13.701-51.176 C146.507,90.637,169.476,96.784,179.803,114.684z M174.438,117.789c-8.629-14.931-27.791-20.064-42.716-11.461 c-14.937,8.635-20.082,27.773-11.436,42.723c8.61,14.93,27.767,20.075,42.703,11.453 C177.921,151.863,183.048,132.719,174.438,117.789z M175.504,163.555l-16.106,9.305l12.404,21.47l16.1-9.292L175.504,163.555z M189.582,187.96l-16.118,9.298c2.582,4.464,8.27,5.974,12.714,3.416C190.629,198.104,192.157,192.405,189.582,187.96z"></path> </g> </g></svg>
                                                 </a>
                                        </div>
                                    </td>




                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 border border-gray-400">
                                        <div class="flex items-center">

                                            <div class="ml-4">
                                                <div class="text-sm font-medium text-gray-900">{{ $application->user->name }}
                                                    <br><small>{{ $application->user->email }}</small>
                                                    <br><small class="text-sky-500">{{ Carbon\Carbon::parse($application->created_at)->format('Y-m-d') }}</small>
                                                    {{-- Carbon\Carbon::parse($application->taisei_interview)->format('Y-m-d') --}}
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

                                        <form action="{{ route('job-applications.set-date',$application) }}" method="POST" class="space-y-2">
                                            @csrf

                                            <div class="flex justify-normal items-center space-x-2">

                                                <input
                                                type="date"
                                                name="taisei_interview"
                                                id="taisei_interview"
                                                class="border-2 border-gray-300 rounded-md p-1 text-sm"
                                                value="{{ old('taisei_interview', $application->taisei_interview ? Carbon\Carbon::parse($application->taisei_interview)->format('Y-m-d') : '') }}"
                                            >

                                            <button type="submit" class="bg-green-400 px-5 py-2 rounded-lg hover:bg-green-500 text-sm text-white ">
                                                決定
                                            </button>
                                        </input>
                                            </div>



                                        </form>
                                    </td>



                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 border border-gray-400">
                                        <form action="{{ route('job-applications.set-result', $application) }}" method="POST" class="space-y-2">
                                            @csrf
                                            <div class="flex justify-normal items-center space-x-2">
                                                <select
                                                    name="taisei_result"
                                                    id="taisei_result"
                                                    class="border-2 border-gray-300 rounded-md p-1 text-sm"
                                                >
                                                    <option value="">選択</option>
                                                    <option value="合格" {{ $application->taisei_result === '合格' ? 'selected' : '' }} class="text-blue-500">合格</option>
                                                    <option value="不合格" {{ $application->taisei_result === '不合格' ? 'selected' : '' }} class="text-red-500">不合格</option>
                                                </select>

                                                <button type="submit" class="bg-green-400 px-5 py-2 rounded-lg hover:bg-green-500 text-sm text-white">
                                                    提出
                                                </button>
                                            </div>
                                        </form>
                                    </td>


                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 border border-gray-400">
                                        <form action="{{ route('job-applications.document-result', $application) }}" method="POST" class="space-y-2">
                                            @csrf

                                            <div class="flex justify-normal items-center space-x-2">

                                                <select
                                                name="document_result"
                                                id="document_result"
                                                class="border-2 border-gray-300 rounded-md p-1 text-sm"
                                            >
                                                <option value="">選択</option>
                                                <option value="合格" {{ $application->document_result === '合格' ? 'selected' : '' }} class="text-blue-500">合格</option>
                                                <option value="不合格" {{ $application->document_result === '不合格' ? 'selected' : '' }} class="text-red-500">不合格</option>
                                            </select>


                                            <button type="submit" class="bg-green-400 px-5 py-2 rounded-lg hover:bg-green-500 text-sm text-white ">
                                                提出
                                            </button>
                                            </div>



                                        </form>
                                    </td>

                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 border border-gray-400">
                                        <form action="" method="POST" class="space-y-2">
                                            @csrf

                                            <div class="flex justify-normal items-center space-x-2">

                                                <input
                                                type="date"
                                                name="" id="" class="border-2 border-gray-300 rounded-md p-1 text-sm">


                                            <button type="submit" class="bg-green-400 px-5 py-2 rounded-lg hover:bg-green-500 text-sm text-white ">
                                                決定
                                            </button>
                                        </input>
                                            </div>



                                        </form>
                                    </td>

                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 border border-gray-400">
                                        <form action="{{ route('admin.applications.review', $application) }}" method="POST" class="space-y-2">
                                            @csrf

                                            <div class="flex justify-normal items-center space-x-2">

                                                <select name="admin_status" id="admin_status" class="border-2 border-gray-300 rounded-md p-1 text-sm">
                                                    <option value="">選択</option>
                                                    <option value="approved">合格</option>
                                                    <option value="rejected">不合格</option>
                                                </select>


                                            <button type="submit" class="bg-green-400 px-5 py-2 rounded-lg hover:bg-green-500 text-sm text-white ">
                                                提出
                                            </button>
                                            </div>



                                        </form>
                                    </td>

                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 border border-gray-400">
                                        <form action="" method="POST" class="space-y-2">
                                            @csrf

                                            <div class="flex justify-normal items-center space-x-2">

                                                <input
                                                type="date"
                                                name="" id="" class="border-2 border-gray-300 rounded-md p-1 text-sm">


                                            <button type="submit" class="bg-green-400 px-5 py-2 rounded-lg hover:bg-green-500 text-sm text-white ">
                                                決定
                                            </button>
                                        </input>
                                            </div>



                                        </form>
                                    </td>




                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 border border-gray-400">
                                        <div class="flex justify-end space-x-3">
                                            <a href=""
                                               class="text-indigo-600 hover:text-indigo-900">
                                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                </svg>
                                            </a>
                                            <form action="" method="POST" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                        class="text-red-600 hover:text-red-900"
                                                        onclick="return confirm('Are you sure you want to delete this user?')">
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

                <!-- Pagination -->
                <div class="bg-white px-4 py-3 border-t border-gray-200 sm:px-6">
                    <div class="flex items-center justify-between">
                        <div class="flex-1 flex justify-between sm:hidden">
                            <!-- Mobile pagination controls -->
                            <a href="#" class="relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">Previous</a>
                            <a href="#" class="ml-3 relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">Next</a>
                        </div>
                        <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
                            <div>
                                <p class="text-sm text-gray-700">
                                    Showing
                                    <span class="font-medium">1</span>
                                    to
                                    <span class="font-medium">10</span>
                                    of
                                    <span class="font-medium">20</span>
                                    results
                                </p>
                            </div>
                            <div>
                                {{ $applications->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>






<x-app-layout>

    <div class="min-h-screen bg-gray-200">
        <div class="p-4 sm:p-6 lg:p-8">
            <!-- Page Header -->
            <div class="sm:flex sm:items-center sm:justify-between mb-8 bg-gradient-to-r from-sky-600 to-sky-800 rounded-lg ">
                <div class="px-5 py-10 p-5">
                    <h2 class="text-3xl font-bold bg-white bg-clip-text text-transparent">申請管理(企業)</h2>
                    <h2 class="mt-4 text-md text-white font-semibold">申請一覧</h2>
                </div>


            </div>

                <!-- Success Message -->
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
                @endif


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


            <!-- Main Content Card -->
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100">
                <!-- Search and Filter Section -->
                <div class="p-6 border-b border-gray-100">
                    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                        {{-- <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                                </svg>
                            </div>
                            <input type="text"
                                   class="block w-full pl-10 pr-3 py-2 border border-gray-200 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent"
                                   placeholder="検索...">
                        </div> --}}
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
                <div class="overflow-x-auto px-2 bg-white">

                    <table class="w-full table-auto border-collapse shadow-xl rounded-lg overflow-hidden">
                        <thead class="bg-green-300 text-gray-500 uppercase text-sm font-semibold">
                            <tr class="divide-x divide-gray-200">
                                <th class="px-6 py-4 border-b border-gray-200">
                                    <div class="flex flex-col items-center">
                                        <span class="mt-32 ">ID</span>
                                    </div>
                                </th>





                                <th class="px-6 py-4 border-b border-gray-200">

                                    <div class="flex flex-col items-center space-y-4">
                                        <div class="w-32 h-32  rounded-lg p-2">
                                            <img src="{{ asset('images/Group16.png') }}" alt="" class="w-full h-full object-contain">
                                        </div>
                                        <span>応募した仕事</span>
                                    </div>

                                </th>

                                <th class="px-6 py-4 border-b border-gray-200">

                                    <div class="flex flex-col items-center space-y-4">
                                        <div class="w-32 h-32  rounded-lg p-2">
                                            <img src="{{ asset('images/Group3.png') }}" alt="" class="w-full h-full object-contain">
                                        </div>
                                        <span>応募者</span>
                                    </div>

                                </th>
                                {{-- <th class="px-6 py-4 border-b border-gray-200">

                                    <div class="flex flex-col items-center space-y-4">
                                        <div class="w-32 h-32  rounded-lg p-2">
                                            <img src="{{ asset('images/Group17.png') }}" alt="" class="w-full h-full object-contain">
                                        </div>
                                        <span>応募者</span>
                                    </div>

                                </th> --}}


                                <th class="px-6 py-4 border-b border-gray-200">

                                    <div class="flex flex-col items-center space-y-4">
                                        <div class="w-32 h-32  rounded-lg p-2">
                                            <img src="{{ asset('images/Group5.png') }}" alt="" class="w-full h-full object-contain">
                                        </div>
                                        <span>太成HDs面談結果</span>
                                    </div>

                                </th>

                                <th class="px-6 py-4 border-b border-gray-200">

                                    <div class="flex flex-col items-center space-y-4">
                                        <div class="w-32 h-32  rounded-lg p-2">
                                            <img src="{{ asset('images/Group18.png') }}" alt="" class="w-full h-full object-contain">
                                        </div>
                                        <span>書類選考結果</span>
                                    </div>

                                </th>

                                <th class="px-6 py-4 border-b border-gray-200">

                                    <div class="flex flex-col items-center space-y-4">
                                        <div class="w-32 h-32  rounded-lg p-2">
                                            <img src="{{ asset('images/Group6.png') }}" alt="" class="w-full h-full object-contain">
                                        </div>
                                        <span>面接・採用試験日</span>
                                    </div>

                                </th>
                                <th class="px-6 py-4 border-b border-gray-200">
                                    <div class="flex flex-col items-center space-y-4">
                                        <div class="w-32 h-32  rounded-lg p-2">
                                            <img src="{{ asset('images/Group9.png') }}" alt="" class="w-full h-full object-contain">
                                        </div>
                                        <span>最終結果</span>
                                    </div>

                                </th>
                                <th class="px-6 py-4 border-b border-gray-200">
                                    <div class="flex flex-col items-center space-y-4">
                                        <div class="w-32 h-32  rounded-lg p-2">
                                            <img src="{{ asset('images/Group10.png') }}" alt="" class="w-full h-full object-contain">
                                        </div>
                                        <span>入社日付</span>
                                    </div>


                                </th>



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
                                                    <br>
                                                    <small>
                                                        <span class="text-blue-500 font-semibold">応募日付け</span>
                                                        {{ $application->created_at->format('Y-m') }}月-{{ $application->created_at->format('d') }}日
                                                    </small>
                                                    <br>
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
                                                </div>
                                            </div>
                                        </div>
                                    </td>

{{--
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 border border-gray-400">

                                    </td> --}}

                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 border border-gray-400">
                                        <span class="{{ empty($application->taisei_result)
                                        ? 'bg-orange-500 rounded-xl px-2  text-white font-semibold py-1'
                                        : 'bg-sky-500 rounded-xl px-2 text-white font-semibold py-1' }}">
                                            {{ $application->taisei_result ?? '進行中' }}
                                        </span>
                                    </td>


                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 border border-gray-400">
                                        <form action="{{ route('job-applications.document-result', $application) }}" method="POST" class="space-y-2">
                                            @csrf
                                            <div class="flex justify-normal items-center space-x-2">
                                                <select
                                                    name="document_result"
                                                    id="document_result"
                                                    class="border-2 border-gray-300 rounded-md p-1 text-sm"
                                                              onchange="this.form.submit();"
                                                >
                                                    <option value="">選択</option>
                                                    <option value="合格" {{ $application->document_result === '合格' ? 'selected' : '' }} class="text-blue-500">合格</option>
                                                    <option value="不合格" {{ $application->document_result === '不合格' ? 'selected' : '' }} class="text-red-500">不合格</option>
                                                </select>


                                            </div>
                                        </form>

                                        @if($application->document_result_updated_by)
                                        <br>
                                        <small class="text-gray-500">
                                            更新者: {{ optional($application->documentResultUpdatedBy)->name ?? 'Unknown' }}<br>
                                            更新日:
                                            {{ $application->document_result_updated_at ? $application->document_result_updated_at->format('Y-m-d H:i') : 'N/A' }}
                                        </small>
                                    @endif
                                    </td>

                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 border border-gray-400">

                                        <form action="{{ route('job-applications.set-date2',$application) }}" method="POST" class="space-y-2">
                                            @csrf

                                            <div class="flex justify-normal items-center space-x-2">
                                                <input
                                                    type="datetime-local"
                                                    name="web_interview"
                                                    id="web_interview"
                                                    class="border-2 border-gray-300 rounded-md p-1 text-sm"
                                                    value="{{ old('web_interview', $application->web_interview ? Carbon\Carbon::parse($application->web_interview)->format('Y-m-d\TH:i') : '') }}"
                                                              onchange="this.form.submit();"
                                                    >


                                            </div>

                                            @if($application->web_interview_updated_at)
                                                <small class="text-gray-500 block mt-2">
                                                    設定者: {{ optional($application->webInterviewUpdatedBy)->name ?? '不明' }}<br>
                                                    更新日: {{ optional($application->web_interview_updated_at)->format('Y-m-d H:i') }}
                                                </small>
                                            @else
                                                <small class="text-gray-500 block mt-2">
                                                    更新情報がありません。
                                                </small>
                                            @endif
                                        </form>
                                    </td>



                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 border border-gray-400">
                                        <form action="{{ route('applications.company-result', $application) }}" method="POST" class="space-y-2">
                                            @csrf
                                            @method('PATCH')

                                            <div class="flex justify-normal items-center space-x-2">
                                                <select name="company_result" id="company_result"
                                                    class="border-2 border-gray-300 rounded-md p-1 text-sm"
                                                      onchange="this.form.submit();"
                                                >
                                                    <option value="">選択</option>
                                                    <option value="合格" {{ $application->company_result === '合格' ? 'selected' : '' }} class="bg-sky-400 text-white font-semibold">合格</option>
                                                    <option value="不合格" {{ $application->company_result === '不合格' ? 'selected' : '' }} class="bg-red-400 text-white font-semibold">不合格</option>
                                                </select>


                                            </div>
                                        </form>

                                        {{-- Show Update Info --}}
                                        @if($application->company_result_updated_at)
                                            <small class="text-gray-500 block mt-2">
                                                更新者: {{ optional($application->companyResultUpdatedBy)->name ?? '不明' }}<br>
                                                更新日: {{ optional($application->company_result_updated_at)->format('Y-m-d H:i') }}
                                            </small>
                                        @else
                                            <small class="text-gray-500 block mt-2">更新情報はありません。</small>
                                        @endif
                                    </td>

                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 border border-gray-400">
                                        <form action="{{ route('applications.company-start-date', $application) }}" method="POST" class="space-y-2">
                                            @csrf
                                            @method('PATCH')

                                            <div class="flex justify-normal items-center space-x-2">
                                                <input type="date" name="work_start" id="work_start"
                                                    class="border-2 border-gray-300 rounded-md p-1 text-sm"
                                                    value="{{ old('work_start', $application->work_start ? Carbon\Carbon::parse($application->work_start)->format('Y-m-d') : '') }}"

                                                  onchange="this.form.submit();"
                                                    >


                                            </div>
                                        </form>

                                        {{-- Show Update Info --}}
                                        @if($application->work_start_updated_at)
                                            <small class="text-gray-500 block mt-2">
                                                更新者: {{ optional($application->workStartUpdatedBy)->name ?? '不明' }}<br>
                                                更新日: {{ optional($application->work_start_updated_at)->format('Y-m-d H:i') }}
                                            </small>
                                        @else
                                            <small class="text-gray-500 block mt-2">更新情報はありません。</small>
                                        @endif
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
 <script>
   function handleSelectChange() {
        const select = document.getElementById('company_result');

        // Remove any previously applied dynamic classes
        select.classList.remove('bg-sky-400', 'bg-red-400', 'text-white', 'font-semibold');

        // Apply class if the selected value is "合格"
        if (select.value === '合格') {
            select.classList.add('bg-sky-400', 'text-white', 'font-semibold');
        } else if (select.value === '不合格') {
            select.classList.add('bg-red-400', 'text-white', 'font-semibold');
        }
    }

    // Run the function on page load to apply classes to the pre-selected value
    document.addEventListener('DOMContentLoaded', handleSelectChange);
 </script>
</x-app-layout>



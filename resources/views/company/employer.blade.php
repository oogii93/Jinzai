
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
                                                {{ Carbon\Carbon::parse($application->web_interview)->format('Y-m-d H:i') ?? '進行中' }}
                                            </span>
                                    </td>
                         <!--Employer controller -->



                         <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 border border-gray-400">

                            {{-- <form action="{{ route('job-applications.set-date2',$application) }}" method="POST" class="space-y-2"> --}}

                                <form action="{{ route('applications.company-result', $application) }}" method="POST" class="space-y-2">
                                    @csrf
                                    @method('PATCH')

                                    <div class="flex justify-normal items-center space-x-2">
                                        <select
                                        name="company_result"
                                        id="company_result"
                                        class="border-2 border-gray-300 rounded-md p-1 text-sm"
                                        onchange="hangleSelectChange()"
                                        >
                                            <option value="">選択</option>
                                            <option value="合格"{{ $application->company_result ==='合格' ? 'selected' : '' }} class="bg-sky-400 text-white font-semibold">合格</option>
                                            <option value="不合格"{{ $application->company_result ==='不合格' ? 'selected' : '' }} class="bg-red-400 text-white font-semibold">不合格</option>

                                        </select>

                                        <button type="submit" class="bg-green-400 px-5 py-2 rounded-lg hover:bg-green-500 text-sm text-white">
                                            提出
                                        </button>
                                    </div>
                                </form>



                        </td>
                         <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 border border-gray-400">

                            {{-- <form action="{{ route('job-applications.set-date2',$application) }}" method="POST" class="space-y-2"> --}}

                                <form action="{{ route('applications.company-start-date',$application) }}" method="POST" class="space-y-2">
                                    @csrf
                                    @method('PATCH')

                                    <div class="flex justify-normal items-center space-x-2">

                                        <input
                                        type="date"
                                        name="work_start"
                                        id="work_start"
                                        class="border-2 border-gray-300 rounded-md p-1 text-sm"
                                        value="{{ old('work_start', $application->work_start ? Carbon\Carbon::parse($application->work_start)->format('Y-m-d') : '') }}"
                                    >

                                    <button type="submit" class="bg-green-400 px-5 py-2 rounded-lg hover:bg-green-500 text-sm text-white ">
                                        決定
                                    </button>
                                </input>
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



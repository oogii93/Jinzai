<x-app-layout>

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

<div class="min-h-screen bg-gray-50/50">
<div class="p-4 sm:p-6 lg:p-8">
    <!-- Page Header -->
    <div class="sm:flex sm:items-center sm:justify-between mb-8 bg-gradient-to-r from-sky-600 to-blue-500 rounded-lg ">
        <div>
            <h2 class="text-2xl font-semibold text-white px-2 mt-10">申請歴管理</h2>
            <h2 class="text-lg font-semibold text-white px-2 mt-5 mb-5">申請歴一覧</h2>
        </div>
    </div>



    <!-- Table Section -->
    <div class="bg-white rounded-lg shadow overflow-hidden">

            <!-- Search and Filter Section -->
            <div class="md:w-3/5 sm:w-full mt-8 mb-5 px-2">
                <form action="" method="GET" class="relative">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </div>

                    <input
                        type="search"
                        name="search"
                        value=""
                        placeholder="検索（名前、メール、電話番号）"
                        class="block w-full py-3 pl-10 pr-24 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 transition duration-300 ease-in-out"
                    >

                    <div class="absolute inset-y-0 right-0 flex items-center pr-3">
                        @if(request('search'))
                            <a href="" class="mr-2 text-gray-500 hover:text-gray-700 transition">
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
                    <span class="font-semibold">{{ $applications->total() }}件</span>
                    <span class="ml-2 text-gray-400">"|"</span>
                    <span class="ml-2">検索キーワード: "{{ request('search') }}"</span>
                </div>
            @endif
            </div>


        <div class="overflow-x-auto bg-orange-100">
            <img src="{{ asset('images/Group 3.svg') }}" alt="" class="justify-center w-full py-4 px-2  mb-10">
            <!-- Status Tabs -->

            <table class="min-w-full border border-gray-400 ">
                <thead class="bg-green-200 ">
                    <tr class="">

                        {{-- <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">採用会社</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">求人情報</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">面接状況</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">選考結果</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">入社日</th>
                        </tr> --}}
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">採用会社名</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">採用位置</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">太成HDS面接日付</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">太成HDS面接結果</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">書類選考結果</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">面接・採用試験日</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">最終結果</th>


                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">入社日付</th>
                    </tr>
                </thead>
                <tbody class="bg-white">
                    @foreach ($applications as $application)
                        <tr class="hover:bg-gray-100">
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 border border-gray-400">{{ $application->id }}</td>
                            <!-- Repeat border class for each <td> as needed -->
                                <!-- Repeat the border class for each <td> as needed -->

                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 border border-gray-400">
                                <div class="flex items-center">

                                    <div class="ml-4">
                                        <div class="text-sm font-medium text-gray-900">{{ $application->jobPost->user->name }}

                                          <br><span><small>{{ $application->jobPost->user->email }}</small></span>

                                          <br><small class="text-sky-500">採用日付 :{{ Carbon\Carbon::parse($application->created_at)->format('Y-m-d') }}</small>


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

                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 border border-gray-400" style="width: 100px;">
                                <div class="flex flex-col items-start space-y-2">


                                    <a href="{{ route('jobpost.show', $application->jobPost->id) }}" class="hover:bg-gray-200 rounded-lg">
                                   <svg
                                   class="w-10 h-10"
                                   fill="#000000" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 201.917 201.917" xml:space="preserve"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <path d="M104.809,175.836c0-2.052,1.65-3.708,3.702-3.708h12.732c5.353,3.593,11.399,6.083,17.823,7.246 c-0.269,0.062-0.512,0.158-0.792,0.158h-29.764C106.459,179.539,104.809,177.876,104.809,175.836z M95.76,146.2h6.597 c-0.7-2.436-1.212-4.901-1.504-7.41H95.76c-2.046,0-3.706,1.662-3.706,3.708S93.714,146.2,95.76,146.2z M68.499,52.632 c-4.545-3.054-7.675-9.104-7.675-14.541c0-7.676,6.217-13.905,13.898-13.905c7.681,0,13.898,6.229,13.898,13.905 c0,5.438-3.136,11.487-7.688,14.541c10.894,2.761,18.961,12.227,18.961,19.229c0,8.281-50.339,8.281-50.339,0 C49.55,64.858,57.624,55.399,68.499,52.632z M67.659,71.027l7.057,7.045l7.063-7.045l-5.94-14.355h0.055l2.308-2.637 c-1.124,0.393-2.265,0.636-3.486,0.636c-1.208,0-2.362-0.244-3.486-0.648l2.302,2.649h0.061L67.659,71.027z M160.688,193.836 l0.013-0.012l-0.177-0.311c-0.092,0-0.171,0.023-0.256,0.023H31.249c-6.67,0-12.096-5.425-12.096-12.093V20.152 c0-6.665,5.426-12.09,12.096-12.09h129.02c6.668,0,12.093,5.425,12.093,12.09v73.822c2.893,1.827,5.627,3.903,8.068,6.333V20.152 C180.43,9.036,171.388,0,160.269,0H31.249C20.127,0,11.084,9.036,11.084,20.152v161.292c0,11.112,9.042,20.149,20.164,20.149 h129.02c1.571,0,3.094-0.226,4.573-0.572L160.688,193.836z M53.249,129.315h47.511c0.225-2.479,0.636-4.95,1.26-7.411H53.255 c-2.046,0-3.699,1.656-3.699,3.703C49.55,127.665,51.203,129.315,53.249,129.315z M53.249,95.551h66.576 c1.315-0.956,2.686-1.86,4.116-2.688c3.63-2.095,7.526-3.672,11.552-4.728H53.249c-2.046,0-3.699,1.66-3.699,3.711 S51.203,95.551,53.249,95.551z M53.249,112.43h52.266c1.304-2.618,2.838-5.096,4.592-7.41H53.249c-2.046,0-3.699,1.662-3.699,3.708 S51.203,112.43,53.249,112.43z M179.803,114.684c10.327,17.89,4.177,40.857-13.725,51.173 c-17.884,10.321-40.847,4.201-51.174-13.713c-10.333-17.884-4.177-40.847,13.701-51.176 C146.507,90.637,169.476,96.784,179.803,114.684z M174.438,117.789c-8.629-14.931-27.791-20.064-42.716-11.461 c-14.937,8.635-20.082,27.773-11.436,42.723c8.61,14.93,27.767,20.075,42.703,11.453 C177.921,151.863,183.048,132.719,174.438,117.789z M175.504,163.555l-16.106,9.305l12.404,21.47l16.1-9.292L175.504,163.555z M189.582,187.96l-16.118,9.298c2.582,4.464,8.27,5.974,12.714,3.416C190.629,198.104,192.157,192.405,189.582,187.96z"></path> </g> </g></svg>
                                    </a>
                                </div>
                            </td>
                            {{-- <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 border border-gray-400">
                                <span class="{{ empty($application->taisei_interview)
                                    ? 'bg-orange-500 rounded-xl px-2  text-white font-semibold py-1'
                                    : 'bg-sky-500 rounded-xl px-2 text-white font-semibold py-1' }}">
                                    {{ $application->taisei_interview ? Carbon\Carbon::parse($application->taisei_interview)->format('Y-m-d') : '進行中' }}
                                </span>
                            </td> --}}

                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 border border-gray-400">
                                <span class="interview-status-{{ $application->id }} {{ empty($application->taisei_interview)
                                    ? 'bg-orange-500 rounded-xl px-2 text-white font-semibold py-1'
                                    : 'bg-sky-500 rounded-xl px-2 text-white font-semibold py-1' }}">
                                    {{ $application->taisei_interview ? Carbon\Carbon::parse($application->taisei_interview)->format('Y-m-d') : '進行中' }}
                                </span>
                            </td>

                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 border border-gray-400">
                                <span class="{{
                                    empty($application->taisei_result)
                                        ? 'bg-orange-500'
                                        : ($application->taisei_result === '合格'
                                            ? 'bg-sky-500'
                                            : 'bg-red-300')
                                }} rounded-xl px-2 text-white font-semibold py-1">
                                    {{ $application->taisei_result ?? '進行中' }}
                                </span>
                            </td>

                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 border border-gray-400">
                                <span class="{{
                                    empty($application->document_result)
                                        ? 'bg-orange-500'
                                        : ($application->document_result === '合格'
                                            ? 'bg-sky-500'
                                            : 'bg-red-300')
                                }} rounded-xl px-2 text-white font-semibold py-1">
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
                                <span class="{{
                                    $application->company_result === '合格'
                                        ? 'bg-sky-500 rounded-xl px-2 text-white font-semibold py-1'
                                        : ($application->company_result === '不合格'
                                            ? 'bg-red-400 rounded-xl px-2 text-white font-semibold py-1'
                                            : 'bg-orange-500 rounded-xl px-2 text-white font-semibold py-1') }}">
                                    {{ $application->company_result ?? '進行中' }}
                                </span>
                            </td>





                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 border border-gray-400">
                                <span class="{{
                                    empty($application->work_start)
                                        ? 'bg-orange-500 rounded-xl px-2  text-white font-semibold py-1'
                                        : 'bg-sky-500 rounded-xl px-2 text-white font-semibold py-1' }}">
                                    {{ $application->work_start ? Carbon\Carbon::parse($application->work_start)->format('Y-m-d') : '進行中' }}
                                </span>
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
                        {{-- {{ $applications->links() }} --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>


{{-- @push('script')
<script type="module">
    import Echo from 'laravel-echo';
    import Pusher from 'pusher-js';

    window.Pusher = Pusher;

    const echo = new Echo({
        broadcaster: 'pusher',
        key: '{{ env('VITE_PUSHER_APP_KEY') }}',
        cluster: '{{ env('VITE_PUSHER_APP_CLUSTER') }}',
        forceTLS: true
    });

    echo.channel('job-applications')
        .listen('JobApplicationUpdated', (e) => {

            console.log('Received event:', e);
            if (e.id === {{ $application->id }}) {
                const interviewStatusElement = document.querySelector(`.interview-status-${e.id}`);
                if (interviewStatusElement) {
                    interviewStatusElement.textContent = e.taisei_interview ? moment(e.taisei_interview).format('YYYY-MM-DD') : '進行中';
                    interviewStatusElement.className = e.taisei_interview ? 'bg-sky-500 rounded-xl px-2 text-white font-semibold py-1' : 'bg-orange-500 rounded-xl px-2 text-white font-semibold py-1';
                }
            }
        });
</script>
@endpush --}}





</x-app-layout>





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


<body class="bg-gray-50">
    <!-- Header with Gradient and Subtle 3D Effect -->
    <div class="relative bg-gradient-to-r from-sky-500 to-indigo-600 shadow-lg">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <div class="flex items-center space-x-6">
                <!-- Profile Image with Modern Border -->
                <div class="ring-4 ring-white/20 rounded-2xl overflow-hidden transform transition-all hover:scale-105">
                    <img src="{{ asset('storage/' . Auth::user()->profile_image) }}"
                         alt="Company Logo"
                         class="w-48 h-48 object-cover">
                </div>

                <!-- Company Name with Refined Typography -->
                <div class="flex-1">
                    <h1 class="text-4xl font-bold text-white drop-shadow-md tracking-tight">
                        {{ $user->name }}
                    </h1>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content Grid -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-8 space-y-8">
        <!-- Statistics Cards with Hover Effects -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @foreach ([
                ['label' => '弊社の投稿', 'value' => $statistics['total_jobs'], 'color' => 'bg-emerald-100'],
                ['label' => '採用申請', 'value' => $statistics['total_applications'], 'color' => 'bg-sky-100'],
                ['label' => '流れ', 'value' => $statistics['pending_reviews'], 'color' => 'bg-amber-100']
            ] as $stat)
                <div class="bg-white rounded-2xl shadow-lg hover:shadow-xl transition-all {{ $stat['color'] }}">
                    <div class="p-6 text-center">
                        <div class="text-3xl font-bold text-gray-800">{{ $stat['value'] }}</div>
                        <div class="text-sm text-gray-600 mt-2">{{ $stat['label'] }}</div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Company Information Card -->
        <div class="grid md:grid-cols-2 gap-8">
            <!-- Basic Information -->
            <div class="bg-white rounded-2xl p-6 shadow-lg">
                <h2 class="text-xl font-semibold text-gray-800 mb-6 border-b pb-3">企業基本情報</h2>

                @php
                    $details = [
                        ['label' => '企業名', 'value' => $user->name],
                        ['label' => 'メールアドレス', 'value' => $user->email],
                        ['label' => '電話番号', 'value' => $user->phone_number],
                        ['label' => '携帯電話', 'value' => $user->mobile_number],
                        ['label' => '住所', 'value' => $user->address]
                    ];
                @endphp

                <div class="space-y-4">
                    @foreach ($details as $detail)
                        <div class="flex items-center space-x-4">
                            <span class="w-32 font-medium text-gray-600">{{ $detail['label'] }}</span>
                            <span class="flex-1 text-gray-800">{{ $detail['value'] }}</span>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Company Profile Details -->
            <div class="bg-white rounded-2xl p-6 shadow-lg">
                <div class="flex justify-between items-center">
                 <h2 class="text-xl font-semibold text-gray-800">会社概要</h2>
                 <a href="{{ route('company.edit') }}"
                    class="px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition-colors text-2xl font-bold">
           +
                 </a>
                </div>



                @php
                    $profile_details = [
                        ['label' => '業種', 'value' => $user->companyProfile->industry ?? ''],
                        ['label' => 'ウェブサイト', 'value' => $user->companyProfile->website ?? ''],
                        ['label'=>'従業員数', 'value'=>$user->companyProfile->employee_number ?? ''],
                        ['label'=>'売上高', 'value'=>$user->companyProfile->profit ?? ''],
                        ['label'=>'設立', 'value'=>$user->companyProfile->stablished ?? ''],
                        ['label'=>'事業内容', 'value'=>$user->companyProfile->details ?? ''],
                    ];
                @endphp

                <div class="space-y-4">
                    @foreach ($profile_details as $detail)
                        <div class="flex flex-col">
                            <span class="text-sm font-medium text-gray-600 mb-1">{{ $detail['label'] }}</span>
                            <span class="text-gray-800">{{ $detail['value'] }}</span>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- Job Posts Section -->
        <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
            <div class="px-6 py-4 bg-gray-50 flex justify-between items-center">
                <h2 class="text-xl font-semibold text-gray-800">{{ $user->name }} -- 投稿</h2>
                <a href="{{ route('jobpost.create') }}"
                   class="px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition-colors">
                    新規投稿
                </a>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-gray-100">
                        <tr>
                            @php
                                $headers = ['番号', 'タイトル', '制作日付け', '作動']
                            @endphp
                            @foreach ($headers as $header)
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    {{ $header }}
                                </th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach ($jobposts as $item)
                            <tr class="hover:bg-gray-50 transition-colors">
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                    {{ $loop->iteration }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center space-x-4">
                                        <div class="flex-shrink-0">
                                            <div class="h-10 w-10 rounded-full bg-indigo-500 flex items-center justify-center text-white font-bold">
                                                {{ substr($item->title, 0, 1) }}
                                            </div>
                                        </div>
                                        <div>
                                            <div class="text-sm font-medium text-gray-900">{{ $item->title }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    {{ $item->created_at->format('Y-m-d') }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right">
                                    <div class="flex space-x-3">
                                        <a href="{{ route('jobpost.edit', $item) }}"
                                           class="text-indigo-600 hover:text-indigo-900 transition-colors">
                                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                            </svg>
                                        </a>
                                        <form action="{{ route('jobpost.destroy', $item) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                    class="text-red-600 hover:text-red-900 transition-colors"
                                                    onclick="return confirm('Are you sure you want to delete this job post?')">
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
    </div>
</body>






</x-app-layout>

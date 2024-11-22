<x-app-layout>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-5">
        <div class="bg-white shadow overflow-hidden sm:rounded-lg">

            @if(session('error'))
            <div class="fixed top-4 right-4 z-50 max-w-sm w-full transition-all duration-300 ease-in-out transform hover:scale-102 animate-slide-in">
                <div class="bg-white shadow-2xl rounded-xl border-l-4 border-red-500 overflow-hidden">
                    <div class="flex items-center p-4 space-x-4">
                        <div class="flex-shrink-0">
                            <svg class="w-8 h-8 text-red-500" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div class="flex-1">
                            <p class="text-sm font-medium text-gray-900">{{ session('error') }}</p>
                        </div>
                        <a href="#" onclick="this.parentElement.parentElement.parentElement.remove(); return false;"
                           class="text-gray-400 hover:text-gray-500 focus:outline-none">
                            <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        @endif

        @if(session('success'))
            <div class="fixed top-4 right-4 z-50 max-w-sm w-full transition-all duration-300 ease-in-out transform hover:scale-102 animate-slide-in">
                <div class="bg-white shadow-2xl rounded-xl border-l-4 border-green-500 overflow-hidden">
                    <div class="flex items-center p-4 space-x-4">
                        <div class="flex-shrink-0">
                            <svg class="w-8 h-8 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div class="flex-1">
                            <p class="text-sm font-medium text-gray-900">{{ session('success') }}</p>
                        </div>
                        <a href="#" onclick="this.parentElement.parentElement.parentElement.remove(); return false;"
                           class="text-gray-400 hover:text-gray-500 focus:outline-none">
                            <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        @endif

            <div class="px-4 py-5 sm:px-6 bg-sky-400">

                <h1 class="text-lg leading-6 font-bold text-white">採用情報</h1>



            </div>



            <div class="border-t border-gray-300">

                      <h1 class="text-center mt-4 mb-4 font-semibold text-gray-600">基本情報</h1>
                <dl class="border border-1">


                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6 border border-gray-100">

                        <dt class="text-lg font-semibold text-gray-500 bg-blue-200 px-5 py-5 rounded-lg">投稿タイトル </dt>
                        <dd class="mt-1 text-lg text-gray-900 sm:mt-0 sm:col-span-2">{{ $jobpost->title }}</dd>
                    </div>
                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6 border border-gray-100">

                        <dt class="text-md font-semibold text-gray-500 bg-blue-200 px-5 py-5 rounded-lg">会社名</dt>
                        <dd class="mt-1 text-md text-gray-900 sm:mt-0 sm:col-span-2">{{ $jobpost->company_name }}</dd>
                    </div>
                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6 border border-gray-100">

                        <dt class="ttext-md font-semibold text-gray-500 bg-blue-200 px-5 py-5 rounded-lg">会社名（ふりがな）</dt>
                        <dd class="mt-1 text-md text-gray-900 sm:mt-0 sm:col-span-2">{{ $jobpost->company_furigana }}</dd>
                    </div>
                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6 border border-gray-100">

                        <dt class="text-md font-semibold text-gray-500 bg-blue-200 px-5 py-5 rounded-lg">所在地</dt>
                        <dd class="mt-1 text-md text-gray-900 sm:mt-0 sm:col-span-2">{{ $jobpost->company_address }}</dd>
                    </div>
                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6 border border-gray-100">

                        <dt class="ttext-md font-semibold text-gray-500 bg-blue-200 px-5 py-5 rounded-lg">企業ホームページ</dt>
                        <dd class="mt-1 text-md text-gray-900 sm:mt-0 sm:col-span-2">{{ $jobpost->homepage_url }}</dd>
                    </div>
                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6 border border-gray-100">

                        <dt class="text-md font-semibold text-gray-500 bg-blue-200 px-5 py-5 rounded-lg">業種</dt>
                        <dd class="mt-1 text-md text-gray-900 sm:mt-0 sm:col-span-2">{{ $jobpost->category->name }}</dd>
                    </div>
                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6 border border-gray-100">

                        <dt class="text-md font-semibold text-gray-500 bg-blue-200 px-5 py-5 rounded-lg">職種</dt>
                        <dd class="mt-1 text-md text-gray-900 sm:mt-0 sm:col-span-2">{{ $jobpost->category2->name }}</dd>
                    </div>

                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6 border border-gray-100">

                        <dt class="text-md font-semibold text-gray-500 bg-blue-200 px-5 py-5 rounded-lg">仕事内容</dt>
                        <dd class="mt-1 text-md text-gray-900 sm:mt-0 sm:col-span-2">{{ $jobpost->job_detail}}</dd>
                    </div>

                    <div class="bbg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6 border border-gray-100">

                        <dt class="text-md font-semibold text-gray-500 bg-blue-200 px-5 py-5 rounded-lg">雇用形態</dt>
                        <dd class="mt-1 text-md text-gray-900 sm:mt-0 sm:col-span-2">{{ $jobpost->type}}</dd>
                    </div>

                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6 border border-gray-100">

                        <dt class="text-md font-semibold text-gray-500 bg-blue-200 px-5 py-5 rounded-lg">就業場所</dt>
                        <dd class="mt-1 text-md text-gray-900 sm:mt-0 sm:col-span-2">{{ $jobpost->working_location}}</dd>
                    </div>

                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6 border border-gray-100">

                        <dt class="text-md font-semibold text-gray-500 bg-blue-200 px-5 py-5 rounded-lg">マイカー通勤</dt>
                        <dd class="mt-1 text-md text-gray-900 sm:mt-0 sm:col-span-2">{{ $jobpost->my_car}}</dd>
                    </div>

                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6 border border-gray-100">

                        <dt class="text-md font-semibold text-gray-500 bg-blue-200 px-5 py-5 rounded-lg">必要な経験・スキル・資格</dt>
                        <dd class="mt-1 text-md text-gray-900 sm:mt-0 sm:col-span-2">{{ $jobpost->qualification}}</dd>
                    </div>

                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6 border border-gray-100">

                        <dt class="text-md font-semibold text-gray-500 bg-blue-200 px-5 py-5 rounded-lg">試用期間</dt>
                        <dd class="mt-1 text-md text-gray-900 sm:mt-0 sm:col-span-2">{{ $jobpost->trial_period}}</dd>
                    </div>

                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6 border border-gray-100">

                        <dt class="text-md font-semibold text-gray-500 bg-blue-200 px-5 py-5 rounded-lg">給料</dt>
                        <dd class="mt-1 text-md text-gray-900 sm:mt-0 sm:col-span-2">{{ $jobpost->salary}}</dd>
                    </div>


                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6 border border-gray-100">

                        <dt class="text-md font-semibold text-gray-500 bg-blue-200 px-5 py-5 rounded-lg">労働時間</dt>
                        <dd class="mt-1 text-md text-gray-900 sm:mt-0 sm:col-span-2">{{ $jobpost->working_hour}}</dd>
                    </div>

                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6 border border-gray-100">

                        <dt class="text-md font-semibold text-gray-500 bg-blue-200 px-5 py-5 rounded-lg">労働時間</dt>
                        <dd class="mt-1 text-md text-gray-900 sm:mt-0 sm:col-span-2">
                            @if($jobpost->working_hour =='固定')
                            <span class="text-md font-semibold text-blue-600">固定:</span> {{ $jobpost->working_hour_a ?? 'なし' }}

                            @elseif($jobpost->working_hour =='シフト制')

                            @if($jobpost->working_hour_b_1)
                            <span class="text-md font-semibold text-blue-600">シフト1:</span> {{ $jobpost->working_hour_b_1 }}<br>
                            @endif

                            @if($jobpost->working_hour_b_2)
                                  <span class="text-md font-semibold text-blue-600">シフト2:</span> {{ $jobpost->working_hour_b_2 }}<br>
                            @endif
                            @if($jobpost->working_hour_b_3)
                            <span class="text-md font-semibold text-blue-600">シフト3:</span>  {{ $jobpost->working_hour_b_3 }}<br>
                            @endif

                        @else
                          未設定
                        @endif
                        </dd>
                    </div>






                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6 border border-gray-100">

                        <dt class="text-md font-semibold text-gray-500 bg-blue-200 px-5 py-5 rounded-lg">休暇</dt>
                        <dd class="mt-1 text-md text-gray-900 sm:mt-0 sm:col-span-2">{{ $jobpost->holiday_type}}</dd>
                    </div>

                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6 border border-gray-100">

                        <dt class="text-md font-semibold text-gray-500 bg-blue-200 px-5 py-5 rounded-lg">時間外労働</dt>
                        <dd class="mt-1 text-md text-gray-900 sm:mt-0 sm:col-span-2">{{ $jobpost->overtime_hour}}</dd>
                    </div>

                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6 border border-gray-100">

                        <dt class="text-md font-semibold text-gray-500 bg-blue-200 px-5 py-5 rounded-lg">休憩時間</dt>
                        <dd class="mt-1 text-md text-gray-900 sm:mt-0 sm:col-span-2">{{ $jobpost->break}}</dd>
                    </div>

                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6 border border-gray-100">

                        <dt class="text-md font-semibold text-gray-500 bg-blue-200 px-5 py-5 rounded-lg">休日</dt>
                        <dd class="mt-1 text-md text-gray-900 sm:mt-0 sm:col-span-2">{{ $jobpost->holidays}}</dd>
                    </div>

                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6 border border-gray-100">

                        <dt class="text-md font-semibold text-gray-500 bg-blue-200 px-5 py-5 rounded-lg">加入保険</dt>
                        <dd class="mt-1 text-md text-gray-900 sm:mt-0 sm:col-span-2">{{ $jobpost->insurance}}</dd>
                    </div>

                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6 border border-gray-100">

                        <dt class="text-md font-semibold text-gray-500 bg-blue-200 px-5 py-5 rounded-lg">退職金制度</dt>
                        <dd class="mt-1 text-md text-gray-900 sm:mt-0 sm:col-span-2">{{ $jobpost->fire_option}}</dd>
                    </div>

                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6 border border-gray-100">

                        <dt class="text-md font-semibold text-gray-500 bg-blue-200 px-5 py-5 rounded-lg">入居可能住居</dt>
                        <dd class="mt-1 text-md text-gray-900 sm:mt-0 sm:col-span-2">{{ $jobpost->house_option}}</dd>
                    </div>

                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6 border border-gray-100">

                        <dt class="text-md font-semibold text-gray-500 bg-blue-200 px-5 py-5 rounded-lg">産休育休制度</dt>
                        <dd class="mt-1 text-md text-gray-900 sm:mt-0 sm:col-span-2">{{ $jobpost->childcare_option}}</dd>
                    </div>



                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6 border border-gray-100">
                        <dt class="text-md font-semibold text-gray-500 bg-blue-200 px-5 py-5 rounded-lg">備考</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{ $jobpost->other }}</dd>
                    </div>
                </dl>
            </div>



            @if(auth()->user()->role === 'jobseeker')
                <div class="px-4 py-5 sm:px-6">
                    {{-- @if(session('error'))
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                            <span class="block sm:inline">{{ session('error') }}</span>
                        </div>
                    @endif
                    @if(session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                            <span class="block sm:inline">{{ session('success') }}</span>
                        </div>
                    @endif --}}

                    <!-- Check if user has already applied -->
                    @if($jobpost->applications()->where('user_id', auth()->id())->exists())
                        <div class="bg-yellow-100 border border-gray-400 text-gray-700 px-4 py-3 rounded relative">
                            あなたはすでにこのポジションに応募しています。
                        </div>
                    @else
                        <button
                            onclick="document.getElementById('applicationModal').classList.remove('hidden')"
                            class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                        >
                           応募する
                        </button>
                    @endif
                </div>





                <!-- Application Modal -->
                <div id="applicationModal" class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full">
                    <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
                        <div class="mt-3">
                            <h3 class="text-lg leading-6 font-medium text-gray-900">{{ $jobpost->title }} <span class="font-mono text-lg">応募する</span></h3>
                            <form action="{{ route('job.apply', $jobpost->id) }}" method="POST" class="mt-4" enctype="multipart/form-data">
                                @csrf


                                <div class="flex justify-end space-x-3">
                                    <button
                                        type="button"
                                        onclick="document.getElementById('applicationModal').classList.add('hidden')"
                                        class="px-4 py-2 bg-gray-200 text-gray-800 rounded-md hover:bg-gray-300"
                                    >
                                      キャンセル
                                    </button>
                                    <button
                                        type="submit"
                                        class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700"
                                    >
                                      申請する
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            @endif


            @if(auth()->user()->role === 'admin')

            <div class="flex space-x-3 px-5 py-2 mb-5 mt-2">
                <!-- Approve Button -->
                <form action="{{ route('jobpost.approve', $jobpost->id) }}" method="POST">
                    @csrf
                    <button type="submit"
                            {{ $jobpost->status === '承認' ? 'disabled' : '' }}
                            class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white
                                   {{ $jobpost->status === '承認' ? 'bg-gray-400 cursor-not-allowed' : 'bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500' }}">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                        承認する
                    </button>
                </form>

                <!-- Reject Button -->
                <form action="{{ route('jobpost.reject', $jobpost->id) }}" method="POST">
                    @csrf
                    <button type="submit"
                            {{ $jobpost->status === '拒否' ? 'disabled' : '' }}
                            class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white
                                   {{ $jobpost->status === '拒否' ? 'bg-gray-400 cursor-not-allowed' : 'bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500' }}">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                        拒否する
                    </button>
                </form>
            </div>
@endif
        </div>
    </div>

    <style>
        @keyframes slide-in {
            0% {
                opacity: 0;
                transform: translateX(100%);
            }
            100% {
                opacity: 1;
                transform: translateX(0);
            }
        }

        .animate-slide-in {
            animation: slide-in 0.5s ease-out;
        }
    </style>

    <script>
           // Auto-remove notifications after 5 seconds
    document.addEventListener('DOMContentLoaded', function() {
        const notifications = document.querySelectorAll('[class*="animate-slide-in"]');
        notifications.forEach(notification => {
            setTimeout(() => {
                notification.style.opacity = '0';
                setTimeout(() => notification.remove(), 500);
            }, 5000);
        });
    });
    </script>
</x-app-layout>

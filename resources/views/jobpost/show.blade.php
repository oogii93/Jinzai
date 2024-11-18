<x-app-layout>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-5">
        <div class="bg-white shadow overflow-hidden sm:rounded-lg">
            <div class="px-4 py-5 sm:px-6 bg-sky-400">

                <h1 class="text-lg leading-6 font-bold text-white">採用情報</h1>



            </div>



            <div class="border-t border-gray-300">

                      <h1 class="text-center mt-4 mb-4 font-semibold text-gray-600">基本情報</h1>
                <dl class="border border-1">


                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6 border border-gray-100">

                        <dt class="text-lg font-semibold text-gray-500 bg-blue-200 px-5 py-5 rounded-lg">役職</dt>
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

                        <dt class="text-md font-semibold text-gray-500 bg-blue-200 px-5 py-5 rounded-lg">職種</dt>
                        <dd class="mt-1 text-md text-gray-900 sm:mt-0 sm:col-span-2">{{ $jobpost->category->name }}</dd>
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

                        <dt class="text-md font-semibold text-gray-500 bg-blue-200 px-5 py-5 rounded-lg">時間外手当</dt>
                        <dd class="mt-1 text-md text-gray-900 sm:mt-0 sm:col-span-2">{{ $jobpost->overtime}}</dd>
                    </div>

                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6 border border-gray-100">

                        <dt class="text-md font-semibold text-gray-500 bg-blue-200 px-5 py-5 rounded-lg">その他手当</dt>
                        <dd class="mt-1 text-md text-gray-900 sm:mt-0 sm:col-span-2">{{ $jobpost->other_allowance}}</dd>
                    </div>

                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6 border border-gray-100">

                        <dt class="text-md font-semibold text-gray-500 bg-blue-200 px-5 py-5 rounded-lg">昇給</dt>
                        <dd class="mt-1 text-md text-gray-900 sm:mt-0 sm:col-span-2">{{ $jobpost->salary_increase_option}}</dd>
                    </div>

                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6 border border-gray-100">

                        <dt class="text-md font-semibold text-gray-500 bg-blue-200 px-5 py-5 rounded-lg">賞与</dt>
                        <dd class="mt-1 text-md text-gray-900 sm:mt-0 sm:col-span-2">{{ $jobpost->bonus_increase_option}}</dd>
                    </div>

                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6 border border-gray-100">

                        <dt class="text-md font-semibold text-gray-500 bg-blue-200 px-5 py-5 rounded-lg">労働時間</dt>
                        <dd class="mt-1 text-md text-gray-900 sm:mt-0 sm:col-span-2">{{ $jobpost->working_hour}}</dd>
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
                    @if(session('error'))
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                            <span class="block sm:inline">{{ session('error') }}</span>
                        </div>
                    @endif
                    @if(session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                            <span class="block sm:inline">{{ session('success') }}</span>
                        </div>
                    @endif

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
                            <h3 class="text-lg leading-6 font-medium text-gray-900">{{ __(' Apply') }}  {{ $jobpost->title }}</h3>
                            <form action="{{ route('job.apply', $jobpost->id) }}" method="POST" class="mt-4" enctype="multipart/form-data">
                                @csrf


                                <div class="flex justify-end space-x-3">
                                    <button
                                        type="button"
                                        onclick="document.getElementById('applicationModal').classList.add('hidden')"
                                        class="px-4 py-2 bg-gray-200 text-gray-800 rounded-md hover:bg-gray-300"
                                    >
                                        {{ __('Cancel') }}
                                    </button>
                                    <button
                                        type="submit"
                                        class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700"
                                    >
                                        {{ __('Submit Application') }}
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>

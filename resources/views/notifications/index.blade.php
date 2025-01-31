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
    <div class="min-h-screen bg-gradient-to-br from-gray-50 to-gray-100 py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-6xl mx-auto space-y-8">
            <div class="bg-white shadow-2xl rounded-2xl overflow-hidden border border-gray-200/50">
                <div class="bg-gradient-to-r from-blue-500 to-blue-400 p-6">
                    <h1 class="text-4xl font-extrabold text-white text-center tracking-tight">
                        通知センター
                    </h1>
                </div>


                <div class="space-y-6 mt-2 px-2 py-3 mb-2">
                    @if($notifications->count() > 0)



                            @forelse($notifications as $notification)

                                <div class="
                                    {{ $notification->unread()
                                        ? 'bg-blue-100 border-blue-200 hover:bg-blue-100'
                                        : 'bg-gray-100 border-gray-200 hover:bg-gray-200' }}
                                    border rounded-xl p-6  hover:shadow-lg
                                    relative group
                                ">




                                            @if($notification->type === 'App\Notifications\NewUserRegisterNotification')
                                                <div class="flex items-center mb-3">
                                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-md font-medium bg-green-100 text-green-800 mr-3">
                                                        新規登録
                                                    </span>
                                                    <span class="text-sm text-gray-500">
                                                        {{ $notification->created_at->diffForHumans() }}
                                                    </span>
                                                </div>

                                                <h3 class="text-lg font-semibold text-gray-800 mb-2">
                                                    新しい{{ $notification->data['user_role']==='jobseeker' ? '求職者' : ($notification->data['user_role'] === 'company' ? '企業' : '管理者') }}登録
                                                </h3>

                                                <div class="text-sm text-gray-600 space-y-1">
                                                    <p>
                                                        <span class="font-medium">氏名/企業名:</span>
                                                        {{ $notification->data['name'] }}
                                                    </p>
                                                    <p>
                                                        <span class="font-medium">メールアドレス:</span>
                                                        {{ $notification->data['email'] }}
                                                    </p>
                                                </div>

                                            {{-- @elseif($notification->type === 'App\Notifications\NewPostNotification') --}}

                                            @elseif(isset($notification->data['type']) && $notification->data['type'] === 'jobPost_created')

                                                     <p class="text-lg font-semibold text-gray-700 text-center mb-4">新しい求人情報通知</p>


                                                <!-- Notification Content Container -->
                                                <div class="flex justify-between items-start space-x-6 mb-4">

                                                    <!-- Left Section: Job Details -->
                                                    <div class="flex-1">
                                                        <p class="  text-md mb-2">投稿タイトル: {{ $notification->data['title'] }}</p>
                                                        <p class=" text-md">
                                                            投稿企業名: {{ $notification->data['company_name'] ?? '企業名なし' }}
                                                        </p>
                                                    </div>

                                                    <!-- Right Section: Applicant Details -->
                                                    <div class="flex-1">
                                                            <p>
                                                            投稿日時: {{ $notification->created_at->diffForHumans() }}

                                                            </p>
                                                    </div>

                                                </div>
                                                <div class="text-center">
                                                    <a href="{{ route('notifications.markAsRead', ['notification' => $notification->id, 'jobPostId' => $notification->data['job_post_id']]) }}"
                                                       class="inline-block px-6 py-2 bg-blue-500 text-white font-semibold rounded-lg hover:bg-blue-600 transition duration-150 ease-in-out">
                                                        詳しくは
                                                    </a>
                                                </div>

                                                {{-- <div class="text-center">
                                                    <a href="{{ route('notifications.markAsRead', $notification->id) }}"
                                                       class="inline-block px-6 py-2 bg-blue-500 text-white font-semibold rounded-lg hover:bg-blue-600 transition duration-150 ease-in-out">
                                                        詳しくは
                                                    </a>
                                                </div> --}}


                        <!-- Notification For admin when jobpost is created from company users -->

                                            @elseif(isset($notification->data['type']) && $notification->data['type'] === 'jobPostNotification_forAdmin')

                                                     <p class="text-lg font-semibold text-gray-700 text-center mb-4">企業様から新しい求人投稿通知</p>
                                                                  {{-- {{ $notification->created_at->diffForHumans() }} --}}

                                                <div class="flex justify-between items-start space-x-6 mb-4">

                                                    <!-- Left Section: Job Details -->
                                                    <div class="flex-1">
                                                        {{-- <p class="  text-md mb-2">投稿タイトル: {{ $notification->data['title'] }}</p> --}}
                                                        <p class=" text-md">
                                                            投稿企業名: {{ $notification->data['company_name'] ?? '企業名なし' }}
                                                        </p>
                                                        <p class="text-sm mt-2">
                                                            投稿タイトル: {{ $notification->data['title'] ?? 'なし' }}
                                                        </p>
                                                    </div>

                                                    <!-- Right Section: Applicant Details -->
                                                    <div class="flex-1">
                                                            <p>
                                                            投稿日時: {{ $notification->created_at->diffForHumans() }}

                                                            </p>
                                                    </div>

                                                </div>

                                                <!-- Action Button -->
                                                <div class="text-center">
                                                    <a href="{{ route('notifications.markAsRead', ['notification' => $notification->id, 'jobPostId' => $notification->data['job_post_id']]) }}"
                                                       class="inline-block px-6 py-2 bg-blue-500 text-white font-semibold rounded-lg hover:bg-blue-600 transition duration-150 ease-in-out">
                                                        詳しくは
                                                    </a>
                                                </div>







                                         @elseif($notification->type === 'App\Notifications\JobSeekerApprovalStatusNotification')

                                                    {{-- <div class="flex items-center mb-3"> --}}
                                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-md font-medium
                                                            {{ $notification->data['approval_status'] ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}
                                                            mr-3">
                                                            {{ $notification->data['approval_status'] ? '承認' : '不承認' }}
                                                        </span>
                                                        <span class="text-sm text-gray-500">
                                                            {{ $notification->created_at->diffForHumans() }}
                                                        </span>
                                                    {{-- </div> --}}

                                                    <h3 class="text-lg font-semibold text-gray-800 mb-2">
                                                        管理者承認通知
                                                    </h3>

                                                    <div class="text-sm text-gray-600 space-y-1">

                                                        <p>
                                                            {{ $notification->data['message'] }}
                                                        </p>
                                                    </div>
                                                           <!-- Action Button -->
                                                <div class="text-center">
                                                    <a href="{{ route('notifications.markAsRead', $notification->id) }}"
                                                       class="inline-block px-6 py-2 bg-blue-500 text-white font-semibold rounded-lg hover:bg-blue-600 transition duration-150 ease-in-out">
                                                        閉じる
                                                    </a>
                                                </div>




                                            @elseif(isset($notification->data['type']) && $notification->data['type'] === 'job_application')
                                                <!-- Notification Title -->
                                                <p class="text-lg font-semibold text-gray-700 text-center mb-4">新規申請者通知</p>

                                                <!-- Notification Content Container -->
                                                <div class="flex justify-between items-start space-x-6 mb-4">

                                                    <!-- Left Section: Job Details -->
                                                    <div class="flex-1">
                                                        <p class="text-gray-600 font-semibold text-md mb-2">投稿タイトル: {{ $notification->data['title'] }}</p>
                                                        <p class="text-gray-600 font-semibold text-md">投稿企業名: {{ $notification->data['company_name'] }}</p>
                                                    </div>

                                                    <!-- Right Section: Applicant Details -->
                                                    <div class="flex-1">
                                                        <p class="text-gray-600 font-semibold text-md mb-2">申請者名: {{ $notification->data['applicant_name'] }}</p>

                                                            申請日時: {{ \Carbon\Carbon::parse($notification->data['created_at'])->setTimezone('Asia/Tokyo')->format('Y-m-d H:i') }}
                                                        </p>
                                                    </div>

                                                </div>

                                                <!-- Action Button -->
                                                <div class="text-center">
                                                    <a href="{{ route('notifications.markAsRead', $notification->id) }}"
                                                       class="inline-block px-6 py-2 bg-blue-500 text-white font-semibold rounded-lg hover:bg-blue-600 transition duration-150 ease-in-out">
                                                        詳しくは
                                                    </a>
                                                </div>


                                                    @elseif($notification->type === 'App\Notifications\CompanyNotificationForJobPostApproval')
                                                    <div class="flex items-center mb-3 p-4 bg-white shadow rounded-lg">
                                                        <div class="notification-content">
                                                            <p class="font-semibold text-gray-600">公開承認通知</p>
                                                            <p class="text-gray-700">
                                                                {{ $notification->data['message'] ?? '通知が届きました。' }}
                                                            </p>
                                                            @if(isset($notification->data['job_post_title']))
                                                                <p class="text-sm text-gray-500 mt-1">
                                                                    求人タイトル: {{ $notification->data['job_post_title'] }}
                                                                </p>
                                                            @endif
                                                            <div class="mt-2">
                                                                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium
                                                                    {{ isset($notification->data['status']) && $notification->data['status'] === '承認' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                                                    {{ $notification->data['status'] ?? '状態不明' }}
                                                                </span>
                                                            </div>
                                                            {{-- @if(isset($notification->data['job_post_id']))
                                                                <a href="{{ route('job-posts.show', $notification->data['job_post_id']) }}"
                                                                   class="text-blue-600 hover:underline text-sm mt-2 inline-block">
                                                                    詳細を見る
                                                                </a>
                                                            @endif --}}
                                                        </div>
                                                    </div>







                                                    @elseif($notification->type === 'App\Notifications\JobSeekerProfileNotification')


                                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-md font-medium bg-green-100 text-green-800 mr-3">
                                                            履歴書編集通知
                                                        </span>
                                                        <span class="text-sm text-gray-500">
                                                            {{ $notification->created_at->diffForHumans() }}
                                                        </span>



                                                        <p>

                                                            {{ $notification->data['name'] }}さんが履歴書の内容を変更しました。
                                                        </p>

                                                            @if (!empty($notification->data['link']))
                                                            <p>
                                                                <a href="{{ $notification->data['link'] }}" class="text-blue-500 underline hover:text-blue-700">
                                                                    履歴書を見る
                                                                </a>
                                                            </p>
                                                            @endif


                            <!--Taisei interview notification-->

                            @elseif(isset($notification->data['type']) && $notification->data['type'] === 'taisei_interview_notification')
                            <div class="flex flex-col items-center space-y-4 max-w-md mx-auto">
                                <!-- Notification Title -->
                                <div class="flex items-center gap-2">
                                    <svg class="h-8 w-8 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    <p class="text-base font-semibold text-gray-700">太成Holdingsの面接時刻通知</p>
                                </div>

                                <!-- Notification Content -->
                                <div class="w-full flex flex-col items-center space-y-3">
                                    <p class="bg-yellow-200 px-3 py-1.5 rounded-lg shadow-sm text-sm w-auto">
                                        <span class="text-gray-800 font-semibold">面接日付け:</span>
                                        {{ Carbon\Carbon::parse($notification->data['date'])
                                            ->setTimeZone('Asia/Tokyo')
                                            ->format('Y年m月d日 時刻-H:i') }}
                                    </p>

                                    <small class="text-gray-600 text-center">{{ $notification->data['message'] }}</small>
                                </div>

                                <!-- Action Button -->
                                <div class="text-center">
                                    <a href="{{ route('notifications.markAsRead', $notification->id) }}"
                                       class="inline-block px-6 py-2 bg-blue-500 text-white font-semibold rounded-lg hover:bg-blue-600 transition duration-150 ease-in-out">
                                        閉じる
                                    </a>
                                </div>

                            </div>

                             <!---Notification ends-->

                                <!--Taisei Result notification-->

                            @elseif(isset($notification->data['type']) && $notification->data['type'] === 'TaiseiInterviewResultNotification')
                            <div class="flex flex-col items-center space-y-4 max-w-md mx-auto">
                                <!-- Notification Title -->
                                <div class="flex items-center gap-2">
                                    <svg class="h-8 w-8 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    <p class="text-base font-semibold text-gray-700">太成Holdingsの面談結果通知</p>
                                </div>

                                <!-- Notification Content -->
                                <div class="w-full flex flex-col items-center space-y-3">
                                    <p class="bg-yellow-200 px-3 py-1.5 rounded-lg shadow-sm text-sm w-auto">
                                        <span class="text-gray-800 font-semibold">面談結果: </span>
                                        {{ $notification->data['taisei_result'] }}
                                        {{-- {{ Carbon\Carbon::parse($notification->data['date'])
                                            ->setTimeZone('Asia/Tokyo')
                                            ->format('Y年m月d日 時刻-H:i') }} --}}
                                    </p>


                                </div>

                                <!-- Action Button -->
                                <div class="text-center">
                                    <a href="{{ route('notifications.markAsRead', $notification->id) }}"
                                       class="inline-block px-6 py-2 bg-blue-500 text-white font-semibold rounded-lg hover:bg-blue-600 transition duration-150 ease-in-out">
                                        閉じる
                                    </a>
                                </div>

                            </div>

                 <!-- TaiseiResult notification for company -->


                            @elseif(isset($notification->data['type']) && $notification->data['type'] === 'TaiseiInterviewResultNotification_forCompany')

                                <p class="text-center font-semibold text-gray-700 " >企業様への通知太成ホールディングスの面接結果通知</p>
                                <div class="flex justify-between items-start space-x-6 mb-4">
                                    <div class="flex-1">
                                        <p class="text-gray-600 font-semibold text-md mb-2">投稿タイトル: {{ $notification->data['title'] }}</p>
                                        <p class="text-gray-600 font-semibold text-md"><span class="bg-yellow-200 rounded-xl shadow-md px-2 py-2">面接結果: {{ $notification->data['taisei_result'] }}</span></p>
                                    </div>

                                    <!-- Right Section: Applicant Details -->
                                    <div class="flex-1">
                                        <p class="text-gray-600 font-semibold text-md mb-2">申請者名: {{ $notification->data['user_name'] }}</p>

                                        </p>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <a href="{{ route('notifications.markAsRead', $notification->id) }}"
                                       class="inline-block px-6 py-2 bg-blue-500 text-white font-semibold rounded-lg hover:bg-blue-600 transition duration-150 ease-in-out">
                                        閉じる
                                    </a>
                                </div>

                 <!-- DOcumentResult  notification for applicant -->


                            @elseif(isset($notification->data['type']) && $notification->data['type'] === 'DocumentResultNotification')

                                <p class="text-center font-semibold text-gray-700 " >書類選考通知</p>
                                <div class="flex justify-normal items-start space-x-6 mb-4">
                                    <div class="flex-1">
                                        {{-- <p class="text-gray-600 font-semibold text-md mb-2">投稿タイトル: {{ $notification->data['title'] }}</p> --}}
                                        <p class="text-gray-600 font-semibold text-md ">
                                            <span class="mb-1 rounded-xl shadow-md px-2 py-2 bg-yellow-200">書類選考結果: {{ $notification->data['document_result'] }}</span>


                                        </p>
                                        <br>
                                        <p class="text-gray-600 font-semibold text-md ">
                                         <span class="px-2">投稿タイトル: {{ $notification->data['job_post_title'] }}</span>
                                        </p>
                                    </div>

                                    <!-- Right Section: Applicant Details -->
                                    <div class="flex-1 ml-10">
                                        <p class="text-gray-600 font-semibold text-md ">
                                        <span class="">企業名: {{ $notification->data['company_name'] }}</span>
                                        </p>
                                        <br>
                                        <p class="text-gray-600 font-semibold text-md ">
                                        <span class="">申請者: {{ $notification->data['user_name'] }}</span>
                                        </p>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <a href="{{ route('notifications.markAsRead', $notification->id) }}"
                                       class="inline-block px-6 py-2 bg-blue-500 text-white font-semibold rounded-lg hover:bg-blue-600 transition duration-150 ease-in-out">
                                        閉じる
                                    </a>
                                </div>
                 <!-- DOcumentResult  notification for Admin -->


                            @elseif(isset($notification->data['type']) && $notification->data['type'] === 'DocumentResultNotificationForAdmin')

                                <p class="text-center font-semibold text-gray-700 " >管理者の書類選考通知</p>
                                <div class="flex justify-between items-start space-x-6 mb-4">
                                    <div class="flex-1">
                                        {{-- <p class="text-gray-600 font-semibold text-md mb-2">投稿タイトル: {{ $notification->data['title'] }}</p> --}}
                                        <p class="text-gray-600 font-semibold text-md"><span class="bg-yellow-200 rounded-xl shadow-md px-2 py-2">書類選考結果: {{ $notification->data['document_result'] }}</span></p>
                                        <br>
                                        <p class="text-gray-600 font-semibold text-md ">
                                         <span class="px-2">投稿タイトル: {{ $notification->data['job_post_title'] }}</span>
                                        </p>
                                    </div>

                                    <!-- Right Section: Applicant Details -->
                                    <div class="flex-1">
                                        <p class="text-gray-600 font-semibold text-md ">
                                            <span class="">企業名: {{ $notification->data['company_name'] }}</span>
                                            </p>
                                            <br>
                                            <p class="text-gray-600 font-semibold text-md ">
                                            <span class="">申請者: {{ $notification->data['user_name'] }}</span>
                                            </p>

                                        </p>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <a href="{{ route('notifications.markAsRead', $notification->id) }}"
                                       class="inline-block px-6 py-2 bg-blue-500 text-white font-semibold rounded-lg hover:bg-blue-600 transition duration-150 ease-in-out">
                                        閉じる
                                    </a>
                                </div>
                 <!-- DOcumentResult  notification for Company -->


                            @elseif(isset($notification->data['type']) && $notification->data['type'] === 'DocumentResultNotificationForCompany')

                                <p class="text-center font-semibold text-gray-700 " >企業様への書類選考通知</p>
                                <div class="flex justify-between items-start space-x-6 mb-4">
                                    <div class="flex-1">
                                        {{-- <p class="text-gray-600 font-semibold text-md mb-2">投稿タイトル: {{ $notification->data['title'] }}</p> --}}
                                        <p class="text-gray-600 font-semibold text-md"><span class="bg-yellow-200 rounded-xl shadow-md px-2 py-2">書類選考結果: {{ $notification->data['document_result'] }}</span></p>
                                        <br>
                                        <p class="text-gray-600 font-semibold text-md ">
                                         <span class="px-2">投稿タイトル: {{ $notification->data['job_post_title'] }}</span>
                                        </p>
                                    </div>

                                    <!-- Right Section: Applicant Details -->
                                    <div class="flex-1">
                                        {{-- <p class="text-gray-600 font-semibold text-md mb-2">申請者名: {{ $notification->data['user_name'] }}</p> --}}
                                        <p class="text-gray-600 font-semibold text-md ">
                                            <span class="">企業名: {{ $notification->data['company_name'] }}</span>
                                            </p>
                                            <br>
                                            <p class="text-gray-600 font-semibold text-md ">
                                            <span class="">申請者: {{ $notification->data['user_name'] }}</span>
                                            </p>

                                        </p>

                                        </p>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <a href="{{ route('notifications.markAsRead', $notification->id) }}"
                                       class="inline-block px-6 py-2 bg-blue-500 text-white font-semibold rounded-lg hover:bg-blue-600 transition duration-150 ease-in-out">
                                        閉じる
                                    </a>
                                </div>
                 <!-- WEB_interview   notification  for applicant-->
{{--
                                        {{
                                        Carbon\Carbon::parse($notification->data['date'])
                                                    ->setTimeZone('Asia/Tokyo')
                                                    ->format('Y年m月d日 時刻-H:i')
                                        }} --}}


                            @elseif(isset($notification->data['type']) && $notification->data['type'] === 'WebInterviewNotification')

                                <p class="text-center font-semibold text-gray-700 " >面接・採用試験日通知</p>
                                <div class="flex justify-between items-start space-x-6 mb-4">
                                    <div class="flex-1">
                                        {{-- <p class="text-gray-600 font-semibold text-md mb-2">投稿タイトル: {{ $notification->data['title'] }}</p> --}}
                                        <p class="text-gray-600 font-semibold text-md"><span class="bg-yellow-200 rounded-xl shadow-md px-2 py-2">
                                            面接・採用試験日:

                                            {{
                                                Carbon\Carbon::parse($notification->data['web_interview'])
                                                    ->setTimezone('Asia/Tokyo')
                                                    ->format('Y年m月d日 時刻-H:i')
                                            }}

                                        </span>
                                        </p>
                                        <br>
                                        <p class="text-gray-600 font-semibold text-md ">
                                         <span class="px-2">投稿タイトル: {{ $notification->data['job_post_title'] }}</span>
                                        </p>
                                    </div>

                                    <!-- Right Section: Applicant Details -->
                                    <div class="flex-1">
                                        {{-- <p class="text-gray-600 font-semibold text-md mb-2">申請者名: {{ $notification->data['user_name'] }}</p> --}}
                                        <p class="text-gray-600 font-semibold text-md ">
                                            <span class="">企業名: {{ $notification->data['company_name'] }}</span>
                                            </p>
                                            <br>
                                            <p class="text-gray-600 font-semibold text-md ">
                                            <span class="">申請者: {{ $notification->data['user_name'] }}</span>
                                            </p>

                                        </p>

                                        </p>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <a href="{{ route('notifications.markAsRead', $notification->id) }}"
                                       class="inline-block px-6 py-2 bg-blue-500 text-white font-semibold rounded-lg hover:bg-blue-600 transition duration-150 ease-in-out">
                                        閉じる
                                    </a>
                                </div>


                 <!-- WEB_interview   notification  for Admin-->


                            @elseif(isset($notification->data['type']) && $notification->data['type'] === 'WebInterviewNotificationForAdmin')

                                <p class="text-center font-semibold text-gray-700 " >管理者の面接・採用試験日通知</p>
                                <div class="flex justify-between items-start space-x-6 mb-4">
                                    <div class="flex-1">
                                        {{-- <p class="text-gray-600 font-semibold text-md mb-2">投稿タイトル: {{ $notification->data['title'] }}</p> --}}
                                        <p class="text-gray-600 font-semibold text-md"><span class="bg-yellow-200 rounded-xl shadow-md px-2 py-2">
                                            面接・採用試験日:
                                            {{
                                                Carbon\Carbon::parse($notification->data['web_interview'])
                                                    ->setTimezone('Asia/Tokyo')
                                                    ->format('Y年m月d日 時刻-H:i')
                                            }}
                                                                                  </span>
                                        </p>
                                        <br>
                                        <p class="text-gray-600 font-semibold text-md ">
                                         <span class="px-2">投稿タイトル: {{ $notification->data['job_post_title'] }}</span>
                                        </p>
                                    </div>

                                    <!-- Right Section: Applicant Details -->
                                    <div class="flex-1">
                                        {{-- <p class="text-gray-600 font-semibold text-md mb-2">申請者名: {{ $notification->data['user_name'] }}</p> --}}
                                        <p class="text-gray-600 font-semibold text-md ">
                                            <span class="">企業名: {{ $notification->data['company_name'] }}</span>
                                            </p>
                                            <br>
                                            <p class="text-gray-600 font-semibold text-md ">
                                            <span class="">申請者: {{ $notification->data['user_name'] }}</span>
                                            </p>

                                        </p>

                                        </p>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <a href="{{ route('notifications.markAsRead', $notification->id) }}"
                                       class="inline-block px-6 py-2 bg-blue-500 text-white font-semibold rounded-lg hover:bg-blue-600 transition duration-150 ease-in-out">
                                        閉じる
                                    </a>
                                </div>

                 <!-- WEB_interview   notification  for CompanyCompany-->


                            @elseif(isset($notification->data['type']) && $notification->data['type'] === 'WebInterviewNotificationForCompany')

                                <p class="text-center font-semibold text-gray-700 " >企業様の面接・採用試験日通知</p>
                                <div class="flex justify-between items-start space-x-6 mb-4">
                                    <div class="flex-1">
                                        {{-- <p class="text-gray-600 font-semibold text-md mb-2">投稿タイトル: {{ $notification->data['title'] }}</p> --}}
                                        <p class="text-gray-600 font-semibold text-md"><span class="bg-yellow-200 rounded-xl shadow-md px-2 py-2">
                                            面接・採用試験日:
                                            {{
                                                Carbon\Carbon::parse($notification->data['web_interview'])
                                                    ->setTimezone('Asia/Tokyo')
                                                    ->format('Y年m月d日 時刻-H:i')
                                            }}
                                                                                 </span>
                                        </p>
                                        <br>
                                        <p class="text-gray-600 font-semibold text-md ">
                                         <span class="px-2">投稿タイトル: {{ $notification->data['job_post_title'] }}</span>
                                        </p>
                                    </div>

                                    <!-- Right Section: Applicant Details -->
                                    <div class="flex-1">
                                        {{-- <p class="text-gray-600 font-semibold text-md mb-2">申請者名: {{ $notification->data['user_name'] }}</p> --}}
                                        <p class="text-gray-600 font-semibold text-md ">
                                            <span class="">企業名: {{ $notification->data['company_name'] }}</span>
                                            </p>
                                            <br>
                                            <p class="text-gray-600 font-semibold text-md ">
                                            <span class="">申請者: {{ $notification->data['user_name'] }}</span>
                                            </p>

                                        </p>

                                        </p>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <a href="{{ route('notifications.markAsRead', $notification->id) }}"
                                       class="inline-block px-6 py-2 bg-blue-500 text-white font-semibold rounded-lg hover:bg-blue-600 transition duration-150 ease-in-out">
                                        閉じる
                                    </a>
                                </div>

                 <!-- Company_Result   notification  for applicant-->


                            @elseif(isset($notification->data['type']) && $notification->data['type'] === 'Company_Result_Notification')

                                <p class="text-center font-semibold text-gray-700 " >申請者への最終結果通知</p>
                                <div class="flex justify-between items-start space-x-6 mb-4">
                                    <div class="flex-1">
                                        {{-- <p class="text-gray-600 font-semibold text-md mb-2">投稿タイトル: {{ $notification->data['title'] }}</p> --}}
                                        <p class="text-gray-600 font-semibold text-md"><span class="bg-yellow-200 rounded-xl shadow-md px-2 py-2">
                                            最終結果:
                                            {{
                                              $notification->data['company_result']

                                            }}
                                                                                 </span>
                                        </p>
                                        <br>
                                        <p class="text-gray-600 font-semibold text-md ">
                                         <span class="px-2">投稿タイトル: {{ $notification->data['job_post_title'] }}</span>
                                        </p>
                                    </div>

                                    <!-- Right Section: Applicant Details -->
                                    <div class="flex-1">
                                        {{-- <p class="text-gray-600 font-semibold text-md mb-2">申請者名: {{ $notification->data['user_name'] }}</p> --}}
                                        <p class="text-gray-600 font-semibold text-md ">
                                            <span class="">企業名: {{ $notification->data['company_name'] }}</span>
                                            </p>
                                            <br>
                                            <p class="text-gray-600 font-semibold text-md ">
                                            <span class="">申請者: {{ $notification->data['user_name'] }}</span>
                                            </p>

                                        </p>

                                        </p>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <a href="{{ route('notifications.markAsRead', $notification->id) }}"
                                       class="inline-block px-6 py-2 bg-blue-500 text-white font-semibold rounded-lg hover:bg-blue-600 transition duration-150 ease-in-out">
                                        閉じる
                                    </a>
                                </div>
                 <!-- Company_Result   notification  for Company-->


                            @elseif(isset($notification->data['type']) && $notification->data['type'] === 'Company_Result_NotificationForCompany')

                                <p class="text-center font-semibold text-gray-700 " >企業様への最終結果通知</p>
                                <div class="flex justify-between items-start space-x-6 mb-4">
                                    <div class="flex-1">
                                        {{-- <p class="text-gray-600 font-semibold text-md mb-2">投稿タイトル: {{ $notification->data['title'] }}</p> --}}
                                        <p class="text-gray-600 font-semibold text-md"><span class="bg-yellow-200 rounded-xl shadow-md px-2 py-2">
                                            最終結果:
                                            {{
                                              $notification->data['company_result']

                                            }}
                                                                                 </span>
                                        </p>
                                        <br>
                                        <p class="text-gray-600 font-semibold text-md ">
                                         <span class="px-2">投稿タイトル: {{ $notification->data['job_post_title'] }}</span>
                                        </p>
                                    </div>

                                    <!-- Right Section: Applicant Details -->
                                    <div class="flex-1">
                                        {{-- <p class="text-gray-600 font-semibold text-md mb-2">申請者名: {{ $notification->data['user_name'] }}</p> --}}
                                        <p class="text-gray-600 font-semibold text-md ">
                                            <span class="">企業名: {{ $notification->data['company_name'] }}</span>
                                            </p>
                                            <br>
                                            <p class="text-gray-600 font-semibold text-md ">
                                            <span class="">申請者: {{ $notification->data['user_name'] }}</span>
                                            </p>

                                        </p>

                                        </p>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <a href="{{ route('notifications.markAsRead', $notification->id) }}"
                                       class="inline-block px-6 py-2 bg-blue-500 text-white font-semibold rounded-lg hover:bg-blue-600 transition duration-150 ease-in-out">
                                        閉じる
                                    </a>
                                </div>
                 <!-- Company_Result   notification  for Admin-->


                            @elseif(isset($notification->data['type']) && $notification->data['type'] === 'Company_Result_NotificationForAdmin')

                                <p class="text-center font-semibold text-gray-700 " >管理者への最終結果通知</p>
                                <div class="flex justify-between items-start space-x-6 mb-4">
                                    <div class="flex-1">
                                        {{-- <p class="text-gray-600 font-semibold text-md mb-2">投稿タイトル: {{ $notification->data['title'] }}</p> --}}
                                        <p class="text-gray-600 font-semibold text-md"><span class="bg-yellow-200 rounded-xl shadow-md px-2 py-2">
                                            最終結果:
                                            {{
                                              $notification->data['company_result']

                                            }}
                                                                                 </span>
                                        </p>
                                        <br>
                                        <p class="text-gray-600 font-semibold text-md ">
                                         <span class="px-2">投稿タイトル: {{ $notification->data['job_post_title'] }}</span>
                                        </p>
                                    </div>

                                    <!-- Right Section: Applicant Details -->
                                    <div class="flex-1">
                                        {{-- <p class="text-gray-600 font-semibold text-md mb-2">申請者名: {{ $notification->data['user_name'] }}</p> --}}
                                        <p class="text-gray-600 font-semibold text-md ">
                                            <span class="">企業名: {{ $notification->data['company_name'] }}</span>
                                            </p>
                                            <br>
                                            <p class="text-gray-600 font-semibold text-md ">
                                            <span class="">申請者: {{ $notification->data['user_name'] }}</span>
                                            </p>

                                        </p>

                                        </p>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <a href="{{ route('notifications.markAsRead', $notification->id) }}"
                                       class="inline-block px-6 py-2 bg-blue-500 text-white font-semibold rounded-lg hover:bg-blue-600 transition duration-150 ease-in-out">
                                        閉じる
                                    </a>
                                </div>


                 <!-- WorkSTart   notification  for Applicant-->


                            @elseif(isset($notification->data['type']) && $notification->data['type'] === 'WorkStartNotification')

                                <p class="text-center font-semibold text-gray-700 " >申請者への入社日通知</p>
                                <div class="flex justify-between items-start space-x-6 mb-4">
                                    <div class="flex-1">
                                        {{-- <p class="text-gray-600 font-semibold text-md mb-2">投稿タイトル: {{ $notification->data['title'] }}</p> --}}
                                        <p class="text-gray-600 font-semibold text-md"><span class="bg-yellow-200 rounded-xl shadow-md px-2 py-2">
                                            入社日付:
                                            {{
                                              Carbon\Carbon::parse($notification->data['work_start'])
                                                        ->setTimezone('Asia/Tokyo')
                                                        ->format('Y年m月d日')


                                            }}
                                                                                 </span>
                                        </p>
                                        <br>
                                        <p class="text-gray-600 font-semibold text-md ">
                                         <span class="px-2">投稿タイトル: {{ $notification->data['job_post_title'] }}</span>
                                        </p>
                                    </div>

                                    <!-- Right Section: Applicant Details -->
                                    <div class="flex-1">
                                        {{-- <p class="text-gray-600 font-semibold text-md mb-2">申請者名: {{ $notification->data['user_name'] }}</p> --}}
                                        <p class="text-gray-600 font-semibold text-md ">
                                            <span class="">企業名: {{ $notification->data['company_name'] }}</span>
                                            </p>
                                            <br>
                                            <p class="text-gray-600 font-semibold text-md ">
                                            <span class="">申請者: {{ $notification->data['user_name'] }}</span>
                                            </p>

                                        </p>

                                        </p>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <a href="{{ route('notifications.markAsRead', $notification->id) }}"
                                       class="inline-block px-6 py-2 bg-blue-500 text-white font-semibold rounded-lg hover:bg-blue-600 transition duration-150 ease-in-out">
                                        閉じる
                                    </a>
                                </div>

                 <!-- WorkSTart   notification  for Company-->


                            @elseif(isset($notification->data['type']) && $notification->data['type'] === 'WorkStartNotificationForCompany')

                                <p class="text-center font-semibold text-gray-700 " >企業様への入社日通知</p>
                                <div class="flex justify-between items-start space-x-6 mb-4">
                                    <div class="flex-1">
                                        {{-- <p class="text-gray-600 font-semibold text-md mb-2">投稿タイトル: {{ $notification->data['title'] }}</p> --}}
                                        <p class="text-gray-600 font-semibold text-md"><span class="bg-yellow-200 rounded-xl shadow-md px-2 py-2">
                                            入社日付:
                                            {{
                                              Carbon\Carbon::parse($notification->data['work_start'])
                                                        ->setTimezone('Asia/Tokyo')
                                                        ->format('Y年m月d日')


                                            }}
                                                                                 </span>
                                        </p>
                                        <br>
                                        <p class="text-gray-600 font-semibold text-md ">
                                         <span class="px-2">投稿タイトル: {{ $notification->data['job_post_title'] }}</span>
                                        </p>
                                    </div>

                                    <!-- Right Section: Applicant Details -->
                                    <div class="flex-1">
                                        {{-- <p class="text-gray-600 font-semibold text-md mb-2">申請者名: {{ $notification->data['user_name'] }}</p> --}}
                                        <p class="text-gray-600 font-semibold text-md ">
                                            <span class="">企業名: {{ $notification->data['company_name'] }}</span>
                                            </p>
                                            <br>
                                            <p class="text-gray-600 font-semibold text-md ">
                                            <span class="">申請者: {{ $notification->data['user_name'] }}</span>
                                            </p>

                                        </p>

                                        </p>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <a href="{{ route('notifications.markAsRead', $notification->id) }}"
                                       class="inline-block px-6 py-2 bg-blue-500 text-white font-semibold rounded-lg hover:bg-blue-600 transition duration-150 ease-in-out">
                                        閉じる
                                    </a>
                                </div>
                 <!-- WorkSTart   notification  for Admin-->


                            @elseif(isset($notification->data['type']) && $notification->data['type'] === 'WorkStartNotificationForAdmin')

                                <p class="text-center font-semibold text-gray-700 " >管理者への入社日通知</p>
                                <div class="flex justify-between items-start space-x-6 mb-4">
                                    <div class="flex-1">
                                        {{-- <p class="text-gray-600 font-semibold text-md mb-2">投稿タイトル: {{ $notification->data['title'] }}</p> --}}
                                        <p class="text-gray-600 font-semibold text-md"><span class="bg-yellow-200 rounded-xl shadow-md px-2 py-2">
                                            入社日付:
                                            {{
                                              Carbon\Carbon::parse($notification->data['work_start'])
                                                        ->setTimezone('Asia/Tokyo')
                                                        ->format('Y年m月d日')


                                            }}
                                                                                 </span>
                                        </p>
                                        <br>
                                        <p class="text-gray-600 font-semibold text-md ">
                                         <span class="px-2">投稿タイトル: {{ $notification->data['job_post_title'] }}</span>
                                        </p>
                                    </div>

                                    <!-- Right Section: Applicant Details -->
                                    <div class="flex-1">
                                        {{-- <p class="text-gray-600 font-semibold text-md mb-2">申請者名: {{ $notification->data['user_name'] }}</p> --}}
                                        <p class="text-gray-600 font-semibold text-md ">
                                            <span class="">企業名: {{ $notification->data['company_name'] }}</span>
                                            </p>
                                            <br>
                                            <p class="text-gray-600 font-semibold text-md ">
                                            <span class="">申請者: {{ $notification->data['user_name'] }}</span>
                                            </p>

                                        </p>

                                        </p>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <a href="{{ route('notifications.markAsRead', $notification->id) }}"
                                       class="inline-block px-6 py-2 bg-blue-500 text-white font-semibold rounded-lg hover:bg-blue-600 transition duration-150 ease-in-out">
                                        閉じる
                                    </a>
                                </div>



                    @endif







                <div class="absolute top-4 right-4 opacity-0 group-hover:opacity-100 transition-opacity">
                    @if($notification->unread())
                        <span class="h-3 w-3 bg-blue-500 rounded-full animate-pulse"></span>
                    @endif
                </div>
            </div>
    @endforeach

                            <div class="mt-6">
                                {{ $notifications->links('pagination::tailwind') }}
                            </div>
                        </div>
                    @else
                        <div class="text-center py-12 bg-gray-50 rounded-xl">
                            <svg class="mx-auto h-20 w-20 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <p class="mt-4 text-xl text-gray-500 font-semibold">
                                現在、通知はありません
                            </p>
                        </div>
                    @endif
    </div>
</x-app-layout>

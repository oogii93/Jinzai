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

                <div class="p-6">
                    @if($notifications->count() > 0)
                        <div class="space-y-6">
                            @forelse($notifications as $notification)
                                <div class="
                                    {{ $notification->unread()
                                        ? 'bg-blue-50 border-blue-200 hover:bg-blue-100'
                                        : 'bg-gray-50 border-gray-200 hover:bg-gray-100' }}
                                    border rounded-xl p-6  hover:shadow-lg
                                    relative group
                                ">
                                    <div class="flex justify-between items-start">
                                        <div class="flex-1 pr-4">
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

                                            @elseif($notification->type === 'App\Notifications\NewPostNotification')
                                                <div class="flex items-center mb-3">
                                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-purple-100 text-purple-800 mr-3">
                                                        求人情報
                                                    </span>
                                                    <span class="text-sm text-gray-500">
                                                        {{ $notification->created_at->diffForHumans() }}
                                                    </span>
                                                </div>

                                                <h3 class="text-lg font-semibold text-gray-800 mb-2">
                                                    新しい求人情報
                                                </h3>

                                                <div class="text-sm text-gray-600 space-y-1">
                                                    <p>
                                                        <span class="font-medium">求人タイトル:</span>
                                                        "{{ $notification->data['title'] }}"
                                                    </p>
                                                    <p>
                                                        <span class="font-medium">作成者:</span>
                                                        {{ $notification->data['created_by'] }}
                                                    </p>
                                                </div>



                                                @elseif($notification->type === 'App\Notifications\JobSeekerApprovalStatusNotification')
                                                    <div class="flex items-center mb-3">
                                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-md font-medium
                                                            {{ $notification->data['approval_status'] ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}
                                                            mr-3">
                                                            {{ $notification->data['approval_status'] ? '承認' : '不承認' }}
                                                        </span>
                                                        <span class="text-sm text-gray-500">
                                                            {{ $notification->created_at->diffForHumans() }}
                                                        </span>
                                                    </div>

                                                    <h3 class="text-lg font-semibold text-gray-800 mb-2">
                                                        管理者承認通知
                                                    </h3>

                                                    <div class="text-sm text-gray-600 space-y-1">

                                                        <p>
                                                            {{ $notification->data['message'] }}
                                                        </p>
                                                    </div>


                                                    @elseif($notification->type === 'App\Notifications\JobApplicationNotification')
                                                    <div class="flex items-center mb-3 p-4 bg-white shadow rounded-lg">
                                                        <div class="notification-content">
                                                            <p class="font-semibold text-gray-600">新しい求人応募通知</p>
                                                            <p>
                                                                {{ $notification->data['message'] }}


                                                            </p>
                                                            <p>



                                                            </p>
                                                            <div class="mt-2">
                                                                {{-- <a href="{{ $notification->data['view_application_url'] }}"
                                                                   class="text-blue-600 hover:underline">
                                                                    応募詳細を確認する
                                                                </a> --}}
                                                            </div>
                                                        </div>
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

                                                    <div class="flex items-center mb-3">
                                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-md font-medium bg-green-100 text-green-800 mr-3">
                                                            履歴書編集通知
                                                        </span>
                                                        <span class="text-sm text-gray-500">
                                                            {{ $notification->created_at->diffForHumans() }}
                                                        </span>
                                                    </div>



                                                    <div class="text-sm text-gray-600 space-y-1">
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

                                                    </div>

                                            @endif

                                            @if($notification->unread())
                                                <div class="mt-4">
                                                    <form
                                                        action="{{ route('notifications.mark-as-read', $notification->id) }}"
                                                        method="POST"
                                                        class="inline-block"
                                                    >
                                                        @csrf
                                                        @method('PATCH')
                                                        <button
                                                            type="submit"
                                                            class="
                                                                px-4 py-2
                                                                bg-blue-500 text-white
                                                                rounded-lg
                                                                text-sm
                                                                hover:bg-blue-600
                                                                transition-colors
                                                                focus:outline-none
                                                                focus:ring-2
                                                                focus:ring-blue-400
                                                            "
                                                        >
                                                            既読にする
                                                        </button>
                                                    </form>
                                                </div>
                                            @endif
                                        </div>

                                        <div class="absolute top-4 right-4 opacity-0 group-hover:opacity-100 transition-opacity">
                                            @if($notification->unread())
                                                <span class="h-3 w-3 bg-blue-500 rounded-full animate-pulse"></span>
                                            @endif
                                        </div>
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
            </div>
        </div>
    </div>
</x-app-layout>

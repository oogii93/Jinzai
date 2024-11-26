<x-app-layout>






<div class="py-12 bg-gray-100">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <h1 class="text-3xl mt-3 px-6 py-4 text-center font-bold text-gray-700">通知</h1>

            <div class="p-6 bg-white border-b border-gray-200">
                @foreach($notifications as $notification)
                <div class="mb-6 p-6 rounded-lg shadow-sm transition-all duration-200 ease-in-out bg-sky-200
                    {{ $notification->unread() ? 'list-group-item-unread' : '' }}">
                    @if($notification->type === 'App\Notifications\NewPostNotification')
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">通知</h5>
                            <small>{{ $notification->created_at->diffForHumans() }}</small>
                        </div>
                        <p class="mb-1">
                            新しい求人情報 "{{ $notification->data['title'] }}"

                            <br>作成者 {{ $notification->data['created_by'] }}
                        </p>

                        @if($notification->unread())
                            <form action="{{ route('notifications.mark-as-read', $notification->id) }}"
                                  method="POST" class="d-inline">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="btn btn-sm btn-outline-secondary">
                                    既読にする
                                </button>
                            </form>
                        @endif
                    @endif
                </div>
            @endforeach
</x-app-layout>


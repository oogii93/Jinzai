<div id="chatBox" class="fixed bottom-4 right-5 z-50 bg-white shadow-lg border border-gray-200 rounded-xl w-20 h-20 overflow-hidden transition-all duration-300">
    <div class="bg-gradient-to-r from-blue-500 to-indigo-600 p-4 flex items-center justify-between">
        <div class="flex items-center space-x-3">
            <svg class="w-7 h-7 text-white" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M8 10.5H16" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                <path d="M8 14H13.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                <path d="M17 3.33782C15.5291 2.48697 13.8214 2 12 2C6.47715 2 2 6.47715 2 12C2 13.5997 2.37562 15.1116 3.04346 16.4525C3.22094 16.8088 3.28001 17.2161 3.17712 17.6006L2.58151 19.8267C2.32295 20.793 3.20701 21.677 4.17335 21.4185L6.39939 20.8229C6.78393 20.72 7.19121 20.7791 7.54753 20.9565C8.88837 21.6244 10.4003 22 12 22C17.5228 22 22 17.5228 22 12C22 10.1786 21.513 8.47087 20.6622 7" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
            </svg>
        </div>

        <button id="toggleChatSize" class="text-white hover:bg-white/20 rounded-full p-1 transition">
            <svg id="toggleIcon" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 8h16M4 16h16" />
            </svg>
        </button>
    </div>

    <div class="p-4 max-h-96 overflow-y-auto">
        @if(auth()->user()->role === 'admin')
            <div class="space-y-3">
                @foreach($users as $user)
                    @if($user->id !== auth()->id())
                        <a href="{{ route('chat.show', $user) }}"
                           class="block bg-gray-100 hover:bg-gray-200 rounded-lg p-3 transition group">
                            <div class="flex items-center justify-between">
                                <div>
                                    <h3 class="font-medium text-gray-800 group-hover:text-blue-600 transition">
                                        {{ $user->name }}
                                    </h3>
                                    <p class="text-xs text-gray-500 capitalize">{{ $user->role }}</p>
                                </div>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400 group-hover:text-blue-500 transition" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5l7 7-7 7M5 5l7 7-7 7" />
                                </svg>
                            </div>
                        </a>
                    @endif
                @endforeach
            </div>
        @else
            @php
                $admin = App\Models\User::where('role', 'admin')->first();
            @endphp
            @if($admin)
                <div class="text-center bg-blue-50 rounded-lg p-4">
                    <a href="{{ route('chat.show', $admin) }}"
                       class="inline-flex items-center space-x-2 text-blue-600 hover:text-blue-800 transition font-semibold">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" />
                        </svg>
                        <span>チャットを開始</span>
                    </a>
                </div>
            @else
                <p class="text-sm text-gray-500 text-center bg-gray-100 p-4 rounded-lg">
                    管理者は現在利用できません。
                </p>
            @endif
        @endif
    </div>
</div>

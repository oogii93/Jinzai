<div id="chatBox" class="fixed bottom-4 right-5 z-50 bg-white shadow-lg border rounded-2xl p-6 w-80 transition-all duration-300">
    <svg class="w-8 h-8" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
        <g id="SVGRepo_iconCarrier">
            <path d="M8 10.5H16" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"></path>
            <path d="M8 14H13.5" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"></path>
            <path d="M17 3.33782C15.5291 2.48697 13.8214 2 12 2C6.47715 2 2 6.47715 2 12C2 13.5997 2.37562 15.1116 3.04346 16.4525C3.22094 16.8088 3.28001 17.2161 3.17712 17.6006L2.58151 19.8267C2.32295 20.793 3.20701 21.677 4.17335 21.4185L6.39939 20.8229C6.78393 20.72 7.19121 20.7791 7.54753 20.9565C8.88837 21.6244 10.4003 22 12 22C17.5228 22 22 17.5228 22 12C22 10.1786 21.513 8.47087 20.6622 7" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"></path>
        </g>
    </svg>
    <button id="toggleChatSize" class="absolute top-2 right-2 text-gray-500 hover:text-gray-700">
        <svg id="toggleIcon" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 8h16M4 16h16" />
        </svg>
    </button>

    @if(auth()->user()->role === 'admin')
    <h2 class="text-sm font-semibold">チャト一覧</h2>
        <div class="space-y-2 py-3">


            @foreach($users as $user)
                @if($user->id !== auth()->id())
                    <a href="{{ route('chat.show', $user) }}"
                       class="block bg-sky-100 border border-blue-300 rounded-lg p-4 hover:bg-sky-200 transition">
                        <h3 class="font-medium text-blue-800">{{ $user->name }}</h3>
                        <p class="text-sm text-gray-600 capitalize">{{ $user->role }}</p>
                    </a>
                @endif
            @endforeach
        </div>
    @else
        @php
            $admin = App\Models\User::where('role', 'admin')->first();
        @endphp
        @if($admin)
            <div class="text-center">
                <a href="{{ route('chat.show', $admin) }}"
                   class="text-blue-500 hover:text-blue-700 transition font-bold">
                    チャット
                </a>
            </div>
        @else
            <p class="text-sm text-gray-500 text-center">No admin available for chat.</p>
        @endif
    @endif
</div>

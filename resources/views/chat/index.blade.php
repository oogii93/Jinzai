<!-- resources/views/chat/index.blade.php -->
<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h2 class="text-2xl font-bold mb-4">Conversations</h2>
                    <div class="space-y-4">
                        @forelse ($conversations as $userId => $messages)
                            @php
                                $otherUser = $messages->first()->sender_id === Auth::id()
                                    ? $messages->first()->receiver
                                    : $messages->first()->sender;
                            @endphp
                            <a href="{{ route('chat.show', $otherUser) }}"
                               class="block p-4 border rounded-lg hover:bg-gray-50">
                                <div class="flex justify-between items-center">
                                    <div>
                                        <h3 class="font-semibold">{{ $otherUser->name }}</h3>
                                        <p class="text-sm text-gray-600">
                                            {{ $messages->first()->content }}
                                        </p>
                                    </div>
                                    <span class="text-sm text-gray-500">
                                        {{ $messages->first()->created_at->diffForHumans() }}
                                    </span>
                                </div>
                            </a>
                        @empty
                            <p class="text-gray-600">No conversations yet.</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

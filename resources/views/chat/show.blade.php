<!-- resources/views/chat/show.blade.php -->
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

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="flex items-center justify-between mb-4 bg-sky-300 ">
                        <h2 class="text-2xl font-bold  px-5 py-5">チャトと{{ $otherUser->name }}</h2>
                        <span class="text-md text-white bg-orange-400 px-3 py-3 rounded-lg">{{ $otherUser->role }}</span>
                    </div>


                    <div class="p-6 text-gray-900 ">


                        <div id="messagesContainer" class="space-y-4 mb-4 h-96 overflow-y-auto">
                            @foreach ($messages as $message)
                                <div class="flex {{ $message->sender_id === Auth::id() ? 'justify-end' : 'justify-start' }}">
                                    <div class="{{ $message->sender_id === Auth::id()
                                        ? 'bg-blue-500 text-white'
                                        : 'bg-gray-100 text-gray-900' }}
                                        rounded-lg p-3 max-w-md">
                                        <p>{{ $message->content }}</p>
                                        <span class="text-xs {{ $message->sender_id === Auth::id()
                                            ? 'text-blue-100'
                                            : 'text-gray-500' }}">
                                            {{ $message->created_at->format('M j, g:i a') }}
                                        </span>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                     <form action="" id="messageForm" class="space-y-4">
                        @csrf
                        <div>
                            <textarea
                            name="content"
                            id="messageContent"
                            class="w-full rounded-lg border border-gray-400"
                            rows="3"
                            placeholder="メッセージを入力してください..."
                            required
                        ></textarea>
                        </div>

                        <button
                        type="submit"
                        class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition font-semibold"
                    >
                        メッセージ送信
                    </button>
                     </form>
                    </div>
                </div>
            </div>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const messageForm = document.getElementById('messageForm');
                const messagesContainer = document.getElementById('messagesContainer');
                const messageContent = document.getElementById('messageContent');

                // Ensure all elements exist
                if (!messageForm || !messagesContainer || !messageContent) {
                    console.error('Required elements not found');
                    return;
                }

                messageForm.addEventListener('submit', async function(e) {
                    e.preventDefault(); // Prevent form from submitting normally

                    const content = messageContent.value.trim();
                    if (!content) {
                        return; // Don't send empty messages
                    }

                    try {
                        const response = await fetch("{{ route('chat.store', $otherUser) }}", {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                'Accept': 'application/json'
                            },
                            body: JSON.stringify({
                                content: content
                            })
                        });

                        const data = await response.json();

                        if (!response.ok) {
                            throw new Error(data.error || 'Failed to send message');
                        }

                        // Add the new message to the chat
                        const messageHtml = `
                            <div class="flex justify-end">
                                <div class="bg-blue-500 text-white rounded-lg p-3 max-w-md">
                                    <p>${data.content}</p>
                                    <span class="text-xs text-blue-100">${data.created_at}</span>
                                </div>
                            </div>
                        `;

                        // Add message to container
                        messagesContainer.insertAdjacentHTML('beforeend', messageHtml);

                        // Clear the input
                        messageForm.reset();

                        // Scroll to the bottom
                        messagesContainer.scrollTop = messagesContainer.scrollHeight;

                    } catch (error) {
                        console.error('Error:', error);
                        alert(error.message || 'Failed to send message. Please try again.');
                    }
                });

                // Initial scroll to bottom
                messagesContainer.scrollTop = messagesContainer.scrollHeight;
            });
            </script>


</x-app-layout>

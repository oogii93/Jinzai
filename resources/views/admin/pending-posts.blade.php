<x-app-layout>

        <div class="min-h-screen bg-gray-200 py-8">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <!-- Header Section -->
                <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-8 bg-white p-5 rounded-xl px-10 py-10">
                    <div class="mb-4 md:mb-0">
                        <h1 class="text-3xl font-bold bg-gradient-to-r from-indigo-600 to-purple-600 bg-clip-text text-transparent">
                           稿管理
                        </h1>
                        <p class="mt-4 text-sm text-gray-600">
                           稿一覧
                        </p>
                    </div>

                </div>

                <!-- Success Message -->
                @if (session('success'))
                <div class="mb-6 transform animate-fadeIn">
                    <div class="rounded-xl bg-green-50 border border-green-200 p-4">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <svg class="h-5 w-5 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                </svg>
                            </div>
                            <div class="ml-3">
                                <p class="text-sm font-medium text-green-800">{{ session('success') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                @endif

                <!-- Main Content Card -->
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100">
                    <!-- Search and Filter Section -->
                    <div class="p-6 border-b border-gray-100">
                        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                                    </svg>
                                </div>
                                <input type="text"
                                       class="block w-full pl-10 pr-3 py-2 border border-gray-200 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent"
                                       placeholder="検索...">
                            </div>
{{--
                            <div class="flex items-center space-x-2">
                                <select class="block w-full py-2 pl-3 pr-10 text-base border border-gray-200 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                                    <option>All Categories</option>
                                    <option>Category 1</option>
                                    <option>Category 2</option>
                                </select>
                            </div> --}}
                        </div>
                    </div>

                    <!-- Table Section -->

                    <div class="container bg-white-100 px-5 py-2">


                        <div class="job-posts-container">
                            @forelse($pendingPosts as $post)
                                <div class="job-post-item" id="job-post-{{ $post->id }}">
                                    <div class="job-post-content border border-blue-200">
                                        <h3><span class="text-gray-700 font-semibold text-lg">投稿タイトル: </span>{{ $post->title }}</h3>
                                        <p> <span class="text-gray-700 font-semibold text-md">会社:</span> {{ $post->user->name }}</p>
                                        <p> <span class="text-gray-700 font-semibold text-md">ステータス: </span><span class="status-text" id="status-{{ $post->id }}">{{ $post->status }}</span></p>
                                        <!-- Add other job post details as needed -->
                                    </div>

                                    <div class="action-buttons mt-2">
                                        <button
                                            class="bg-sky-400 px-2 py-2 rounded-lg text-white font-semibold hover:bg-sky-600 "
                                            onclick="updateStatus('{{ $post->id }}', '承認')"
                                            {{ $post->status === '承認' ? 'disabled' : '' }}
                                        >
                                            承認する
                                        </button>

                                        <button
                                               class="bg-orange-400 px-2 py-2 rounded-lg text-white font-semibold hover:bg-orange-600"
                                            onclick="updateStatus('{{ $post->id }}', '拒否')"
                                            {{ $post->status === '拒否' ? 'disabled' : '' }}
                                        >
                                            拒否する
                                        </button>
                                    </div>
                                </div>
                            @empty
                                <p>承認待ちの求人はありません。</p>
                            @endforelse

                        {{ $pendingPosts->links() }}
                    </div>


                    <!-- Pagination Section -->
                    <div class="px-6 py-4 border-t border-gray-100">
                        {{-- {{ $items->links() }} --}}
                    </div>
                </div>
            </div>
        </div>


        <script>
            function updateStatus(id, status) {
    const url = status === '承認'
        ? `/admin/posts/${id}/approve`
        : `/admin/posts/${id}/reject`;

    fetch(url, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
            'Accept': 'application/json'
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            // Update status text
            document.querySelector(`#status-${id}`).textContent = data.status;

            // Update buttons state
            const approveBtn = document.querySelector(`#job-post-${id} .approve-btn`);
            const rejectBtn = document.querySelector(`#job-post-${id} .reject-btn`);

            if (status === '承認') {
                approveBtn.disabled = true;
                rejectBtn.disabled = false;
            } else if (status === '拒否') {
                approveBtn.disabled = false;
                rejectBtn.disabled = true;
            }

            // Show success message
            alert(data.message);

            // Optionally remove from pending list if needed
            if (status === '承認' || status === '拒否') {
                const jobPost = document.querySelector(`#job-post-${id}`);
                if (jobPost) {
                    jobPost.remove();
                }
            }
        }
    })
    // .catch(error => {
    //     console.error('Error:', error);
    //     alert('エラーが発生しました。');
    // });
}

        </script>
    </x-app-layout>






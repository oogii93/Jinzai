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


                        @foreach($pendingPosts as $post)
                        <div class="card mb-3 border border-gray-300 px-2 py-2 rounded-lg">
                            <div class="card-body">
                                <h5 class="card-title">{{ $post->title }}</h5>
                                <h6 class="card-subtitle mb-2 text-muted">{{ $post->company_name }}</h6>

                                <div class="mt-3">
                                    <form action="{{ route('jobpost.approve', $post->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        <button type="submit" class="btn btn-success">Approve</button>
                                    </form>

                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#rejectModal{{ $post->id }}">
                                        Reject
                                    </button>
                                </div>
                            </div>
                        </div>


                        @endforeach

                        {{ $pendingPosts->links() }}
                    </div>


                    <!-- Pagination Section -->
                    <div class="px-6 py-4 border-t border-gray-100">
                        {{-- {{ $items->links() }} --}}
                    </div>
                </div>
            </div>
        </div>
    </x-app-layout>






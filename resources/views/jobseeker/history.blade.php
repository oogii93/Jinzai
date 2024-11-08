<x-app-layout>

    <!-- Success Message -->
    @if (session('success'))
        <div class="rounded-lg bg-green-50 p-4 mb-6 border border-green-200">
            <div class="flex">
                <div class="flex-shrink-0">
                    <svg class="h-5 w-5 text-green-400" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                    </svg>
                </div>
                <div class="ml-3">
                    <p class="text-sm font-medium text-green-800">{{ session('success') }}</p>
                </div>
            </div>
        </div>
    @endif


<div class="min-h-screen bg-gray-50/50">
<div class="p-4 sm:p-6 lg:p-8">
    <!-- Page Header -->
    <div class="sm:flex sm:items-center sm:justify-between mb-8 bg-gradient-to-r from-sky-600 to-blue-500 rounded-lg ">
        <div>
            <h2 class="text-2xl font-semibold text-white px-2 mt-10">{{ __('My History') }}</h2>
            <h2 class="text-lg font-semibold text-white px-2 mt-5 mb-5">{{ __('See all my application') }}</h2>
        </div>
    </div>

    {{-- <div class="mb-6 bg-white p-4 rounded-lg shadow">
        <div class="border-b border-gray-200">
            <nav class="-mb-px flex space-x-8">
                <a href="{{ route('admin.applications.index', ['status' => 'pending']) }}"
                   class="@if($status === 'pending') border-indigo-500 text-indigo-600 @else border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700 @endif whitespace-nowrap border-b-2 py-4 px-1 text-sm font-medium">
                    Pending ({{ $counts['pending'] }})
                </a>
                <a href="{{ route('admin.applications.index', ['status' => 'approved']) }}"
                   class="@if($status === 'approved') border-indigo-500 text-indigo-600 @else border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700 @endif whitespace-nowrap border-b-2 py-4 px-1 text-sm font-medium">
                    Approved ({{ $counts['approved'] }})
                </a>
                <a href="{{ route('admin.applications.index', ['status' => 'rejected']) }}"
                   class="@if($status === 'rejected') border-indigo-500 text-indigo-600 @else border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700 @endif whitespace-nowrap border-b-2 py-4 px-1 text-sm font-medium">
                    Rejected ({{ $counts['rejected'] }})
                </a>
                <a href="{{ route('admin.applications.index', ['status' => 'all']) }}"
                   class="@if($status === 'all') border-indigo-500 text-indigo-600 @else border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700 @endif whitespace-nowrap border-b-2 py-4 px-1 text-sm font-medium">
                    All Applications
                </a>
            </nav>
        </div>
    </div> --}}




    <!-- Search and Filter Section -->
    <div class="mb-6">
        <div class="mt-1 flex rounded-lg shadow-sm">
            <div class="relative flex-grow focus-within:z-10">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <svg class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"/>
                    </svg>
                </div>
                <input type="text" name="search" class="block w-full h-20 rounded-lg border-gray-300 pl-10 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" placeholder="Search users...">
            </div>
        </div>
    </div>

    <!-- Table Section -->
    <div class="bg-white rounded-lg shadow overflow-hidden">
        <div class="overflow-x-auto">
            <!-- Status Tabs -->

            <table class="min-w-full border border-gray-400">
                <thead class="bg-gray-200">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider border border-gray-400">ID</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider border border-gray-400">採用会社</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider border border-gray-400">ジョーブタイトル</th>

                        <th scope="col" class="px-6 py-3 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider border border-gray-400">申請日付け</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider border border-gray-400">作動</th>
                    </tr>
                </thead>
                <tbody class="bg-white">
                    @foreach ($applications as $application)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 border border-gray-400">{{ $application->id }}</td>
                            <!-- Repeat border class for each <td> as needed -->
                                <!-- Repeat the border class for each <td> as needed -->

                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 border border-gray-400">
                                <div class="flex items-center">

                                    <div class="ml-4">
                                        <div class="text-sm font-medium text-gray-900">{{ $application->jobPost->user->name }}
                                          <br>



                                        </div>
                                    </div>
                                </div>
                            </td>

                            {{-- <br><span>      <td class="px-6 py-4 whitespace-nowrap text-sm">
                                <a href="{{ route('admin.company.show', $application->user) }}"
                                   class="text-indigo-600 hover:text-indigo-900">
                                   企業情報見る
                                </a>
                            </td></span> --}}

                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 border border-gray-400" style="width: 150px;">
                                <div class="flex flex-col items-start space-y-2">
                                    <div class="text-sm font-semibold text-gray-800">
                                        {{ $application->jobPost->title }}
                                    </div>

                                    <a href="{{ route('jobpost.show', $application->jobPost->id) }}" class="flex items-center justify-center w-full text-white bg-sky-600 px-3 py-1.5 rounded-lg font-semibold hover:bg-sky-800 transition duration-150 ease-in-out shadow-md">
                                        採用投稿詳細
                                    </a>
                                </div>
                            </td>







                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 border border-gray-400">
                                {{ $application->created_at }}
                            </td>












                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 border border-gray-400">
                                <div class="flex justify-end space-x-3">
                                    <a href=""
                                       class="text-indigo-600 hover:text-indigo-900">
                                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                        </svg>
                                    </a>
                                    <form action="" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                class="text-red-600 hover:text-red-900"
                                                onclick="return confirm('Are you sure you want to delete this user?')">
                                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="bg-white px-4 py-3 border-t border-gray-200 sm:px-6">
            <div class="flex items-center justify-between">
                <div class="flex-1 flex justify-between sm:hidden">
                    <!-- Mobile pagination controls -->
                    <a href="#" class="relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">Previous</a>
                    <a href="#" class="ml-3 relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">Next</a>
                </div>
                <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
                    <div>
                        <p class="text-sm text-gray-700">
                            Showing
                            <span class="font-medium">1</span>
                            to
                            <span class="font-medium">10</span>
                            of
                            <span class="font-medium">20</span>
                            results
                        </p>
                    </div>
                    <div>
                        {{-- {{ $applications->links() }} --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</x-app-layout>





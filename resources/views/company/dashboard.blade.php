<x-app-layout>




    <div class="flex items-center space-x-10 w-full bg-sky-300">
        <img src="{{ asset('storage/' . Auth::user()->profile_image) }}" alt="Company Logo" class="w-40 h-32 px-2 py-2 rounded-xl">

        <div class="p-2 font-semibold">
            <h1 class="">{{ $user->name }}</h1>
        </div>

    </div>


    <div class="py-12 bg-gray-100">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">

            <div class="overflow-x-auto bg-white mb-10 mt-5 p-5 rounded-xl ">
                <h1 class="flex justify-center text-md font-semibold text-gray-700 mb-5">{{__('Company Information') }}</h1>

                <div class="flex justify-normal">


                    <div class="px-10">


                        <h2 class="font-medium text-sm"><span class="text-gray-600 font-semibold bg-gray-200 rounded-lg px-2">{{ __('Name') }}</span>  {{ $user->name }}</h2>
                        <p class="mt-4 text-sm"><span class="text-gray-600 font-semibold bg-gray-200 rounded-lg px-2">{{ __('Email') }}</span>  {{ $user->email }}</p>
                        <p class="mt-4 text-sm"><span class="text-gray-600 font-semibold bg-gray-200 rounded-lg px-2">{{ __('Phone Number') }}</span>  {{ $user->phone_number }}</p>
                        <p class="mt-4 text-sm"><span class="text-gray-600 font-semibold bg-gray-200 rounded-lg px-2">{{ __('Mobile Number') }}</span>  {{ $user->mobile_number }}</p>
                        <p class="mt-4 text-sm"><span class="text-gray-600 font-semibold bg-gray-200 rounded-lg px-2">{{ __('Address') }}</span>  {{ $user->address }}</p>

                    </div>



                    <div class="px-40">


                            <h2 class="font-medium text-sm"><span class="text-gray-600 font-semibold bg-gray-200 rounded-lg px-2">{{ __('Description') }}</span>  {{ $user->companyProfile->company_description }}</h2>
                            <p class="mt-4 text-sm"><span class="text-gray-600 font-semibold bg-gray-200 rounded-lg px-2">{{ __('Industry') }}</span>  {{ $user->companyProfile->industry }}</p>
                            <p class="mt-4 text-sm"><span class="text-gray-600 font-semibold bg-gray-200 rounded-lg px-2">{{ __('Website') }}</span>  {{ $user->companyProfile->website }}</p>

                    </div>


                </div>


            </div>


                        <div class="overflow-x-auto bg-white rounded-lg">

                            <table class="min-w-full divide-y divide-gray-200">
                                <h1 class="flex justify-center text-lg font-semibold mb-5 text-gray-700 mt-2">{{ $user->name }} -- {{ __('Job Post') }}</h1>

                                <div class="flex justify-end">
                                <a href="{{ route('jobpost.create') }}" class=" bg-blue-500 hover:bg-blue-700 text-white px-2 py-2 rounded-lg mt-2 mb-2"><span class="4xl font-semibold">+</span>{{ __('New Post') }}</a>

                                </div>
                                <thead class="bg-orange-200 rounded-lg">
                                    <tr>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">{{ __('Number') }}</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">{{ __('Job Title') }}</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">{{ __('Created at') }}</th>
                                        <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">{{ __('Action') }}</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach ($jobposts as $item)
                                        <tr class="hover:bg-gray-50">
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $loop->iteration }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="flex items-center">
                                                    <div class="h-8 w-8 flex-shrink-0">
                                                        <span class="inline-flex h-8 w-8 items-center justify-center rounded-full bg-gray-500">
                                                            <span class="text-sm font-medium leading-none text-white">{{ substr($item->title, 0, 1) }}</span>
                                                        </span>
                                                    </div>
                                                    <div class="ml-4">
                                                        <div class="text-sm font-medium text-gray-900">{{ $item->title }}</div>
                                                    </div>

                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $item->created_at }}</td>




                                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                <div class="flex justify-end space-x-3">
                                                    <a href="{{ route('tags.edit', $item) }}"
                                                       class="text-indigo-600 hover:text-indigo-900">
                                                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                        </svg>
                                                    </a>
                                                    <form action="{{ route('tags.destroy', $item) }}" method="POST" class="inline">
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
                                        {{-- {{ $users->links() }} --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
    </div>
</x-app-layout>

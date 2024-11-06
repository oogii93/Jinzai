<x-app-layout>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-5">
        <div class="bg-white shadow overflow-hidden sm:rounded-lg">
            <div class="px-4 py-5 sm:px-6">

                <h1 class="text-lg leading-6 font-medium text-gray-900">{{__('Recruitment Information') }}</h1>



            </div>
            <div class="border-t border-gray-300">
                <dl class="border border-1">


                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-m font-medium text-gray-500">{{ __('Company Name') }}</dt>
                        <dd class="mt-1 text-md text-gray-900 sm:mt-0 sm:col-span-2">{{ $jobpost->user->name }}</dd>
                    </div>

                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-m font-medium text-gray-500">{{ __('Title') }}</dt>
                        <dd class="mt-1 text-md text-gray-900 sm:mt-0 sm:col-span-2">{{ $jobpost->title }}</dd>
                    </div>
                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">{{ __('Salary') }}</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{ $jobpost->salary }}</dd>
                    </div>
                    <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">{{ __('Working Hours') }}</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{ $jobpost->working_hour }}</dd>
                    </div>
                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">{{ __('Location') }}</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{ $jobpost->working_location }}</dd>
                    </div>
                    <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">{{ __('Job Details') }}</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{ $jobpost->job_detail }}</dd>
                    </div>
                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">{{ __('Qualifications') }}</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{ $jobpost->qualification }}</dd>
                    </div>
                    @if($jobpost->other)
                    <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">{{ __('Additional Information') }}</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{ $jobpost->other }}</dd>
                    </div>
                    @endif
                </dl>
            </div>

            @if(auth()->user()->role === 'jobseeker')
                <div class="px-4 py-5 sm:px-6">
                    @if(session('error'))
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                            <span class="block sm:inline">{{ session('error') }}</span>
                        </div>
                    @endif
                    @if(session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                            <span class="block sm:inline">{{ session('success') }}</span>
                        </div>
                    @endif

                    <!-- Check if user has already applied -->
                    @if($jobpost->applications()->where('user_id', auth()->id())->exists())
                        <div class="bg-gray-100 border border-gray-400 text-gray-700 px-4 py-3 rounded relative">
                            You have already applied for this position.
                        </div>
                    @else
                        <button
                            onclick="document.getElementById('applicationModal').classList.remove('hidden')"
                            class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                        >
                           {{ __('Apply for this Position') }}
                        </button>
                    @endif
                </div>




                <!-- Application Modal -->
                <div id="applicationModal" class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full">
                    <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
                        <div class="mt-3">
                            <h3 class="text-lg leading-6 font-medium text-gray-900">{{ __(' Apply') }}  {{ $jobpost->title }}</h3>
                            <form action="{{ route('job.apply', $jobpost->id) }}" method="POST" class="mt-4" enctype="multipart/form-data">
                                @csrf


                                <div class="flex justify-end space-x-3">
                                    <button
                                        type="button"
                                        onclick="document.getElementById('applicationModal').classList.add('hidden')"
                                        class="px-4 py-2 bg-gray-200 text-gray-800 rounded-md hover:bg-gray-300"
                                    >
                                        {{ __('Cancel') }}
                                    </button>
                                    <button
                                        type="submit"
                                        class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700"
                                    >
                                        {{ __('Submit Application') }}
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>

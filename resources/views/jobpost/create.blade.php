<x-app-layout>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="mb-6">
            <h2 class="text-2xl font-bold text-gray-800">Create New Item</h2>
        </div>

        <div class="bg-white shadow sm:rounded-lg">
            <form action="{{ route('jobpost.store') }}" method="POST" class="space-y-2 p-6">
                @csrf







                <div class="flex flex-col sm:flex-row justify-between border-2 border-gray-200 rounded-sm">
                    <label for="title" class="block font-semibold text-gray-700 bg-emerald-100 w-full sm:w-[200px] h-[100px] px-5 py-5 text-md flex-shrink-0">
                        title
                    </label>
                    <input type="text" name="title" id="title"
                           class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-100 rounded-md"
                           value="" required>
                </div>


                <div class="flex flex-col sm:flex-row justify  border-2 border-gray-200 rounded-sm">
                    <label for="salary" class="block font-semibold text-gray-700 bg-emerald-100 w-full sm:w-[200px] h-[100px] px-5 py-5 text-md flex-shrink-0">salary</label>
                    <input type="text" name="salary" id="salary"
                           class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                           value="" required>

                </div>

                <div class="flex flex-col sm:flex-row justify  border-2 border-gray-200 rounded-sm">
                    <label for="working_hour" class="block font-semibold text-gray-700 bg-emerald-100 w-full sm:w-[200px] h-[100px] px-5 py-5 text-md flex-shrink-0">working_hour</label>
                    <input type="text" name="working_hour" id="working_hour"
                           class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                           value="" required>

                </div>

                <div class="flex flex-col sm:flex-row justify  border-2 border-gray-200 rounded-sm">
                    <label for="working_location" class="block font-semibold text-gray-700 bg-emerald-100 w-full sm:w-[200px] h-[100px] px-5 py-5 text-md flex-shrink-0">working_location</label>
                    <input type="text" name="working_location" id="working_location"
                           class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                           value="" required>

                </div>
                <div class="flex flex-col sm:flex-row justify  border-2 border-gray-200 rounded-sm">
                    <label for="job_detail" class="block font-semibold text-gray-700 bg-emerald-100 w-full sm:w-[200px] h-[300px] px-5 py-5 text-md flex-shrink-0">job_detail</label>
                    <textarea type="text" name="job_detail" id="job_detail"
                           class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                           value="" required>
                    </textarea>

                </div>
                <div class="flex flex-col sm:flex-row justify  border-2 border-gray-200 rounded-sm">
                    <label for="qualification" class="block font-semibold text-gray-700 bg-emerald-100 w-full sm:w-[200px] h-[100px] px-5 py-5 text-md flex-shrink-0">qualification</label>
                    <input type="text" name="qualification" id="qualification"
                           class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                           value="" required>

                </div>
                <div class="flex flex-col sm:flex-row justify  border-2 border-gray-200 rounded-sm">
                    <label for="other" class="block font-semibold text-gray-700 bg-emerald-100 w-full sm:w-[200px] h-[200px] px-5 py-5 text-md flex-shrink-0">other</label>
                    <textarea type="text" name="other" id="other"
                           class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                           value="" required>
                    </textarea>

                </div>

                <div class="flex flex-col sm:flex-row justify  border-2 border-gray-200 rounded-sm">
                    <label for="category" class="block font-semibold text-gray-700 bg-emerald-100 w-full sm:w-[200px] h-[50px] px-5 py-5 text-md flex-shrink-0">Category</label>
                    <select name="category_id" id="category" class="w-full border border-gray-300 dark:border-gray-700 rounded-md p-2 focus:ring-2 focus:ring-teal-500 focus:border-teal-500 dark:bg-gray-700 dark:text-gray-300">
                        <option value="default">選択</option>
                        @foreach($categories as $category)

                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>


                <div class="space-y-2">
                    <label class="block text-sm font-medium text-gray-700">{{ __('Tags') }}</label>
                    <select
                        name="tags[]"
                        multiple
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-sky-500 focus:border-sky-500"
                    >
                        @foreach($tags as $tag)
                            <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                        @endforeach
                    </select>

                    @error('tags')
                        <p class="text-red-300 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>




                <div class="flex justify-end space-x-3">
                    <a href="{{ route('jobpost.index') }}"
                       class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Cancel
                    </a>
                    <button type="submit"
                            class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Create Item
                    </button>
                </div>
            </form>
        </div>
    </div>

    </x-app-layout>

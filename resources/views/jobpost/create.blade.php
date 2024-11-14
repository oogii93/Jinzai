{{-- <x-app-layout>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">


        <div class="bg-white shadow sm:rounded-lg mt-5 mb-3">
            <form action="{{ route('jobpost.store') }}" method="POST" class="space-y-2 p-6">
                @csrf
                <h1 class="flex justify-center mt-2 mb-2 font-mono">新規投稿</h1>







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

    </x-app-layout> --}}

    <x-app-layout>
        <div class="min-h-screen bg-gray-200 py-8">
            <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
                <!-- Form Card -->
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100">
                    <!-- Header -->
                    <div class="border-b border-gray-100 px-8 py-6 bg-emerald-200 rounded-t-xl">
                        <h1 class="text-2xl font-semibold text-gray-900">新規投稿</h1>
                    </div>

                    <form action="{{ route('jobpost.store') }}" method="POST" class="p-8 space-y-6">
                        @csrf

                        <!-- Basic Information Section -->
                        <div class="space-y-6">
                            <h2 class="text-lg font-mono text-gray-900">基本情報</h2>

                            <!-- Title -->
                            <div class="space-y-2">
                                <label for="title" class="block text-sm font-mono text-gray-700">
                                    役職
                                    <span class="text-red-500">*</span>
                                </label>
                                <input type="text" name="title" id="title"
                                    class="w-full rounded-md border border-gray-400"
                                    placeholder="役職名を入力してください" required>
                            </div>

                            <div class="space-y-2">
                                <label for="salary" class="block text-sm font-mono text-gray-700">
                                    給料
                                    <span class="text-red-500">*</span>
                                </label>
                                <input type="text" name="salary" id="salary"
                                    class="w-full rounded-md border border-gray-400"
                                    placeholder="給料を入力してください" required>
                            </div>

                            <div class="space-y-2">
                                <label for="working_hour" class="block text-sm font-mono text-gray-700">
                                    勤務時間
                                    <span class="text-red-500">*</span>
                                </label>
                                <input type="text" name="working_hour" id="working_hour"
                                    class="w-full rounded-md border border-gray-400"
                                    placeholder="勤務時間を入力してください" required>
                            </div>



                            <!-- Location -->
                            <div class="space-y-2">
                                <label for="working_location" class="block text-sm font-mono text-gray-700">
                                    勤務地
                                    <span class="text-red-500">*</span>
                                </label>
                                <input type="text" name="working_location" id="working_location"
                                    class="w-full rounded-md border border-gray-400"
                                    placeholder="勤務地を入力" required>
                            </div>
                        </div>

                        <!-- Detailed Information Section -->
                        <div class="space-y-6 pt-6 border-t border-gray-100">
                            <h2 class="text-lg font-mono text-gray-900">詳細情報</h2>

                            <!-- Job Details -->
                            <div class="space-y-2">
                                <label for="job_detail" class="block text-sm font-medium text-gray-700">
                                    仕事内容
                                    <span class="text-red-500">*</span>
                                </label>
                                <textarea name="job_detail" id="job_detail" rows="6"
                                    class="w-full rounded-md border border-gray-400"
                                    placeholder="仕事内容を入力してください。" required></textarea>
                            </div>

                            <!-- Qualifications -->
                            <div class="space-y-2">
                                <label for="qualification" class="block text-sm font-medium text-gray-700">
                                    対象となる方・資格
                                    <span class="text-red-500">*</span>
                                </label>
                                <input type="text" name="qualification" id="qualification"
                                    class="w-full rounded-md border border-gray-400"
                                    placeholder="資格を入力してください" required>
                            </div>

                            <!-- Other Information -->
                            <div class="space-y-2">
                                <label for="other" class="block text-sm font-medium text-gray-700">
                                    その他
                                </label>
                                <textarea name="other" id="other" rows="4"
                                    class="w-full rounded-md border border-gray-400"
                                    placeholder="その他の情報を入力してください。"></textarea>
                            </div>
                        </div>

                        <!-- Classification Section -->
                        <div class="space-y-6 pt-6 border-t border-gray-100">
                            <h2 class="text-lg font-mono text-gray-900">分類</h2>

                            <!-- Category -->
                            <div class="space-y-2">
                                <label for="category" class="block text-sm font-medium text-gray-700">
                                    カテゴリー
                                    <span class="text-red-500">*</span>
                                </label>
                                <select name="category_id" id="category"
                                    class="w-full rounded-md border border-gray-400">
                                    <option value="default">選択</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Tags -->
                            <div class="space-y-2">
                                <label for="tags" class="block text-sm font-medium text-gray-700">
                                   タグ
                                </label>
                                <select name="tags[]" multiple
                                    class="w-full rounded-md border border-gray-400 min-h-[120px] bg-orange-100">
                                    @foreach($tags as $tag)
                                        <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                                    @endforeach
                                </select>
                                @error('tags')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <!-- Form Actions -->
                        <div class="flex items-center justify-end space-x-4 pt-6 border-t border-gray-100">
                            <a href="{{ route('jobpost.index') }}"
                                class="px-6 py-2.5 rounded-lg text-gray-700 bg-white border border-gray-300 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 transition-colors duration-200">
                                キャンセル
                            </a>
                            <button type="submit"
                                class="px-6 py-2.5 rounded-lg text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors duration-200">
                               保存
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </x-app-layout>

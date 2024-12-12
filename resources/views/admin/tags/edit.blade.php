<x-app-layout>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">


        <div class="bg-white shadow sm:rounded-lg mt-5">
            <form action="{{ route('tags.update', $tag) }}" method="POST" class="space-y-6 p-6">
                @csrf

                @method('PUT')

                <div class="mb-4 md:mb-0">
                    <h1 class="text-3xl font-bold bg-gradient-to-r from-indigo-600 to-purple-600 bg-clip-text text-transparent">
                        タグ編集
                    </h1>

                </div>

                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">タグ名</label>
                    <input type="text" name="name" id="name"
                           class="mt-1 border border-gray-400 w-full rounded-lg"
                           value="{{ old('name',$tag->name) }}" required>
                    @error('name')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>




                <div class="flex justify-end space-x-3">
                    <a href="{{ route('tags.index') }}"
                       class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                       キャンセル
                    </a>
                    <button type="submit"
                            class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        保存
                    </button>
                </div>
            </form>
        </div>
    </div>

    </x-app-layout>

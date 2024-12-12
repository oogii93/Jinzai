<x-app-layout>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-white shadow sm:rounded-lg mt-5">
            <form action="{{ route('categories2.update', $category2) }}" method="POST" class="space-y-6 p-6">
                @csrf
                @method('PUT')  {{-- Important for update routes --}}

                <div class="mb-4 md:mb-0">
                    <h1 class="text-3xl font-bold bg-gradient-to-r from-indigo-600 to-purple-600 bg-clip-text text-transparent">
                        カテゴリー2編集
                    </h1>
                    <p class="mt-4 text-sm font-semibold text-gray-600">
                        選択したカテゴリー2の情報を更新
                    </p>
                </div>

                <div class="mb-4">
                    <label for="category_id" class="block text-sm font-semibold text-gray-700 mb-2">カテゴリー1</label>
                    <select
                        name="category_id"
                        id="category_id"
                        required
                        class="w-full border border-gray-300 px-3 py-2 rounded-lg focus:ring-2 focus:ring-indigo-200"
                    >
                        <option value="">カテゴリー1を選択</option>
                        @foreach($categories as $category)  {{-- Changed from $category2 --}}
                            <option
                                value="{{ $category->id }}"
                                {{ $category2->category_id == $category->id ? 'selected' : '' }}
                            >
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="name" class="block text-sm font-semibold text-gray-700 mb-2">カテゴリー2名</label>
                    <input
                        type="text"
                        name="name"
                        id="name"
                        value="{{ old('name', $category2->name) }}"
                        class="mt-1 block w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-indigo-200"
                        required
                    >
                    @error('name')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex justify-end space-x-3">
                    <a
                        href="{{ route('categories2.index') }}"
                        class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                    >
                        キャンセル
                    </a>
                    <button
                        type="submit"
                        class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                    >
                        更新
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>

<x-app-layout>
    <div class="max-w-4xl mx-auto px-4 py-8">
        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <div class="relative bg-gradient-to-r from-sky-500 to-indigo-600 shadow-lg px-5 py-5">
                <h1 class="text-xl font-semibold text-gray-800">プロファイル編集</h1>
            </div>

            @if (session('success'))
                <div class="bg-green-50 border-l-4 border-green-400 p-4 mb-4">
                    <p class="text-green-700">{{ session('success') }}</p>
                </div>
            @endif

            <form action="{{ route('company.update') }}" method="POST" enctype="multipart/form-data" class="p-6 space-y-6">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-2">会社名</label>
                        <input type="text" name="name" id="name"
                               value="{{ old('name', $user->name) }}"
                               class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500
                               @error('name') border-red-500 focus:ring-red-500 @enderror">
                        @error('name')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-2">メールアドレス</label>
                        <input type="email" name="email" id="email"
                               value="{{ old('email', $user->email) }}"
                               class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500
                               @error('email') border-red-500 focus:ring-red-500 @enderror">
                        @error('email')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>

                        <p class="bg-yellow-200 px-2 py-2 rounded-md shadow-md mb-2">会社に別のアカウントを追加する場合は、メールアドレス2を入力して更新してください。</p>
                        <label for="email_2" class="block text-sm font-medium text-gray-700 mb-2 mt-2">メールアドレス2</label>
                        <input type="email" name="email_2" id="email_2"
                               value="{{ old('email_2', $companyProfile->email_2) }}"
                               class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500
                               @error('email') border-red-500 focus:ring-red-500 @enderror">

                    </div>
                </div>

                <div>
                    <label for="profile_image" class="block text-sm font-medium text-gray-700 mb-2">プロファイル画像</label>
                    <div class="flex items-center space-x-4">
                        <input type="file" name="profile_image" id="profile_image"
                               class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500
                               @error('profile_image') border-red-500 focus:ring-red-500 @enderror">

                        @if($user->profile_image)
                            <img src="{{ Storage::url($user->profile_image) }}"
                                 alt="Current Profile Image"
                                 class="h-16 w-16 rounded-full object-cover border-2 border-gray-300">
                        @endif
                    </div>
                    @error('profile_image')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Rest of the form fields remain similar, but with improved Tailwind styling -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="address" class="block text-sm font-medium text-gray-700 mb-2">住所</label>
                        <input type="text" name="address" id="address"
                               value="{{ old('address', $user->address) }}"
                               class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500
                               @error('address') border-red-500 focus:ring-red-500 @enderror">
                        @error('address')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="phone_number" class="block text-sm font-medium text-gray-700 mb-2">電話番号</label>
                        <input type="text" name="phone_number" id="phone_number"
                               value="{{ old('phone_number', $user->phone_number) }}"
                               class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500
                               @error('phone_number') border-red-500 focus:ring-red-500 @enderror">
                        @error('phone_number')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Company-specific fields -->


                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="industry" class="block text-sm font-medium text-gray-700 mb-2">業種</label>
                        <input type="text" name="industry" id="industry"
                               value="{{ old('industry', $companyProfile->industry ?? '') }}"
                               class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500
                               @error('industry') border-red-500 focus:ring-red-500 @enderror">
                        @error('industry')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="website" class="block text-sm font-medium text-gray-700 mb-2">ウェブサイト</label>
                        <input type="url" name="website" id="website"
                               value="{{ old('website', $companyProfile->website ?? '') }}"
                               class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500
                               @error('website') border-red-500 focus:ring-red-500 @enderror">
                        @error('website')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="employee_number" class="block text-sm font-medium text-gray-700 mb-2">従業員数</label>
                        <input type="number" name="employee_number" id="employee_number"
                               value="{{ old('employee_number', $companyProfile->employee_number ?? '') }}"
                               class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500
                               @error('employee_number') border-red-500 focus:ring-red-500 @enderror">
                        @error('employee_number')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="profit" class="block text-sm font-medium text-gray-700 mb-2">売上高</label>
                        <input type="text" name="profit" id="profit"
                               value="{{ old('profit', $companyProfile->profit ?? '') }}"
                               class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500
                               @error('profit') border-red-500 focus:ring-red-500 @enderror">
                        @error('profit')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-1 gap-6">
                    <div>
                        <label for="stablished" class="block text-sm font-medium text-gray-700 mb-2">設立</label>
                        <input type="date" name="stablished" id="stablished"
                               value="{{ old('stablished', $companyProfile->stablished ?? '') }}"
                               class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500
                               @error('stablished') border-red-500 focus:ring-red-500 @enderror">
                        @error('stablished')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="details" class="block text-sm font-medium text-gray-700 mb-2">事業内容</label>
                        <textarea name="details" id="details"
                                  class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">{{ old('details', $companyProfile->details ?? '') }}</textarea>
                        @error('details')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                </div>

                <div class="flex justify-end pt-4">
                    <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                        プロファイル更新
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>

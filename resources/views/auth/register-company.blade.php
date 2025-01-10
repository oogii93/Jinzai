<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- GSAP Animations -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>

    <!-- Tailwind CSS -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gradient-to-tr from-sky-900 via-blue-800 to-sky-900 min-h-screen flex items-center justify-center text-gray-100">

<!-- Form Container -->
<div class="max-w-6xl w-full bg-white text-gray-900 shadow-xl rounded-3xl p-8">

    <!-- Header -->
    <div class="text-center">
        <h1 class="text-4xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-green-500 animate-fade-in">
            企業登録フォーム
        </h1>
        <p class="mt-2 text-lg text-gray-600">詳細な企業情報を入力してください。</p>
    </div>

    <!-- Form Start -->
    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data" class="mt-8 space-y-8">
        @csrf

        <input type="hidden" name="role" value="company">

        <!-- Profile Image Upload -->
        <div class="w-full text-center">
            <label for="imageUpload" class="cursor-pointer block mx-auto">
                <div class="w-40 h-40 bg-gray-200 border-4 border-dashed border-gray-300 rounded-xl overflow-hidden shadow-lg">
                    <img id="selectedImage" src="#" alt="Selected Image" class="hidden w-full h-full object-cover rounded-xl">
                    <span id="placeholderText" class="text-gray-500 text-lg font-semibold">写真選択</span>
                </div>
            </label>
            <input type="file" id="imageUpload" name="profile_image" class="hidden" accept="image/*" onchange="previewImage(event)">
            @error('profile_image')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Form Fields -->
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-8">
            <!-- Field Template -->
            @foreach([
                ['label' => 'メール', 'id' => 'email', 'type' => 'email', 'placeholder' => '会社のメールアドレスを入力してください'],
                ['label' => '現住所', 'id' => 'address', 'type' => 'text', 'placeholder' => '企業の住所を入力してください。'],
                ['label' => '電話番号', 'id' => 'phone_number', 'type' => 'text', 'placeholder' => '電話番号を入力してください。'],
                ['label' => '携帯電話番号', 'id' => 'mobile_number', 'type' => 'text', 'placeholder' => '携帯電話番号を入力してください。'],
                ['label' => '企業名', 'id' => 'name', 'type' => 'text', 'placeholder' => '企業名を入力してください。'],
                ['label' => '企業情報', 'id' => 'company_description', 'type' => 'text', 'placeholder' => '企業情報を入力してください。'],
                ['label' => '業種', 'id' => 'industry', 'type' => 'text', 'placeholder' => '業種を入力してください。'],
                ['label' => 'ウェブサイト', 'id' => 'website', 'type' => 'url', 'placeholder' => 'ウェブサイトのURLを入力してください。'],
            ] as $field)
                <div class="relative">
                    <label for="{{ $field['id'] }}" class="absolute -top-3 left-3 text-gray-500 text-sm px-1 bg-gray-100 rounded-md">
                        {{ $field['label'] }}
                    </label>
                    <input type="{{ $field['type'] }}" id="{{ $field['id'] }}" name="{{ $field['id'] }}"
                           placeholder="{{ $field['placeholder'] }}"
                           class="w-full px-4 py-3 mt-1 border border-gray-400 rounded-md focus:ring focus:ring-green-200 text-gray-800"
                           value="{{ old($field['id']) }}">
                    @error($field['id'])
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
            @endforeach
        </div>

        <!-- Submit Button -->
        <div class="text-center">
            <button type="submit"
                    class="px-6 py-3 mt-6 text-white font-semibold text-lg rounded-full shadow-lg transition-transform hover:scale-105 bg-gradient-to-r from-blue-500 to-green-500">
                保存と送信
            </button>
        </div>

    </form>


    <div class="mt-10">
        <a href="{{ route('home') }}"
           class="inline-flex items-center px-6 py-2 text-gray-50 hover:text-white bg-gray-600 hover:bg-gray-800 rounded-lg font-semibold text-lg shadow-md transition ease-in-out duration-300">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5 mr-2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>
            戻る
        </a>
    </div>
</div>

<!-- Preview Image Script -->
<script>
    function previewImage(event) {
        const input = event.target;
        const preview = document.getElementById('selectedImage');
        const placeholderText = document.getElementById('placeholderText');

        if (input.files && input.files[0]) {
            const file = input.files[0];

            if (file.size > 20 * 1024 * 1024) {
                alert('画像のサイズは2MB以下である必要があります');
                input.value = '';
                return;
            }

            if (!file.type.startsWith('image/')) {
                alert('画像ファイルを選択してください');
                input.value = '';
                return;
            }

            const reader = new FileReader();
            reader.onload = (e) => {
                preview.src = e.target.result;
                preview.classList.remove('hidden');
                placeholderText.classList.add('hidden');
            };
            reader.readAsDataURL(file);
        }
    }
</script>

<style>
    .animate-fade-in {
        animation: fadeIn 2s ease-in-out;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(-20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
</style>

</body>
</html>

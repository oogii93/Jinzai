<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        .japanese-text {
            font-size: 1.25rem;
            line-height: 2rem;
            word-spacing: 0.2em;
        }

        .form-input:focus {
            transform: translateY(-2px);
            transition: all 0.3s ease;
        }
    </style>
</head>



<body class="min-h-screen bg-gray-100 flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-2xl w-full">
        <!-- Card Container -->
        <div class="bg-white rounded-2xl shadow-2xl overflow-hidden">
            <!-- Form Header -->
            <div class="bg-gradient-to-r from-sky-500 to-sky-500 px-8 py-6">
                <h2 class="text-2xl font-bold text-white text-center">企業おお問い合わせ</h2>
                <p class="text-sky-100 mt-2 text-sm">以下の情報をご記入ください</p>
            </div>

            <!-- Form Content -->
            <form method="POST" action="{{ route('contact2') }}" class="p-10 space-y-4">
                @csrf

                <!-- Grid for Two Columns -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Name -->
                    <div class="relative">
                        <label class="text-sm font-medium text-gray-700 mb-1 block">企業名</label>
                        <input type="text" name="company_name" required
                            class="form-input w-full rounded-lg border border-gray-400 focus:border-sky-500 focus:ring focus:ring-sky-200 transition-all shadow-sm"
                            placeholder="企業名を入れて下さい">
                    </div>

                    <div class="relative">
                        <label class="text-sm font-medium text-gray-700 mb-1 block">担当者名</label>
                        <input type="text" name="manager_name" required
                            class="form-input w-full rounded-lg border border-gray-400 focus:border-sky-500 focus:ring focus:ring-sky-200 transition-all shadow-sm"
                            placeholder="担当者名を入れて下さい">
                    </div>
                </div>




                <div class="space-y-6">

                    <div class="relative">
                        <label class="text-sm font-medium text-gray-700 mb-1 block">電話番号</label>
                        <input type="number" name="phone_number" required
                            class="form-input w-full rounded-lg border border-gray-400 focus:border-sky-500 focus:ring focus:ring-sky-200 transition-all shadow-sm"
                            placeholder="電話番号を入れて下さい。。">
                    </div>


                    <!-- Contact Information -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="relative">
                            <label class="text-sm font-medium text-gray-700 mb-1 block">メールアドレス</label>
                            <input type="email" name="mail_address" required
                                class="form-input w-full rounded-lg border border-gray-400 focus:border-sky-500 focus:ring focus:ring-sky-200 transition-all shadow-sm"
                                placeholder="your.email@example.com">
                        </div>


                    </div>

                    <!-- Message -->
                    <div class="relative">
                        <label class="text-sm font-medium text-gray-700 mb-1 block">問い合わせ内容</label>
                        <textarea name="message" required rows="4"
                            class="form-input w-full rounded-lg border border-gray-400 focus:border-sky-500 focus:ring focus:ring-sky-200 transition-all shadow-sm resize-none"
                            placeholder="内容を入力..."></textarea>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="pt-4">
                    <button type="submit"
                        class="w-full bg-gradient-to-r from-sky-500 to-sky-600 text-white rounded-lg px-4 py-3 font-semibold
                        hover:from-sky-600 hover:to-sky-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-sky-500
                        transform transition-all duration-200 shadow-lg">
                        フォームを送信
                    </button>
                </div>
            </form>

    <div class="mt-4 ml-4">
        <a href="{{ route('home') }}"
           class=" mb-2 inline-flex items-center px-3 py-1 text-gray-50 hover:text-white bg-gray-600 hover:bg-gray-800 rounded-lg font-semibold text-md shadow-md transition ease-in-out duration-300">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5 mr-2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>
            戻る
        </a>
    </div>
        </div>

    </div>
</body>
</html>

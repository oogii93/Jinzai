<x-app-layout>

    @if (session('status') || session('error'))
    <div id="statusToast" class="fixed top-16 left-1/2 transform -translate-x-1/2 z-50 w-full max-w-md">
        <div class="bg-gray-100 border-l-4 @if(session('status')) border-blue-500 @else border-red-500 @endif rounded-r-lg shadow-md overflow-hidden">
            <div class="p-4 flex items-center">
                <div class="flex-shrink-0">
                    @if (session('status'))
                        <svg class="w-6 h-6 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    @else
                        <svg class="w-6 h-6 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    @endif
                </div>
                <div class="ml-3 w-0 flex-1">
                    @if (session('status'))
                        <p class="text-lg font-semibold text-blue-900">
                            {!! session('status') !!}
                        </p>
                    @endif
                    @if (session('error'))
                        <p class="text-sm font-medium text-gray-900">
                            {{ session('error') }}
                        </p>
                    @endif


                </div>
            </div>
            <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                <button id="closeToast" type="button" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-blue-600 text-base font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:ml-3 sm:w-auto sm:text-sm">
                    閉じる
                </button>
            </div>
        </div>
    </div>

    <style>
        @keyframes slideDown {
            from { transform: translate(-50%, -100%); }
            to { transform: translate(-50%, 0); }
        }
        #statusToast {
            animation: slideDown 0.5s ease-out;
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var statusToast = document.getElementById('statusToast');
            var closeToast = document.getElementById('closeToast');

            var hideTimeout = setTimeout(function() {
                hideToast();
            }, 8000);

            closeToast.addEventListener('click', function() {
                clearTimeout(hideTimeout);
                hideToast();
            });

            function hideToast() {
                statusToast.style.transform = 'translate(-50%, -100%)';
                statusToast.style.transition = 'transform 0.5s ease-in-out';
                setTimeout(function() {
                    statusToast.style.display = 'none';
                }, 500);
            }
        });
    </script>
@endif


        <!-- Header Section with Profile Image -->
        <div class="max-w-7xl mx-auto  shadow-xl rounded-t-xl overflow-hidden mt-8 bg-gradient-to-r from-sky-600 to-emerald-300 px-8 py-12">

        </div>



        <div class="max-w-7xl mx-auto  shadow-xl  overflow-hidden  bg-white px-8 py-12">
            <div class="container bg-white px-10  mb-5 rounded-xl border border-gray-400">
                <header>
                    <h2 class="text-lg font-semibold text-gray-900 mt-1">
                        プロフィール情報
                    </h2>


                </header>

                <form id="send-verification" method="post" action="{{ route('verification.send') }}">
                    @csrf
                </form>

                <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
                    @csrf
                    @method('patch')

                    <div>
                <label for="" class="font-semibold text-sm">氏名</label>
                        <x-text-input id="name" name="name" type="text" class="mt-1 block w-full px-2 py-2 border border-gray-400" :value="old('name', $user->name)" required autofocus autocomplete="name" />
                        <x-input-error class="mt-2" :messages="$errors->get('name')" />
                    </div>

                    <div>
            <label for="" class="font-semibold text-sm">メールアドレス</label>
                        <x-text-input id="email" name="email" type="email" class="mt-1 block w-full px-2 py-2 border border-gray-400" :value="old('email', $user->email)" required autocomplete="username" />
                        <x-input-error class="mt-2" :messages="$errors->get('email')" />

                        @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                            <div>
                                <p class="text-sm mt-2 text-gray-800">
                                    {{ __('Your email address is unverified.') }}

                                    <button form="send-verification" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                        {{ __('Click here to re-send the verification email.') }}
                                    </button>
                                </p>

                                @if (session('status') === 'verification-link-sent')
                                    <p class="mt-2 font-medium text-sm text-green-600">
                                        {{ __('A new verification link has been sent to your email address.') }}
                                    </p>
                                @endif
                            </div>
                        @endif
                    </div>

                    <div class="flex items-center gap-4 ">
                        <x-primary-button class="mb-4">保存</x-primary-button>

                        @if (session('status') === 'profile-updated')
                            <p
                                x-data="{ show: true }"
                                x-show="show"
                                x-transition
                                x-init="setTimeout(() => show = false, 2000)"
                                class="text-sm text-gray-600"
                            >更新されました。</p>
                        @endif
                    </div>
                </form>

            </div>



            <div class="container bg-white px-10  mb-5 rounded-xl border border-gray-400">



                <header>
                    <h2 class="text-lg font-semibold text-gray-900 mt-5">
                        パスワードを更新
                    </h2>

                    <p class="mt-1 text-sm text-gray-600 bg-gray-200 px-2 py-2 rounded-lg font-md">
                        新規登録ユーザーの場合は、パスワードを設定するために、ここで送信されたメールのワンタイムパスワードを使用してください。
                    </p>
                </header>

                <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
                    @csrf
                    @method('put')

                    <div>

                        <x-input-label for="update_password_current_password" :value="__('現在のパスワード')" class="font-semibold" />
                        <x-text-input id="update_password_current_password" name="current_password" type="password" class="mt-1 block w-full border border-gray-400 py-2 px-2" autocomplete="current-password" placeholder="現在使用しているパスワードまたはメールで来たパスワードを入力してください。" />
                        <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
                    </div>

                    <div>
                        <x-input-label for="update_password_password" :value="__('新しいパスワード')" class="font-semibold" />
                        <x-text-input id="update_password_password" name="password" type="password" class="mt-1 block w-full border border-gray-400 py-2 px-2" autocomplete="new-password" placeholder="新しいパスワードを入力してください。パスワード フィールドは 8 文字以上である必要があります。" />
                        <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
                    </div>

                    <div>
                        <x-input-label for="update_password_password_confirmation" :value="__('パスワードを認証する')" class="font-semibold" />
                        <x-text-input id="update_password_password_confirmation" name="password_confirmation" type="password" class="mt-1 block w-full border border-gray-400 py-2 px-2" autocomplete="new-password" placeholder="新しいパスワードをもう一度入力してください。"  />
                        <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
                    </div>

                    <div class="flex items-center gap-4">
                        <x-primary-button class="mb-3">保存</x-primary-button>

                        @if (session('status') === 'password-updated')
                            <p
                                x-data="{ show: true }"
                                x-show="show"
                                x-transition
                                x-init="setTimeout(() => show = false, 2000)"
                                class="text-sm text-gray-600 "
                            >保存されました</p>
                        @endif
                    </div>
                </form>

            </div>




        </div>


        </div>

        </div>

  </div>


</x-app-layout>

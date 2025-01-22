<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-200">

            @include('layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
        {{-- @auth --}}
        <x-chat-box />
    {{-- @endauth --}}

    <!-- Your existing scripts -->
    {{-- <script src="{{ asset('js/chat-box.js') }}"></script> --}}
            <script>
//         document.addEventListener('DOMContentLoaded', () => {
//     const chatBox = document.getElementById('chatBox');
//     const toggleButton = document.getElementById('toggleChatSize');
//     const toggleIcon = document.getElementById('toggleIcon');

//     let isSmall = false;

//     toggleButton.addEventListener('click', () => {
//         if (isSmall) {
//             chatBox.style.width = '20rem'; // Original width
//             chatBox.style.height = 'auto'; // Reset height
//             toggleIcon.innerHTML = `

//                <path d="M6 18L18 6M6 6l12 12" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>

//             `;
//         } else {
//             chatBox.style.width = '5rem'; // Smaller width
//             chatBox.style.height = '5rem'; // Smaller height
//             toggleIcon.innerHTML = `
//                      <path d="M8 10.5H16" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
//                 <path d="M8 14H13.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
//                 <path d="M17 3.33782C15.5291 2.48697 13.8214 2 12 2C6.47715 2 2 6.47715 2 12C2 13.5997 2.37562 15.1116 3.04346 16.4525C3.22094 16.8088 3.28001 17.2161 3.17712 17.6006L2.58151 19.8267C2.32295 20.793 3.20701 21.677 4.17335 21.4185L6.39939 20.8229C6.78393 20.72 7.19121 20.7791 7.54753 20.9565C8.88837 21.6244 10.4003 22 12 22C17.5228 22 22 17.5228 22 12C22 10.1786 21.513 8.47087 20.6622 7" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
//             `;
//         }
//         isSmall = !isSmall;
//     });
// });

document.addEventListener('DOMContentLoaded', () => {
    const chatBox = document.getElementById('chatBox');
    const toggleButton = document.getElementById('toggleChatSize');
    const toggleIcon = document.getElementById('toggleIcon');

    toggleButton.addEventListener('click', () => {
        const isExpanded = chatBox.style.width === '20rem';

        if (isExpanded) {
            chatBox.style.width = '5rem';
            chatBox.style.height = '5rem';
            toggleIcon.innerHTML = `
                <path d="M8 10.5H16" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                <path d="M8 14H13.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                <path d="M17 3.33782C15.5291 2.48697 13.8214 2 12 2C6.47715 2 2 6.47715 2 12C2 13.5997 2.37562 15.1116 3.04346 16.4525C3.22094 16.8088 3.28001 17.2161 3.17712 17.6006L2.58151 19.8267C2.32295 20.793 3.20701 21.677 4.17335 21.4185L6.39939 20.8229C6.78393 20.72 7.19121 20.7791 7.54753 20.9565C8.88837 21.6244 10.4003 22 12 22C17.5228 22 22 17.5228 22 12C22 10.1786 21.513 8.47087 20.6622 7" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
            `;
        } else {
            chatBox.style.width = '20rem';
            chatBox.style.height = 'auto';
            toggleIcon.innerHTML = `
                <path d="M6 18L18 6M6 6l12 12" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
            `;
        }
    });
});
    </script>
    </body>
</html>

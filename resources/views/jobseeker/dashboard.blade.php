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

    <div class="max-w-5xl mx-auto bg-white shadow-xl rounded-xl overflow-hidden mt-8">



        <!-- Header Section with Profile Image -->
        <div class="bg-gradient-to-r from-sky-600 to-blue-600 px-8 py-12">
            <div class="flex items-center space-x-8">
                <!-- Profile Image -->
                <div class="relative">
                    @if (Auth::user()->profile_image)
                        <div class="w-40 h-40  rounded-full overflow-hidden border-4 border-white shadow-lg">
                            <img src="{{ asset('storage/' . Auth::user()->profile_image ) }}"
                                 alt="Profile Image"
                                 class="w-full h-full object-cover">
                        </div>
                    @else
                        <div class="w-32 h-32 rounded-full overflow-hidden border-4 border-white shadow-lg bg-gray-200 flex items-center justify-center">
                            <svg class="w-16 h-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </div>
                    @endif
                </div>

                <!-- Name and Basic Info -->
                <div class="text-white">
                    <h1 class="text-3xl font-bold mb-2">{{ Auth::user()->name }}</h1>
                    <p class="text-blue-100 text-lg">{{ Auth::user()->furigana  }}</p>
                    <p class="text-blue-100 text-lg">{{ Auth::user()->email  }}</p>
                </div>
            </div>
        </div>


    <div class="py-4">


                <div class="p-6 text-gray-700 text-xl font-semibold">
              マイページ
                </div>




<div class="container px-5 flex justify-normal gap-5">


    <div class="relative w-32">
        <a href="{{ route('cv') }}" class="block hover:bg-yellow-100 rounded-xl px-2 py-2 w-full h-full flex flex-col items-center">
            <svg
            class="w-12 h-12"
            version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 491.52 491.52" xml:space="preserve" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <polygon style="fill:#EBF0F3;" points="368.883,0 104.268,0 104.268,491.52 471.117,491.52 471.117,102.234 "></polygon> <circle style="fill:#FFFFFF;" cx="208.517" cy="127.98" r="81.695"></circle> <polygon style="fill:#D5D6DB;" points="368.883,102.234 471.117,102.234 368.883,0 "></polygon> <polygon style="fill:#E1E6E9;" points="471.117,102.234 368.883,102.234 471.117,173.099 "></polygon> <g> <rect x="134.246" y="205.21" style="fill:#D5D6DB;" width="306.857" height="8.934"></rect> <rect x="134.246" y="244.27" style="fill:#D5D6DB;" width="306.857" height="8.934"></rect> <rect x="134.246" y="283.341" style="fill:#D5D6DB;" width="306.857" height="8.934"></rect> <rect x="134.246" y="322.381" style="fill:#D5D6DB;" width="306.857" height="8.934"></rect> <rect x="134.246" y="361.421" style="fill:#D5D6DB;" width="306.857" height="8.934"></rect> <rect x="134.246" y="400.486" style="fill:#D5D6DB;" width="306.857" height="8.934"></rect> <rect x="134.246" y="439.552" style="fill:#D5D6DB;" width="250.506" height="8.934"></rect> </g> <path style="fill:#3A556A;" d="M115.374,223.584l-79.047,79.047c8.373,7.821,17.537,13.565,20.714,10.389l73.885-73.884 L115.374,223.584z"></path> <g> <path style="fill:#64798A;" d="M95.181,203.39l-73.885,73.884c-3.782,3.782,5.062,16.045,15.032,25.356l79.047-79.047 L95.181,203.39z"></path> <path style="fill:#64798A;" d="M243.23,160.985V84.757c0-0.914-0.154-1.824-0.462-2.686c-2.534-7.119-8.666-7.978-8.666-7.978 c0.784-3.985-0.464-6.25-1.908-7.518c-1.165-1.023-2.703-1.541-4.267-1.541h-26.492c-15.213,0-27.66,12.203-27.66,27.119v68.832"></path> </g> <path style="fill:#F6C358;" d="M228.83,147.315c-1.551-1.705-2.366-3.934-2.366-6.218v-1.82c-0.221,0.274-0.421,0.586-0.647,0.85 c-4.834,5.659-10.809,9.05-17.303,9.05c-6.504,0-12.487-3.402-17.325-9.076c-0.226-0.264-0.426-0.577-0.646-0.851v1.848 c0,2.284-0.815,4.513-2.366,6.218c-0.711,0.782-1.629,1.616-2.778,2.419c0.112,0.124,0.334,0.372,0.729,0.842 c1.189,1.416,3.577,4.481,6.458,9.256c4.941,1.878,10.298,2.933,15.916,2.933c5.617,0,10.974-1.055,15.915-2.933 c2.882-4.776,5.271-7.84,6.459-9.257c0.395-0.47,0.617-0.718,0.729-0.841C230.458,148.93,229.54,148.096,228.83,147.315z"></path> <path style="fill:#FCD462;" d="M208.514,149.612c6.494,0,12.468-3.391,17.303-9.05c0.226-0.264,0.426-0.576,0.647-0.85 c6.711-8.339,11.059-21.16,11.059-35.641c-0.771-5.858-6.168-9.449-6.168-9.449l-17.347-5.668c-2.207,1.802-5.07,2.917-7.462,3.59 c-2.26,0.636-4.602,0.945-6.953,0.945H190.3c-10.215,0.945-10.793,10.582-10.793,10.582c0,14.464,4.338,27.273,11.037,35.613 c0.22,0.274,0.421,0.587,0.646,0.851C196.028,146.21,202.011,149.612,208.514,149.612z"></path> <path style="fill:#44C4A1;" d="M196.113,166.805c4.31,8.258,8.985,19.582,12.389,34.28c3.413-14.734,8.103-26.08,12.421-34.344 c-3.979,0.967-8.124,1.533-12.421,1.533C204.224,168.274,200.078,167.757,196.113,166.805z"></path> <path style="fill:#31978C;" d="M191.644,159.582c1.286,2.13,2.661,4.597,4.079,7.386c4.091,1.008,8.367,1.556,12.78,1.556 c4.432,0,8.708-0.6,12.812-1.624c1.405-2.762,2.769-5.206,4.044-7.319c-5.233,1.989-10.907,3.106-16.857,3.106 C202.551,162.688,196.878,161.571,191.644,159.582z"></path> <path style="fill:#3A556A;" d="M184.466,150.572l-10.043,5.317l-13.264,7.023c0,0-9.976,6.113-9.976,15.689v22.489H208.5l0-0.002"></path> <path style="fill:#EBF0F3;" d="M196.437,166.805c-1.339-2.633-2.637-4.962-3.851-6.973c-2.881-4.775-5.269-7.839-6.458-9.256 c-0.394-0.47-0.617-0.718-0.729-0.842c-0.036-0.04-0.933,0.838-0.933,0.838l-4.659,5.431c-0.942,1.098-0.901,2.712,0.095,3.763 l10.976,11.576l-1.834-0.042c-2.5-0.057-3.895,2.81-2.277,4.679l21.733,25.108l0.001-0.003 C205.187,186.387,200.634,175.063,196.437,166.805z"></path> <path style="fill:#3A556A;" d="M208.5,201.09h0.002h57.317v-22.489c0-9.576-9.975-15.689-9.975-15.689l-13.264-7.023l-10.043-5.317"></path> <path style="fill:#EBF0F3;" d="M227.958,171.301l-1.834,0.042l10.976-11.576c0.997-1.051,1.037-2.665,0.095-3.763l-4.659-5.431 c0,0-0.896-0.879-0.933-0.838c-0.112,0.124-0.334,0.371-0.729,0.841c-1.188,1.416-3.577,4.481-6.459,9.257 c-1.204,1.995-2.492,4.302-3.818,6.91c-4.206,8.263-8.773,19.609-12.097,34.344l-0.001,0.003l0,0.002l21.735-25.11 C231.853,174.111,230.458,171.244,227.958,171.301z"></path> <path style="fill:#FCD462;" d="M276.865,194.177c37.756-37.756,37.755-98.971-0.001-136.727 c-37.756-37.757-98.971-37.757-136.727-0.001c-34.94,34.94-37.478,89.936-7.749,127.872l-12.631,12.631 c-6.14-4.721-11.718-7.423-13.921-5.219L95.181,203.39l35.745,35.745l10.655-10.656c2.204-2.204-0.499-7.782-5.219-13.922 l12.631-12.631C186.93,231.654,241.924,229.117,276.865,194.177z M156.629,177.686c-28.603-28.603-28.605-75.142-0.002-103.745 c28.603-28.604,75.146-28.606,103.749-0.003s28.601,75.146-0.003,103.749C231.771,206.291,185.232,206.289,156.629,177.686z"></path> </g></svg>

            <span class="text-sm font-semibold text-center mt-1">
             履歴書
            </span>
        </a>

    </div>



    <div class="relative w-32">
        <a href="javascript:void(0);" onclick="document.getElementById('video').click();" class="block hover:bg-yellow-100 rounded-xl px-2 py-2 w-full h-full flex flex-col items-center">
          <svg class="w-12 h-12" viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" class="iconify iconify--emojione" preserveAspectRatio="xMidYMid meet" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M31.1 54L15.7 10.2s36.7-8.9 36.7 10v28.1c0 .8-1 1.8-1.8 1.8L31.1 54z" fill="#7a8084"> </path> <path d="M6.6 54c-.8 0-1.8-1-1.8-1.8V24.1c0-18.9 28.1-18.9 28.1 0v28.1c0 .8-1 1.8-1.8 1.8H6.6" fill="#94989b"> </path> <path d="M26.2 44.4c-1 0-1.8.8-1.8 1.8s.8 1.8 1.8 1.8s1.8-.8 1.8-1.8s-.8-1.8-1.8-1.8" fill="#ed4c5c"> </path> <path d="M11.1 55.8c-.5 0-.9-.4-.9-.9V53c0-.5.4-.9.9-.9h15.5c.5 0 .9.4.9.9v1.9c0 .5-.4.9-.9.9H11.1" fill="#7a8084"> </path> <path d="M31.4 24.9c0 7.8-5.9 15.3-16.6 15.3c-7.8 0-9-17.8-9-25.6c0 0 4.4-3.9 11.4-3.9c7.9 0 14.2 6.4 14.2 14.2" fill="#3e4347"> </path> <circle cx="14.1" cy="26.1" r="14.1" fill="#788287"> </circle> <path d="M26.7 26.1c0 6.9-5.6 12.6-12.6 12.6C7.2 38.6 1.6 33 1.6 26.1c0-6.9 5.6-12.6 12.6-12.6c6.9 0 12.5 5.6 12.5 12.6" fill="#212528"> </path> <circle cx="14.1" cy="26.1" r="10.2" fill="#3e4347"> </circle> <circle cx="14.1" cy="26.1" r="5.5" fill="#212528"> </circle> <g fill="#f5f5f5"> <path d="M21.6 21.7c0 1.7-1.4 3.2-3.2 3.2c-1.7 0-3.2-1.4-3.2-3.2c0-1.7 1.4-3.2 3.2-3.2c1.8 0 3.2 1.5 3.2 3.2" opacity=".5"> </path> <circle cx="12.2" cy="28" r="2" opacity=".5"> </circle> <circle cx="8.6" cy="31.6" r="1.2" opacity=".5"> </circle> </g> <g fill="#3e4347"> <path d="M51.2 20.4c0 1.5-.8 2.9-1.9 3.2c-1.3.4-2.5-.8-2.5-2.7s1.2-3.3 2.5-3.2c1.1-.1 1.9 1.2 1.9 2.7"> </path> <path d="M45.3 23.1c0 .6-.7 1.3-1.7 1.5c-1.1.2-2-.1-2-.8s.9-1.4 2-1.6c1-.2 1.7.2 1.7.9"> </path> <path d="M45.2 19.9c0 .6-.7 1.3-1.7 1.5c-1.1.2-2-.1-2-.8s.9-1.4 2-1.6c.9-.1 1.7.3 1.7.9"> </path> <path d="M36.8 28l14.7-4.1v9.8z"> </path> </g> <g fill="#94989b"> <path d="M37.7 52.5c-.5 0-.9-.4-.9-.9V28c0-.5.4-.9.9-.9h21.2c6.9 0 6.9 25.4 0 25.4H37.7"> </path> <path d="M34.1 31.7c0-.5.4-.8.8-.8H36c.5 0 .8.4.8.8v16.4c0 .5-.4.8-.8.8h-1.1c-.4 0-.8-.4-.8-.8V31.7"> </path> </g> <path fill="#42ade2" d="M38.6 28.9h20.9v21.8H38.6z"> </path> </g></svg>
          <span class="text-sm font-semibold text-center mt-1">
                動画アップロード
            </span>
        </a>


    </div>

    <form action="{{ route('video-profile.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-4">
            <label for="video" class="block text-sm font-medium text-gray-700"></label>
            <input type="file"
                   id="video"
                   name="video"
                   accept="video/mp4,video/quicktime"
                   class="mt-1 block w-full hidden"
                   onchange="this.form.submit();">
            @error('video')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>
    </form>


    <div class="relative w-32">
        <a href="{{ route('profile.edit') }}" class="block hover:bg-yellow-100 rounded-xl px-2 py-2 w-full h-full flex flex-col items-center">
        <svg
        class="w-12 h-12"
        height="200px" width="200px" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512" xml:space="preserve" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path style="fill:#687F82;" d="M282.524,7.887C205.947,8.327,144.559,71.61,144.559,148.188v36.322h42.053v-36.615 c0-53.25,42.52-97.436,95.768-97.952c53.769-0.52,97.677,43.068,97.677,96.719v75.193c0,11.402,8.866,21.112,20.26,21.517 c11.962,0.425,21.793-9.146,21.793-21.013v-75.696C422.111,69.87,359.417,7.446,282.524,7.887z"></path> <path style="fill:#4ACFD9;" d="M464.164,504.115H102.505V253.897c0-17.419,14.12-31.54,31.54-31.54h298.579 c17.419,0,31.54,14.122,31.54,31.54V504.115z"></path> <g> <path style="fill:#FFD1A9;" d="M359.031,432.624c0-41.805-33.891-75.696-75.696-75.696s-75.696,33.891-75.696,75.696v42.053 h151.392V432.624z"></path> <circle style="fill:#FFD1A9;" cx="283.335" cy="298.053" r="46.259"></circle> </g> <path style="fill:#0295AA;" d="M134.045,222.357c-17.42,0-31.54,14.12-31.54,31.54v250.218h180.83V222.357H134.045z"></path> <g> <path style="fill:#FF8C29;" d="M207.639,432.624v42.053h75.696v-117.75C241.528,356.928,207.639,390.819,207.639,432.624z"></path> <path style="fill:#FF8C29;" d="M237.076,298.053c0,25.548,20.71,46.259,46.259,46.259v-92.517 C257.786,251.795,237.076,272.505,237.076,298.053z"></path> </g> <g> <path style="fill:#FFFFFF;" d="M422.111,390.045c-4.355,0-7.885-3.53-7.885-7.885V277.027c0-4.355,3.53-7.885,7.885-7.885 c4.355,0,7.885,3.53,7.885,7.885V382.16C429.996,386.515,426.466,390.045,422.111,390.045z"></path> <path style="fill:#FFFFFF;" d="M422.111,461.536c-4.355,0-7.885-3.53-7.885-7.885v-42.053c0-4.355,3.53-7.885,7.885-7.885 c4.355,0,7.885,3.53,7.885,7.885v42.053C429.996,458.006,426.466,461.536,422.111,461.536z"></path> </g> <g> <path style="fill:#F0353D;" d="M80.546,191.075h-32.71c-4.355,0-7.885-3.53-7.885-7.885s3.53-7.885,7.885-7.885h32.71 c4.355,0,7.885,3.53,7.885,7.885S84.901,191.075,80.546,191.075z"></path> <path style="fill:#F0353D;" d="M89.678,164.312c-2.018,0-4.036-0.77-5.575-2.31l-20.815-20.815c-3.079-3.079-3.079-8.072,0-11.152 s8.072-3.079,11.15,0l20.815,20.815c3.079,3.079,3.079,8.072,0,11.152C93.714,163.542,91.695,164.312,89.678,164.312z"></path> <path style="fill:#F0353D;" d="M68.651,238.653c-2.018,0-4.036-0.77-5.575-2.31c-3.079-3.079-3.079-8.072,0-11.15l20.815-20.815 c3.079-3.079,8.072-3.079,11.15,0c3.079,3.079,3.079,8.072,0,11.15l-20.815,20.815C72.687,237.883,70.669,238.653,68.651,238.653z"></path> </g> <path d="M432.624,214.472h-2.628v-67.811c0-39.275-15.378-76.194-43.302-103.959C358.977,15.144,322.305,0,283.343,0 c-0.287,0-0.576,0.001-0.864,0.002C202.081,0.464,136.674,66.94,136.674,148.188v36.322c0,4.355,3.53,7.885,7.885,7.885h42.053 c4.355,0,7.885-3.53,7.885-7.885v-36.615c0-49.193,39.459-89.597,87.96-90.067c23.882-0.187,46.361,8.91,63.356,25.741 c16.998,16.835,26.36,39.241,26.36,63.093v67.811H134.045c-21.74,0-39.425,17.686-39.425,39.425v250.218 c0,4.355,3.53,7.885,7.885,7.885h361.659c4.355,0,7.885-3.53,7.885-7.885V253.897C472.049,232.158,454.364,214.472,432.624,214.472z M356.909,72.363c-20.009-19.816-46.504-30.609-74.605-30.305c-57.113,0.554-103.577,48.031-103.577,105.836v28.73h-26.283v-28.437 c0-72.602,58.374-132.003,130.126-132.416c0.259-0.001,0.512-0.002,0.771-0.002c34.765,0,67.497,13.519,92.235,38.115 c24.924,24.782,38.651,57.731,38.651,92.776v67.811h-26.283v-67.811C387.943,118.568,376.921,92.182,356.909,72.363z M456.279,496.23H110.39V253.897c0-13.044,10.611-23.655,23.655-23.655h246.037h42.029h10.513c13.044,0,23.655,10.611,23.655,23.655 V496.23z"></path> <path d="M297.578,350.283c22.964-6.271,39.9-27.304,39.9-52.229c0-29.855-24.289-54.144-54.144-54.144 c-29.855,0-54.144,24.289-54.144,54.144c0,24.925,16.936,45.958,39.9,52.229c-39.322,6.783-69.338,41.112-69.338,82.342v42.053 c0,4.355,3.53,7.885,7.885,7.885h151.392c4.355,0,7.885-3.53,7.885-7.885v-42.053C366.916,391.395,336.9,357.066,297.578,350.283z M244.961,298.053c0-21.159,17.215-38.374,38.374-38.374s38.374,17.215,38.374,38.374c0,21.159-17.215,38.374-38.374,38.374 S244.961,319.213,244.961,298.053z M351.146,466.793H215.524v-34.168c0-37.391,30.42-67.811,67.811-67.811 s67.811,30.42,67.811,67.811V466.793z"></path> </g></svg>
        <span class="text-sm font-semibold text-center mt-1">
               ログイン設定
            </span>
        </a>

    </div>


    <div class="relative w-32"> <!-- Set a fixed width -->
        <a href="{{ route('jobseeker.history') }}" class="block hover:bg-yellow-100 rounded-xl px-2 py-2 w-full h-full flex flex-col items-center">
            <svg
            class="w-12 h-12"
            viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg" version="1.1" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path style="fill:#D0CEA9;stroke:#222222;stroke-width:2" d="M 4,88 C 4,87 3.6,25 3.6,25 3.6,25 3,20 8,20 c -1,0 6,0 6,0 l 0,-6 c 0,0 0,-3 3,-3 l 17,0 c 0,0 3,0 3,3 l 0,6 43,0 c 0,0 4,0 4,4 l -2,64 z"></path> <path style="fill:#E8DC88;stroke:#222222;stroke-width:2;fill-opacity:0.8" d="M 4,88 15,40 c 0,0 0,-7 8,-7 10,0 66,0 66,0 0,0 9,-1 7,6 -2,7 -12,49 -12,49 z"></path> <path style="fill:#555555;stroke:#222222;stroke-width:2" d="m 73,67 c 0,0 27,18 25,31 C 86,100 66,73 66,73"></path> <circle cx="51" cy="51" r="26" fill="none" stroke="#222222" style="stroke-width:2"></circle> <circle cx="51" cy="51" r="23" fill="none" stroke="#999999" style="stroke-width:4"></circle> <circle cx="51" cy="51" r="21" fill="#eeeeee" stroke="#222222" style="stroke-width:1;fill-opacity:0.5"></circle> </g></svg>
            <span class="text-sm font-semibold text-center mt-1">
               申請歴
            </span>
        </a>
    </div>





    {{-- <div class="">


        <div class="bg-green-100 scale-100 p-6  dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none flex  transition-all duration-250 focus:outline focus:outline-2 focus:outline-indigo-500">
            <div>
                <div class="h-16 w-16  dark:bg-indigo-900/20 flex items-center justify-center rounded-full">
                    <svg class="w-8 h-8 " fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg>
                </div>

                <h2 class="mt-6 text-xl font-semibold  dark:text-white"></h2>

                <p class="mt-4  dark:text-gray-400 text-sm leading-relaxed">
                    このフォームを使用して申請を行います。クリックして詳細を表示し、必要事項を入力してください。
                </p>
            </div>

            <a href="{{ route('cv') }}" class="absolute top-0 right-0 p-6 text-sm font-semibold  bg-white rounded-bl-2xl hover: focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:bg-gray-800 dark:text-white dark:hover:bg-gray-700">
            履歴書を見る
                <span aria-hidden="true">&rarr;</span>
            </a>
        </div>











    </div>

    <div class="bg-yellow-100 py-5 scale-100 p-6  dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none flex motion-safe: transition-all duration-250 focus:outline focus:outline-2 focus:outline-indigo-500">
        <div>


            <h2 class="mt-1 text-xl font-semibold  dark:text-white"></h2>

                <form action="{{ route('video-profile.store') }}" method="POST" enctype="multipart/form-data">

            <p class="mt-4  dark:text-gray-400 text-sm leading-relaxed px-2">
                求職者は、日本語での自己紹介のために1分から3分のビデオをアップロードする必要があります。
                    そのビデオをここにアップロードしてください!!
                    </p>


                    @csrf
                    <div class="mb-4">
                        <label for="video" class="block text-sm font-medium text-gray-700">Profile Video (Max 5 minutes)</label>
                        <input type="file"
                            id="video"
                            name="video"
                            accept="video/mp4,video/quicktime"
                            class="mt-1 block w-full">
                        @error('video')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>



                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">
                        Upload Video
                    </button>


                </form>
        </div>

    </div> --}}



</div>
<div class="bg-yellow-100 px-2 py-2 mt-2 rounded-lg">
    <p class="mt-4 dark:text-gray-400 text-md leading-relaxed px-8">
        求職者は、日本語での自己紹介のために2分から4分のビデオをアップロードする必要があります。そのビデオをここにアップロードしてください!!
        <br>ビデオの制限は最大100MBです
    </p>
</div>

<div class="container px-2 space-x-5 bg-white mb-5">

    <div class="mt-5">


        <div class="bg-blue-50 scale-100 p-6  dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none flex motion-safe:hover: transition-all duration-250 focus:outline focus:outline-2 focus:outline-indigo-500">



        <div class="mt-8 px-2">
            @if(Auth::user()->videoProfile)
            {{-- @php

             dd(Storage::url(Auth::user()->videoProfile->video_path));
            @endphp --}}

                    <h3 class="text-lg font-medium mb-2">{{ __('Video Introduction') }}</h3>
                    <video width="800" height="600" controls class="rounded-lg shadow-lg">
                        <source src="{{ asset('storage/' . Auth::user()->videoProfile->video_path) }}" type="video/mp4">

                        Your browser does not support the video tag.
                    </video>

                    <div class="mt-2">
                        @if(Auth::user()->videoProfile->title)
                            <h4 class="font-medium">{{ Auth::user()->videoProfile->title }}</h4>
                        @endif

                        @if(Auth::user()->videoProfile->description)
                            <p class="text-gray-600 mt-1">{{ Auth::user()->videoProfile->description }}</p>
                        @endif

                        <div class="mt-2 text-sm text-gray-500">
                            {{ __('Duration:') }} {{ floor(Auth::user()->videoProfile->duration / 60) }}:{{ str_pad(Auth::user()->videoProfile->duration % 60, 2, '0', STR_PAD_LEFT) }}
                        </div>
                    </div>

                    <!-- Delete Video Button -->
                    <form action="{{ route('video-profile.destroy') }}" method="POST" class="mt-4">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">
                            {{ __('Delete Video') }}
                        </button>
                    </form>

            @else
                <p class="text-gray-500 italic">動画プロフィールはまだアップロードされていません。</p>
            @endif
        </div>








        </div>












    </div>

</div>



            </div>
        </div>
    </div>
</x-app-layout>

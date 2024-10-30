<x-app-layout>



    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 mt-10">


        <div class="bg-white shadow rounded-xl mb-3">
            <div class="px-4 py-5 bg-yellow-100  text-lg font-semibold">
                <h2>{{ $jobpost->user->name }}</h2>

            </div>
            <div class="container w-full h-[200px] bg-stone-200">
                kaisho joho
            </div>

            <div class="space-y-2 p-6 mb-2">

                <div class="flex justify">
                    <svg fill="#d1b110" height="30px" width="30px" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 219.376 219.376" xml:space="preserve" stroke="#d1b110"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M127.518,0H40.63c-6.617,0-12,5.383-12,12v195.376c0,6.617,5.383,12,12,12h138.117c6.617,0,12-5.383,12-12V59.227 c0-3.204-1.248-6.217-3.514-8.484l-51.364-47.36C133.619,1.2,130.661,0,127.518,0z M175.747,204.376H43.63V15h71.768v40.236 c0,8.885,7.225,16.114,16.105,16.114h44.244V204.376z M131.503,56.35c-0.609,0-1.105-0.5-1.105-1.114v-31.58l34.968,32.693H131.503z M65.499,97.805c-5.14,0-9.321,4.182-9.321,9.321c0,5.14,4.182,9.321,9.321,9.321c5.14,0,9.321-4.182,9.321-9.321 C74.82,101.987,70.638,97.805,65.499,97.805z M82.499,99.627h79.5v15h-79.5V99.627z M65.499,127.805 c-5.14,0-9.321,4.182-9.321,9.321s4.182,9.321,9.321,9.321c5.14,0,9.321-4.182,9.321-9.321S70.638,127.805,65.499,127.805z M82.499,129.626h79.5v15h-79.5V129.626z M65.499,157.805c-5.14,0-9.321,4.182-9.321,9.321s4.182,9.321,9.321,9.321 c5.14,0,9.321-4.182,9.321-9.321S70.638,157.805,65.499,157.805z M82.499,159.626h79.5v15h-79.5V159.626z"></path> </g>
                    </svg>
                    <span class="px-5 py-2 text-xl font-semibold">募集情報</span>

                </div>

                <div class="bg-gray-600 mb-4 border-2 border-yellow-500 mt-2"></div>

                <div class="flex flex-col sm:flex-row justify border-b border-t">
                    <label for="title" class="block font-semibold text-gray-700 bg-yellow-100 w-full sm:w-[200px] h-[100px] px-5 py-5 text-md flex-shrink-0">
                        企業名
                    </label>
                    <p class="px-5 py-5 text-md w-full sm:w-auto">
                        {{ $jobpost->user->name }}
                    </p>
                </div>

                <div class="flex flex-col sm:flex-row justify border-b border-t">
                    <label for="title" class="block font-semibold text-gray-700 bg-yellow-100 w-full sm:w-[200px] h-[100px] px-5 py-5 text-md flex-shrink-0">
                        職種
                    </label>
                    <p class="px-5 py-5 text-md w-full sm:w-auto">
                        {{ $jobpost->title }}
                    </p>
                </div>

              

                <div class="flex flex-col sm:flex-row justify-between border-b border-t">
                    <label for="title" class="block font-semibold text-gray-700 bg-yellow-100 w-full sm:w-[200px] h-[350px] px-5 py-5 text-md flex-shrink-0">
                        仕事内容
                    </label>
                    <p class="px-5 py-5 text-md w-full sm:w-auto">
                        {{ $jobpost->job_detail}}
                    </p>
                </div>

                <div class="flex flex-col sm:flex-row justify border-b border-t">
                    <label for="title" class="block font-semibold text-gray-700 bg-yellow-100 w-full sm:w-[200px] h-[100px] px-5 py-5 text-md flex-shrink-0">
                        対象となる方<br>・資格
                    </label>
                    <p class="px-5 py-5 text-md w-full sm:w-auto">
                        {{ $jobpost->qualification }}
                    </p>
                </div>
                <div class="flex flex-col sm:flex-row justify border-b border-t">
                    <label for="title" class="block font-semibold text-gray-700 bg-yellow-100 w-full sm:w-[200px] h-[100px] px-5 py-5 text-md flex-shrink-0">
                        勤務地
                    </label>
                    <p class="px-5 py-5 text-md w-full sm:w-auto">
                        {{ $jobpost->working_location }}
                    </p>
                </div>
                <div class="flex flex-col sm:flex-row justify border-b border-t">
                    <label for="title" class="block font-semibold text-gray-700 bg-yellow-100 w-full sm:w-[200px] h-[100px] px-5 py-5 text-md flex-shrink-0">
                        勤務時間<br>・シフト
                    </label>
                    <p class="px-5 py-5 text-md w-full sm:w-auto">
                        {{ $jobpost->working_hour }}
                    </p>
                </div>
                <div class="flex flex-col sm:flex-row justify border-b border-t">
                    <label for="title" class="block font-semibold text-gray-700 bg-yellow-100 w-full sm:w-[200px] h-[100px] px-5 py-5 text-md flex-shrink-0">
                        給与
                    </label>
                    <p class="px-5 py-5 text-md w-full sm:w-auto">
                        {{ $jobpost->salary }}
                    </p>
                </div>
                <div class="flex flex-col sm:flex-row justify border-b border-t">
                    <label for="title" class="block font-semibold text-gray-700 bg-yellow-100 w-full sm:w-[200px] h-[200px] px-5 py-5 text-md flex-shrink-0">
                        その他
                    </label>
                    <p class="px-5 py-5 text-md w-full sm:w-auto">
                        {{ $jobpost->other }}
                    </p>
                </div>

                <div class="flex justify-center space-x-3">
                    <a href="{{ route('jobpost.index') }}"
                       class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Cancel
                    </a>
                    <button type="submit"
                            class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" style="height:100px; width:200px">
                      <span class="text-2xl flex px-8">応募</span>
                    </button>
                </div>
            </div>
        </div>
    

    </x-app-layout>

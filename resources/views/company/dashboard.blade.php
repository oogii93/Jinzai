<x-app-layout>

    @if (session('success') || session('error'))
    <div id="statusToast" class="fixed top-16 left-1/2 transform -translate-x-1/2 z-50 w-full max-w-md">
        <div class="bg-gray-100 border-l-4 @if(session('success')) border-blue-500 @else border-red-500 @endif rounded-r-lg shadow-md overflow-hidden">
            <div class="p-4 flex items-center">
                <div class="flex-shrink-0">
                    @if (session('success'))
                        <svg class="w-6 h-6 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    @else
                        <svg class="w-6 h-6 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    @endif
                </div>
                <div class="ml-3 w-0 flex-1">
                    @if (session('success'))
                        <p class="text-lg font-semibold text-blue-900">
                            {!! session('success') !!}
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

    <div class="relative flex items-center space-x-10 w-full bg-sky-400 overflow-hidden">
        <!-- Three.js container -->
        <div id="three-background" class="absolute inset-0 opacity-50 pointer-events-none"></div>

        <!-- Your existing content -->
        <div class="relative z-10 flex items-center space-x-10 w-full">
            <img src="{{ asset('storage/' . Auth::user()->profile_image) }}"
                 alt="Company Logo"
                 class="w-40 h-32 px-2 py-2 rounded-xl">

            <div class="p-2 font-semibold">
                <h1>{{ $user->name }}</h1>
            </div>
        </div>
    </div>


    <div class="py-12 bg-gray-200">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8 bg-white rounded-lg mb-2 px-5">

            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <!-- Statistics Section -->
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
                        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg border border-gray-400 hover:bg-orange-100">
                            <div class="p-6">
                                <div class="text-xl font-semibold text-gray-800">{{ $statistics['total_jobs'] }}</div>
                                <div class="text-sm text-gray-600 font-semibold">弊社の投稿</div>
                            </div>
                        </div>
                        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg border border-gray-400 hover:bg-orange-100">
                            <div class="p-6">
                                <div class="text-xl font-semibold text-gray-800">{{ $statistics['total_applications'] }}</div>
                                <div class="text-sm text-gray-600 font-semibold">採用申請</div>
                            </div>
                        </div>
                        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg border border-gray-400 hover:bg-orange-100">
                            <div class="p-6">
                                <div class="text-xl font-semibold text-gray-800">{{ $statistics['pending_reviews'] }}</div>
                                <div class="text-sm text-gray-600 font-semibold">流れ</div>
                            </div>
                        </div>
                    </div>

                    <div class="overflow-x-auto bg-white mb-10 mt-5 p-5 rounded-xl ">
                        <h1 class="flex justify-center text-md font-semibold text-gray-700 mb-5">企業基本情報</h1>

                        <div class="">


                            <div class="px-10">


                                <h2 class="font-medium text-sm"><span class="text-gray-600 font-semibold bg-gray-200 rounded-lg px-2">企業名</span>  {{ $user->name }}</h2>
                                <p class="mt-4 text-sm"><span class="text-gray-600 font-semibold bg-gray-200 rounded-lg px-2">メールアドレス</span>  {{ $user->email }}</p>
                                <p class="mt-4 text-sm"><span class="text-gray-600 font-semibold bg-gray-200 rounded-lg px-2">電話番号</span>  {{ $user->phone_number }}</p>
                                <p class="mt-4 text-sm"><span class="text-gray-600 font-semibold bg-gray-200 rounded-lg px-2">携帯電話</span>  {{ $user->mobile_number }}</p>
                                <p class="mt-4 text-sm"><span class="text-gray-600 font-semibold bg-gray-200 rounded-lg px-2">住所</span>  {{ $user->address }}</p>








                                    <h2 class="font-medium text-sm"><span class="text-gray-600 font-semibold bg-gray-200 rounded-lg px-2">情報</span>  {{ $user->companyProfile->company_description ?? ''}}</h2>
                                    <p class="mt-4 text-sm"><span class="text-gray-600 font-semibold bg-gray-200 rounded-lg px-2">行動の方向性</span>  {{ $user->companyProfile->industry }}</p>
                                    <p class="mt-4 text-sm"><span class="text-gray-600 font-semibold bg-gray-200 rounded-lg px-2">ウェブサイト</span>  {{ $user->companyProfile->website }}</p>

                            </div>


                        </div>


                    </div>

                    <!-- Job Posts and Applications Section -->

                </div>
            </div>






                        <div class="overflow-x-auto bg-white rounded-lg">

                            <table class="min-w-full divide-y divide-gray-200">
                                <h1 class="flex justify-center text-lg font-semibold mb-5 text-gray-700 mt-2">{{ $user->name }} -- 投稿</h1>

                                <div class="flex justify-end">
                                <a href="{{ route('jobpost.create') }}" class=" bg-blue-500 hover:bg-blue-700 text-white px-2 py-2 rounded-lg mt-2 mb-2"><span class="4xl font-semibold">+</span>新規投稿</a>

                                </div>
                                <thead class="bg-orange-200 rounded-lg">
                                    <tr>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">番号</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">タイトル</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">制作日付け</th>
                                        <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">作動</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach ($jobposts as $item)
                                        <tr class="hover:bg-gray-50">
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $loop->iteration }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="flex items-center">
                                                    <div class="h-8 w-8 flex-shrink-0">
                                                        <span class="inline-flex h-8 w-8 items-center justify-center rounded-full bg-gray-500">
                                                            <span class="text-sm font-medium leading-none text-white">{{ substr($item->title, 0, 1) }}</span>
                                                        </span>
                                                    </div>
                                                    <div class="ml-4">
                                                        <div class="text-sm font-medium text-gray-900">{{ $item->title }}</div>
                                                    </div>

                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $item->created_at }}</td>




                                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                <div class="flex justify-end space-x-3">
                                                    <a href="{{ route('tags.edit', $item) }}"
                                                       class="text-indigo-600 hover:text-indigo-900">
                                                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                        </svg>
                                                    </a>
                                                    <form action="{{ route('tags.destroy', $item) }}" method="POST" class="inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                                class="text-red-600 hover:text-red-900"
                                                                onclick="return confirm('Are you sure you want to delete this user?')">
                                                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                            </svg>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>


                    </div>






                    </div>



                    <!-- Application View Modal -->
                    <div id="applicationModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden">
                        <div class="relative top-20 mx-auto p-5 border w-11/12 md:w-3/4 lg:w-1/2 shadow-lg rounded-md bg-white">
                            <div class="mt-3" id="applicationModalContent">
                                <!-- Content will be loaded here -->
                            </div>
                        </div>
                    </div>

                    <script>
                        function viewApplication(applicationId) {
                            // You'll need to implement this function to show application details in the modal
                            const modal = document.getElementById('applicationModal');
                            const content = document.getElementById('applicationModalContent');

                            // Fetch application details via AJAX and populate the modal
                            fetch(`/company/applications/${applicationId}`)
                                .then(response => response.json())
                                .then(data => {
                                    content.innerHTML = `
                                        <h3 class="text-lg font-medium text-gray-900 mb-4">Application Details</h3>
                                        <div class="space-y-4">
                                            <div>
                                                <h4 class="text-sm font-medium text-gray-500">Cover Letter</h4>
                                                <p class="mt-1 text-sm text-gray-900">${data.cover_letter}</p>
                                            </div>
                                            <div>
                                                <h4 class="text-sm font-medium text-gray-500">Resume</h4>
                                                <a href="/storage/${data.resume_path}" target="_blank" class="text-indigo-600 hover:text-indigo-900">View Resume</a>
                                            </div>
                                        </div>
                                        <div class="mt-5 flex justify-end">
                                            <button onclick="document.getElementById('applicationModal').classList.add('hidden')" class="px-4 py-2 bg-gray-200 text-gray-800 rounded-md hover:bg-gray-300">Close</button>
                                        </div>
                                    `;
                                    modal.classList.remove('hidden');
                                });
                        }



                    </script>

<script type="module">
    import * as THREE from 'three';

    // Initialize Three.js scene
    const container = document.getElementById('three-background');
    const scene = new THREE.Scene();
    const camera = new THREE.PerspectiveCamera(75, container.clientWidth / container.clientHeight, 0.1, 1000);
    const renderer = new THREE.WebGLRenderer({ alpha: true }); // Enable transparency

    // Set up renderer
    renderer.setSize(container.clientWidth, container.clientHeight);
    container.appendChild(renderer.domElement);

    // Create multiple cubes
    const cubes = [];
    const cubeGeometry = new THREE.BoxGeometry(1, 1, 1);
    const cubeMaterial = new THREE.MeshBasicMaterial({
        color: 0xFFFFFF,
        transparent: true,
        opacity: 0.3
    });

    // Create and position multiple cubes
    for (let i = 0; i < 10; i++) {
        const cube = new THREE.Mesh(cubeGeometry, cubeMaterial);
        cube.position.x = (Math.random() - 0.5) * 10;
        cube.position.y = (Math.random() - 0.5) * 10;
        cube.position.z = (Math.random() - 0.5) * 10;
        cube.rotation.x = Math.random() * Math.PI;
        cube.rotation.y = Math.random() * Math.PI;
        cubes.push(cube);
        scene.add(cube);
    }

    // Position camera
    camera.position.z = 5;

    // Handle window resize
    window.addEventListener('resize', onWindowResize, false);

    function onWindowResize() {
        camera.aspect = container.clientWidth / container.clientHeight;
        camera.updateProjectionMatrix();
        renderer.setSize(container.clientWidth, container.clientHeight);
    }

    // Animation loop
    function animate() {
        requestAnimationFrame(animate);

        // Animate each cube
        cubes.forEach(cube => {
            cube.rotation.x += 0.002;
            cube.rotation.y += 0.002;
            cube.position.y += Math.sin(Date.now() * 0.001) * 0.002;
        });

        renderer.render(scene, camera);
    }

    animate();
    </script>
    </div>
</x-app-layout>

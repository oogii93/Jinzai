<x-app-layout>



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


    <div class="py-12 bg-gray-100">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">

            <div class="overflow-x-auto bg-white mb-10 mt-5 p-5 rounded-xl ">
                <h1 class="flex justify-center text-md font-semibold text-gray-700 mb-5">{{__('Company Information') }}</h1>

                <div class="flex justify-normal">


                    <div class="px-10">


                        <h2 class="font-medium text-sm"><span class="text-gray-600 font-semibold bg-gray-200 rounded-lg px-2">{{ __('Name') }}</span>  {{ $user->name }}</h2>
                        <p class="mt-4 text-sm"><span class="text-gray-600 font-semibold bg-gray-200 rounded-lg px-2">{{ __('Email') }}</span>  {{ $user->email }}</p>
                        <p class="mt-4 text-sm"><span class="text-gray-600 font-semibold bg-gray-200 rounded-lg px-2">{{ __('Phone Number') }}</span>  {{ $user->phone_number }}</p>
                        <p class="mt-4 text-sm"><span class="text-gray-600 font-semibold bg-gray-200 rounded-lg px-2">{{ __('Mobile Number') }}</span>  {{ $user->mobile_number }}</p>
                        <p class="mt-4 text-sm"><span class="text-gray-600 font-semibold bg-gray-200 rounded-lg px-2">{{ __('Address') }}</span>  {{ $user->address }}</p>

                    </div>



                    <div class="px-40">


                            <h2 class="font-medium text-sm"><span class="text-gray-600 font-semibold bg-gray-200 rounded-lg px-2">{{ __('Description') }}</span>  {{ $user->companyProfile->company_description }}</h2>
                            <p class="mt-4 text-sm"><span class="text-gray-600 font-semibold bg-gray-200 rounded-lg px-2">{{ __('Industry') }}</span>  {{ $user->companyProfile->industry }}</p>
                            <p class="mt-4 text-sm"><span class="text-gray-600 font-semibold bg-gray-200 rounded-lg px-2">{{ __('Website') }}</span>  {{ $user->companyProfile->website }}</p>

                    </div>


                </div>


            </div>


                        <div class="overflow-x-auto bg-white rounded-lg">

                            <table class="min-w-full divide-y divide-gray-200">
                                <h1 class="flex justify-center text-lg font-semibold mb-5 text-gray-700 mt-2">{{ $user->name }} -- {{ __('Job Post') }}</h1>

                                <div class="flex justify-end">
                                <a href="{{ route('jobpost.create') }}" class=" bg-blue-500 hover:bg-blue-700 text-white px-2 py-2 rounded-lg mt-2 mb-2"><span class="4xl font-semibold">+</span>{{ __('New Post') }}</a>

                                </div>
                                <thead class="bg-orange-200 rounded-lg">
                                    <tr>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">{{ __('Number') }}</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">{{ __('Job Title') }}</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">{{ __('Created at') }}</th>
                                        <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">{{ __('Action') }}</th>
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

                        <!-- Pagination -->
                        <div class="bg-white px-4 py-3 border-t border-gray-200 sm:px-6">
                            <div class="flex items-center justify-between">
                                <div class="flex-1 flex justify-between sm:hidden">
                                    <!-- Mobile pagination controls -->
                                    <a href="#" class="relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">Previous</a>
                                    <a href="#" class="ml-3 relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">Next</a>
                                </div>
                                <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
                                    <div>
                                        <p class="text-sm text-gray-700">
                                            Showing
                                            <span class="font-medium">1</span>
                                            to
                                            <span class="font-medium">10</span>
                                            of
                                            <span class="font-medium">20</span>
                                            results
                                        </p>
                                    </div>
                                    <div>
                                        {{-- {{ $users->links() }} --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>





                        <!-- Pagination -->
                        <div class="bg-white px-4 py-3 border-t border-gray-200 sm:px-6">
                            <div class="flex items-center justify-between">
                                <div class="flex-1 flex justify-between sm:hidden">
                                    <!-- Mobile pagination controls -->
                                    <a href="#" class="relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">Previous</a>
                                    <a href="#" class="ml-3 relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">Next</a>
                                </div>
                                <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
                                    <div>
                                        <p class="text-sm text-gray-700">
                                            Showing
                                            <span class="font-medium">1</span>
                                            to
                                            <span class="font-medium">10</span>
                                            of
                                            <span class="font-medium">20</span>
                                            results
                                        </p>
                                    </div>
                                    <div>
                                        {{-- {{ $users->links() }} --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="py-12">
                        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                            <!-- Statistics Section -->
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
                                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                                    <div class="p-6">
                                        <div class="text-xl font-semibold text-gray-800">{{ $statistics['total_jobs'] }}</div>
                                        <div class="text-sm text-gray-600">Active Job Posts</div>
                                    </div>
                                </div>
                                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                                    <div class="p-6">
                                        <div class="text-xl font-semibold text-gray-800">{{ $statistics['total_applications'] }}</div>
                                        <div class="text-sm text-gray-600">Total Applications</div>
                                    </div>
                                </div>
                                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                                    <div class="p-6">
                                        <div class="text-xl font-semibold text-gray-800">{{ $statistics['pending_reviews'] }}</div>
                                        <div class="text-sm text-gray-600">Pending Reviews</div>
                                    </div>
                                </div>
                            </div>

                            <!-- Job Posts and Applications Section -->
                            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                                <div class="p-6">
                                    <h2 class="text-2xl font-semibold text-gray-800 mb-6">Job Posts and Applications</h2>

                                    @foreach($jobposts as $jobpost)
                                        <div class="mb-8 border-b pb-6">
                                            <div class="flex justify-between items-center mb-4">
                                                <h3 class="text-xl font-medium text-gray-900">{{ $jobpost->title }}</h3>
                                                <span class="px-4 py-2 rounded-full text-sm font-semibold {{ $jobpost->pending_applications > 0 ? 'bg-yellow-100 text-yellow-800' : 'bg-gray-100 text-gray-800' }}">
                                                    {{ $jobpost->total_approved_applications }} Applications
                                                </span>
                                            </div>

                                            @if($jobpost->applications->count() > 0)
                                                <div class="overflow-x-auto">
                                                    <table class="min-w-full divide-y divide-gray-200">
                                                        <thead class="bg-gray-50">
                                                            <tr>
                                                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Applicant</th>
                                                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                                                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Applied Date</th>
                                                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Actions</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody class="bg-white divide-y divide-gray-200">
                                                            @foreach($jobpost->applications as $application)
                                                                <tr>
                                                                    <td class="px-6 py-4 whitespace-nowrap">
                                                                        <div class="text-sm font-medium text-gray-900">{{ $application->user->name }}</div>
                                                                        <div class="text-sm text-gray-500">{{ $application->user->email }}</div>
                                                                    </td>
                                                                    <td class="px-6 py-4 whitespace-nowrap">
                                                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full
                                                                            @if($application->company_status === 'pending') bg-yellow-100 text-yellow-800
                                                                            @elseif($application->company_status === 'under_review') bg-blue-100 text-blue-800
                                                                            @elseif($application->company_status === 'accepted') bg-green-100 text-green-800
                                                                            @else bg-red-100 text-red-800
                                                                            @endif">
                                                                            {{ ucfirst($application->company_status) }}
                                                                        </span>
                                                                    </td>
                                                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                                        {{ $application->created_at->format('M d, Y') }}
                                                                    </td>
                                                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                                                        <div class="flex space-x-3">
                                                                            <a href="#" onclick="viewApplication({{ $application->id }})" class="text-indigo-600 hover:text-indigo-900">View</a>
                                                                            <form action="{{ route('company.application.update-status', $application) }}" method="POST" class="inline">
                                                                                @csrf
                                                                                @method('PATCH')
                                                                                <select name="status" onchange="this.form.submit()" class="text-sm rounded border-gray-300">
                                                                                    <option value="under_review" {{ $application->company_status === 'under_review' ? 'selected' : '' }}>Under Review</option>
                                                                                    <option value="accepted" {{ $application->company_status === 'accepted' ? 'selected' : '' }}>Accept</option>
                                                                                    <option value="rejected" {{ $application->company_status === 'rejected' ? 'selected' : '' }}>Reject</option>
                                                                                </select>
                                                                            </form>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            @else
                                                <p class="text-gray-500 text-sm">No approved applications yet.</p>
                                            @endif
                                        </div>
                                    @endforeach
                                </div>
                            </div>
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

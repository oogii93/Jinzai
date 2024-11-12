<div id="searchResults">
    @foreach($jobposts as $jobpost)
        <div class="job-card">
            <h3>{{ $jobpost->title }}</h3>
            <p>{{ $jobpost->salary }}</p>
            <p>{{ $jobpost->working_location }}</p>
            <!-- Add other job details you want to display -->
        </div>

        <div class="mt-2">
            @foreach($jobpost->tags as $tag)
                <a href="{{ route('posts.tag', $tag->id) }}"
                   class="inline-block bg-gray-200 hover:bg-gray-300 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">
                    {{ $tag->name }}
                </a>
            @endforeach
        </div>
    @endforeach
</div>

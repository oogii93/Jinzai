@foreach ($applications as $application)
    <div class="application-card">
        <h3>{{ $application->jobPost->title }}</h3>
        <p>Applicant: {{ $application->user->name }}</p>
        <p>Admin Status: {{ $application->admin_status }}</p>
        <p>Admin Remarks: {{ $application->admin_remarks }}</p>

        <form action="{{ route('applications.company-status', $application) }}" method="POST">
            @csrf
            @method('PATCH')
            <select name="company_status">
                <option value="under_review">Under Review</option>
                <option value="accepted">Accept</option>
                <option value="rejected">Reject</option>
            </select>
            <button type="submit">Update Status</button>
        </form>
    </div>
@endforeach

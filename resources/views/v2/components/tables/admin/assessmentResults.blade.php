<table id="assessmentResultsTable" class="table table-bordered table-hover">
    <thead class="primary-color">
        <tr>
            <th>#</th>
            <th>Email</th>
            <th>Score</th>
            <th>Type</th>
            <th>Experience</th>
            <th>Done</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($testResults as $key => $testResult)
        <tr>
            <td>{{ $key+1 }}</td>
            <td>{{ $testResult->email }}</td>
            <td>{{ $testResult->score }}%</td>
            <td>{{ $testResult->type }}</td>
            @if(isset($testResult->user->seeker->id))
                <td>{{ $testResult->user->seeker->years_experience }} years</td>
            @else
                <td>Unavailable</td>
            @endif
            <td>{{ $testResult->performances->last()->created_at->diffForHumans() }}</td>
            <td>
                <a href="{{route('assessmentResults.show', ['email' => $testResult->email])}}" class="btn btn-primary rounded-pill" title="View Detailed Results">
                    <i class='bx bx-line-chart'></i>
                </a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
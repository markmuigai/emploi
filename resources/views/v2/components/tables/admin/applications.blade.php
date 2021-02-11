<table id="assessmentResultsTable" class="table table-bordered table-hover">
  <thead class="primary-color">
      <tr>
          <th>#</th>
          <th>Name</th>
          <th>Job Title</th>
          <th>Industry</th>
          <th>Industry Applied For</th>
          <th>Education Level</th>
          <th>Education Level Required</th>
          <th>Experience</th>
          <th>Experience Required</th>
          <th>Referee score</th>
          <th>Assessment Score</th>
          <th>Actions</th>
      </tr>
  </thead>
  <tbody>
      @foreach ($applications as $key => $application)
      <tr>
          <td>{{ $key+1 }}</td>
          <td>{{ $application->user->name }}</td>
          <td>{{$application->post->title}}</td>
          @if (isset($application->user->seeker->industry))
            <td>{{$application->user->seeker->industry->name}}</td>
          @else
            <td>Not provided</td>
          @endif
            <td>{{$application->post->industry->name}}</td>
          @else
            <td>Not provided</td>
          @endif
          @if (isset($application->user->seeker->educationLevel))
            {{$application->user->seeker->educationLevel->name}}
          @else

          @endif
          @if (isset($application->post->educationLevel))
            {{$application->post->educationLevel->name}}
          @else
            <td>Not Provided</td>
          @endif
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
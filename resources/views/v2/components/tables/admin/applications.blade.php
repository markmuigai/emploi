<table id="applicationsTable" class="table table-bordered table-hover">
  <thead class="primary-color">
      <tr>
          <th>Name</th>
          <th>Job Title</th>
          <th>Industry</th>
          <th>Industry Applied For</th>
          <th>Education Level</th>
          <th>Education Level Required</th>
          <th>Experience</th>
          <th>Experience Required</th>
          <th>Assessment Score</th>
          <th>Referee score</th>
          <th>RSI score</th>
          <th>Actions</th>
      </tr>
  </thead>
  <tbody>
      @foreach ($applications as $key => $application)
      <tr>
          <td>{{ $application->user->name }}</td>
          <td>{{$application->post->title}}</td>
          @if (isset($application->user->seeker->industry))
            <td>{{$application->user->seeker->industry->name}}</td>
          @else
            <td>Not provided</td>
          @endif
          @if (isset($application->post->industry))
            <td>{{$application->post->industry->name}}</td>
          @else
            <td>Not provided</td>
          @endif
          @if (isset($application->user->seeker->educationLevel))
            {{$application->user->seeker->educationLevel->name}}
          @else
            <td>Not provided</td>
          @endif
          @if (isset($application->post->educationLevel))
          <td>{{$application->post->educationLevel->name}}</td>
          @else
            <td>Not Provided</td>
          @endif
          @if(isset($application->user->seeker->id))
              <td>{{ $application->user->seeker->years_experience }} years</td>
          @else
              <td>Not Provided</td>
          @endif
          @if(isset($application->post->years_experience))
              <td>{{ $application->post->years_experience }} years</td>
          @else
              <td>Not Provided</td>
          @endif
          @if(null !== $application->user->seeker->getAssessmentScore())
            <td>{{ $application->user->seeker->getAssessmentScore()/1*100 }}%</td>
          @else
            <td>Not Provided</td>
          @endif
          @if(null !== App\JobApplicationReferee::scoreRefereeReport($application->user->seeker->id))
            <td>{{ App\JobApplicationReferee::scoreRefereeReport($application->user->seeker->id)/1*100 }}%</td>
          @else
            <td>Not Provided</td>
          @endif
          <td>{{$application->rsiScore}}%</td>
          <td>
              <a href="#" class="btn btn-primary rounded-pill" title="View Detailed Analysis">
                  <i class='bx bx-line-chart'></i>
              </a>
          </td>
      </tr>
      @endforeach
  </tbody>
</table>
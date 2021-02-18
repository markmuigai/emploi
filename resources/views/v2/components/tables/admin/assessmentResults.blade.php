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
				@if($testResult->type == 'aptitude' || $testResult->type == 'aptitude_practice')
					<a href="{{route('assessmentResults.show', ['email' => $testResult->email])}}"
						 class="btn btn-primary rounded-pill" title="View Detailed Results">
						<i class='bx bx-line-chart'></i>
					</a>
				@else
					<a class="btn btn-success rounded-pill" type="button" data-toggle="modal"
						 data-target="#viewPersonalityModal-{{ $key }}" title="View Personality Test Results">
						<i class='bx bxs-user-detail'></i>
					</a>
				@endif
			</td>
			@if($testResult->type == 'personality practice')
			<div class="modal fade" id="viewPersonalityModal-{{ $key }}" tabindex="-1" role="dialog"
					 aria-labelledby="viewPersonalityModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-dialog-scrollable" role="document">
					<div class="modal-content">
						<h4 class="text-center mt-4">
							{{ $testResult->email }} personality
						</h4>
						<div class="modal-body">
							@foreach ($testResult->personalityScores($testResult->email) as $key => $score)
								<div class="row">
									<div class="col-md-12">
										<strong class="text-success">
											{{($key+1).') '.ucfirst($score->personality)}} - <span>{{$score->score}}%</span>
										</strong>
										<p>{{$score->getRemark()}}</p>
									</div>
								</div>
							@endforeach
						</div>
					</div>
				</div>
			</div>
			@endif
		</tr>
	@endforeach
	</tbody>
</table>

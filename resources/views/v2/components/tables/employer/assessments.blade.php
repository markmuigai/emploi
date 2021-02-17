<form action="{{route('v2.bulk-actions.store')}}" method="post">
	@csrf
	<table id="allSeekers" class="table table-bordered shadow rounded-3" style="width:100%">
		<thead>
		<tr>
			<th>Name</th>
			<th>Education Level</th>
			<th>Experience</th>
			@if (request()->type == 'aptitude')
				<th>Score</th>
			@else
				<th>Status</th>
			@endif
			<th>Actions</th>
		</tr>
		</thead>
		<tbody>
		@forelse($seekers as $s)
			<tr>
				<td>
					<a href="/employers/browse/{{ $s->user->username }}" target="_blank">{{ $s->user->name }}</a>
				</td>
				<td>
					@if(isset($s->educationLevel))
						{{ $s->educationLevel->name }}
					@else
						Not Provided
					@endif
				</td>
				<td>
					@if(isset($s->years_experience))
						{{ $s->years_experience }} years
					@else
						Not Provided
					@endif
				</td>
				@if (request()->type == 'aptitude')
					<td>
						@if ($s->user->applicationForPost($post->slug)->aptitudeTestResults() == null )
							Pending
						@else
							{{$s->user->applicationForPost($post->slug)->aptitudeTestResults()->score}}%
						@endif
					</td>
				@else
					<td>
						@if ($s->user->applicationForPost($post->slug)->personalityTestResults() == null)
							Pending
						@else
							Submitted
						@endif
					</td>
				@endif
				<td>
					<a class="btn btn-success rounded-pill" type="button" data-toggle="modal"
						 data-target="#shortlistSeekerModal-{{ $s->user->id }}" title="Shortlist">
						<i class='bx bx-check'></i>
					</a>
					<a class="btn btn-success rounded-pill" type="button" data-toggle="modal"
						 data-target="#saveSeekerModal-{{ $s->user->id }}" title="Save profile">
						<i class='bx bxs-heart'></i>
					</a>
					@if (request()->type == 'personality' && $s->user->applicationForPost($post->slug)->personalityTestResults())
						<a class="btn btn-success rounded-pill" type="button" data-toggle="modal"
							 data-target="#viewPersonalityModal-{{ $s->user->id }}" title="View Personality Test Results">
							<i class='bx bxs-user-detail'></i>
						</a>
					@endif
				</td>
			</tr>
			<!--SHORTLIST MODAL -->
			<div class="modal fade" id="shortlistSeekerModal-{{ $s->user->id }}" tabindex="-1" role="dialog"
					 aria-labelledby="shortlistSeekerModalLabel" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<h4 class="text-center mt-4">
							Shortlist
						</h4>
						<div class="modal-body">
							@if(count(Auth::user()->employer->shortlistingPosts) > 0)
								<form method="post" action="/employers/shortlist" class="row">
									@csrf
									<div class="job-filter-area pt-2">
										<div class="container">
											<form>
												<div class="row">
													<div class="col-sm-12 col-lg-12">
														<div class="form-group">
															<input type="hidden" name="seeker_id" value="{{ $s->id }}">
															<select class="form-control" name="post_id">
																@foreach(Auth::user()->employer->shortlistingPosts as $ap)
																	<option value="{{ $ap->id }}">{{ $ap->title }}</option>
																@endforeach
															</select>
														</div>
													</div>
													<div class="col-sm-6 col-lg-12">
														<button type="submit" class="btn cmn-btn">
															Shortlist
															<i class='bx bx-search-alt'></i>
														</button>
													</div>
												</div>
											</form>
										</div>
									</div>
								</form>
							@else
								<h5 class="text-danger text-center">No job posted yet</h5>
							@endif
						</div>
					</div>
				</div>
			</div>
			<!--END SHORTLIST SEEKER MODAL -->

			<!-- SAVE PROFILE MODAL -->
			<div class="modal fade" id="saveSeekerModal-{{ $s->user->id }}" tabindex="-1" role="dialog"
					 aria-labelledby="saveSeekerModalLabel" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<h4 class="text-center mt-4">
							Save {{ $s->user->name }} profile?
						</h4>
						<div class="modal-body">
							<form method="post" action="/employers/saved" class="row">
								@csrf
								<div class="job-filter-area pt-2">
									<div class="container">
										<form>
											<div class="row">
												<div class="col-sm-12 col-lg-12">
													<div class="form-group">
														<input type="hidden" name="seeker_id" value="{{ $s->id }}">
													</div>
												</div>
												<div class="col-sm-6 col-lg-12">
													<button type="submit" class="btn cmn-btn">
														Save
														<i class='bx bx-search-alt'></i>
													</button>
												</div>
											</div>
										</form>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
			<!-- END SAVE PROFILE MODAL -->
			<!-- VIEW PERSONALITY MODAL -->
			@if($s->user->applicationForPost($post->slug)->personalityTestResults())
				<div class="modal fade" id="viewPersonalityModal-{{ $s->user->id }}" tabindex="-1" role="dialog"
						 aria-labelledby="viewPersonalityModalLabel" aria-hidden="true">
					<div class="modal-dialog modal-dialog-scrollable" role="document">
						<div class="modal-content">
							<h4 class="text-center mt-4">
								{{ $s->user->name }} personality
							</h4>
							<div class="modal-body">
								@foreach ($s->user->applicationForPost($post->slug)->personalityScores() as $key => $score)
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
			<!-- END PERSONALITY MODAL -->
		@empty
		@endforelse
		</tbody>
		<tfoot>
		<tr>
			<th>Name</th>
			<th>Education Level</th>
			<th>Experience</th>
			@if (request()->type == 'aptitude')
				<th>Score</th>
			@else
				<th>Status</th>
			@endif
			<th>Actions</th>
		</tr>
		</tfoot>
	</table>
</form>
@section('js')
	<script>
		$('#allSeekers').DataTable({
			"paging": false,
			"bInfo": false
		});
	</script>
@endsection

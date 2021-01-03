@extends('layouts.dashboard-layout')

@section('title','Emploi :: Job Seeker Dashboard')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@section('page_title', 'Dashboard')

<br id="paas_task"><br>
<div class="row">
	<div class="col-lg-12">
		<div class="card my-2">
			<div class="card-body">
				<div class="row">
					<div class="col-6">
						<h5><a href="">{{ $task->title }}</a></h5>
						<p>
							{{ $task->company }}
							<small class="badge badge-purple">{{ $task->salary }}</small>
						</p>					
						<span href="">{{ $task->created_at->diffForHumans() }}</span>

						<?php 
		                    $show = true; 
		                    if(Auth::user()->seeker->hasAppliedTask($task))
		                    {
		                        $show = false;
		                    }
		                ?>
		                @if($show)
		                <a href="/job-seekers/apply-task/{{ $task->slug }}" class="btn btn-orange">Apply</a>
		                @else
		                <span class="btn btn-orange-alt">Applied</span>
		                @endif
					</div>
					<div class="col-md-6">
						<h6>Details</h6>
                        <p>{{ $task->description }}</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
	<hr>
@endsection

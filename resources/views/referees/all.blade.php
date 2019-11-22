@extends('layouts.dashboard-layout')

@section('title','Emploi :: All Referees')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')

<div class="container">

	<div class="row">
		<div class="col-9">
			<h3>My Referees</h3>
		</div>
		<div class="col-3 text-right">
			<a href="/profile/add-referee" class="btn btn-sm btn-orange"><i class="fas fa-plus"></i> Add</a>
		</div>
	</div>

	<?php $i=1; ?>
	@forelse($referees as $ref)
	<div class="card my-3">
		<div class="card-body">
			<div class="row">
				<div class="col-md-8">
					<h4>
						{{ $i.'. '.$ref->name }}
					</h4>
					<p>
						{{ $ref->position_held }} <i> at </i>
						<strong>
							{{ $ref->organization }}
						</strong>
					</p>
					<p>
						[ {{ $ref->relationship }} ]
					</p>
					<!-- <hr> -->
					<p>
						{{ $ref->responsibilities }}
					</p>
				</div>
				<div class="col-md-4">
					<p class="pull-right">
						{{ $ref->status }}
					</p>
				</div>
			</div>
		</div>
	</div>
	<?php $i++; ?>
	@empty
	<p style="text-align: center;">
		<br>
		You have not indicated any of your professional referees <br><br>
		<a href="/profile/add-referee" class="btn btn-sm btn-orange"><i class="fas fa-plus"></i> Add Referee</a>
	</p>
	@endforelse
</div>


@endsection
@extends('layouts.dashboard-layout')

@section('title','Emploi :: All Referees')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@section('page_title', 'My Referees')

<div class="text-right py-2">
	<a href="/profile/add-referee" class="btn btn-sm btn-orange"><i class="fas fa-plus"></i> Add Referee</a>
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
				<p class="text-capitalize">
					{{ $ref->position_held }} <i> at </i>
					<strong>
						{{ $ref->organization }}
					</strong>
				</p>
				<p class="text-capitalize">
					[ {{ $ref->relationship }} ]
				</p>
				<!-- <hr> -->
				<p class="text-capitalize">
					{{ $ref->responsibilities }}
				</p>
			</div>
			<div class="col-md-4">
				<p class="pull-right text-capitalize">
					{{ $ref->status }}
				</p>
			</div>
		</div>
	</div>
</div>
<?php $i++; ?>
@empty
<div class="card">
	<div class="card-body text-center">
		<p>
			You have not indicated any of your professional referees.
		</p>
		<a href="/profile/add-referee" class="btn btn-sm btn-orange"><i class="fas fa-plus"></i> Add Referee</a>
	</div>
</div>
@endforelse


@endsection

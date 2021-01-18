@extends('layouts.dashboard-layout')

@section('title','Emploi :: All Referees')

@section('description')
Emploi is the Leading Platform for Talent Assessment and Matching for SME's in Africa.
@endsection

@section('content')
@section('page_title', 'My Referees')

<div class="text-right py-2">
	<a href="/profile/add-referee" class="btn btn-sm btn-orange"><i class="fas fa-plus"></i> Add Referee</a>
</div>
<?php $i=1; ?>
@if(session()->has('message'))
    <div class="container">
        <div class="alert alert-success">
        {{ session()->get('message') }}
        </div>
    </div>
@endif
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
				@if($ref->status == 'ready')
				<p class="text-success">
					Status: Referee has provided assessment
				</p>
				@else
		         	<p class="text-warning">Status: Assessment not yet provided</p>
                    <a href="/v2/referees/{{ $ref->id }}/resend">
                        <i class="btn btn-orange-alt">Resend Referee Link</i>
                    </a>                     
                @endif
			</div>
		</div>
	</div>
</div>
<?php $i++; ?>
@if($i%3==0)
{{-- @include('components.ads.responsive') --}}
@endif
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

@extends('layouts.seek')

@section('title','Emploi :: All Referees')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@include('seekers.search-input')

<div class="container">
    <div class="single">

	 <div class="col-md-8 single_right">
	      <h3>
	      	My Referees
	      	<a href="/profile" class="btn btn-sm btn-success pull-right">My Profile</a>
	      	<a href="/profile/add-referee" class="btn btn-sm btn-primary pull-right">Add</a>
	      </h3>
	      <div class="row_1">
	      		<?php $i=1; ?>
	      		@forelse($referees as $ref)

	      		<div style="border-bottom: 0.1em solid #e88725" class="col-md-8 col-md-offset-2">
	      			<h5>
	      				{{ $i.'. '.$ref->name }}
	      				<small class="pull-right">
	      					{{ $ref->status }}
	      				</small>
	      			</h5>
	      			<p>
	      				{{ $ref->position_held }} <i> at </i>
	      				<strong>
	      					{{ $ref->organization }}
	      				</strong>
	      				<small class="pull-right">
	      					[ {{ $ref->relationship }} ]
	      				</small>

	      			</p>
	      			<hr>
	      			<p>
	      				{{ $ref->responsibilities }}
	      			</p>
	      		</div>
	      		<?php $i++; ?>
	      		@empty

	      		<p style="text-align: center;">
	      			<br>
	      			You have not indicated any of your professional referees <br><br>
	      			<a href="/profile/add-referee" class="btn btn-sm btn-primary">Add Referee</a>

	      		</p>

	      		@endforelse

	      	<div class="clearfix"> </div>
	      </div>



	   </div>
	   <div class="col-md-4">
	   	  @include('left-bar')

	 </div>
	   <div class="clearfix"> </div>
	 </div>
</div>

@endsection

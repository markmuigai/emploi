@extends('layouts.seek')

@section('title','Emploi :: '.$company->name)

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@include('seekers.search-input')

<div class="container">
    <div class="single">  
	   
	 <div class="col-md-8 single_right">
	      <h3>
	      	<i class="fa fa-arrow-left" title="View All Companies" onclick="window.location='/companies'"></i>
	      	{{ $company->name }}
	      	<small class="pull-right">[{{ count($company->activePosts) }} vacancies]</small>
	      	
	      </h3>
	      <div class="row_1">
	      	
	      	<div class="clearfix"> </div>
	      </div>

	      <div class="row">
	      	<div class="col-md-3 col-xs-4">
	      		<img src="{{ asset($company->logoUrl) }}" style="width: 100%">
	      	</div>
	      	<div class="col-md-5 col-xs-8" style="text-align: center;">
	      		<br>
	      		<a href="{{ $company->website }}">{{ $company->website }}</a> <br>
	      		{{ $company->industry->name }} <br>
	      		{{ $company->companySize->lower_limit.' - '.$company->companySize->upper_limit }} people <br>
	      		{{ $company->location->name.', '.$company->location->country->name }}
	      	</div>
	      	<div class="col-md-4">
	      		<h4 class="no-mobile">Contacts</h4>


	      		@if(isset(Auth::user()->id))
	      		<p>
	      			{{ $company->user->employer->address  }}
	      		</p>
	      		<p>
	      			{{ $company->user->employer->company_phone }} <br>
	      			{{ $company->user->employer->company_email }} <br>
	      		</p>
	      		@else
	      		<p>
	      			Login to view contact details. <br>
	      			<a href="/login">login</a>
	      		</p>
	      		@endif
	      	</div>

	      	
	      	
	      </div>

	      <div class="row">
	      	<div class="col-md-6 col-md-offset-3" style="text-align: center;">
	      		<img src="{{ asset($company->coverUrl) }}" style="width: 100%">
	      		<br>
	      		<b>{{ $company->tagline }}</b><br>
	      	</div>
	      	
	      </div>

	      <div class="row" >
	      	<br>
	      	<?php echo $company->about; ?>
	      </div>

	      <hr>

	      @if(count($company->activePosts) > 0)
	      <div >
	      	<h3>{{ $company->name }}  Vacancies</h3>
	      	<div class="row">
	      		@foreach($company->activePosts as $post)
	      		<div class="col-md-3 hover-bottom" style="text-align: center;">
	      			<a href="/vacancies/{{ $post->slug }}" style="text-decoration: none;">
	      			<h5>{{ $post->title }}</h5>
	      			<img src="{{ asset($post->imageUrl) }}" style="width: 100%">
	      			</a>
	      			@if(isset(Auth::user()->id))
	      			{{ $post->monthlySalary() }}

	      			@else
	      			<i>login to apply</i>
	      			@endif
	      		</div>

	      		@endforeach
	      	</div>
	      </div>
	      @else
	      <div>
	      	<p>No vacancies available</p>
	      </div>
	      @endif


	      
	   </div>
	   <div class="col-md-4">
	   	  @include('left-bar')
	   	  
	 </div>
	   <div class="clearfix"> </div>
	 </div>
</div>

@endsection
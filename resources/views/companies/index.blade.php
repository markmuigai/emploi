@extends('layouts.seek')

@section('title','Emploi :: Companies')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@include('seekers.search-input')

<div class="container">
    <div class="single">  
	   
	 <div class="col-md-8 single_right">
	      <h3>
	      	<i class="fa fa-arrow-left" title="View Vacancies" onclick="window.location='/vacancies'"></i>
	      	Companies on Emploi

	      	<a href="/vacancies" class="pull-right" style="text-decoration: none;" title="Vacancies">
	      		<i class="fa fa-briefcase"></i>
	      		<span class="no-mobile">
	      			Vacancies
	      		</span>
	      		
	      	</a>
	      	
	      </h3>
	      <div class="row_1">
	      	
	      	<div class="clearfix"> </div>
	      </div>

	      <div class="row">
	      	@forelse($companies as $c)
	      	<div class="col-md-4 col-xs-6 hover-bottom">
	      		<img src="{{ asset($c->logoUrl) }}" style="width: 70%; margin-left: 15%">
	      		<p>
	      			<a href="/companies/{{ $c->name }}" style="font-weight: bold">
	      			{{ $c->name }} 
	      			</a>
	      			<span class="pull-right">
	      				{{ count($c->activePosts) }} vacancies
	      			</span>
	      			<br>
	      			{{ $c->staff }}
	      			
	      		</p>
	      	</div>
	      	@empty
	      	<p>
	      		No companies have been found. Check back later.
	      	</p>
	      	@endforelse
	      </div>

	      <div>
	      	{{ $companies->links() }}
	      </div>
	      	


	      
	   </div>
	   <div class="col-md-4">
	   	  @include('left-bar')
	   	  
	 </div>
	   <div class="clearfix"> </div>
	 </div>
</div>

@endsection
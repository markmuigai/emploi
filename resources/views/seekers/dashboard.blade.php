@extends('layouts.seek')

@section('title','Emploi :: Job Seeker Dashboard')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')

<div class="container">
    <div class="single">  
	   
	 <div class="col-md-8 single_right">
	      <h3>
	      	Dashboard
	      	<a href="/profile" class="pull-right" style="text-decoration: none;">
	      		<i class="fa fa-user "></i>  <span class="no-mobile">Profile</span>
	      	</a>   	
	      </h3>

	      <div class="row" id="feeds">
	      	@forelse($posts as $p)
	      	<div class="col-md-8 col-md-offset-2 row hover-bottom" style="margin-bottom: 0.5em">
	      		<div class="col-md-5 col-xs-5">
    				<img src="{{ asset($p->imageUrl) }}" style="width: 100%">
    				<p>{{ $p->monthlySalary() }}</p>
    			</div>
    			<div class="col-md-7 col-xs-7" style="text-align: center">
    				<br class="no-mobile">
    				<br class="no-mobile">
    				<h4 style="font-weight: bold">{{ $p->title }}</h4>
    				<p>
    					<b>
    						<a href="/companies/{{ $p->company->name }}">
    							{{ $p->company->name }}
    						</a>
    					</b>
    					<br>
    					{{ $p->vacancyType->name }} 
    					in {{ $p->location->name }}, 
    					{{ $p->location->country->code }}
    					<br><br>
    					
    					<a href="/vacancies/{{ $p->slug }}" class="btn btn-sm btn-primary">view listing</a>
    				</p>
    			</div>
	      	</div>
	      	@empty
	      	@endforelse

	      	@forelse($blogs as $b)
	      	<div class="col-md-8 col-md-offset-2 row hover-bottom" style="margin-bottom: 0.5em">
	      		
    			<div class="col-md-7 col-xs-7" style="text-align: center">
    				<br class="no-mobile">
    				<br class="no-mobile">
    				<h4 style="font-weight: bold">{{ $b->title }}</h4>
    				<p>
    					<b>
    						<a href="/blog/{{ $b->category->slug }}">
    							{{ $b->category->name }}
    						</a>
    					</b>
    					<br>
    					
    					<br><br>
    					
    					<a href="/blog/{{ $b->slug }}" class="btn btn-sm btn-primary">read blog</a>
    				</p>
    			</div>
    			<div class="col-md-5 col-xs-5">
    				<a href="/blog/{{ $b->slug }}" class="">
    					<img src="{{ asset($b->imageUrl) }}" style="width: 100%">
    				</a>
    				
    			</div>
	      	</div>
	      	@empty
	      	@endforelse
	      </div>
	      

	      

	      


	      
	   </div>
	   <div class="col-md-4">
	   	  @include('left-bar')
	   	  
	 </div>
	   <div class="clearfix"> </div>
	 </div>
</div>

<!-- <script type="text/javascript" src="/js/seekers-dashboard.js"></script> -->

@endsection
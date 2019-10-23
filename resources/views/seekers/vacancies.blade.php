@extends('layouts.seek')

@section('title','Emploi :: Vacancies')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')

<div class="container">
    <div class="single">  
	   <div class="col-md-9 single_right">
	      <div class="but_list">
	       <div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
		
		<div id="myTabContent" class="tab-content">
			<h3 style="border-bottom: 0.1em solid black; padding-bottom: 0.5em">
				{{ $title }}
				<a href="#search-input" class="fa fa-search pull-right" style="text-decoration: none;"></a>
			</h3>
		  <div role="tabpanel" class="tab-pane fade in active" id="home" aria-labelledby="home-tab">
		    @forelse($posts as $post)
		    <div class="tab_grid">
			    <div class="jobs-item with-thumb">
				    <div class="col-md-3 col-sm-6">
				    	<?php 
			      			$img = $post->image == 'unknown.png' ? 'images/a1.jpg' : $post->image;
			      			if($img == '')
			      				$img = 'images/a1.jpg';
			      		?>
				    	<a href="/vacancies/{{$post->slug}}/"><img src="{{ asset($img) }}" class="img-responsive" alt="" style="width: 90%; margin: 0 5%" /></a>
				    </div>
				    <div class="col-md-9 col-sm-6">
						
						<div class="date_desc">
							<h6 class="title" style="margin: 0.5em 0">
								<a href="/vacancies/{{$post->slug}}/">
									{{ $post->title }}
								</a>
								<big>
								<span class="pull-right" style="display: none">
									<a href="#" class="fa fa-share" style="text-decoration: none;"></a>
									<a href="#" class="fa fa-star" style="text-decoration: none;"></a>
									<a href="#" class="fa fa-link" title="Copy Link" style="text-decoration: none;"></a>
								</span>
								<small class="pull-right">
									@if(isset(Auth::user()->id))
										{{ $post->location->country->currency }} {{ $post->monthly_salary }}
									@else
										login to view salary 
									@endif
								</small>
								</big>
							</h6>
						  <span class="meta">
						  		@if(isset(Auth::user()->id))
						  		{{ $post->company->name }}, 
						  		@endif
						  		{{ $post->company->location->name }}
						  		<span class="pull-right" style="margin-right: 0.5em">
						  			<i>
						  				{{ $post->since }}
						  			</i>
						  		</span>
						  </span>
						</div>
						<div class="clearfix"> </div>
						
						<p>
							{{ $post->brief }}
							<br>
							<i>Apply within <b><?php echo \Carbon\Carbon::createFromTimeStamp(strtotime($post->deadline))->diffForHumans() ?></b> </i>
							<a href="/vacancies/{{$post->slug}}/" class="btn btn-sm read-more">Read More</a>
							<a href="/vacancies/{{$post->slug}}/apply" class="btn btn-sm btn-success pull-right" style="color: white">Apply</a>
						</p>
                    </div>
					<div class="clearfix"> </div>
				</div>
			 </div>
			@empty
			<div>
				No vacancies match your criteria. <br><br>
				Advertising a job vacancy? Click here <a href="/employers/publish">here</a>.
			</div>
			@endforelse
			 
		  </div>
		  
	  </div>
     </div>
    </div>
    @if(!isset($noLinks))
    {{ $posts->render() }}
    @endif
    <ul class="pagination jobs_pagination" style="display: none;">

		<li class="disabled"><a href="#" aria-label="Previous"><span aria-hidden="true">«</span></a></li>
		<li class="active"><a href="#">1 <span class="sr-only">(current)</span></a></li>
		<li><a href="#">2</a></li>
		<li><a href="#">3</a></li>
		<li><a href="#">4</a></li>
		<li><a href="#">5</a></li>
		<li><a href="#" aria-label="Next"><span aria-hidden="true">»</span></a></li>
	</ul>
   </div>
   <div class="col-md-3">
	   	  <div class="widget_search">
			<h3>Search</h3>
			<form class="widget-content" method="get" action="/vacancies/search">
				<span>I'm looking for a ...</span>
                <select class="form-control jb_1" name="vacancyType">
                	<option value="">All Vacancies</option>
                	@foreach($vacancyTypes as $v)
                	
					<option value="{{ $v->id }}">{{ $v->name }}</option>
					@endforeach
				</select>
				<select class="form-control jb_1" name="industry">
					<option value="">All Industries</option>
                	@foreach($industries as $i)
					<option value="{{ $i->id }}">{{ $i->name }}</option>
					@endforeach
				</select>
                <span>in</span>
                <select class="form-control jb_1" name="location">
                	<option value="">All Locations</option>
                	@foreach($locations as $l)
					<option value="{{ $l->id }}">{{ $l->name }}, {{ $l->country->code }}</option>
					@endforeach
				</select>
                <input type="text" class="form-control jb_2" id="search-input" name="q" placeholder="Search here">
                <input type="submit" class="btn btn-default" value="Search">
			</form>
		  </div>
	   	  <div class="col_3">
	   	  	@include('components.today-jobs')
	   	  	
	   	  </div>
	   </div>
  <div class="clearfix"> </div>
 </div>
</div>
@endsection
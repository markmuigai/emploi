@extends('layouts.seek')

@section('title','Emploi :: Dashboard')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')

<div class="container">
    <div class="single">  
        <div class="col-sm-9 follow_left row">
			<h3>
				<i class="fa fa-arrow-left" title="Show Dashboard" onclick="window.location='/employers/dashboard'"></i>
				{{ $shortlist==true ? 'Shortlist '.$post->title : $post->title.' Applications' }}
            	<small>[{{ $post->status }}]</small>
            	
        	</h3>
        	<?php $pool = $shortlist ? $post->shortlisted: $post->applications; $kk=0; ?>
        	@forelse($pool as $a)
            <div class="jobs_follow jobs-single-item col-md-8 col-md-offset-2">
				<div class="thumb">
					<img src="{{ asset($a->user->getPublicAvatarUrl()) }}" class="img-responsive" alt=""/>
				</div>
				<div class="thumb_right">
					<div class="date" style="display: none">
							30 <span>Jul</span>
					</div>
					<h6 class="title">
						<a href="#">{{ $a->user->name }}</a>
						
					</h6>
					<span class="meta">{{ $a->user->seeker->location->name }}, 
						{{ $a->user->seeker->location->country->name }}</span>
					<ul class="top-btns">
						<li>
							<a href="#" class="btn_1 fa fa-star-o icon_2"></a>
						</li>
					</ul>
					<p>{{ $a->user->seeker->industry->name }}
						<a href="/employers/applications/{{ $post->slug }}/{{ $a->id }}/rsi">
							<span style="float: right; color: #500095; font-weight: bold">RSI {{ $a->user->seeker->getRsi($post) }}%</span>
						</a>
					</p>
					<p>
						@if($a->user->seeker->gender == 'M')
						Male
						@elseif($a->user->seeker->gender == 'F')
						Female
						@else
						Other
						@endif
					</p>
	                <hr>
	                <a href="#" class="btn btn-default pull-left" data-toggle="modal" data-target="#applyModal{{$kk}}">View Actions</a>
		         
					<!-- Modal -->
					<div class="modal fade" id="applyModal{{$kk}}" tabindex="-1" role="dialog" aria-labelledby="applyModalLabel" aria-hidden="true">
					  	<div class="modal-dialog">
					    	<div class="modal-content">
						      	<div class="modal-header">
						        	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
						        	<h4 class="modal-title" id="myModalLabel">Actions for {{ $a->user->name }}</h4>
						      	</div>
		                        <div class="modal-body row">
		                        	<div class="col-md-3 col-sm-3  col-xs-3">
		                        		<img src="{{ asset($a->user->getPublicAvatarUrl()) }}" class="img-responsive" alt="" style="width: 100%" />
		                        	</div>
		                        	<div class="col-md-9 col-sm-9 col-xs-9">
		                        		Applied on: {{ $a->created_at }} <br>
							           Shortlisted: 
							           @if(!$post->isShortlisted($a->user->seeker))
							           		No
				        				<a href="/employers/shortlist-toggle/{{ $post->slug }}/{{ $a->user->username }}" class="btn btn-sm btn-link">Add</a>
				        				@else
				        				Yes
				        				<a href="/employers/shortlist-toggle/{{ $post->slug }}/{{ $a->user->username }}" class="btn btn-sm btn-link">Remove</a>
				        				@endif 
				        				<br>
				        				RSI: 
				        				<a href="/employers/applications/{{ $post->slug }}/{{ $a->id }}/rsi">
			                                <b>RSI {{ $a->user->seeker->getRsi($post) }}% </b>
			                            </a> 
			                            <br>
			                            Profile: <a href="/employers/browse/{{ $a->user->username }}" class="btn btn-sm btn-link" style=""><i class="fa fa-user"></i> View</a>
			                            <br>
			                            <i class="fa fa-file-o"></i> Cover Letter : <a href="/employers/applications/{{ $post->slug }}/{{ $a->id }}/cover" class="btn btn-sm btn-link">view</a> 
		                        	</div>
						           
						      	</div>
					    	</div>
					  	</div>
					</div>
		            <ul class="social-icons pull-right" style="display: none">
						<li><span>Share : </span></li>
						<li><a href="#" class="fa fa-facebook" target="_blank"></a></li>
						<li><a href="#" class="fa fa-twitter" target="_blank"></a></li>
						<li><a href="#" class="fa fa-google-plus" target="_blank"></a></li>
					</ul>
					<div class="clearfix"> </div>
			    </div>
			   <div class="clearfix"> </div>
		   	</div>
		   	<?php $kk++; ?>
		   	@empty
		   	<div style="text-align: center;">
		   		No applications have been found
		   	</div>
		   	@endforelse
		   
	    </div>
		<div class="col-sm-3">
			<h4 class="m_1" style="text-align: center;">Actions</h4>
			<p style="text-align: center;">
				@if(!$shortlist)
		        	<a href="/employers/applications/{{ $post->slug }}?shortlist=true" style=";" class="btn btn-sm btn-info" title="Click to view Shortlist">
		        		Showing Applications ({{ count($post->applications) }})
		        	</a>
	        	@else
		        	<a href="/employers/applications/{{ $post->slug }}" style="" class="btn btn-sm btn-info" title="Click to view All Applications">
		        		Showing Shortlist({{ count($post->shortlisted) }})
		        	</a>
	            @endif
	            <BR><br>
		        <a href="/employers/applications/{{ $post->slug }}/rsi" class="btn btn-sm btn-danger">
	                
	                @if(!$post->hasModelSeeker())
	                <i class="fa fa-warning"  title="RSI Model Not Created"></i>
	                @else
	                <i class="fa fa-check" title=""></i>
	                @endif
	                Configure RSI Model
	                
	            </a>
	            <br><br>
	            @if($post->status == 'active')
	            <a href="/employers/applications/{{ $post->slug }}/invite" class="btn btn-success btn-sm"><i class="fa fa-share"></i> Invite Candidates</a>
	            <br><br>
	            <a href="/employers/applications/{{ $post->slug }}/close" class="btn btn-info btn-sm"> <i class="fa fa-users"></i> Select Candidates</a>
	            @endif
			</p>

			@if(count($post->shortlisted) > 0)
				<br><br>
				<h4 class="m_1">Shortlisted Candidates</h4>
				@forelse($post->shortlisted as $a)
				<p style="padding: 0.5em 0">
					{{ $a->user->name }} | <span style="float: right;">
						| 
						<a href="/employers/applications/{{ $post->slug }}/{{ $a->id }}/rsi">
							{{ $a->user->seeker->getRsi($post) }}%
						</a>
					</span>
				</p>
				@empty
				@endforelse
			@else
				
			@endif

			

			@if(count($post->applications) > 0)
				<br><br>
				<h4 class="m_1">All Applications</h4>
				@forelse($post->applications as $a)
				<p style="padding: 0.5em 0">
					{{ $a->user->name }} 
					<span style="float: right;">
						| 
						<a href="/employers/applications/{{ $post->slug }}/{{ $a->id }}/rsi">
						{{ $a->user->seeker->getRsi($post) }}%
						</a>
					</span>
				</p>
				@empty
				@endforelse
			@else
				
			@endif

			



		</div>
		<div class="clearfix"> </div>
	</div>
</div>

@endsection
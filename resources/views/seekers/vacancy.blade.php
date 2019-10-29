@extends('layouts.seek')

@section('title','Emploi :: '.$post->title)

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@include('seekers.search-input')
<style type="text/css">
	.fa-s {
		font-size: 150%;
		margin: 0.5em 1em;
		border-radius: 50%;
		opacity: 0.7;
	}
	.fa-s:hover {
		opacity: 1.0
	}
</style>
<div class="container">
    <div class="single">  
	   
	 <div class="col-md-8 single_right">
	      <h3>
	      	{{ $post->title }} 
	      	<a href="
	      	{{ $post->how_to_apply != '' ? '#how-to-apply' : '/vacancies/'.$post->slug.'/apply' }}" class="btn btn-sm btn-success pull-right">apply</a>

	      	<a href="#share-links" class="btn btn-sm btn-primary pull-right hidden">share</a>
	      	<br><br>
	      	<div style="font-size: 60%">
	      		<b>{{ $post->since }}</b>
	      		<i class="pull-right">Apply within <b><?php echo \Carbon\Carbon::createFromTimeStamp(strtotime($post->deadline))->diffForHumans() ?></b></i>
	      	</div>
	      </h3>
	      <div class="row_1">
	      	<div class="col-sm-5 single_img">
	      		<img src="{{ asset($post->imageUrl) }}" class="img-responsive" alt="{{ $post->title }}" style="width: 100%" />
	      	</div>
	      	<div class="col-sm-7 single-para">
	      		<p>
	      			Position: <b>{{ $post->vacancyType->name }}</b> <br>
	      			Company: <b>
	      				<a href="/companies/{{ $post->company->name }}">{{ $post->company->name }}</a>

	      				</b><br>
	      			Location: <b>{{ $post->location->name }}, {{ $post->location->country->name }}</b><br>
	      			Apply by: <b>{{ $post->deadline }}</b><br>
	      			Education: <b>{{ $post->educationLevel->name }}, {{ $post->industry->name }}</b><br>
	      			Experience: <b>{{ $post->experience_requirements }}</b> <br>
	      			Salary: <b>{{ isset(Auth::user()->id) ? '~ '.$post->location->country->currency.' '.$post->monthly_salary.' p.m.' : 'Login to view' }}</b>
	      			<br>
	      			No of positions: <b>{{ $post->positions }}</b>

	      		</p>
	      		
	      		
	      	</div>
	      	<div class="clearfix"> </div>
	      	<br>
	      	<div>
	      		<b>About {{ isset(Auth::user()->id) ? $post->company->name : ' the Company' }}</b>
	      		<p><?php echo $post->company->about; ?></p>
	      	</div>
	      	<div class="clearfix"> </div>
	      </div>
	      
	      <div>
	      	<?php echo $post->responsibilities; ?>

	      </div>

	      	<h5>How to Apply</h5>
	      	@if(isset(Auth::user()->id))
	      	<div id="how-to-apply">
				@if($post->how_to_apply != '')
					<?php  echo $post->how_to_apply; ?>
				@else
					<p>
						Click <a href="/vacancies/{{ $post->slug }}/apply">here</a> to apply for this position.
					</p>
				@endif

			</div>
	      	@else
	      	<div>
				<a href="/login">Login</a> or <a href="/register">register</a> to view application procedures
			</div>
	      	@endif

	      	<h5 id="share-links">
	      		Share this position
	      	</h5>
	      	<div class="social">    
                <a class="btn_1" href="http://www.facebook.com/sharer.php?u={{ url('/vacancies/'.$post->slug) }}" target="_blank">
                    <i class="fa fa-facebook fb"></i>
                    <span class="share1 fb">Share</span>                                
                </a>
                <a class="btn_1" href="https://twitter.com/share?url={{ url('/vacancies/'.$post->slug) }}&amp;text={{ urlencode($post->title) }}&amp;hashtags=Emploi{{ $post->location->country->code }}" target="_blank">
                    <i class="fa fa-twitter tw"></i>
                    <span class="share1">Tweet</span>                               
                </a>
                <a class="btn_1" href="http://www.linkedin.com/shareArticle?mini=true&amp;url={{ url('/vacancies/'.$post->slug) }}" target="_blank">
                    <i class="fa fa-linkedin fb"></i>
                    <span class="share1 fb">Share</span>
                </a>
           </div>
			
	      
	      <div class="comments" style="display: none;">
	      	<h6>Comments</h6>
			<div class="media media_1">
			  <div class="media-left"><a href="#"> </a></div>
			  <div class="media-body">
			    <h4 class="media-heading"><a class="author" href="#">Sollicitudin</a><a class="reply" href="#">Reply</a><div class="clearfix"> </div></h4>
			    Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
			  </div>
			  <div class="clearfix"> </div>
			</div>
			<div class="media">
			  <div class="media-left"><a href="#"> </a></div>
			  <div class="media-body">
			    <h4 class="media-heading"><a class="author" href="#">Sollicitudin</a><a class="reply" href="#">Reply</a><div class="clearfix"> </div></h4>
			    Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
			  </div>
			</div>
		  </div>
		  <form style="display: none;">
			<div class="to">
             	<input type="text" class="text" value="Name" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Name';}">
			 	<input type="text" class="text" value="Email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email';}" style="margin-left:3%">
			</div>
			<div class="text">
               <textarea value="Message" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Message';}">Message</textarea>
            </div>
            <div class="form-submit1">
	           <input name="submit" type="submit" id="submit" value="Submit"><br>
	        </div>
			<div class="clearfix"></div>
          </form>
	   </div>
	   <div class="col-md-4">
	   	  @include('left-bar')
	   	  
	 </div>
	   <div class="clearfix"> </div>
	 </div>
</div>
@endsection
@extends('layouts.seek')

@section('title','Emploi :: Apply '.$post->title)

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@include('seekers.search-input')

<div class="container">
    <div class="single">  
	   
	 <div class="col-md-8 single_right">
	      <h3>
	      	Apply {{ $post->title }} 
	      	<a href="/vacancies/{{ $post->slug }}" class="btn btn-sm btn-success pull-right">view job</a>

	      	<a href="#share-links" class="btn btn-sm btn-primary pull-right">share</a>
	      	<br>
	      	<small><b>{{ $post->since }}</b></small>
	      </h3>
	      <div class="row_1">
	      	<div class="col-sm-5 single_img">
	      		<?php $img = $post->image == 'unknown.png' ? 'images/a1.jpg' : $post->image ?>
	      		<img src="{{ asset($post->imageUrl) }}" class="img-responsive" alt="{{ $post->title }}" style="width: 100%" />
	      	</div>
	      	<div class="col-sm-7 single-para">
	      		<p>
	      			Position: <b>{{ $post->vacancyType->name }}</b> <br>
	      			Company: <b>{{ isset(Auth::user()->id) ? $post->company->name : 'Login to view' }}</b><br>
	      			Location: <b>{{ $post->location->name }}, {{ $post->location->country->name }}</b><br>
	      			Apply by: <b>{{ $post->deadline }}</b><br>
	      			Education: <b>{{ $post->education_requirements }}, {{ $post->industry->name }}</b><br>
	      			Experience: <b>{{ $post->experience_requirements }}</b> <br>
	      			Salary: <b>{{ isset(Auth::user()->id) ? '~ '.$post->location->country->currency.' '.$post->monthly_salary.' p.m.' : 'Login to view' }}</b>
	      			<br>
	      			No of positions: <b>{{ $post->positions }}</b>

	      		</p>
	      		
	      		
	      	</div>
	      	<div class="clearfix"> </div>
	      	<br>
	      	<div>
	      		<b>Application for {{ $post->title }}</b>
	      	</div>
	      	<div class="clearfix"> </div>
	      </div>
	      
	      <form method="post" action="/vacancies/{{ $post->slug }}/apply">
	      	@csrf
	      	<p>
	      		<label>Cover Letter:</label>
	      		<textarea class="form-control" name="cover" rows="5" id="cover" placeholder="Compose cover letter" required="required"></textarea>
	      	</p>

	      	<p>
	      		<input type="checkbox" checked="" name="follow"> Follow {{ $post->company->name }}
	      	</p>

	      	<p>
	      		<input type="submit" name="" value="Submit Application" class="btn btn-danger">
	      	</p>

	      	<p>
	      		<i>Your profile and resume will be made available to {{ $post->company->name }}. <a href="/profile/edit" class="btn btn-link">Edit my profile</a></i>
	      	</p>


	      	

	      </form>

	      	
			
	      
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
<script type="text/javascript" src="{{ asset('ckeditor/ckeditor.js') }}"></script>
<script>
    setTimeout(function(){

        CKEDITOR.replace('cover');

    },3000);
    
</script>

@endsection
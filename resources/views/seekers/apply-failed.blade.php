@extends('layouts.seek')

@section('title','Emploi :: Application Failed')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@include('seekers.search-input')
<div class="container">
    <div class="single">  
	   <div class="col-md-4">
	   	  @include('left-bar')
	   	  
	 </div>
	 <div class="col-md-8 single_right">
	      <h3>
	      	<a href="/vacancies/{{ $post->slug }}" style="text-decoration: none;">
	      		{{ $post->title }} 
	      	</a>
	      	

	      	<a href="#share-links" class="btn btn-sm btn-primary pull-right">share</a>
	      	<br>
	      	<small><b>{{ $post->since }}</b></small>
	      </h3>
	      <div class="row_1">
	      	
	      	<div class="clearfix"> </div>
	      </div>
	      
	      <div>
	      	Application for {{ $post->title }} failed. Please try again in a few moments. <br>If the issue persists, please <a href="/contact">contact us</a> for assistance.

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
	   <div class="clearfix"> </div>
	 </div>
</div>



@endsection
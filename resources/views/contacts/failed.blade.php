@extends('layouts.seek')

@section('title','Emploi :: Contact Failed')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@include('seekers.search-input')

<div class="container">
    <div class="single">  
	   <div class="contact_top">
	   	 <h2>Contact Failed</h2>
	     
          <div class="row" style="">
	   	   <div class="addr" style="text-align: center;">
                <p class="secondary3">
                    An error occured that resulted in failure while submitting your message.
                    <br>
                    Please try again later or contact us through other chanels. 
               	</p>

               	<p>
               		<a href="/contact" class="btn btn-sm btn-primary">Contact Us</a>
               		<a href="mailto:info@emploi.co" class="btn btn-sm btn-success">Email us</a>
               	</p>
                
           </div>
          </div>
          <div class="clearfix"> </div>
	   </div>
	   
    </div>
</div>

@endsection
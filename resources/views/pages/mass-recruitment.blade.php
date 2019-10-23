@extends('layouts.seek')

@section('title','Emploi :: Mass Recruitment')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@include('seekers.search-input')

<div class="container">
    <div class="single">  
	   <div class="contact_top">
	   	 <h2>Mass Recruitment</h2>
	     
          <div class="row" style="">
	   	   <div class="addr row" style="text-align: center;">
		   	   	<div class="col-md-3 col-md-offset-1">
		   	   		<img src="/images/mass-recruitment.jpg" style="width: 100%">
		   	   	</div>
	   	   		
		   	   	<p class=" col-md-7">
		   	   		We offer top-notch mass recruitment tools that will come in handy for employers both in local market and abroad. We have supplied large numbers of skilled and semi-skilled labour to organizations in the hospitality sector, agricultural and manufacturing sectors.
		   	   	</p>
                <p class="secondary3 col-md-7" style="margin-top: 1em">
                    
                    Are you looking to recruit multiple positions within a short time? With a turn around time of 2-4 days, our mass recruitment service would guarantee you quality affordable candidates who will fit into your organization's culture.
               	</p>

               	<p class=" col-md-8 col-md-offset-2">
               		<a href="/contact" class="btn btn-sm btn-primary">
               			<i class="fa fa-phone"></i>
               		Contact Us</a>
               		<a href="mailto:info@emploi.co" class="btn btn-sm btn-success">
               			<i class="fa fa-envelope"></i> Email us</a>

               	</p>
                
           </div>
          </div>
          <div class="clearfix"> </div>
	   </div>
	   
    </div>
</div>

@endsection
@extends('layouts.seek')

@section('title','Emploi :: Job Seeker Profile Incomplete')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@include('seekers.search-input')
<div class="container">
    <div class="single">  
	   <div class="contact_top">
	   	 <h2>Update your profile</h2>
	     
          <div class="row" style="">
	   	   <div class="addr">
                
                

				
				<div class="row">
					<div class="col-md-6 col-md-offset-3" style="text-align: center;">
						Hi {{ Auth::user()->name }},<br><br>
						Your profile has not been updated. Please edit your profile and include experience and education background first before applying for jobs or adding referees.
						 <br><br>
						<a href="#" class="btn btn-danger" onclick="window.history.back()">Back</a>
						<a href="/profile/edit" class="btn btn-success">Edit Profile</a>
					</div>
				</div>
				<p>
					
				</p>
				
				
				
                
           </div>
          </div>
          <div class="clearfix"> </div>
	   </div>
	   
    </div>
</div>
@endsection
@extends('layouts.seek')

@section('title','Emploi :: Contact Sent')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@include('seekers.search-input')

<div class="container">
    <div class="single">  
	   <div class="contact_top">
	   	 <h2>Contact Success</h2>
	     
          <div class="row" style="">
	   	   <div class="addr" style="text-align: center;">
                <p class="secondary3">
                    Your message has been sent succesfully.<br>
                    Here is your tracking code: <b>{{ $code }}</b> <br><br>
                    Thank you for choosing Emploi.
               	</p>

               	<p>
                  @if(isset(Auth::user()->id))
                    <a href="/home" class="btn btn-sm btn-primary">Home</a>
                  @else
                    <a href="/employers/register" class="btn btn-sm btn-primary">Employer Registration</a>
                    <a href="/employers/register" class="btn btn-sm btn-success">Job Seeker Registration</a>
                    <a href="/employers/register" class="btn btn-sm btn-danger">Login</a>
                  @endif
               		
               	</p>
                
           </div>
          </div>
          <div class="clearfix"> </div>
	   </div>
	   
    </div>
</div>

@endsection
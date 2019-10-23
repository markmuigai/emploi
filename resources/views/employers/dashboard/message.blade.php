@extends('layouts.seek')

@section('title','Emploi :: '.$title)

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
<div class="container">
    <div class="single">  
	   <div class="contact_top">
	   	 <h2>{{ $title }}</h2>
	     
          <div class="row" style="">
	   	   <div class="addr">
                
                

				
				<div class="row">
					<div class="col-md-6 col-md-offset-3" style="text-align: center;">
						{{ $message }}
						 <br>
						<a href="#"  onclick="window.history.back()" class="btn btn-danger">Back</a>
						<a href="/employers/dashboard" class="btn btn-success">Home</a>
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
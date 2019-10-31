@extends('layouts.seek')

@section('title','Emploi :: Referee Requested')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
<div class="container">
    <div class="single">  
	   <div class="contact_top">
	   	 <h2>{{ $app->user->name }}'s Referee Requested</h2>
	     
          <div class="row" style="">
	   	   <div class="addr col-md-8 col-md-offset-2" style="text-align: center;">
                
                <p>
                	Success. {{ $app->user->name }} has been informed to provide details on their referees. You will be notified once updated. <br><br>
                	<a class="btn btn-danger" href="/employers/applications/{{ $app->post->slug }}/{{ $app->id }}/rsi/referees">View Referees</a>
                </p>
				
				
                
           </div>
          </div>
          <div class="clearfix"> </div>
	   </div>
	   
    </div>
</div>

@endsection
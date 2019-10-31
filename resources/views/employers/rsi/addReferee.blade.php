@extends('layouts.seek')

@section('title','Emploi :: Add '.$app->user->name."'s Referee")

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
<div class="container">
    <div class="single">  
	   <div class="contact_top">
	   	 <h2>Add {{ $app->user->name }}'s Referee</h2>
	     
          <div class="row" style="">
	   	   <div class="addr col-md-8 col-md-offset-2" style="text-align: center;">
                
                <p>
                	Request {{ $app->user->name }} to include referees by sending them an online form to fill. <br>
                	An e-mail will be sent to {{ $app->user->name }} with instructions. <br><br>
                	<a class="btn btn-info" href="/employers/applications/{{ $app->post->slug }}/{{ $app->id }}/rsi/referees/request">Send request</a>
                </p>

				
				<div class="row">
					<div class="col-md-6 col-md-offset-3" style="text-align: center;">
					
						 <br><br><br>
						<a href="/employers/applications/{{ $app->post->slug }}/{{ $app->id }}/rsi" class="btn btn-success btn-sm">View RSI</a>
						<a href="/employers/applications/{{ $app->post->slug }}/{{ $app->id }}/rsi/referees" class="btn btn-primary btn-sm">View Referees</a>
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
@extends('layouts.seek')

@section('title','Emploi :: Role Suitability Index')

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
	 	<h3>Role Suitability Index (RSI)</h3>

	 	<p>
	 		The RSI is an important <b>tool for employers to evaluate a candidate's abilities</b> by measuring the candidates strengths and weaknesses. It encompases Education Background, Employment Background, Interviews, Background Checks, IQ Tests, Psychometric Tests, Skills check amongst others.
	 	</p>


	 	<p>
	 		To use the RSI, <a href="/employers/register">create an employer profile</a> or <a href="/employers/dashboard">open the dashboard</a>. Create a job advertisement and model your ideal job seeker and rank applicants using the RSI Tool.
	 	</p>
		
		<p>
			<b><i class="fa fa-info"></i> NOTE</b> Your job post has to be approved for you to receive applications.
		</p>
		

     </div>
     <div class="clearfix"> </div>
 </div>
</div>
@endsection
@extends('layouts.seek')

@section('title','Emploi :: Admin Panel')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')

<div class="container">
    <div class="single">  
	   
	 <div class="">
	    <h3 style="text-align: center;">
	    	Companies
	    	<small>
	    		[{{ $admin->jurisdictions[0]->country->name }}]
	    	</small>
	    	
	   	</h3>	


	   	<p style="text-align: center;">

	   		
	   		
	   	</p>

	   	<p style="text-align: center;">
	   		<br><br>
	   		<a href="/home" class="btn btn-sm btn-link">Admin Panel</a>
	   	</p>

	   	
	    
     </div>
     <div class="clearfix"> </div>
 </div>
</div>

@endsection
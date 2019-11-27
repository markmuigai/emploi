@extends('layouts.seek')

@section('title','Emploi :: Admin CV Requests')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')

<div class="container">
    <div class="single">  
	   
	 <div class="row">
	    <h3 style="text-align: center;">
	    	<a href="/admin/panel"><i class="fa fa-arrow-left"></i></a>
	    	CV Requests
	    	
	    	
	   	</h3>	


	   	@forelse($cvRequests as $r)

	   	<div style="text-align: center;" class="hover-bottom col-md-6">

	   		<p>
	   			<b>{{ $r->employer->name }}</b> requested for <b> <a href="/admin/seekers/{{ $r->seeker->user->username }}">{{ $r->seeker->user->name }}</a></b>'s CV <br>
	   			on {{ $r->created_at }}
	   		</p>

	   		<br>
	   		

	   		@if($r->status == 'pending')
	   		<form method="get" action="/admin/cv-requests/{{$r->id}}">
	   			<select class="btn btn-sm" name="status">
	   				<option value="accepted">Mark as Accepted</option>
	   				<option value="denied">Mark Denied</option>
	   			</select>
	   			<input type="submit" value="Save" class="btn btn-sm btn-warning">
	   		</form>
	   		@else
	   		<i>{{ $r->status }} on {{ $r->updated_at }}</i>
	   		@endif
	   		
	   	</div>

	   	@empty

	   	<p style="text-align: center;">

	   		No CV Requests have been found
	   		
	   	</p>

	   	@endforelse

	   	<p style="text-align: center;">
	   		{{ $cvRequests->links() }}
	   	</p>

	   	
	    
     </div>
     <div class="clearfix"> </div>
 </div>
</div>

@endsection
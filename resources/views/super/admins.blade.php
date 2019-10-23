@extends('layouts.seek')

@section('title','Emploi :: Super Admin')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')

<div class="container">
    <div class="single">  
	   <div class="col-md-4">
	   	  @include('left-bar')
	   	  
	 </div>
	 <div class="col-md-8 single_right">
	    <h3>
	    	Emploi Administrators
	    	<a href="/desk/create-admin" class="btn btn-sm btn-success pull-right">create</a>
	   	</h3>	

	   	<h4>Active Administrators</h4>

	    @forelse($admins as $admin)

	    <div class="" style="padding: 1em 5% 0 5%">
	    	<hr>
	    	
	    	<b>{{ $admin->name }}</b> {{ '@'.$admin->username }} 
	    	<small class="pull-right">
	    	@foreach($admin->jurisdictions as $j)
	    		{{ $j->country->name }} |
	    	@endforeach
	    	</small>
	    	<br>
	    	<a href="/desk/disable-admin?id={{ $admin->id }}" class="btn btn-sm btn-danger"> disable</a>

	    	
	    	
	    </div>

	    @empty

	    <p>
	    	No administrators found in the database
	    </p>

	    @endforelse

	    <hr>

	    <h4>Inactive Administrators</h4>

	    @forelse($oadmins as $admin)

	    <div class="" style="padding: 1em 5% 0 5%">
	    	<hr>
	    	
	    	<b>{{ $admin->name }}</b> {{ '@'.$admin->username }} 
	    	<small class="pull-right">
	    	@foreach($admin->jurisdictions as $j)
	    		{{ $j->country->name }} |
	    	@endforeach
	    	</small>
	    	<br>
	    	<a href="/desk/edit-admin?id={{ $admin->id }}" class="btn btn-sm btn-primary" style="display: none;"> <i class="fa fa-info"></i> edit</a>
	    	<a href="/desk/enable-admin?id={{ $admin->id }}" class="btn btn-sm btn-success"> enable</a>
	    </div>

	    @empty

	    <p>
	    	No Inactive administrators found in the database
	    </p>

	    @endforelse
	    
     </div>
     <div class="clearfix"> </div>
 </div>
</div>

@endsection
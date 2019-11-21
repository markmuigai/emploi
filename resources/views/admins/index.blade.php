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
	    	Admin panel
	    	<small>
	    		[{{ $admin->jurisdictions[0]->country->name }}]
	    	</small>
	    	
	   	</h3>	


	   	<p style="text-align: center;">

	   		<br>

	   		<a href="/admin/posts" class="btn btn-sm btn-success">Job Posts</a>
	   		<a href="/admin/emails" class="btn btn-sm btn-danger">Send Emails</a>
	   		<a href="/admin/blog" class="btn btn-sm btn-primary">Blog</a>
	   		<a href="/admin/contacts" class="btn btn-sm btn-success">Contacts</a>

	   		<br><br>

	   		<a href="/admin/employers" class="btn btn-sm btn-success">Manage Employers</a>	   		
	   		<a href="/admin/candidate-vetting" class="btn btn-sm btn-danger">Candidate Vetting</a>
	   		<a href="/admin/cv-access"  class="btn btn-sm btn-info">CV Access Requests</a>
	   		<a href="/admin/premium-recruitment"  class="btn btn-sm btn-success">Premium Recruitment</a>

	   		<br><br>

	   		<a href="/admin/cv-editing" class="btn btn-sm btn-success">CV Editing Requests</a>
	   		<a href="/admin/premium-placement" class="btn btn-sm btn-danger">Premium Placement Requests</a>
	   		<a href="/admin/seekers" class="btn btn-sm btn-primary">Job Seekers</a>

	   		<br><br>
	   		<a href="/admin/posts" class="btn btn-sm btn-success">Countries</a>
	   		<a href="/admin/emails" class="btn btn-sm btn-danger">Industries</a>
	   		<a href="/admin/companies" class="btn btn-sm btn-primary">Companies</a>

	   		
	   	</p>

	   	
	    
     </div>
     <div class="clearfix"> </div>
 </div>
</div>

@endsection
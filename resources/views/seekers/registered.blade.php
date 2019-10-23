@extends('layouts.seek')

@section('title','Account Created')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
<div class="banner_1">
    <div class="container">
        <div id="search_wrapper1">
           <div id="search_form" class="clearfix">
            <h1>Start your job search</h1>
            <p>
             <input type="text" class="text" placeholder=" " value="Enter Keyword(s)" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Enter Keyword(s)';}">
             <input type="text" class="text" placeholder=" " value="Location" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Location';}">
             <label class="btn2 btn-2 btn2-1b"><input type="submit" value="Find Jobs"></label>
            </p>
           </div>
        </div>
   </div> 
</div> 
<div class="container">
    <div class="single">  
       <div class="form-container">
        <h2>Account Created</h2>
        
        <div style="text-align: center;">
        	<p>
	        	Your account as a job seeker has been created succesfully.
	        	<br>
	        	Check your e-mail inbox for your password and log in.
	        </p>

	        <br>	

	        <p>
	        	<a href="/profile/edit" class="btn btn-sm btn-success">Update Profile</a>
            <a href="/vacancies" class="btn btn-sm btn-primary">Vacancies</a>
	        </p>
        </div>
        
    
                
    </div>
 </div>
</div>
@endsection
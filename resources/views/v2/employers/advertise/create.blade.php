@extends('v2.layouts.app')

@section('title','Advertise With Us :: Emploi')

@section('content')

<?php
$user = isset(Auth::user()->id) ? Auth::user() : false;
?>

{!! htmlScriptTagJsApi() !!}
    <!-- Navbar -->
    @include('v2.components.jobseeker.navbar')
    <!-- End Navbar -->

    <div class="advertise-form container-fluid ptb-100">
	    <div class="row">   
	        <div class="card shadow-lg col-sm-8 offset-md-2">
	            <div class="card-body">             
	                <h4 class="text-center"> <i class="fa fa-check-circle" style="color: green"></i> Advertise here</h4>
	                <form action="/employers/publish" method="POST">
	                    @csrf
	                    <div class="form-group">
	                        <label for="">Your Name</label>
	                        <input type="text" name="name" value="{{ $user ? $user->name : '' }}" required="" class="form-control" placeholder="" maxlength="50">
	                    </div>
	                    <div class="form-group">
	                        <label for="">Phone Number</label>
	                        <input type="text" name="phone_number" value="" class="form-control" placeholder="" maxlength="50">
	                    </div>
	                    <div class="form-group">
	                        <label for="">Email Address</label>
	                        <input type="email" name="email" value="{{ $user ? $user->email : '' }}" required="" class="form-control" placeholder="" maxlength="50">
	                    </div>
	                    <div class="form-group">
	                        <label for="">Job Title</label>
	                        <input type="text" name="title" maxlength="100" class="form-control" placeholder="">
	                    </div>
	                    <div class="form-group">
	                        <label for="description">Job Description</label>
	                        <textarea name="description" id="description" minlength="20" required="" rows="5" class="form-control"></textarea>
	                    </div>                  
	                    
	                    <div class="g-recaptcha"  id="recaptcha"  data-sitekey="6LdLhckZAAAAAAw00q3_UyaksiGoo7hbyjNcQ1it" class="form-control"  data-callback="enableBtn">                      
	                    </div>
	                    <div class="text-center">                   
	                         <input type="submit" class="btn btn-orange" id="button1" disabled="disabled" value="Submit">
	                    </div>               
	                </form>
	            </div>
	        </div>
	    </div>
	</div>
    
    <div class="container col-sm-8 pb-4">
        <h3 class="orange text-center">Why Choose Us</h3>
        <div class="row">
            <div class="col-md-4">
                <div class="card shadow rounded mb-2">
                    <div class="card-body text-center">
                        <i class="flaticon-verify"></i>
                        <h6>Best Recruitment Tools</h6><br>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card shadow rounded mb-2">
                    <div class="card-body text-center">
                           <i class="flaticon-verify"></i>    
                           <h6>Audience of 100K+</h6><br>
                        </div>
                    </div>
            </div>
            <div class="col-md-4">
                <div class="card shadow rounded mb-2">
                    <div class="card-body text-center">
                        <i class="flaticon-verify"></i>
                        <h6>Best Rates</h6><br>
                    </div>
                </div>
            </div>
        </div>
    </div>

	<script type="text/javascript">
	   function enableBtn(){
	   document.getElementById("button1").disabled = false;
	}
	</script>
@endsection
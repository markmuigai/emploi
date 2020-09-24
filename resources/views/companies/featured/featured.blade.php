@extends('layouts.general-layout')

@section('title','Emploi :: Employer Services')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')

<style type="text/css">
    .blink{
    padding: 10px;  
    color: white;
    text-align: center;
  }
  .span{
    font-size: 28px;
    font-family: cursive;
    color: #E15419;
    animation: blink 1s linear infinite;
  }
  @keyframes blink{
  0%{opacity: 0;}
  50%{opacity: .5;}
  100%{opacity: 1;}
  }
</style>

<div class="container">
    <div class="col-md-12">
      <div class="row">
        	<div class="col-md-6"><br>
        	<h3 class="orange">Featured Company</h3>
    		    <h5>Featured Companies get more views on our platform.</h5>

    		    <ul style="">
    		    	<li>Featured on our main page.</li>
    		    	<li>Featured on one vacancy notification email.</li>
    		    	<li>Vacancies rank top of the list.</li>
    		    </ul>
    		    <a href="/checkout?product=featured_company" class="btn btn-orange">Request</a>
    		    <div class="blink pt-4"><a href="/job-seekers/register-paas" style="text-decoration: none;"><span class="span">Get free one job post for subscribing to this package</span></a></div>		   
    		  </div>

          <div class="col-md-6"><br>
             @include('components.ads.responsive')
          </div>
      </div>              
    </div>
</div>
@endsection
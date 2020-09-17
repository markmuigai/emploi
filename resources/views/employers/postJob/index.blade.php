@extends('layouts.general-layout')

@section('title','Advertise on Emploi')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
<?php
$user = isset(Auth::user()->id) ? Auth::user() : false;
?>

{!! htmlScriptTagJsApi() !!}

<style type="text/css">
    @import url(https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css);
    @import url(https://fonts.googleapis.com/css?family=Raleway:400,500);
    @import url(https://fonts.googleapis.com/css?family=Montserrat:500);
    .snip1214 {
      font-family: 'Raleway', sans-serif;
      color: #000000;
      text-align: center;
      font-size: 18px;
      width: 100%;
      max-width: 1000px;
      margin: 40px 10px;
    }
    .snip1214 .plan {
      margin: 0;
      width: 25%;
      position: relative;
      float: left;
      background-color: #ffffff;
      border: 1px solid rgba(0, 0, 0, 0.1);
    }
    
    .snip1214 .plan-title {
      position: relative;
      top: 0;
      font-weight: 500;
      padding: 5px 15px;
      margin: 0 auto;
      -webkit-transform: translateY(-50%);
      transform: translateY(-50%);
      margin: 0;
      display: inline-block;
      background-color: #301934;
      color: #ffffff;
      text-transform: uppercase;
    }
    .snip1214 .plan-cost {
      padding: 0px 10px 20px;
    }
    .snip1214 .plan-price {
      font-family: 'Montserrat', sans-serif;
      font-weight: 500;
      font-size: 2.0em;
      color:    #808080;
    }
    .snip1214 .plan-type {
      opacity: 0.6;
    }
    .snip1214 .plan-features {
      padding: 0;
      margin: 0;
      text-align: left;
      list-style: outside none none;
      font-size: 0.8em;
    }
    .snip1214 .plan-features li {
      border-top: 1px solid #d2d7e2;
      padding: 10px 5%;
    }
    .snip1214 .plan-features li:nth-child(even) {
      background: rgba(0, 0, 0, 0.08);
    }
    .snip1214 .plan-features i {
      margin-right: 8px;
      opacity: 0.4;
    }
    
    .snip1214 .featured {
      margin-top: -10px;
      background-color: #500095;
      color: #ffffff;
      box-shadow: 0 0 20px rgba(0, 0, 0, 0.4);
      z-index: 1;
    }
    .snip1214 .featured .plan-title,
    .snip1214 .featured .plan-price {
      color: #ffffff;
    }
    .snip1214 .featured .plan-cost {
      padding: 10px 10px 20px;
    }
    .snip1214 .featured .plan-features li {
      border-top: 1px solid rgba(255, 255, 255, 0.4);
    }
    .btn-primary{
       background-color:  #301934;
      color: #ffffff;
      text-decoration: none;
      padding: 0.5em 1em;
      -webkit-transform: translateY(20%);
      transform: translateY(20%);
      font-weight: 500;
      text-transform: uppercase;
      display: inline-block;
      border-radius: 0;
      border: none;
    }
    
    @media only screen and (max-width: 767px) {
      .snip1214 .plan {
        width: 100%;
      }
      .snip1214 .plan-title,
      .snip1214 .plan-select a {
        -webkit-transform: translateY(0);
        transform: translateY(0);
      }
      .snip1214 .plan-cost,
      .snip1214 .featured .plan-cost
      }
      .snip1214 .plan-select,
      .snip1214 .featured .plan-select {
        padding: 10px 10px 10px;
      }
      .snip1214 .featured {
        margin-top: 0;
      }
    }
    @media only screen and (max-width: 440px) {
      .snip1214 .plan {
        width: 100%;
      }
    }
    </style>
    
<style type="text/css">
    .purpleBkg {
        background-color: #500095;
        color: white;
        font-size: 80%;
        

    }
    .purpleBkg h4,p {
        text-align: center;
    }
    ul.tick {
      font-size: 0;
    }
    ul.tick li {
       font-size:1.0rem;
      display: inline;
    }

    .blink{
		padding: 10px;	
    color: white;
		text-align: center;
	}
	.span{
		font-size: 28px;
		font-family: cursive;
		color: #500095;
		animation: blink 1s linear infinite;
	}
  @keyframes blink{
  0%{opacity: 0;}
  50%{opacity: .5;}
  100%{opacity: 1;}
  }

  #g-recaptcha-response {
    display: block !important;
    position: absolute;
    margin: -78px 0 0 0 !important;
    width: 302px !important;
    height: 76px !important;
    z-index: -999999;
    opacity: 0;
}
</style>
    

<div class="container pb-0 pb-lg-4 ">
    <div class="row">
            <div class="col-md-12 pt-5">
                <div class="col-md-12">
                    <br>
                    <iframe class="col-md-12" style="border: none; margin-bottom: 40; height: 55vh; margin-top: 20" 
                        src="https://www.youtube.com/embed/DKojcDYgJ5w?autoplay=1">
                    </iframe>
                    <br>
                </div>
                
                <div class="row">
                    <div class="col-md-6">
                        <div class="card shadow">
                            <div class="card-header mx-auto">
                                <h4>Advertising Features</h4>
                            </div>
                            <div class="card-body">
                                <div class="card-text">
                                    <ul class="feature_list">
                                        <li>Reach over 100,000 job seekers through our partner networks</li>
                                        <li>Shortlisting dashboard</li>
                                        <li>Easily Schedule Interviews with candidates</li>
                                        <li>Job post sent as featured to job seekers</li>
                                        <li>Job post shared on Facebook, Twitter and LinkedIn Pages</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card shadow">
                            <div class="card-header mx-auto">
                                <h4>Employer Benefits</h4>
                            </div>
                            <div class="card-body">
                                <div class="card-text">
                                    <ul class="feature_list">
                                        <li>Browse our database of job seekers</li>
                                        <li>Shortlist and schedule interviews with job seekers</li>
                                        <li>Request premium recruitment</li>
                                        <li>Request Candidate Vetting</li>
                                        <li>Advertise jobs</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-deck text-center row">
                <div class="col-sm-12">
                  <div class="blink pt-4"><a style="text-decoration: none;"><span class="span"><u>One month free job post for new employers plus a 20% discount for all employers</u></span></a></div>

                    <h3 class="orange pt-3 pb-4 text-center" id="charges">Our Charges</h3>
                </div>

                <div class="container">
                    <div class="card">
                      <div class="card-body">         
                          <div class="snip1214">
                               <div class="plan">
                                      <h5 class="plan-title">
                                        Solo
                                      </h5>
                                    <div class="plan-cost align-items-right orange"><span class="plan-price1">20% Off</span></div>
                                    <div class="plan-cost"><strike><span class="plan-price">KES 2500</span></strike><span class="plan-price"><br> KES 2,000</span><span class="plan-type">/ <br>Month</span></div>
                                    <ul class="plan-features">               
                                          <li><i class="ion-checkmark"> </i>1 Job Advert posted for 30 days</li>
                                          <li><i class="ion-checkmark"> </i>Shared to social media pages</li>
                                          <li><i class="ion-checkmark"> </i>Job AD sent out to our entire database</li>                 
                                      </ul><br><br><br><br><br>
                                      <form method="POST" action="/checkout">
                                        @csrf
                                        <input type="hidden" name="product" value="solo">
                                        <p>
                                            <input type="submit" name="" value="Get Started" class="btn" style="background-color: #E15419; color: white;">
                                        </p>
                                    </form>
                                </div>
                  
                                <div class="plan">
                                      <h5 class="plan-title">
                                         Solo Plus
                                      </h5>
                                      <div class="plan-cost align-items-right orange"><span class="plan-price1">20% Off</span></div>
                                      <div class="plan-cost"><strike><span class="plan-price">KES 4750</span></strike><span class="plan-price"><br> KES 3,800</span><span class="plan-type">/ <br>Month</span></div>
                                      <ul class="plan-features">
                                          <li><i class="ion-checkmark"></i>2-4 job Adverts posted for 30 days</li>
                                          <li><i class="ion-checkmark"></i>Shared to Social media pages</li>
                                          <li><i class="ion-checkmark"></i>Job AD sent out to our entire database</li>
                                      </ul><br><br><br><br><br>
                                      <form method="POST" action="/checkout">
                                        @csrf
                                        <input type="hidden" name="product" value="solo_plus">
                                        <p>
                                            <input type="submit" name="" value="Get Started" class="btn" style="background-color: #E15419; color: white;">
                                        </p>
                                      </form>
                                </div>

                                <div class="plan featured">
                                    <h5 class="plan-title">
                                    Stawi
                                    </h5>
                                    <div class="plan-cost align-items-right orange"><span class="plan-price1">20% Off</span></div>
                                    <div class="plan-cost"><strike><span class="plan-price">KES 7000</span></strike><br><span class="plan-price">KES 5,600
                                  </span><span class="plan-type">/ Month</span></div>
                                        <ul class="plan-features">
                                        <li><i class="ion-checkmark"> </i>All in Solo</li>
                                        <li><i class="ion-checkmark"> </i>Search talent database</li>
                                        <li><i class="ion-checkmark"> </i>Unlimited searches in 1 job category</li>
                                        <li><i class="ion-checkmark"> </i>Get up to 50 CVs</li>                        
                                        <li><i class="ion-checkmark"> </i>Referee reports</li>
                                        </ul><br><br><br>
                                        <form method="POST" action="/checkout">
                                          @csrf
                                          <input type="hidden" name="product" value="stawi">
                                          <p>
                                              <input type="submit" name="" value="Get Started" class="btn" style="background-color: #E15419; color: white;">
                                          </p>
                                      </form>
                              </div>
                  
                                <div class="plan">
                                      <h5 class="plan-title">
                                       Infinity
                                      </h5>
                                    <div class="plan-cost align-items-right orange"><span class="plan-price1">20% Off</span></div>
                                    <div class="plan-cost"><strike><span class="plan-price">KES 9025</span></strike><br><span class="plan-price">KES 7,220
                                    </span><span class="plan-type">/ Month</span></div>
                                      <ul class="plan-features">
                                          <li><i class="ion-checkmark"> </i>More than 4 job Adverts posted for 30 days</li>
                                          <li><i class="ion-checkmark"> </i>Shared to Social media pages</li>
                                          <li><i class="ion-checkmark"> </i>Job AD sent out to entire database</li>
                                      </ul><br><br><br><br><br>
                                      <form method="POST" action="/checkout">
                                        @csrf
                                        <input type="hidden" name="product" value="infinity">
                                        <p>
                                            <input type="submit" name="" value="Get Started" class="btn" style="background-color: #E15419; color: white;">
                                        </p>
                                      </form>
                                </div>
                           </div>
                      </div>
                  </div>
                </div>
            </div>

            
        </div>


        
        
    </div>
    <br id="advertise-form"><br>
    <div class="row">
        <div class="card shadow-lg col-sm-8 offset-md-2">
            <div class="card-body">
              @if(isset(Auth::user()->id) && Auth::user()->role == 'employer')
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
                        <textarea name="description" id="description" rows="5" class="form-control"></textarea>
                    </div>                  
                    
                    @if(isset(Auth::user()->id) && Auth::user()->role == 'employer')
                    <div class="g-recaptcha"  id="recaptcha"  data-sitekey="6LdLhckZAAAAAAw00q3_UyaksiGoo7hbyjNcQ1it" class="form-control"  data-callback="enableBtn">                      
                    </div>
                    @endif

                    <div class="text-center">                   
                         <input type="submit" class="btn btn-orange" id="button1" disabled="disabled" value="Submit">
                         @else
                        <h5>
                          <a href="/employers/register?redirectToUrl={{ url()->current() }}" class="orange">Login or register to post and shortlist with our Role Suitability Index</a></h5>
                    </div>
                </form>
              @endif
            </div>
        </div>
    </div>
</div>

<script type="text/javascript" src="{{ asset('ckeditor/ckeditor.js') }}"></script>
<script>
    setTimeout(function() {
        CKEDITOR.replace('description');
    }, 3000);
</script>

<script type="text/javascript">
   function enableBtn(){
   document.getElementById("button1").disabled = false;
 }
</script>
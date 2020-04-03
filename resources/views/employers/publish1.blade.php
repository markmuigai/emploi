@extends('layouts.general-layout')

@section('title','Advertise on Emploi')

@section('description')
Advertise on Emploi and reach an audience of 100k+, get access to premium shortlisting tools and Candidate Ranking algorithim
@endsection

@section('content')
<?php
$user = isset(Auth::user()->id) ? Auth::user() : false;
?>
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
</style>
<div class="top-bg"></div>
<div class="container">
        <div class="row" >
            <div class="col-md-5 advert-details mt-1" style="background-color: white; color: #000000; border-radius: 5%; border-bottom: 0.1em solid black; border-top: 0.1em solid black; overflow: hidden;">
                <h2 class="orange ">
                    Advertise on Emploi
                </h2>
                <ul>
                    <li>Audience of 100k+ subscribers</li>
                    <li>Advanced Recruitment tools</li>
                    <li>Candidate Ranking Algorithm</li>
                </ul>
                <div>
                    <a href="#advertise-form" class="btn btn-sm orange">Post Job</a>
                    <a href="tel:+254702068282" class="btn btn-sm btn-orange">Call 0702 068 282</a>
                </div>
                
            </div>

            <div class="col-md-12">
                <div class="row">
                    <a href="#advertise-form" class="col-md-8 offset-md-2 mt-1">
                    <img src="/images/promotions/free-job-posting.jpg" alt="Free Job Posting for Companies involved in the fight against Covid-19" style="width: 100%">
                    </a>
                </div>
                
            </div>

            

            
            
        </div>
        <div class="row">
            <div class="col-md-12" style=" padding: 0.3em">
                    
                    
                <div class="col-md-12  row">
                    <div class="col-md-5" style="width: 49%; float: right;">
                        <h5>Advertising Features</h5>
                        <ul class="feature_list">
                            <li>Reach over 100,000 job seekers through our partner networks</li>
                            <li>Shortlisting dashboard</li>
                            <li>Easily Schedule Interviews with candidates</li>
                            <li>Job post sent as featured to job seekers</li>
                            <li>Job post shared on Facebook, Twitter and LinkedIn Pages</li>
                        </ul>
                    </div>
                    <div class="col-md-5 offset-md-2" style="width: 49%; float: right;">
                        <h5>Employer Benefits</h5>
                        <ul class="feature_list">
                            <li>Browse our database of job seekers</li>
                            <li>Shortlist and schedule interviews with job seekers</li>
                            <li>Request premium recruitment</li>
                            <li>Request Candidate Vetting</li>
                            <li>Advertise & Shortlist jobs</li>
                            <li>Create Talent Pools</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    <br id="advertise-form"><br>
    <div class="row">
        <div class="card col-md-8 offset-md-2">
            <div class="card-body">
                
                <h4 class="text-center"> <i class="fa fa-check-circle" style="color: green"></i> Advertise here or <a class="orange" href="tel:+254702068282">  Call Us <i class="fa fa-phone"></i> </a></h4>
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
                    <div class="text-center">
                        <input type="submit" class="btn btn-orange" value="Submit">
                        @if(!$user || $user->role != 'employer')
                        <br><hr>
                        <p>Create an Employer profile and shortlist with our Role Suitability Index. <br>
                            <a href="/employers/register" class="orange">Employer Registration</a></p>
                        @endif
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <div class="row">
        <br>
        <iframe class="col-md-8 offset-md-2" style="border: none; margin-bottom: none; height: 70vh;" 
            src="https://www.youtube.com/embed/DKojcDYgJ5w?autoplay=0">
        </iframe>
        <br>
    </div>

    @include('components.employers.covid19')
</div>

<script type="text/javascript" src="{{ asset('ckeditor/ckeditor.js') }}"></script>
<script>
    setTimeout(function() {
        CKEDITOR.replace('description');
    }, 1000);
</script>



@endsection

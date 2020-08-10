@extends('layouts.general-layout')

@section('title','Advertise on Emploi')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
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
                
                <div class="col-md-12 row">
                    <div class="col-md-5 pr-2" style="width: 49%; float: center;">
                        <div class="card shadow">
                            <div class="card-header">
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
                    <div class="col-md-5 offset-md-2" style="width: 49%; float: right;">
                        <div class="card shadow">
                            <div class="card-header">
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

            <div class="card-deck text-center coloured-card row">
                <div class="col-md-12">
                    <h3 class="orange pt-2 pb-3 text-center" id="charges">Our Charges</h3>
                </div>
                <div class="card shadow">
                    <div class="card-body d-flex flex-column justify-content-center">
                        
                        <h1>Kshs 2,500</h1>
                        <p>SOLO</p>
                        <ul class="tick">
                            <li>1 Job Advert posted for 30 days</li><br>
                            <li>Shared to social media pages</li><br>
                            <li>Job AD sent out to our entire database</li>
                        </ul>
                        <br>
                        <form method="POST" action="/checkout">
                            @csrf
                            <input type="hidden" name="product" value="solo">
                            <p>
                                <input type="submit" name="" value="Get Started" class="btn btn-orange-alt" style="background-color: #FF5E00; color: white;">
                            </p>
                        </form>
                    </div>
                </div>
                <div class="card shadow">
                    <div class="card-body d-flex flex-column justify-content-center">
                        <h1>Kshs 4,750</h1>
                        <p>SOLO PLUS</p>
                        <ul class="tick">
                            <li>2-4 job Adverts posted for 30 days</li><br>
                            <li>Shared to Social media pages</li><br>
                            <li>Job AD sent out to our entire database</li>
                        </ul>
                        <br>
                        <form method="POST" action="/checkout">
                            @csrf
                            <input type="hidden" name="product" value="solo_plus">
                            <p>
                                <input type="submit" name="" value="Get Started" class="btn btn-orange-alt" style="background-color: #FF5E00; color: white;">
                            </p>
                        </form>
                    </div>
                </div>
                <div class="card shadow">
                    <div class="card-body d-flex flex-column justify-content-center">
                        <h1>Kshs 9,025</h1>
                        <p>INFINITY</p>
                        <ul class="tick">
                            <li>More than 4 job Adverts posted for 30 days</li><br>
                            <li>Shared to Social media pages</li><br>
                            <li>Job AD sent out to entire database</li>
                        </ul>
                        <br>
                        <form method="POST" action="/checkout">
                            @csrf
                            <input type="hidden" name="product" value="infinity">
                            <p>
                                <input type="submit" name="" value="Get Started" class="btn btn-orange-alt" style="background-color: #FF5E00; color: white;">
                            </p>
                        </form>
                    </div>
                </div>
                <div class="card shadow-lg">
                    <div class="card-body d-flex flex-column justify-content-center">
                        <h1>Kshs 7,000</h1>
                        <p>STAWI</p>
                        <ul class="tick">
                            <li>All   in Solo</li><br>
                            <li>Search talent database</li><br>
                            <li>Unlimited searches in 1 job category</li><br>
                            <li>Get up to 50 CVs</li><br>
                            <li>Referee reports</li>
                        </ul>
                        <br>
                        <form method="POST" action="/checkout">
                            @csrf
                            <input type="hidden" name="product" value="stawi">
                            <p>
                                <input type="submit" name="" value="Get Started" class="btn btn-orange-alt" style="background-color: #FF5E00; color: white;">
                            </p>
                        </form>
                    </div>
                </div>
            </div>

            
        </div>


        
        
    </div>
    <br id="advertise-form"><br>
    <div class="row">
        <div class="card col-sm-8 offset-md-2">
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
                        <textarea name="description" id="description" rows="5" class="form-control"></textarea>
                    </div>
                    <div class="text-center">
                        <input type="submit" class="btn btn-orange" value="Submit">
                        @if(!$user || $user->role != 'employer')
                        <p>Create an Employer profile and shortlist with our Role Suitability Index. <br>
                            <a href="/employers/register" class="orange">Employer Registration</a></p>
                        @endif
                    </div>
                </form>
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


@extends('layouts.zip')

@section('title','Post a Job on Emploi')

@section('description')
Advertise on Emploi and reach an audience of 100k+, get access to Premium Shortlisting tools and Candidate Ranking algorithims. Create a job post and share to top job boards in minutes.
@endsection

@section('content')
<?php
$user = isset(Auth::user()->id) ? Auth::user() : false;
?>

<!-- contacts -->
<section class="w3l-contact mt-5">
  <div class="contacts-9 py-5 mt-5">
    <div class="container py-lg-3">
      <div class="row top-map">
        
        <div class="map-content-9 col-md-7 mt-5 mt-md-0">
			<form action="/employers/publish" method="post" id="postForm">
				@csrf
				<div class="form-group row">
					<div class="col-md-6">
						<label class="contact-textfield-label" for="name">Full Name <i style="color: red">*</i></label>
						<input type="text" class="form-control" name="name" id="name" placeholder="" required="">
					</div>
					<div class="col-md-6 mt-md-0 mt-3">
						<label class="contact-textfield-label" for="phone_number">Phone Number <i style="color: red">*</i></label>
						<input type="tel" class="form-control" name="phone_number" id="phone_number" placeholder="" required="">
					</div>
					
				</div>
				<div class="form-group row">
					
					<div class="col-md-6 ">
						<label class="contact-textfield-label" for="co_name">Company Name <i style="color: red">*</i></label>
						<input type="tel" class="form-control" name="co_name" id="co_name" placeholder="" required="">
					</div>
					<div class="col-md-6 mt-md-0 mt-3">
						<label class="contact-textfield-label" for="email">Business Email <i style="color: red">*</i></label>
						<input type="email" class="form-control" name="email" placeholder="" required="">
					</div>
				</div>
				<div class="form-group">
					<label class="contact-textfield-label" for="title">Job Title <i style="color: red">*</i></label>
					<input type="text" class="form-control" name="title" id="title" placeholder="" required="">
				</div>
				<div class="form-group">
					<label class="contact-textfield-label" for="description">Job Description</label>
					<textarea name="description" class="form-control" id="description" placeholder="Jot down the job description or desired qualities & skills - our team will rework it to your advantage"></textarea>
				</div>
				<button type="submit" class="btn btn-primary btn-contact">Post Advert</button>
				<a href="/contact" class="btn btn-link" style="float: right;">Contact Us</a>
			</form>
        </div>
        <div class="cont-details col-md-5">
            <div class="heading mb-lg-4 mb-4">
              <h3 class="head">Post a Job on Emploi</h3>
              <p>9 out of 10 Employers who Advertise on <a href="{{ url('/') }}" title="Emploi - Africa's Premier Recruitment Platform">Emploi</a> receive qualified applications <a href="/employers/publish" style="font-weight: bold;">from the first day</a></p>
            </div>
            <div class="cont-top">
              <div class="cont-left">
                <span class="fa fa-phone"></span>
              </div>
              <div class="cont-right">
                  <p>
                    <a href="tel:+254702068282">0702 068 282</a>|
                          <a href="tel:+254774569001">0774 569 001</a> |
                          <a href="tel:+254772795017">0772 795 017</a>
                  </p>

              </div>
            </div>
            <div class="cont-top mt-4">
              <div class="cont-left">
                <span class="fa fa-envelope-o"></span>
              </div>
              <div class="cont-right">
                <p><a href="mailto:info@emploi.co" class="mail">info@emploi.co</a></p>
              </div>
            </div>
            <div class="cont-top mt-4">
              <div class="cont-left">
                <span class="fa fa-map-marker"></span>
              </div>
              <div class="cont-right">
                <p>Even Business Park, Airport North Rd, Nairobi </p>
              </div>
            </div>

              <div>
                <br><br>
                <a href="/employers/publish">
                  <img src="/images/promotions/free-job-posting.jpg" style="width: 100%" style="border-radius: 5%">
                </a>              
              </div>
          </div>
      </div>
    </div>
  </div>
</section>
<!-- //contacts -->

@endsection
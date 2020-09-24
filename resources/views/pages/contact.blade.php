@extends('layouts.general-layout')

@section('title','Emploi :: Contact Us')

@section('description')
Emploi is the Leading Platform for Talent Assessment and Matching for SME's in Africa.
@endsection

@section('content')
<div class="contact">
	<div class="container">
		<div class="row align-items-center">
			<div class="col-md-6 col-12 pt-5 pt-md-0 address">
				<h2 class="text-center">Find Us</h2>
				<div class="row">
						<div class="col-1">
								<i class="fas fa-map-marker-alt"></i>
						</div>
						<div class="col-10">
							<h5>Address</h5>
							<a href="https://www.google.com/maps/place/Emploi/@-1.3276001,36.8930386,18z/data=!4m6!3m5!1s0x182f0d6ec6d30da5:0x72bc053be0875fba!4b1!8m2!3d-1.3283885!4d36.894192" target="_blank">
                            <p>Even Business Park, Airport North Rd, Nairobi </p>
                            </a>
						</div>
				</div>
				<br>
				<div class="row">
						<div class="col-1">
								<i class="fas fa-envelope"></i>
						</div>
						<div class="col-10">
							<h5>E-mail Support</h5>
								<a href="mailto:info@emploi.co">info@emploi.co</a>
						</div>
				</div>
				<br>
				<div class="row">
						<div class="col-1">
								<i class="fas fa-phone"></i>
						</div>
						<div class="col-10">
							<h5>Let's Talk</h5>
								<a href="tel:+254702068282">+254 702 068 282</a> | <a href="tel:+254774569001">0774 569 001</a> | <a href="tel:+254772795017">0772 795 017</a>
						</div>
				</div>
			</div>
			<div class="col-md-6 col-12 py-5 pl-md-5">
				<h2 class="text-center orange">Send Us A Message</h2>
				<form method="post" action="/contact">
					@csrf
					@honeypot
					<div class="form-group">
						<input type="text" class="form-control" name="name" placeholder="Name" onfocus="" onblur="" required="required">
					</div>
					<div class="form-group">

						<input type="email" class="form-control" name="email" placeholder="E-mail address" onfocus="" onblur="" required="required">
					</div>
					<div class="form-group">

						<input type="number" class="form-control" name="phone" placeholder="Phone number" required="" onfocus="" onblur="">
					</div>
					<div class="form-group">

						<textarea placeholder="Message" class="form-control" name="message" onfocus="" onblur="" required=""></textarea>
					</div>
								
					<button type="submit" class="btn btn-orange" name="button">Send</button>
				</form>
			</div>
		</div>
	</div>
</div>
@include('components.ads.responsive')
@include('components.search-form')
@endsection

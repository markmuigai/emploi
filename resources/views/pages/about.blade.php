@extends('layouts.seek')

@section('title','Emploi')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@include('seekers.search-input')
<div class="container">
    <div class="single">  
       <div class="box_1">
       	<h3>About Us</h3>
        <div class="col-md-5">
        	<img src="images/a1.jpg" class="img-responsive" alt="" style="width: 100%" />
        </div>
        <div class="col-md-7 service_box1">
        	<h5>Emploi's philosophy is to create a single sourcing point for players, with enough tools to help the find each other.</h5>
        	<p>At the core of our systems is a vacancy – job seeker matching engine powered by algorithms for job seeker assessment and ranking together with advanced recruitment process management tools.</p>
        	<p>
        		One of the most interesting puzzles about the East African job market is the time it takes for an employer to fill a position, given the high unemployment rates in the region. In a mission to understand the puzzle and go beyond the easier narrative of “unemployable graduates”, we discovered the unintended reason behind the inability of employers and job seekers to find each other as quickly, efficiently and as affordably as possible.
        	</p>
        	<p style="text-align: center">
        		<a href="/contact" class="btn btn-success">Contact Us</a>
	        	<a href="/register" class="btn btn-primary">Job Seeker Registration</a>
        	</p>
        	
        </div>
        <div class="clearfix"> </div>
       </div>
       <div class="box_2">
       	<h3 style="text-align: right;">Our Services</h3>
       	<div class="col-md-4 icon-service">
       		<div class="icon">
				<i class="fa fa-briefcase"></i>
			</div>
			<div class="icon-box-body">
				<h4>Advertise Jobs</h4>
				<p>Reach an audience of over 100,000 people through our network</p>
			</div>
		</div>
       	<div class="col-md-4 icon-service">
       		<div class="icon">
				<i class="fa fa-book"></i>
			</div>
			<div class="icon-box-body">
				<h4>Browse CVs</h4>
				<p>View profiles of candidates and shortlist quicker.</p>
			</div>
		</div>
       	<div class="col-md-4 icon-service">
       		<div class="icon">
				<i class="fa fa-flash"></i>
			</div>
			<div class="icon-box-body">
				<h4>Premium Recruitment</h4>
				<p>Let us handle your recruitment process and save time, money</p>
			</div>
		</div>
		<div class="col-md-4 icon-service">
       		<div class="icon">
				<i class="fa fa-users"></i>
			</div>
			<div class="icon-box-body">
				<h4>HR Services</h4>
				<p>Outsource HR services to us and we'll manage your organization professionally</p>
			</div>
		</div>
		<div class="col-md-4 icon-service">
       		<div class="icon">
				<i class="fa fa-bar-chart-o"></i>
			</div>
			<div class="icon-box-body">
				<h4>Candidate Vetting</h4>
				<p>We perform IQ, Competancy and Background checks on candidates</p>
			</div>
		</div>
		<div class="col-md-4 icon-service">
       		<div class="icon">
				<i class="fa fa-file"></i>
			</div>
			<div class="icon-box-body">
				<h4>Upload CV</h4>
				<p>Job Seekers upload CVs for quick job placements</p>
			</div>
		</div>
		<div class="col-md-4 icon-service">
       		<div class="icon">
				<i class="fa fa-pencil	"></i>
			</div>
			<div class="icon-box-body">
				<h4>CV Editing</h4>
				<p>We edit job seekers CVs while taking into consideration the industry</p>
			</div>
		</div>
		<div class="col-md-4 icon-service">
       		<div class="icon">
				<i class="fa fa-check"></i>
			</div>
			<div class="icon-box-body">
				<h4>CV Templates</h4>
				<p>We provide free templates and suggestions for updating your CVs</p>
			</div>
		</div>
		<div class="col-md-4 icon-service">
       		<div class="icon">
				<i class="fa fa-flash"></i>
			</div>
			<div class="icon-box-body">
				<h4>Premium Placement</h4>
				<p>Includes CV editing, interview coaching, and boost in search results as well as recommendation to employers</p>
			</div>
		</div>
       	
       </div>
       
	</div>
</div>
<div class="about_bottom">
	<div class="container">
		<h3>Our Team</h3>
	    <div class="col-md-3 team-member text-center">
		    <img src="images/team/sophy.png" class="img-responsive img-circle1" alt=""/>
			<h5>Sophy Mwale</h5>
			<h6>Chief Executive Officer</h6>
			<a href="mailto:sophy.mwale@emploi.co"><i class="fa fa-envelope fa1"> </i></a>
			<a href="https://twitter.com/sophymwale?lang=en"><i class="fa fa-twitter fa1"> </i></a>
			<a href="https://www.linkedin.com/in/sophy-mwale-81656b21/?originalSubdomain=ke"><i class="fa fa-linkedin fa1"> </i></a>
		</div>
		<div class="col-md-3 team-member text-center">
		    <img src="images/team/sally.png" class="img-responsive img-circle1" alt=""/>
			<h5>Sally Muya</h5>
			<h6>Human Resource Manager</h6>
			<a href="https://linkedin.com/in/sally-muya-326795123/"><i class="fa fa-linkedin fa1"> </i></a>
			<a href="mailto:sally.muya@emploi.co"><i class="fa fa-envelope fa1"> </i></a>
		</div>
		<div class="col-md-3 team-member text-center">
			<img src="images/team/maureen.png" class="img-responsive img-circle1" alt=""/>
			<h5>Maureen Kaunda</h5>
			<h6>Snr Director, New Business</h6>
			<a href="mailto:maureen.kaunda@emploi.co"><i class="fa fa-envelope fa1"> </i></a>
			<a href="https://www.linkedin.com/in/maureen-mukhanyi-kaunda-277680a7/"><i class="fa fa-linkedin fa1"> </i></a>
		</div>
		
		<div class="col-md-3 team-member text-center">
	        <img src="images/team/brian.png" class="img-responsive img-circle1" alt=""/>
			<h5>Obare C. Brian</h5>
			<h6>Chief Technology Obare</h6>
			<a href="mailto:brian.obare@emploi.co"><i class="fa fa-facebook fa1"> </i></a>
			<a href="https://www.twitter.com/chiefbrob/"><i class="fa fa-twitter fa1"> </i></a>
			<a href="https://www.linkedin.com/in/chiefbrob/"><i class="fa fa-linkedin fa1"> </i></a>
		</div>
		<div class="clearfix"> </div>
	</div>	
</div>
@include('components.statistics')
@endsection
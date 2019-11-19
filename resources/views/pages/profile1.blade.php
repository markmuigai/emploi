@extends('layouts.dashboard-layout')

@section('title','Emploi :: @'.$user->username)

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@section('page_title', 'Profile')

<div class="card">
	<div class="card-body p-4">
		<div class="row align-items-center">
			<div class="col-lg-2 col-md-3 col-4">
				<img src="{{ $user->avatar ? '/storage/avatars/'.$user->avatar : '/images/avatar.png' }}" class="img-responsive w-100" alt="My Avatar" />
			</div>
			<div class="col-lg-8 col-md-7 col-8">
				<h3 class="text-uppercase">{{ $user->name }}</h3>

				<!-- IF JOB SEEKER -->
				@if($user->role == 'seeker')
				<h5>Job Seeker</h5>
				<!-- END OF JOB SEEKER -->

				<!-- IF EMPLOYER -->
				@elseif($user->role == 'employer')
				<h5>Employer</h5>
				<!-- END OF EMPLOER -->

				<!-- IF ADMIN -->
				@elseif($user->role == 'admin')
				<h5>Administrator</h5>
				<!-- END OF ADMIN -->

				@endif
			</div>

			@if(isset(Auth::user()->id))
			<div class="col-md-2 col-12">
				<a href="/profile/edit" class="orange"><i class="fas fa-edit"></i> Edit</a>
			</div>
			@endif
		</div>



		<!-- IF EMPLOYER -->
		@if($user->role == 'employer')
		<div class="row mt-4">
			<div class="col-md-6">
				<p><strong>Website: </strong><a href="#">website.com</a></p>
			</div>
			<div class="col-md-6">
				<p><strong>Company Size: </strong>201 - 500 People</p>
			</div>
			<div class="col-md-6">
				<p><strong>Industry: </strong>E-Commerce &amp; Internet</p>
			</div>
			<div class="col-md-6">
				<p><strong>Type: </strong>Privately Held</p>
			</div>
			<div class="col-md-6">
				<p><strong>Headquarters: </strong>Nairobi, Kenya</p>
			</div>
			<div class="col-md-6">
				<p><strong>Founded: </strong>30 January 2001</p>
			</div>
			<div class="col-md-6">
				<p><strong>Speciality: </strong>Wordpres</p>
			</div>
		</div>
		<!-- END OF EMPLOYER -->
		<!-- IF SEEKER -->
		@elseif($user->role == 'seeker')
		<div class="row text-center">
			<div class="col-md-6 py-2">
				<h2 class="orange"><i class="fas fa-phone-alt"></i></h2>
				<h6>Phone Number</h6>
				<h5>{{ $user->seeker->phone_number ? $user->seeker->phone_number : '-no phone number-' }}</h5>
			</div>
			<div class="col-md-6 py-2">
				<h2 class="orange"><i class="fas fa-envelope"></i></h2>
				<h6>Email Address</h6>
				<h5><a href="#">{{ $user->email }}</a></h5>
			</div>
			<div class="col-md-6 py-2">
				<h2 class="orange"><i class="fas fa-network-wired"></i></h2>
				<h6>Industry</h6>
				<h5>Banking</h5>
			</div>
			<div class="col-md-6 py-2">
				<h2 class="orange"><i class="fas fa-user"></i></h2>
				<h6>Profession</h6>
				<h5>Project Manager</h5>
			</div>
		</div>
		@endif
		<!-- END OF SEEKER -->
		<div class="d-flex justify-content-between align-items-center mt-4">
			<h5>About</h5>
		</div>
		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Hic quae, vero aliquam harum sapiente officiis aliquid quod nobis pariatur voluptatum suscipit illum in necessitatibus animi quis excepturi, dolor dolorum magnam qui quibusdam
			laborum incidunt. Hic soluta sunt odio dicta itaque enim facere repudiandae, architecto aperiam magni aspernatur delectus, amet culpa.</p>

		<hr>

		@if($user->role == 'employer')
		<h5 class="mt-4">Office Location</h5>
		<p>Repen Complex, Syokimau Junction</p>
		<iframe
		  src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3988.6634497341915!2d36.92601481464639!3d-1.378599798994531!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x182f0ce7aa2120e1%3A0x2905bde1b42e68a!2sREPEN%20Complex!5e0!3m2!1sen!2ske!4v1573633191589!5m2!1sen!2ske"
		  frameborder="0" style="border:0;" allowfullscreen=""></iframe>
		@endif
	</div>
</div>

@if($user->role == 'seeker')

<div class="row">
	<div class="col-md-2 col-md-offset-1 col-xs-4" style="text-align: center;">
		<small>
			<i class="fa fa-map-marker"></i> {{ $user->seeker->location_id ? $user->seeker->location->name : '-not set-' }} <br>
			@if( $user->seeker->gender == 'M' )
			Male
			@elseif($user->seeker->gender == 'F')
			Female
			@else
			Other
			@endif <br>
			<a href="/profile/referees" class="btn btn-success"> referees</a>
		</small>
	</div>
	<div class="col-md-6 col-md-offset-1 col-xs-8" style="text-align: center;">
		@if(!$user->seeker->hasCompletedProfile())
		<p style="text-align: center; font-size: 90%; ">
			<a href="/profile/edit" style="color: red"> <i class="fa fa-info"></i> Update your profile and start applying for jobs</a>
		</p>
		@endif
		<div style="margin-bottom: 1em">
			<h4 style="font-weight: bold;">Career Objective</h4>
			<p>
				{{ $user->seeker->objective ? $user->seeker->objective : 'Career objective not stated' }}
			</p>
		</div>

		@if(count($user->seeker->experience()) > 0)
		<div style="margin-bottom: 1em">
			<h4 style="font-weight: bold;">Work Experience</h4>
			<?php $exp = $user->seeker->experience();  ?>
			@for($i=count($exp)-1; $i>=0; $i--)
			<div style="">
				<b>
					<?php echo $exp[$i][1].'</b> at <b>'.$exp[$i][0]; ?>
				</b>
				<?php echo $exp[$i][2].' - '.$exp[$i][3]; ?>

				<br>
				<p>
					{{ $exp[$i][4] }}
				</p>
			</div>
			@endfor
		</div>
		@endif

		@if(count($user->seeker->education()) > 0)
		<div style="margin-bottom: 1em">
			<h4 style="font-weight: bold;">Education</h4>
			<div class="row">
				<?php $exp = $user->seeker->education();  ?>
				@for($i=count($exp)-1; $i>=0; $i--)
				<div style="" class="col-md-6">
					<b>
						<?php echo $exp[$i][1]; ?>
					</b> <br>
					<?php echo $exp[$i][2] ?>

					<br>
					<p>
						{{ $exp[$i][0] }}
					</p>
				</div>
				@endfor
			</div>
		</div>

		@endif

		@if(count($user->seeker->skills) > 0)
		<div style="margin-bottom: 1em">
			<h4>Skills</h4>
			<div class="row">
				@forelse($user->seeker->skills as $s)
				<div class="col-md-6" style="text-align: center;">
					{{ $s->skill->name }}
				</div>
				@empty
				@endforelse
			</div>
		</div>
		@endif
	</div>

</div>
@endif
@endsection

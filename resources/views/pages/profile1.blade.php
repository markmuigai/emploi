@extends('layouts.seek')

@section('title','Emploi :: @'.$user->username)

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
<div class="row" style="padding: 1em 0;  border-bottom: 0.1em solid grey">
	<div class="col-md-2 col-md-offset-1 col-xs-4">
		<img src="{{ $user->avatar ? '/storage/avatars/'.$user->avatar : '/images/avatar.png' }}" class="img-responsive col-md-6 col-md-offset-3" alt="My Avatar" style="width: 80%; margin-left: 10%" />
	</div>
	<div class="col-md-8 col-xs-8" style="text-align: center;">
		<br class="no-mobile">
		<h3 style="text-transform: uppercase;">{{ $user->name }}</h3>
		<p>
			{{ '@'.$user->username }}
			<br>
			<small>
			@if($user->role == 'seeker')
			Job Seeker
			@elseif($user->role == 'employer')
			Employer
			@elseif($user->role == 'admin')
			Administrator
			@endif
			
				
			</small>
		</p>
	</div>
</div>
@if($user->role == 'seeker')

<div class="row">
	<div class="col-md-2 col-md-offset-1 col-xs-4" style="text-align: center;">
		<small>
			<i class="fa fa-phone"></i> {{ $user->seeker->phone_number ? $user->seeker->phone_number : '-no phone number-' }} <br>
			<i class="fa fa-envelope"></i> {{ $user->email }} <br>
			<i class="fa fa-map-marker"></i> {{ $user->seeker->location_id ? $user->seeker->location->name : '-not set-' }} <br>
				@if( $user->seeker->gender == 'M' )
	            Male
	            @elseif($user->seeker->gender == 'F')
	            Female
	            @else
	            Other
	            @endif <br>
	            <a href="/profile/edit" class="btn btn-link"> edit</a>
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
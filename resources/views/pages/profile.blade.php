@extends('layouts.seek')

@section('title','Emploi :: @'.Auth::user()->username)

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@if(Auth::user()->role == 'seeker')
	@include('seekers.search-input')
@endif
<style type="text/css">
    .seeker-details .col-md-6 {
        margin-bottom: 0.5em;
    }
</style>

<div class="container">


    <div class="single">

       <div class="box_1">
        @if($user->role == 'seeker' && !$user->seeker->hasCompletedProfile())
        <p style="text-align: center; font-size: 130%; color: red">
            <a href="/profile/edit">Update your profile and start applying for jobs</a>
        </p>
        @endif
       	<h3>
            {{ '@'.$user->username }}
            <small class="pull-right">
                @if($user->role == 'employer')
                <a href="/home" class="btn btn-sm btn-danger"><i class="fa fa-home"></i> Dashboard</a>
                @endif
                <a href="/profile/edit" class="btn btn-sm btn-success"><i class="fa fa-pencil"></i> edit profile</a>
                @if($user->role == 'seeker')
                <a href="/storage/resumes/{{ $user->seeker->resume }}" class="btn btn-sm btn-primary"><i class="fa fa-file"></i> my resume</a>
                @endif
            </small>

        </h3>
        <div class="col-md-4 row">
        	<img src="{{ $user->avatar ? '/storage/avatars/'.$user->avatar : '/images/avatar.png' }}" class="img-responsive col-md-6 col-md-offset-3" alt="My Avatar" style="" />

        </div>
        <div class="col-md-8 service_box1">

        	@if($user->role == 'seeker')

            <div class="row seeker-details">
                <div>
                    <strong>Job Seeker</strong>
                    <br><br>
                </div>
                <div class="col-md-6">
                    Name: <strong>{{ $user->name }}</strong>
                </div>
                <div class="col-md-6">
                    Public name: <strong>{{ $user->seeker->public_name }}</strong>
                </div>
                <div class="col-md-6">
                    Current Position: <strong>{{ $user->seeker->current_position }}</strong>
                </div>
                <div class="col-md-6">
                    E-mail: <strong>{{ $user->email }}</strong>
                </div>
                <div class="col-md-6">
                    Years of Experience: <strong>{{ $user->seeker->years_experience }}</strong>
                </div>
                <div class="col-md-6">
                    Date of Birth: <strong>{{ $user->seeker->date_of_birth ? $user->seeker->date_of_birth : '-not set-' }}</strong>
                </div>
                <div class="col-md-6">
                    Phone Number: <strong>{{ $user->seeker->phone_number }}</strong>
                </div>
                <div class="col-md-6">
                    Address: <strong>{{ $user->seeker->post_address ? $user->seeker->post_address : '-not set-' }}</strong>
                </div>
                <div class="col-md-6">
                    Highest Education: <strong>{{ $user->seeker->education_level_id ? $user->seeker->educationLevel->name : '-not set-' }}</strong>
                </div>
                <div class="col-md-6">
                    Gender: <strong>
                        @if( $user->seeker->gender == 'M' )
                        Male
                        @elseif($user->seeker->gender == 'F')
                        Female
                        @else
                        Other
                        @endif
                    </strong>
                </div>
                @if(isset($user->seeker->location_id))
                <div class="col-md-6">
                    Location: <strong>{{ $user->seeker->location->name }}</strong>
                </div>
                @endif
                <div class="col-md-6">
                    Country: <strong>{{ $user->seeker->country->name }}</strong>
                </div>
                <div class="col-md-6">
                    Industry/Profession: <strong>{{ $user->seeker->industry->name }}</strong>
                </div>
                @if(isset($user->seeker->objective))
                <div class="col-md-8 col-md-offset-2" style="padding: 1em">
                    <u style="font-weight: bold;">Career Objective:</u> <br>{{ $user->seeker->objective }}
                </div>
                @endif
            </div>

            <div class="row" style="margin: 1em 0">
                @if(count($user->seeker->experience()) > 0)
                <div class="col-md-10 col-md-offset-1">
                    <h4 style="text-decoration: underline;">Work Experience:</h4> <br>
                    <?php $exp = $user->seeker->experience();  ?>
                    @for($i=count($exp)-1; $i>=0; $i--)
                        <div style="margin-bottom: 1em; border-bottom: 0.1em solid black">
                            <strong>
                                <?php echo $exp[$i][1].'</strong> at <strong>'.$exp[$i][0]; ?>
                            </strong>
                                <i class="pull-right">
                                    <?php echo $exp[$i][2].' - '.$exp[$i][3]; ?>
                                </i>
                             <br><br>
                             {{ $exp[$i][4] }}

                        </div>
                    @endfor
                </div>
                @endif

                @if(count($user->seeker->education()) > 0)
                <div class="col-md-10 col-md-offset-1">
                    <h4 style="text-decoration: underline;">Education Background:</h4> <br>
                    <?php $exp = $user->seeker->education();  ?>
                    @for($i=count($exp)-1; $i>=0; $i--)
                        <div style="margin-bottom: 1em; border-bottom: 0.1em solid black">
                            <strong>
                                <?php echo $exp[$i][1]; ?>
                            </strong>
                                <i class="pull-right">
                                    <?php echo $exp[$i][2] ?>
                                </i>
                             <br><br>
                             {{ $exp[$i][0] }}

                        </div>
                    @endfor
                </div>

                @endif

                <div class="row">
                    <h4 class="col-md-4" style="text-decoration: underline; font-weight: bold;">Skills</h4>
                    @forelse($user->seeker->skills as $s)
                    <div class="col-md-4" style="margin: 0.5em 0;">
                        <i class="fa fa-check"></i>
                        {{ $s->skill->name }}
                        <hr>
                    </div>
                    @empty
                    <p class="col-md-4" style="text-align: center;">
                        You have not specified your skills. <a href="/profile/edit">Edit Profile</a>
                    </p>
                    @endforelse
                </div>
            </div>


        	@elseif($user->role == 'employer')

                @forelse($user->companies as $c)
                <div>
                    <strong>Company Details</strong>
                    <a href="{{ url('/companies/'.$c->id.'/edit') }}" class="pull-right">edit company</a>
                    <br><br>
                </div>
                @if($c->logo)
                <div class="col-md-2 col-md-offset-5">
                    <img src="/storage/companies/{{ $c->logo }}" style="width: 100%">
                </div>

                <div class="clearfix"></div>
                <br>
                @endif
                <div class="col-md-6">
                    <strong>Name</strong>: {{ $c->name }}
                </div>
                <div class="col-md-6">
                    <strong>Tagline</strong>:
                    {{ $c->tagline ? $c->tagline : '-No tagline-' }}
                </div>
                <div class="col-md-6">
                    <strong>Website</strong>:
                    <a href="{{ $c->website ? $c->website : '#' }}">{{ $c->website ? $c->website : '-website not provided-' }}</a>
                </div>
                <br>
                <div class="col-md-6" >
                    <strong>About</strong>:
                    {{ $c->about ? $c->about : '-Company Brief not stated-' }}
                </div>
                <div class="col-md-6" >
                    <strong>Industry</strong>:
                    {{ $c->industry->name }}
                </div>
                <div class="col-md-6" >
                    <strong>Company Size</strong>:
                    {{ $c->companySize->lower_limit }} - {{ $c->companySize->upper_limit }} people
                </div>
                <div class="col-md-6" >
                    <strong>Country</strong>:
                    {{ $c->location->country->name }}
                </div>
                <div class="col-md-6" >
                    <strong>Location</strong>:
                    {{ $c->location->name }}
                </div>
                <hr>
                <div class="col-md-6" >
                    <strong>All Vacancies</strong>:
                    {{ count($c->posts) }}
                </div>
                <div class="col-md-6" >
                    <strong>Live Vacancies</strong>:
                    {{ count($c->activePosts) }}
                </div>
                @empty
                <p>No company records found. <a href="/vacancies/create">Create Company</a></p>
                @endforelse




        	@elseif($user->role == 'admin')

        	<h5>Role: Administrator</h5>
        	<p>
        		Name: <strong>{{ $user->name }}</strong> <br>
        	</p>

        	@elseif($user->role == 'super')

        	<h5>Role: Super Administrator</h5>
        	<p>
        		Name: <strong>{{ $user->name }}</strong> <br>
        	</p>

        	@endif



        </div>
        <div class="clearfix"> </div>
       </div>

	</div>
</div>

@endsection

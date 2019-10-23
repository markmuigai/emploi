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
                <a href="/home" class="btn btn-sm btn-danger"><i class="fa fa-home"></i> home</a>
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
                    <b>Job Seeker</b>
                    <br><br>
                </div>
                <div class="col-md-6">
                    Name: <b>{{ $user->name }}</b>
                </div>
                <div class="col-md-6">
                    Public name: <b>{{ $user->seeker->public_name }}</b>
                </div>
                <div class="col-md-6">
                    Current Position: <b>{{ $user->seeker->current_position }}</b>
                </div>
                <div class="col-md-6">
                    E-mail: <b>{{ $user->email }}</b>
                </div>
                <div class="col-md-6">
                    Years of Experience: <b>{{ $user->seeker->years_experience }}</b>
                </div>
                <div class="col-md-6">
                    Date of Birth: <b>{{ $user->seeker->date_of_birth ? $user->seeker->date_of_birth : '-not set-' }}</b>
                </div>
                <div class="col-md-6">
                    Phone Number: <b>{{ $user->seeker->phone_number }}</b>
                </div>
                <div class="col-md-6">
                    Address: <b>{{ $user->seeker->post_address ? $user->seeker->post_address : '-not set-' }}</b>
                </div>
                <div class="col-md-6">
                    Highest Education: <b>{{ $user->seeker->education_level_id ? $user->seeker->educationLevel->name : '-not set-' }}</b>
                </div>
                <div class="col-md-6">
                    Gender: <b>
                        @if( $user->seeker->gender == 'M' )
                        Male
                        @elseif($user->seeker->gender == 'F')
                        Female
                        @else
                        Other
                        @endif
                    </b>
                </div>
                @if(isset($user->seeker->location_id))
                <div class="col-md-6">
                    Location: <b>{{ $user->seeker->location->name }}</b>
                </div>
                @endif
                <div class="col-md-6">
                    Country: <b>{{ $user->seeker->country->name }}</b>
                </div>
                <div class="col-md-6">
                    Industry/Profession: <b>{{ $user->seeker->industry->name }}</b>
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
                            <b>
                                <?php echo $exp[$i][1].'</b> at <b>'.$exp[$i][0]; ?>
                            </b>
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
                            <b>
                                <?php echo $exp[$i][1]; ?>
                            </b>
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
                    <h4 style="text-decoration: underline;">Skills</h4>
                    @forelse($user->seeker->skills as $s)
                    <div class="col-md-4" style="margin: 0.5em 0;">
                        <i class="fa fa-check"></i>
                        {{ $s->skill->name }}
                        <hr>
                    </div>
                    @empty
                    <p style="text-align: center;">
                        You have not specified your skills. <a href="/profile/edit">Edit Profile</a>
                    </p>
                    @endforelse
                </div>
            </div>


        	@elseif($user->role == 'employer')

                @forelse($user->companies as $c)
                <div>
                    <b>Company Details</b>
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
                    <b>Name</b>: {{ $c->name }}
                </div>
                <div class="col-md-6">
                    <b>Tagline</b>: 
                    {{ $c->tagline ? $c->tagline : '-No tagline-' }}
                </div>
                <div class="col-md-6">
                    <b>Website</b>: 
                    <a href="{{ $c->website ? $c->website : '#' }}">{{ $c->website ? $c->website : '-website not provided-' }}</a>
                </div>
                <br>
                <div class="col-md-6" >
                    <b>About</b>: 
                    {{ $c->about ? $c->about : '-Company Brief not stated-' }}
                </div>
                <div class="col-md-6" >
                    <b>Industry</b>: 
                    {{ $c->industry->name }}
                </div>
                <div class="col-md-6" >
                    <b>Company Size</b>: 
                    {{ $c->companySize->lower_limit }} - {{ $c->companySize->upper_limit }} people
                </div>
                <div class="col-md-6" >
                    <b>Country</b>: 
                    {{ $c->location->country->name }}
                </div>
                <div class="col-md-6" >
                    <b>Location</b>: 
                    {{ $c->location->name }}
                </div>
                <hr>
                <div class="col-md-6" >
                    <b>All Vacancies</b>: 
                    {{ count($c->posts) }}
                </div>
                <div class="col-md-6" >
                    <b>Live Vacancies</b>: 
                    {{ count($c->activePosts) }}
                </div>
                @empty
                <p>No company records found. <a href="/vacancies/create">Create Company</a></p>
                @endforelse

            
            

        	@elseif($user->role == 'admin')

        	<h5>Role: Administrator</h5>
        	<p>
        		Name: <b>{{ $user->name }}</b> <br>
        	</p>

        	@elseif($user->role == 'super')

        	<h5>Role: Super Administrator</h5>
        	<p>
        		Name: <b>{{ $user->name }}</b> <br>
        	</p>

        	@endif

        	
        	
        </div>
        <div class="clearfix"> </div>
       </div>
       
	</div>
</div>

@endsection
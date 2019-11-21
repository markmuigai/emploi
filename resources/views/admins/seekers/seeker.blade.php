@extends('layouts.seek')

@section('title','Emploi Admin :: '.$seeker->user->name)

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')

<div class="container">
    <div class="single">  
	   <div class="form-container row">
        <h2 class="col-md-8 col-md-offset-2">
        	<small>
        		<a href="#" onclick="window.history.back()" class="btn btn-sm btn-success">
        			<i class="fa fa-arrow-left"></i>
        		</a>
        	</small>
        	{{ $seeker->user->name }}
        	
        </h2>
        
        <div class=" row" style="text-align: center; ">

            <div class="col-md-3 " style="">
                <img src="{{ asset($seeker->user->getPublicAvatarUrl()) }}" style="width: 100%">

                <br>
                {{ '@'.$seeker->user->username }} <a href="{{ $seeker->resumeUrl }}" class="btn btn-sm btn-danger">View Resume</a>
            </div>

            <div class="col-md-9 row" style=" text-align: left;">
                <div class="col-md-6 hover-bottom" style="margin-bottom: 0.5em">
                    <b>Industry:</b> {{ $seeker->industry->name }}
                </div>
                <div class="col-md-6 hover-bottom" style="margin-bottom: 0.5em">
                    <b>Public Name:</b> {{ $seeker->public_name }}
                </div>
                <div class="col-md-6 hover-bottom" style="margin-bottom: 0.5em">
                    <b>Current Position:</b> {{ $seeker->current_position ?  $seeker->current_position : 'N/A' }}
                </div>
                <div class="col-md-6 hover-bottom" style="margin-bottom: 0.5em">
                    <b>Years Experience:</b> {{ $seeker->years_experience }}
                </div>
                <div class="col-md-6 hover-bottom" style="margin-bottom: 0.5em">
                    <b>Highest Education Level:</b> {{ $seeker->education_level_id ? $seeker->educationLevel->name : 'Not Stated' }}
                </div>
                <div class="col-md-6 hover-bottom" style="margin-bottom: 0.5em">
                    <b>Age:</b> {{ $seeker->date_of_birth ? $seeker->age.' years' : 'Not Stated' }}
                </div>

                <div class="col-md-6 hover-bottom" style="margin-bottom: 0.5em">
                    <b>Gender:</b> {{ $seeker->sex }}
                </div>
                <div class="col-md-6 hover-bottom" style="margin-bottom: 0.5em">
                    <b>Location:</b> {{ $seeker->location_id ? $seeker->location->name.', '.$seeker->location->country->name : 'Not Stated' }}
                </div>
                <br>
                <hr>
                <div class="hover-bottom" style="margin-bottom: 1em">
                    <b>Career Objective</b> <br>
                    <?php echo $seeker->objective ? $seeker->objective : 'Objective not stated'; ?>
                </div>

                <div class="row">

                    <div class="col-md-6 hover-bottom">
                        <b>Education Background</b> <br>
                        @if(!is_array($seeker->education()))
                            <?php echo $seeker->education; ?>
                        @else
                            @forelse($seeker->education() as $edu)
                            <div class="row no-gutters justify-content-between edu pb-5">
                                <div class="circle"></div>
                                <div class="col-lg-3 col-12 ml-3">
                                    <p>{{ $edu[0] }}</p>

                                </div>
                                <div class="col-lg-8 col-12 ml-lg-0 ml-md-3">
                                    <h6>{{ $edu[1] }}</h6>
                                    <p class="orange">{{ $edu[2] }}</p>
                                </div>
                            </div>
                            @empty
                            <p>
                                No education records highlighted.
                            </p>

                            @endforelse
                        @endif
                        
                    </div>

                    <div class="col-md-6 hover-bottom">
                        <b>Work Experience</b> <br>
                        @if(!is_array($seeker->experience()))
                            <?php echo $seeker->experience; ?>
                        @else
                            @forelse($seeker->experience() as $emp)
                            <div class="row no-gutters justify-content-between edu pb-5">
                                <div class="circle"></div>
                                <div class="col-lg-3 col-12 ml-3">
                                    <p>{{ $emp[0] }}</p>

                                </div>
                                <div class="col-lg-8 col-12 ml-lg-0 ml-md-3">
                                    <h6>{{ $emp[1] }}</h6>
                                    <p class="orange">{{ $emp[2] }} to {{ $emp[3] }}</p>
                                    <p>{{ $emp[4] }}</p>
                                </div>
                            </div>
                            @empty
                            <p>
                                No experience records have been highlighted
                            </p>
                            @endforelse
                        @endif
                    </div>
                    
                </div>

                
                
            </div>
		    
        	
		    
	    </div>
    </div>
 </div>
</div>


@endsection
@extends('layouts.dashboard-layout')

@section('title','Emploi Admin :: '.$seeker->user->name)

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@section('page_title', $seeker->user->name)

<div class="card">
    <div class="card-body">
        <div class="row align-items-center">
            <div class="col-lg-2 col-3">
                <img src="{{ asset($seeker->user->getPublicAvatarUrl()) }}" class="avatar-small">
            </div>
            <div class="col-lg-10 col-9">
                <p>
                    {{ '@'.$seeker->user->username }} 

                    @if($seeker->featured == 1)
                        <span style='color: #500095; font-weight: bold'>*FEATURED*</span>
                    @endif
                </p>
                @if($seeker->resume!=null)
                <a href="{{ $seeker->resumeUrl }}" class="btn btn-sm btn-orange">View Resume
                </a>
                @else
                <span style="color: red">CV Not Found!</span>
                @endif
                <form action="/admin/log-in-as" method="POST">
                    @csrf
                    <input type="hidden" name="user_id" value="{{ $seeker->user->id }}">
                    <input type="submit" name="" class="btn btn-sm btn-link pull-right" value="Login As">
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <p><strong>Industry:</strong> {{ $seeker->industry->name }}</p>
            </div>
            <div class="col-md-6">
                <p><strong>Public Name:</strong> {{ $seeker->public_name }}</p>
            </div>
            <div class="col-md-6">
                <p><strong>Current Position:</strong> {{ $seeker->current_position ?  $seeker->current_position : 'N/A' }}</p>
            </div>
            <div class="col-md-6">
                <p><strong>Years Experience:</strong> {{ $seeker->years_experience }}</p>
            </div>
            <div class="col-md-6">
                <p><strong>Highest Education Level:</strong> {{ $seeker->education_level_id ? $seeker->educationLevel->name : 'Not Stated' }}</p>
            </div>
            <div class="col-md-6">
                <p><strong>Age:</strong> {{ $seeker->date_of_birth ? $seeker->age.' years' : 'Not Stated' }}</p>
            </div>

            <div class="col-md-6">
                <p><strong>Gender:</strong> {{ $seeker->sex }}</p>
            </div>
            <div class="col-md-6">
                <p><strong>Location:</strong> {{ $seeker->location_id ? $seeker->location->name.', '.$seeker->location->country->name : 'Not Stated' }}</p>
            </div>
        </div>
        <hr>
        <h4>Career Objective</h4>
        <p>
            <?php echo $seeker->objective ? $seeker->objective : 'Objective not stated'; ?>
        </p>

        <hr>
        <h4>Education Background</h4>
        @if(!is_array($seeker->education()))
        <p>
            <?php echo $seeker->education; ?>
        </p>
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
        <p class="text-center">
            No education records highlighted.
        </p>

        @endforelse
        @endif
        <hr>
        <h4>Work Experience</h4>
        @if(!is_array($seeker->experience()))
        <p>
            <?php echo $seeker->experience; ?>
        </p>
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
        <p class="text-center">
            No experience records have been highlighted
        </p>       
        @endforelse
        @endif

        <div class="row" style="">
            <div class="col-md-12">
                <h4>Referees</h4>                
            </div>
            @forelse($seeker->referees as $ref)
            <div class="col-md-6 card">
                <strong> {{ $ref->name }}</strong>
                Relationship: {{ $ref->relationship }} <span style="font-style: italic;">  at {{ $ref->organization }}</span>
                <p>Updated at:  {{ $ref->updated_at->diffForHumans() }} </p>
                @if($ref->ready)                                                      
                <a href="/admin/referee/{{ $ref->slug }}">
                <i class="btn btn-primary">View Report</i>
                </a>
                @else
                <p style="color: red"> Referee has not provided assesment</p>
                <br>
                @endif              
            </div>                     
                @empty            
                <p style="text-align: center">No Referee Found</p>
            @endforelse                       
        </div>          
        
        <hr>
        <h4>Featured Job Seekers</h4>
        <form method="POST" action="/admin/toggle-seeker-featured">
            @csrf
            <input type="hidden" name="seeker_id" value="{{ $seeker->id }}">
            <select class="btn">
                <option value="1" {{ $seeker->featured == 1 ? 'selected=""' : '' }} >Featured</option>
                <option value="0" {{ $seeker->featured == 0 ? 'selected=""' : '' }} >Not Featured</option>
            </select>
            <input type="submit" value="Apply" class="btn btn-sm btn-primary">
        </form>
    </div>
</div>

@endsection
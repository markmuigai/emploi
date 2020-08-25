@extends('layouts.dashboard-layout')

@section('title','Emploi Admin :: Paas Professionals')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@section('page_title', 'Paas Professionals')

<div class="card">
    <div class="card-body">
        @forelse($seekers as $seeker)
        <div class="row">
            <div class="col-md-3">
                <img src="{{ asset($seeker->user->getPublicAvatarUrl()) }}" style="width: 100%; border-radius: 50%">
            </div>
            <div class="col-md-5 col-12">
                <h4>
                    <a href="/admin/seekers/{{ $seeker->user->username }}" class="orange">
                        {{ $seeker->user->name }}
                        @if($seeker->featured == 1 || $seeker->featured ==2)
                            <span style='color: #500095; font-weight: bold'>*FEATURED*</span>
                        @endif
                    </a>
                </h4>
                <p>{{ $seeker->industry->name }}</p>
                <p>Registered: {{ $seeker->user->created_at }}</p>
                <p>Last CV Update: {{ $seeker->user->updated_at }}</p>
                <div class="row">
                     <div class="col-md-7 col-12">
                              <?php $completed =  $seeker->user->seeker->calculateProfileCompletion(); ?>
                            <div class="progress" style="height: 5px">
                                <div class="progress-bar" role="progressbar"  aria-valuemin="0" aria-valuemax="100" style="width:{{ $completed }}%">
                                </div>
                            </div>
                            <p>{{ $completed }}% completed</p>
                        </div>
                        <div class="col-md-3 col-12">
                            <p><span class="fa fa-eye">: </span> {{ $seeker->view_count }}</p>
                        </div>                       
                </div>
            </div>
            <div class="col-md-4 col-12 text-md-right text-left">              
                <p><a href="mailto:{{ $seeker->user->email }}" class="orange">{{ $seeker->user->email }}</a></p>
                <p>{{ $seeker->phone_number }}</p>
                <p>{{ $seeker->sex }}</p>
                @if(!$seeker->user->seeker->resume)
                    <p>No CV Attached!</p>                
                <p>
                @else
                    <a href="{{ $seeker->user->seeker->resumeUrl }}" class="btn btn-orange">
                    <i class="fas fa-download"></i> Download CV
                    </a>
                </p>
                @endif
            </div>
        </div>
        <hr>
        @empty
        <p class="text-center">
            No Job seekers have been found!
        </p>
        @endforelse
        <hr>
        <div class="text-center">
            {{ $seekers->links() }}
        </div>
    </div>
</div>
@endsection

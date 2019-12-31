@extends('layouts.dashboard-layout')

@section('title','Emploi :: Active Jobs')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@section('page_title', 'Active Jobs')
<!-- NAV-TABS -->
<ul class="nav nav-tabs" id="jobs" role="tablist">
    <li class="nav-item">
        <a class="nav-link" href="/employers/jobs">All Jobs</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="/employers/jobs/shortlisting">Shortlisting</a>
    </li>
    <li class="nav-item">
        <a class="nav-link active" href="#active-jobs">Active Jobs</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="/employers/jobs/other">Other Jobs</a>
    </li>
</ul>

<!-- NAV-TAB CONTENT -->
<div class="tab-content pt-2" id="jobsContent">
    <!-- ALL JOBS -->
    <div class="tab-pane fade  " id="all-jobs" role="tabpanel" aria-labelledby="all-jobs-tab">
        
    </div>
    <!-- END OF ALL JOBS -->
    <!-- ACTIVE JOBS -->
    <div class="tab-pane show fade active" id="active-jobs" role="tabpanel" aria-labelledby="active-jobs-tab">
        @forelse($activePosts as $post)
        <div class="card py-2 mb-4">
            <div class="card-body">
                <div class="row">

                    <div class="col-12 col-md-6 col-lg-8">
                        <h4><a href="/employers/applications/{{ $post->slug }}">{{ $post->title }}<span class="badge badge-light">{{ $post->positions }} Position{{ $post->positions == 1 ? '' : 's' }}</span></a></h4>
                        <p><i class="fas fa-map-marker-alt orange"></i> {{ $post->location->country->name }}, {{ $post->location->name }}</p>
                        <p>

                            <span class="badge {{ $post->vacancyType->badge }}">{{ $post->vacancyType->name }}</span>
                        </p>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4 job-actions">
                        <p><i class="far fa-calendar-check"></i> {{ $post->readableDeadline }}</p>
                        <p>
                            <strong>{{ $post->monthlySalary() }} p.m.</strong>
                        </p>
                        @if($post->how_to_apply)
                        <p>Alternative Application</p>
                        @else
                        <p>No. of Applicants: {{ count($post->applications) }}</p>
                        @endif

                    </div>

                </div>
                <hr>
                <div class="row justify-content-between align-items-center">
                    <div class="col-12 col-md-6 col-lg-4">
                        <p>
                            @if($post->isActive)
                            <i class="fas fa-share-alt"></i>
                            Share:
                            <a href="{{ $post->shareFacebookLink }}" target="_blank"><i class="fab fa-facebook-f"></i></a>
                            <a href="{{ $post->shareTwitterLink }}" target="_blank"><i class="fab fa-twitter"></i></a>
                            <a href="{{ $post->shareLinkedinLink }}" target="_blank"><i class="fab fa-linkedin"></i></a>
                            @else
                            <span>Sharing Disabled</span>
                            @endif

                        </p>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4 job-actions">
                        <a href="/vacancies/{{ $post->slug }}/edit" class="orange"><i class="fas fa-edit orange"></i> Edit</a>
                        @if($post->status == 'active')
                        | <a href="/vacancies/laravel-developer/deactivate"><i class="fas fa-trash-alt"></i> Deactivate</a>

                        @elseif($post->status == 'closed')
                        | <a href="/vacancies/laravel-developer/activate"><i class="far fa-eye"></i> Activate</a>
                        @else
                        <em class="text-danger">Not Verified</em>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        @empty
        <div class="card">
            <div class="card-body text-center">
                <p>No Active Job posts found</p>
            </div>
        </div>
        @endforelse

    </div>
    <div>
        {{ $activePosts->links() }}
    </div>
    <!-- END OF ACTIVE JOBS -->

    <!-- CLOSED JOBS -->
    <div class="tab-pane fade" id="closed-jobs" role="tabpanel" aria-labelledby="closed-jobs-tab">
        

    </div>
    <!-- END OF CLOSED JOBS -->

</div>

@endsection

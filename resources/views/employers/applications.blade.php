@extends('layouts.dashboard-layout')

@section('title','Emploi :: '.$post->getTitle())

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@section('page_title', $post->title.' Candidates')

<!-- NAV-TABS -->
<ul class="nav nav-tabs" id="allCandidates" role="tablist">
    <li class="nav-item">
        <a class="nav-link active" id="all-candidates-tab" data-toggle="tab" href="#all-candidates" role="tab" aria-controls="all-candidates" aria-selected="true">All ({{ count($post->applications) }})</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="shortlist-tab" data-toggle="tab" href="#shortlist" role="tab" aria-controls="shortlist" aria-selected="false">Shortlisted ({{ count($post->shortlisted) }})</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="selected-tab" data-toggle="tab" href="#selected" role="tab" aria-controls="selected" aria-selected="false">Selected ({{ count($post->selected) }})</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="unrejected-jobs-tab" data-toggle="tab" href="#unrejected-jobs" role="tab" aria-controls="unrejected-jobs" aria-selected="false">Not Rejected ({{ count($post->unrejected) }})</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="rejected-jobs-tab" data-toggle="tab" href="#rejected-jobs" role="tab" aria-controls="rejected-jobs" aria-selected="false">Rejected ({{ count($post->rejected) }})</a>
    </li>
    
</ul>
<div class="row">
    <div class="col-lg-9 col-12">
        <!-- NAV-TAB CONTENT -->
        <div class="tab-content pt-2" id="allCandidatesContent">
            <!-- ALL CANDIDATES -->
            <div class="tab-pane fade show active" id="all-candidates" role="tabpanel" aria-labelledby="all-candidates-tab">
                <?php $pool = $shortlist ? $post->shortlisted: $post->applications; $kk=0; ?>

                <!-- JOB CARD -->
                
                @forelse($pool as $a)
                    @include('components.applicant')
                    <?php $kk++; ?>
                    @if($kk%3==0)
                        @include('components.ads.responsive')
                    @endif
                @empty
                    <div class="card mb-4">
                        <div class="card-body">
                            <p class="text-center">
                                No applications have been found
                            </p>
                        </div>
                    </div>
                @endforelse
                    
            </div>
            <div class="tab-pane fade" id="shortlist" role="tabpanel" aria-labelledby="shortlist-tab">
                <!-- JOB CARD -->
                @if(count($post->shortlisted) > 0)
                    @forelse($post->shortlisted as $a)
                        @include('components.applicant')
                    @empty
                    @endforelse
                @else
                    <p class="text-center">
                        No applicants have been shortlisted
                    </p>
                @endif
                <!-- END OF JOB CARD -->
            </div>
            <div class="tab-pane fade" id="selected" role="tabpanel" aria-labelledby="selected-tab">
                <!-- JOB CARD -->
                        @if(count($post->selected) > 0)
                        @forelse($post->selected as $a)
                            @include('components.applicant')
                        @empty
                        @endforelse
                        @else
                        <p class="text-center">
                            No applicants have been selected
                        </p>
                        @endif
                <!-- END OF JOB CARD -->
            </div>
            <div class="tab-pane fade show active" id="unrejected-jobs" role="tabpanel" aria-labelledby="unrejected-jobs">

                <!-- JOB CARD -->
                
                @forelse($post->unrejected as $a)
                    @include('components.applicant')
                @empty
                    <div class="card mb-4">
                        <div class="card-body">
                            <p class="text-center">
                                No applications have not been rejected
                            </p>
                        </div>
                    </div>
                @endforelse
                    
            </div>
            <div class="tab-pane fade" id="rejected-jobs" role="tabpanel" aria-labelledby="rejected-jobs-tab">
                <!-- JOB CARD -->
                
                        @if(count($post->rejected) > 0)
                            @forelse($post->rejected as $a)
                                @include('components.applicant')
                            @empty
                            @endforelse
                        @else
                        <p class="text-center">
                            No applicants have been rejected
                        </p>
                        @endif
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-12">
        <div class="card mt-2">
            <div class="card-body text-center">
                <h4>Actions</h4>
                <div class="d-flex flex-column justify-content-center align-items-center">
                    <a href="/employers/applications/{{ $post->slug }}/rsi" class="btn btn-sm btn-danger" title="Role Suitability Index Model"><i class="far fa-file-alt"></i> Shortlist</a>
                    <p>
                        @if(!$post->hasModelSeeker())
                        <small  title="Role Suitability Index Model">Create an RSI Model to shortlist candidates.</small>
                        @else
                        <small title="Role Suitability Index Model">Edit your RSI Model.</small>
                        @endif
                    </p>
                    @if($post->status == 'active')
                    <a href="/employers/applications/{{ $post->slug }}/invite" class="btn btn-success btn-sm"><i class="fas fa-share"></i> Invite</a>
                    @endif
                    <a href="/employers/applications/{{ $post->slug }}/close" class="btn btn-info btn-sm"> <i class="fas fa-users"></i> Select</a>
                </div>
                @if(count($post->shortlisted) > 0)
                <br><br>
                <h4 class="m_1">Shortlisted Candidates</h4>
                @forelse($post->shortlisted as $a)
                <p class="py-1">
                    {{ $a->user->name }} | <span class="pull-right">
                        <a href="/employers/applications/{{ $post->slug }}/{{ $a->id }}/rsi">
                            {{ $a->user->seeker->getRsi($post) }}%
                        </a>
                    </span>
                </p>
                @empty
                @endforelse
                @else
                @endif
            </div>
        </div>
    </div>
</div>

@endsection

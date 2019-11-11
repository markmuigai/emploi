@extends('layouts.general-layout')
{{--@extends('layouts.seek')--}}

@section('title','Emploi :: Dashboard')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@section('page_title', 'Candidates')

<!-- NAV-TABS -->
<ul class="nav nav-tabs" id="allCandidates" role="tablist">
    <li class="nav-item">
        <a class="nav-link active" id="all-candidates-tab" data-toggle="tab" href="#all-candidates" role="tab" aria-controls="all-candidates" aria-selected="true">All Candidates ({{ count($post->applications) }})</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="shortlist-tab" data-toggle="tab" href="#shortlist" role="tab" aria-controls="shortlist" aria-selected="false">Shortlisted Candidates ({{ count($post->shortlisted) }})</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="selected-tab" data-toggle="tab" href="#selected" role="tab" aria-controls="selected" aria-selected="false">Selected Candidates</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="rejected-jobs-tab" data-toggle="tab" href="#rejected-jobs" role="tab" aria-controls="rejected-jobs" aria-selected="false">Rejected Candidates</a>
    </li>
</ul>
<div class="row">
    <div class="col-lg-9 col-12">
        <!-- NAV-TAB CONTENT -->
        <div class="tab-content pt-2" id="allCandidatesContent">
            <!-- ALL JOBS -->
            <div class="tab-pane fade show active" id="all-candidates" role="tabpanel" aria-labelledby="all-candidates-tab">
                <?php $pool = $shortlist ? $post->shortlisted: $post->applications; $kk=0; ?>
                @forelse($pool as $a)
                <p class="d-none">{{ $a->user->seeker->industry->name }}
                    <a href="/employers/applications/{{ $post->slug }}/{{ $a->id }}/rsi" title="View Details">
                        <span style="float: right; color: #500095; font-weight: bold">RSI {{ $a->user->seeker->getRsi($post) }}%</span>
                    </a>
                </p>

                <!-- JOB CARD -->
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-2 col-3">
                                <img src="{{ asset($a->user->getPublicAvatarUrl()) }}" class="avatar-small">
                            </div>
                            <div class="col-5 col-md-5 col-lg-6">
                                <h4>{{ $a->user->name }}</h4>
                                <p class="text-success">{{ $a->user->seeker->industry->name }}</p>
                                <p><i class="fas fa-map-marker-alt orange"></i> {{ $a->user->seeker->location->name }},
                                    {{ $a->user->seeker->location->country->name }}</p>
                            </div>
                            <div class="col-4 col-md-4 col-lg-4 text-center">
                                <p>
                                    <i class="far fa-star"></i>
                                </p>
                                <h5>RSI {{ $a->user->seeker->getRsi($post) }}%</h5>
                                <p>
                                    <i class="far fa-eye"></i> 234 Views
                                </p>
                            </div>
                        </div>
                        <hr>
                        <div class="row justify-content-between align-items-center">
                            <div class="col-12 col-md-6 col-lg-6">
                                <span class="badge badge-secondary">CSS</span>
                                <span class="badge badge-secondary">HTML</span>
                                <span class="badge badge-secondary">Photoshop</span>
                            </div>
                            <div class="col-12 col-md-6 col-lg-5 d-flex justify-content-between align-items-center">
                                <p class="orange">Exp. 3 years</p>
                                <a href="/employers/browse/{{ $a->user->username }}" class=" btn btn-orange">View Profile</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END OF JOB CARD -->
                <?php $kk++; ?>
                @empty
                <p class="text-center">
                    No applications have been found
                </p>
                @endforelse
            </div>
            <div class="tab-pane fade" id="shortlist" role="tabpanel" aria-labelledby="shortlist-tab">
                @if(count($post->shortlisted) > 0)
                @forelse($post->shortlisted as $a)
                <!-- JOB CARD -->
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-2 col-3">
                                <img src="{{ asset($a->user->getPublicAvatarUrl()) }}" class="avatar-small">
                            </div>
                            <div class="col-5 col-md-5 col-lg-6">
                                <h4>{{ $a->user->name }}</h4>
                                <p class="text-success">{{ $a->user->seeker->industry->name }}</p>
                                <p><i class="fas fa-map-marker-alt orange"></i> {{ $a->user->seeker->location->name }},
                                    {{ $a->user->seeker->location->country->name }}</p>
                            </div>
                            <div class="col-4 col-md-4 col-lg-4 text-center">
                                <p>
                                    <i class="far fa-star"></i>
                                </p>
                                <h5>RSI {{ $a->user->seeker->getRsi($post) }}%</h5>
                                <p>
                                    <i class="far fa-eye"></i> 234 Views
                                </p>
                            </div>
                        </div>
                        <hr>
                        <div class="row justify-content-between align-items-center">
                            <div class="col-12 col-md-6 col-lg-6">
                                <span class="badge badge-secondary">CSS</span>
                                <span class="badge badge-secondary">HTML</span>
                                <span class="badge badge-secondary">Photoshop</span>
                            </div>
                            <div class="col-12 col-md-6 col-lg-5 d-flex justify-content-between align-items-center">
                                <p class="orange">Exp. 3 years</p>
                                <a href="/employers/browse/{{ $a->user->username }}" class=" btn btn-orange">View Profile</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END OF JOB CARD -->
                @empty
                @endforelse
                @else
                <p class="text-center">
                    No applications have been found
                </p>
                @endif
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-12">
        <div class="card mt-2">
            <div class="card-body">
                <h6>Recent Applications</h6>
            </div>
        </div>
    </div>
</div>




<div class="col-12">
    <h4 class="m_1" style="text-align: center;">Actions</h4>
    <p style="text-align: center;">
        @if(!$shortlist)
        <a href="/employers/applications/{{ $post->slug }}?shortlist=true" style=";" class="btn btn-sm btn-info" title="Click to view Shortlist">Showing Applications ({{ count($post->applications) }})</a>
        @else
        <a href="/employers/applications/{{ $post->slug }}" style="" class="btn btn-sm btn-info" title="Click to view All Applications">Showing Shortlist({{ count($post->shortlisted) }})</a>
        @endif
        <br>
        <a href="/employers/applications/{{ $post->slug }}/rsi" class="btn btn-sm btn-danger">
            @if(!$post->hasModelSeeker())
            <i class="fa fa-warning" title="RSI Model Not Created"></i>
            @else
            <i class="fa fa-check" title=""></i>
            @endif
            Configure RSI Model
        </a>
        <br><br>
        @if($post->status == 'active')
        <a href="/employers/applications/{{ $post->slug }}/invite" class="btn btn-success btn-sm"><i class="fa fa-share"></i> Invite Candidates</a>
        <br><br>
        <a href="/employers/applications/{{ $post->slug }}/close" class="btn btn-info btn-sm"> <i class="fa fa-users"></i> Select Candidates</a>
        @endif
    </p>
    @if(count($post->shortlisted) > 0)
    <br><br>
    <h4 class="m_1">Shortlisted Candidates</h4>
    @forelse($post->shortlisted as $a)
    <p style="padding: 0.5em 0">
        {{ $a->user->name }} | <span style="float: right;">
            |
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

@endsection
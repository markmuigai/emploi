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
        <a class="nav-link active" id="all-candidates-tab" data-toggle="tab" href="#all-candidates" role="tab" aria-controls="all-candidates" aria-selected="true">All Candidates ({{ count($post->applications) }})</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="shortlist-tab" data-toggle="tab" href="#shortlist" role="tab" aria-controls="shortlist" aria-selected="false">Shortlisted ({{ count($post->shortlisted) }})</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="selected-tab" data-toggle="tab" href="#selected" role="tab" aria-controls="selected" aria-selected="false">Selected ({{ count($post->selected) }})</a>
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
                <div class="card mb-4">
                    <div class="card-body">
                        <p class="d-none">{{ $a->user->seeker->industry->name }}
                            <a href="/employers/applications/{{ $post->slug }}/{{ $a->id }}/rsi" title="View Details">
                                <span class="pull-right purple"><strong>RSI {{ $a->user->seeker->getRsi($post) }}%</strong></span>
                            </a>
                        </p>
                        <div class="row align-items-center">
                            <div class="col-lg-2 col-4">
                                <img src="{{ asset($a->user->getPublicAvatarUrl()) }}" class="avatar-small" alt="{{ $a->user->name }}">
                            </div>
                            <div class="col-8 col-md-8 col-lg-10">
                                <div class="row align-items-center">
                                    <div class="col-12 col-md-8 col-lg-8">
                                        <h4>{{ $a->user->name }}</h4>
                                        <p class="text-success">{{ $a->user->seeker->industry->name }}</p>
                                        @if(isset($a->user->seeker->location_id))
                                        <p><i class="fas fa-map-marker-alt orange"></i> {{ $a->user->seeker->location->name }},
                                            {{ $a->user->seeker->location->country->name }}</p>
                                        @endif
                                    </div>
                                    <div class="col-12 col-md-4 col-lg-4 pt-md-2 text-md-center">
                                        <h5>RSI {{ $a->user->seeker->getRsi($post) }}%</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row justify-content-between align-items-center">
                            <div class="col-12 col-md-6 col-lg-6">
                                @if($a->status == 'rejected')
                                <a href="/employers/reject-toggle/{{ $post->slug }}/{{ $a->user->username }}" class="text-danger"><strong>Cancel Reject</strong></a>
                                @else

                                @if($a->status == 'selected')
                                <a href="#" class="text-success"> <i class="fas fa-check"></i> <strong>SELECTED</strong></a>
                                @else

                                @if($post->isShortlisted($a->user->seeker))
                                <a href="/employers/shortlist-toggle/{{$post->slug}}/{{$a->user->username}}" title="Remove from Shortlist">Shortlisted</a>

                                @else
                                <a href="/employers/shortlist-toggle/{{$post->slug}}/{{$a->user->username}}" title="Add to Shortlist">Not Shortlisted</a>
                                @endif
                                |
                                <a href="/employers/reject-toggle/{{ $post->slug }}/{{ $a->user->username }}" class="text-danger">Reject</a>
                                @endif
                                @endif
                            </div>
                            <div class="col-12 col-md-6 col-lg-5 text-md-right">
                                <a class="orange mr-2" href="/employers/applications/{{ $post->slug }}/{{ $a->id }}/rsi">Actions</a>
                                <a href="/employers/browse/{{ $a->user->username }}" class=" btn btn-orange">View Profile</a>
                            </div>
                        </div>
                    </div>
                </div>
                        <?php $kk++; ?>
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
                <div class="card mb-4">
                    <div class="card-body">
                        @if(count($post->shortlisted) > 0)
                        @forelse($post->shortlisted as $a)
                        <div class="row">
                            <div class="col-lg-2 col-3">
                                <img src="{{ asset($a->user->getPublicAvatarUrl()) }}" class="avatar-small" alt="{{ $a->user->name }}">
                            </div>
                            <div class="col-5 col-md-5 col-lg-6">
                                <h4>{{ $a->user->name }}</h4>
                                <p class="text-success">Industry Name</p>
                                <p><i class="fas fa-map-marker-alt orange"></i> {{ $a->user->seeker->location->name }},
                                    {{ $a->user->seeker->location->country->name }}</p>
                            </div>
                            <div class="col-4 col-md-4 col-lg-4 text-center">
                                <h5>RSI {{ $a->user->seeker->getRsi($post) }}%</h5>
                            </div>
                        </div>
                        <hr>
                        <div class="row justify-content-between align-items-center">
                            <div class="col-12 col-md-6 col-lg-6">
                                @if($post->isShortlisted($a->user->seeker))
                                <a href="/employers/shortlist-toggle/{{$post->slug}}/{{$a->user->username}}" title="Remove from Shortlist">Shortlisted</a>

                                @else
                                <a href="/employers/shortlist-toggle/{{$post->slug}}/{{$a->user->username}}" title="Add to Shortlist">Not Shortlisted</a>
                                @endif

                                |

                                <a href="/employers/reject-toggle/{{ $post->slug }}/{{ $a->user->username }}" class="text-danger">Reject</a>
                            </div>
                            <div class="col-12 col-md-6 col-lg-5 d-flex justify-content-between align-items-center">
                                <a class="orange" href="/employers/applications/{{ $post->slug }}/{{ $a->id }}/rsi">Actions</a>
                                <a href="/employers/browse/{{ $a->user->username }}" class=" btn btn-orange">View Profile</a>
                            </div>
                        </div>
                        @empty
                        @endforelse
                        @else
                        <p class="text-center">
                            No applicants have been shortlisted
                        </p>
                        @endif
                    </div>
                </div>
                <!-- END OF JOB CARD -->
            </div>
            <div class="tab-pane fade" id="selected" role="tabpanel" aria-labelledby="selected-tab">
                <!-- JOB CARD -->
                <div class="card mb-4">
                    <div class="card-body">
                        @if(count($post->selected) > 0)
                        @forelse($post->selected as $a)
                        <div class="row">
                            <div class="col-lg-2 col-3">
                                <img src="{{ asset($a->user->getPublicAvatarUrl()) }}" class="avatar-small" alt="{{ $a->user->name }}">
                            </div>
                            <div class="col-5 col-md-5 col-lg-6">
                                <h4>{{ $a->user->name }}</h4>
                                <p class="text-success">{{ $a->user->seeker->industry->name }}</p>
                                <p><i class="fas fa-map-marker-alt orange"></i> {{ $a->user->seeker->location->name }},
                                    {{ $a->user->seeker->location->country->name }}</p>
                            </div>
                            <div class="col-4 col-md-4 col-lg-4 text-center">

                                <h5>RSI {{ $a->user->seeker->getRsi($post) }}%</h5>

                            </div>
                        </div>
                        <hr>
                        <div class="row justify-content-between align-items-center">
                            <div class="col-12 col-md-6 col-lg-6">



                            </div>
                            <div class="col-12 col-md-6 col-lg-5 d-flex justify-content-between align-items-center">
                                <a class="orange" href="/employers/applications/{{ $post->slug }}/{{ $a->id }}/rsi">Actions</a>
                                <a href="/employers/browse/{{ $a->user->username }}" class=" btn btn-orange">View Profile</a>
                            </div>
                        </div>
                        @empty
                        @endforelse
                        @else
                        <p class="text-center">
                            No applicants have been selected
                        </p>
                        @endif
                    </div>
                </div>
                <!-- END OF JOB CARD -->
            </div>
            <div class="tab-pane fade" id="rejected-jobs" role="tabpanel" aria-labelledby="rejected-jobs-tab">
                <!-- JOB CARD -->
                <div class="card mb-4">
                    <div class="card-body">
                        @if(count($post->rejected) > 0)
                        @forelse($post->rejected as $a)
                        <div class="row">
                            <div class="col-lg-2 col-3">
                                <img src="{{ asset($a->user->getPublicAvatarUrl()) }}" class="avatar-small" alt="{{ $a->user->name }}">
                            </div>
                            <div class="col-5 col-md-5 col-lg-6">
                                <h4>{{ $a->user->name }}</h4>
                                <p class="text-success">{{ $a->user->seeker->industry->name }}</p>
                                @if(isset($a->user->seeker->location_id))
                                <p><i class="fas fa-map-marker-alt orange"></i> {{ $a->user->seeker->location->name }},
                                    {{ $a->user->seeker->location->country->name }}</p>
                                @else
                                    

                                @endif
                            </div>
                            <div class="col-4 col-md-4 col-lg-4 text-center">
                                <h5>RSI {{ $a->user->seeker->getRsi($post) }}%</h5>
                            </div>
                        </div>
                        <hr>
                        <div class="row justify-content-between align-items-center">
                            <div class="col-12 col-md-6 col-lg-6">
                                <a href="/employers/reject-toggle/{{ $post->slug }}/{{ $a->user->username }}" class="text-danger"><strong>Cancel Reject</strong></a>
                            </div>
                            <div class="col-12 col-md-6 col-lg-5 d-flex justify-content-between align-items-center">
                                <a href="/employers/browse/{{ $a->user->username }}" class=" btn btn-orange pull-right">View Profile</a>
                            </div>
                        </div>
                        <!-- END OF JOB CARD -->
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
        </div>
    </div>
    <div class="col-lg-3 col-12">
        <div class="card mt-2">
            <div class="card-body text-center">
                <h4>Actions</h4>
                <div class="d-flex flex-column justify-content-center align-items-center">
                    <a href="/employers/applications/{{ $post->slug }}/rsi" class="btn btn-sm btn-danger"><i class="far fa-file-alt"></i> Shortlist</a>
                    <p>
                        @if(!$post->hasModelSeeker())
                        <small>Create an RSI Model to shortlist candidates.</small>
                        @else
                        <small>Edit your RSI Model.</small>
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

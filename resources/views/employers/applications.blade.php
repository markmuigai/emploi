@extends('layouts.dashboard-layout')
{{--@extends('layouts.seek')--}}

@section('title','Emploi :: Dashboard')

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

                                <h5>RSI {{ $a->user->seeker->getRsi($post) }}%</h5>

                            </div>
                        </div>
                        <hr>
                        <div class="row justify-content-between align-items-center">
                            <div class="col-12 col-md-6 col-lg-6">
                                @if($a->status == 'rejected')
                                    <a href="/employers/reject-toggle/{{ $post->slug }}/{{ $a->user->username }}" style="color: red; font-weight: bold;"> Cancel Reject</a>
                                @else

                                    @if($a->status == 'selected')
                                        <a href="#" style="color: green; font-weight: bold;"> <i class="fa fa-check"></i> SELECTED</a>
                                    @else

                                        @if($post->isShortlisted($a->user->seeker))
                                            <a href="/employers/shortlist-toggle/{{$post->slug}}/{{$a->user->username}}" title="Remove from Shortlist">Shortlisted</a>

                                        @else
                                            <a href="/employers/shortlist-toggle/{{$post->slug}}/{{$a->user->username}}" title="Add to Shortlist">Not Shortlisted</a>
                                        @endif

                                        |

                                        <a href="/employers/reject-toggle/{{ $post->slug }}/{{ $a->user->username }}" style="color: red">Reject</a>

                                    @endif



                                @endif








                            </div>
                            <div class="col-12 col-md-6 col-lg-5 d-flex justify-content-between align-items-center">
                                <a class="orange" href="/employers/applications/{{ $post->slug }}/{{ $a->id }}/rsi">Actions</a>
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

                                <a href="/employers/reject-toggle/{{ $post->slug }}/{{ $a->user->username }}" style="color: red">Reject</a>
                            </div>
                            <div class="col-12 col-md-6 col-lg-5 d-flex justify-content-between align-items-center">
                                <a class="orange" href="/employers/applications/{{ $post->slug }}/{{ $a->id }}/rsi">Actions</a>
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
                    No applicants have been shortlisted
                </p>
                @endif
            </div>
            <div class="tab-pane fade" id="selected" role="tabpanel" aria-labelledby="selected-tab">
                @if(count($post->selected) > 0)
                @forelse($post->selected as $a)
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
                    </div>
                </div>
                <!-- END OF JOB CARD -->
                @empty
                @endforelse
                @else
                <p class="text-center">
                    No applicants have been selected
                </p>
                @endif
            </div>
            <div class="tab-pane fade" id="rejected-jobs" role="tabpanel" aria-labelledby="rejected-jobs-tab">
                @if(count($post->rejected) > 0)
                @forelse($post->rejected as $a)
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

                                <h5>RSI {{ $a->user->seeker->getRsi($post) }}%</h5>

                            </div>
                        </div>
                        <hr>
                        <div class="row justify-content-between align-items-center">
                            <div class="col-12 col-md-6 col-lg-6">


                                <a href="/employers/reject-toggle/{{ $post->slug }}/{{ $a->user->username }}" style="color: red; font-weight: bold;"> Cancel Reject</a>
                            </div>
                            <div class="col-12 col-md-6 col-lg-5 d-flex justify-content-between align-items-center">

                                <a href="/employers/browse/{{ $a->user->username }}" class=" btn btn-orange pull-right">View Profile</a>
                            </div>
                        </div>
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
    <div class="col-lg-3 col-12">
        <div class="card mt-2">
            <div class="card-body">
                <h4 class="m_1" style="text-align: center;">Actions</h4>
                <p style="text-align: center;">

                    <a href="/employers/applications/{{ $post->slug }}/rsi" class="btn btn-sm btn-danger">
                        @if(!$post->hasModelSeeker())
                        <i class="fa fa-warning" title="RSI Model Not Created"></i>
                        @else
                        <i class="fa fa-check" title=""></i>
                        @endif
                        Configure RSI
                    </a>
                    <br>
                    @if($post->status == 'active')
                    <a href="/employers/applications/{{ $post->slug }}/invite" class="btn btn-success btn-sm"><i class="fa fa-share"></i> Invite</a>
                    <br>
                    <a href="/employers/applications/{{ $post->slug }}/close" class="btn btn-info btn-sm"> <i class="fa fa-users"></i> Select</a>
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
        </div>
    </div>
</div>




<div class="col-12">

</div>

@endsection

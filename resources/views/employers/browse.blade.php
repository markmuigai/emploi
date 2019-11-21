@extends('layouts.dashboard-layout')

@section('title','Emploi :: Browse CVs')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@section('page_title', 'Browse Candidates')

<!-- SEARCH CANDIDATES -->
<form method="get" action="/employers/browse">
    <div class="form-row">
        <div class="form-group col-md-4">
            <input type="text" name="q" placeholder="Search" class="form-control" value="{{ $query }}">
        </div>
        <div class="form-group col-md-4">
            <select name="industry" class="custom-select">
                <option value="">All Industries</option>
                @forelse($industries as $i)
                <option value="{{ $i->slug }}" @if(isset($industry->id) && $i->id == $industry->id)
                    selected=""
                    @endif
                    >{{ $i->name }}</option>
                @empty
                @endforelse
            </select> </div>
        <div class="form-group col-md-4">
            <select name="location" class="custom-select">
                <option value="">All Locations</option>
                @forelse($locations as $i)
                <option value="{{ $i->id }}" @if(isset($location->id) && $i->id == $location->id)
                    selected=""
                    @endif
                    >{{ $i->name }}</option>
                @empty
                @endforelse
            </select>
        </div>
    </div>
    <div class="text-right">
        <button type="submit" name="button" class="btn btn-orange">Search</button>
    </div>
</form>
<!-- END OF SEARCH CANDIDATES -->

<!-- NAV-TABS -->
<ul class="nav nav-tabs" id="jobDetails" role="tablist">
    <li class="nav-item">
        <a class="nav-link active" id="job-description-tab" data-toggle="tab" href="#job-description" role="tab" aria-controls="job-description" aria-selected="true">All Candidates</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="shortlist-tab" data-toggle="tab" href="#shortlist" role="tab" aria-controls="shortlist" aria-selected="false">Shortlisted Candidates</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="selected-tab" data-toggle="tab" href="#selected" role="tab" aria-controls="selected" aria-selected="false">Selected Candidates</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="rejected-jobs-tab" data-toggle="tab" href="#rejected-jobs" role="tab" aria-controls="rejected-jobs" aria-selected="false">Rejected Candidates</a>
    </li>
</ul>

<!-- NAV-TAB CONTENT -->
<div class="tab-content pt-2" id="jobDetailsContent">
    <!-- ALL JOBS -->
    <div class="tab-pane fade show active" id="job-description" role="tabpanel" aria-labelledby="job-description-tab">
        <!-- JOB CARD -->
        @forelse($seekers as $s)

        <div class="card py-2 mb-4">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-2 col-3">
                        <img src="{{ asset($s->user->getPublicAvatarUrl()) }}" class="avatar-small">
                    </div>
                    <div class="col-5 col-md-5 col-lg-6">
                        <h4>
                            <a style="font-weight: bold; font-size: 110%" href="/employers/browse/{{ $s->user->username }}">
                                {{ $s->public_name }}
                            </a>
                        </h4>
                        <p class="text-success">{{ $s->current_position ? $s->current_position : 'N/A' }}</p>
                        <p>{{ $s->industry->name }}</p>
                        <p><i class="fas fa-map-marker-alt orange"></i>
                            @if(isset($s->location))
                            {{ $s->location->name.', '.$s->location->country->code }}
                            @else
                            {{ $s->country->name }}
                            @endif
                        </p>
                    </div>
                    <div class="col-4 col-md-4 col-lg-4 text-center">
                        <p><i class="far fa-star"></i></p>
                        <h5>88%</h5>
                        <p> <i class="far fa-eye"></i> 234 Views</p>
                    </div>
                </div>
                <hr>
                <div class="row justify-content-between align-items-center">
                    <div class="col-12 col-md-6 col-lg-6">
                        <span class="badge badge-secondary">CSS</span>
                        <span class="badge badge-secondary">HTML</span>
                        <span class="badge badge-secondary">Photoshop</span>
                    </div>
                    <div class="col-12 col-md-6 col-lg-5 d-flex justify-content-end align-items-center">
                        <p class="orange mr-3">Experience: {{ $s->years_experience ? $s->years_experience.' years' : 'N/A' }}</p>
                        <a href="/employers/browse/{{ $s->user->username }}" class="btn btn-orange">View Profile</a>
                    </div>
                </div>
            </div>
        </div>
        @empty
        <div class="text-center">
            <p>No Job Seekers found</p>
        </div>
        @endforelse
        <!-- END OF JOB CARD -->
    </div>
    <!-- END OF ALL JOBS -->
    <!-- ACTIVE JOBS -->
    <div class="tab-pane fade" id="shortlist" role="tabpanel" aria-labelledby="shortlist-tab">


    </div>
    <!-- END OF ACTIVE JOBS -->

    <!-- CLOSED JOBS -->
    <div class="tab-pane fade" id="selected-jobs" role="tabpanel" aria-labelledby="selected-jobs-tab">


    </div>
    <!-- END OF CLOSED JOBS -->
    <!-- CLOSED JOBS -->
    <div class="tab-pane fade" id="rejected-jobs" role="tabpanel" aria-labelledby="rejected-jobs-tab">


    </div>
    <!-- END OF CLOSED JOBS -->
</div>





<div class="container">
    <div class="single">
        <div class="form-container row">
            <div class="search_form1 row d-none">

                @forelse($seekers as $s)

                <div class="col-md-6 col-xs-6 row hover-bottom" style="margin-bottom: 0.5em">
                    <a style="font-weight: bold" href="/employers/browse/{{ $s->user->username }}">
                        <img src="{{ asset($s->user->getPublicAvatarUrl()) }}" style="border-radius: 50%" class="col-md-4 col-xs-4">
                    </a>
                    <div class="col-md-4 col-xs-4" style="padding: 1em; text-align: center;">
                        <p>
                            <a style="font-weight: bold; font-size: 110%" href="/employers/browse/{{ $s->user->username }}">
                                {{ $s->public_name }}
                            </a>
                            <br>

                        </p>
                        @if(count($s->matchSeeker(Auth::user())) > 0)
                        <p>
                            <form method="post" action="/employers/shortlist">
                                @csrf
                                <input type="hidden" name="seeker_id" value="{{ $s->id }}">
                                <select class="btn " name="post_id" required="required">
                                    <option>Shortlist for:</option>
                                    @forelse($s->matchSeeker(Auth::user()) as $post)
                                    @if(!$s->hasApplied($post))
                                    <option value="{{ $post->id }}">{{ $post->title }}</option>
                                    @endif
                                    @empty
                                    @endforelse
                                </select>
                                <button class="btn btn-sm btn-success">Go</button>
                            </form>
                        </p>
                        @endif
                    </div>
                </div>
                @empty
                @endforelse
            </div>
        </div>
    </div>
</div>

@endsection
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
                <option value="{{ $i->id }}" @if(isset($location) && $i->id == $location)
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
                        <img src="{{ asset($s->user->getPublicAvatarUrl()) }}" class="avatar-small" alt="{{ $s->user->username }}">
                    </div>
                    <div class="col-9 col-md-6 col-lg-10">
                        <h4>
                            <a href="/employers/browse/{{ $s->user->username }}">
                                <strong>{{ $s->public_name }}</strong>

                            </a>
                            @if($s->searching)
                            <span class="badge badge-success">Searching</span>
                            @endif
                        </h4>
                        <p class="text-success text-capitalize">{{ $s->current_position ? $s->current_position : 'N/A' }}</p>
                        <p>{{ $s->industry->name }}</p>
                        <p><i class="fas fa-map-marker-alt orange"></i>
                            @if(isset($s->location))
                            {{ $s->location->name.', '.$s->location->country->code }}
                            @else
                            {{ $s->country->name }}
                            @endif
                        </p>
                    </div>
                </div>
                <hr>
                <div class="row justify-content-between align-items-center">
                    <div class="col-12 col-md-6 col-lg-6">
                        @forelse($s->skills as $k)
                        <span class="badge badge-secondary">{{ $k->skill->name }}</span>
                        @empty
                        <p>No skills highlighted</p>
                        @endforelse
                    </div>
                    <div class="col-12 col-md-6 col-lg-5 d-flex justify-content-lg-end justify-content-start align-items-center">
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
        <div>
            {{ $seekers->links() }}
        </div>
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

@endsection

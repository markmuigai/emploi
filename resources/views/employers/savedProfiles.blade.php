@extends('layouts.dashboard-layout')

@section('title','Emploi :: Saved Profiles')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@section('page_title', 'Saved Profiles')

<!-- NAV-TAB CONTENT -->
<div class="tab-content pt-2" id="jobDetailsContent">
    <!-- ALL JOBS -->
    <div class="tab-pane fade show active" id="job-description" role="tabpanel" aria-labelledby="job-description-tab">
        <!-- JOB CARD -->
        @forelse($profiles as $p)
        <?php  $s = $p->seeker; ?>
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
                    <div class="col-12 col-md-6 col-lg-5 d-flex justify-content-end align-items-center">
                        <p class="orange mr-3">Experience: {{ $s->years_experience ? $s->years_experience.' years' : 'N/A' }}</p>
                        <a href="/employers/browse/{{ $s->user->username }}" class="btn btn-orange">View Profile</a>
                    </div>
                </div>
            </div>
        </div>
        @empty
        <div class="card">
          <div class="card-body">
            <div class="text-center">
                <p>No Job Seekers have been saved</p>
            </div>
          </div>
        </div>

        @endforelse
        <!-- END OF JOB CARD -->
    </div>
    <!-- END OF ALL JOBS -->

</div>

@endsection

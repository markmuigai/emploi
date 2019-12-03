@extends('layouts.dashboard-layout')

@section('title','Emploi :: @'.$user->username)

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@if(Auth::user()->role == 'seeker')
@include('seekers.search-input')
@endif


@section('page_title', $user->name)
<!-- NAV-TABS -->
<ul class="nav nav-tabs" id="jobDetails" role="tablist">
    <li class="nav-item">
        <a class="nav-link active" id="about-tab" data-toggle="tab" href="#about" role="tab" aria-controls="about" aria-selected="true">About {{ $user->name }}</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="education-tab" data-toggle="tab" href="#education" role="tab" aria-controls="education" aria-selected="false">Education</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="experience-tab" data-toggle="tab" href="#experience" role="tab" aria-controls="experience" aria-selected="false">Experience</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="skills-tab" data-toggle="tab" href="#skills" role="tab" aria-controls="skills" aria-selected="false">Skills</a>
    </li>
</ul>

<div class="row">
    <div class="col-lg-8 col-12">
        <!-- NAV-TAB CONTENT -->
        <div class="tab-content pt-2" id="jobDetailsContent">
            <!-- CANDIDATE DETAILS -->
            <div class="tab-pane fade show active" id="about" role="tabpanel" aria-labelledby="about-tab">
                <!-- INFO CARD -->
                <div class="card py-2 mb-4">
                    <div class="card-body">
                        <h4>About {{ $user->name }}</h4>
                        <div class="row mb-2 text-center about-icons">
                            <div class="col-md-4 col-6 my-3">
                                <i class="orange fas fa-map-marker-alt"></i>
                                <p>Location</p>
                                <p><strong>{{ $user->seeker->location_id ? $user->seeker->location->name.', '.$user->seeker->location->country->code : 'Not set' }}</strong></p>
                            </div>
                            <div class="col-md-4 col-6 my-3">
                                <i class="orange fas fa-network-wired"></i>
                                <p>Industry</p>
                                <p><strong>{{ $user->seeker->industry->name }}</strong></p>
                            </div>
                            <div class="col-md-4 col-6 my-3">
                                <i class="orange fas fa-user"></i>
                                <p>Gender</p>
                                <p><strong>{{ $user->seeker->sex }}</strong></p>
                            </div>
                            <div class="col-md-4 col-6 my-3">
                                <i class="orange fas fa-briefcase"></i>
                                <p>Experience</p>
                                <p><strong>{{ $user->seeker->years_experience }} Year(s)</strong></p>
                            </div>
                            <div class="col-md-4 col-6 my-3">
                                <i class="orange fas fa-graduation-cap"></i>
                                <p>Qualification</p>
                                <p><strong>{{ $user->seeker->education_level_id ? $user->seeker->educationLevel->name : 'Not set' }}</strong></p>
                            </div>
                            <div class="col-md-4 col-6 my-3">
                                <i class="orange fas fa-sort-amount-up-alt"></i>
                                <p>Career Level</p>
                                <p><strong>Manager</strong></p>
                            </div>
                        </div>
                        <h4>Career Objective</h4>
                        <p>{{  $user->seeker->objective ? $user->seeker->objective : 'Career Objective not included' }}</p>

                    </div>
                </div>
                <!-- END OF INFO CARD -->
            </div>
            <!-- END OF CANDIDATE DETAILS -->
            <!-- EDUCATION -->
            <div class="tab-pane fade" id="education" role="tabpanel" aria-labelledby="education-tab">
                <div class="card py-2 mb-4">
                    <div class="card-body">
                        <h4>Education and Qualification</h4>
                        @if(!is_array($user->seeker->education()))
                            <?php echo $user->seeker->education; ?>
                        @else
                            @forelse($user->seeker->education() as $edu)
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
                            <p>
                                No education records highlighted.
                            </p>
                            @endforelse
                        @endif

                    </div>
                </div>
            </div>
            <!-- END OF EDUCATION -->
            <!-- EXPERIENCE -->
            <div class="tab-pane fade" id="experience" role="tabpanel" aria-labelledby="experience-tab">
                <div class="card py-2 mb-4">
                    <div class="card-body">
                        <h4>Experience</h4>
                        @if(!is_array($user->seeker->experience()))
                            <?php echo $user->seeker->experience; ?>
                        @else
                            @forelse($user->seeker->experience() as $emp)
                            <div class="row no-gutters justify-content-between edu pb-5">
                                <div class="circle"></div>
                                <div class="col-lg-3 col-12 ml-3">
                                    <p>{{ $emp[0] }}</p>

                                </div>
                                <div class="col-lg-8 col-12 ml-lg-0 ml-md-3">
                                    <h6>{{ $emp[1] }}</h6>
                                    <p class="orange">{{ $emp[2] }}</p>
                                    <p></p>
                                </div>
                            </div>
                            @empty
                            <p>
                                No experience records have been highlighted
                            </p>
                            @endforelse
                        @endif
                    </div>
                </div>
            </div>
            <!-- END OF EXPERIENCE -->
            <!-- EXPERIENCE -->
            <div class="tab-pane fade" id="skills" role="tabpanel" aria-labelledby="skills-tab">
                <div class="card py-2 mb-4">
                    <div class="card-body">
                        <h4>Skills</h4>
                        <h5>
                            @forelse($user->seeker->skills as $s)
                            <span class="badge badge-secondary">{{ $s->skill->name }}</span>
                            @empty
                            <p>No skills highlighted</p>
                            @endforelse
                        </h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-12 pt-2 text-center">
        <div class="card">
            <div class="card-body">
                <div class="row justify-content-center">
                    <div class="col-5">
                        <img src="{{ $user->avatar ? '/storage/avatars/'.$user->avatar : '/images/avatar.png' }}" class="avatar-small" alt="{{ $user->public_name }}"  />
                    </div>
                </div>
                <div class="text-center">
                    <p><strong>{{ $user->name }}</strong></p>
                    @if( $user->seeker->featured != 0 )
                    <p class="text-success"><strong><i class='fa fa-star'></i> Featured</strong></p>
                    @endif
                    @if(isset($user->seeker->date_of_birth) && $user->seeker->age > 15)
                    <p>{{  $user->seeker->age.' years old' }}</p>
                    @endif

                    @if(Auth::user()->employer->canViewSeeker($user->seeker))

                        <p>Mail:
                            <a href="mailto:{{ $user->email }}">{{ $user->email }}</a>
                        </p>
                        @if(isset($user->seeker->phone_number))
                        <p>Phone:
                            <a href="tel:{{ $user->seeker->phone_number }}">{{ $user->seeker->phone_number }}</a>
                        </p>
                        @endif
                        <p>
                            <a href="{{ $user->seeker->resumeUrl }}" class="btn btn-orange">
                                <i class="fas fa-download"></i> Download CV
                            </a>
                        </p>
                    @else
                        @if(Auth::user()->employer->canRequestSeeker($user->seeker))
                            <p>
                                <a href="/employers/browse/{{ $user->username }}/request-cv" class="btn btn-orange">
                                     Request Profile & CV
                                </a>
                            </p>
                        @else
                            <p>CV Already Requested</p>
                        @endif
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>


<!-- INVITE FOR AN INTERVIEW -->
<div class="modal fade" id="inviteForInterviewModal" tabindex="-1" role="dialog" aria-labelledby="inviteForInterviewModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content p-3">
            <div class="modal-body">
                <h5 class="modal-title" id="inviteFriendsLabel">Invite For An Interview</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="fas fa-times" aria-hidden="true"></i>
                </button>
                <form action="">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-6">
                                <label for="">Interview Date</label>
                                <input id="" type="date" class="form-control my-1" placeholder="Interview Date">
                            </div>
                            <div class="col-6">
                                <label for="">Interview Time</label>
                                <input type="time" class="form-control my-1" id="" placeholder="Interview Time">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Interview Location</label>
                            <input type="text" name="" placeholder="Interview Location" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Any Special Instructions</label>
                            <textarea class="form-control" id="" rows="3" placeholder="Any Special Instructions"></textarea>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-orange pull-center">Send</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@extends('v2.layouts.app')

@section('content')
    <!-- Navbar -->
    @include('v2.components.jobseeker.navbar')
	<!-- End Navbar -->
	
	<!-- Dashboard -->
        <!-- Dashboard -->
        <div class="dashboard-area ptb-100 mt-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="profile-item">
                             <img src="{{ $user->avatar ? '/storage/avatars/'.$user->avatar : '/images/avatar.png' }}" class="img-responsive w-100" alt="My Avatar" />
                            <h2>{{ $user->getName() }}</h2>
                           {{ $user->seeker->current_position }}
                            {{ $user->email }}
                             {{ $user->seeker->phone_number }}
                        </div>
                        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                            <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="dashboard.html#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">
                                <i class='bx bx-user'></i>
                                My Profile
                            </a>
                            <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="dashboard.html#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">
                                <div class="profile-list">                               
                                    <i class='bx bxs-inbox'></i>
                                    <a href="profile/applications">
                                    Applied Jobs
                                </a>
                                </div>
                            </a>
                            <a href="#">
                                <div class="profile-list">
                                    <i class='bx bx-note'></i>
                                    My Resume
                                </div>
                            </a>
                            <a href="/v2/vacancies">
                                <div class="profile-list">
                                    <i class='bx bx-task'></i>
                                    Vacancies
                                </div>
                            </a>
                            <a href="profile/referees">
                                <div class="profile-list">
                                    <i class='bx bx-user'></i>
                                    Referees
                                </div>
                            </a>
                            <a  href="/logout">
                                <div class="profile-list">
                                    <i class='bx bx-log-out'></i>
                                    Logout
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <div class="tab-content" id="v-pills-tabContent">
                            <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                                <div class="profile-content">
                                        <div class="profile-content-inner">
                                            <h2>Basic Info</h2>
                                            <!-- INFO CARD -->                
                                            <div class="card py-2 mb-4">
                                                <div class="card-body">
                                                    <div class="row align-items-center">
                                                   
                                                        <div class="col-md-12">
                                                        
                                                            <h5>
                                                                
                                                                @if($user->seeker->featured > 0)
                                                                <a class="" style="font-weight: bold" href="/job-seekers/services"  data-toggle="tooltip" data-placement="left"  title="You are a featured Job Seeker on Emploi">
                                                                Featured
                                                                </a>
                                                                @endif
                                                                
                                                                Job Seeker
                                                                
                                                                @if($user->seeker->canGetNotification())
                                                                <a class="fa fa-bell" href="/job-seekers/services"  data-toggle="tooltip" data-placement="right" title="Shortlist Notifications Enabled" ></a>
                                                                @else
                                                                <a class="fa fa-bell-slash" href="/job-seekers/services"  data-toggle="tooltip" data-placement="right"  title="Shortlist Notifications Disabled"></a>
                                                                @endif

                                                                
                                                            </h5>
                                                            <h6 title="Referral Credits">
                                                                <a href="/profile/invites">
                                                                [ {{ $user->totalCredits }} credits ]
                                                                </a>
                                                                @if($user->seeker->searching)
                                                                <span class="badge badge-success">Searching</span>
                                                                @endif
                                                            </h6>

                                                            <?php $completed =  $user->seeker->calculateProfileCompletion(); ?>
                                                            <p>Profile; <strong>{{ $completed }}%</strong> complete</p>
                                                            <div class="progress" style="height: 5px">
                                                                <div class="progress-bar" role="progressbar"  aria-valuemin="0" aria-valuemax="100" style="width:{{ $completed }}%">
                                                                </div>
                                                            </div>
                                                            @if($completed == 100)
                                                              <p class="text-center"><span class="text-success">Congratulations. Your profile is complete.</span>
                                                                </p>
                                                            @elseif($completed == 88 && $user->seeker->featured == 0)
                                                               <p class="text-center"><a href="/job-seekers/services" class="orange">Update your profile to increase your chances of being shortlisted.</a>
                                                                </p>.
                                                            @else                                    
                                                                <p class="text-center"> <a href="/profile/edit" class="orange">Update your profile to increase your chances of being shortlisted.</a>
                                                                </p>. 
                                                            @endif                        
                                                        
                                                          <!--   @if(!$user->seeker->hasCompletedProfile())
                                                            <p class="text-center">
                                                                <a href="/profile/edit" class="text-danger"> <i class="fas fa-info"></i> Update your profile and start applying for jobs</a>
                                                            </p>
                                                            @endif -->
                                                        </div>
                                                    </div>
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
                                                    <p>
                                                        {{ $user->seeker->objective ? $user->seeker->objective : 'Career Objective not included' }}
                                                    </p>
                                                </div>
                                            </div>
                                            <!-- END OF INFO CARD -->
                                        </div>
                                </div>
                            </div>
        
                        </div>
                    </div>
                  </div>
            </div>
        </div>
        <!-- End Dashboard -->
	<!-- End Dashboard -->

@endsection
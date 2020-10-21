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
                                            <h2>Edit Skills</h2>
                                          
                                            <!-- SKILLS -->

										<form method="POST" action="update" enctype="multipart/form-data" id="update-form">
										    @csrf
                
										
										                     
										         <!--        <input type="submit" value="Update" class="btn btn-orange">
										                </div>
										            </div>
										        </div>
										    </div> -->
										</form>
                                            <!-- END OF SKILLS -->
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
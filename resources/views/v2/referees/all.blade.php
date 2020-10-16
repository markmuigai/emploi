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
                    <div class="col-lg-4">
                        <div class="profile-item">
                            <img src="{{asset('assets-v2/img/dashboard1.jpg')}}" alt="Dashboard">
                            <h2>Tom Henry</h2>
                            <span>Web Developer</span>
                        </div>
                        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                            <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="dashboard.html#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">
                                <i class='bx bx-user'></i>
                                My Profile
                            </a>
                            <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="dashboard.html#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">
                                <div class="/profile-list">                               
                                    <i class='bx bxs-inbox'></i>
                                    <a href="applications">
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
                            <a href="#">
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
                    <div class="col-lg-8">
                        <div class="tab-content" id="v-pills-tabContent">
                            <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                          
                      
                            </div>
                            <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                                <div class="employer-item">
                                    <a href="job-details.html">
                                        <img src="assets/img/home-one/job1.png" alt="Employer">
                                        <h3>Product Designer</h3>
                                        <ul>
                                            <li>
                                                <i class="flaticon-send"></i>
                                                Los Angeles, CS, USA
                                            </li>
                                            <li>5 months ago</li>
                                        </ul>
                                        <p>We are Looking for a skilled Ul/UX designer amet conscu adiing elitsed do eusmod tempor</p>
                                        <span class="span-one">Accounting</span>
                                        <span class="span-two">FULL TIME</span>
                                    </a>
                                </div>
                                <div class="employer-item">
                                    <a href="job-details.html">
                                        <img src="assets/img/home-one/job2.png" alt="Employer">
                                        <h3>Sr. Shopify Developer</h3>
                                        <ul>
                                            <li>
                                                <i class="flaticon-send"></i>
                                                Houston, TX, USA
                                            </li>
                                            <li>4 months ago</li>
                                        </ul>
                                        <p>Responsible for managing skilled Ul/UX designer amet conscu adiing elitsed do eusmod</p>
                                        <span class="span-one">Accounting</span>
                                        <span class="span-two two">FULL TIME</span>
                                    </a>
                                </div>
                                <div class="employer-item">
                                    <a href="job-details.html">
                                        <img src="assets/img/home-one/job3.png" alt="Employer">
                                        <h3>Tax Manager</h3>
                                        <ul>
                                            <li>
                                                <i class="flaticon-send"></i>
                                                Ho Chi Minh City, Vietnam
                                            </li>
                                            <li>6 months ago</li>
                                        </ul>
                                        <p>International collaborative a skilled Ul/UX designer amet conscu adiing elitsed do eusmod</p>
                                        <span class="span-one two">Broardcasting</span>
                                        <span class="span-two three">FREELANCER</span>
                                    </a>
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
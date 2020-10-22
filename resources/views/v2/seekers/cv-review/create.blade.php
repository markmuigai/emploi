@extends('v2.layouts.app')

@section('content')
    <!-- Navbar -->
    @include('v2.components.guest.navbar')
    <!-- End Navbar -->
        <!-- Resume -->
        <!-- Page Title -->
        <div class="page-title-area">
            <div class="d-table">
                <div class="d-table-cell">
                    <div class="container">
                        <div class="row text-white">
                            <div class="col-md-8">
                                <p>Resume Check: Instantly Check Your Resume for 30+ Issues</p>
                            </div>
                            <div class="col-md-4">
                                <h2>Automatic CV Review</h2>
                                <button class="btn btn-primary">Upload CV</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Page Title -->

        <!-- Resume -->
        <div class="person-details-area resume-area ptb-100">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="widget-area">
                            <div class="resume-profile">
                                <img src="assets/img/dashboard1.jpg" alt="Dashboard">
                                <h2>Tom Henry</h2>
                                <span>Web Developer</span>
                            </div>
                            <div class="information widget-item">
                                <h3>Overview</h3>
                                <ul>
                                    <li>
                                        <h4>Salary:</h4>
                                        <span>$2,000</span>
                                    </li>
                                    <li>
                                        <h4>Experience:</h4>
                                        <span>5 years</span>
                                    </li>
                                    <li>
                                        <h4>Age:</h4>
                                        <span>30-35</span>
                                    </li>
                                    <li>
                                        <h4>Gender:</h4>
                                        <span>Male</span>
                                    </li>
                                    <li>
                                        <h4>Languages:</h4>
                                        <span>Bangla, English, Arabic, Spanish</span>
                                    </li>
                                    <li>
                                        <h4>Qualification:</h4>
                                        <span>Certificate, Associate Degree</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="details-item">
                            <div class="profile">
                                <h3>About</h3>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                                <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search.</p>
                            </div>
                            <div class="work bottom-item">
                                <h3>Work Experience</h3>
                                <ul>
                                    <li>
                                        Path Technologies, Washington, DC, USA
                                    </li>
                                    <li>
                                        <span>04/2011 - 01/2012</span>
                                    </li>
                                </ul>
                                <h4>Senior Software Engineer</h4>
                                <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text.</p>
                            </div>
                            <div class="work bottom-item bottom-item-last">
                                <ul>
                                    <li>
                                        3s Software Bangladesh
                                    </li>
                                    <li>
                                        <span>02/2015 - 02/2018</span>
                                    </li>
                                </ul>
                                <h4>John Hopkins, Bangladesh</h4>
                                <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text.</p>
                            </div>
                            <div class="work bottom-item">
                                <h3>Education</h3>
                                <ul>
                                    <li>
                                        Path Technologies, Washington, DC, USA
                                    </li>
                                </ul>
                                <h4>MBA (2018-2019)</h4>
                                <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text.</p>
                            </div>
                            <div class="work bottom-item bottom-item-last">
                                <ul>
                                    <li>
                                        Design at Institute of Technology & Marketing
                                    </li>
                                </ul>
                                <h4>Section UX & UI design (2014 - 2018)</h4>
                                <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text.</p>
                            </div>
                            <div class="skills">
                                <h3>Skills</h3>

                                <div class="skill-wrap">
                                    <div class="skill">
                                        <h3>HTML/CSS</h3>
                                        <div class="skill-bar skill1 animate__slideInLeft animate__animated">
                                            <span class="skill-count1">56%</span>
                                        </div>
                                    </div>
                                    <div class="skill">
                                        <h3>WORDPRESS</h3>
                                        <div class="skill-bar skill2 animate__slideInLeft animate__animated">
                                            <span class="skill-count2">80%</span>
                                        </div>
                                    </div>
                                    <div class="skill">
                                        <h3>PHOTOSHOP</h3>
                                        <div class="skill-bar skill3 animate__slideInLeft animate__animated">
                                            <span class="skill-count3">90%</span>
                                        </div>
                                    </div>
                                    <div class="skill">
                                        <h3>PHP</h3>
                                        <div class="skill-bar skill4 animate__slideInLeft animate__animated">
                                            <span class="skill-count4">70%</span>
                                        </div>
                                    </div>
                                    <div class="skill">
                                        <h3>TEAM MANAGEMENT</h3>
                                        <div class="skill-bar skill5 animate__slideInLeft animate__animated">
                                            <span class="skill-count5">80%</span>
                                        </div>
                                    </div>
                                    <div class="skill">
                                        <h3>SERVICE OF QUALITY</h3>
                                        <div class="skill-bar skill6 animate__slideInLeft animate__animated">
                                            <span class="skill-count6">90%</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Resume -->

@endsection
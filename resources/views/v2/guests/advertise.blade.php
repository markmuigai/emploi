@extends('v2.layouts.app')

@section('title','Advertise on Emploi :: Emploi')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
    <!-- Navbar -->
    @include('v2.components.employer.navbar')    
    <!-- End Navbar -->
    <div class="pt-5">
        <!-- Page Title -->
        <div class="employer-landing pt-5">
          <div class="d-table">
              <div class="d-table-cell">
                  <div class="container-fluid px-5">
                      <div class="title-item">
                            <h2>Recruit faster, Hire better</h2>
                            <p>
                            We take care of your human resource needs end to end from advertising, recruitment to HR consultancy
                            <!--  <br>
                                matches your professional level, wins against your competitors and stands out among recruiters. -->
                            </p>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <!-- End Page Title -->

        <!-- services -->
        <div class="container-fluid seeker-services my-5 px-5">
            <div class="section-title text-center">
                <h2>Employer Services</h2>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="card shadow rounded mb-2">
                        <div class="card-body text-center">
                            <i class="flaticon-verify"></i>
                            <h4>Advertising</h4>
                            <p> </p>
                            <a href="/post-a-job" class="btn btn-primary rounded-pill">
                                Advertise
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card shadow rounded mb-2">
                        <div class="card-body text-center">
                            <i class="flaticon-file"></i>
                            <h3>Recruitment</h3>
                            <p class="description"> </p>
                            <a href="/employers/premium-recruitment" class="btn btn-primary rounded-pill">
                                Recruit
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card shadow rounded mb-2">
                        <div class="card-body text-center">
                            <i class="flaticon-comment"></i>
                            <h3>HR Consultancy</h3>
                            <p> </p>
                            <a href="/contact" class="btn btn-primary rounded-pill">
                                HR Consultancy
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Services -->

        <!-- Why Us -->
        <section class="explore-area py-5">
            <div class="container">
                <div class="explore-item cv-editing">
                    <div class="section-title">
                        <h2>Why Work With Us?</h2>
                        <p>
                          
                        </p>
                    </div>
                    <ul class="row justify-content">
                            <div class="col-md-8 pl-0">
                                <li>
                                    <i class='bx bxs-check-circle'></i>
                                    Convenience (<i>Sourcing, management and growth tools at one stop.</i>)
                                </li>
                                <li>
                                    <i class='bx bxs-check-circle'></i>
                                    Top quality performance (<i>Thorough professional vetting</i>)
                                </li>
                                <li>
                                    <i class='bx bxs-check-circle'></i>
                                    Assurance (<i>Performance tracking</i>)
                                </li>
                                <li>
                                    <i class='bx bxs-check-circle'></i>
                                    Speed (<i>48 hour turn around time</i>)
                                </li>
                                <li>
                                    <i class='bx bxs-check-circle'></i>
                                    Enjoy E-Club (<i>Membership and its benefits</i>)
                                </li>
                                <li>
                                    <i class='bx bxs-check-circle'></i>
                                    Affordable (<i>Staggered and shared payment methods</i>)
                                </li>
                            </div>
                    </ul>
                </div>
            </div>
        </section>
        <!--     End Why Us -->
@endsection
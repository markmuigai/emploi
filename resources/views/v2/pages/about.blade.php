@extends('v2.layouts.app')

@section('title','Professional CV Editing :: Emploi')

@section('content')
    <!-- Navbar -->
    @include('v2.components.jobseeker.navbar')    
    <!-- End Navbar -->
    <div class="pt-5">
        <!-- Page Title -->
        <div class="page-title-area pt-5">
          <div class="d-table">
              <div class="d-table-cell">
                  <div class="container-fluid px-5">
                      <div class="title-item">
                            <h2>About Us</h2>
                            <p>
                                Emploi is a software as a service (SAAS) enabled market-placed platform <br>
                                for integrated talent acquisition, talent management and growth. Emploi's <br>
                                technology platform streamlines talent acquisition and management <br>
                                for growing companies through a smart recruitment and management engine.
                            </p>
                            {{-- <a class="left-btn" href="#requestCVEditing">
                                Request For Professional CV Editing
                                <i class="flaticon-upload"></i>
                            </a> --}}
                      </div>
                  </div>
              </div>
          </div>
        </div>
        <!-- End Page Title -->

        <!-- Job Details -->
        <div class="job-details-area ptb-100">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <div class="details-item">
                            <div class="details-inner">
                                <h3>Our Mission</h3>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
                            </div>
                            <div class="details-inner">
                                <h3>Our Vision</h3>
                                <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Job Details -->
    </div>
@endsection
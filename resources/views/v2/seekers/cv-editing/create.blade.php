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
                            <h2>Professional CV Editing</h2>
                            <p>
                            We leverage on our expertise to provide you with a well-tailored and appealing CV that <br>
                                matches your professional level, wins against your competitors and stands out among recruiters.
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

        <!-- Work -->
        <section class="work-area two py-5">
            <div class="container">
                <div class="section-title two">
                    <h2>See How CV Editing Works</h2>
                </div>
                <div class="row">
                    <div class="col-sm-6 col-lg-4">
                        <div class="work-item two">
                            <i class="flaticon-accounting"></i>
                            <h3>Upload CV</h3>
                            <p>Our CV Editing Experts go through your CV to understand your professional journey and angle.</p>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-4">
                        <div class="work-item two">
                            <i class="flaticon-file"></i>
                            <h3>Follow up Discussion</h3>
                            <p>We then send you a questionnaire that seeks to answer questions about your career goals and experiences. 
                                This is followed up by an IN-DEPTH phone conversation from our Certified Resume Writers. </p>
                        </div>
                    </div>
                    <div class="col-sm-6 offset-sm-3 offset-lg-0 col-lg-4">
                        <div class="work-item two work-border">
                            <i class="flaticon-businessman-paper-of-the-application-for-a-job"></i>
                            <h3>Receive Edited CV</h3>
                            <p>This process is essential as it enables us to understand how best to market you to 
                                employers and how we can tailor your CV to stand out.
                                We will then prepare a draft resume for your review.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Work -->

            <!-- CV Editing -->
    <section class="explore-area py-5">
        <div class="container">
            <div class="explore-item cv-editing">
                <div class="section-title">
                    <h2>Why Our Professional CV Editing</h2>
                    <p>
                        Our Professional CV Editing package increases your chances of landing a face-to-face <br>
                        interview and landing your dream job by 87%.
                    </p>
                </div>
                <ul class="row justify-content-sart">
                        <div class="col-md-4 pl-0">
                            <li>
                                <i class='bx bxs-check-circle'></i>
                                Increased interview chances
                            </li>
                            <li>
                                <i class='bx bxs-check-circle'></i>
                                Indepth career advisory
                            </li>
                            <li>
                                <i class='bx bxs-check-circle'></i>
                                Summarised skills and achievements
                            </li>
                            <li>
                                <i class='bx bxs-check-circle'></i>
                                Cover Letter
                            </li>
                            <li>
                                <i class='bx bxs-check-circle'></i>
                                Updated resume
                            </li>
                        </div>
                        <div class="col-md-4 pl-0">
                            <li>
                                <i class='bx bxs-check-circle'></i>
                                Timely format
                            </li>
                            <li>
                                <i class='bx bxs-check-circle'></i>
                                Industry –accepted standards
                            </li>
                            <li>
                                <i class='bx bxs-check-circle'></i>
                                Professional touch
                            </li>
                            <li>
                                <i class='bx bxs-check-circle'></i>
                                Objective Point of View
                            </li>
                        </div>
                </ul>
            </div>
        </div>
    </section>
    <!-- End CV Editing -->

      <!-- Pricing -->
      <section class="pricing-area pt-4 pb-2">
          <div class="container">
            <div class="section-title two">
                <h2>Our CV Editing Packages</h2>
            </div>
              <div class="row">
                  <div class="col-sm-6 col-lg-4">
                      <div class="pricing-item shadow">
                        <div class="top">
                            <h3>Entry Level</h3>
                            <span>Interns and fresh graduates with less than 1 year experience</span>
                        </div>
                        <?php
                            $price = 2000;
                            $p = \App\Product::where('slug','entry_level_cv_edit')->first();
                            if(isset($p->id))
                                $price = round($p->price);
                        ?>
                        <div class="middle">
                            <h4><span class="span-left">Kshs</span> {{ $price }}</span></h4>
                        </div>                    
                        <form method="POST" action="/checkout" >
                            @csrf
                            <input type="hidden" name="product" value="entry_level_cv_edit">
                            <div class="end">
                                <input type="submit" name="" value="Request" class="btn btn-success ">
                            </div>
                        </form>
                      </div>
                  </div>
                  <div class="col-sm-6 col-lg-4">
                    <div class="pricing-item shadow">
                        <div class="top">
                            <h3>Mid-Level</h3>
                            <span>Averagely 1-5 years’ experience in a reporting-to-a supervisor role</span>
                        </div>
                        <?php
                            $price = 4000;
                            $p = \App\Product::where('slug','mid_level_cv_edit')->first();
                            if(isset($p->id))
                                $price = round($p->price);
                        ?>
                        <div class="middle">
                          <h4><span class="span-left">Kshs</span> {{ $price }}</span></h4>
                        </div>                   
                        <form method="POST" action="/checkout" >
                            @csrf
                            <input type="hidden" name="product" value="mid_level_cv_edit">
                            <div class="end">
                                <input type="submit" name="" value="Request" class="btn btn-success ">
                            </div>
                        </form>
                    </div>
                </div>
                  <div class="col-sm-6 col-lg-4">
                      <div class="pricing-item shadow">
                          <div class="top">
                              <h3>Career Change CV</h3>
                              <span>Or Promotion seeking CV, Seeks to change a career path i.e. get into another field</span>
                          </div>
                          <?php
                              $price = 6000;
                              $p = \App\Product::where('slug','c_change_cv_edit')->first();
                              if(isset($p->id))
                                $price = round($p->price);
                          ?>
                          <div class="middle">
                            <h4><span class="span-left">Kshs</span> {{ $price }}</span></h4>
                          </div>                    
                          <form method="POST" action="/checkout" >
                              @csrf
                            <input type="hidden" name="product" value="c_change_cv_edit">
                            <div class="end">
                                <input type="submit" name="" value="Request" class="btn btn-success ">
                            </div>
                          </form>
                      </div>
                  </div>
              </div>
          </div>
      </section>
      <!-- End Pricing -->

    <!-- Pricing -->
    <section class="pricing-area pb-70">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-sm-6 col-lg-4">
                    <div class="pricing-item shadow">
                        <div class="top">
                            <h3>Management Level</h3>
                            <span>Head of Departments.</span>
                        </div>
                        <?php
                            $price = 6000;
                            $p = \App\Product::where('slug','mgnt_cv_edit')->first();
                            if(isset($p->id))
                                $price = round($p->price);
                        ?>
                        <div class="middle">
                            <h4><span class="span-left">Kshs</span> {{ $price }}</span></h4>
                        </div>                   
                        <form method="POST" action="/checkout" >
                            @csrf
                            <input type="hidden" name="product" value="mgnt_cv_edit">
                            <div class="end">
                                <input type="submit" name="" value="Request" class="btn btn-success ">
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="pricing-item shadow">
                        <div class="top">
                            <h3>Senior Management Level</h3>
                            <span>CEOs, Directors, MD’s</span>
                        </div>
                        <?php
                            $price = 10000;
                            $p = \App\Product::where('slug','s_mgnt_cv_edit')->first();
                            if(isset($p->id))
                                $price = round($p->price);
                        ?>
                        <div class="middle">
                            <h4><span class="span-left">Kshs</span> {{ $price }}</span></h4>
                        </div>                   
                        <form method="POST" action="/checkout" >
                            @csrf
                            <input type="hidden" name="product" value="s_mgnt_cv_edit">
                            <div class="end">
                                <input type="submit" name="" value="Request" class="btn btn-success ">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Pricing -->

    {{-- CV Editing form --}}
    <div class="post-job-area" id="requestCVEditing">
        <div class="post-item">
            <h2 class="mb-4">
                Request Professional CV Editing
            </h2>
            <form method="POST"  enctype="multipart/form-data" action="/cv-editing" class="col-md-8 offset-md-2">
            @csrf

                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>
                                Name:
                            </label>
                            <input type="text" name="name" required="" maxlength="50" class="form-control" value="{{ isset(Auth::user()->id) ? Auth::user()->name : old('name') }}">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>
                                Phone Number:
                            </label>
                            <input type="number" name="phone_number" required="" maxlength="20" class="form-control" value="{{ old('phone_number') }}" placeholder="2547XXXXXXXX" required="">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>
                                Email:
                            </label>
                            <input type="email" name="email" required="" maxlength="50" class="form-control" value="{{ isset(Auth::user()->id) ? Auth::user()->email : old('email') }}">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>
                                Current CV: <small>.doc, .docx and .pdf - Max 5MB</small>
                            </label>
                            <input type="file" name="resume" class="form-control" required="" accept=".pdf, .doc, .docx">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>
                                Industry
                            </label>
                            <select name="industry" class="form-control">
                                <option disabled selected value>Select Your Industry</option>
                                @forelse(\App\Industry::orderBy('name')->get() as $ind)
                                    <option value="{{ $ind->id }}" {{ old('industry') == $ind->id ? 'selected=""' : '' }}>{{ $ind->name }}</option>
                                @empty
                                @endforelse
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>
                                Optional Message
                            </label>
                            <textarea class="form-control" placeholder="Optional message " maxlength="500" name="message">{{ old('message') }}</textarea>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <button type="submit" class="btn btn-primary">Request Service</button>
                    </div>
                </div>
            </form>
        </div>
    </div>


@endsection
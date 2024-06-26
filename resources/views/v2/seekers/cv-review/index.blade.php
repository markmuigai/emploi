@extends('v2.layouts.app')

@section('title','Free CV Review :: Emploi')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
    <!-- Navbar -->
    @include('v2.components.jobseeker.navbar')
    <!-- End Navbar -->
        <!-- Resume -->
        <!-- Page Title -->
        <div class="page-title-area cv-review-banner">
            <div class="d-table">
                <div class="d-table-cell">
                    <div class="container pt-5 mt-5">
                        <div class="row text-white">
                            <div class="col-md-6 review-banner pt-5">
                                <h1>Automatic <span>CV review</span></h1>
                                <h2>Instantly Check Your Resume for Issues</h2>
                                <h5>Review our suggestions to see what you can fix.</h5>
                            </div>
                            <div class="col-md-6 col-12 d-flex justify-content-center">
                                <div class="card cv-result text-center">
                                    <h3>Your Results</h3>                                  
                                    <div class="d-flex justify-content-center my-3">
                                        @if(Auth()->user())
                                        <div
                                        class="ldBar label-center w-50"
                                        data-value="{{ $result->score }}"
                                        data-preset="fan"
                                        style="width: 89px; height: 89px;"
                                        ></div>
                                        @endif
                                    </div>                                                                   
                                    <h4>CV STRENGTH</h4>
                                    @if(Auth()->user())
                                        <a href="{{route('v2.cv-improvement.index')}}" class="btn btn-primary">View improvement suggestions</a>
                                    @else
                                        <button class="btn btn-orange-alt mt-4"><a href="/login">Login</a> or <a href="/register">Register</a> to view results</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<!--What we check start-->
   @if(Auth()->user())
   <br  id="suggestions">
    <section class="work-area cv-review-details pt-2 pb-70">
        <div class="container shadow p-3 mb-5 bg-white rounded px-5">
            <div class="section-title">
                <h2 style="text-align: center">What we Check</h2>
            </div>
            <div class="row">
                <div class="col-sm-6 col-lg-6">                
                    <div class="work-item">
                        <i class="flaticon-verify"></i>
                        <h3>Measurable result</h3>
                        <p>Impress employer by clearly showing what you have achieved.</p>                    
                    </div>
                </div>
                <div class="col-sm-6 col-lg-6">                
                    <div class="work-item">
                        <i class="flaticon-verify"></i>
                        <h3>Completeness</h3>
                        <p>Complete resumes include work history, contact information, summary, and skills.</p>                    
                    </div>
                </div>
                <div class="col-sm-6 col-lg-6">                
                    <div class="work-item">
                        <i class="flaticon-file"></i>
                        <h3>Strong Summary</h3>
                        <p>An overview of your top skills and accomplishments.</p>                    
                    </div>
                </div>
                <div class="col-sm-6 col-lg-6">        
                    <div class="work-item">
                        <i class="flaticon-comment"></i>
                        <h3>Typos</h3>
                        <p>Typos include errors any errors in words, numbers and extra spaces.</p>                    
                    </div>
                </div>
                <div class="col-sm-6 col-lg-6">                
                    <div class="work-item">
                        <i class="flaticon-verify"></i>
                        <h3>Length</h3>
                        <p>You should include enough information without overwhelming ther reader.</p>                    
                    </div>
                </div>
                <div class="col-sm-6 col-lg-6">
                    <div class="work-item">
                        <i class="flaticon-file"></i>
                        <h3>Clear Contact Information</h3>
                        <p>Make it easy for an employer who could like to contact you.</p>
                    </div>
                </div>
            </div>      
        </div>
    </section>
    @else<br>
    <div class="container shadow p-3 mb-5 bg-white rounded px-5 text-center">
        <a href="/login?redirectToUrl={{ url()->current() }}" class="btn btn-orange">Login to view improvement suggestions</a>
    </div>
    @endif 
  
    <!--What we check end-->

@endsection

@section('js')
    <script>
        $('#review-cv').change(function(){
            console.log('hey');
            $('#review-cv-form').submit();
        })
    </script>
@endsection
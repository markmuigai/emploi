@extends('v2.layouts.app')

@section('content')
    <!-- Navbar -->
    @include('v2.components.guest.navbar')
    <!-- End Navbar -->
        <!-- Resume -->
        <!-- Page Title -->
        <div class="page-title-area cv-review-banner">
            <div class="d-table">
                <div class="d-table-cell">
                    <div class="container pt-5 mt-5">
                        <div class="row text-white">
                            <div class="col-md-6 pt-5">
                                <h1>Automatic <span>CV review</span></h1>
                                <h2>Instantly Check Your Resume for Issues</h2>
                                <h5>Review our suggestions to see what you can fix.</h5>
                            </div>
                            <div class="col-md-6 d-flex justify-content-center">
                                <div class="card cv-result text-center">
                                    <h3>Your Results</h3>                                  
                                    <div class="d-flex justify-content-center my-3">
                                        <div
                                        class="ldBar label-center w-50"
                                        data-value="{{ $result->get('score') }}"
                                        data-preset="fan"
                                        style="width: 89px; height: 89px;"
                                        ></div>
                                    </div>                                                                   
                                    <h4>CV STRENGTH</h4>
                                    <a href="/job-seekers/summit" class="btn btn-orange">Fix my CV</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<!--What we check start-->
    <section class="work-area cv-review-details py-5 pb-70">
        <div class="container shadow p-3 mb-5 bg-white rounded px-5">
            <div class="section-title text-center">
                <h2>Areas to Improve</h2>
                @if(Auth::user())
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
            @else
            <p>We suggest improvements in the following areas:</p>
            <div class="ml-3">
                Ensure your CV has the following keywords:
                @foreach ($result->get('recommendations') as $rec)
                    <h5>{{ucfirst($rec)}}</h5>
                @endforeach
            </div>
            <a href="/login?redirectToUrl={{ url()->current() }}" class="btn btn-orange">Login to view improvement suggestions</a>  
            @endif
         </div>
    </section>
  
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
@extends('v2.layouts.app')

@section('title','Free CV Review :: Emploi')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

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
                            <div class="col-md-6 review-banner pt-5">
                                <h1>Automatic <span>CV review</span></h1>
                                <h2>Instantly Check Your Resume for Issues</h2>
                                <h5>Review our suggestions to see what you can fix.</h5>
                            </div>
                            <div class="col-md-6 d-flex justify-content-center">
                                <div id="scoreCard" class="card cv-result text-center">
                                    <h3>Average Scores</h3>
                                    <div class="d-flex justify-content-center my-3">
                                        <div
                                        class="ldBar label-center w-50"
                                        data-value="{{isset($reviewResults) ? $reviewResults : 70 }}"
                                        data-preset="fan"
                                        style="width: 89px; height: 89px;"
                                        ></div>
                                    </div>
                                    <h4>CV STRENGTH</h4>
                                    <form id="review-cv-form" method="POST" action="{{route('v2.cv-review.store')}}" enctype="multipart/form-data">
                                        @csrf
                                        @if ($errors->any())
                                            @foreach ($errors->all() as $error)
                                                <span class="text-danger">{{$error}}</span>
                                            @endforeach
                                        @endif

                                        @if(Auth::user())
                                        <label for="review-cv" class="custom-file-upload cmn-btn my-3">
                                            Review your CV
                                            <i class='bx bx-upload'></i>
                                        </label>
                                        @else
                                        <a href="/v2/login?redirectToUrl={{ url()->current() }}" class="cmn-btn">
                                            Login to review your CV
                                            <i class='bx bx-user-plus' ></i>
                                        </a>
                                        @endif
                                        <input id="review-cv" name="cv" type="file"/>
                                    </form>
                                </div>
                                <div id="pendingCard" class="card cv-result text-center d-none">
                                    <h3>Just a moment</h3>
                                    <div class="d-flex justify-content-center my-3">
                                        <div class="spinner-border text-primary text-center" role="status">
                                            <span class="sr-only">Loading...</span>
                                        </div>
                                    </div>
                                    <h4>Reviewing CV...</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<!--What we check start-->
    <section class="work-area cv-review-details py-5 pb-70">
        <div class="container">
            <div class="section-title">
                <h2 style="text-align: center">What we Check</h2>
            </div>
            <div class="row">
                <div class="col-sm-6 col-lg-4">                
                    <div class="work-item">
                        <h3>Measurable result</h3>
                        <p>Impress employer by clearly showing what you have achieved.</p>                    
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">                
                    <div class="work-item">
                        <h3>Strong Summary</h3>
                        <p>An overview of your top skills and accomplishments.</p>                    
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">        
                    <div class="work-item">
                        <h3>Typos</h3>
                        <p>Typos include errors any errors in words, numbers and extra spaces.</p>                    
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">                
                    <div class="work-item">
                        <h3>Length</h3>
                        <p>You should include enough information without overwhelming ther reader.</p>                    
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="work-item">
                        <h3>Clear Contact Information</h3>
                        <p>Make it easy for an employer who could like to contact you.</p>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="work-item">
                        <h3>Formatting</h3>
                        <p>Formmating is the first thing an employer notices in your resume.</p>
                    </div>
                </div>
            </div>
         </div>
    </section>
    <!--What we check end-->

@endsection

@section('js')
<script>
    $('#review-cv').change(function(){
        // Hide score card
        $('#scoreCard').addClass('d-none')

        // Show pending card
        $('#pendingCard').removeClass('d-none')

        // submit after 5 seconds
        setTimeout(function() {
            $('#review-cv-form').submit();
        }, 2000);
    });
</script>
@endsection
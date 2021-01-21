@extends('v2.layouts.app')

@section('title','Self Assessment :: Emploi')

@section('content')
    <!-- Navbar -->
    @include('v2.components.jobseeker.navbar')    
    <!-- End Navbar -->
    <div class="assessment-section pt-100 pb-70 px-4">
        <h3 class="text-center my-4">Self Assessment</h3>
        <div class="row justify-content-center">
            <div class="col-12 col-md-11">
                <div class="container-fluid shadow p-3 mb-3 bg-white rounded px-5">
                 <div class="text-center">
                    <p>
                        Looking for a job? Improve your chances of landing one with our self assessment.
                    </p>

                    <h4>Instructions</h4>
                    <p>Our Self assessment uses an aptitude test to gauge an individual's reasoning capacity in different aspects. You have 10 minutes to complete 10 questions.Select the correct choice to be able to proceed to the next question
                    Once you have answered a question, you will be able to go back to change your previous answer. Do not refresh your browser as this may interfere with your test.</p>
                    <button id="start" type="button" class="btn btn-success">Go to Assessment</button>               
                </div>  
                </div>     
            </div>
        </div>

         <div class="container-fluid seeker-services my-5 px-5">
            <h3 class="orange text-center">Why You Need Self Assessment</h3>
            <div class="row">
                <div class="col-md-4">
                    <div class="card shadow rounded mb-2">
                        <div class="card-body text-center">
                            <i class="flaticon-verify"></i>
                            <h6>Increase your job score ranking</h6><br>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card shadow rounded mb-2">
                        <div class="card-body text-center">
                               <i class="flaticon-verify"></i>    
                               <h6>Highlight your key competencies</h6><br>
                            </div>
                        </div>
                </div>
                <div class="col-md-4">
                    <div class="card shadow rounded mb-2">
                        <div class="card-body text-center">
                            <i class="flaticon-verify"></i>
                            <h6>Instant feedback and customized recommendations</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')

@endsection
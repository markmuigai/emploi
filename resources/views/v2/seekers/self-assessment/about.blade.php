@extends('v2.layouts.app')

@section('title','Self Assessment :: Emploi')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
    <!-- Navbar -->
    @include('v2.components.jobseeker.navbar')    
    <!-- End Navbar -->
    <div class="assessment-section pt-100 pb-70 px-4">
        <div class="container-fluid p-3 my-3 bg-white rounded px-5">
            <h3 class="text-center">
                Blast Off Your Career with our Free Self Assessment Test.
            </h3>
            <h5 class="text-muted text-center mb-3">
                Psychological tests for every career question and personal development
            </h5>
            <div class="row about-assessment">
                <div class="col-md-8">
                    <h4>Why our I.Q Test?</h4>
    
                    <ol>
                        <li>
                            Improve your job score ranking with our intriguing psychometric tests i.e Top employers use such tests to eliminate 80% of applicants. Practise and learn how you can beat the odds and land your dream job.
                        </li>
                        <li>
                            Our Assessment offers you an evaluation on your general I.Q, an optional extensive analysis of your score, reporting your performance in 4 different areas of intelligence and revealing your key cognitive strengths and weaknesses.
                        </li>
                    </ol>

                    <blockquote class="blockquote my-3">
                        <p class="mb-0">The Assessment needs someone to be keen, time conscious and attentive. Good for mind twisting</p>
                        <footer class="blockquote-footer"><cite title="Source Title">Job Seeker,   </cite>Simon Ngige</footer>
                    </blockquote>

                    <h4>Why is it Crucial to Score Well?</h4>
                    <ol>
                        <li>
                            Most of the world's companies recruit online and are overwhelmed with applicants. Aptitude tests are used as an initial screening tool to identify highly qualified candidates with exceptional abilities. Candidates who score well on aptitude tests then have their resumes reviewed by staff, are often invited to take a personality test and are potentially scheduled for a job interview.
                        </li>
                        <li>
                            A high aptitude test score can open the door to getting a job offer, negotiating a higher salary and starting on the fast track to promotion.
                        </li>
                    </ol><br>        
                </div>
                <div class="col-md-4">
                    <div class="card shadow">
                        <div class="card-body">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <i class='bx bx-check text-success'></i>
                                    Prepare for employer aptitude tests used in shortlisting
                                </li>
                                <li class="list-group-item">
                                    <i class='bx bx-check text-success'></i>
                                    Increase the chances of landing your dream job
                                </li>
                                <li class="list-group-item">
                                    <i class='bx bx-check text-success'></i>
                                    Highlight your key competencies
                                </li>
                                <li class="list-group-item">
                                    <i class='bx bx-check text-success'></i>
                                    Demonstrate your problem solving skills
                                </li>
                            </ul> 
                            @if (auth()->user() && auth()->user()->role == 'seeker')
                                <a class="btn btn-success d-block mb-1" href="{{route('v2.self-assessment.create')}}"><span style="color: white">  Go to Assessment</i></span></a>
                            @else
                                <a class="btn btn-success d-block mb-1" href="#" data-toggle="modal" data-target="#selfAssessmentModal"><span style="color: white">  Go to Assessment</i></span></a>
                            @endif 
                        </div>
                    </div>
                </div>
            </div>     
        </div>
    </div>
@endsection

@section('modal') 

    @include('v2.components.modals.self-assessment')
   
@endsection

@section('js')

@endsection
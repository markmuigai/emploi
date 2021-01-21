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
        <div class="row justify-content-center">
            <div class="col-12 col-md-11">
                <div class="container-fluid shadow p-3 mb-3 bg-white rounded px-5">
                 <div class="text-center">
                    <h4>
                      Blast Off Your Career with our Free Self Assessment Test.
                    </h4>
                    <p>Psychological tests for every career question and personal development.</p><br>

                    <h5>Why our I.Q Test?</h5>

                    <ul>
                        <li>
                            Improve your job score ranking with our intriguing psychometric tests i.e Top employers use such tests to eliminate 80% of applicants. Practise and learn how you can beat the odds and land your dream job.
                        </li>
                        <li>
                            Our Assessment offers you an evaluation on your general I.Q, an optional extensive analysis of your score, reporting your performance in 4 different areas of intelligence and revealing your key cognitive strengths and weaknesses.
                        </li>
                    </ul>
                    <h5>Why is it Crucial to Score Well?</h5>
                    <ul>
                        <li>
                            Most of the world's companies recruit online and are overwhelmed with applicants. Aptitude tests are used as an initial screening tool to identify highly qualified candidates with exceptional abilities. Candidates who score well on aptitude tests then have their resumes reviewed by staff, are often invited to take a personality test and are potentially scheduled for a job interview.
                        </li>
                        <li>
                            A high aptitude test score can open the door to getting a job offer, negotiating a higher salary and starting on the fast track to promotion.
                        </li>
                    </ul><br>

                    @if (auth()->user() && auth()->user()->role == 'seeker')
                        <button class="btn btn-success mb-1"><a href="{{route('v2.self-assessment.create')}}"><span style="color: white">  Go to Assessment</i></span></a></button>
                    @else
                        <button class="btn btn-success mb-1"><a href="#" data-toggle="modal" data-target="#selfAssessmentModal"><span style="color: white">  Go to Assessment</i></span></a></button>
                    @endif          
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
@extends('layouts.general-layout')

@section('title','Emploi :: Employer Services')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
<div class="container pb-5">
    <div class="card about">
        <div class="card-body text-center">
            <h1 class="orange">Employer Services</h1>
            <p>
                Use our Talent database and powerful Search-Sort-Assess-Score engine to cut down your recruitment workload by Up to 70% and your costs By Up to 65%. Get End-to-End powerful Recruitment tools; Process Quality Checks; 90 Day
                candidate Guarantee.
            </p>
            <div class="row pt-5">
                <div class="col-md-6">
                    <h4>
                        <a class="orange" href="/employers/publish">
                            Job Advertisement
                        </a>
                    </h4>
                    <p>
                        Get your advertisement viewed by tens of thousands through our Facebook, Website and LinkedIn
                    </p>
                </div>
                <div class="col-md-6">
                    <h4>
                        <a class="orange" href="/employers/rate-card#database-search">
                            Database Search
                        </a>
                    </h4>
                    <p>
                        Employers on our platform can search tens of thousands of qulaified CVs for quick shortlisting
                    </p>
                </div>
                <div class="col-md-6">
                    <h4>
                        <a class="orange" href="#premium-services">
                            Premium Services
                        </a>
                    </h4>
                    <p>
                        We assist employers in recruiting the best candidates to fill vacancies through our assited recruitment
                    </p>
                </div>
                <div class="col-md-6">
                    <h4>
                        <a class="orange" href="/mass-recruitment">
                            Mass Recruitment
                        </a>
                    </h4>
                    <p>
                        Our team is highly optimized to process mass recruitment requests with a turn-around-time of less than 1 week.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <h3 class="orange text-center" id="premium-services">Premium Services</h3>
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="card my-2">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-md-4 col-12 pb-2 pb-md-0">
                            <img src="/images/background-check.png" class="w-100">
                        </div>
                        <div class="col-md-8 col-12">
                            <h5>Background Checks</h5>
                            <p>
                                Performing background checks on applicants and employees is an effective way to discover potential issues that could affect your business. Protect your organization with our comprehensive employment background checks
                            </p>
                            <a href="/employers/background-checks" style="color: #e88725">Learn More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card my-2">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-md-4 col-12 pb-2 pb-md-0">
                            <img src="/images/premium-recruit.png" class="w-100">
                        </div>
                        <div class="col-md-8 col-12">
                            <h5>Premium Recruitment</h5>
                            <p>
                                Our premium recruitment services facilitate the recruitment of the best person available through our headhunting abilities. For instance, managerial jobs require matching candidates to be approached and informed of the
                                available job.
                            </p>
                            <a href="/employers/premium-recruitment" style="color: #e88725">Learn More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card my-2">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-md-4 col-12 pb-2 pb-md-0">
                            <img src="/images/templates.jpg" class="w-100">
                        </div>
                        <div class="col-md-8 col-12">
                            <h5>Psychometric Tests</h5>
                            <p>
                                Psychometric tests help to identify a candidate’s skills, knowledge and personality. Measure a number of attributes including intelligence, critical reasoning, motivation and personality profile.
                            </p>
                            <a href="/employers/psychometric-tests" style="color: #e88725">Learn More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card my-2">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-md-4 col-12 pb-2 pb-md-0">
                            <img src="/images/proficiency-test.png" class="w-100">
                        </div>
                        <div class="col-md-8 col-12">
                            <h5>Proficiency & IQ Test</h5>
                            <p>
                                We determine the suitability and skill set for particular candidates and the job requirements. Receive the test score for a candidate on the aptitude, proficiency and IQ tests.
                            </p>
                            <a href="/employers/iq-tests" style="color: #e88725">IQ Tests</a> |
                            <a href="/employers/proficiency-tests" style="color: #e88725">Proficiency</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card my-2">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-md-4 col-12 pb-2 pb-md-0">
                            <img src="/images/linkage.png" class="w-100">
                        </div>
                        <div class="col-md-8 col-12">
                            <h5>Linkage with Training Firms</h5>
                            <p>
                                We have set up to support you in identifying the best provider of training solutions as per your needs. Ask for our solutions to constantly improve your team for higher returns
                            </p>
                            <a href="/employers/train-employees" style="color: #e88725">Learn More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
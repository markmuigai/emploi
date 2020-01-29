@extends('layouts.general-layout')

@section('title','Emploi :: Rate Card')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
<div class="container text-center py-4">
    <h2 class="orange">Rate Card</h2>
    <div class="card-group">
        <div class="card m-3">
            <div class="card-body d-flex flex-column justify-content-between">
                <h5 class="purple">SOLO</h5>
                <h1 class="orange">Kshs. 2500</h1>
                <div>
                    <hr>
                </div>
                <p>Package Includes:</p>
                <ul class="tick">
                    <li>1 Job posted for 30 days</li>
                    <li>Advertised on our website &amp; social media pages</li>
                </ul>

                <div class="text-center">
                    <hr>
                    <a href="/contact" class="btn btn-orange-alt">Get Package</a>
                </div>
            </div>
        </div>
        <div class="card m-3">
            <div class="card-body d-flex flex-column justify-content-between">
                <h5 class="purple">SOLO PLUS</h5>
                <h1 class="orange">Kshs. 4,750</h1>
                <div>
                    <hr>
                </div>
                <p>Package Includes:</p>
                <ul class="tick">
                    <li>2-4 jobs posted for 30 days</li>
                    <li>Advertised on our website &amp; social media pages</li>
                    <li>Job AD sent out to our entire database</li>
                </ul>
                <div class="text-center">
                    <hr>
                    <a href="/contact" class="btn btn-orange-alt">Get Package</a>
                </div>
            </div>

        </div>
        <div class="card m-3">
            <div class="card-body d-flex flex-column justify-content-between">
                <h5 class="purple">INFINITI</h5>
                <h1 class="orange">Kshs. 9,025</h1>
                <div>
                    <hr>
                </div>
                <p>Package Includes:</p>
                <ul class="tick">
                    <li>More than 4 jobs posted for 30 days</li>
                    <li>Advertised on our website &amp; social media pages</li>
                    <li>Job AD sent out to entire database</li>
                </ul>
                <div class="text-center">
                    <hr>
                    <a href="/contact" class="btn btn-orange-alt">Get Package</a>
                </div>
            </div>
        </div>
    </div>
    @include('components.ads.responsive')
    <div class="card-group row">
        <div class="card col-md-4">
            <div class="card-body d-flex flex-column justify-content-between">
                <h5 class="purple">STAWI</h5>
                <h1 class="orange">Kshs. 6,999</h1>
                <div>
                    <hr>
                </div>
                <p>Package Includes:</p>
                <ul class="tick">
                    <li>Unlimited searches in 1 job category</li>
                    <li>Get up to 50 CVs/li>
                    <li>1 job posted for 30 days</li>
                    <li>1 job posted on our website &amp; social media pages</li>
                    <li>Job AD sent out to our entire database</li>
                    <li>View Referee reports</li>
                </ul>
                <div class="text-center">
                    <hr>
                    <a href="/contact" class="btn btn-orange-alt">Get Package</a>
                </div>
            </div>
        </div>
        <div class="card col-md-8">
            <div class="card-body d-flex flex-column justify-content-between">
                <h5 class="purple">Request A Quote</h5>
                <h1 class="orange">PREMIUM BASIC &amp; GOLD</h1>
                <div>
                    <hr>
                </div>
                <p>Package Includes:</p>
                <div class="row">
                    <div class="col-md-6">
                        <ul class="tick">
                            <li>Job posted for 30 days</li>
                            <li>Background Screening</li>
                            <li>Pre-Interviewed Candidates</li>
                            <li>Role Suitability Index Ranking</li>
                            <li>Reference Checks</li>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <ul class="tick">
                            <li>Candidate Sourcing</li>
                            <li>Flexible Payments</li>
                            <li>90 Day guarantee</li>
                            <li>2-4 days Turn Around Time</li>
                        </ul>
                    </div>
                </div>
                
                <div class="text-center">
                    <hr>
                    <a href="/contact" class="btn btn-orange-alt">Get Package</a>
                </div>
            </div>
        </div>
    </div>
    
    @endsection
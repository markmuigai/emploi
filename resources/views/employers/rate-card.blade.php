@extends('layouts.general-layout')

@section('title','Emploi :: Rate Card')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
<div class="container text-center py-4">
    <h2 class="orange">Rate Card</h2>
    <h2 id="advertising">Advertising</h2>
    <div class="card-group">
        <div class="card m-3">
            <div class="card-body d-flex flex-column justify-content-between">
                <h5 class="purple">SOLO</h5>
                <h1 class="orange">Kshs. 700</h1>
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
                    <a href="#get-package" class="btn btn-orange-alt">Get Package</a>
                </div>
            </div>
        </div>
        <div class="card m-3">
            <div class="card-body d-flex flex-column justify-content-between">
                <h5 class="purple">SOLO PLUS</h5>
                <h1 class="orange">Kshs. 1,300</h1>
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
                    <a href="#get-package" class="btn btn-orange-alt">Get Package</a>
                </div>
            </div>

        </div>
        <div class="card m-3">
            <div class="card-body d-flex flex-column justify-content-between">
                <h5 class="purple">INFINITI</h5>
                <h1 class="orange">Kshs. 2,900</h1>
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
                    <a href="#get-package" class="btn btn-orange-alt">Get Package</a>
                </div>
            </div>
        </div>
    </div>
    <h2 id="database-search">Database Search</h2>
    <div class="card-group">
        <div class="card m-3">
            <div class="card-body d-flex flex-column justify-content-between">
                <h5 class="purple">BASIC</h5>
                <h1 class="orange">Kshs. 2,000</h1>
                <div>
                    <hr>
                </div>
                <p>Package Includes:</p>
                <ul class="tick">
                    <li>Unlimited searches in 1 job category</li>
                    <li>Get up to 20 CVs per category.</li>
                </ul>
                <div class="text-center">
                    <hr>
                    <a href="#get-package" class="btn btn-orange-alt">Get Package</a>
                </div>
            </div>
        </div>
        <div class="card m-3">
            <div class="card-body d-flex flex-column justify-content-between">
                <h5 class="purple">HYBRID</h5>
                <h1 class="orange">Kshs. 3,500</h1>
                <div>
                    <hr>
                </div>
                <p>Package Includes:</p>
                <ul class="tick">
                    <li>Unlimited searches in 1 job category</li>
                    <li>Getup to 50 CVs per category</li>
                    <li>1 job posted for 30 days</li>
                    <li>Advertised on our website &amp; social media pages</li>
                    <li>Job AD sent out to our entire database</li>
                </ul>
                <div class="text-center">
                    <hr>
                    <a href="#get-package" class="btn btn-orange-alt">Get Package</a>
                </div>
            </div>
        </div>
        <div class="card m-3">
            <div class="card-body d-flex flex-column justify-content-between">
                <h5 class="purple">HYBRID PLUS</h5>
                <h1 class="orange">Kshs. 5,000</h1>
                <div>
                    <hr>
                </div>
                <p>Package Includes:</p>
                <ul class="tick">
                    <li>Unlimited searches in 2 job category</li>
                    <li>Getup to 50 CVs per category</li>
                    <li>2 jobs posted for 30 days</li>
                    <li>Advertised on our website &amp; social media pages</li>
                    <li>Job AD sent out to our entire database</li>
                </ul>
                <div class="text-center">
                    <hr>
                    <a href="#get-package" class="btn btn-orange-alt">Get Package</a>
                </div>
            </div>
        </div>
    </div>
    <h2 id="premium-search">Premium Search</h2>
    <div class="row justify-content-center">
        <div class="col-12 col-md-4">
            <div class="card">
                <div class="card-body d-flex flex-column justify-content-between">
                    <h5 class="purple">PREMIUM BASIC &amp; GOLD.</h5>
                    <h1 class="orange">Request A Quote</h1>
                    <div>
                        <hr>
                    </div>
                    <p>Package Includes:</p>
                    <ul class="tick">
                        <li>Sourcing</li>
                        <li>Screening</li>
                        <li>Interview</li>
                        <li>RSI Tool Application*</li>
                        <li>Reference Checks</li>
                        <li>90 Day guarantee</li>
                    </ul>
                    <div class="text-center">
                        <hr>
                        <a href="#get-package" class="btn btn-orange-alt">Get Package</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="get-package" class="text-center mt-5">
        <div class="card py-5">
            <div class="card-body d-flex flex-column justify-content-between">
                <h3 class="orange">Reach out to us today</h3>
                <h6 class="mt-3">Call Us</h6>
                <p>
                    <a href="tel:+254702068282">0702 068 282</a> | <a href="tel:+254774569001">0774 569 001</a> | <a href="tel:+254772795017">0772 795 017</a>
                </p>
                <h6 class="mt-3">Find Us</h6>
                <p>Even Business Park, Airport North Rd, Nairobi</p>
                <h6 class="mt-3">Send Us An Email</h6>
                <p><a href="mailto:info@emploi.co">info@emploi.co</a> || <a href="mailto:sales@emploi.co">sales@emploi.co</a></p>
            </div>
        </div>
    </div>
    @endsection
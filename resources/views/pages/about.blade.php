@extends('layouts.general-layout')

@section('title','Emploi :: About Us')

@section('description')
Emploi is the Leading Platform for Talent Assessment and Matching for SME's in Africa.
@endsection

@section('content')

<div class="container pb-4">
    <div class="card about">
        <div class="card-body text-center">
            <h2 class="orange">About Us</h2>
            <p>Emploi addresses junior level job seekers’ career progression needs by providing a mixture of technological skills assessment tools and personalized career services to fast-track their landing of opportunities that match their competencies.</p>
            <p>Our vision is to be the ultimate talent solutions platform by supporting a job market where employers lack tools for assessing and
               displaying competencies & skills of young professionals, thereby spending enormous amounts of resources to effectively hire young professionals who meet their job demands in terms of delivery and job stability.
           </p>
           <p>Our mission is to impact more than 50 million jobseekers and 5 million businesses in the next 5 years.</p>
            <a href="/join" class="btn btn-orange mt-3 px-4">Sign Me Up</a>
            <a href="/employers/services" class="btn btn-default mt-3 px-4">Employer Services</a>
            <a href="/job-seekers/services" class="btn btn-orange mt-3 px-4">Job Seeker Services</a>
            <br>
        </div>
    </div>
    <div class="card">
        <div class="card-body px-5">
            <h2 class="text-center orange">Our Services</h2>
            <div class="row">
                <div class="col-md-4 my-2 icon-service d-flex">
                    <div class="icon">
                        <i class="fas fa-briefcase"></i>
                    </div>
                    <div class="icon-box-body">
                        <h5><a href="/employers/publish">Advertise Jobs</a></h5>
                        <p>Reach an audience of over 100,000 people through our network</p>
                    </div>
                </div>
                <div class="col-md-4 my-2 icon-service d-flex">
                    <div class="icon">
                        <i class="fas fa-book"></i>
                    </div>
                    <div class="icon-box-body">
                        <h5><a href="employers/browse">Browse CVs</a></h5>
                        <p>View profiles of candidates and shortlist quicker.</p>
                    </div>
                </div>
                <div class="col-md-4 my-2 icon-service d-flex">
                    <div class="icon">
                        <i class="fas fa-bolt"></i>
                    </div>
                    <div class="icon-box-body">
                        <h5><a href="employers/premium-recruitment">Premium Recruitment</a></h5>
                        <p>Let us handle your recruitment process and save time, money</p>
                    </div>
                </div>
                <div class="col-md-4 my-2 icon-service d-flex">
                    <div class="icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <div class="icon-box-body">
                        <h5>HR Services</h5>
                        <p>Outsource HR services to us and we'll manage your organization professionally</p>
                    </div>
                </div>
                <div class="col-md-4 my-2 icon-service d-flex">
                    <div class="icon">
                        <i class="fas fa-chart-bar"></i>
                    </div>
                    <div class="icon-box-body">
                        <h5>Candidate Vetting</h5>
                        <p>We perform IQ, Competency and Background checks on candidates</p>
                    </div>
                </div>
                <div class="col-md-4 my-2 icon-service d-flex">
                    <div class="icon">
                        <i class="fas fa-file"></i>
                    </div>
                    <div class="icon-box-body">
                        <h5><a href="/register">Upload CV</a></h5>
                        <p>Job Seekers upload CVs for quick job placements</p>
                    </div>
                </div>
                <div class="col-md-4 my-2 icon-service d-flex">
                    <div class="icon">
                        <i class="fas fa-pencil-alt"></i>
                    </div>
                    <div class="icon-box-body">
                        <h5><a href="/job-seekers/summit">CV Editing</a></h5>
                        <p>We edit job seekers' CVs while taking their industry into consideration</p>
                    </div>
                </div>
                <div class="col-md-4 my-2 icon-service d-flex">
                    <div class="icon">
                        <i class="fas fa-check"></i>
                    </div>
                    <div class="icon-box-body">
                        <h5><a href="/job-seekers/cv-templates">CV Templates</a></h5>
                        <p>We provide free templates and suggestions for updating your CVs</p>
                    </div>
                </div>
                <div class="col-md-4 my-2 icon-service d-flex">
                    <div class="icon">
                        <i class="fas fa-bolt"></i>
                    </div>
                    <div class="icon-box-body">
                        <h5><a href="/job-seekers/summit">Exclusive Placement</a></h5>
                        <p>Includes CV editing, interview coaching, and boost in search results as well as recommendation to employers</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('components.ads.responsive')

    <h3 class="mt-5 orange text-center" style="display: none">Our Team</h3>
    <div class="card-group" style="display: none">
        <div class="card">
            <div class="card-body team-member text-center">
                <img src="images/team/sophy.png" alt="" />
                <h5>Sophy Mwale</h5>
                <h6>Chief Executive Officer</h6>
                <a href="mailto:sophy.mwale@emploi.co"><i class="fas fa-envelope"> </i></a>
                <a href="https://twitter.com/sophymwale?lang=en" target="_blank" rel="noreferrer"><i class="fab fa-twitter"> </i></a>
                <a href="https://www.linkedin.com/in/sophy-mwale-81656b21/?originalSubdomain=ke" target="_blank" rel="noreferrer"><i class="fab fa-linkedin"> </i></a>
            </div>
        </div>
        <div class="card">
            <div class="card-body team-member text-center">
                <img src="images/team/brian.png" alt="" />
                <h5>Obare C. Brian</h5>
                <h6>Chief Technology Officer</h6>
                <a href="mailto:brian@emploi.co"><i class="fas fa-envelope"> </i></a>
                <a href="https://www.twitter.com/chiefbrob/" target="_blank" rel="noreferrer"><i class="fab fa-twitter"> </i></a>
                <a href="https://www.linkedin.com/in/chiefbrob/" target="_blank" rel="noreferrer"><i class="fab fa-linkedin"> </i></a>
            </div>
        </div>
    </div>
    <div class="card-group" style="display: none">
        <div class="card">
            <div class="card-body team-member text-center">
                <img src="images/avatar.png" alt="" />
                <h5>Margaret Ongachi</h5>
                <h6>Snr Strategist Client Relations</h6>
                <a href="mailto:margaret.ongachi@emploi.co"><i class="fas fa-envelope"> </i></a>
                <a href="https://www.linkedin.com/in/margaret-ongachi-6713a0143/" target="_blank" rel="noreferrer"><i class="fab fa-linkedin"> </i></a>
            </div>
        </div>
        <div class="card">
            <div class="card-body team-member text-center">
                <img src="images/avatar.png" alt="" />
                <h5>Ernest Wanyonyi</h5>
                <h6>Head Of Digital Marketting</h6>
                <a href="mailto:ernest.wanyonyi@emploi.co"><i class="fas fa-envelope"> </i></a>
                <a href="https://twitter.com/ernestwanyonyi9" target="_blank" rel="noreferrer"><i class="fab fa-twitter"> </i></a>
                <a href="https://www.linkedin.com/in/ernest-wanyonyi-042590194/" target="_blank" rel="noreferrer"><i class="fab fa-linkedin"> </i></a>

            </div>
        </div>
    </div>
</div>
@include('components.search-form')
@endsection

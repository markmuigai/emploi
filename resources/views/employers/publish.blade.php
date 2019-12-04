@extends('layouts.general-layout')

@section('title','Emploi :: Advertise on Emploi')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')

<div class="container pb-0 pb-lg-4 pt-4">
    <h3 class="orange text-center">
        Advertise on Emploi
    </h3>
    <p>
        Advertise your job to an audience of over 100,000 on our jobseeker database and social media communities. We provide advanced recruitment solutions to suit your business.
    </p>

    <p>
        Our services include <strong>Premium Recruitment</strong> - where we source and vet candidates on your behalf, <strong>Job Advertising and Shortlisting</strong>, and <strong>Database Search.</strong>
    </p>
    <p>
        To access these features, register as an employer and streamline your recruitment or advertise a job.
    </p>
    <div class="row mt-4 mb-2">
        <div class="col-md-6">
            <h5>Advertising Features</h5>
            <ul class="feature_list">
                <li>Reach over 100,000 job seekers through our partner networks</li>
                <li>Shortlisting dashboard</li>
                <li>Easily Schedule Interviews with candidates</li>
                <li>Job post sent as featured to job seekers</li>
                <li>Job post shared on Facebook, Twitter and LinkedIn Pages</li>
            </ul>
        </div>
        <div class="col-md-6">
            <h5>Employer Benefits</h5>
            <ul class="feature_list">
                <li>Browse our database of job seekers</li>
                <li>Shortlist and schedule interviews with job seekers</li>
                <li>Request premium recruitment</li>
                <li>Request Candidate Vetting</li>
                <li>Advertise jobs</li>
            </ul>
        </div>
    </div>
    <div class="text-center">
        <a href="/vacancies/create" class="btn btn-orange">Publish Job Post</a>
        <a href="/contact" class="btn btn-purple">Contact Us</a>
    </div>
</div>

@endsection

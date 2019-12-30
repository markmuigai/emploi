
@extends('layouts.general-layout')

@section('title','Advertise on Emploi')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')

    <main>
        <div class="top-bg"></div>
        <div class="container pb-0 pb-lg-4 pt-4">
            <div class="row">
                <div class="col-lg-8">
                    <div class="advert-details">
                        <h2 class="orange text-center">
                            Advertise on Emploi
                        </h2>
                        <p>
                            Advertise your job to an audience of over 100,000 on our job seeker database and social media communities. We provide advanced recruitment solutions to suit your business.
                        </p>

                        <p>
                            Our services include <strong>Premium Recruitment</strong> - where we source and vet candidates on your behalf, <strong>Job Advertising and Shortlisting</strong>, and <strong>Database Search.</strong>
                        </p>
                        <p>
                            To access these features, register as an employer and streamline your recruitment, advertise a job and browse candidates.
                        </p>
                    </div>

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
                <div class="col-lg-4">
                    <div class="card mt-lg-0 mt-5">
                        <div class="card-body">
                            <h4 class="text-center">Create An Advert</h4>
                            <form action="/employers/publish" method="POST">
                            	@csrf
                                <div class="form-group">
                                    <label for="">Your Name</label>
                                    <input type="text" name="name" value="" required="" class="form-control" placeholder="" maxlength="50">
                                </div>
                                <div class="form-group">
                                    <label for="">Phone Number</label>
                                    <input type="text" name="phone_number" value="" class="form-control" placeholder="" maxlength="50">
                                </div>
                                <div class="form-group">
                                    <label for="">Email Address</label>
                                    <input type="email" name="email" value="" required="" class="form-control" placeholder="" maxlength="50">
                                </div>
                                <div class="form-group">
                                    <label for="">Job Title</label>
                                    <input type="text" name="title" maxlength="100" class="form-control" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label for="description">Job Description</label>
                                    <textarea name="description" id="description" rows="5" class="form-control"></textarea>
                                </div>
                                <div class="text-center">
                                    <input type="submit" class="btn btn-orange" value="Submit">
                                    <p><em>Create an Employer profile and shortlist with our Role Suitability Index. <br>
                                    	<a href="/employers/register" class="orange">Employer Registration</a></em></p>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>


@endsection
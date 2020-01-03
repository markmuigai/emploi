@extends('layouts.dashboard-layout')

@section('title','Emploi :: Admin Panel')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@section('page_title', 'Admin Panel')

<div class="card-deck">
    <div class="card">
        <div class="card-body text-center">
            <h1 class="orange">{{ count(\App\Company::all()) }}</h1>
            <p>Companies</p>
        </div>
    </div>
    <div class="card">
        <div class="card-body text-center">
            <h1 class="orange">{{ count(\App\Seeker::all()) }}</h1>
            <p>Job Seekers</p>
        </div>
    </div>
    <div class="card">
        <div class="card-body text-center">
            <h1 class="orange">{{ count(\App\JobApplication::all()) }}</h1>
            <p>Applications</p>
        </div>
    </div>
    <div class="card">
        <div class="card-body text-center">
            <h1 class="orange">{{ count(\App\Employer::all()) }}</h1>
            <p>Employers</p>
        </div>
    </div>
</div>



<div class="container">
    <div class="single">
        <div class="text-center">
                <a href="/admin/posts" class="btn btn-sm btn-success">Job Posts</a>
                <a href="/admin/emails" class="btn btn-sm btn-danger">Send Emails</a>
                <a href="/admin/blog" class="btn btn-sm btn-primary">Blog</a>
                <a href="/admin/contacts" class="btn btn-sm btn-success">Contacts</a>
                <a href="/admin/industries" class="btn btn-sm btn-danger">Industries</a>
                <a href="/admin/received-requests" class="btn btn-sm btn-primary">Advert Requests</a>

                <br><br>

                <a href="/admin/employers" class="btn btn-sm btn-success">Employers</a>
                <a href="/admin/seekers" class="btn btn-sm btn-primary">Job Seekers</a>
                <a href="/admin/countries" class="btn btn-sm btn-success">Countries</a>

                <a href="/admin/companies" class="btn btn-sm btn-primary">Companies</a>
                <a href="/admin/candidate-vetting" class="btn btn-sm btn-danger" style="display: none">Candidate Vetting</a>
                <a href="/admin/cv-requests" class="btn btn-sm btn-info">CV Requests</a>
                <a href="/admin/premium-recruitment" class="btn btn-sm btn-success" style="display: none">Premium Recruitment</a>

                <br><br>

                <a href="/admin/cv-editing" class="btn btn-sm btn-success" style="display: none">CV Editing Requests</a>
                <a href="/admin/premium-placement" class="btn btn-sm btn-danger" style="display: none">Premium Placement Requests</a>


                <br><br>
        </div>
        <div class="clearfix"> </div>
    </div>
</div>

@endsection

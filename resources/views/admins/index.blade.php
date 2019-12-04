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
            <h1 class="orange">350</h1>
            <p>Companies</p>
        </div>
    </div>
    <div class="card">
        <div class="card-body text-center">
            <h1 class="orange">5000</h1>
            <p>Job Seekers</p>
        </div>
    </div>
    <div class="card">
        <div class="card-body text-center">
            <h1 class="orange">520</h1>
            <p>Applications</p>
        </div>
    </div>
    <div class="card">
        <div class="card-body text-center">
            <h1 class="orange">300</h1>
            <p>Job Posts</p>
        </div>
    </div>
</div>



<div class="container">
    <div class="single">

        <div class="">

            <p style="text-align: center;">

                <br>

                <a href="/admin/posts" class="btn btn-sm btn-success">Job Posts</a>
                <a href="/admin/emails" class="btn btn-sm btn-danger">Send Emails</a>
                <a href="/admin/blog" class="btn btn-sm btn-primary">Blog</a>
                <a href="/admin/contacts" class="btn btn-sm btn-success">Contacts</a>

                <br><br>

                <a href="/admin/employers" class="btn btn-sm btn-success">Employers</a>
                <a href="/admin/candidate-vetting" class="btn btn-sm btn-danger">Candidate Vetting</a>
                <a href="/admin/cv-requests" class="btn btn-sm btn-info">CV Requests</a>
                <a href="/admin/premium-recruitment" class="btn btn-sm btn-success">Premium Recruitment</a>

                <br><br>

                <a href="/admin/cv-editing" class="btn btn-sm btn-success">CV Editing Requests</a>
                <a href="/admin/premium-placement" class="btn btn-sm btn-danger">Premium Placement Requests</a>
                <a href="/admin/seekers" class="btn btn-sm btn-primary">Job Seekers</a>

                <br><br>
                <a href="/admin/posts" class="btn btn-sm btn-success">Countries</a>
                <a href="/admin/emails" class="btn btn-sm btn-danger">Industries</a>
                <a href="/admin/companies" class="btn btn-sm btn-primary">Companies</a>


            </p>



        </div>
        <div class="clearfix"> </div>
    </div>
</div>

@endsection

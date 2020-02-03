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
        @include('components.ads.responsive')

        <div class="text-center">
                <br>

                <?php
                $nj = \App\Post::where('status','inactive')->count();
                $co = \App\Contact::where('resolved_on',null)->count();
                $ar = \App\Advert::where('status','pending')->count();
                ?>

                <a href="/admin/posts" class="btn btn-sm btn-success">Job Posts {{ $nj > 0 ? '('.$nj.')' : '' }}</a>
                <a href="/admin/emails" class="btn btn-sm btn-info">Send Emails</a>
                <a href="/admin/blog" class="btn btn-sm btn-primary">Blog</a>
                <a href="/admin/contacts" class="btn btn-sm btn-success">Contacts {{ $co > 0 ? '('.$co.')' : '' }}</a>
                <a href="/admin/industries" class="btn btn-sm btn-danger">Industries</a>
                <a href="/admin/received-requests" class="btn btn-sm btn-primary">Advert Requests {{ $ar > 0 ? '('.$ar.')' : '' }}</a>

                <br><br>

                <a href="/admin/employers" class="btn btn-sm btn-success">Employers</a>
                <a href="/admin/seekers" class="btn btn-sm btn-primary">Job Seekers</a>
                <a href="/admin/countries" class="btn btn-sm btn-success">Countries</a>
                <a href="/admin/cv-requests" class="btn btn-sm btn-info">CV Requests</a>
                <a href="/admin/companies" class="btn btn-sm btn-primary">Companies</a>
                

                <br><br>
                <a href="/admin/job-post-groups" class="btn btn-sm btn-success">Job Post Groups</a>
                <a href="/admin/metrics" class="btn btn-sm btn-danger">View Metrics</a>
                <a href="/admin/unregistered-users" class="btn btn-sm btn-primary">Unregistered Users</a>
                <br><br>
                <a href="/admin/cv-edit-requests" class="btn btn-sm btn-success">CV Edit Requests ({{ count(\App\CvEditRequest::all()) }})</a>
                <a href="/admin/cveditors" class="btn btn-sm btn-info">CV Editors</a>
                <a href="/admin/faqs" class="btn btn-sm btn-danger">FAQs</a>
                <a href="/admin/vacancy-emails" class="btn btn-sm btn-info">Vacancy Emails</a>

                <a href="/admin/candidate-vetting" class="btn btn-sm btn-danger" style="display: none">Candidate Vetting</a>
                
                <a href="/admin/premium-recruitment" class="btn btn-sm btn-success" style="display: none">Premium Recruitment</a>

                <br><br>

                <a href="/admin/cv-editing" class="btn btn-sm btn-success" style="display: none">CV Editing Requests</a>
                <a href="/admin/premium-placement" class="btn btn-sm btn-danger" style="display: none">Premium Placement Requests</a>


                

                <hr>
                <a href="/admin/products" class="btn btn-sm btn-success">Products ({{ count(\App\Product::all()) }})</a>
                <a href="/admin/invoices" class="btn btn-sm btn-primary">Invoices</a>
                <a href="/admin/orders" class="btn btn-sm btn-success">Orders</a>
                <a href="/admin/product-orders" class="btn btn-sm btn-info">Product Orders</a>

        </div>
        <div class="clearfix"> </div>
    </div>
</div>

@endsection

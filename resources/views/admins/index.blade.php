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

                <a href="/admin/seekers" class="btn btn-sm btn-primary">Job Seekers</a>
                <a href="/admin/cveditors" class="btn btn-sm btn-info">CV Editors</a>
                <a href="/admin/cv-edit-requests" class="btn btn-sm btn-success">CV Edit Requests ({{ count(\App\CvEditRequest::all()) }})</a>
                <a href="/admin/blog" class="btn btn-sm btn-primary">Blog</a>
                <a href="/admin/bloggers" class="btn btn-sm btn-danger">Bloggers</a>
                

                <br><br>

                <a href="/admin/employers" class="btn btn-sm btn-success">Employers</a>
                <a href="/admin/cv-requests" class="btn btn-sm btn-info">CV Requests</a>
                <a href="/admin/companies" class="btn btn-sm btn-primary">Companies</a>
                <a href="/admin/received-requests" class="btn btn-sm btn-primary">Advert Requests {{ $ar > 0 ? '('.$ar.')' : '' }}</a>

                <br><br>



                
                <a href="/admin/emails" class="btn btn-sm btn-info">Send Emails</a>
                
                <a href="/admin/contacts" class="btn btn-sm btn-success">Contacts {{ $co > 0 ? '('.$co.')' : '' }}</a>
                <a href="/admin/industries" class="btn btn-sm btn-danger">Industries</a>
                
                
                <a href="/admin/countries" class="btn btn-sm btn-success">Countries</a>
                
                
                

                <br><br>
                
                <a href="/admin/metrics" class="btn btn-sm btn-danger">View Metrics</a>
                <a href="/admin/unregistered-users" class="btn btn-sm btn-primary">Unregistered Users</a>
                
                
                <a href="/admin/faqs" class="btn btn-sm btn-danger">{{ __('other.faqs') }}</a>
                <a href="/admin/referrals" class="btn btn-sm btn-info">Referrals</a>
                <a href="/admin/invite-links" class="btn btn-sm btn-success">Invite Links</a>
                


                <br><br>

                <a href="/admin/vacancy-emails" class="btn btn-sm btn-info">Vacancy Emails</a>
                
                <a href="/admin/posts" class="btn btn-sm btn-success">Job Posts {{ $nj > 0 ? '('.$nj.')' : '' }}</a>
                <a href="/admin/job-post-groups" class="btn btn-sm btn-success">Job Post Groups</a>



                

                <hr>
                <a href="/admin/products" class="btn btn-sm btn-success">Products ({{ count(\App\Product::all()) }})</a>
                <a href="/admin/invoices" class="btn btn-sm btn-primary">Invoices ({{ count(\App\Invoice::where('alternative_payment_slug',null)->where('pesapal_transaction_tracking_id',null)->get()) }})</a>                
                <a href="/admin/referees" class="btn btn-sm btn-info">Referees({{ count(\App\Referee::where('status','ready')->get()) }})</a>

                <a href="/admin/orders" class="btn btn-sm btn-success" style="display: none">Orders</a>
                <a href="/admin/product-orders" class="btn btn-sm btn-info" style="display: none">Product Orders</a>

                <hr>
                <a href="/admin/events" class="btn btn-sm btn-orange">Events ({{ count(\App\Meetup::where('started_at',NULL)->get()) }})</a>

        </div>
        <div class="clearfix"> </div>
    </div>
</div>

@endsection

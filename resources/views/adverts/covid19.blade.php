@extends('layouts.zip')

@section('title','Emploi :: Covid 19 Advert Created')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
<div class="container py-4">
    <h3 class="orange text-center">Covid 19 Advert Created</h3>
    <div class="row align-items-center">
        <div class="col-md-4">
            <img src="/images/promotions/free-job-posting.jpg" class="w-100" alt="Role Suitability Index (RSI)">
        </div>
        <div class="col-md-8">
            <p>
                Your advertisement has been identified as covid and action will be taken promptly.
            </p>
            <p>
                <a href="https://emploi.co/blog/a-review-of-government-measures-to-combat-covid-19">See how we are supporting companies and individuals in the fight against COVID-19</a>
            </p>
            <p>
                <strong><i class="fas fa-info"></i> NOTE</strong> Your job post has to be approved for you to receive applications.
            </p>
            
            @include('components.ads.responsive')
        </div>
    </div>
    @endsection

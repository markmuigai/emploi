@extends('layouts.general-layout')

@section('title','Welcome to Emploi')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')

<!-- LANDING PAGE -->
<div class="landing-alt">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="content">
                    <h4 class="text-uppercase">Get Your Job Done</h4>
                    <h1>Blast Off Your Career</h1>
                    <p>Welcome to Emploi, an online placement platform that advertises job seekers to employers</p>
                    <a href="/join" class="btn btn-orange px-4">Join Now</a>
                    <a href="/login" class="btn btn-white px-4">Login</a>
                </div>
            </div>
            <div class="col-lg-6 d-md-none d-lg-block">
                <div class="landing-img text-center">
                    <img src="images/landing.jpg" alt="">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END OF LANDING PAGE -->


@endsection
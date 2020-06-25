@extends('layouts.general-layout')

@section('title','Emploi :: Job Seeker Services')

@section('description')
Emploi is the Leading Platform for Talent Assessment and Matching for SME's in Africa.
@endsection

@section('content')

<div class="container">
      <div class="card-body text-center">
            <h3 class="orange">Featured Job Seeker</h3>
        </div>
           <div class="col-md-6 offset-md-3">
                <div class="card my-2">
                    <div class="card-body">
                        <p class="orange">FEATURED JOB SEEKER</p>
                        <ul class="tick">            
                             <li>Have your profile rank first in applications and searches.</li>
                             <li>Get real-time analytics of your applications,shortlist and vacancies on the dashboard.</li>
                        </ul>
                        <ul class="tick">
                            <li>Get real-time notifications when;</li>
                        </ul>
                            <ul class="text-left">
                                <li>you're shortlisted,</li>
                                <li>your profile is viewed,</li>
                                <li>your CV is Requested.</li>
                             </ul> 
                        <div class="text-center">
                             <h1>Kshs <br>159</h1>
                            @if( isset(Auth::user()->id) && Auth::user()->role == 'seeker' )
                            <form method="POST" action="/checkout">
                                @csrf
                                <input type="hidden" name="product" value="featured_seeker">
                                <br><p>
                                <input type="submit" name="" value="Request" class="btn btn-orange-alt">
                                </p>
                            </form>
                            @else
                            <h5><a href="/login?redirectToUrl={{ url('/job-seekers/services') }}" class="orange" >Login</a> Or <a href="/register?redirectToUrl={{ url('/job-seekers/services') }}" class="orange">Register</a> To Request</h5>
                            @endif
                        </div>                    
                    </div>
                </div>
                <div class="text-center">                    
                    <a href="/job-seekers/featured">
                        <img src="/images/featured.png" width="100%" alt="get featured"> 
                    </a>    
        </div>
    </div>   



    <div class="row">
        @include('components.featuredJobs')
    </div>
</div>
@include('components.search-form')
@include('components.ads.responsive')

@endsection

@extends('layouts.general-layout')

@section('title','Emploi :: Role Suitability Index')

@section('description')
Emploi is the Leading Platform for Talent Assessment and Matching for SME's in Africa.
@endsection

@section('content')
<div class="container py-4">
    <h3 class="orange text-center">Role Suitability Index (RSI)</h3>
    <div class="row align-items-center">
        <div class="col-md-4">
            <img src="/images/rsi.png" class="w-100" alt="Role Suitability Index (RSI)">
        </div>
        <div class="col-md-8">
            <p>
                The RSI is an important <strong>tool for employers to evaluate a candidate's abilities</strong> by measuring the candidates strengths and weaknesses. It encompases Interviews, Background Checks (Education Background, Employment Background), IQ Tests, Psychometric Tests, Skills check amongst others.
            </p>
            @include('components.ads.responsive')
            <p>
                To use the RSI, <a href="/employers/register" class="orange">create an employer profile</a> or <a href="/employers/dashboard" class="orange">open the dashboard</a>. Create a job advertisement and model your ideal job seeker and rank
                applicants using the RSI Tool.
            </p>
            <p>
                <strong><i class="fas fa-info"></i> NOTE</strong> Your job post has to be approved for you to receive applications.
            </p>
        </div>
    </div>
    @endsection

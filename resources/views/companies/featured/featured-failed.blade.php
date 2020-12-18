@extends('layouts.dashboard-layout')

@section('title','Emploi :: Company Featured')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@section('page_title', 'Company Featured')
<div class="card">
    <div class="card-body text-center">
    	{{-- @include('components.ads.responsive') --}}
        <p>
            {{ $company->name }} was not featured on Emploi!<br>
            You have {{ count(Auth::user()->employer->remainingCompanyBoosts()) }} company boost(s) remaining.
        </p>

        <p style="text-align: center;">
        	<a href="/checkout?product=featured_company" class="btn btn-sm btn-orange">Purchase Company Boost</a>
            <a href="/profile" class="btn btn-sm btn-orange-alt">My Profile</a>
        </p>
    </div>
</div>


@endsection
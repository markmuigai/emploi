@extends('layouts.dashboard-layout')

@section('title','Emploi :: Company Featured')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@section('page_title', 'Company Featured')
<div class="card">
    <div class="card-body text-center">
    	@include('components.ads.responsive')
        <p>
            {{ $company->name }} is featured on emploi for the next {{ \App\Product::where('slug','featured_company')->first()->days_duration }} days. <br>
            Job posts will be highlighted and would rank top in the search.
        </p>

        <p style="text-align: center;">
        	<a href="/profile" class="btn btn-sm btn-orange">My Profile</a>
        </p>
    </div>
</div>


@endsection
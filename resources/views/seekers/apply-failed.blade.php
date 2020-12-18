@extends('layouts.dashboard-layout')

@section('title','Emploi :: Application Failed')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@section('page_title', $post->title)

<div class="card">
    <div class="card-body text-center">
        <h4 style="color: red">Application Failed</h4>
         {{-- @include('components.ads.responsive') --}}
        <p>Application for {{ $post->title }} failed. Please try again in a few moments.</p>
        <p>If the issue persists, please <a href="/contact" class="orange">contact us</a> for assistance.</p>
        @include('components.otherJobs')
    </div>
</div>

@endsection

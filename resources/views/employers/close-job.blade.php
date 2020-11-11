@extends('layouts.dashboard-layout')

@section('title','Emploi')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@section('page_title', 'Select A Candidate')

<div class="card">
    <div class="card-body p-5 text-center">
        <h3 class="orange">{{ $post->title }}</h3>
        @include('components.ads.responsive')
        <a href="/employers/applications/{{ $post->slug }}" class="btn btn-sm btn-purple">Applications ({{ count($post->applications) }})</a>
        @if(!$post->hasModelSeeker())
            <a href="/employers/applications/{{ $post->slug }}/rsi" class="btn btn-sm btn-danger">RSI Model Not Created</a>
        @else
            <a href="/employers/applications/{{ $post->slug }}/rsi" class="btn btn-sm btn-orange">RSI Model</a>
        @endif
        @if($post->status == 'active')
            <a href="/employers/applications/{{ $post->slug }}/invite" class="btn btn-sm btn-purple">Invite Candidates</a>
        @else
        @endif
        <hr>
        <h4>Selected Candidates</h4>
        <div class="row">
            @forelse($post->candidates as $c)
            <div class="col-md-4 my-3 mx-1 py-5 border">
                <div class="row justify-content-center">
                    <img src="{{ asset($c->seeker->user->getPublicAvatarUrl()) }}" class="circle-img" alt="{{ $c->seeker->user->name }}">
                </div>
                <div class="row justify-content-center">
                    <a href="/employers/browse/{{ $c->seeker->user->username }}" class="orange d-block">{{ $c->seeker->user->name }}</a>
                </div>
                <div class="row justify-content-center">
                    <p>RSI {{ $c->seeker->getRsi($post) }}%</p>
                </div>
                <div class="row justify-content-center">
                    <p>{{ $post->location->country->currency }} {{ $c->monthly_salary }} P.M.</p>
                </div>
                <div class="row justify-content-center">
                    <a href="#" class="btn btn-primary">Interview Evaluation Form</a>
                </div>
            </div>
            @empty
        </div>
        <p>No candidates have been selected.</p>
        @endforelse
        @if($post->positions > count($post->candidates))
        <div class="row">
            <div class="col-md-12 m-5">
                <h4>Select Candidates</h4>
                <form method="post">
                    @csrf
                    <div class="form-group">
                        <label>Select Candidate</label>
                        <select class="custom-select" name="seeker_id" required="">
                            <option value="">Select Candidate</option>
                            @forelse($post->shortlisted as $a)
                            <option value="{{ $a->user->seeker->id }}">RSI {{ $a->user->seeker->getRsi($post) }}% || {{ $a->user->name }} </option>
                            @empty
                            @endforelse
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Monthly Salary</label>
                        <input type="number" name="monthly_salary" class="form-control" value="{{ $post->monthly_salary }}" required="">
                    </div>
                    <button type="submit" class="btn btn-orange" name="button">Select</button>
                </form>
            </div>
        </div>
        <hr>
        @else
        <p>All Positions have been filled</p>
        @endif
        @endsection
    </div>
</div>

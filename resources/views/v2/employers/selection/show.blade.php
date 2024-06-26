@extends('layouts.dashboard-layout')
@section('title','Emploi')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@section('page_title', 'Select A Candidate')
<div class="card">
    <div class="card-body text-center">
        <h3 class="orange">{{ $post->title }}</h3>
        {{-- @include('components.ads.responsive') --}}
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
            <div class="col-md-6">
                <div class="row align-items-center">
                    <div class="col-2">
                        <img src="{{ asset($c->seeker->user->getPublicAvatarUrl()) }}" class="circle-img" alt="{{ $c->seeker->user->name }}">
                    </div>
                    <div class="col-10">
                        <a href="/employers/browse/{{ $c->seeker->user->username }}" class="orange">{{ $c->seeker->user->name }}</a>
                        <p>RSI {{ $c->seeker->getRsi($post) }}%</p>
                        <p>{{ $post->location->country->currency }} {{ $c->monthly_salary }} P.M.</p>
                    </div>
                </div>
            </div>
            @empty
        </div>
        <p>No candidates have been selected.</p>
        @endforelse
        @if($post->positions > count($post->candidates))
        <hr>
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
        @else
        <p>All Positions have been filled</p>
        @endif
    </div>
</div>
@endsection
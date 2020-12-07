@extends('layouts.dashboard-layout')

@section('title','Emploi :: Invite Candidates')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@section('page_title', 'Invite Candidates')

<div class="card">
    <div class="card-body text-center">
        <h2>
            Invitation for {{ $post->title }}
        </h2>
        <a href="/employers/applications/{{ $post->slug }}" class="btn btn-orange">Applications ({{ count($post->applications) }})</a>

        @if(!$post->hasModelSeeker())
        <a href="/employers/applications/{{ $post->slug }}/rsi" class="btn btn-danger"><i class="fas fa-warning"></i> RSI Model Not Created</a>
        @else
        <a href="/employers/applications/{{ $post->slug }}/rsi" class="btn btn-purple"><i class="fas fa-check"></i> RSI Model</a>
        @endif

        <hr>

        @if($post->status == 'active')
        <p>
            Share the link below to invite applications for this position.
        </p>
        <h4 class="orange my-3"><a href="{{ url('/vacancies/'.$post->slug.'/apply') }}">
                {{ url('/vacancies/'.$post->slug.'/apply') }}
            </a></h4>

        <div class="social">
            <a class="p-3" href="http://www.facebook.com/sharer.php?u={{ url('/vacancies/'.$post->slug.'/apply') }}" target="_blank" rel="noreferrer">
                <i class="fab fa-facebook"></i> Share
            </a>
            <a class="p-3" href="https://twitter.com/share?url={{ url('/vacancies/'.$post->slug.'/apply') }}&amp;text={{ urlencode($post->title) }}&amp;hashtags=Emploi{{ $post->location->country->code }}" target="_blank" rel="noreferrer">
                <i class="fab fa-twitter"></i> Tweet
            </a>
            <a class="p-3" href="http://www.linkedin.com/shareArticle?mini=true&amp;url={{ url('/vacancies/'.$post->slug) }}" target="_blank" rel="noreferrer">
                <i class="fab fa-linkedin"></i> Share
            </a>
        </div>
        <p>
            All applicants <strong>must register a profile</strong> and update their profile
        </p>
        @else
        <p>
            This position has been closed and further applications cannot be received.
        </p>
        @endif
    </div>
</div>

@endsection

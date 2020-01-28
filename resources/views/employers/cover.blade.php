@extends('layouts.dashboard-layout')

@section('title','Emploi')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@section('page_title', 'Cover Letter')

<div class="card">
    <div class="card-body">
        <h2>
            <a href="/employers/browse/{{ $application->user->username }}" class="orange">
                {{ $application->user->name }}
            </a>
        </h2>
        @include('components.ads.responsive')
        <p class="orange">
            <a href="/employers/applications/{{ $application->post->slug }}">{{ $application->post->title }}</a>
        </p>
        <p>
            <?php echo \Carbon\Carbon::createFromTimeStamp(strtotime($application->created_at))->diffForHumans() ?>
        </p>
        <hr>
        <p>
            <?php echo $application->cover ?>
        </p>
    </div>
</div>

@endsection
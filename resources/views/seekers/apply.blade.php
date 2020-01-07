@extends('layouts.dashboard-layout')

@section('title','Emploi :: Apply '.$post->getTitle())

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@section('page_title', 'Apply as '.$post->getTitle())

<div class="card">
    <div class="card-body">
        <div class="text-right">
            <a href="/vacancies/{{ $post->slug }}" class="btn btn-sm btn-purple">View Job</a>
            <a href="#share-links" class="btn btn-sm btn-orange-alt" style="display: none">Share</a>
        </div>
        <div class="row align-items-center">
            <div class="col-md-6">
                <?php $img = $post->image == 'unknown.png' ? 'images/a1.jpg' : $post->image ?>
                <img src="{{ asset($post->imageUrl) }}" class="img-responsive w-100" alt="{{ $post->getTitle() }}" />
            </div>
            <div class="col-md-6">
                <p><strong>Posted: </strong>{{ $post->since }}</p>
                <p><strong>Position: </strong>{{ $post->vacancyType->name }}</p>
                <p><strong>Company: </strong>{{ isset(Auth::user()->id) ? $post->company->name : 'Login to view' }}</p>
                <p><strong>Location: </strong>{{ $post->location->name }}, {{ $post->location->country->name }}</p>
                <p><strong>Apply by: </strong>{{ $post->deadline }}</p>
                <p><strong>Education Requirements: </strong>{{ $post->education_requirements }}, {{ $post->industry->name }}</p>
                <p><strong>Experience: </strong>{{ $post->experience_requirements }}</p>
                <p><strong>Salary: </strong>{{ isset(Auth::user()->id) ? '~ '.$post->location->country->currency.' '.$post->monthly_salary.' p.m.' : 'Login to view' }}</p>
                <p><strong>Number of Openings: </strong>{{ $post->positions }}</p>
            </div>
        </div>
        <hr>

        <div class="text-center pt-3">
            <h3 class="orange">Application for {{ $post->getTitle() }}</h3>
        </div>
        @if(!Auth::user()->seeker->hasApplied($post))
        <form method="post" action="/vacancies/{{ $post->slug }}/apply">
            @csrf
            <div class="form-group">
                <label>Cover Letter:</label>
                <textarea class="form-control" name="cover" rows="5" id="cover" placeholder="Compose cover letter" required="required"></textarea>
            </div>

            <div class="form-group" style="display: none">
                <input type="checkbox" checked="" name="follow"> Follow {{ $post->company->name }}
            </div>

            <button type="submit" name="button" class="btn btn-orange">Submit Application</button>

            <p>
                Your profile and resume will be made available to {{ $post->company->name }}. <a href="/profile/edit" class="orange">Edit my profile</a>
            </p>
        </form>
        <script type="text/javascript" src="{{ asset('ckeditor/ckeditor.js') }}"></script>
        <script>
            setTimeout(function() {

                CKEDITOR.replace('cover');

            }, 3000);
        </script>
        @else

        <p style="text-align: center;">
            <br>
            Your application for this position has already been submitted. <br>
            <a href="/profile/applications/">Click here</a> to view your applications.
        </p>

        @endif





    </div>
</div>
</div>


@endsection

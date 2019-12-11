@extends('layouts.dashboard-layout')

@section('title','Emploi :: '.$title)

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@section('page_title', 'Job Vacancies')
<hr>
<h4>Search</h4>
<form method="get" class="form-row" action="{{ url('/vacancies/search') }}">
    <div class="col-lg-3 col-md-6 py-2">
        <input type="text" name="q" class="form-control" placeholder="Enter Keyword(s)" value="{{ isset($search_query) ? $search_query : '' }}">
    </div>
    <div class="col-lg-3 col-md-6 py-2">
        <select class="custom-select" name="location">
            <option value="">All Locations</option>
            @forelse($locations as $l)
            <option value="{{ $l->id }}" {{ isset($search_location) && $search_location == $l->id ? 'selected=""' : '' }}>
                {{ $l->name.', '.$l->country->code }}
            </option>
            @empty
            @endforelse
        </select>
    </div>
    <div class="col-lg-3 col-md-6 py-2">
        <select class="custom-select" name="industry">
            <option value="">All Industries</option>
            @forelse($industries as $ind)
            <option value="{{ $ind->id }}" {{ isset($search_ind) && $search_ind == $ind->id ? 'selected=""' : '' }}>
                {{ $ind->name }}
            </option>
            @empty
            @endforelse
        </select>
    </div>
    <div class="col-lg-3 col-md-6 py-2">
        <select class="custom-select" name="vacancyType">
            <option value="">All Vacancy Types</option>
            @forelse($vacancyTypes as $l)
            <option value="{{ $l->id }}" {{ isset($search_vtype) && $search_vtype == $l->id ? 'selected=""' : '' }}>
                {{ $l->name }}
            </option>
            @empty
            @endforelse
        </select>
    </div>
    <div class="col-12 my-2 text-center">
        <button type="submit" name="button" class="btn btn-sm btn-orange">Search</button>
        @if(isset($search_vtype) || isset($search_ind) || isset($search_location) || isset($search_query))
        <button type="reset" name="button" class="btn btn-sm btn-orange-alt ml-3"><a href="/vacancies">Reset</a></button>
        @endif
        <hr>
    </div>
</form>
<!-- JOB CARD -->
@forelse($posts as $post)
<div class="card py-2 mb-4">
    <div class="card-body">
        <div class="row align-items-center">
            <div class="col-12 col-lg-8">
                <div class="row align-items-center">
                    <div class="col-4">
                        <a href="/vacancies/{{$post->slug}}/">
                            <img src="{{ asset($post->imageUrl) }}" class="w-100" alt="{{ $post->title }}" />
                        </a>
                    </div>
                    <div class="col-8">
                        <h4><a href="/vacancies/{{$post->slug}}/">{{ $post->title }}</a></h4>
                        <a href="/vacancies/{{$post->slug}}/" class="text-success">{{ $post->company->name }}</a>
                        <p><i class="fas fa-map-marker-alt orange"></i> {{ $post->location->country->name }}, {{ $post->location->name }}</p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-4 job-actions">
                <p><i class="far fa-calendar-check"></i> {{ $post->readableDeadline }}</p>
                <p>
                    <strong>
                        @if(isset(Auth::user()->id))
                        {{ $post->monthlySalary() }} {{ $post->monthly_salary == 0 ? '' : 'p.m.' }}
                        @else
                        <a href="/login" class="orange">Login</a> to view salary
                        @endif
                    </strong>
                </p>
                <p>Current Openings: <strong>{{ $post->positions }} Position{{ $post->positions == 1 ? '' : 's' }}</strong></p>
            </div>

        </div>
        <hr>
        <div class="row justify-content-between align-items-center">
            <div class="col-12 col-md-6 col-lg-4">
                <p>
                    {{-- @if($post->isActive) --}}
                    <i class="fas fa-share-alt"></i>
                    Share:
                    <a href="{{ $post->shareFacebookLink }}" target="_blank" style="margin-left: 0.5em"><i class="fab fa-facebook-f"></i></a>
                    <a href="{{ $post->shareTwitterLink }}" target="_blank" style="margin-left: 0.5em"><i class="fab fa-twitter"></i></a>
                    <a href="{{ $post->shareLinkedinLink }}" target="_blank" style="margin-left: 0.5em"><i class="fab fa-linkedin"></i></a>
                    {{-- @else
                    <span>Sharing Disabled</span>
                    @endif --}}
                </p>
            </div>
            <div class="col-12 col-md-6 col-lg-4 job-actions">
                <p>
                    <span class="badge {{ $post->vacancyType->badge }}">{{ $post->vacancyType->name }}</span>
                </p>
            </div>
        </div>
    </div>
</div>
@empty
<div class="card">
    <div class="card-body text-center">
        <p>No job posts found</p>
    </div>
</div>
@endforelse
<!-- END OF ALL JOBS -->

<div>
    @if(isset($search))
    @else
    {{ $posts->links() }}
    @endif
</div>


@endsection

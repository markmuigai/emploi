@extends('layouts.dashboard-layout')

@section('title','Emploi :: '.$title)

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@section('page_title', $title)
<form method="get" class="form-row" action="{{ url('/vacancies/search') }}">
    <div class="col-lg-3 col-md-6 py-2">
        <input type="text" name="q" class="form-control" placeholder="Enter Keyword(s)" value="{{ isset($search_query) ? $search_query : '' }}" maxlength="50">
    </div>
    <div class="col-lg-3 col-md-6 py-2">
        <select class="selectpicker" data-live-search="true" name="location">
              <option value="">All Locations</option>
              @forelse($locations as $l)
              <option class="d-flex" value="{{ $l->id }}" {{ isset($search_location) && $search_location == $l->id ? 'selected=""' : '' }}>
                  {{ $l->name.', '.$l->country->code }}
              </option>
              @empty
              @endforelse
        </select>
    </div>
    <div class="col-lg-3 col-md-6 py-2">
        <select class="selectpicker" data-live-search="true" name="industry">
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
        <select class="selectpicker" name="vacancyType" data-live-search="true">
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
        <button type="reset" name="button" class="btn btn-sm btn-danger ml-3"><a href="/vacancies">Reset</a></button>
        @endif
        <a href="/job-seekers/cv-editing#request-cv-edit-form" class="btn btn-orange-alt">Request CV Editing</a>
        <a href="/employers/publish" class="btn btn-orange">Advertise here</a>
        <hr>
    </div>
</form>
<!-- JOB CARD -->
<?php $adsCounter = 0; ?>
@forelse($posts as $post)
<div class="card mb-4">
    <div class="card-body">
        <div class="row align-items-center">
            <div class="col-12 col-lg-8">
                <div class="row align-items-center">
                    <div class="col-4">
                        <a href="/vacancies/{{$post->slug}}/">
                            <img src="{{ asset('images/500g.png') }}" data-src="{{ asset($post->imageUrl) }}" class="w-100 lazy" alt="{{ $post->getTitle() }}" />
                        </a>
                    </div>
                    <div class="col-8">
                        <h4><a href="/vacancies/{{$post->slug}}/">{{ $post->getTitle() }}</a> 
                            @if($post->featured == 'true')
                                @if(now()->diffInDays($post->created_at) > 10)
                                    <span class="badge badge-success">FEATURED</span>
                                @else
                                    <span class="badge badge-primary">NEW</span>
                                @endif
                            @endif
                        </h4>
                        <a href="/companies/{{$post->company->name}}/" class="text-success">{{ $post->company->name }}</a>
                        <p><i class="fas fa-map-marker-alt orange"></i> {{ $post->location->country->name }}, {{ $post->location->name }}</p>
                        <p>
                            <a href="/vacancies/{{ $post->vacancyType->slug  }}" title="View {{ $post->vacancyType->name }} jobs">
                                <span class="badge {{ $post->vacancyType->badge }}">
                                    

                                    {{ $post->vacancyType->name }}

                                </span>
                            </a>
                            
                        </p>
                        <p>
                            <i class="fa fa-graduation-cap"></i> {{ $post->educationLevel->name }}
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-4 job-actions">
                @if($post->company->isFeatured())
                <a href="/vacancies/{{ $post->slug }}" class="btn btn-orange-alt"><i class="far fa-calendar-check"></i> HIRING NOW</a>
                @endif
                <p>
                    <strong>
                        @if(isset(Auth::user()->id))
                        {{ $post->monthlySalary() }} {{ $post->monthly_salary == 0 ? '' : 'p.m.' }}
                        @else
                        <a href="/login" class="orange">{{ __('auth.login') }}</a> to view salary
                        @endif
                    </strong>
                </p>
                <p>Current Openings: <strong>{{ $post->positions }} Position{{ $post->positions == 1 ? '' : 's' }}</strong></p>
                <p>
                    <a href="/vacancies/{{ $post->industry->name }}" title="View {{ $post->industry->name }} jobs">
                        <i class="fa fa-briefcase"></i> {{ $post->industry->name }}
                    </a>
                </p>
                <p>Posted {{ $post->since }}</p>
            </div>

        </div>
        <hr>
        <div class="row justify-content-between align-items-center">
            <div class="col-12 col-md-6 col-lg-4">
                <p>
                    @include('components.post-share-modal')
                    <button class="btn btn-orange-alt" data-toggle="modal" data-target="#postModal{{ $post->id }}"><i class="fas fa-share-alt"></i> Share</button>

                </p>
            </div>
            <div class="col-12 col-md-6 col-lg-4 job-actions">
                <?php 
                    $show = true; 
                    if(isset(Auth::user()->id) && Auth::user()->role == 'seeker' && Auth::user()->seeker->hasApplied($post))
                    {
                        $show = false;
                    }
                ?>
                @if($show)
                <a href="/vacancies/{{$post->slug}}/" class="btn btn-orange">View and Apply</a>
                @else
                <span class="btn btn-orange-alt">Already Applied</span>
                @endif
            </div>
        </div>
    </div>
</div>
<?php $adsCounter++; ?>
@if($adsCounter % 4 == 0 || $adsCounter == 1)
<div class="card mb-4">
    <div class="card-body">
        @if($agent->isMobile())
            @include('components.ads.mobile_400x350')
        @else            
            @include('components.ads.flat_728x90')
        @endif
    </div>
</div>  
@endif
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

@include('components.featuredEmployers')

<a href="/refer">
    <img src="images/friends_refer_lg.png" style="width: 100%" alt="Refer your Friends for Rewards">
</a>


@endsection

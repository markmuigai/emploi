@extends('layouts.dashboard-layout')

@section('title','Emploi :: Companies')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@if(isset($hiring))
@section('page_title', 'Hiring Companies')
@else
@section('page_title', 'Companies')
@endif
@include('components.ads.responsive')
<div class="row mb-4">
    <?php $adsCounter=0; ?>
    @forelse($companies as $c)
    <div class="col-lg-4 col-md-6 col-12">
        <div class="card">
            <div class="card-body text-center">
                <img src="{{ asset($c->logoUrl) }}" alt="{{ $c->name }}" class="circle-img">
                <br>
                <p class="badge badge-secondary">{{ count($c->activePosts) }} Vacancies</p>
                <h5>
                    <a href="/companies/{{ $c->name }}">
                        {{ $c->name }}
                    </a>
                </h5>
                <p class="truncate-short">{{ $c->industry->name }}</p>
                <p><i class="fas fa-map-marker-alt"></i> {{ $c->location->name.', '.$c->location->country->name }}</p>
                <p>{{ $c->companySize->title }}</p>
                <p style="text-align: center;">
                    <a href="/companies/{{ $c->name }}" class="btn btn-success">View Vacancies</a>
                </p>
            </div>
        </div>
    </div>

    <?php
        $adsCounter++;
    ?>
    @if($adsCounter %3 == 0)
    <div class="col-lg-12 col-md-12 col-12">
        @include('components.ads.responsive')
    </div>
    @endif
    
    @empty
    <div class="col-12">
      <div class="card">
        <div class="card-body text-center">
            <p>
                No companies have been found. Check back later.
            </p>
        </div>
    </div>
  </div>
    @endforelse
</div>

<div class="text-center">
    @if(isset($hiring))
    <a href="/companies" class="btn btn-orange">View All Companies</a>
    @else
    {{ $companies->links() }}
    @endif
</div>

@endsection

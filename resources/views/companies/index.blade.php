@extends('layouts.dashboard-layout')

@section('title','Emploi :: Companies')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@section('page_title', 'Companies')
<div class="row mb-4">
    @forelse($companies as $c)
    <div class="col-lg-4 col-md-6 col-12">
        <div class="card mx-3">
            <div class="card-body text-center">
                <img src="{{ asset($c->logoUrl) }}" alt="{{ $c->name }}" class="circle-img">
                <br>
                <p class="badge badge-secondary">{{ count($c->activePosts) }} Vacancies</p>
                <h5>
                    <a href="/companies/{{ $c->name }}">
                        {{ $c->name }}
                    </a>
                </h5>
                <p>{{ $c->industry->name }}</p>
                <p><i class="fas fa-map-marker-alt"></i> {{ $c->location->name.', '.$c->location->country->name }}</p>
                <p>{{ $c->staff }}</p>
            </div>
        </div>
    </div>
    @empty
    <p class="text-center">
        No companies have been found. Check back later.
    </p>
    @endforelse
</div>

<div class="text-center">
    @if(isset($hiring))
    <a href="/companies" class="btn btn-orange">View All Companies</a> <br><br>
    @else
    {{ $companies->links() }}
    @endif
</div>

@endsection

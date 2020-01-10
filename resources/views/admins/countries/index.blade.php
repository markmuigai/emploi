@extends('layouts.dashboard-layout')

@section('title','Emploi Admin :: Countries')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('page_title', 'Countries')

@section('content')

<div class="card">
    <div class="card-body">
        <div class="row" style="text-align: right; border-bottom: 0.1em solid #e88725">
            <a href="/admin/countries/create" class="btn btn-primary">Create Country</a> 
            <a href="/admin/locations" class="btn btn-link">Manage Locations</a> <br><hr>
        </div>
        @forelse($countries as $c)
        <div class="row">
            <div class="col-md-8">
                <h4>{{ $c->name }}
                    <span class="badge badge-success">+{{ $c->prefix }}</span>
                </h4>
                <p>
                    @forelse($c->locations as $l)
                    <span class="btn btn-danger">{{ $l->name }}</span>
                    @empty
                    No Locations found
                    @endforelse
                </p>
            </div>
            <div class="col-md-4 text-right">
                <p><strong>Created:</strong> {{ $c->created_at }}</p>
                <a href="/admin/countries/{{$c->id}}" class="btn btn-orange btn-sm">View</a>
            </div>
        </div>
        <hr>
        @empty
        <p class="text-center">
            No countries have been found.
        </p>
        @endforelse
    </div>
</div>
{{ $countries->links() }}

@endsection
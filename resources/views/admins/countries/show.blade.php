@extends('layouts.dashboard-layout')

@section('title','Emploi Admin :: '.$country->name)

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('page_title', $country->name.' +('.$country->prefix.')')

@section('content')

<div class="card">
    <div class="card-body">
        <div class="row" style="text-align: right; border-bottom: 0.1em solid #ff5e00">
            <a href="/admin/countries" class="btn btn-default">
                <i class="fa fa-arrow-left"></i> All Countries
            </a>
            <a href="/admin/countries/{{ $country->id }}/edit" class="btn btn-link">
                <i class="fa fa-pen"></i> Edit
            </a>
            <span class="btn btn-primary">
                <i class="fa fa-money"></i>
                {{ $country->currency }}
            </span>
             <br><hr>
        </div>

        <div class="row">

            @forelse($country->locations as $l)
            <div class="col-md-10 offset-md-1">
                <br>
                <a href="/vacancies/{{ $l->name }}" target="_blank" class="btn btn-orange">{{ $l->name }}</a>
                {{ count($l->companies) }} Companies | {{ count($l->posts) }} Vacancies | {{ count($l->seekers) }} Job Seekers 
            </div>
            

            @empty
            No Locations found.
            @endforelse
        </div>

        <div class="row">
            
            <form method="POST" action="/admin/locations" style="width: 100%" class="col-md-10 offset-md-1">
                @csrf
                <input type="hidden" name="country_id" value="{{ $country->id }}">
                <hr>
                <b>Add New Location</b>
                <br>
                <p>
                    <b>Name: </b>
                    <input type="text" name="name" class="form-control" required="">
                </p>
                <p>
                    <input type="submit" value="Save Location" class="btn btn-danger btn-sm" style="float: right;">
                </p>
            </form>
        </div>
        
    </div>
</div>

@endsection
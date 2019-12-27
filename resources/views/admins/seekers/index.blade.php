@extends('layouts.dashboard-layout')

@section('title','Emploi Admin :: Job Seekers')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@section('page_title', 'Job Seekers')


<form>
    <input type="hidden" name="search" value="true">
    <div class="form-row">
        <div class="form-group col-lg-3">
            <input type="email" name="email" class="form-control" placeholder="Email Address" value="{{ isset($email) ? $email : '' }}">
        </div>
        <div class="form-group col-lg-3">
            <input type="text" name="phone_number" class="form-control" placeholder="Phone Number" value="{{ isset($phone_number) ? $phone_number : '' }}">
        </div>
        <div class="form-group col-lg-3">
            <input type="text" name="keywords" class="form-control" placeholder="Keywords" value="{{ isset($keywords) ? $keywords : '' }}">
        </div>
        <div class="form-group col-lg-3">
            <select name="gender" class="custom-select">
                <option value="">All Genders</option>
                <option value="F" {{ isset($gender) && $gender=='F' ? 'selected="selected"' : '' }}>Female</option>
                <option value="M" {{ isset($gender) && $gender=='M' ? 'selected="selected"' : '' }}>Male</option>
                <option value="I" {{ isset($gender) && $gender=='I' ? 'selected="selected"' : '' }}>Other</option>
            </select>
        </div>
    </div>
    <div class="form-row mt-3">
        <div class="form-group col-lg-4 text-center">
            <select name="location" class="custom-select">
                <option value="">All Locations</option>
                @forelse($locations as $l)
                <option value="{{ $l->id }}" {{ isset($location) && $location == $l->id ? 'selected="selected"' : '' }}>
                    {{ $l->name.', '.$l->country->name }}
                </option>
                @empty
                @endforelse
            </select>
        </div>
        <div class="form-group col-lg-4 text-center">
            <select name="industry" class="custom-select">
                <option value="">All Industries</option>
                @forelse($industries as $ind)
                <option value="{{ $ind->id }}" {{ isset($industry) && $industry == $ind->id ? 'selected="selected"' : '' }}>{{ $ind->name }}</option>
                @empty
                @endforelse
            </select>
        </div>
        <div class="form-group col-lg-4 text-center">
            <button type="submit" name="button" class="btn btn-orange">Search</button>
        </div>
    </div>
</form>

<div class="card">
    <div class="card-body">
        @forelse($seekers as $seeker)
        <div class="row">
            <div class="col-md-6 col-12">
                <h4>
                    <a href="/admin/seekers/{{ $seeker->user->username }}" class="orange">
                        {{ $seeker->user->name }}
                    </a>
                </h4>
                <p>{{ $seeker->industry->name }}</p>
            </div>
            <div class="col-md-6 col-12 text-md-right text-left">
                <p><a href="mailto:{{ $seeker->user->email }}" class="orange">{{ $seeker->user->email }}</a></p>
                <p>{{ $seeker->phone_number }}</p>
                <p>{{ $seeker->sex }}</p>
                <p>Registered: {{ $seeker->created_at }}</p>
            </div>
        </div>
        <hr>
        @empty
        <p class="text-center">
            No Job seekers have been found!
        </p>
        @endforelse
        <hr>
        <div class="text-center">
            @if(isset($search))
            <p><em>End of search results</em></p>
            @else
            {{ $seekers->links() }}
            @endif
        </div>
    </div>
</div>


@endsection

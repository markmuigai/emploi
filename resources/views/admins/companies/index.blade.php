@extends('layouts.dashboard-layout')

@section('title','Emploi :: Admin Companies')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@section('page_title', 'Companies')


<div class="card">
    <div class="card-body">
        <form>
            <input type="text" placeholder="Search here" name="q" required="" class="form-control">
        </form>
        <br>
        @forelse($companies as $c)
        <div class="row align-items-center">
            <div class=" col-lg-7 col-md-6">
                <h4>{{ $c->name }} <small>[{{ $c->industry->name }}]</small></h4>
                <b>{{ $c->location->name.', '.$c->location->country->name }}</b> || Created: {{ $c->created_at }}
                <form action="/admin/log-in-as" method="POST">
                    @csrf
                    <input type="hidden" name="user_id" value="{{ $c->user->id }}">
                    <input type="submit" name="" class="btn btn-sm btn-link pull-right" value="Login As Company Admin">
                </form>
                <p>

                    <a href="mailto:{{ $c->getEmail() }}">{{ $c->getEmail() }}</a> || <a href="tel:{{ $c->phone_number }}">{{ $c->phone_number }}</a>
                </p>
                <hr>
                <a href="/companies/{{ $c->name }}" target="_blank" class="btn btn-orange">View</a>
            </div>
            <div class="col-lg-5 col-md-6">
                <b>Job Posts</b> [Total {{ count($c->posts) }}] <br>

                @forelse($c->posts as $p)
                <a href="/vacancies/{{ $p->slug }}" class="btn btn-primary" target="_blank">{{ $p->title }}</a>
                @empty
                No jobs posted under this company
                @endforelse
                
            </div>
        </div>
        <hr>
        @empty
        <p class="text-center">No companies have been found</p>
        @endforelse
    </div>
</div>

{{ $companies->links() }}


@endsection

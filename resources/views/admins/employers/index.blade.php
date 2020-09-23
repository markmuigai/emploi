@extends('layouts.dashboard-layout')

@section('title','Emploi :: Admin Employers')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@section('page_title', 'Employers')


<div class="card">
    <div class="card-body">
        <form>
            <input type="text" placeholder="Search here" name="q" required="" class="form-control">
        </form>
        <br>
        @include('components.ads.responsive')
        @forelse($employers as $e)
        <div class="row align-items-center">
            <div class=" col-lg-7 col-md-6">
                <h4>{{ $e->name }} <small>[{{ $e->industry->name }}]</small></h4>
                <b>{{ $e->country->name }}</b> || Registered: {{ $e->created_at }}
                <form action="/admin/log-in-as" method="POST">
                	@csrf
                	<input type="hidden" name="user_id" value="{{ $e->user->id }}">
                	<input type="submit" name="" class="btn btn-sm btn-link pull-right" value="Login As">
                </form>
                <p>

                    <a href="mailto:{{ $e->user->email }}">{{ $e->user->email }}</a> || <a href="tel:{{ $e->contact_phone }}">{{ $e->contact_phone }}</a>
                </p>
                <hr>
                {{ $e->address }}
            </div>
            <div class="col-lg-5 col-md-6">
                <b>Companies</b> [Total {{ count($e->companies) }}] <br>

                @forelse($e->companies as $c)
                <a href="/admin/companies/{{ $c->id }}" class="">{{ $c->name }}</a>
                @empty
                {{ $e->company_name }}
                @endforelse
                
            </div>
        </div>
        <hr>
        @empty
        <p class="text-center">No employers have been found</p>
        @endforelse
    </div>
</div>

{{ $employers->links() }}


@endsection

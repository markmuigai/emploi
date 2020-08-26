@extends('layouts.dashboard-layout')

@section('title','Emploi Admin :: Exclusive Placement' )

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('page_title',  'Exclusive Placement' )

@section('content')

<div class="card">
    <div class="card-body">
        <div class="" style="">
            <a href="/admin/panel" class="btn "><i class="fa fa-arrow-left"></i> Back</a>
        </div>
        <br>
        <div class="row">
        	 @forelse($exclusive as $e)

            <div class="col-md-6 card">
                <div class="card-body">
                    <h4>{{ $e->name }}</h4>
                    <p><strong>Created: {{ $e->created_at->diffForHumans() }}</strong></p>
                    <p>
                        {{ $e->name ? $e->name : '' }} <br>
                        <a href="mailto:{{ $e->email }}">{{ $e->email }}</a><br>
                        <a href="tel:{{ $e->phone_number }}">{{ $e->phone_number }}</a>
                    </p>
                    <p>
                        Status: <b>{{ $e->status }}</b>
                    </p>
                </div>
                
            </div>
        @empty
        <p style="text-align: center;">
            No exclusive placement request found.
        </p>
        </div>
        @endforelse
    </div>
        {{ $exclusive->links() }}
</div>

@endsection
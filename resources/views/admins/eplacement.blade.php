@extends('layouts.dashboard-layout')

@section('title','Emploi Admin :: CV Editing Referrals' )

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('page_title',  'Exclusive Placement' )

@section('content')

<div class="card">
    <div class="card-body">
        <div class="" style="">
            <a href="/admin/panel" class="btn "><i class="fa fa-arrow-left"></i> Back</a>
            <a href="/refer" class="btn btn-orange" style="float: right;">Refer Friends</a>  
        </div>
        <br>
        <div class="row">
        	 @forelse($exclusive as $e)

            <div class="col-md-6 card">
                <div class="card-body">
                    <h4>{{ $e->user_id ? $e->user->name : 'Anonymous User' }}</h4>
                    <p><strong>Created: {{ $e->created_at->diffForHumans() }}</strong></p>
                    <p>
                        {{ $e->name ? $e->name : '' }} <br>
                        <a href="mailto:{{ $e->email }}">{{ $e->email }}</a>
                    </p>
                    <p>
                        Status: <b>{{ $e->status }}</b>
                    </p>
                </div>
                
            </div>
        @empty
        <p style="text-align: center;">
            No Exclusive Placement have been found.
        </p>
        </div>
        @endforelse
    </div>
</div>

@endsection
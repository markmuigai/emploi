@extends('layouts.dashboard-layout')

@section('title','Emploi Admin :: CV Editing Referrals' )

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('page_title',  'Coaching' )

@section('content')

<div class="card">
    <div class="card-body">
        <div class="" style="">
            <a href="/admin/panel" class="btn "><i class="fa fa-arrow-left"></i> Back</a>
            <a href="/refer" class="btn btn-orange" style="float: right;">Refer Friends</a>  
        </div>
        <br>
        <div class="row">

        	 @forelse($coaching as $c)

            <div class="col-md-6 card">
                <div class="card-body">
                    <h4>{{ $c->user_id ? $c->user->name : 'Anonymous User' }}</h4>
                    <p><strong>Created: {{ $c->created_at->diffForHumans() }}</strong></p>
                    <p>
                        {{ $c->name ? $c->name : '' }} <br>
                        <a href="mailto:{{ $c->email }}">{{ $c->email }}</a>
                    </p>
                    <p>
                        Status: <b>{{ $c->status }}</b>
                    </p>
                </div>
                
            </div>
        @empty
        <p style="text-align: center;">
            No Interview Coaching have been found.
        </p>
        </div>
        @endforelse
       
    </div>
</div>


@endsection
@extends('layouts.dashboard-layout')

@section('title','Emploi Admin :: CV Editing Referrals' )

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('page_title',  'CV Editing Referrals' )

@section('content')

<div class="card">
    <div class="card-body">
        <div class="" style="">
            <a href="/admin/panel" class="btn "><i class="fa fa-arrow-left"></i> Back</a>
            <a href="/refer" class="btn btn-orange" style="float: right;">Refer Friends</a>  
        </div>
        <br>
        <div class="row">
        @forelse($cvreferrals as $r)

            <div class="col-md-6 card">
                <div class="card-body">
                    <h4>{{ $r->user_id ? $r->user->name : 'Anonymous User' }}</h4>
                    <p><strong>Created: {{ $r->created_at->diffForHumans() }}</strong></p>
                    <p>
                        Referred: {{ $r->name ? $r->name : '' }} <br>
                        [<a href="mailto:{{ $r->email }}">{{ $r->email }}</a>]
                    </p>
                    <p>
                        Status: <b>{{ $r->status }}</b>
                    </p>
                </div>
                
            </div>
        @empty
        <p style="text-align: center;">
            No Referrals have been found.
        </p>
        </div>
        @endforelse
    </div>
</div>
{{ $cvreferrals->links() }}

@endsection
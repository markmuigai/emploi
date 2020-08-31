@extends('layouts.dashboard-layout')

@section('title','Emploi Admin :: Career Coaching' )

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('page_title',  'Career Coaching' )

@section('content')

<div class="card">
    <div class="card-body">
        <div class="" style="">
            <a href="/admin/panel" class="btn "><i class="fa fa-arrow-left"></i> Back</a> 
        </div>
        <br>
        <div class="row">

        	 @forelse($coaching as $c)

            <div class="col-md-6 card">
                <div class="card-body">
                    <h4>{{ $c->name }}</h4>
                    <p><strong>Created: {{ $c->created_at->diffForHumans() }}</strong></p>
                    <p>
                        {{ $c->name ? $c->name : '' }} <br>
                        <a href="mailto:{{ $c->email }}">{{ $c->email }}</a><br>
                        <a href="tel:{{ $c->phone_number }}">{{ $c->phone_number }}</a>
                    </p>
                    <a href="/storage/resume-edits/{{ $c->resume }}" class="btn btn-orange">View CV</a>
                   <!--  <p>
                        Status: <b>{{ $c->status }}</b>
                    </p> -->
                </div>
                
            </div>
        @empty
        <p style="text-align: center;">
            No interview coaching request found.
        </p>
        </div>
        @endforelse       
    </div>
       {{ $coaching->links() }}
</div> 


@endsection
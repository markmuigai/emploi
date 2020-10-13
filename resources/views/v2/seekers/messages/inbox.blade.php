@extends('layouts.dashboard-layout')

@section('title','PaaS :: Messages') )

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('page_title', 'Messages') 

@section('content')

<a href="/job-seekers/dashboard" class="btn btn-orange">
    <i class="fa fa-arrow-left"></i> Back
</a>
<a href="/sent" class="btn btn-orange">
   <i class="fa fa-paper-plane"></i> Sent
</a><br><br>
<?php 
$user = Auth::user();
?>

<div class="card">
    <div class="card-body">
        <div class="row" style="text-align: right; ">
        </div>
        <div class="row">
        @forelse($messages as $m)
            <?php
             $employer = \App\User::Where('id',$m->from_id)->first();
            ?>        
            <div class="col-md-10 offset-md-1">
            <br>
               <div class="row d-flex">
                <h4 class="mr-5 ml-3"><b> </b>{{ $m->title }}</h4>
                [ {{ $employer->name }} ]
                </div>
                <div class="row">
                    <p>{{ $m->body }}</p>
                </div>

                <p>
                    <a href="/compose/{{ $m->id }}" class="btn btn-orange btn-sm">Reply</a>
                    <a href="/inbox/{{ $m->id }}" class="btn btn-orange btn-sm">View</a>

                </p>
                <hr>               
            </div>     
        
        @empty
        <p class="text-center">
            No Messages Found
        </p>
        </div>
        @endforelse
    </div>
</div>

@endsection
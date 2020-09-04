@extends('layouts.dashboard-layout')

@section('title','PaaS :: Message') )

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('page_title', 'Messages') 

@section('content')

<a href="/inbox" class="btn btn-orange">
    <i class="fa fa-arrow-left"></i>Back
</a><br><br>
<?php 

$user = Auth::user();
?>

<div class="card">
    <div class="card-body">
        <div class="row" style="text-align: right; ">
        </div>
        <div class="row">
            <div class="col-md-10 offset-md-1">
            <br>
               <div class="row d-flex">
                <h3 class="mr-5 ml-3"><b> </b>{{ $message->title }}</h3>
                </div>
                <div class="row">
                    <p>{{ $message->body }}</p>
                </div>

                <p>
                    <a href="/compose/{{ $message->task_slug }}" class="btn btn-orange btn-sm">Reply</a>
                </p>
                <hr>               
            </div>     
      
        </div>
    </div>
</div>

@endsection
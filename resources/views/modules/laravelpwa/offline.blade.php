@extends('layouts.general-layout')

@section('title','Emploi :: Offline')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')

<div class="container">
    <div class="d-flex justify-content-center align-items-center">
        <h2>No Internet Connection</h2>
        <p>
            You are currently not connected to the internet.
        </p>
        <p><em>
                Kindly check your connection and retry.
            </em></p>

        <a href="/" class="btn btn-orange">Home</a>
    </div>
</div>
@endsection
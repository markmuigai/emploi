@extends('layouts.dashboard-layout')

@section('title','Emploi :: Application Success')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@section('page_title', $post->title)

<div class="card">
    <div class="card-body text-center">
        <h4>Application Success!</h4>
        <p>
            Application for {{ $post->title }} was succesfull.
        </p>
        <p>
            You will be notified on your application progress in due time. For further assistance, please do not hesitate to <a class="orange" href="/contact">contact us</a>.
        </p>
    </div>
</div>



@endsection
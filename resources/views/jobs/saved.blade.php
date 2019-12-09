@extends('layouts.dashboard-layout')

@section('title','Emploi :: Create Advert')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@section('page_title', $title)

<div class="card">
    <div class="card-body text-center">
        <?php
        	echo $message;
        	?>
    </div>
</div>

@endsection
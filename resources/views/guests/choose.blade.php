@extends('layouts.sign')

@section('title','Emploi :: Choose Account Type')

@section('description')
Emploi is the Leading Platform for Talent Assessment and Matching for SME's in Africa.
@endsection

<?php  
$join_title = Auth::user()->name.', Choose Account Type';
?>

@section('user_title', $join_title)

@section('content')



<div class="container text-center">
    <p>
        
        Welcome to Emploi, an efficient platform to manage recruitments and find work for a successful career.
        
    </p>
    <div class="row acc-links">
       
        <a href="/guests/i-am-a-job-seeker" class="col-md-6 col-12">
            <img src="/images/seeker-join.png" class="w-100 py-3" alt="Job Seeker Registration">
            <h4>I'm a Job Seeker</h4>
        </a>
         <a href="/guests/i-am-an-employer" class="col-md-6 col-12">
            <img src="/images/employer-join.png" class="w-100 py-3" alt="Employer Registration">
            <h4>I'm an Employer</h4>
        </a>
    </div>
    

    {{-- @include('components.ads.responsive') --}}
</div>

@endsection

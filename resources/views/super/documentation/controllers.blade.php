@extends('layouts.dashboard-layout')

@section('title','Emploi :: Super Admin')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@section('page_title', 'Controllers Documentation')
<div class="card">
    <div class="card-body">
        <div class="dropdown">
            <a href="#" class="btn btn-green px-3" data-toggle="dropdown">Documentation<strong class="caret"></strong></a>
            <ul class="dropdown-menu">
                <li><a href="index">Index</a></li>
                <li><a href="routes">Routes</a></li>
                <li><a href="#">Controllers</a></li>
                <li><a href="views" >Views</a></li>
                <li><a href="rsi" >RSI</a></li>
            </ul>
        </div>

    <div class="text-right">
        <h2>EMPLOI DOCUMENTATION</h2>
        <p>By Obare C. Brian and David Kirarit</p>

    </div>

<h3>Controllers</h3>

<p>
	Controllers can group related request handling logic into a single class. Controllers are stored in the app/Http/Controllers directory. They can be invoked by defining routes in routes.php
</p>


    </div>
</div>

@endsection
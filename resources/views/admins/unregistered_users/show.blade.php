@extends('layouts.dashboard-layout')

@section('title','Emploi Admin :: Unregistered user')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('page_title', 'Unregistered user')

@section('content')

<div class="card">
    <div class="card-body">
        <div class="row" style="text-align: right; border-bottom: 0.1em solid #e88725">
            <a href="/admin/unregistered-users" class="btn btn-default">
                <i class="fa fa-arrow-left"></i> All Unregistered Users
            </a>
            <a href="/admin/unregistered-users/{{ $user->id }}/edit" class="btn btn-link">
                <i class="fa fa-pen"></i> Edit
            </a>
             <br><hr>
        </div>

        <div class="row">

            <div class="col-md-10 col-md-offset-1">Name: {{ $user->name ? $user->name : 'No-Name' }}</div> <br>

            <div class="col-md-10 col-md-offset-1">Email: {{ $user->email }}</div>

            
        </div>

        <div class="row">
            
            <form method="POST" action="/admin/unregistered-users/{{ $user->id }}" style="width: 100%" class="col-md-10 offset-md-1">
                @csrf
                {{ method_field('DELETE') }}
                <p>
                    <input type="submit" value="Delete" class="btn btn-danger btn-sm" style="float: right;">
                </p>
            </form>
        </div>
        
    </div>
</div>

@endsection
@extends('layouts.dashboard-layout')

@section('title','Emploi Admin :: Unregistered Users')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('page_title', 'Unregistered Users')

@section('content')

<div class="card">
    <div class="card-body">
        <div class="row" style="text-align: right; border-bottom: 0.1em solid #e88725">
            <a href="/admin" class="btn btn-default"><i class="fa fa-arrow-left"></i></a>
            <a href="/admin/unregistered-users/create" class="btn btn-primary">Add</a>  
            <i>Users already existing in users table will be skipped from the Mailing list</i>
            <br>
        </div>
        @forelse($users as $c)
        <div class="row">
            <div class="col-md-8">
                <h4>{{ $c->email }}
                </h4>
                <p>
                    Name: {{ $c->name }}
                </p>
            </div>
            <div class="col-md-4 text-right">
                <p><strong>Created:</strong> {{ $c->created_at }}</p>
                <a href="/admin/unregistered-users/{{$c->id}}" class="btn btn-orange btn-sm">View</a>
            </div>
        </div>
        <hr>
        @empty
        <p class="text-center">
            No unregistered users have been found.
        </p>
        @endforelse
    </div>
</div>
{{ $users->links() }}

@endsection
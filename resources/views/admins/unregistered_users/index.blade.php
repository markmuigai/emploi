@extends('layouts.dashboard-layout')

@section('title','Emploi Admin :: Unregistered Users')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('page_title', 'Unregistered Users')

@section('content')

<div class="card">
    <div class="card-body">
        <div class="row" style="text-align: right; border-bottom: 0.1em solid #ff5e00">
            <a href="/admin" class="btn btn-default"><i class="fa fa-arrow-left"></i></a>
            <a href="/admin/unregistered-users/create" class="btn btn-primary">Add</a>  
            <form method="POST" action="/admin/unregistered-users/import" style="display: inline;" id="import-form">
                @csrf
                <input type="submit" name="" value="Import">
                

            </form> 
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
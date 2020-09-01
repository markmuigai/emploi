@extends('layouts.dashboard-layout')

@section('title','Emploi Admin :: Issues') )

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('page_title', 'Issues') 

@section('content')

<div class="card">
    <div class="card-body">
        <div class="row" style="text-align: right; border-bottom: 0.1em solid #ff5e00">
            <a href="/issues/create" class="btn btn-primary">Create Issue</a>  <br><hr>
        </div>
        <div class="row">
        @forelse($issues as $i)


        
            <div class="col-md-10 offset-md-1">
                <h4>{{ $i->title }} </h4>
                <p><strong>Created:</strong> {{ $i->created_at->diffForHumans() }}</p>
                <p><strong>Updated:</strong> {{ $i->updated_at->diffForHumans() }}</p>
                <p>
                    <a href="/issues/{{$i->id}}" class="btn btn-orange btn-sm">View</a>
                    <a href="/issues/{{$i->id}}/edit" class="btn btn-link btn-sm">Edit</a>
                </p>
                <hr>
                
            </div>
        
        
        @empty
        <p class="text-center">
            No Frequently Asked Questions have been found.
        </p>
        </div>
        @endforelse
    </div>
</div>
{{ $issues->links() }}

@endsection
@extends('layouts.dashboard-layout')

@section('title','Emploi Admin :: Issues') )

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('page_title', 'Issues') 

@section('content')

<style>
    hr {
    color:#ddd;
    background-color: orange; 
    height:2px;
    border:none;
    max-width:100%;
    }
</style>

<?php 
    $user = Auth::user();
    $task = App\Task::where('employer_id', $user->employer->id)->get();
?>

<div class="row d-flex">
    <div>
        <a href="/employers/paas-tasks" class="btn btn-default mr-2 ml-3">
            <i class="fa fa-arrow-left"></i> Go to Tasks
        </a>
    </div>

    <div>
        <a href="/issues/create" class="btn btn-default">Create New Issue</a> 
    </div>
</div>


<br>

<div class="card">
    <div class="card-body"> 
        <div class="row">
        @forelse($issues as $i)

            <div class="col-md-10 offset-md-1">
                <div class="col-md-7">
                    <h4>{{ $i->title }} </h4>
                    <p><strong>Created:</strong> {{ $i->created_at->diffForHumans() }}</p>
                    <p><strong>Updated:</strong> {{ $i->updated_at->diffForHumans() }}</p>
                </div>

                <div class="col-md-5 pt-4">
                <p>
                    <a href="/issues/view/{{ $i->id }}" class="btn btn-orange btn-sm mr-2">View</a>
                    <a href="/issues/edit/{{$i->id}}" class="btn btn-orange-alt btn-sm ml-2">Edit</a>
                </p>
                </div>
                
                <hr>
                
            </div>
        
        
        @empty
        <p class="text-center">
            No Issue found.
        </p>
        </div>
        @endforelse
    </div>
</div>
{{ $issues->links() }}

@endsection
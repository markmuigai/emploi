@extends('layouts.dashboard-layout')

@section('title','Emploi Admin :: Messages') )

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('page_title', 'All Messages') 

@section('content')

<style>
    hr {
    color:#ddd;
    background-color: #E1573A; 
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
        <a href="/employers/paas-tasks" class="btn btn-orange-alt mr-2 ml-3">
            <i class="fa fa-arrow-left"></i> Go to Tasks
        </a>
    </div>

    <div>
        <a href="/messages/create" class="btn btn-orange-alt">Create New Message</a> 
    </div>
</div>


<br>

<div class="card">
    <div class="card-body"> 
        <div class="row">
        @forelse($messages as $m)
        <?php
         $user = \App\User::Where('id',$m->to_id)->first();
        ?>

            <div class="col-md-10 offset-md-1">
                <div class="col-md-12">

                    <div class="row d-flex">
                        <h3 class="mr-5 ml-3 pr-5"><b> </b>{{ $m->title }}</h3>
                        <h5>To: {{ $user->name}} </h5>
                    </div>
                    
                    <p><strong>Send:</strong> {{ $m->created_at->diffForHumans() }}</p>
                </div>

                <div class="col-md-5 pt-4">
                <p>
                    <a href="/messages/view/{{ $m->to_id }}" class="btn btn-orange btn-sm mr-2">View</a>
                </p>
                </div>                
                <hr>                
            </div>       
        
        @empty
        <p class="text-center">
            No Message found.
        </p>
        </div>
        @endforelse
    </div>
</div>
{{ $messages->links() }}

@endsection
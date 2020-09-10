@extends('layouts.dashboard-layout')

@section('title','Emploi Admin :: Jobs') )

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('page_title', 'Jobs') 

@section('content')

<a href="/job-seekers/dashboard" class="btn btn-orange">
    <i class="fa fa-arrow-left"></i>Back
</a><br><br>
<div class="card">
    <div class="card-body">
        <div class="row" style="text-align: right; ">
        </div>
        <div class="row">
        @forelse($jobs as $t)
        <?php 
            $task = App\Task::where('slug', $t->task_slug)->first();
        ?>        
            <div class="col-md-10 offset-md-1">
            <br>
               <div class="row d-flex">
                <h3 class="mr-5 ml-3"><b> </b>{{ $task->title }}</h3>
                </div>

                <p>{{ $t->description}}</p>

                <p><strong>Created:</strong> {{ $t->created_at->diffForHumans() }}</p>
                <p><strong>Updated:</strong> {{ $t->updated_at->diffForHumans() }}</p>
                <p>
                    <a href="/job-seekers/issue/{{ $t->task_slug }}" class="btn btn-orange btn-sm">View Tasks</a>
                    <a href="/leave/{{ $t->task_slug }}" class="btn btn-orange btn-sm">Request Leave</a>
                </p>
                <hr>               
            </div>     
        
        @empty
        <p class="text-center">
            No job Found
        </p>
        </div>
        @endforelse
    </div>
</div>
{{ $jobs->links() }}

@endsection
@extends('layouts.dashboard-layout')

@section('title','Emploi :: Task View')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@section('page_title', 'Task Details')


<!-- NAV-TABS -->


<section>

<div class="container">

<div class="card">
    <div class="card-header h2 font-weight-bold">
        {{ $task->title }}    
    </div>
    <div class="card-body">
        <div class="card-text">
         {{ $task->salary }}
         <br><br>

         <div class="row col-sm-12">
            <div class="card-text">
            {{ $task->description }}
            </div>
         </div>

        <br><br><br><br>
        </div>
    </div>

</div>

</div>

    

</section>


@endsection

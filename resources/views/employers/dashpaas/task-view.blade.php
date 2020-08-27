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

    {{ $task->slug }}

    <br><br><br>

    
    </div>

    

</section>


@endsection

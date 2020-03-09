@extends('layouts.dashboard-layout')

@section('title','Emploi Admin :: Documentation view')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('page_title', 'Documentation view')

@section('content')

<div class="card">
    <div class="card-body">
        <div class="row" style="text-align: right; ">
            <a href="/desk/documentation" class="btn btn-default">
                <i class="fa fa-arrow-left"></i> Back
            </a>
            
             <br><hr>
        </div>

        <div class="row">
            <div class="col">            

                <h3><?php echo $doc->title; ?></h3> 
                  <p> <?php echo $doc->content; ?></p>
                <hr>
                <br>
                               
<!-- 
                    <a href="/super/documentation/{{ $doc->id }}/edit" class="btn btn-link" style="float: right;">
                        <i class="fa fa-pen"></i> Edit
                    </a> -->
                   
            
            </div>

        </div>
        
    </div>
</div>

@endsection
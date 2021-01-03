@extends('layouts.dashboard-layout')

@section('title','Emploi Admin :: Offboarding Task Preview')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('page_title', 'Offboarding Task Preview')

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

<div class="row mr-auto pb-3 ml-1 d-flex">
    <a href="/employers/admin-paas" class="btn btn-orange-alt mr-2">
        <i class="fa fa-arrow-left"></i>Back
    </a>
</div>

<div class="card">
    <div class="card-body">

        <div class="row">
            <div class="col-md-12">

                <div class="">
                        <br>
                        <div class="row d-flex">
                        <h3 class="mr-5 ml-3 pr-5"><b> </b>{{ $t->title }}<br>
                             <small>{{ $t->category }}</small></h3>
                        </div>
                        <p>
                            <?php echo $t->description; ?>                     
                        </p>
                        <p>
                            <b>Assigned to:</b> {{ $t->assigned_to }}<br>
                            <b>Part Timer:</b> {{ $t->part_timer }}
                        </p>
                        <br>

                        <p>
                            <strong>Date:</strong> {{ Carbon\Carbon::parse($t->date)->diffForHumans() }}

                            <div class="col-md-12 d-flex pt-4">
                                <a href="/employers/offboarding/edit/{{ $t->id }}" class="btn btn-orange-alt mr-5">
                                    <i class="fa fa-pen"></i> Edit
                                </a>
                                <form method="POST" action="/employers/offboarding/delete/{{ $t->id }}" >
                                    @csrf
                                    {{ method_field('DELETE') }}
                                    <input type="submit" value="Delete" class="btn btn-orange">
                                </form>
                            </div>
                        </p>
                        <hr>
                </div>

        </div>
        
    </div>
</div>

@endsection
@extends('layouts.dashboard-layout')

@section('title','Emploi Admin :: Leaves Preview')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('page_title', 'Leaves Preview')

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
    <a href="/employers/paas-tasks" class="btn btn-orange-alt mr-2">
        <i class="fa fa-arrow-left"></i> Go to Tasks
    </a>
    
        <br><hr>
</div>

<div class="card">
    <div class="card-body">

        <div class="row">
            <div class="col-md-12">

                <div class="">

                    @foreach ($leaves as $i)
                        <br>
                        <div class="row d-flex">
                        <h3 class="mr-5 ml-3 pr-5"><b> </b>{{ $i->reason }}</h3>
                        <!-- <h6 class="mt-2 mr-5 orange" style="position: absolute; right: 0;"><b>Due date:</b> {{ Carbon\Carbon::parse($i->due_date)->diffForHumans() }}</h6> -->
                        </div>
                        <p>
                            
                        </p>
                        <br>

                        <p>
                            <strong>Start On:</strong> {{ Carbon\Carbon::parse($i->start_time)->diffForHumans() }}<br>
                            <strong>End On:</strong> {{ Carbon\Carbon::parse($i->end_time)->diffForHumans() }}

                            <div class="col-md-12 d-flex pt-4">
                            
                            @if($i->status == NULL)
                            <a class="btn btn-orange mt-4 mr-2" href="/employers/accept-leave/{{$i->id}}"  onclick="return confirm('Are you sure to accept this leave request')">Accept</a>
                            <a class="btn btn-orange-alt mt-4" href="/employers/reject-leave/{{$i->id}}"  onclick="return confirm('Are you sure to reject this leave request')">Reject</a>
                            @endif

                            </div>
                        </p>
                        <hr>
                    @endforeach
                </div>

        </div>
        
    </div>
</div>

@endsection
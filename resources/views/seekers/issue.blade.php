@extends('layouts.dashboard-layout')

@section('title','Emploi Admin :: Task Preview')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('page_title', 'Task Preview')

@section('content')

<div class="row" style="text-align: right; ">
    <a href="{{ url()->previous() }}" class="btn btn-orange">
        <i class="fa fa-arrow-left"></i>Back
    </a>           
</div><br>
<div class="card">
    <div class="card-body">
        <div class="row">

            <div class="col">

            @foreach ($issue as $i)
                <br>
                <div class="row d-flex">
                <h3 class="mr-5 ml-3"><b> </b>{{ $i->title }}</h3>
                <h5 class="ml-5 orange">Due in {{ Carbon\Carbon::parse($i->due_date)->diffForHumans() }}</h5>
                </div>
                <p>
                    <?php echo $i->description; ?>
                </p>
                <hr>
                <br>

                <p>
                    <strong>Created:</strong> {{ $i->created_at->diffForHumans() }}<br>
                    <strong>Updated:</strong> {{ $i->updated_at->diffForHumans() }}
                </p>
                @if($i->status == 'completed')
                    <a href="#" style="float: right;" class="btn btn-orange">Completed</a>                
                @else
                <a href="/job-seekers/issues/complete/{{ $i->id }}" onclick="return confirm('Are you sure to mark {{ $i->title }} completed?')" style="float: right;" class="btn btn-orange">Mark Completed</a>    
                @endif
            @endforeach
            </div>

        </div>
        
    </div>
</div>

@endsection
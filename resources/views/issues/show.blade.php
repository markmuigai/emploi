@extends('layouts.dashboard-layout')

@section('title','Emploi Admin :: Issue Preview')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('page_title', 'Issue Preview')

@section('content')

<div class="card">
    <div class="card-body">
        <div class="row" style="text-align: right; ">
            <a href="/issues" class="btn btn-default">
                <i class="fa fa-arrow-left"></i> Back
            </a>
            
             <br><hr>
        </div>

        <div class="row">

            <div class="col">
                <br>
                <h3><b style="float: right;"> </b>{{ $issue->title }}</h3>

                <p>
                    <?php echo $issue->description; ?>
                </p>
                <hr>
                <br>

                <p>
                    <strong>Created:</strong> {{ $issue->created_at->diffForHumans() }}<br>
                    <strong>Updated:</strong> {{ $issue->updated_at->diffForHumans() }}

                    <a href="/issues/{{ $issue->id }}/edit" class="btn btn-link" style="float: right;">
                        <i class="fa fa-pen"></i> Edit
                    </a>
                    <form method="POST" action="/issues/{{ $issue->id }}" style="display: inline">
                        @csrf
                        {{ method_field('DELETE') }}
                        <input type="submit" value="Delete" class="btn btn-danger">
                    </form>
                </p>
            </div>

        </div>
        
    </div>
</div>

@endsection
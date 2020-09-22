@extends('layouts.dashboard-layout')

@section('title','Emploi Admin :: Issue Preview')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('page_title', 'Issue Preview')

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
        <i class="fa fa-arrow-left"></i> Go to Jobs
    </a>

    <a href="/issues" class="btn btn-orange-alt ml-2">
        View all Issues <i class="fa fa-arrow-right"></i> 
    </a>
    
        <br><hr>
</div>

<div class="card">
    <div class="card-body">

        <div class="row">
            <div class="col-md-12">

                <div class="">

                    @foreach ($issue as $i)
                        <br>
                        <div class="row d-flex">
                        <h3 class="mr-5 ml-3 pr-5"><b> </b>{{ $i->title }}</h3>
                        <h6 class="mt-2 mr-5 orange" style="position: absolute; right: 0;"><b>Due date:</b> {{ Carbon\Carbon::parse($i->due_date)->diffForHumans() }}</h6>
                        </div>
                        <p>
                            <?php echo $i->description; ?>
                        </p>
                        <br>

                        <p>
                            <strong>Created:</strong> {{ $i->created_at->diffForHumans() }}<br>
                            <strong>Updated:</strong> {{ $i->updated_at->diffForHumans() }}

                            <div class="col-md-12 d-flex pt-4">
                                <a href="/issues/edit/{{ $i->id }}" class="btn btn-orange-alt mr-5">
                                    <i class="fa fa-pen"></i> Edit
                                </a>
                                <form method="POST" action="/issues/delete/{{ $i->id }}">
                                    @csrf
                                    {{ method_field('DELETE') }}
                                    <input type="submit" value="Delete" class="btn btn-orange">
                                </form>
                            </div>
                        </p>
                        <hr>
                    @endforeach
                </div>

        </div>
        
    </div>
</div>

@endsection
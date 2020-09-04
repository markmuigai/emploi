@extends('layouts.dashboard-layout')

@section('title','Emploi Admin :: Messages')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('page_title', 'Messages')

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

    <a href="/messages" class="btn btn-orange-alt ml-2">
        Go to Messages <i class="fa fa-arrow-right"></i> 
    </a>
    
        <br><hr>
</div>

<div class="card">
    <div class="card-body">

        <div class="row">

            <div class="col-md-6">
                <h4 class="orange">Sent</h4>

                @foreach ($seeker as $m)
                    <br>
                    <div class="row d-flex">
                    <h5 class="mr-5 ml-3 pr-5"><b> </b>{{ $m->title }}</h5>
                    </div>
                    <p>
                        <?php echo $m->body; ?>
                    </p>
                    <br>

                    <p>
                        <strong>Send:</strong> {{ $m->created_at->diffForHumans() }}<br>
                      

                        <div class="col-md-12 d-flex pt-4">                      
                        </div>
                    </p>
                    <hr>
                @endforeach
                {{ $seeker->links() }}
            </div>
            

            <div class="col-md-6">
                <h4 class="orange">Received</h4>

                @foreach ($employer as $m)
                    <br>
                    <div class="row d-flex">
                    <h5 class="mr-5 ml-3 pr-5"><b> </b>{{ $m->title }}</h5>
                    </div>
                    <p>
                        <?php echo $m->body; ?>
                    </p>
                    <br>

                    <p>
                        <strong>Received:</strong> {{ $m->created_at->diffForHumans() }}<br>
                      

                        <div class="col-md-12 d-flex pt-4">                      
                        </div>
                    </p>
                    <hr>
                @endforeach
                {{ $employer->links() }}
            </div>

        </div>
        
    </div>
</div>

@endsection
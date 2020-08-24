@extends('layouts.dashboard-layout')

@section('title','Emploi Admin :: PaaS Task Requests')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('page_title', 'PaaS Task Requests')

@section('content')

<div class="card">
    <div class="card-body">
        <div class="row" style="text-align: right; border-bottom: 0.1em solid #ff5e00">
            <a href="/admin/panel" class="btn btn-default">
            <i class="fa fa-arrow-left"></i> Back
            </a>  
            <br><hr>
        </div>
        <br>
        <form>
            <input type="text" placeholder="Search here" name="q" required="" class="form-control">
        </form>
        <br>
        @include('components.ads.responsive')
        @forelse($tasks as $t)
        <div class="row">
            <div class="col-md-8">
                <h4>{{ $t->name }}
                    <small>{{ $t->created_at->diffForHumans() }}</small>
                </h4>
                <p>
                    Phone: {{ $t->phone_number }}<br>
                    Email: {{ $t->email }}
                </p>           
                
            </div>
            <div class="col-md-4 text-right">
                <p><strong>{{ $t->status }}</strong> </p>
                <a href="/admin/paas-task/{{$t->id}}" class="btn btn-orange btn-sm">View</a>
            </div>
        </div>
        <hr>
        @empty
        <p class="text-center">
            No Cv Edit Requests have been received.
        </p>
        @endforelse
    </div>
    <div>
        {{ $tasks->links() }}
    </div>
</div>


@endsection
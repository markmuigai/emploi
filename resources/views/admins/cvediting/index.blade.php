@extends('layouts.dashboard-layout')

@section('title','Emploi Admin :: Cv Editing Requests')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('page_title', 'Cv Editing Requests')

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
        @forelse($edits as $e)
        <div class="row">
            <div class="col-md-8">
                <h4>{{ $e->name }}
                    <small>{{ $e->created_at->diffForHumans() }}</small>
                </h4>
                <h5><small>{{ $e->created_at }}</small></h5>
                <p>
                    <b>{{ $e->industry->name }}</b> <br>
                    {{ $e->message }}
                </p>
                <p>
                    Phone: {{ $e->phone_number }}<br>
                    Email: {{ $e->email }}
                </p>
                
            </div>
            <div class="col-md-4 text-right"><br>
                @if($e->amount == 1000)
                <p>Amount: 1000 to 2000 Ksh.</p>
                @endif

                @if($e->amount == 2000)
                <p>Amount: 2000 to 3000 Ksh.</p>
                @endif

                @if($e->amount == 3000)
                <p>Amount: 3000 to 4000 Ksh.</p>
                @endif

                @if($e->amount == 4000)
                <p>Amount: 4000 to 5000 Ksh.</p>
                @endif

                @if($e->amount == 5000)
                <p>Amount: 5000 to 6000 Ksh.</p>
                @endif

                @if($e->amount == 6000)
                <p>Amount: More than 6000 Ksh.</p>
                @endif
                
                @if($e->experience=NULL)
                <p>Experience: {{ $e->experience }}</p>
                @endif
                
                <p><strong>{{ $e->status }}</strong> </p>
                <a href="/admin/cv-edit-requests/{{$e->id}}" class="btn btn-orange btn-sm">Manage</a>
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
        {{ $edits->links() }}
    </div>
</div>


@endsection
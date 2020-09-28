@extends('layouts.dashboard-layout')

@section('title','Emploi Admin :: Cv Builder Usage')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('page_title', 'Cv Builder Usage')

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
        @forelse($cv as $c)
        <div class="row">
            <div class="col-md-8">
                <h4>{{ $c->name }}
                    <small>{{ $c->created_at->diffForHumans() }}</small>
                </h4>
                <h5><small>{{ $c->created_at }}</small></h5>

                <?php
                  $i = App\Industry::where('id',$c->industry)->first();
                ?>
                <p>
                    <b>{{ $i->name }}</b> <br>
                </p>
                <p>
                    Phone: {{ $c->phone }}<br>
                    Email: {{ $c->email }}
                </p>

                <?php
                    $user = App\User::where('email',$c->email)->first();
                    ?>
                     @if(isset($user->id) && $user->role == 'seeker')
                    <a href="{{ $user->seeker->resumeUrl }}" style="float: right;" class="btn btn-orange-alt">View CV</a>
                     @endif
                     @if(!isset($user->id))
                     <p class="orange" style="float: right">User not registered</p>
                @endif
                
            </div>
        </div>
        <hr>
        @empty
        <p class="text-center">
            No Cv Builder usage recorded.
        </p>
        @endforelse
    </div>
    <div>
        {{ $cv->links() }}
    </div>
</div>


@endsection
@extends('layouts.dashboard-layout')

@section('title',"Emploi Admin :: ".$meetup->name." Subscriber(s)")

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@section('page_title', $meetup->name.' Subscriber(s)')

<div class="card">
    <div class="card-body">
        <h4>
            <a href="/admin/events/{{ $meetup->slug }}"><i class="fa fa-arrow-left"></i></a>
            {{ count($meetup->subscriptions) }} Subscriber(s)
            <a href="/events/{{ $meetup->slug }}" style="float: right;" class="btn btn-orange ">View</a>
            
        </h4>
        <div>
            @forelse($subscribers as $s)
                <div class="row">
                    <div class="col-md-8 offset-md-2">
                        <b>
                            {{ $s->user->name }}
                        </b>
                         [ <a href="mailto:{{ $s->user->email }}">{{ $s->user->email }}</a> ] <br>
                         [ <a href="tel:{{ $s->phone_number }}">{{ $s->phone_number }}</a> ]
                        <span style="text-align: right;">
                            {{ $s->created_at->diffForHumans() }}
                        </span>
                        
                    </div>
                </div>
                <hr>
            @empty
                <div class="text-center">
                    <p>No Subscribers at the moment. <br><br></p>
                </div>
            @endforelse
        </div>
        
    </div>
</div>
<div>
    {{ $subscribers->links() }}
</div>

@endsection
@extends('layouts.dashboard-layout')

@section('title',"Emploi Admin :: $title")

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@section('page_title', $title)

<div class="card">
    <div class="card-body">
        <h4>
            <a href="/admin"><i class="fa fa-arrow-left"></i></a>
            {{ $title }}
                <a href="/events/create" style="float: right;" class="btn btn-default ">New</a>


            @if($title == 'Cancelled Events')

                <a href="/admin/events" class="btn btn-orange" style="float: right;">All</a>
                <a href="/admin/events/upcoming" class="btn btn-orange-alt" style="float: right;">Upcoming</a>
                <a href="/admin/events/in-progress" class="btn btn-orange-alt" style="float: right;">In Progress</a>
                <a href="/admin/events/completed" class="btn btn-orange" style="float: right;">Completed</a>

            @elseif($title == 'Upcoming Events')
                <a href="/admin/events" class="btn btn-orange" style="float: right;">All</a>
                
                <a href="/admin/events/in-progress" class="btn btn-orange-alt" style="float: right;">In Progress</a>
                <a href="/admin/events/completed" class="btn btn-orange" style="float: right;">Completed</a>
                <a href="/admin/events/cancelled" class="btn btn-orange-alt" style="float: right;">Cancelled</a>

            @elseif($title == 'Events In Progress')
                <a href="/admin/events" class="btn btn-orange" style="float: right;">All</a>
                <a href="/admin/events/upcoming" class="btn btn-orange-alt" style="float: right;">Upcoming</a>
                <a href="/admin/events/completed" class="btn btn-orange" style="float: right;">Completed</a>
                <a href="/admin/events/cancelled" class="btn btn-orange-alt" style="float: right;">Cancelled</a>

            @else
                <a href="/admin/events/upcoming" class="btn btn-orange-alt" style="float: right;">Upcoming</a>
                <a href="/admin/events/in-progress" class="btn btn-orange" style="float: right;">In Progress</a>
                <a href="/admin/events/completed" class="btn btn-orange-alt" style="float: right;">Completed</a>
                <a href="/admin/events/cancelled" class="btn btn-orange" style="float: right;">Cancelled</a>
            @endif
            
        </h4>
        <hr>
        <div>
            @forelse($meetups as $event)
                <div class="row">
                    <div class="col-8">
                        <b>
                            <a href="/admin/events/{{ $event->slug }}">
                                {{ $event->name }}
                            </a> 

                        <br>
                        {{ $event->email }} | {{ $event->phone_number }}
                        <br>
                        {{ $event->created_at->diffForHumans() }}
                    </div>
                    <div class="col-4 text-right">
                        <p>
                            Subscribers: 0 <br>
                        </p>
                    </div>
                </div>
                <hr>
            @empty
                <div class="text-center">
                    <p>No Events have been created. <br><br> <a href="/events/create" class="btn btn-sm btn-orange">New Event</a></p>
                </div>
            @endforelse
        </div>
        
    </div>
</div>
<div>
    {{ $meetups->links() }}
</div>

@endsection
@extends('layouts.dashboard-layout')

@section('title','Emploi Admin :: Advert Requests')

@section('description')
Emploi is the Leading Platform for Talent Assessment and Matching for SME's in Africa.
@endsection

@section('page_title', 'Advert Requests')

@section('content')

<div class="card">
    <div class="card-body">
        <form>
            <input type="text" placeholder="Search here" name="q" required="" class="form-control">
        </form>
        <br>
        @forelse($adverts as $ad)
        <div class="row">
            <div class="col-md-8">
                <h4>{{ $ad->id.') '.$ad->getTitle() }}
                    <span class="badge badge-success">{{ $ad->status }}</span>
                </h4>
                <p><strong>Submitted By:</strong> {{ $ad->name }}</p>
                <p><strong>Email:</strong> <a href="mailto:{{ $ad->email }}" class="orange">{{ $ad->email }}</a></p>
            </div>
            <div class="col-md-4 text-right">
                <p><strong>Created:</strong> {{ $ad->created_at }}</p>
                <a href="/admin/received-requests/{{$ad->id}}" class="btn btn-orange btn-sm">View</a>
            </div>
        </div>
        <hr>
        @empty
        <p class="text-center">
            No advert requests received.
        </p>
        @endforelse
    </div>
</div>
{{ $adverts->links() }}

@endsection
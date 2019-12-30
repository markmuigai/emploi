@extends('layouts.dashboard-layout')

@section('title','Emploi Admin :: Advert Requests')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('page_title', 'Advert Requests')

@section('content')

<div class="card">
    <div class="card-body row">
    	@forelse($adverts as $ad)
    	<div class="col-md-6" style="border-bottom: 0.1em solid #e88725">
    		<b>{{ $ad->id.') '.$ad->getTitle() }}</b> [{{ $ad->status }}] <br><hr>
    		<b>{{ $ad->name }}</b> <a href="mailto:{{ $ad->email }}">{{ $ad->email }}</a>
    		<br>
    		Title: <b>{{ $ad->title }}</b> <br>
    		Created: <b>{{ $ad->created_at }}</b> <br>
    		<a href="/admin/received-requests/{{$ad->id}}" class="btn btn-orange btn-sm">View</a>
    		<br><br>
    	</div>
    	@empty
    	<p>
    		No advert requests received.
    	</p>

    	@endforelse
	</div>

	<div class="clearfix">
		{{ $adverts->links() }}
	</div>

</div>

@endsection

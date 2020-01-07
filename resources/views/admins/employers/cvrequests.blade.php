@extends('layouts.dashboard-layout')

@section('title','Emploi :: Admin CV Requests')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@section('page_title', 'CV Requests')

<div class="card">
    <div class="card-body">

        @forelse($cvRequests as $r)
        <p>
            <strong>{{ $r->employer->name }}</strong> requested for <strong> <a href="/admin/seekers/{{ $r->seeker->user->username }}" class="orange">{{ $r->seeker->user->name }}</a></strong>'s CV <br>
            on {{ $r->created_at }}.
        </p>

        @if($r->status == 'pending')
        <form method="get" action="/admin/cv-requests/{{$r->id}}" class="form-row align-items-center">
            <div class="col-lg-3 col-7">
                <select class="custom-select" name="status">
                    <option value="accepted">Mark as Accepted</option>
                    <option value="denied">Mark Denied</option>
                </select>
            </div>

            <div class="col-lg-3 col-4">
                <button type="submit" name="button" class="btn btn-sm btn-orange-alt">Save</button>
            </div>
        </form>
        @else
        <p>
            {{ $r->status }} on {{ $r->updated_at }}
        </p>
        @endif

        <hr>
        @empty
        <p class="text-center">No CV Requests have been found</p>
        @endforelse

        <p class="text-center">
            {{ $cvRequests->links() }}
        </p>
    </div>
</div>

@endsection

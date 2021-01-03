@extends('layouts.dashboard-layout')

@section('title','Emploi :: Admin Bloggers')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@section('page_title', 'All Bloggers')


<div class="card">
    <div class="card-body">
        <h4>Emploi Bloggers <a href="/admin/bloggers/create" class="btn btn-orange" style="float: right;">Create Blogger</a></h4>
        @forelse($bloggers as $blogger)
        <div class="row align-items-center">
            <div class="col-lg-2 col-md-3">
                <img src="{{ $blogger->user->avatarUrl }} " class="w-100">
            </div>
            <div class=" col-lg-7 col-md-6">
                <h4><a href="{{ url('/admin/bloggers/'.$blogger->id) }}" target="_blank">{{ $blogger->user->name }}</a></h4>
                <p>
                    {{ $blogger->user->username }}  <small class="badge badge-{{ $blogger->status == 'active' ? 'orange' : 'secondary' }}">{{ count($blogger->user->blogs) }} Blogs</small>
                </p>
                <p>
                    Status: {{ $blogger->status == 'active' ? 'Active' : 'Inactive' }}
                </p>
            </div>
            <div class="col-lg-3 col-md-3">
                <a href="{{ url('/admin/bloggers/'.$blogger->id.'/edit') }}" class="btn btn-sm btn-orange-alt">Edit</a>
                <a href="/admin/username/{{ $blogger->user->username}}" class="btn btn-sm btn-default">Login As</a>
            </div>
        </div>
        <hr>
        @empty
        <div class="text-center">
            <p>No bloggers have been created</p>
        </div>
        @endforelse
    </div>
</div>

{{ $bloggers->links() }}


@endsection
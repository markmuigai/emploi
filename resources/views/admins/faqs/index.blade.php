@extends('layouts.dashboard-layout')

@section('title','Emploi Admin :: FAQs')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('page_title', 'FAQs')

@section('content')

<div class="card">
    <div class="card-body">
        <div class="row" style="text-align: right; border-bottom: 0.1em solid #e88725">
            <a href="/admin/faqs/create" class="btn btn-primary">Create FAQ</a>  <br><hr>
        </div>
        @forelse($faqs as $f)
        <div class="row">
            <div class="col-md-8">
                <h4>[{{ $f->permission->role }}] {{ $f->title }}
                </h4>
                <p>
                    {{ $f->description }}
                </p>
            </div>
            <div class="col-md-4 text-right">
                <p><strong>Created:</strong> {{ $f->created_at->diffForHumans() }}</p>
                <a href="/admin/faqs/{{$f->id}}" class="btn btn-orange btn-sm">View</a>
                <a href="/admin/faqs/{{$f->id}}/edit" class="btn btn-link btn-sm">Edit</a>
            </div>
        </div>
        <hr>
        @empty
        <p class="text-center">
            No Frequently Asked Questions have been found.
        </p>
        @endforelse
    </div>
</div>
{{ $faqs->links() }}

@endsection
@extends('layouts.dashboard-layout')

@section('title','Emploi Admin :: FAQs')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('page_title', 'FAQs')

@section('content')

<div class="card">
    <div class="card-body">
        <div class="row" style="text-align: right; border-bottom: 0.1em solid #ff5e00">
            <a href="/admin/faqs/create" class="btn btn-primary">Create FAQ</a>  <br><hr>
        </div>
        <div class="row">
        @forelse($faqs as $f)


        
            <div class="col-md-10 offset-md-1">
                <h4>[{{ $f->permission->role }}] {{ $f->title }} </h4>
                <p><strong>Created:</strong> {{ $f->created_at->diffForHumans() }}</p>
                <p>
                    <a href="/admin/faqs/{{$f->id}}" class="btn btn-orange btn-sm">View</a>
                    <a href="/admin/faqs/{{$f->id}}/edit" class="btn btn-link btn-sm">Edit</a>
                </p>
                <hr>
                
            </div>
        
        
        @empty
        <p class="text-center">
            No Frequently Asked Questions have been found.
        </p>
        </div>
        @endforelse
    </div>
</div>
{{ $faqs->links() }}

@endsection
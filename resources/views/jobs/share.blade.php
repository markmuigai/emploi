@extends('layouts.dashboard-layout')

@section('title','Emploi :: Share '.$post->title)

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@section('page_title', 'Share '.$post->title)

<div class="card">
    <div class="card-body text-center">
        <form method="POST" action="/employers/applications/{{ $post->slug }}/share">
            @csrf
            {{-- @include('components.ads.responsive') --}}
            <p>
                <label>Title</label>
                <input type="text" name="name" class="form-control" required="" value="{{ $post->title }}">
            </p>
            <p>
                <label>Caption</label>
                <textarea name="caption" class="form-control" required="" rows="3">{{ $post->brief }}</textarea>
            </p>
            <br>
            <div>
                <label>Share job post to</label>
                <select class="form-control" name="destination">
                    <option>Facebook</option>
                    <option>LinkedIn</option>
                    <option>Twitter</option>
                </select>
            </div>
            <p>
                <span class="btn btn-sm btn-orange " style="display: none">Share Now</span>
                <input type="submit" class="btn btn-sm btn-orange" value="Share Now">
            </p>
        </form>
    </div>
</div>

@endsection
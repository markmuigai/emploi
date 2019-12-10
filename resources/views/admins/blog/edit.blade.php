@extends('layouts.dashboard-layout')

@section('title','Emploi :: Edit Blog')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@section('page_title', 'Edit Blog Post')

<div class="card">
    <div class="card-body">
        <h4>
            {{ $blog->title }}
        </h4>
        <form method="POST" action="/blog/{{ $blog->slug }}" id="new-blog-form" enctype="multipart/form-data">
            @csrf
            <input name="_method" type="hidden" value="PUT">
            <div class="form-group">
                <label for="title">Title *</label>
                <input type="text" required="" path="" name="title" id="title" class="form-control" maxlength="100" value="{{ $blog->title }}" />
            </div>
            <div class="form-group">
                <label for="category">Category *</label>
                <select class="custom-select" name="category">
                    @foreach($categories as $c)
                    <option value="{{ $c->id }}" @if($blog->category->id == $c->id)
                        selected=""
                        @endif
                        >
                        {{ $c->name }}
                    </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <textarea class="form-control" name="contents" required="" id="contents" rows="10">{{ $blog->contents }}</textarea>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group" title="Featured Image (500x300p)">
                        <label class="control-lable" for="title">Update Image </label>
                        <input type="file" accept=".png, .jpg, .jpeg" name="featured_image">
                    </div>
                    <img src="/storage/blogs/{{ $blog->image1 }}" class="w-100">
                </div>
                <div class="col-md-6">
                    <div class="form-group" title="Other Image (500x300p)">
                        @if($blog->image2)
                        <img src="/storage/blogs/{{ $blog->image2 }}" class="w-100">
                        @endif
                        <label class="control-lable" for="title">Other Image</label>
                        <input type="file" accept=".png, .jpg, .jpeg" name="other_image">
                    </div>
                </div>
            </div>
            <hr>
            <div class="text-right">
                <button type="submit" class="btn btn-orange" name="button">Update</button>
            </div>
        </form>

    </div>
</div>
<script type="text/javascript" src="{{ asset('ckeditor/ckeditor.js') }}"></script>
<script>
    setTimeout(function() {

        CKEDITOR.replace('contents');

    }, 3000);

    $().ready(function() {
        $('#save-blog').click(function() {

        });
    });
</script>

@endsection
@extends('layouts.dashboard-layout')

@section('title','Emploi :: Create Blog')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@section('page_title', 'Create Blog')

<div class="card">
    <div class="card-body">
        <h4>New Blog</h4>
        <form method="POST" action="/blog" id="new-blog-form" enctype="multipart/form-data">
            @csrf
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="title">Title <strong class="text-danger">*</strong></label>
                    <input type="text" required="" path="" name="title" id="title" class="form-control input-sm" maxlength="100" value="" />
                </div>
                <div class="form-group col-md-6">
                    <label for="category">Category <strong class="text-danger">*</strong></label>
                    <select class="form-control" name="category">
                        @foreach($categories as $c)
                        <option value="{{ $c->id }}">
                            {{ $c->name }}
                        </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <label for="title">Preview <strong class="text-danger">*</strong></label>
            <div class="form-group">
                <textarea class="form-control" name="preview" required=""></textarea>
            </div>
            <div class="form-group">
                <textarea class="form-control" name="contents" required="" id="contents" rows="10"></textarea>
            </div>
            <div class="form-row">
                <div class="col-md-6">
                    <div class="form-group" title="Featured Image (500x300p)">
                        <label for="title">Image <strong class="text-danger">*</strong></label>
                        <input type="file" accept=".png, .jpg, .jpeg" name="featured_image">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group" title="Other Image (500x300p)">
                        <label for="title">Other Image</label>
                        <input type="file" accept=".png, .jpg, .jpeg" name="other_image">
                    </div>
                </div>
            </div>
            <div class="form-actions text-right">
                <input type="submit" class="btn btn-primary btn-sm" name="" value="Save Blog">
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

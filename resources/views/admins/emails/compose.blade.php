@extends('layouts.dashboard-layout')

@section('title','Emploi :: Compose Email')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@section('page_title', 'Compose Email')

<div class="card">
    <div class="card-body">
        <form method="POST" action="/admin/emails/send" id="new-blog-form" enctype="multipart/form-data">
            @csrf
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="target">{{ __('Target Group') }}</label>
                    <select class="form-control" name="target" id="target">
                        <option value="jobseekers">Job Seekers</option>
                        <option value="employers">Registered Employers</option>
                        <option value="unregistered">Unregistered Users</option>
                        <option value="team">Emploi Team</option>
                        <option value="test-users">Test Users</option>
                        <option value="employers-list">Employers Mailing List</option>
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label for="category">{{ __('Category') }}</label>
                    <select class="form-control" name="category">
                        <option value="all">All</option>
                        @foreach($industries as $industry)
                        <option value="{{ $industry->id }}">{{ $industry->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label for="subject">{{ __('Subject') }}</label>
                <input id="subject" type="text" class="form-control" name="subject" value="Latest Job Vacancies" required autofocus>
            </div>

            <div class="form-group">
                <label for="caption">{{ __('Caption') }}</label>
                <input id="caption" value="Emploi.co is A Professional Development and Recruitment Platform" type="text" class="form-control" name="caption" value="" required autofocus>
            </div>

            <div class="form-group">
                <label for="template">{{ __('Template') }}</label>
                <select class="form-control" name="template" disabled="">
                    <option value="custom" selected="selected">Default</option>
                    <option value="newsletter">Newsletter</option>
                </select>
            </div>

            <div class="form-group">
                <label for="caption">{{ __('Featured Image') }}</label>
                <input type="file" value="" title="Size 1280px * 720px" accept="image/png, image/jpeg" name="featured_image" value="">
            </div>

            <div class="form-group">
                <textarea class="form-control" name="contents" rows="12" id="message"></textarea>
            </div>

            <div class="form-group">
                <label for="attachment1">{{ __('Attachment 1') }}</label>
                <input type="file" value="" name="attachment1" value="">
            </div>

            <div class="form-group">
                <label for="attachment2">{{ __('Attachment 2') }}</label>
                <input type="file" value="" name="attachment2" value="">
            </div>

            <div class="form-group">
                <label for="attachment3">{{ __('Attachment 3') }}</label>
                <input type="file" value="" name="attachment3" value="">
            </div>
            <hr>
            <div class="text-right">
                <button type="submit" name="button" class="btn btn-orange">Send</button>
            </div>
            <a href="#" style="display: none" target="_blank" class="btn btn-sm btn-link" style="float: right">Preview</a>
        </form>
    </div>
</div>
<script type="text/javascript" src="{{ asset('ckeditor/ckeditor.js') }}"></script>
<script>
    setTimeout(function() {

        CKEDITOR.replace('message');

    }, 3000);
</script>

@endsection
@extends('layouts.dashboard-layout')

@section('title','Emploi :: Compose Email')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@section('page_title', 'Compose Email')

<div class="card">
    <div class="card-body">
        <form method="POST" action="/admin/emails/send" id="new-email-form" enctype="multipart/form-data">
            @csrf
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="target">{{ __('Target Group') }}</label>
                    <select class="form-control" name="target" id="target">
                        <option value="jobseekers">Job Seekers</option>
                        <option value="unregistered">Unregistered Users</option>
                        <option value="all-seekers">Job Seekers & Unregistered Users</option>
                        <option value="employers">Registered Employers</option>
                        <option value="team">Emploi Team</option>
                        <option value="test-users">Test Users</option>
                        <option value="employers-list">Employers Mailing List</option>
                        <option value="contact-list">Contact Form Users</option>
                        <option value="cv-edit-request-list">CV Edit Request Users</option>
                        <option value="employers-advertise">Advertising Request Users</option>
                        <option value="referees">Referees</option>
                        <option value="hot_leads_emails">Hot Leads Emails</option>
                        <option value="referred_but_pending">Referred but Pending</option>
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label for="category">{{ __('Category') }}</label>
                    <select class="form-control" name="category">
                        <option value="all">All</option>
                        @foreach($industries as $industry)
                        <option value="{{ $industry->id }}">{{ $industry->name }}</option>
                        @endforeach
                        <option value="incomplete">
                            Job Seekers with Incomplete Profiles
                            ({{ 
                                count(
                                    \App\Seeker::whereRaw('LENGTH(education) < 10')
                                            ->orWhereRaw('LENGTH(experience) < 10')
                                            ->orWhere('resume',null)
                                            ->get()
                                    ) 
                            }})
                        </option>
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
                <select class="form-control" name="template" id="template">
                    <option value="custom" selected="selected">Default</option>
                    <option value="wanda">Emploi Weekly</option>
                </select>
            </div>

            <div class="form-group">
                <label for="caption">{{ __('Featured Image') }} 1280*720</label>
                <input type="file" value="" title="Size 1280px * 720px" accept="image/png, image/jpeg" name="featured_image" value="">
            </div>

            <div class="form-group">
                <label for="featured_url">{{ __('Featured Image URL') }}</label>
                <input id="featured_url" value="{{ url('/') }}" type="url" class="form-control" name="featured_url" value="" placeholder="e.g. {{ url('/vacancies') }}" required >
            </div>

            <div class="form-group">
                <textarea class="form-control" name="contents" rows="12" id="message"><?php  if(isset($message)){ print $message; }?></textarea>
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
            <a href="#" target="_blank" class="btn btn-sm btn-link" id="preview-link">Preview Email</a>
            <div class="text-right">
                <input type="submit" value="Send Emails" class="btn btn-orange">
            </div>
            
        </form>
    </div>
    <form id="previewForm" method="POST" action="/admin/emails/preview" target="_blank" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="contents" id="previewContents" value="">
        <input type="hidden" name="subject" id="previewSubject" value="">
        <input type="hidden" name="caption" id="previewCaption" value="">
        <input type="hidden" name="template" id="previewTemplate" value="custom">
        <input type="hidden" name="featured_url" id="previewFeaturedUrl" value="">
    </form>
</div>
<script type="text/javascript" src="{{ asset('ckeditor/ckeditor.js') }}"></script>
<script>
    setTimeout(function() {

        CKEDITOR.replace('message');

    }, 3000);
</script>

<script type="text/javascript">
    $('#preview-link').click(function(e){
        e.preventDefault();
        notify('Creating Email Preview ...');

        $('#previewSubject').val($('#subject').val());
        $('#previewCaption').val($('#caption').val());
        $('#previewFeaturedUrl').val($('#featured_url').val());
        $('#previewContents').val(CKEDITOR.instances['message'].getData());
        $('#previewTemplate').val($('#template').val());
        
        setTimeout(function(){
            $('#previewForm').submit();
        },1019);
        
    });
</script>

@endsection
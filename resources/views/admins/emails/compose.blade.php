@extends('layouts.seek')

@section('title','Emploi :: Compose Email')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')

<div class="container">
    <div class="single">  
       <div class="form-container">
        <h2>
            <i class="fa fa-arrow-left" onclick="window.location = '/admin/panel'"></i>
            Compose Email
        </h2>
        <form method="POST" action="/admin/emails/send" class="row" id="new-blog-form" enctype="multipart/form-data">
            @csrf
            <div class="form-group row">
                <label for="target" class="col-md-4 col-form-label text-md-right">{{ __('Target Group') }}</label>

                <div class="col-md-6">
                    <select class="form-control" name="target" id="target">
                        <option value="jobseekers">Job Seekers</option>
                        <option value="employers">Registered Employers</option>
                        <option value="unregistered">Unregistered Users</option>
                        <option value="team">Emploi Team</option>
                        <option value="test-users">Test Users</option>
                        <option value="employers-list">Employers Mailing List</option>
                    </select>
                    
                </div>
            </div>

            <div class="form-group row">
                <label for="category" class="col-md-4 col-form-label text-md-right">{{ __('Category') }}</label>

                <div class="col-md-6">
                    <select class="form-control" name="category">
                        <option value="all">All</option>
                        @foreach($industries as $industry)
                        <option value="{{ $industry->id }}">{{ $industry->name }}</option>
                        @endforeach
                        

                    </select>
                    
                </div>
            </div>

            <div class="form-group row">
                <label for="subject" class="col-md-4 col-form-label text-md-right">{{ __('Subject') }}</label>

                <div class="col-md-6">
                    <input id="subject" type="text" class="form-control" name="subject" value="Latest Job Vacancies" required autofocus>
                </div>
            </div>

            <div class="form-group row">
                <label for="caption" class="col-md-4 col-form-label text-md-right" >{{ __('Caption') }}</label>

                <div class="col-md-6">
                    <input id="caption" value="Jobsikaz.com is A Professional Development and Recruitment Platform" type="text" class="form-control" name="caption" value="" required autofocus>
                </div>
            </div>

            <div class="form-group row">
                <label for="template" class="col-md-4 col-form-label text-md-right">{{ __('Template') }}</label>

                <div class="col-md-6">
                    <select class="form-control" name="template" disabled="">
                        <option value="custom" selected="selected">Default</option>
                        <option value="newsletter">Newsletter</option>
                        

                    </select>
                    
                </div>
            </div>

            <div class="form-group row">
                <label for="caption" class="col-md-4 col-form-label text-md-right" >{{ __('Featured Image') }}</label>

                <div class="col-md-6">
                    <input type="file" value="" title="Size 1280px * 720px" accept="image/png, image/jpeg"  name="featured_image" value="">
                </div>
            </div>
            
          
        
            <div class="form-group row">
                            

                <div class="col-md-12">
                    
                    <textarea class="form-control" name="contents" rows="12" id="message"></textarea>
                </div>
            </div>

            <div class="form-group row">
                <label for="attachment1" class="col-md-4 col-form-label text-md-right" >{{ __('Attachment 1') }}</label>

                <div class="col-md-6">
                    <input type="file" value=""  name="attachment1" value="">
                </div>
            </div>

            <div class="form-group row">
                <label for="attachment2" class="col-md-4 col-form-label text-md-right" >{{ __('Attachment 2') }}</label>

                <div class="col-md-6">
                    <input type="file" value=""  name="attachment2" value="">
                </div>
            </div>

            <div class="form-group row">
                <label for="attachment3" class="col-md-4 col-form-label text-md-right" >{{ __('Attachment 3') }}</label>

                <div class="col-md-6">
                    <input type="file" value=""  name="attachment3" value="">
                </div>
            </div>

            <div class="form-group row">
                

                <div class="col-md-12">
                    
                    <input type="submit" name="" value="Send" class="btn btn-success">

                    <a href="#" style="display: none" target="_blank" class="btn btn-sm btn-link" style="float: right">Preview</a>
                </div>
            </div>
        </form>
                
    </div>
 </div>
</div>
<script type="text/javascript" src="{{ asset('ckeditor/ckeditor.js') }}"></script>
<script>
    setTimeout(function(){

        CKEDITOR.replace('message');

    },3000);
    
</script>

@endsection
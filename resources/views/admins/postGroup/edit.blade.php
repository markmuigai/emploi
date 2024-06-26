@extends('layouts.dashboard-layout')

@section('title','Emploi Admin :: Edit '.$postGroup->title)

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@section('page_title', 'Edit '.$postGroup->title)
<?php  $pg = $postGroup; ?>
<div class="card">
    <div class="card-body">
        <form method="POST" action="/admin/job-post-groups/{{ $postGroup->id }}" enctype="multipart/form-data" id="job-post-groups-update">
            @csrf
            {{ method_field('PUT') }}
            <div class="row">
                <div class="col-md-12">
                    <div>
                        <label>Title</label>
                        <input type="text" name="title" maxlength="500" required="" value="{{ $pg->getTitle() }}" class="form-control" id="job-post-groups-title">
                    </div>
                    <div>
                        <label>Description</label>
                        <textarea class="form-control" id="description" required="" name="description">{{ $pg->description }}</textarea>
                    </div>
                    <div>
                        <br>
                        <label>How to Apply</label>
                        <textarea class="form-control" id="how_to_apply" required="" name="how_to_apply">{{ $pg->how_to_apply }}</textarea>
                    </div>
                    <div style="">
                        <br>
                        <label>Image</label>
                        <input type="file" name="image">
                    </div>

                    <div>
                        <br>
                        <label>Accepted Jobs</label>
                        <div id="accepted_jobs" class="row">
                            @forelse($pg->postGroupJobs as $pgs)
                            <div class="accepted_job col-xs-6 col-md-4" post_id="{{ $pgs->post->id }}">
                                {{ $pgs->post->getTitle() }} 
                                <span class="remove-select-job btn btn-sm btn-danger" style="float: right">x</span><input type="hidden" name="post_ids[]" value="{{ $pgs->post->id }}">
                            </div>

                            @empty
                            @endforelse
                            
                        </div>
                        <div class="row">
                            <div class="col-md-9">
                                <select class="form-control" id="select-posts">
                                    @forelse($posts as $post)
                                    <option value="{{ $post->id }}">{{ $post->title. ' - ' .$post->company->name }}</option>
                                    @empty
                                    @endforelse
                                </select>
                            </div>
                            <div class="col-md-3">
                                <span class="btn btn-sm btn-success" id="save-selected-post">Add</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center">
                <br>
                <p><a href="#" class="btn btn-orange" id="save-job-post-group">Update</a></p>
            </div>
        </form>
        
    </div>
</div>

<script type="text/javascript" src="{{ asset('ckeditor/ckeditor.js') }}"></script>
<script>
    setTimeout(function() {
        CKEDITOR.replace('description');
        CKEDITOR.replace('how_to_apply');

    }, 3000);
    
    <?php
    $newPosts = "";
    for($i=0; $i<count($posts); $i++)
    {
        $newPosts.= "[".$posts[$i]->id.",'".$posts[$i]->title."']";
        if($i+1 != count($posts))
            $newPosts .= ',';
    }
    $newPosts = '['.$newPosts.']';
    print 'posts = '.$newPosts.';';
    ?>

    $().ready(function(){
        $('#save-job-post-group').click(function(){
            var title = $('#job-post-groups-title').val();
            if (title.length < 5)
                return notify('Job Post Group Title is too short', 'error');

            var desc = CKEDITOR.instances['description'].getData().replace(/<[^>]*>/gi, '').length;
            if(desc < 10)
                return notify('Invalid group description provided', 'error');

            var desc = CKEDITOR.instances['how_to_apply'].getData().replace(/<[^>]*>/gi, '').length;
            if(desc < 10)
                return notify('Invalid group application instructions', 'error');

            $('#job-post-groups-update').submit();
        });
    });
</script>
<script type="text/javascript" src="{{ asset('/js/admin-postGroup.js') }}"></script>

@endsection
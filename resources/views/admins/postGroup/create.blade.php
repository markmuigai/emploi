@extends('layouts.dashboard-layout')

@section('title','Emploi Admin :: Create Job Post Group')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@section('page_title', 'Create Job Post Group')

<div class="card">
    <div class="card-body">
        <form method="POST" action="/admin/job-post-groups/" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-12">
                    <div>
                        <label>Title</label>
                        <input type="text" name="title" maxlength="500" required="" class="form-control">
                    </div>
                    <div>
                        <label>Description</label>
                        <textarea class="form-control" id="description" required="" name="description"></textarea>
                    </div>
                    <div>
                        <br>
                        <label>How to Apply</label>
                        <textarea class="form-control" id="how_to_apply" required="" name="how_to_apply"></textarea>
                    </div>
                    <div style="display: none">
                        <br>
                        <label>Image</label>
                        <input type="file" name="image">
                    </div>

                    <div>
                        <br>
                        <label>Accepted Jobs</label>
                        <div id="accepted_jobs" class="row">
                            
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
                <p><input type="submit" value="Save" class="btn btn-orange" name=""></p>
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
</script>
<script type="text/javascript" src="{{ asset('/js/admin-postGroup.js') }}"></script>

@endsection
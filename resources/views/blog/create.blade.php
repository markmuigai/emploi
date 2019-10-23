@extends('layouts.seek')

@section('title','Emploi :: Create Blog')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')

<div class="container">
    <div class="single">  
       <div class="form-container">
        <h2>New Blog</h2>
        <form method="POST" action="/blog" class="row" id="new-blog-form" enctype="multipart/form-data">
            @csrf
          <div class="row col-md-6">
            <div class="form-group col-md-12">
                <label class="col-md-3 control-lable" for="title">Title *</label>
                <div class="col-md-9">
                    <input type="text" required="" path="" name="title" id="title" class="form-control input-sm" maxlength="50" value="" />
                </div>
            </div>
         </div>
         <div class="row col-md-6">
            <div class="form-group col-md-12">
                <label class="col-md-3 control-lable" for="category">Category *</label>
                <div class="col-md-9 row">
                    <select class="form-control"  name="category">
                        @foreach($categories as $c)
                        <option value="{{ $c->id }}">
                            {{ $c->code }} {{ $c->prefix }}
                        </option>
                        @endforeach
                    </select>
                    
                </div>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-12">
                <div class="col-md-10 row col-md-offset-1">
                    <textarea class="form-control" name="contents" required="" id="contents" rows="10"></textarea>
                    
                </div>
            </div>
        </div>
        <div class="row col-md-6">
            <div class="form-group col-md-12" title="Featured Image (500x300p)">
                <label class="col-md-3 control-lable" for="title">Image *</label>
                <div class="col-md-9">
                    <input type="file" accept=".png, .jpg, .jpeg" name="featured_image" required="" >
                </div>
            </div>
         </div>

         <div class="row col-md-6">
            <div class="form-group col-md-12" title="Other Image (500x300p)">
                <label class="col-md-3 control-lable" for="title">Other Image</label>
                <div class="col-md-9">
                    <input type="file" accept=".png, .jpg, .jpeg" name="other_image">
                </div>
            </div>
         </div>
        
        <div class="row">
            <div class="form-actions floatRight">
            	<input type="submit" class="btn btn-primary btn-sm" name="" value="Save Blog">
            </div>
        </div>
    </form>
                
    </div>
 </div>
</div>
<script type="text/javascript" src="{{ asset('ckeditor/ckeditor.js') }}"></script>
<script>
    setTimeout(function(){

        CKEDITOR.replace('contents');

    },3000);

    $().ready(function(){
    	$('#save-blog').click(function(){
    		
    	});
    });
    
</script>

@endsection
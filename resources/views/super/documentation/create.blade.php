@extends('layouts.dashboard-layout')

@section('title','Emploi :: Create Documentation')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@section('page_title', 'Create Documentation')

<div class="card">
    <div class="card-body">
        <h2>
            <a href="/desk/documentation" class="btn btn-sm btn-default"><i class="fa fa-arrow-left"></i> Back</a>
        </h2>
        <br>
        <form method="post" action="/desk/documentation">
            @csrf
            
            <div id="form-group">
                <label>Parent</label>
                <select name="" class="form-control">
                    <option value="-1">None</option>
                     @foreach( $documents as $doc)
                    <option value="{{ $doc->id }}">{{ $doc->title }}</option>
                    @endforeach
                </select>
            </div>   
           

            <div class="form-group">
                <label>
                    Title:
                </label>
                <input type="text" name="title" placeholder="" value="" required="required" class="form-control" maxlength="200">
            </div>

            <div class="form-group">
                <label>
                    Content:
                </label>
                <textarea rows="15" name="content" class="form-control" required="" id="content"></textarea>
            </div>          

            
            <button type="submit" name="button" class="btn btn-orange">Create Documentation</button>
        </form>
    </div>
</div>
<!-- <script type="text/javascript" src="{{ asset('ckeditor/ckeditor.js') }}"></script>
<script>
    setTimeout(function() {
        CKEDITOR.replace('description');
    }, 3000);
</script>
 -->
@endsection

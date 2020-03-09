@extends('layouts.dashboard-layout')

@section('title','Emploi :: Edit Documentation')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@section('page_title', 'Edit Documentation')

<div class="card">
    <div class="card-body">
      
     <form method="post" action="/desk/documentation/{{ $document->id }}">
        @csrf
        @method('PUT')
        <!-- @foreach ($errors->all() as $error)
        <p class="alert alert-danger">{{ $error }}</p>
        @endforeach
        @if (session('status'))
        <div class="alert alert-success">
        {{ session('status') }}
        </div>
        @endif -->
        <fieldset>
            <legend>Edit Documentation</legend>

            <div id="form-group">
                <label>Parent</label>
                <select name="" class="form-control">
                    <option value="-1">None</option>
                     @foreach( $document as $doc)
                    <option value="{{ $doc->id }}">{{ $doc->title }}</option>
                    @endforeach
                </select>
            </div>   

            <div class="form-group">
                <label for="title" class="col-lg-2 control-label">Title</label>
                <div class="col-lg-10">
                <input type="text" class="form-control" id="title" name="title" value="{{ $document->title }}">
                </div>
                </div>

            <div class="form-group">
                <label for="content" class="col-lg-2 control-label">Content</label>
                    <div class="col-lg-10">

                    <textarea class="form-control" rows="3" id="content"name="content">{{ $document->content }}</textarea>
                </div>
            </div>

            <div class="form-group">     
                <div class="form-group">
                    <div class="col-lg-10 col-lg-offset-2">
                    <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </div>
            </div>
        </fieldset>
        </form>

   </div>
</div>
@endsection

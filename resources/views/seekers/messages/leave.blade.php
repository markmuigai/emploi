@extends('layouts.dashboard-layout')

@section('title','PaaS :: Leave Requests') )

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('page_title', 'Request Leave') 

@section('content')

<a href="/inbox" class="btn btn-orange">
    <i class="fa fa-arrow-left"></i> Back
</a><br><br>
<?php 

$user = Auth::user();
?>

<h2>
    <a href="/issues" class="btn btn-sm btn-orange-alt" role="button"><i class="fa fa-arrow-left"></i> Back</a>
</h2>

<div class="card">
    <div class="card-body">
       
        <br>
    
        <form method="post" action="/leave/store">
            @csrf

            <div class="form-group">
                <label>
                    Issue Title:
                </label>
                <input name="title" class="form-control input-sm" required="" id="title"></input>
            </div>

            <div class="form-group">
                <label for="location">Parent Task:</label>
                <select name="slug" class="form-control input-sm">
                    @foreach($task as $t)
                    <option value="{{ $t->slug }}" 
                        selected=""
                    
                        >{{ $t->title }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label>
                    Description:
                </label>
                <textarea name="description" class="form-control" required=""></textarea>
            </div>

           <div class="form-group">
                <label for="location">Assignee:</label>
                <select name="assignee" class="form-control input-sm">

                    <option value="" 
                        selected=""
                    
                        ></option>

                </select>
            </div>

            <div class="form-group">
                <label>
                    Start Date:
                </label>
                <input type="date" class="form-control" value="" name="start_date"  required="" placeholder="">
            </div>

            <div class="form-group">
                <label>
                    Due Date:
                </label>
                <input type="date" class="form-control" value="" name="due_date" placeholder="">
            </div>       

            

            
            <button type="submit" name="button" class="btn btn-orange">Create Issue</button>
        </form>
    </div>
</div>
<script type="text/javascript" src="{{ asset('ckeditor/ckeditor.js') }}"></script>
<script>
    setTimeout(function() {
        CKEDITOR.replace('description');
    }, 3000);
</script>

@endsection
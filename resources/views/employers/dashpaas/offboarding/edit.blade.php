@extends('layouts.dashboard-layout')

@section('title','Emploi :: Edit Offboarding task')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@section('page_title', 'Edit Offboarding Task')

<h2>
    <a href="/employers/admin-paas" class="btn btn-sm btn-orange-alt" role="button"><i class="fa fa-arrow-left"></i> Back</a>
</h2>

<div class="card">
    <div class="card-body">
       
        <br>
        <form method="post" action="/employers/offboarding/update/{{ $t->id }}">
            @csrf

            <div class="row">
                <div class="col-md-8">
                    <div class="form-group">
                        <label>
                            Title:
                        </label>
                        <input name="title"  value="{{ $t->title }}" class="form-control input-sm" required="" id="title"></input>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                      <label class="h6">Status</label>
                        <select id="status" name="status" class="form-control input-sm">
                          <option value="{{ $t->status}}">{{ $t->status }}</option>
                          <option value="active">active</option>
                          <option value="pending">pending</option>
                          <option value="completed">completed</option>                
                        </select>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="part_timer">Part timer:</label>
                        <select name="part_timer" class="form-control input-sm">
                            <option value="{{ $t->part_timer }}" 
                                selected=""                    
                                >{{ $t->part_timer }}</option>
                        </select>
                    </div>
                </div>
                    
                <div class="col-md-6">
                    <div class="form-group">
                        <label>
                            Assigned To:
                        </label>
                        <input name="assigned_to" value="{{ $t->assigned_to }}" class="form-control input-sm"></input>
                    </div>
               </div>
            </div>
            
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>
                            Date:
                        </label>
                        <input type="date-local"  value="{{ \Carbon\Carbon::parse($t->date)->format('Y-m-d') }}"  class="form-control" name="date"  required="" placeholder="">
                    </div>
                </div>
                        
                        <!--       <div class="form-group">
                            <label>
                                Due Date:
                            </label>
                            <input type="date" class="form-control" value="" name="due_date" placeholder="">
                        </div>   -->     
                <div class="col-md-6">
                    <div class="form-group">
                      <label class="h6">Category</label>
                        <select id="category" name="category" class="form-control input-sm">
                          <option value="{{ $t->category }}">{{ $t->category }}</option>
                          <option value="HR">HR</option>
                          <option value="IT">IT</option>
                          <option value="Manager">Manager</option>
                          <option value="Other">Other</option>                
                        </select>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label>
                    Description:
                </label>
                <textarea name="description" class="form-control" id="description">{{ old('description') ? old('description') : $t->description }}</textarea>
            </div>

            
            <button type="submit" name="button" class="btn btn-orange">Update</button>
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

@extends('layouts.dashboard-layout')

@section('title','Emploi :: Create Issue')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@section('page_title', 'Create Issue')

<div class="card">
    <div class="card-body">
        <h2>
            <a href="/issues" class="btn btn-sm btn-default"><i class="fa fa-arrow-left"></i> Back</a>
            New Issue            
        </h2>
        <br>
        <?php 

            $user = Auth::user();
            $task = App\Task::where('employer_id', $user->employer->id)->where('status','!=', 'pending')->get();
        ?>
        <form method="post" action="/issues/store">
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
                <textarea name="description" class="form-control" required="" id="description"></textarea>
            </div>


            <!-- <div class="form-group">
                <label>
                    Assignee:
                </label>
                <input type="text" name="assignee" placeholder="" value="" required="required" class="form-control" maxlength="500">
            </div> -->
           <div class="form-group">
                <label for="location">Assignee:</label>
                <select name="assignee" class="form-control input-sm">
                    @foreach($prof as $p)
                    <option value="{{ $p->user->name }}" 
                        selected=""
                    
                        >{{ $p->user->name }}</option>
                    @endforeach
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

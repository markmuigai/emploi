@extends('layouts.dashboard-layout')

@section('title','Emploi :: Create Message')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@section('page_title', 'Message')

<h2>
    <a href="/issues" class="btn btn-sm btn-orange-alt" role="button"><i class="fa fa-arrow-left"></i> Back</a>
</h2>

<div class="card">
    <div class="card-body">
       
        <br>
        <?php 

            $user = Auth::user();
            $task = App\Task::where('employer_id', $user->employer->id)->where('status','!=', 'pending')->get();
        ?>
        <form method="post" action="/messages/store">
            @csrf
            <div class="form-group">
                <label for="location">Task:</label>
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
                    Message:
                </label>
                <textarea name="messages" class="form-control" required=""></textarea>
            </div>

           <div class="form-group">
                <label for="location">To:</label>
                <select name="assignee" class="form-control input-sm">
                    @foreach($prof as $p)
                    <option value="{{ $p->user->name }}" 
                        selected=""
                    
                        >{{ $p->user->name }}</option>
                    @endforeach
                </select>
            </div>
                       
            <button type="submit" name="button" class="btn btn-orange">Send</button>
        </form>
    </div>
</div>
@endsection

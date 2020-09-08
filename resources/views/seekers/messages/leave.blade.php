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
    <?php 
    $user = Auth::user();
    $tasks = App\PartTimer::where('user_id', $user->id)->get();
    ?>

        <br>
    
        <form method="post" action="/store-leave">
            @csrf

            <div class="form-group">
                <label for="location">Assigned Task:</label>
                <select name="task_slug" class="form-control input-sm" readonly="readonly">
                    @foreach($tasks as $t)
                    <option value="{{ $t->task_slug }}" 
                        selected="{{ $t->task_slug }}"
                    
                        >{{ $t->task_slug }}</option>
                    @endforeach
                </select>
            </div>


            <div class="form-group">
                <label>
                    Reason:
                </label>
                <textarea name="reason" class="form-control" required=""></textarea>
            </div>

            <div class="form-group">
                <label>
                    Start Date:
                </label>
                <input type="date" class="form-control" value="" name="start_time" required="" placeholder="">
            </div>

            <div class="form-group">
                <label>
                    End Date:
                </label>
                <input type="date" class="form-control" value="" name="end_time" required="" placeholder="">
            </div>       

            

            
            <button type="submit" name="button" class="btn btn-orange">Send Request</button>
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
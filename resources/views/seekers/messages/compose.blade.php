@extends('layouts.dashboard-layout')

@section('title','PaaS :: Compose')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@section('page_title', 'Compose Reply')

<h2>
    <a href="/inbox" class="btn btn-sm btn-orange-alt" role="button"><i class="fa fa-arrow-left"></i> Back</a>
</h2>

<div class="card col-md-8 ml-5">
    <div class="card-body">
       
        <br>
        <?php 

            $user = Auth::user();
        ?>
       
        <form method="post" action="/send">
            @csrf

            <div class="form-group">
                <label for="location">Task:</label>
                <input name="title" class="form-control input-sm" required=""  value="{{ $message->title }}"></input>

            </div>

            <div class="form-group" style="display:none" >
                <input name="slug" class="form-control input-sm"  value="{{ $message->task_slug }}"></input>
            </div>

            <div class="form-group" style="display:none" >
                <input name="to_id" class="form-control input-sm"  value="{{ $message->from_id }}"></input>
            </div>


            <div class="form-group">
                <label>
                    Message:
                </label>
                <input name="body" class="form-control" required="" style="height:80px;"></input>
            </div>       
          
            <button type="submit" name="button" class="btn btn-orange">Send</button>
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

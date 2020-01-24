@extends('layouts.dashboard-layout')

@section('title','Emploi :: CV Editing Request')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@section('page_title', 'CV Editing Request')

<div class="card">
    <div class="card-body row">

        <div class="col-md-10 offset-md-1 row">
            <form method="POST" action="/cv-editing/{{ $edit->slug }}" enctype="multipart/form-data">
                @csrf
                {{ method_field('PUT') }}
                <strong>
                    <a href="/cvediting/{{ $edit->slug }}"><i class="fa fa-arrow-left"></i></a>
                    {{ $edit->slug }}
                </strong>  
                <hr>
                <p>
                    <label>Final Edited CV: <small>Max 5mb</small></label>
                    @error('final_cv')
                    <div class="text-center my-2 py-1 alert alert-danger" role="alert">
                        Invalid CV uploaded
                    </div>
                    @enderror
                    <input type="file" name="final_cv" required="" accept=".docx, .doc, .pdf">
                </p>
                <br>  
                <p>
                    <label>Message:</label> 
                    @error('message')
                    <div class="text-center my-2 py-1 alert alert-danger" role="alert">
                        Message not included
                    </div>
                    @enderror
                    <textarea class="form-control" name="message" id="message"></textarea>
                </p>
                <hr>   
                <p>
                    <input type="submit" class="btn btn-primary">
                </p>   
            </form>	
        </div>        
    </div>
</div>

<script type="text/javascript" src="{{ asset('ckeditor/ckeditor.js') }}"></script>
<script>
    setTimeout(function() {

        CKEDITOR.replace('message');

    }, 3000);
</script>

@endsection

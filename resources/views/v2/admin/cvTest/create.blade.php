@extends('layouts.dashboard-layout')

@section('title','CV Review :: Emploi')

@section('question')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@section('page_title', 'CV Testing')
<div class="container-fluid mb-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card px-2 shadow mb-5 bg-white rounded">
                <div class="card-body">
                    <form action="{{route('cvTests.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <label for="files">Select CVs:</label>
                        <input type="file" id="files" name="files[]" multiple><br><br>
                        <button type="submit" class="float-right btn btn-primary">
                            Submit
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
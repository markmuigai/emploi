@extends('layouts.dashboard-layout')

@section('title','Self Assessment :: Emploi')

@section('question')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@section('page_title', 'Add diagramatic assessments ')
<div class="container-fluid mb-5">
    <a href="{{ url()->previous() }}" class="btn btn-primary mb-3">
       <i class="fa fa-arrow-left"></i> Back
    </a>
    <div class="row">
        <div class="col-md-12">
            <div class="card px-2 shadow mb-5 bg-white rounded">
                <div class="card-body">
                    <form action="{{route('image-assessments.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="question">Question</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" name="title" rows="3" required>What comes next?</textarea>
                        </div>
                        <div class="form-group">
                            <label for="questionImage">Question Image</label>
                            <input type="file" class="form-control-file" id="questionImage" name="image">
                        </div>
                        <img src="" id="previewQuestion" height="auto" width="500px">
                        <div class="form-row mt-3">
                            <div class="col-md-6">
                                <p class="mt-2">Select the correct option</p>
                                <div class="form-check mr-3">
                                    <input class="form-check-input" type="radio" name="correct" value="a">
                                    <label class="form-check-label" for="exampleRadios1">
                                        A
                                    </label>
                                </div>
                                <div class="form-check mr-3">
                                    <input class="form-check-input" type="radio" name="correct" value="b">
                                    <label class="form-check-label" for="exampleRadios1">
                                        B
                                    </label>
                                </div>
                                <div class="form-check mr-3">
                                    <input class="form-check-input" type="radio" name="correct" value="c">
                                    <label class="form-check-label" for="exampleRadios1">
                                        C
                                    </label>
                                </div>
                                <div class="form-check mr-3">
                                    <input class="form-check-input" type="radio" name="correct" value="d">
                                    <label class="form-check-label" for="exampleRadios1">
                                        D
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <select id="inputRating" name="level" class="form-control">
                                      <option>Choose Difficulty Level</option>
                                      <option value="easy">Easy</option>
                                      <option value="medium">Medium</option>
                                      <option value="hard">Hard</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="float-right btn btn-primary" id="btnSubmit">
                            Submit
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
    <script>
            function readQuestionURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    
                    reader.onload = function(e) {
                        $('#previewQuestion').attr('src', e.target.result);
                    }
                    
                    reader.readAsDataURL(input.files[0]); // convert to base64 string
                }
            }

            function readChoicesURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    
                    reader.onload = function(e) {
                        $('#previewChoice').attr('src', e.target.result);
                    }
                    
                    reader.readAsDataURL(input.files[0]); // convert to base64 string
                }
            }

            $("#questionImage").change(function() {
                readQuestionURL(this);
            });

            $("#choicesImage").change(function() {
                readChoicesURL(this);
            });
    </script>
@endsection
@extends('layouts.dashboard-layout')

@section('title','Self Assessment :: Emploi')

@section('question')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@section('page_title', 'Edit assessment')
<div class="container-fluid mb-5">
    <div class="row justify-content-between">
        <div class="col-md-4">
            <a href="{{ url()->previous() }}" class="btn btn-orange mb-3">
                <i class="fa fa-arrow-left"></i> Back
             </a>
        </div>
        <div class="col-md-4">
            <form action="{{ route('image-assessments.destroy', [$question->id]) }}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger float-right">
                    Delete Question
                </button>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card px-2 shadow mb-5 bg-white rounded">
                <div class="card-body">
                    <form action="{{route('image-assessments.update',[$question])}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="question">Question</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" name="title" rows="3" required>{{ $question->title ?: '' }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="level">Choose new Difficulty Level</label>
                            <select id="inputRating" name="level" class="form-control" required="">
                                <option {{$question->difficulty_level == 'easy' ? 'selected' : '' }}  value="easy">Easy</option>
                                <option {{$question->difficulty_level == 'medium' ? 'selected' : '' }} value="medium">Medium</option>
                                <option {{$question->difficulty_level == 'hard' ? 'selected' : '' }}  value="hard">Hard</option>
                            </select>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <img src="/storage/assessments/{{$question->id}}" height="auto" width="400px" alt="">
                            </div>
                            <div class="col-md-6">
                                <p class="mt-2">Select the correct option</p>
                                <div class="form-check mr-3">
                                    <input {{$question->image->correct_value == 'a' ? 'checked' : '' }} class="form-check-input" type="radio" name="correct" value="a">
                                    <label class="form-check-label" for="exampleRadios1">
                                        a
                                    </label>
                                </div>
                                <div class="form-check mr-3">
                                    <input {{$question->image->correct_value == 'b' ? 'checked' : '' }} class="form-check-input" type="radio" name="correct" value="b">
                                    <label class="form-check-label" for="exampleRadios1">
                                        b
                                    </label>
                                </div>
                                <div class="form-check mr-3">
                                    <input {{$question->image->correct_value == 'c' ? 'checked' : '' }} class="form-check-input" type="radio" name="correct" value="c">
                                    <label class="form-check-label" for="exampleRadios1">
                                        c
                                    </label>
                                </div>
                                <div class="form-check mr-3">
                                    <input {{$question->image->correct_value == 'd' ? 'checked' : '' }} class="form-check-input" type="radio" name="correct" value="d">
                                    <label class="form-check-label" for="exampleRadios1">
                                        d
                                    </label>
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

@extends('layouts.dashboard-layout')

@section('title','Self Assessment :: Emploi')

@section('question')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@section('page_title', 'Edit assessment')
<div class="container-fluid mb-5">
    <a href="{{ url()->previous() }}" class="btn btn-primary mb-3">
       <i class="fa fa-arrow-left"></i> Back
    </a>
    <div class="row">
        <div class="col-md-12">
            <div class="card px-2 shadow mb-5 bg-white rounded">
                <div class="card-body">
                    <form action="{{route('assessments.update',[$question])}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="form-group">
                            <label for="question">Question</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" name="title" rows="3" required>{{ $question->title ?: '' }}</textarea>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label for="level">Choose new Difficulty Level</label>
                                <select id="inputRating" name="level" class="form-control" required="">
                                  <option {{$question->difficulty_level == 'easy' ? 'selected' : '' }}  value="easy">Easy</option>
                                  <option {{$question->difficulty_level == 'medium' ? 'selected' : '' }} value="medium">Medium</option>
                                  <option {{$question->difficulty_level == 'hard' ? 'selected' : '' }}  value="hard">Hard</option>
                                </select>
                            </div>
                        </div>
                        <label for="choice">Add choices</label>
                        <div class="row">
                            <div class="col-md-6">
                                @foreach ($question->choices as $choi => $choice)
                                    <div class="form-group">
                                        <input class="form-control mt-1" type="text" name="{{'choices['. $choice->id.']'}}.[]" value="{{$choice->value}}">
                                    </div>
                                    <div class="form-check">
                                        @if ($choice->isCorrect())
                                            <input class="form-check-input" type="radio" name="correct" id="exampleRadios1" value="{{$choice->id}}" checked>
                                        @else
                                        <input class="form-check-input" type="radio" name="correct" id="exampleRadios1" value="{{$choice->id}}">
                                        @endif
                                        <label class="form-check-label" for="exampleRadios1">
                                            Correct
                                        </label>
                                    </div>
                                @endforeach
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

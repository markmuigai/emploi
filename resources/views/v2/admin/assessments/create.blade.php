@extends('layouts.dashboard-layout')

@section('title','Self Assessment :: Emploi')

@section('question')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@section('page_title', 'Add assessments ')
<div class="container-fluid mb-5">
    <a href="{{ url()->previous() }}" class="btn btn-primary">
       <i class="fa fa-arrow-left"></i> Back
    </a>
    <div class="row">
        <div class="col-md-12">
            <div class="card px-2 shadow mb-5 bg-white rounded">
                <div class="card-body">
                    <form action="{{route('assessments.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div id="container">
                            <div id="divRow0" class=clonerow>
                                <div id="innerDivRow0">
                                    <div class="form-group">
                                        <label for="question">Question</label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" name="questions[0][title]" rows="3" required>{{ old('title') ?: '' }}</textarea>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-4">
                                            <select id="inputRating" name="questions[0][level]" class="form-control">
                                              <option>Choose Difficulty Level</option>
                                              <option value="easy">Easy</option>
                                              <option value="medium">Medium</option>
                                              <option value="hard">Hard</option>
                                            </select>
                                        </div>
                                    </div>
                                    <label for="choice">Add choices</label>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input class="form-control mt-1" type="text" name="questions[0][choices][0]" id="">
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="questions[0][correct]" id="exampleRadios1" value="0" checked>
                                                <label class="form-check-label" for="exampleRadios1">
                                                    Correct
                                                </label>
                                            </div>
                                            <div class="form-group">
                                                <input class="form-control mt-1" type="text" name="questions[0][choices][1]" id="">
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="questions[0][correct]" id="exampleRadios1" value="1" checked>
                                                <label class="form-check-label" for="exampleRadios1">
                                                    Correct
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input class="form-control mt-1" type="text" name="questions[0][choices][2]" id="">
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="questions[0][correct]" id="exampleRadios1" value="2" checked>
                                                <label class="form-check-label" for="exampleRadios1">
                                                    Correct
                                                </label>
                                            </div>
                                            <div class="form-group">
                                                <input class="form-control mt-1" type="text" name="questions[0][choices][3]" id="">
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="questions[0][correct]" id="exampleRadios1" value="3" checked>
                                                <label class="form-check-label" for="exampleRadios1">
                                                    Correct
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <input class="btn btn-primary my-2" type="button" onclick="Clone(this)" value="Add a question" />
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
        function Clone(clonebutton) {
            // Row to clone
            var row = $(clonebutton).parent(),

            // Inital row 
            original = $('#divRow0'),
            
            // Clone function 
            clone = $(original).clone(true, true);

            // Update id of parent row 
            clone.find('#divRow0').prop('id', 'divRow' + $('.clonerow').length);

            // // Update id of child row 
            clone.find('#innerDivRow0').prop('id', 'innerDivRow' + $('.clonerow').length);

            // Update choices fields 
            clone.find('input[name="questions[0][choices][0]"]').attr('name', 'questions['+ $('.clonerow').length +'][choices][0]');
            clone.find('input[name="questions[0][choices][1]"]').attr('name', 'questions['+ $('.clonerow').length +'][choices][1]');
            clone.find('input[name="questions[0][choices][2]"]').attr('name', 'questions['+ $('.clonerow').length +'][choices][2]');
            clone.find('input[name="questions[0][choices][3]"]').attr('name', 'questions['+ $('.clonerow').length +'][choices][3]');

            // Update correct fields
            clone.find('input[name="questions[0][correct]"]').attr('name', 'questions['+ $('.clonerow').length +'][correct]');
            clone.find('input[name="questions[0][correct]"]').attr('name', 'questions['+ $('.clonerow').length +'][correct]');
            clone.find('input[name="questions[0][correct]"]').attr('name', 'questions['+ $('.clonerow').length +'][correct]');
            clone.find('input[name="questions[0][correct]"]').attr('name', 'questions['+ $('.clonerow').length +'][correct]');

            // Update title field
            clone.find('textarea[name="questions[0][title]"]').attr('name', 'questions['+ $('.clonerow').length +'][title]');

            // Update level field
            clone.find('select[name="questions[0][level]"]').attr('name', 'questions['+ $('.clonerow').length +'][level]');

            // Append clone to parent container
            $('#container').append(clone);

            // length variable
            length = $('.clonerow').length

            console.log($('#innerDivRow' + (length-1)));
            // Append a remove questions button
            $('#innerDivRow' + (length-1)).append("<button type='button' class='btn btn-danger' onclick='DeleteClone(this)'>Remove question</button>")

        }

        // Function to delete question row on button click
        function DeleteClone(deletebutton){

            // Delete the row and its children
            $(deletebutton).parent().remove()

        }
    </script>

    <script>
    $().ready(function(){

        var submit_clicked = false;

        $('#btnSubmit').click(function(){
                submit_clicked = true;
            });

        window.onbeforeunload = function() {
            if (submit_clicked === false){
            return "Are you sure you want to leave? Changes will not be saved!";
            }
        }
    });
    </script>
@endsection
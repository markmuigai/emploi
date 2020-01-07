@extends('layouts.dashboard-layout')

@section('title','Add Referee')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@section('page_title', 'Add Referee')

<div class="card">
    <div class="card-body">
        <form method="POST" action="/profile/add-referee">
            @csrf
            <div class="form-group">
                <label class="control-label" for="fullName">Name</label>
                <input type="text" required="" name="name" class="form-control input-sm" maxlength="50" value="" />
            </div>

            <div class="form-group">
                <label class="control-label" for="phone_number">Phone Number</label>
                <input type="number" required="" placeholder="e.g. 2547XXXXXXXX" name="phone_number" class="form-control input-sm" maxlength="50" value="" />
            </div>


            <div class="form-group">
                <label class="control-label" for="email">Email</label>
                <input type="email" required="" value="" name="email" path="email" id="email" class="form-control input-sm" maxlength="50" />

            </div>

            <div class="form-group">
                <label class="control-label">Organization</label>
                <input type="text" required="" name="organization" class="form-control input-sm" maxlength="50" value="" />
            </div>

            <div class="form-group">
                <label class="control-label">Referee's Position</label>
                <input type="text" required="" name="position_held" class="form-control input-sm" maxlength="50" value="" />
            </div>

            <div class="form-group">
                <label class="control-label">Relationship with Referee</label>
                <input type="text" required="" placeholder="e.g. direct-supervisor, lecturer, colleague" name="relationship" class="form-control input-sm" maxlength="50" value="" />
            </div>

            <hr>

            <div class="pull-right">
                <button type="button" name="button" class="btn btn-purple" id="add-position">Add Position</button>
            </div>
            <h4>Positions at Organization</h4>
            <div id="positions-at-org"></div>
            <hr>
            <div class="text-right">
                <button type="submit" name="button" class="btn btn-orange">Save Referee</button>
            </div>
            <div class="text-center mt-3">
                <p>
                    An one-time e-mail would be sent to your referee for verification.
                </p>
            </div>
        </form>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        addPosition();

        function addPosition() {
            $pos = '' +
                '<div class="position-at-org">' +
                '<div class="form-group">' +
                '<label class="control-label" >Job Title </label>' +
                '<input type="text" required="" placeholder="" name="job_title[]" class="form-control input-sm" maxlength="50" value="" />' +
                '</div>' +
                '<div class="form-row">' +
                '<div class="form-group col-md-6">' +
                '<label class="control-label" >Start Date </label>' +
                '<input type="date" required="" placeholder="" name="start_date[]" class="form-control input-sm" maxlength="50" value="" />' +
                '</div>' +
                '<div class="form-group col-md-6">' +
                '<label class="control-label" >End Date </label>' +
                '<input type="date" required="" placeholder="" name="end_date[]" class="form-control input-sm" maxlength="50" value="" />' +
                '</div>' +
                '</div>' +
                '<button type="button" class="btn btn-sm btn-danger remove-position">Remove</button>' +
                '</div>';
            $('#positions-at-org').append($pos);
            $('.remove-position').click(function() {
                if ($('.position-at-org').length > 1)
                    $(this).parent().remove();
            });
        }
        $('#add-position').click(function() {
            addPosition();
        });
    });
</script>

@endsection

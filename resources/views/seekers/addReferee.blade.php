@extends('layouts.seek')

@section('title','Add Referee')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')

<div class="container">
    <div class="single">  
       <div class="form-container col-md-8">
        <h3>Add Referee
            <a href="/profile/referees" class="btn btn-success btn-sm pull-right">My Referees</a>
        </h3>
        <hr>
        
        <form method="POST" action="/profile/add-referee">
            @csrf
            
            <div class="row">
                <div class="form-group col-md-12">
                    <label class="col-md-3 control-lable" for="fullName">Name</label>
                    <div class="col-md-9">
                        <input type="text" required="" name="name" class="form-control input-sm" maxlength="50" value="" />
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-12">
                    <label class="col-md-3 control-lable" for="phone_number">Phone Number</label>
                    <div class="col-md-9">
                        <input type="number" required="" placeholder="e.g. 2547XXXXXXXX" name="phone_number" class="form-control input-sm" maxlength="50" value="" />
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-12">
                    <label class="col-md-3 control-lable" for="email">Email</label>
                    <div class="col-md-9">
                        <input type="email" required="" value="" name="email" path="email" id="email" class="form-control input-sm" maxlength="50" />
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-12">
                    <label class="col-md-3 control-lable" >Organization</label>
                    <div class="col-md-9">
                        <input type="text" required="" name="organization" class="form-control input-sm" maxlength="50" value="" />
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-12">
                    <label class="col-md-3 control-lable" >Referee's Position</label>
                    <div class="col-md-9">
                        <input type="text" required="" name="position_held" class="form-control input-sm" maxlength="50" value="" />
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-12">
                    <label class="col-md-3 control-lable" >Relationship with Referee</label>
                    <div class="col-md-9">
                        <input type="text" required="" placeholder="e.g. direct-supervisor, lecturer, colleague" name="relationship" class="form-control input-sm" maxlength="50" value="" />
                    </div>
                </div>
            </div>
            <hr>
            <h4>Positions at Organization</h4>
            <div id="positions-at-org">

                
                
                
            </div>
            <p style="text-align: center;">
                <br>
                <span class="btn btn-primary btn-sm" id="add-position">Add Position</span>
                <br>
                <hr>
            </p>

            <div style="text-align: center;">
                <br>
                <input type="submit" name="" class="btn-orange" value="Save Referee">
                
            </div>

            <p style="text-align: center;">
                <br><br>
                <i>
                    An one-time e-mail would be sent to your referee for verification.
                </i>
            </p>

            
            
            
        
        
        
    </form>
    
                
    </div>
    <div class="col-md-4">
          @include('left-bar')
          
     </div>
 </div>
</div>
<script type="text/javascript">
    $().ready(function(){
        addPosition();
        function addPosition(){
            $pos = ''+
            '<div class="position-at-org">'+
                '<div class="row">'+
                    '<div class="form-group col-md-12">'+
                        '<label class="col-md-3 control-lable" >Job Title </label>'+
                        '<div class="col-md-9">'+
                            '<input type="text" required="" placeholder="" name="job_title[]" class="form-control input-sm" maxlength="50" value="" />'+
                        '</div>'+
                    '</div>'+
                '</div>'+
                '<div class="row">'+
                    '<div class="form-group col-md-6 col-xs-6">'+
                        '<label class="col-md-3 control-lable" >Start Date </label>'+
                        '<div class="col-md-9">'+
                            '<input type="date" required="" placeholder="" name="start_date[]" class="form-control input-sm" maxlength="50" value="" />'+
                        '</div>'+
                    '</div>'+
                    '<div class="form-group col-md-6 col-xs-6">'+
                        '<label class="col-md-3 control-lable" >End Date </label>'+
                        '<div class="col-md-9">'+
                            '<input type="date" required="" placeholder="" name="end_date[]" class="form-control input-sm" maxlength="50" value="" />'+
                        '</div>'+
                    '</div>'+
                '</div>'+
                '<br><span class="btn btn-sm btn-danger pull-right remove-position">remove this position</span><br> <hr>'+
            '</div>';
            $('#positions-at-org').append($pos);
            $('.remove-position').click(function(){
                if($('.position-at-org').length > 1)
                    $(this).parent().remove();
            });
        }
        $('#add-position').click(function(){
            addPosition();
        });
    });
</script>

@endsection
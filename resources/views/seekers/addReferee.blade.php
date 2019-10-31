@extends('layouts.seek')

@section('title','Add Referee')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')

<div class="container">
    <div class="single">  
       <div class="form-container">
        <h2>Add Referee</h2>
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
            <div class="row">
                <div class="form-group col-md-12">
                    <label class="col-md-3 control-lable" >My Position at Organization</label>
                    <div class="col-md-9">
                        <input type="text" required="" placeholder="" name="seeker_job_title" class="form-control input-sm" maxlength="50" value="" />
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-12">
                    <label class="col-md-3 control-lable" >My Responsibilities</label>
                    <div class="col-md-9">
                        <textarea class="form-control" rows="4" name="responsibilities" required="" placeholder="State your duties"></textarea>
                        
                    </div>
                </div>
            </div>

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
 </div>
</div>

@endsection
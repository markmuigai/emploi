@extends('layouts.general-layout')

@section('title','Make Request')
@section('description')
Request Professionals Emploi and reach an audience of 100k+, get access to Premium Shortlisting tools and Candidate Ranking algorithims. Request professional in two minutes.
@endsection


@section('content')


<div class="row">
    <div class="col-md-5 align-right pt-4 pb-4 pl-4 ml-4">
        <div class="modal-content shadow-lg">
            <div class="modal-header">
              <h5 class="modal-title text-right h4" id="exampleModalLabel">Request for Part-Timer</h5>
            </div>
            <div class="modal-body">
              <!-- subscribe form for Professional -->
                <form method="POST"  enctype="multipart/form-data" action="/employers/subscribe-paas">
                  @csrf
                  <div class="form-group">
                    <label class="h5">First Name</label>
                    <input type="text" class="form-control" name="firstname" required="" placeholder="First Name">
                  </div>
                  <div class="form-group">
                    <label class="h5">Last Name</label>
                    <input type="text" class="form-control" name="lastname" required="" placeholder="Last Name">
                  </div>
        
                  <div class="form-group">
                    <label class="h5">Email Address</label>
                    <input type="email" class="form-control" name="email" required="" placeholder="Email">
                  </div>
                  <div class="form-group">
                    <label class="h5">Phone Number</label>
                    <input type="text" class="form-control" name="phone_number" required="" placeholder="Phone">
                  </div>
                  <div class="form-group">
                    <label class="h5">Company Name</label>
                    <input type="text" class="form-control" name="company" required="" placeholder="Company name">
                  </div>
        
                  <div class="form-group">
                    <label class="h5">Task Description</label>
                    <input type="text" class="form-control" name="company" required="" placeholder="Task">
                  </div>
        
                  <div class="form-group">
                    <label class="h5">Salary</label>
                    <input type="text" class="form-control" name="company" required="" placeholder="Salary">
                  </div>
        
                  <div class="modal-footer">
                    <input type="submit" class="btn" style="background-color: #E15419; color: white;" name="button" value="Submit">
                    <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
                  </div>
        
                </form>
            </div>
        </div>
    </div>

    <div class="col-md-6 align-right pt-4 pb-4 pl-4 ml-4">
        <div class="modal-content shadow-lg">
            <div class="modal-header">
              <h5 class="modal-title text-right h4" id="exampleModalLabel">Why should you join the E-Club?</h5>
            </div>
            <div class="modal-body">
              <div class="modal-text">
                  Lorem ipsum dolor sit amet consectetur, adipisicing elit. Assumenda, minima non id ducimus at dolor obcaecati tempore corporis quisquam corrupti nostrum eveniet recusandae nihil. Eos sequi alias a autem. Placeat!
              </div>
              <div class="modal-text">
                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Assumenda, minima non id ducimus at dolor obcaecati tempore corporis quisquam corrupti nostrum eveniet recusandae nihil. Eos sequi alias a autem. Placeat!
            </div>
            <div class="modal-text">
                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Assumenda, minima non id ducimus at dolor obcaecati tempore corporis quisquam corrupti nostrum eveniet recusandae nihil. Eos sequi alias a autem. Placeat!
            </div>
            </div>
        </div>
    </div>

</div>

@endsection


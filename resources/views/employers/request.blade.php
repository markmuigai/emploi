@extends('layouts.general-layout')

@section('title','Make Request')
@section('description')
Request Professionals Emploi and reach an audience of 100k+, get access to Premium Shortlisting tools and Candidate Ranking algorithims. Request professional in two minutes.
@endsection


@section('content')


<div class="row">
    <div class="col-md-6 mx-auto">
        @if(session()->has('msg'))
            <div class="alert alert-success">
            {!! session()->get('msg') !!}
            </div>
        @endif
        <div class="modal-content mt-4 pb-2 shadow-lg">
            <div class="modal-header">
              <h5 class="modal-title text-right h4 mx-auto" id="exampleModalLabel">Request for Part-Timer</h5>
            </div>
            <div class="modal-body container bg-light">
              <!-- subscribe form for Professional -->
                <form method="POST"  enctype="multipart/form-data" action="/employers/request-professional">
                  @csrf
                    <?php
                    $fname = '';
                    $lname = '';
                    $email = '';
                    $phone = '';

                    if(isset(Auth::user()->id))
                    {
                      $full_name = Auth::user()->name;
                      $full_name = explode(" ", $full_name);
                      $fname = $full_name[0];
                      $lname = isset($full_name[1]) ? $full_name[1] : '';
                      $email = Auth::user()->email;
                      if(Auth::user()->role == 'employer')
                      $phone = Auth::user()->employer->contact_phone ? : '';
                    }

                    ?>
                  <div class="row">
                    <div class="form-group col-md-6">
                      <label class="h6">First Name <b style="color: red" title="Required">*</b></label>
                      <input type="text" class="form-control" name="firstname" required="" placeholder="First Name" value="{{ $fname }}">
                    </div>
                    <div class="form-group col-md-6">
                      <label class="h6">Last Name <b style="color: red" title="Required">*</b></label>
                      <input type="text" class="form-control" name="lastname" required="" placeholder="Last Name" value="{{ $lname }}">
                    </div>
                  </div>
                  
        
                  <div class="row">
                    <div class="form-group col-md-6">
                      <label class="h6">Email Address <b style="color: red" title="Required">*</b></label>
                      <input type="email" class="form-control" name="email" required="" placeholder="Email" value="{{ $email }}">
                    </div>
                    <div class="form-group col-md-6">
                      <label class="h6">Phone Number <b style="color: red" title="Required">*</b></label>
                      <input type="number" class="form-control" name="phone_number" required="" placeholder="Phone" value="{{ $phone }}">
                    </div>
                  </div>

                  <div class="row">
                    <div class="form-group col-md-4">
                      <label class="h6">Company Name <b style="color: red" title="Required">*</b></label>
                      <input type="text" class="form-control" name="company" required="" placeholder="Company name" value="{{ $fname }}">
                    </div>

                    <div class="form-group col-md-6">
                      <label class="h6">Job Title<b style="color: red">*</b></label>
                      <input type="text" class="form-control" name="task_title" required="" placeholder="Enter job title">
                    </div>

                     <div class="form-group col-md-2">
                   <label>Positions<b style="color: red">*</b></label>
                    <select name="positions" class="form-control">
                        @for($i=1; $i<=20;$i++ ) <option value="{{ $i }}">{{ $i }}</option>
                        @endfor
                    </select>
                    </div>
                  </div>
        
                  <div class="row">
                    <div class="form-group col-md-12">
                      <label class="h6">Job Description</label>
                      <textarea class="form-control" name="task_description" placeholder="brief description about the job"></textarea>
                    </div>

                    <div class="form-group col-md-6">
                      <label class="h6">Field Of Expertise</label>
                        <select id="industry" name="industry" class="form-control input-sm">
                          <option disabled selected value> -- select an option -- </option>
                          <option value="3">Accounting and Audit</option>
                          <option value="17">Marketing,Communications and PR</option>
                          <option value="9">Customer Service</option>
                          <option value="12">Human Resources</option>
                          <option value="6">Engineering</option>
                          <option value="14">Legal</option>
                          <option value="13">IT</option>
                          <option value="8">Graphic design</option>
                          <option value="29">Sales</option>
                          <option value="1">Administration and Operations</option>
                          <option value="13">Data Entry</option>
                          <option value="32">Other</option>                
                        </select>
                    </div>
          
                      <div class="form-group col-md-6">
                        <label class="h6">Salary <b style="color: red" title="Required">*</b></label>
                        <input type="number" class="form-control" name="salary" required="" placeholder="Salary">
                      </div>


                  </div>
        
                  <div class="modal-footer">
                    <input type="submit" class="btn" style="background-color: #E15419; color: white;" name="button" value="Submit">
                  </div>
        
                </form>
            </div>
        </div>
    </div>

</div>

@endsection


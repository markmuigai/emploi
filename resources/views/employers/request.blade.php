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
                <form method="POST"  enctype="multipart/form-data" action="/employers/request-professional">
                  @csrf
                    <?php
                    $fname = '';
                    $lname = '';
                    $email = '';
                    $phone = '';

                    if(isset(Auth::user()->id) && Auth::user()->role == 'employer')
                    {
                      $full_name = Auth::user()->name;
                      $full_name = explode(" ", $full_name);
                      $fname = $full_name[0];
                      $lname = isset($full_name[1]) ? $full_name[1] : '';
                      $email = Auth::user()->email;
                      $phone = Auth::user()->employer->contact_phone ? : '';
                    }

                    ?>
                  <div class="form-group">
                    <label class="h6">First Name <b style="color: red" title="Required">*</b></label>
                    <input type="text" class="form-control" name="firstname" required="" placeholder="First Name" value="{{ $fname }}">
                  </div>
                  <div class="form-group">
                    <label class="h6">Last Name <b style="color: red" title="Required">*</b></label>
                    <input type="text" class="form-control" name="lastname" required="" placeholder="Last Name" value="{{ $lname }}">
                  </div>
        
                  <div class="form-group">
                    <label class="h6">Email Address <b style="color: red" title="Required">*</b></label>
                    <input type="email" class="form-control" name="email" required="" placeholder="Email" value="{{ $email }}">
                  </div>
                  <div class="form-group">
                    <label class="h6">Phone Number <b style="color: red" title="Required">*</b></label>
                    <input type="text" class="form-control" name="phone_number" required="" placeholder="Phone" value="{{ $phone }}">
                  </div>
                  <div class="form-group">
                    <label class="h6">Company Name</label>
                    <input type="text" class="form-control" name="company" required="" placeholder="Company name" value="{{ $fname }}">
                  </div>

                  <div class="form-group">
                    <label class="h6">Task <b style="color: red">*</b></label>
                    <input type="text" class="form-control" name="task_title" required="" placeholder="task title">
                  </div>
        
                  <div class="form-group">
                    <label class="h6">Task Description</label>
                    <textarea class="form-control" name="task_description" placeholder="brief description about the task"></textarea>
                  </div>

                  <div class="form-group">
                    <label class="h6">Industry</label>
                      <select path="industry" id="industry" name="industry" class="form-control input-sm">
                        <option disabled selected value> -- select an option -- </option>
                        @foreach($industries as $c)
                        <option value="{{ $c->id }}" @if(old('industry') && old('industry')==$c->id)
                        selected=""
                        @endif
                        >{{ $c->name }}</option>
                        @endforeach
                      </select>
                  </div>
        
                  <div class="form-group">
                    <label class="h6">Salary <b style="color: red" title="Required">*</b></label>
                    <input type="text" class="form-control" name="salary" required="" placeholder="Salary">
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


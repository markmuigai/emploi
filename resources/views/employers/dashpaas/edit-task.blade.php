@extends('layouts.general-layout')

@section('title','Edit Request')
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
                <form method="POST"  enctype="multipart/form-data" action="/employers/edit-task/{{ $task->slug }}">
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
                      <input type="text" class="form-control" name="phone_number" required="" placeholder="Phone" value="{{ $phone }}">
                    </div>
                  </div>

                  <div class="row">
                    <div class="form-group col-md-4">
                      <label class="h6">Company Name <b style="color: red" title="Required">*</b></label>
                      <input type="text" class="form-control" name="company" required="" placeholder="Company name" value="{{ $task->company }}">
                    </div>

                    <div class="form-group col-md-6">
                      <label class="h6">Job Title<b style="color: red">*</b></label>
                      <input type="text" class="form-control" name="task_title" required="" placeholder="Enter job title" value="{{ $task->title }}">
                    </div>

                     <div class="form-group col-md-2">
                      <label>Positions<b style="color: red">*</b></label>
                      <select name="positions" class="form-control">
                          @for($i=1; $i<21;$i++ ) <option value="{{ $i }}" {{ $i == $task->positions ? 'selected="selected"' : '' }}>{{ $i }}</option>
                              @endfor
                      </select>
                    </div>
                  </div>
        
                  <div class="row">
                    <div class="form-group col-md-12">
                      <label class="h6">Job Description</label>
                      <textarea class="form-control" name="task_description" placeholder="brief description about the job">{{ $task->description }}</textarea>
                    </div>

                    <div class="form-group col-md-6">
                      <label class="h6">Field Of Expertise</label>
                      <select path="industry" id="industry" name="industry" class="form-control input-sm">
                        @foreach($industries as $c)
                        <option value="{{ $c->id }}" @if($c->id == $task->industry)
                            selected=""
                            @endif
                            >{{ $c->name }}</option>
                        @endforeach
                      </select>
                    </div>
          
                      <div class="form-group col-md-6">
                        <label class="h6">Salary <b style="color: red" title="Required">*</b></label>
                        <input type="text" class="form-control" name="salary" required="" placeholder="Salary" value="{{ $task->salary }}">
                      </div>


                  </div>
        
                  <div class="modal-footer row d-flex">
                    <a href="{{ url()->previous() }}" class="btn" style="background-color: #E15419; color:white;">
                    <i class="fa fa-arrow-left"></i> Back
                    </a>
                    <input type="submit" class="btn" style="background-color: #E15419; color: white;" name="button">

                  </div>
        
                </form>
            </div>
        </div>
    </div>

</div>

@endsection


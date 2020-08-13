@extends('layouts.general-layout')

@section('title','Sign Up as Part-timer')
@section('description')
Get Hired as a Professional by joining the Golden Club..
@endsection


@section('content')


<div class="row container">
    <div class="col-md-5 align-right pt-4 pb-4 pl-4">
        <div class="modal-content shadow-lg">
            <div class="modal-header">
              <h5 class="modal-title text-center h4 mx-auto" id="exampleModalLabel">Join Golden Club for Exclusive Jobs.</h5>
            </div>
            <div class="modal-body bg-light">
              <!-- subscribe form for Professional -->
                <form method="POST"  enctype="multipart/form-data" action="/job-seekers/subscribe-paas">
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
                    <label class="h5">Industry</label>
                      <select path="industry" id="industry" name="industry" class="form-control input-sm">
                        @foreach($industries as $c)
                        <option value="{{ $c->id }}" @if(old('industry') && old('industry')==$c->id)
                        selected=""
                        @endif
                        >{{ $c->name }}</option>
                        @endforeach
                      </select>
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
        <div class="modal-content bg-light shadow-lg">
            <div class="modal-header">
              <h5 class="modal-title text-right h4" id="exampleModalLabel">Why should you join the Golden Club?</h5>
            </div>
            <div class="modal-body">
              <div class="card shadow">
                <div class="card-text p-1 h5">
                  <ul>
                    <li>Top quality performance: KPI & performance appraisal framework.</li><br>
                    <li>Access to profession-based training and development opportunities.</li><br>
                    <li>Increased chances for eventual permanent employment.</li><br>
                    <li>Guaranteed income after a successful placement.</li><br>
                    <li>Great networking opportunities with top employers.</li>
                  </ul>
                </div>
              </div>
            </div>

            <div class="modal-body mx-auto">
              <div class="shadow">
                <a href="/job-seekers/paas" style="color: white" class="btn btn-orange">Read More</a>
              </div>
            </div>
        </div>
    </div>

</div>

@endsection


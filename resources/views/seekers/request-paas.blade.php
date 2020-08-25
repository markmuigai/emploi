@extends('layouts.general-layout')

@section('title','Sign Up as Part-timer')
@section('description')
Get Hired as a Professional by joining the Golden Club..
@endsection


@section('content')


<style type="text/css">
    .blink{
    padding: 10px;  
    color: white;
    text-align: center;
  }
  .span{
    font-size: 28px;
    font-family: cursive;
    color: #E15419;
    animation: blink 1s linear infinite;
  }
  @keyframes blink{
  0%{opacity: 0;}
  50%{opacity: .5;}
  100%{opacity: 1;}
  }
</style>
<div class="row container mx-auto">
    <div class="col-md-8 align-right mx-auto pt-4 pb-4">
          @if(session()->has('fail'))
              <div class="alert alert-success">
              {{ session()->get('fail') }}
              </div>
          @endif
        <div class="modal-content shadow-lg">
            <div class="modal-header">            
              <h5 class="modal-title text-center h4 mx-auto" id="exampleModalLabel">Join Golden Club for Exclusive Jobs.</h5>
            </div>
            <div class="blink pt-4"><a href="/job-seekers/register-paas" style="text-decoration: none;"><span class="span">Free For One Month</span></a></div>
            <div class="modal-body bg-light">
              <!-- subscribe form for Professional -->
                <form method="POST"  enctype="multipart/form-data" action="/job-seekers/subscribe-paas">
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
                      if(Auth::user()->role == 'seeker')
                      $phone = Auth::user()->seeker->phone_number ? : '';
                    }

                    ?>
                  <div class="form-group">
                    <label class="h5">First Name</label>
                    <input type="text" class="form-control" name="firstname" required="" placeholder="First Name"  value="{{ $fname }}">
                  </div>
                  <div class="form-group">
                    <label class="h5">Last Name</label>
                    <input type="text" class="form-control" name="lastname" required="" placeholder="Last Name"  value="{{ $lname }}">
                  </div>
        
                  <div class="form-group">
                    <label class="h5">Email Address</label>
                    <input type="email" class="form-control" name="email" required="" placeholder="Email"  value="{{ $email }}">
                  </div>
                  <div class="form-group">
                    <label class="h5">Phone Number</label>
                    <input type="text" class="form-control" name="phone_number" required="" placeholder="Phone" value="{{ $phone }}">
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
                  </div>
        
                </form>
            </div>
        </div>
    </div>

</div>

@endsection


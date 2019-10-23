@extends('layouts.seek')

@section('title','Emploi :: Login')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')

@include('seekers.search-input') 
 
<div class="container">
    <div class="single">  
       <div class="col-md-4">
          @include('left-bar')
          
     </div>
     <div class="col-md-8 single_right">
           <div class="login-form-section">
                <div class="login-content">
                    <form method="post" action="{{ route('login') }}">
                        @csrf
                        <div class="section-title">
                            <h3>Log in to your Account</h3>
                        </div>
                        <div class="textbox-wrap">
                            <div class="input-group">
                                <span class="input-group-addon "><i class="fa fa-user"></i></span>
                                <input type="text" name="username" required="required" class="form-control" placeholder="Username">
                            </div>
                        </div>
                        <div class="textbox-wrap">
                            <div class="input-group">
                                <span class="input-group-addon "><i class="fa fa-key"></i></span>
                                <input type="password" name="password" required="required" class="form-control " placeholder="Password">
                            </div>
                        </div>
                     
                     <div class="forgot">
                         <div class="login-check">
                            <label class="checkbox1">

                                <input type="checkbox" name="remember" checked=""><i> </i>
                                Remember me
                            </label>
                         </div>
                          <div class="login-para">
                            <p><a href="{{ route('password.request') }}"> Password reset </a></p>
                         </div>
                         <div class="clearfix"> </div>
                    </div>
                    <div class="login-btn">
                       <input type="submit" value="Log in">
                    </div>
                    </form>
                    <div class="login-bottom">
                     <p style="display: none;">With your social media account</p>
                     <div class="social-icons">
                        <div class="button" style="display: none;">
                            <a class="tw" href="#"> <i class="fa fa-linkedin tw2"> </i><span>Linkedin</span>
                            <div class="clearfix"> </div></a>
                            <a class="fa" href="#"> <i class="fa fa-facebook tw2"> </i><span>Facebook</span>
                            <div class="clearfix"> </div></a>
                            <a class="go" href="#"><i class="fa fa-google tw2"> </i><span>Google</span>
                            <div class="clearfix"> </div></a>
                            <div class="clearfix"> </div>
                        </div>
                        <h4>Don,t have an Account? <a href="{{ route('register') }}"> Register Now!</a></h4>
                     </div>
                   </div>
                </div>
         </div>
   </div>
  <div class="clearfix"> </div>
 </div>
</div>

@endsection
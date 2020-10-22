@extends('v2.layouts.self-review')
@section('title','Emploi :: Self Assessment' )
@section('content')
    <!-- Navbar -->
    @include('v2.components.jobseeker.navbar')
    <!-- End Navbar -->
        <!-- Resume -->
        <main>
            <div id="form_container">
                <div class="row">
                    <div class="col-lg-12">
                        <div id="wizard_container">
                            <div id="top-wizard">
                                <div id="progressbar"></div>
                            </div>
                            <!-- /top-wizard -->
                
                            <form name="example-1" id="wrapped"  action="/self-assessment" method="POST">
                                 
                                <input id="website" name="website" type="text" value="">
                                <!-- Leave for security protection, read docs for details -->
                                <div id="middle-wizard">

                                    @foreach($questions as $question)
                                    <div class="step">                                         
                                        <div class="row">                                                      
                                            <div class="col-lg-5">
                                                <div id="left_form">                                     
                                                    <h2>Title e.g Numeric Test</h2>
                                                    <p>{{ $question->title }}</p>
                                                    <a href="index.html#0" id="more_info" data-toggle="modal" data-target="#more-info"><i class="pe-7s-info"></i></a>
                                                </div>
                                            </div>
                                            <div class="col-md-7 right-form">
                                                <h3 class="main_question"><strong>{{ $question->id }}</strong>Please fill with your details</h3>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <input type="text" name="firstname" class="form-control" placeholder="First name">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <input type="text" name="lastname" class="form-control" placeholder="Last name">
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- /row -->
            
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <input type="email" name="email" class="form-control" placeholder="Your Email">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <input type="text" name="telephone" class="form-control" placeholder="Your Telephone">
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- /row -->
            
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <input type="text" name="age" class="form-control" placeholder="Age">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group radio_input">
                                                            <label><input type="radio" value="Male" checked name="gender" class="icheck">Male</label>
                                                            <label><input type="radio" value="Female" name="gender" class="icheck">Female</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- /row -->
                                            </div>
                                        </div>                                      
                                    </div>
                                      @endforeach                              
                
                        
                                </div>
                                <!-- /middle-wizard -->
                                <div id="bottom-wizard">
                                    <button type="button" name="backward" class="backward">Backward </button>
                                    <button type="button" name="forward" class="forward">Forward</button>
                                    <button type="submit" name="process" class="submit">Submit</button>
                                </div>
                             
                                <!-- /bottom-wizard -->
                            </form>                                            
                        </div>
                        <!-- /Wizard container -->
                    </div>
                </div><!-- /Row -->
            </div><!-- /Form_container -->
           
        </main>
@endsection
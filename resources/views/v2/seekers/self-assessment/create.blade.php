@extends('v2.layouts.app')

@section('content')
    <!-- Navbar -->
    @include('v2.components.jobseeker.navbar')
    <!-- End Navbar -->
        <!-- Resume -->
        <main>
            <div id="form_container">
                <div class="row">
                    <div class="col-lg-5">
                        <div id="left_form">
                            <h2>Registration</h2>
                            <p>Tation argumentum et usu, dicit viderer evertitur te has. Eu dictas concludaturque usu, facete detracto patrioque an per, lucilius pertinacia eu vel.</p>
                            <a href="index.html#0" id="more_info" data-toggle="modal" data-target="#more-info"><i class="pe-7s-info"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-7">
    
                        <div id="wizard_container">
                            <div id="top-wizard">
                                <div id="progressbar"></div>
                            </div>
                            <!-- /top-wizard -->
                            <form name="example-1" id="wrapped" method="POST">
                                <input id="website" name="website" type="text" value="">
                                <!-- Leave for security protection, read docs for details -->
                                <div id="middle-wizard">
    
                                    <div class="step">
                                        <h3 class="main_question"><strong>1/3</strong>Please fill with your details</h3>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <input type="text" name="firstname" class="form-control required" placeholder="First name">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <input type="text" name="lastname" class="form-control required" placeholder="Last name">
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /row -->
    
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <input type="email" name="email" class="form-control required" placeholder="Your Email">
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
                                    <!-- /step-->
    
                                    <div class="step">
                                        <h3 class="main_question"><strong>2/3</strong>Please fill with additional info</h3>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input type="text" name="address" class="form-control required" placeholder="Address">
                                                </div>
                                            </div>
                                            <!-- /col-sm-12 -->
                                        </div>
                                        <!-- /row -->
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <input type="text" name="city" class="form-control required" placeholder="City">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <input type="text" name="zip_code" class="form-control required" placeholder="Zip code">
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /row -->
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <div class="styled-select">
                                                        <select class="required" name="country">
                                                            <option value="" selected>Select your country</option>
                                                            <option value="Europe">Europe</option>
                                                            <option value="Asia">Asia</option>
                                                            <option value="North America">North America</option>
                                                            <option value="South America">South America</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /row -->
                                    </div>
                                    <!-- /step-->
    
                                    <div class="submit step">
                                        <h3 class="main_question"><strong>3/3</strong>Send an optional message</h3>
                                        <div class="form-group">
                                            <textarea name="additional_message" class="form-control" style="height:150px;" placeholder="Hello world....write your messagere here!"></textarea>
                                        </div>
                                        <div class="form-group terms">
                                            <input name="terms" type="checkbox" class="icheck required" value="yes">
                                            <label>Please accept <a href="index.html#" data-toggle="modal" data-target="#terms-txt">terms and conditions</a> ?</label>
                                        </div>
                                    </div>
                                    <!-- /step-->
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
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
                
                            <form method="POST" name="" id="wrapped"  action="/self-assessment" enctype="multipart/form-data">
                                @csrf
                                 
                                <input id="website" name="website" type="text" value="">
                                <!-- Leave for security protection, read docs for details -->
                                <div id="middle-wizard">

                                    @foreach($questions as $question)
                                    <div class="step">                                         
                                        <div class="row">                                                      
                                            <div class="col-lg-5">
                                                <div id="left_form">                                     
                                                    <h2>Question</h2>
                                                    <p>{{ $question->title }}</p>
                                                    <a href="index.html#0" id="more_info" data-toggle="modal" data-target="#more-info"><i class="pe-7s-info"></i></a>
                                                </div>
                                            </div>
                                            <div class="col-md-7 right-form">
                                                <h3 class="main_question"><strong>{{ $question->id }}</strong>Select the right answer</h3>
                                                <div class="col-md-12">
                                                    @forelse($question->choices as $c)
                                                    <input type="radio" name="choices" id="{{ $c->id }}">  {{ $c->value }}<br>
                                                    @empty
                                                    @endforelse
                                                </div>                                 
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
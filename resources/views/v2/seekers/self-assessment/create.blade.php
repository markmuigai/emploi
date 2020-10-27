@extends('v2.layouts.self-review')
@section('title','Emploi :: Self Assessment' )
@section('content')
    <!-- Navbar -->
    
    <h3 class="text-center pt-100">Self Assessment</h3>
    <!-- End Navbar -->
        <!-- Resume -->
        <main>
            <div id="form_container">
                <div class="row">
                    <div class="col-lg-12">
                        @include('v2.components.jobseeker.navbar')
                        <div id="wizard_container">
                            <div id="top-wizard">
                                <div id="progressbar"></div>
                            </div>
                            <!-- /top-wizard -->
                            <form method="POST" action="{{Route('v2.self-assessment.store', ['email' => request()->email])}}" enctype="multipart/form-data">
                                @csrf
                                <input id="website" name="website" type="text" value="">
                                <!-- Leave for security protection, read docs for details -->
                                <div id="middle-wizard">
                                    @foreach($questions as $key => $question)
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
                                                <h3 class="main_question"><strong>{{($key+1)."/".$questions->count()}}</strong>Select the right answer</h3>
                                                <div class="col-md-12">
                                                    @forelse($question->choices as $c)
                                                    <input type="radio" name="choices[{{$question->id}}][]" value={{ $c->id }}> {{ $c->value }}<br>
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
                                    <button type="button" id="backward" name="backward" class="backward">Previous</button>
                                    <button type="button" id="forward" name="forward" class="forward">Next</button>
                                    <button type="submit" class="submit-custom" id="submitBtn">Submit</button>
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

@section('js')
    <script>
        $().ready(function(){

            var max = {!! json_encode($questions->count()) !!};

            var counter = 1
            
            $("#backward").click(function() {
                counter--
                
                $('#submitBtn').css('display', 'none')
            });

            $("#forward").click(function() {
                if(counter==(max-1)){
                    console.log(counter)
                    counter++
                    $('#submitBtn').css('display', 'inline-block')
                }else{
                    console.log(counter)
                    counter++
                }
            });

            var submit_clicked = false;

            $('#submitBtn').click(function(){
                    submit_clicked = true;
                });

            window.onbeforeunload = function() {
                if (submit_clicked === false){
                return "Are you sure you want to leave? Changes will not be saved!";
                }
            }
        });
</script>
@endsection
@extends('v2.layouts.app')
@section('title','Emploi :: Self Assessment' )
@section('content')
    <!-- Navbar -->
    @include('v2.components.jobseeker.navbar')    
    <!-- End Navbar -->
    <div class="pt-100 pb-70 px-4">
        <h3 class="text-center my-4">Self Assessment</h3>
        <div class="row justify-content-center">
            <div class="col-md-8 col-sm-12">
                <div class="container shadow p-3 mb-5 bg-white rounded px-5">
                    <h5 class="py-2">Select the correct answer</h5>
                    <form method="POST" action="{{Route('v2.self-assessment.store', ['email' => request()->email])}}" enctype="multipart/form-data">
                        @csrf
                        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                                @foreach($questions as $key => $question)
                                <div class="caurosel-item">
                                    <p class="">{{ ($key+1).'. '.$question->title }}</p>
                                    <div class="ml-3">
                                        @forelse($question->choices as $c)
                                            <input type="radio" class="assessment-choice" name="choices[{{$question->id}}][]" value={{ $c->id }}> {{ $c->value }}<br>
                                        @empty
                                        @endforelse 
                                    </div>
                                </div>                                                                 
                                @endforeach 
                            </div>
                            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                            </a>
                        </div>
                        <div class="py-3">
                            <button type="button" id="backward" name="backward" class="btn btn-primary backward">Previous</button>
                            <button type="button" id="forward" name="forward" class="btn btn-primary forward">Next</button>
                            <button type="submit" class="btn btn-success submit-custom" id="submitBtn">Submit</button>
                        </div>
                    </form>
                </div>       
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        $().ready(function(){
            $('#forward').attr('disabled',true);

            $('.assessment-choice').click(function() {
                $('#forward').css('display', 'inline-block')
            });

            $('.assessment-choice').on('change', function () {
                $('#forward').prop('disabled', !$(this).val());
            }).trigger('change');


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
                    $('#forward').css('display', 'none')
                    console.log(counter)
                    counter++
                }
            });

            // var submit_clicked = false;

            // $('#submitBtn').click(function(){
            //         submit_clicked = true;
            //     });

            // window.onbeforeunload = function() {
            //     if (submit_clicked === false){
            //     return "Are you sure you want to leave? Changes will not be saved!";
            //     }
            // }
        });
</script>
@endsection
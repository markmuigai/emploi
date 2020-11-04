@extends('v2.layouts.app')

@section('title','Self Assessment :: Emploi')

@section('content')
    <!-- Navbar -->
    @include('v2.components.jobseeker.navbar')    
    <!-- End Navbar -->
    <div class="assessment-section pt-100 pb-70 px-4">
        <h3 class="text-center my-4">Self Assessment</h3>
        <div class="row justify-content-center">
            <div class="col-md-8 col-sm-12">
                <div class="container shadow p-3 mb-5 bg-white rounded px-5">
                    <h5 class="py-2">Select the correct answer</h5>
                    <form method="POST" action="{{Route('v2.self-assessment.store', ['email' => request()->email])}}" enctype="multipart/form-data">
                        @csrf
                        <div id="carouselExampleControls" id="assessment-carousel" class="carousel assessment-carousel slide" data-ride="carousel">
                            <div class="carousel-inner mb-5">
                                @foreach($questions as $key => $question)
                                <div class="carousel-item {{$key == 0 ? 'active' : ''}}">
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
            // Intitalize carousel
            $('.assessment-carousel').carousel({
                interval: false
            })

            var max = {!! json_encode($questions->count()) !!};

            var counter = 1

            // Disable next
            $('.assessment-choice').click(function() {
                if(counter!==(max))
                    $('#forward').css('display', 'inline-block')
            });

            $("#backward").click(function() {
                $('.assessment-carousel').carousel('prev')
            });

            $("#forward").click(function() {
                $('.assessment-carousel').carousel('next')
            });

            $('.assessment-carousel').on('slid.bs.carousel',function (event) {
                if(event.direction == 'left'){
                    console.log('next')
                    $('#backward').css('display', 'inline-block')
                    $('#forward').css('display', 'none')

                    if(counter==(max-1)){
                        console.log(counter)
                        counter++
                        $('#submitBtn').css('display', 'inline-block')
                        $('#forward').css('display', 'none')
                    }else{
                        // $('#forward').css('display', 'none')
                        console.log(counter)
                        counter++
                    }
                }else{
                    counter--
                    console.log('prev')
                    if(counter == 1)
                        $('#backward').css('display', 'none');
                        $('#forward').css('display', 'inline-block')
                    if(counter < (max-1))
                        console.log('max')
                        $('#submitBtn').css('display', 'none')
                    console.log(counter)
                }    
            })

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
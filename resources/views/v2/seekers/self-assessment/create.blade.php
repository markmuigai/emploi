@extends('v2.layouts.app')

@section('title','Self Assessment :: Emploi')

@section('content')
    <!-- Navbar -->
    @include('v2.components.jobseeker.navbar')    
    <!-- End Navbar -->
    <div class="assessment-section pt-100 pb-70 px-4">
        <h3 class="text-center my-2">Self Assessment</h3>
        <div class="row justify-content-center">
            <div class="col-md-8 col-sm-12">
                <div class="container shadow p-3 mb-5 bg-white rounded px-5">
                    <div class="row justify-content-between">
                        <div class="col-md-6">
                            <h5 class="py-2">Select the correct answer</h5>
                        </div>
                        <div class="col-md-4">
                            <h4 id="assessmentTimer" class="text-danger float-right">
                                
                            </h4>
                        </div>
                    </div>
                    <form id="assessmentForm" method="POST" action="{{Route('v2.self-assessment.store', ['email' => request()->email, 'questions' => $questions->pluck('id')->toArray()])}}" enctype="multipart/form-data">
                        @csrf
                        <div id="carouselExampleControls" id="assessment-carousel" class="carousel assessment-carousel slide" data-ride="carousel">
                            <div class="carousel-inner mb-5">
                                @foreach($questions as $key => $question)
                                <div class="carousel-item {{$key == 0 ? 'active' : ''}}">
                                    <div class="ml-3">
                                        @if (isset($question->image))
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <p class="">{{ ($key+1).'. '.$question->title }}</p>
                                                    <img src="/storage/assessments/{{$question->id}}" height="auto" width="400px" alt="">
                                                </div>
                                                <div class="col-md-4">
                                                    <p class="">Select the correct option</p>
                                                    <div class="form-check mr-3">
                                                        <input class="assessment-choice" type="radio" name="choices[{{$question->id}}]" value="a">
                                                        <label class="form-check-label" for="exampleRadios1">
                                                            A
                                                        </label>
                                                    </div>
                                                    <div class="form-check mr-3">
                                                        <input class="assessment-choice" type="radio" name="choices[{{$question->id}}]" value="b">
                                                        <label class="form-check-label" for="exampleRadios1">
                                                            B
                                                        </label>
                                                    </div>
                                                    <div class="form-check mr-3">
                                                        <input class="assessment-choice" type="radio" name="choices[{{$question->id}}]" value="c">
                                                        <label class="form-check-label" for="exampleRadios1">
                                                            C
                                                        </label>
                                                    </div>
                                                    <div class="form-check mr-3">
                                                        <input class="assessment-choice" type="radio" name="choices[{{$question->id}}]" value="d">
                                                        <label class="form-check-label" for="exampleRadios1">
                                                            D
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        @else
                                        <p class="">{{ ($key+1).'. '.$question->title }}</p>
                                            @forelse($question->choices as $c)
                                                <input type="radio" class="assessment-choice" name="choices[{{$question->id}}][]" value={{ $c->id }}> {{ $c->value }}<br>
                                            @empty
                                            @endforelse 
                                        @endif
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
            var dt = new Date();
            dt.setMinutes( dt.getMinutes() + 10 );
            // Set the date we're counting down to
            var countDownDate = dt.getTime();

            // Update the count down every 1 second
            var x = setInterval(function() {

            // Get today's date and time
            var now = new Date().getTime();

            // Find the distance between now and the count down date
            var distance = countDownDate - now;

            // Time calculations for days, hours, minutes and seconds
            var days = Math.floor(distance / (1000 * 60 * 60 * 24));
            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);

            // Display the result in the element with id="assessmentTimer"
            document.getElementById("assessmentTimer").innerHTML = minutes + "m " + seconds + "s ";

            // If the count down is finished, write some text
            if (distance < 0) {
                clearInterval(x);
                document.getElementById("assessmentForm").submit()
            }
            }, 1000);

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
                if (submit_clicked === false && distance > 0 ){
                return "Are you sure you want to leave? Changes will not be saved!";
                }
            }
        });
</script>
@endsection
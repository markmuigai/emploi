@extends('v2.layouts.app')

@section('title','Self Assessment :: Emploi')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
    <!-- Navbar -->
    @include('v2.components.jobseeker.navbar')    
    <!-- End Navbar -->
    <div class="assessment-section pt-100 pb-70 px-4">
        <h3 class="text-center my-2">Self Assessment</h3>
        <div class="row justify-content-center">
            <div class="col-md-8 col-sm-12">
                <div class="container shadow mb-5 bg-white rounded px-5">
                    <div class="row justify-content-between">
                        <div class="col-md-6">
                        </div>
                        <div class="col-md-4">
                            <h4 id="assessmentTimer" class="text-danger float-right">
                                
                            </h4>
                        </div>
                    </div>
                    <form id="assessmentForm" method="POST" action="{{Route('v2.self-assessment.store', ['slug' => request()->slug, 'type' =>request()->type, 'email' => request()->email, 'questions' => $questions->pluck('id')->toArray()])}}" enctype="multipart/form-data">
                        @csrf
                        <div id="carouselExampleControls" id="assessment-carousel" class="carousel assessment-carousel slide" data-ride="carousel">
                            <div class="carousel-inner mb-5">
                                <div class="carousel-item active p-2">
                                    <h4>Instructions</h4>
                                    <p> @if(request()->type == 'personality')
                                           Our Assessment uses a personality test to measure your characteristic patterns of traits.
                                        @else
                                            Our Self assessment uses an aptitude test to gauge an individual's reasoning capacity in
                                            different aspects.
                                        @endif
                                        <span class="text-danger">
                                            @if(request()->type == 'personality')
                                                You have 15 minutes to complete 10 personality questions.
                                            @else
                                                You have 15 minutes to complete 18 questions.
                                            @endif
                                        </span>
                                        <ul>
                                            <li>Select the correct choice to be able to proceed to the next question</li>
                                            <li>Once you have answered a question, you will be able to go back to change your previous answer.</li>
                                            <li>Do not refresh your browser as this may interfere with your test.</li>
                                        </ul>
                                    </p>
                                    
                                </div>
                                
                                @foreach($questions as $question_key => $question)
                                    <div class="carousel-item">
                                        <div class="ml-3">
                                            @if (isset($question->image))
                                                <div class="row">
                                                    <div class="col-md-8">
                                                        <p class="">{{ ($question_key+1).'. '.$question->title }}</p>
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
                                            <p class="">{{ ($question_key+1).'. '.$question->title }}</p>
                                                @forelse($question->choices as $choice_key => $c)
                                                    <input type="radio" class="assessment-choice" name="choices[{{$question->id}}][]" value={{ $c->id }}>
                                                    {{ $c->value }}<br>
                                                @empty
                                                @endforelse 
                                            @endif
                                        </div>
                                    </div>                                                                 
                                @endforeach 
                            </div>
                        </div>
                        <div class="py-3">
                            <button id="start" onclick="startAssessment()" type="button" class="btn btn-primary forward">Start Assessment</button>
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

            var max = {!! json_encode($questions->count() + 1) !!};

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
                if (submit_clicked == false ){
                return "Are you sure you want to leave? Changes will not be saved!";
                }
            }
        });

        function startAssessment(){
            // Show first question
            $('.assessment-carousel').carousel('next')

            // Hide start assessment button
            $('#start').css('display', 'none')

            // Start timer
            var dt = new Date();
            dt.setMinutes( dt.getMinutes() + 15 );
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
        }
</script>
@endsection
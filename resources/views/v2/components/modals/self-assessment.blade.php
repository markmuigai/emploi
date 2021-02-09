<div class="modal fade" id="selfAssessmentModal" tabindex="-1" role="dialog" aria-labelledby="selfAssessmentModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <h4 class="text-center mt-4">
                Select your details
            </h4>
                <div class="modal-body">
                <form method="POST" action="{{route('v2.self-assessment.filter')}}">
                @csrf
                <div class="job-filter-area pt-2">
                    <div class="container">
                        <form>
                            <div class="row">
                                <div class="col-sm-12 col-lg-12">
                                    
                                    <div class="form-group">
                                        <input type="email" name="email" required=""  class="form-control" maxlength="50" placeholder="Enter your email address" >
                                    </div>
                                </div>
                                <div class="col-sm-12 col-lg-12">
                                    <div class="form-group">
                                        <select name="industry" required="">
                                            <option value="">Select Your Industry</option>
                                            @foreach(\App\Industry::active() as $i)
                                                <option value="{{ $i->id }}">{{ $i->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-lg-12">
                                    <div class="form-group">
                                        <select name="experience" required="">
                                            <option value="">Your Experience Level</option>
                                            <option value="0">No Experience Required</option>
                                            <option value="6">6 month Experience</option>
                                            <option value="12">1 year Experience</option>
                                            <option value="24">2 years Experience</option>
                                            <option value="36">3 years Experience</option>
                                            <option value="48">4 years Experience</option>
                                            <option value="60">5 years Experience</option>
                                            <option value="72">6 years Experience</option>
                                            <option value="84">7 years Experience</option>
                                            <option value="96">8 years Experience</option>
                                            <option value="108">9 years Experience</option>
                                            <option value="120">10 years Experience</option>
                                            <option value="132">11 years Experience</option>
                                            <option value="144">12 years Experience</option>
                                            <option value="156">13 years Experience</option>
                                            <option value="168">14 years Experience</option>
                                            <option value="180">15 years Experience</option>
                                            <option value="192">16 years Experience</option>
                                            <option value="204">17 years Experience</option>
                                            <option value="216">18 years Experience</option>
                                            <option value="228">19 years Experience</option>
                                            <option value="240">20 years Experience</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-lg-12">
                                    <button type="submit" class="btn cmn-btn">
                                        Take Test
                                        <i class='bx bx-search-alt'></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </form>
            </div>
        </div>
    </div>
</div>
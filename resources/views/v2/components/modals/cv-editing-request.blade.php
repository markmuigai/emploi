<div class="modal fade" id="cvEditingRequest" tabindex="-1" role="dialog" aria-labelledby="cvEditingRequestLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <h4 class="text-center mt-4">
                Select your details
            </h4>
                <div class="modal-body">
                <form method="POST" action="/checkout">
                    @csrf
                    <div class="job-filter-area pt-2">
                        <div class="container">
                            <div class="row">
                                <div class="col-sm-12 col-lg-12">
                                    <div class="form-group">
                                        <select name="current_position" required="">
                                            <option value="">Your Current Job Posiion</option>
                                            <option value="graduate">Fresh Graduate</option>
                                            <option value="intern">Intern</option>
                                            <option value="manager">Manager</option>
                                            <option value="ceo">C.E.O</option>
                                            <option value="other">Other</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-lg-12">
                                    <div class="form-group">
                                        <select name="experience" required="">
                                            <option value="">Your Experience Level</option>
                                            <option value="0">Less than 1 year</option>
                                            @for ($i = 1; $i < 9; $i++)
                                                <option value="{{$i}}">{{$i}} years</option>    
                                            @endfor  
                                            <option value="9">More than 8 years</option>                            
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-lg-12">
                                    <button type="submit" class="btn cmn-btn">
                                        Proceed
                                        <i class='bx bx-right-arrow-alt'></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
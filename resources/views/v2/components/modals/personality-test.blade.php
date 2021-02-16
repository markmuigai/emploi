<div class="modal fade" id="personalityTestModal" tabindex="-1" role="dialog" aria-labelledby="pesronalityTestModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <h4 class="text-center mt-4">
                Enter your details
            </h4>
                <div class="modal-body">
                <form method="post" action="{{route('v2.personality.practice')}}">
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
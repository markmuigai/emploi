
<h2><strong>{{ __('other.blast_off') }}</strong></h2>
<p>{{ $line }}</p>
<?php
$subcat = '';
if(isset(Auth::user()->id))
{
	if(isset(Auth::user()->seeker->industry_id))
		$subcat = Auth::user()->seeker->industry->slug;
	else
		$subcat = 'featured';
}

?>
<p>
    <a href="#featured-vacancies" class="btn btn-orange px-4">{{ __('jobs.l_vacancies') }}</a>
    <br class="for-mobile"><br class="for-mobile">
     <a href="/job-seekers/free-cv-review" class="btn btn-white px-4">Request For Free CV Review</a>
</p>


      <div class="modal fade" id="myModal" role="dialog">
              <div class="modal-dialog">
              
                    <!-- Modal content-->
                    <div class="modal-content">
                          <div class="modal-header">
                           <!--  <button type="button" style="background-color: #FF5733" class="close" data-dismiss="modal">&times;</button> -->
                            <h4 class="orange">Request For Professional CV Editing</h4><br>                            
                          </div>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="closeCvEditRequestModal">
                              <i class="fas fa-times" aria-hidden="true"></i>
                          </button>
                          <div class="modal-body"> 

                                  <form method="POST"  enctype="multipart/form-data" action="/cv-editing" class="col-md-12">
                                    @csrf
                                    <div class="row">
                                      <div class="col-md-6">
                                        <p>
                                          <label style="color: #000">Name:</label>
                                          @error('name')
                                            <div class="text-center my-2 py-1 alert alert-danger" role="alert">
                                                Invalid name
                                            </div>
                                            @enderror
                                          <input type="text" name="name" required="" maxlength="50" class="form-control" value="{{ isset(Auth::user()->id) ? Auth::user()->name : old('name') }}">
                                        </p>
                                      </div>
                                          <div class="col-md-6">
                                        <p>
                                          <label style="color: #000">Phone Number:</label>
                                          @error('phone_number')
                                            <div class="text-center my-2 py-1 alert alert-danger" role="alert">
                                                Invalid phone number
                                            </div>
                                            @enderror
                                          <input type="number" name="phone_number" required="" maxlength="20" class="form-control" value="{{ old('phone_number') }}" placeholder="2547XXXXXXXX" required="">
                                        </p>
                                      </div>
                                    </div>
                                  <div class="row">
                                    <div class="col-md-6">
                                      <p>
                                        <label style="color: #000">Email:</label>
                                        @error('email')
                                          <div class="text-center my-2 py-1 alert alert-danger" role="alert">
                                              Invalid e-mail address
                                          </div>
                                          @enderror
                                        <input type="email" name="email" required="" maxlength="50" class="form-control" value="{{ isset(Auth::user()->id) ? Auth::user()->email : old('email') }}">
                                      </p>
                                    </div>
                                    <div class="col-md-6">
                                      <p>
                                        <label style="color: #000">Current CV: <small>.doc, .docx and .pdf - Max 5MB</small></label>
                                        @error('resume')
                                          <div class="text-center my-2 py-1 alert alert-danger" role="alert">
                                              Invalid resume uploaded
                                          </div>
                                          @enderror
                                        <input type="file" name="resume" required="" accept=".pdf, .doc, .docx">
                                      </p>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-md-6">
                                      <p>
                                        <label style="color: #000">Industry:</label>
                                        @error('industry')
                                          <div class="text-center my-2 py-1 alert alert-danger" role="alert">
                                              Invalid industry selected
                                          </div>
                                          @enderror
                                        <select name="industry" required="" class="form-control">
                                          <option disabled selected value> -- select an option -- </option>
                                          @forelse(\App\Industry::orderBy('name')->get() as $ind)                                     
                                          <option value="{{ $ind->id }}" {{ old('industry') == $ind->id ? 'selected=""' : '' }}>{{ $ind->name }}</option>
                                          @empty
                                          @endforelse
                                        </select>
                                      </p>
                                    </div>
                                    <div class="col-md-6">
                                      <p>
                                        <label style="color: #000">Message:</label>
                                        @error('message')
                                          <div class="text-center my-2 py-1 alert alert-danger" role="alert">
                                              Invalid message
                                          </div>
                                          @enderror
                                        <textarea class="form-control" placeholder="Optional message " maxlength="500" name="message">{{ old('message') }}</textarea>
                                      </p>
                                    </div>
                                  </div>
                                
                                          <p>
                                            <input type="submit" style="float: right;" class="btn btn-success" value="Submit">
                                          </p>
                                    <p>
                                      
                                      <a href="/job-seekers/summit" class="btn btn-orange-alt" target="_blank">Learn More</a>
                                      
                                    </p>
                                      
                                  </form>
                                </div>
                          </div>
                  </div>
        </div>
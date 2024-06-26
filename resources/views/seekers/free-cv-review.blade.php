@extends('layouts.general-layout')

@section('title','Emploi :: Free CV Review')

@section('description')
Get a free CV review from our Experts and stand out from the crowd.
@endsection

@section('content')
<div class="container py-5">
	<div class="text-center">
		<h2 class="orange text-center">Free CV Review</h2>
		<p>
			Get a Free CV Review plus <a href="/job-seekers/summit">a 50% discount on Cv edit</a> from our experts and stand out from the crowd
		</p>
	</div>
	

	
</div>

	<div class="row" >
		
		
		<form method="POST"  enctype="multipart/form-data" action="/cv-editing" class="col-md-8 offset-md-2">
			<input type="hidden" name="free_review" value="true">
			@csrf
			<p>
				<label>Name: <b style="color: red">*</b></label>
				@error('name')
			    <div class="text-center my-2 py-1 alert alert-danger" role="alert">
			        Invalid name
			    </div>
			    @enderror
				<input type="text" name="name" required="" maxlength="50" class="form-control" value="{{ isset(Auth::user()->id) ? Auth::user()->name : old('name') }}">
			</p>
			<p>
				<label>Phone Number: <b style="color: red">*</b></label>
				@error('phone_number')
			    <div class="text-center my-2 py-1 alert alert-danger" role="alert">
			        Invalid phone number
			    </div>
			    @enderror
				<input type="number" name="phone_number" required="" maxlength="20" class="form-control" value="{{ old('phone_number') }}" placeholder="2547XXXXXXXX" required="">
			</p>
			<p>
				<label>Email: <b style="color: red">*</b></label>
				@error('email')
			    <div class="text-center my-2 py-1 alert alert-danger" role="alert">
			        Invalid e-mail address
			    </div>
			    @enderror
				<input type="email" name="email" required="" maxlength="50" class="form-control" value="{{ isset(Auth::user()->id) ? Auth::user()->email : old('email') }}">
			</p>
			<p>
				<label>Current CV: <b style="color: red">*</b> <small>.doc, .docx and .pdf - Max 5MB</small> </label>
				@error('resume')
			    <div class="text-center my-2 py-1 alert alert-danger" role="alert">
			        Invalid resume uploaded
			    </div>
			    @enderror
				<input type="file" name="resume" required="" accept=".pdf, .doc, .docx">
			</p>
			<p>
				<label>Industry: <b style="color: red">*</b></label>
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

			<p>
              <label class="h6">Experience: <b style="color: red">*</b> </label>
	                <select id="experience" name="experience" required="" class="form-control">
	                  <option disabled selected value> -- select an option -- </option>
	                  <option value="0">No Experience/Less than 1 year</option>
	                  <option value="1">1 Year</option>
	                  <option value="2">2 Years</option>
	                  <option value="3">3 Years</option>
	                  <option value="4">4 Years</option>
	                  <option value="5">5 Years</option>
	                  <option value="6">6 Years</option>
	                  <option value="7">7 Years</option>
	                  <option value="8">8 Years</option>
	                  <option value="9">9 Years</option>
	                  <option value="10">10 Years</option>
	                  <option value="11">11 Years</option>
	                  <option value="12">12 Years</option>
	                  <option value="13">13 Years</option>
	                  <option value="14">14 Years</option>
	                  <option value="15">15 Years</option>
	                  <option value="16">16 Years</option>
	                  <option value="17">17 Years</option>
	                  <option value="18">18 Years</option>
	                  <option value="19">19 Years</option> 
	                  <option value="19">19 Years</option>
	                  <option value="20">Over 20 Years</option>  
	                </select>                 
			</p>

			<p>
				    <label class="h6">Have you ever engaged a professional CV Editor?</small></label>
				        <label>
							<input type="checkbox" class="check" value="yes" name="check"/>Yes
						</label>
						<label>
					        <input type="checkbox" class="check" value="no" name="check" />No
						</label>
			</p>

			<p>
                <label class="h6">Are you willing to engage our professional CV Editing service at a cost?</small></label>
					<label><input type="radio" name="Radio" id="radio" value="yes" required=""> Yes</label>
					<label><input type="radio" name="Radio" id="radio" value="no" required=""> No</label>

	                <select id="amount" name="amount" class="form-control" hidden="true">
	                  <option disabled selected value>Select amount you can pay (in Ksh.)</option>
	                  <option value="1000">1000 to 2000</option>
	                  <option value="2000">2000 to 3000</option>
	                  <option value="3000">3000 to 4000</option>
	                  <option value="4000">4000 to 5000</option>
	                  <option value="5000">Above 5000</option>                          
	                </select>                 
			</p>
			<p>
				<label>Message:</label>
				@error('message')
			    <div class="text-center my-2 py-1 alert alert-danger" role="alert">
			        Invalid message
			    </div>
			    @enderror
				<textarea class="form-control" placeholder="Add Optional message.  " maxlength="500" name="message">{{ old('message') }}</textarea>
			</p>
			<p>
				<input type="submit" class="btn btn-orange" value="Get Free CV Review">
			</p>
		</form>
	</div>

	<br id="testimonialsView">
	<br>



	<div>
		@include('components.featuredJobs')
	</div>

	<div>
		@include('components.featuredEmployers')
	</div>
	
<script type="text/javascript">
	$(document).ready(function(){
    $('input[type="radio"]').click(function(){
        if($(this).attr("value") == 'yes')
            document.getElementById("amount").hidden = false;    
            else 
            document.getElementById("amount").hidden = true;
      
    });

        $('input[type="radio"]').click(function(){
        if($(this).attr("value") == 'yes')
            document.getElementById("amount").required = true;     
            else 
            document.getElementById("amount").required = false;
    });

			        // the selector will match all input controls of type :checkbox
		// and attach a click event handler 
		$("input:checkbox").on('click', function() {
		  // in the handler, 'this' refers to the box clicked on
		  var $box = $(this);
		  if ($box.is(":checked")) {
		    // the name of the box is retrieved using the .attr() method
		    // as it is assumed and expected to be immutable
		    var group = "input:checkbox[name='" + $box.attr("name") + "']";
		    // the checked state of the group/box on the other hand will change
		    // and the current value is retrieved using .prop() method
		    $(group).prop("checked", false);
		    $box.prop("checked", true);
		  } else {
		    $box.prop("checked", false);
		  }
		});
});
</script>

@endsection


@extends('layouts.general-layout')

@section('title','Emploi :: Interview Coaching')

@section('description')
Get interview from our Experts and stand out from the crowd.
@endsection

@section('content')
<div class="container py-5">
	<div class="text-center">
		<h2 class="orange text-center">Interview Coaching Request Form</h2>
		<p>
			Get detailed interview coaching from our experts and stand out from the crowd
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
				<select name="industry" class="form-control">
					@forelse(\App\Industry::orderBy('name')->get() as $ind)
					<option value="{{ $ind->id }}" {{ old('industry') == $ind->id ? 'selected=""' : '' }}>{{ $ind->name }}</option>
					@empty
					@endforelse
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
	


	


@endsection

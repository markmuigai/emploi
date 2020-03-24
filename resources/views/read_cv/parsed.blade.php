<!DOCTYPE html>
<html>
<head>
	<title>Parsed CV</title>
</head>
<body>


<div class="container">
	<form method="post" action="/read-cv-contents">
		@csrf
		<input type="url" name="url" value="" placeholder="Enter Resume URL" required="">
		<input type="submit" name="">
	</form>
	<form>
		<p>
			<label>Name:</label>
			<input type="text" name="full_name" value="{{ array_key_exists('name', $resume) ? $resume['name'] : '' }}">
		</p>
		<p>
			<label>Email:</label>
			<input type="text" name="email" value="{{ array_key_exists('email', $resume) ? $resume['email'] : '' }}">
		</p>
		<p>
			<label>Phone Number:</label>
			<input type="text" name="phone_number" value="{{ array_key_exists('mobile_number', $resume) ? $resume['mobile_number'] : '' }}">
		</p>

		@if(array_key_exists('degree', $resume) && is_array($resume['degree']))
		<p>
			<label>Degree:</label>
			<div >

				@forelse($resume['degree'] as $deg)
				<input type="text" name="degree[]" value="{{ $deg }}">
				@empty
				@endforelse


			</div>
		</p>
		@endif
		@if(array_key_exists('skills', $resume))
		<p>
			<label>Skills: </label>
			<div>
				@forelse($resume['skills'] as $skill)
				<input type="text" name="skills[]" value="{{ $skill }}">
				@empty
				@endforelse
			</div>
		</p>
		@endif
		@if(array_key_exists('designation', $resume))
		<p>
			<label>Designations: </label>
			<div>
				<?php
				$desi = $resume['designation'];
				?>
				@if(is_array($desi))
					@forelse($desi as $des)
						
							<input type="text" name="designations[]" value="{{ $des }}">
						
					@empty
					@endforelse
				@elseif($desi != 'None')

				<input type="text" name="designations[]" value="{{ $desi }}">

				@endif
				
			</div>
		</p>
		@endif
		<p>
			<label>Total Experience:</label>
			<input type="number" name="total_experience" value="{{ array_key_exists('total_experience', $resume) ? $resume['total_experience'] : '' }}">

		</p>
		
	</form>
	<textarea style="width: 100%" rows="20">{{ print_r($resume) }}</textarea>
</div>
</body>
</html>
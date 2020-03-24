<!DOCTYPE html>
<html>
<head>
	<title>Parsed CV</title>
</head>
<body>


<div class="container">
	<form>
		<p>
			<label>Name:</label>
			<input type="text" name="full_name">
		</p>
		<p>
			<label>Email:</label>
			<input type="text" name="email">
		</p>
		<p>
			<label>Phone Number:</label>
			<input type="text" name="phone_number">
		</p>
		<p>
			<label>Degree:</label>
			<input type="text" name="degree">
		</p>
		<p>
			<label>Skills: </label>
			<div>
				
			</div>
		</p>
		<p>
			<label>Designations: </label>
			<div>
				
			</div>
		</p>
		<p>
			<label>Total Experience:</label>
			<input type="number" name="total_experience" value="">

		</p>
		{{ dd($resume) }}

	</form>
</div>
</body>
</html>
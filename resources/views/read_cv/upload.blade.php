<!DOCTYPE html>
<html>
<head>
	<title>Upload CV</title>
</head>
<body style="text-align: center;">

	<h3>Emploi CV Parser</h3>
	<hr>
	<form method="POST" enctype="multipart/form-data" action="/read-cv-contents">
		@csrf
		<h4>Upload CV & Parse</h4>
		<p>
			<input type="file" name="resume" required="" accept=".docx, .pdf">
		<input type="submit">
		</p>
		

	</form>

	<hr>

	<form method="post" action="/read-cv-contents">
		@csrf
		<h4>Enter Link to CV: </h4>
		<p>
			<input type="url" name="url" value="" placeholder="Enter Resume URL" required="">
			<input type="submit" name="">
		</p>
			
	</form>
	<hr>
</body>
</html>
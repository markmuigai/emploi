<!DOCTYPE html>
<html>
<head>
	<title>Upload CV</title>
</head>
<body>

<form method="POST" enctype="multipart/form-data" action="/read-cv-contents">
	@csrf
	<h4>Emploi CV Parser</h4>
	<input type="file" name="resume" required="" accept=".docx, .pdf">
	<input type="submit">

</form>
</body>
</html>